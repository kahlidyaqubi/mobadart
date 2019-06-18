<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Category;
use App\City;
use App\Family_center;
use App\Governorate;
use App\Http\Requests\AdminRequest;
use App\Initiative;
use App\Initiative_evaluation;
use App\Interest;
use App\Link;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Session;

class AdminController extends BaseController
{
    //
    public function index(Request $request)
    {
        $q = $request["q"] ?? "";
        $super_admin = $request["super_admin"] ?? "";
        $family_center_id = $request["family_center_id"] ?? "";


        $items = Admin::leftJoin('users', 'user_id', 'users.id')->leftJoin('family_centers', 'family_center_id', 'family_centers.id')->whereRaw(true);

        if ($q)
            $items->whereRaw("(users.name like ? or users.email like ? or users.user_name like ? or admins.mobile like ?)"
                , ["%$q%", "%$q%", "%$q%", "%$q%"]);
        if ($super_admin || $super_admin === '0')
            $items->where('super_admin', '=', $super_admin);

        if ($family_center_id)
            $items->where('family_centers.id', '=', $family_center_id);


        $items = Admin::whereIn('id', $items->pluck('admins.id'))->orderBy("admins.id")->paginate(20)
            ->appends([
                "q" => $q, "super_admin" => $super_admin, "family_center_id" => $family_center_id]);


        $family_centers = Family_center::all();

        return view('admin.admins.index', compact('items', 'family_centers', 'super_admin', 'family_center_id'));
    }

    public function create()
    {
        //
        $family_centers = Family_center::all();
        return view('admin.admins.create', compact('family_centers'));
    }

    public function store(AdminRequest $request)
    {
        //
        if (!request()->super_admin) {
            $testeroor = $this->validate($request, [
                'family_center_id' => 'required|max:3',

            ]);
        }
        $testeroor = $this->validate($request, [
            'password' => 'required|string|min:6',
            'email' => Rule::unique('users')->where(function ($query)  {
                return $query->where('email', request()->email)
                    ->where('the_type', 1);
            }),
            'user_name' => Rule::unique('users')->where(function ($query)  {
                    return $query->where('user_name', request()->user_name)
                        ->where('the_type', 1);
                }),
        ]);
        $user_id = User::create([
            'name' => request()->name,
            'user_name' => request()->user_name,
            'email' => request()->email,
            'the_type' => 1,
            'password' => bcrypt(request()->password),
        ])->id;
        request()['user_id'] = $user_id;
        Admin::create(request()->all());

        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/admin/admin/create");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $item = Admin::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }
        $family_centers = Family_center::all();
        return view('admin.admins.edit', compact('family_centers', 'item'));
    }

    public function update(AdminRequest $request, $id)
    {
        //



        $item = Admin::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }
        $the_id=$item->user->id;
        $testeroor = $this->validate($request, [
            'email' => Rule::unique('users')->where(function ($query) use ($the_id) {
                return $query->where('email', request()->email)->where('id', '!=', $the_id)
                    ->where('the_type', 1);
            }),
            'user_name' => Rule::unique('users')->where(function ($query) use ($the_id) {
                return $query->where('user_name', request()->user_name)->where('id', '!=', $the_id)
                    ->where('the_type', 1);
            }),
        ]);
        $user = User::find($item->user_id);
        if ($request["password"] != "") {
            $user->password = bcrypt($request["password"]);
        }
        $user->name = $request["name"];
        $user->email = $request["email"];
        $user->user_name = $request["user_name"];
        $user->save();

        $item->update($request->all());

        Session::flash("msg", "تمت عملية التعديل بنجاح");
        return redirect("/admin/admin");
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        //
        $item = Admin::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }
        if (auth()->user()->admin->id == $item->id) {
            Session::flash("msg", "e:لا يمكن لصاحب الحساب حذف نفسه");
            return redirect("/admin/admin");
        }

        $adminlink = DB::table('admins_links')->whereIn('admin_id', [$item->id])->pluck('id');
        if (count($adminlink) > 0)
            DB::table('admins_links')->whereIn('id', $adminlink)->delete();
        $theuser = $item->user;
        $item->delete();
        $theuser->delete();
        Session::flash("msg", "تم حذف حساب بنجاح");
        return redirect("/admin/admin");

    }

    public function initiaveToAdmin($id, Request $request)
    {
        $item = Admin::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }

        $q = $request["q"] ?? "";
        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $start_date = $request["start_date"] ?? "";
        $end_date = $request["end_date"] ?? "";
        $in_date = $request["in_date"] ?? "";
        $donation = $request["donation"] ?? "";
        $interests_ids = $request["interests_ids"] ?? "";

        $items = $item->initiatives()->leftJoin('admins', 'admin_id', 'admins.id')->leftJoin('cities', 'city_id', 'cities.id')->whereRaw(true);


        if ($q)
            $items->whereRaw("(initiatives.title like ? or initiatives.team_name like ? or admins.name like ?)"
                , ["%$q%", "%$q%", "%$q%"]);

        if ($city_id)
            $items->where('cities.id', '=', $city_id);

        if (($governorate_id) && !($city_id)) {
            $cities_ids = City::where('governorate_id', $governorate_id)->pluck('id')->toArray();
            $items->whereIn('cities.id', $cities_ids);
        }

        if ($donation || $donation === '0') {
            if ($donation == '1')
                $items->whereRaw('initiatives.paid_up < initiatives.donation');
            else {
                $items->whereRaw('initiatives.paid_up >= initiatives.donation');
            }
        }

        if ($interests_ids) {
            if ($interests_ids[0] != null || count($interests_ids) > 1) {
                foreach ($interests_ids as $interest_id) {
                    $items->whereHas('interests', function ($q) use ($interest_id) {
                        $q->where('interests.id', $interest_id);
                    });
                }

            }
        }

        if (($end_date) && ($start_date)) {
            $items = $items->whereRaw("end_date <= ? and start_date >= ?", [$end_date, $start_date]);
        } else {
            if ($start_date)
                $items = $items->whereRaw("start_date = ?", [$start_date]);

            if ($end_date)
                $items = $items->whereRaw("end_date = ?", [$end_date]);
        }
        if ($in_date)
            $items = $items->whereRaw("end_date >= ? and start_date <= ?", [$in_date, $in_date]);

        $items = Initiative::whereIn('id', $items->pluck('initiatives.id'))->orderBy("initiatives.id")->paginate(20)
            ->appends([
                "q" => $q, "city_id" => $city_id, 'governorate_id' => $governorate_id
                , "in_date" => $in_date, 'end_date' => $end_date
                , 'interests_ids' => $interests_ids, 'donation' => $donation,
                'start_date' => $start_date]);
        $cities = City::all();
        $governorates = Governorate::all();
        $interests = Interest::where('status', '1')->get();
        return view('admin.admins.initiaveToAdmin', compact('item', 'items', 'interests', 'governorate_id', 'governorates', 'cities', 'city_id'));


    }

    public function articleToAdmin($id, Request $request)
    {
        $q = $request["q"] ?? "";
        $category_id = $request["category_id"] ?? "";
        $initiative_id = $request["initiative_id"] ?? "";
        $status = $request["status"] ?? "";
        $the_item = Admin::find($id);
        if ($the_item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }
        $items = $the_item->articles()->join('categories', 'categories.id', '=', 'articles.category_id')->select('articles.*')->whereRaw("true");
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
        return view("admin.admins.articleToAdmin", compact('items', 'the_item', 'categories', 'initiatives'));
    }

    public function demanReplayedToAdmin($id)
    {
        //
    }

    public function demandToAdmin($id)
    {
        //
    }

    public function permission($id)
    {
        //
        $item = Admin::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }

        $super_links = Link::where('super', '=', 1)->where("parent_id", 0)->where("mult", 0)->get();
        $other_links = Link::where('super', '!=', 1)->where("parent_id", 0)->where("mult", 0)->get();

        return view('admin.admins.permission', compact('other_links', 'super_links', 'item'));

    }

    public function permission_post(Request $request, $id)
    {
        //
        \DB::table("admins_links")->where("admin_id", $id)->delete();
        if ($request["permission"]) {
            foreach ($request["permission"] as $link)
                \DB::table("admins_links")->insert(["admin_id" => $id,
                    "link_id" => $link]);
        }
        DB::table('admins_links')->insertGetId([
            'admin_id' => $id,
            'link_id' => \DB::table("links")->where("mult", 1)->first()->id,
        ]);
        Session::flash("msg", "i:تمت حفظ الصلاحيات بنجاح");
        return redirect("/admin/admin");
    }

    public function hisCategoty($id)
    {
        $item = Admin::find($id);
        if ($item == NULL || !(auth()->user()->admin->links->contains(\App\Link::where('title', '=', 'صلاحيات حساب')->first()->id))
        ) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }

        $his_category = Category::where('type', '=', 1)->get();

        return view('admin.admins.hisCategoty', compact('his_category', 'item'));

    }

    public function hisCategoty_post(Request $request, $id)
    {
        \DB::table("admins_categoris")->where("admin_id", $id)->delete();
        if ($request["categoreis"]) {
            foreach ($request["categoreis"] as $category)
                \DB::table("admins_categoris")->insert(["admin_id" => $id,
                    "category_id" => $category]);
        }
        Session::flash("msg", "i:تمت حفظ الصلاحيات بنجاح");
        return redirect("/admin/admin");
    }

    public function evaluteToAdmin($id, Request $request)
    {
        $initiative_id = $request["initiative_id"] ?? "";
        $status = $request["status"] ?? "";

        $item = Admin::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/activsit");
        }
        $items = $item->initiative_evaluations()->whereRaw(true);


        if ($initiative_id) {
            $items->whereRaw("(initiative_id = ?)"
                , [$initiative_id]);
        }
        if ($status || $status === '0') {
            if ($status == 1)
                $items->whereHas('admin');
            else
                $items->whereHas('activist');
        }
        $admin = auth()->user()->admin;
        if (!$admin->super_admin == 1) {
            $initiatives = $admin->initiatives->all();
        } else {
            $initiatives = Initiative::all();
        }

        $items = Initiative_evaluation::whereIn('id', $items->pluck('initiative_evaluation.id'))->paginate(20)
            ->appends(['initiative_id' => $initiative_id, 'status' => $status]);

        return view('admin.admins.evaluteToAdmin', compact('items', 'item', 'initiatives'));

    }
}
