<?php

namespace App\Http\Controllers\Admin;

use App\Activist;
use App\Evaluation_other;
use App\Http\Requests\Initiative_evaluation_towRequest;
use App\Initiative;
use App\Initiative_evaluation;
use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Action;
use Session;
use  PDF;
use DB;
use Notification;
use App\Notifications\NotifyUsers;

class EvalutionController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request["q"] ?? "";
        $initiative_id = $request["initiative_id"] ?? "";
        $status = $request["status"] ?? "";
        $keywords = preg_split("/[\s,]+/", $q);


        if (count($keywords) == 3) {
            $keywords[3] = "";
        }
        if (count($keywords) == 2) {
            $keywords[2] = "";
            $keywords[3] = "";
        }
        if (count($keywords) == 1) {
            $keywords[1] = "";
            $keywords[2] = "";
            $keywords[3] = "";
        }

        $items1 = Initiative_evaluation::join('admins', 'admins.id', '=', 'initiative_evaluation.admin_id')->
        leftJoin('users', 'admins.user_id', 'users.id')->
        whereRaw(true);
        if ($q)
            $items1->whereRaw("(
            (users.name like ? and users.father_name like ? and users.grand_father_name like ? and users.last_name like ?) 
            or (users.name like ? and users.last_name like ? and users.grand_father_name like ? and users.father_name like ?) 
            or (users.name like ? and users.grand_father_name like ? and users.last_name like ? and users.father_name like ?) 
            or (users.father_name like ? and users.grand_father_name like ? and users.name like ? and users.last_name like ?) 
            or (users.father_name like ? and users.last_name like ? and users.grand_father_name like ? and users.name like ?) 
            or (users.grand_father_name like ? and users.last_name like ? and users.father_name like ? and users.name like ?) 
            or users.name like ? or  users.father_name like? or users.grand_father_name like?  or  users.last_name like?
            )"
                , ["%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$q%", "%$q%", "%$q%", "%$q%"
                ]);
        $items2 = Initiative_evaluation::join('activists', 'activists.id', '=', 'initiative_evaluation.activist_id')->
        leftJoin('users', 'activists.user_id', 'users.id')->
        whereRaw(true);
        if ($q)
            $items2->whereRaw("(
            (users.name like ? and users.father_name like ? and users.grand_father_name like ? and users.last_name like ?) 
            or (users.name like ? and users.last_name like ? and users.grand_father_name like ? and users.father_name like ?) 
            or (users.name like ? and users.grand_father_name like ? and users.last_name like ? and users.father_name like ?) 
            or (users.father_name like ? and users.grand_father_name like ? and users.name like ? and users.last_name like ?) 
            or (users.father_name like ? and users.last_name like ? and users.grand_father_name like ? and users.name like ?) 
            or (users.grand_father_name like ? and users.last_name like ? and users.father_name like ? and users.name like ?) 
            or users.name like ? or  users.father_name like? or users.grand_father_name like?  or  users.last_name like?
            )"
                , ["%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$q%", "%$q%", "%$q%", "%$q%"
                ]);

        $items_id = array_merge($items2->pluck('initiative_evaluation.id')->toArray(), $items1->pluck('initiative_evaluation.id')->toArray());

        $items = Initiative_evaluation::whereIn('id', $items_id)->whereRaw(true);


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
            ->appends([
                "q" => $q, 'initiative_id' => $initiative_id, 'status' => $status]);

        return view('admin.initiative_evaluation.index', compact('items', 'initiatives'));

    }

    public function create()
    {
        $admin = auth()->user()->admin;
        if (request()['initiative_id']) {
            $initiative = $admin->initiatives->find(request()['initiative_id']);
            if ($initiative == null) {
                Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
                return redirect('admin/initiative')->withInput();
            }
			if(Initiative_evaluation::where('initiative_id',request()['initiative_id'])->where('admin_id',auth()->user()->admin->id)->first()){
			Session::flash("msg", "e:لقد تم تقييم المبادرة من قبل");
                return redirect('admin/initiative')->withInput();
			}

            return view('admin.initiative_evaluation.create', compact('initiative'));

        } else {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect('admin/initiative')->withInput();
        }


    }

    public function store(Initiative_evaluation_towRequest $request)
    {
        if (array_keys(request()['values']) != array_keys(request()['attributes']) || request()['values'] == [] || request()['values'] == []) {
            Session::flash("msg", "e:يجب إدخال إجابة لكل سؤال");
            return redirect('admin/evalution/create?initiative_id=' . request()['initiative_id'] . '')->withInput();
        }
        request()['admin_id'] = auth()->user()->admin->id;
        $item = Initiative_evaluation::create(request()->all());
        for ($i = 0; $i < count(request()['values']); $i++) {
            Evaluation_other::create(['initiative_evaluation_id' => $item->id,
                'attribute' => request()['attributes'][$i],
                'value' => request()['values'][$i],
            ]);
        }
        /**************start Notification*******************/
        $action = Action::create(['title' => 'موظف أدخل تقييم', 'type' => 'من موظف', 'link' => '/admin/evalution/' . $item->id]);

        $suber_admins_ids = User::whereIn('id', Admin::where('super_admin', 1)->pluck('user_id'))->whereNotIn('id', [auth()->user()->id])->pluck('id')->toArray();

        $have_prmission = User::whereIn('id',  Admin::whereIn('id',DB::table('admins_links')->leftJoin("links","link_id","links.id")->where('links.title', 'إدارة التقيمات')->pluck('admin_id'))->pluck('user_id'))->whereNotIn('id', [auth()->user()->id])->pluck('id')->toArray();

        $users_ids = array_merge($suber_admins_ids, $have_prmission);

        $users = User::whereIn('id', $users_ids)->get();

        Notification::send($users, new NotifyUsers($action));
        /**************end Notification*******************/
        Session::flash("msg", "s:تم ادخال التقييم بنجاج");
        return redirect('/admin/initiative/' . request()['initiative_id'])->withInput();
    }

    public function show($id)
    {
        $item = Initiative_evaluation::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/initiative");
        }
        if ($item->admin) {
            $type = 'المنشط';
            $name = $item->admin->user->name;
        } else {
            $type = 'الناشط';
            $name = $item->activist->user->name . " " . $item->activist->user->last_name;
        }
        $others = $item->evaluation_others;
        $initiative = $item->initiative;
        $all_count = $item->initiative->activists_initiatives()->where('accept', 1)->pluck('activist_id');
        $all = Activist::whereIn('id', $all_count)->count();
        $male_count = Activist::whereIn('id', $all_count)->where('gender', 'M')->count();
        $male_young_count = Activist::whereIn('id', $all_count)->where('gender', 'M')->where('brth_day', '>', date('Y-m-d', strtotime('-18 year')))->count();
        $male_old_count = $male_count - $male_young_count;
        $female_count = Activist::whereIn('id', $all_count)->where('gender', 'F')->count();
        $female_young_count = Activist::whereIn('id', $all_count)->where('gender', 'F')->where('brth_day', '>', date('Y-m-d', strtotime('-18 year')))->count();
        $female_old_count = $female_count - $female_young_count;

        return view('admin.initiative_evaluation.show', compact('item', 'initiative'
            , 'others', 'male_count', 'male_young_count', 'all',
            'male_old_count', 'female_count', 'female_young_count',
            'female_old_count', 'type', 'name'));
    }

    public function edit($id)
    {
        $item = Initiative_evaluation::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/evalution");
        }
        if (auth()->user()->admin->id != $item->initiative->admin->id) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/evalution");
        }
        $others = $item->evaluation_others()->select('attribute', 'value')->get();
        $initiative = $item->initiative;
        return view('admin.initiative_evaluation.edit', compact('initiative', 'others', 'item'));
    }

    public function update(Initiative_evaluation_towRequest $request, $id)
    {
        $item = Initiative_evaluation::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/evalution");
        }
        if (auth()->user()->admin->id != $item->initiative->admin->id) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/evalution");
        }
        $item->update(request()->all());
        \DB::table("evaluation_others")->where("initiative_evaluation_id", $id)->delete();
        for ($i = 0; $i < count(request()['values']); $i++) {
            Evaluation_other::create(['initiative_evaluation_id' => $item->id,
                'attribute' => request()['attributes'][$i],
                'value' => request()['values'][$i],
            ]);
        }
        Session::flash("msg", "s:تم ادخال التقييم بنجاج");
        return redirect('admin/evalution/' . $item->id)->withInput();
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $item = Initiative_evaluation::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/evalution");
        }

        $evaluation_others = DB::table('evaluation_others')->whereIn('initiative_evaluation_id', [$item->id])->pluck('id');
        if (count($evaluation_others) > 0)
            DB::table('evaluation_others')->whereIn('id', $evaluation_others)->delete();

        $item->delete();
        Session::flash("msg", "تم حذف تقييم بنجاح");
        return redirect("/admin/evalution");
    }

    public function printEval($id)
    {
        $item = Initiative_evaluation::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/initiative");
        }
        if ($item->admin) {
            $type = 'المنشط';
            $name = $item->admin->user->name;
        } else {
            $type = 'الناشط';
            $name = $item->activist->user->name . " " . $item->activist->user->last_name;
        }
        $others = $item->evaluation_others;
        $initiative = $item->initiative;
        $all_count = $item->initiative->activists_initiatives()->where('accept', 1)->pluck('activist_id');
        $all = Activist::whereIn('id', $all_count)->count();
        $male_count = Activist::whereIn('id', $all_count)->where('gender', 'M')->count();
        $male_young_count = Activist::whereIn('id', $all_count)->where('gender', 'M')->where('brth_day', '>', date('Y-m-d', strtotime('-18 year')))->count();
        $male_old_count = $male_count - $male_young_count;
        $female_count = Activist::whereIn('id', $all_count)->where('gender', 'F')->count();
        $female_young_count = Activist::whereIn('id', $all_count)->where('gender', 'F')->where('brth_day', '>', date('Y-m-d', strtotime('-18 year')))->count();
        $female_old_count = $female_count - $female_young_count;

        $pdf = PDF::loadView('admin.initiative_evaluation.print', compact('item', 'initiative'
            , 'others', 'male_count', 'male_young_count', 'all',
            'male_old_count', 'female_count', 'female_young_count',
            'female_old_count', 'type', 'name'));
        return $pdf->download("تقييم  $type $name لمبادرة $initiative->title .pdf");
    }
}
