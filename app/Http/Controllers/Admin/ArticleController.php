<?php

namespace App\Http\Controllers\Admin;

use App\Articel_file;
use App\Article;
use App\Category;
use App\Comment;
use App\Http\Requests\ArticleRequest;
use App\Initiative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use App\User;
use App\Admin;
use App\Action;
use  PDF;
use DB;
use Notification;
use App\Notifications\NotifyUsers;


class ArticleController extends BaseController
{

    public function index(Request $request)
    {

        $q = $request["q"] ?? "";
        $category_id = $request["category_id"] ?? "";
        $initiative_id = $request["initiative_id"] ?? "";
        $status = $request["status"] ?? "";
        $items = Article::join('categories', 'categories.id', '=', 'articles.category_id')->select('articles.*')->whereRaw("true");
        if ($q)
            $items->whereRaw("(title like ?)"
                , ["%$q%"]);
        if ($category_id)
            $items->whereRaw("(category_id = ?)"
                , [$category_id]);

        if ($status || $status === '0')
            $items->whereRaw("(status = ?)"
                , [$status]);

        if ($initiative_id)
            $items->whereRaw("(initiative_id = ?)"
                , [$initiative_id]);

        $items = $items->orderBy("articles.id", 'desc')->paginate(12)->appends([
            "q" => $q, "category_id" => $category_id,
            'status' => $status, 'initiative_id' => $initiative_id]);
        $admin = auth()->user()->admin;
        if (!$admin->super_admin == 1) {
            $categories = $admin->categories->all();
            $initiatives = $admin->initiatives->all();
        } else {
            $categories = Category::where('type', '1')->get();
            $initiatives = Initiative::all();
        }
        return view("admin.articles.index", compact('items', 'categories', 'initiatives'));
    }

    public function create()
    {
        $admin = auth()->user()->admin;
        $initiative = '';
        if (!$admin->super_admin == 1) {
            $categories = $admin->categories->all();
            $initiatives = $admin->initiatives->all();
            if (request()['initiative_id']) {
                $initiative = $admin->initiatives->find(request()['initiative_id']);
                if ($initiative == null) {
                    Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
                    return redirect('admin/article')->withInput();
                }
            }
        } else {
            $categories = Category::where('type', '1')->get();
            $initiatives = Initiative::all();
            if (request()['initiative_id']) {
                $initiative = Initiative::find(request()['initiative_id']);
                if ($initiative == null) {
                    Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
                    return redirect('admin/admin/create')->withInput();
                }
            }
        }
        return view('admin.articles.create', compact('categories', 'initiative', 'initiatives'));
    }

    public function store(ArticleRequest $request)
    {

        $testeroor = $this->validate(request(), [
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $admin = auth()->user()->admin;
        request()['admin_id'] = $admin->id;
        if (!$admin->super_admin == 1) {
            request()['status'] = 0;
        } else {
            request()['status'] = 1;
        }

        $id = Article::create(request()->all())->id;
        Storage::disk('uploads')->makeDirectory("/articles_file/$id/images");


        $item = Article::find($id);

        if (request()->hasFile('main_image')) {
            $myfile = request()->file('main_image');
            $filename = rand(11111, 99999) . '_article_' . $id . '.png';
            $myfile->move(public_path() . '/articles_file/' . $id . '/images/', $filename);
            request()['img'] = '/articles_file/' . $id . '/images/' . $filename;
        }

        if (request()->hasFile('images')) {
            foreach (request()->file('images') as $file) {
                $filename = rand(11111, 99999) . '_article_' . $id . '.png';
                $file->move(public_path() . '/articles_file/' . $id . '/images', $filename);
                Articel_file::create(['name' => '/articles_file/' . $id . '/images/' . $filename, 'article_id' => $id]);
            }
        }

        $item->update(request()->all());


        /**************start Notification*******************/
        /*use App\User;
        use App\Admin;
        use App\Action;
        use  PDF;
        use DB;
        use Notification;
        use App\Notifications\NotifyUsers;*/
        if (!$admin->super_admin == 1) {
            $action = Action::create(['title' => 'منشط أضاف خبر بانتظار قبوله', 'type' => 'من موظف', 'link' => '/admin/article/']);
        } else {
            $action = Action::create(['title' => 'إداري أضاف خبر جديد', 'type' => 'من موظف', 'link' => '/admin/article/']);
        }

        $suber_admins_ids = User::whereIn('id', Admin::where('super_admin', 1)->pluck('user_id'))->whereNotIn('id', [auth()->user()->id])->pluck('id')->toArray();

        $have_prmission = User::whereIn('id', Admin::whereIn('id', DB::table('admins_links')->leftJoin("links", "link_id", "links.id")->where('links.title', 'إدارة الأخبار')->pluck('admin_id'))->pluck('user_id'))->whereNotIn('id', [auth()->user()->id])->pluck('id')->toArray();

        $users_ids = array_merge($suber_admins_ids, $have_prmission);

        $users = User::whereIn('id', $users_ids)->get();

        if($users->first())
        Notification::send($users, new NotifyUsers($action));
        /**************end Notification*******************/

        if (!$admin->super_admin == 1) {
            Session::flash("msg", "تمت انشاء خبر وسيتم نشره بعد موافقة إدارة المنصة");
        } else {
            Session::flash("msg", "تمت انشاء خبر ونشره بنجاح");
        }
        return redirect("/admin/article/create");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = Article::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/article");
        }
        if (!($item->admin_id == auth()->user()->admin->id || auth()->user()->admin->super_admin == 1)) {
            Session::flash("msg", "e:لا تملك صلاحية تعديل خبر نشره منشط آخر");
            return redirect("/admin/article");
        }

        $admin = auth()->user()->admin;
        if (!$admin->super_admin == 1) {
            $categories = $admin->categories->all();
            $initiatives = $admin->initiatives->all();
        } else {
            $categories = Category::where('type', '1')->get();
            $initiatives = Initiative::all();
        }
        return view('admin.articles.edit', compact('initiatives', 'categories', 'item'));

    }

    public function update(ArticleRequest $request, $id)
    {
        $item = Article::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/article");
        }
        if (!($item->admin_id == auth()->user()->admin->id || auth()->user()->admin->super_admin == 1)) {
            Session::flash("msg", "e:لا تملك صلاحية تعديل خبر نشره منشط آخر");
            return redirect("/admin/article");
        }


        if (request()->hasFile('main_image')) {

            if (file_exists(public_path() . "" . $item->img) && $item->img != null) {
                unlink(public_path() . "" . $item->img);//يقوم بحذف القديم
            }

            $myfile = request()->file('main_image');
            $filename = rand(11111, 99999) . '_article_' . $id . '.png';
            $myfile->move(public_path() . '/articles_file/' . $id . '/images/', $filename);
            request()['img'] = '/articles_file/' . $id . '/images/' . $filename;


        }

        if (request()->hasFile('images')) {

            $files = Articel_file::whereIn('article_id', [$item->id])->pluck('id');
            $files_name = Articel_file::whereIn('article_id', [$item->id])->pluck('name');

            if (count($files) > 0) {
                Articel_file::destroy($files);
                foreach ($files_name as $file) {
                    if (file_exists(public_path() . "" . $file) && $file != null) {
                        unlink(public_path() . "" . $file);
                    }
                }

            }

            foreach (request()->file('images') as $file) {
                $filename = rand(11111, 99999) . '_article_' . $id . '.png';
                $file->move(public_path() . '/articles_file/' . $id . '/images', $filename);
                Articel_file::create(['name' => '/articles_file/' . $id . '/images/' . $filename, 'article_id' => $id]);
            }
        }

        $item->update(request()->all());

        Session::flash("msg", "تم تعديل خبر بنجاح");
        return redirect("/admin/article");

    }

    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $item = Article::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/article");
        }
        if (!($item->admin_id == auth()->user()->admin->id || auth()->user()->admin->super_admin == 1)) {
            Session::flash("msg", "e:لا تملك صلاحية تعديل خبر نشره منشط آخر");
            return redirect("/admin/article");
        }


        if (file_exists(public_path() . "" . $item->img) && $item->img != null) {
            unlink(public_path() . "" . $item->img);//يقوم بحذف القديم
        }


        $comments = Comment::whereIn('article_id', [$item->id])->pluck('id');
        $files = Articel_file::whereIn('article_id', [$item->id])->pluck('id');
        $files_name = Articel_file::whereIn('article_id', [$item->id])->pluck('name');

        if (count($comments) > 0)
            Comment::destroy($comments);
        if (count($files) > 0) {
            Articel_file::destroy($files);
            foreach ($files_name as $file) {
                if (file_exists(public_path() . "" . $file) && $file != null) {
                    unlink(public_path() . "" . $file);
                }
            }

        }
        $item->delete();
        Session::flash("msg", "تم حذف خبر بنجاح");
        return redirect("/admin/article");
    }


    public function accept($id)
    {
        $admin = auth()->user()->admin;

        $item = Article::find($id);
        if ($item == NULL ||
            !(auth()->user()->admin->links->contains(\App\Link::where('title', '=', 'تعديل خبر')->first()->id) || $admin->super_admin == 1)
        ) {
            Session::flash("msg", "e:لا تملك صلاحية تعديل خبر لم تنشره");
            return 0;
        }
        if ($item->status == 0)
            $item->status = 1;
        else
            $item->status = 0;
        $item->save();
        /**************start Notification*******************/
        if ($item->status==1) {

            $action = Action::create(['title' => 'تم قبول نشر خبرك الذي أضفته', 'type' => 'من موظف', 'link' => '/admin/article/']);

            $users = User::where('id', $item->admin->user->id)->get();

            if($users->first())
            Notification::send($users, new NotifyUsers($action));
        }
        /**************end Notification*******************/
    }
}
