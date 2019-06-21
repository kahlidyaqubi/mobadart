<?php

namespace App\Http\Controllers\Admin;

use App\Activist;
use App\Activists_initiative;
use App\Admin;
use App\Category;
use App\City;
use App\Governorate;
use App\Http\Requests\InitiativeRequest;
use App\Initiative;
use App\Initiative_evaluation;
use App\Initiatives_goal;
use App\Interest;
use Illuminate\Http\Request;
use App\Imports\ActivistExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;
use Session;
use DB;
use App\User;
use App\Action;
use  PDF;
use Notification;
use App\Notifications\NotifyUsers;

class InitiativeController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request["q"] ?? "";
        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $start_date = $request["start_date"] ?? "";
        $end_date = $request["end_date"] ?? "";
        $in_date = $request["in_date"] ?? "";
        $donation = $request["donation"] ?? "";
        $interests_ids = $request["interests_ids"] ?? "";

        $items = Initiative::leftJoin('admins', 'admin_id', 'admins.id')
            ->leftJoin('users', 'user_id', 'users.id')
            ->leftJoin('cities', 'city_id', 'cities.id')
            ->whereRaw(true);


        if ($q)
            $items->whereRaw("(initiatives.title like ? or initiatives.team_name like ? or users.name like ?)"
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

        $items = Initiative::whereIn('id', $items->pluck('initiatives.id'))->orderBy("initiatives.id", "desc")->paginate(20)
            ->appends([
                "q" => $q, "city_id" => $city_id, 'governorate_id' => $governorate_id
                , "in_date" => $in_date, 'end_date' => $end_date
                , 'interests_ids' => $interests_ids, 'donation' => $donation,
                'start_date' => $start_date]);
        $cities = City::all();
        $governorates = Governorate::all();
        $interests = Interest::where('status', '1')->get();
        return view('admin.initiatives.index', compact('items', 'interests', 'governorate_id', 'governorates', 'cities', 'city_id'));


    }

    public function create()
    {
        $cities = City::all();
        $governorates = Governorate::all();
        $interests = Interest::where('status', '1')->get();
        $item = '';
        if (request()['id']) {
            $item = Admin::find(request()['id']);
            if ($item == null) {
                Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
                return redirect('admin/initiative/create')->withInput();
            }
        }
        return view('admin.initiatives.create', compact('governorates', 'cities', 'interests', 'item'));

    }

    public function store(InitiativeRequest $request)
    {


        if ($request['end_date'] < $request['start_date']) {
            Session::flash("msg", "e:لا يمكن أن يكون تاريخ الانتهاء قبل تاريخ البدء");
            return redirect('admin/initiative/create')->withInput();
        }
        if ($request->hasFile('image')) {
            dd("1");
            $myfile = $request->file('image'); // جلد الجديد من الانبوت فورم
            $filename = rand(11111, 99999) . '.' . $myfile->getClientOriginalExtension(); // جلب اسمه
            $myfile->move(public_path() . '/uploads/', $filename);//يخزن الجديد في الموقع المحدد

            request()['img'] = '/uploads/' . $filename;
        }
        else{

            request()['img'] ='/images/development.jpg';
        }

        if (!request()['admin_id'])
            request()['admin_id'] = auth()->user()->admin->id;

        if (request()['donation'] == "")
            request()['donation'] = 0;
        $initiative_id = Initiative::create(request()->all())->id;

        if ($request["other_goals"]) {
            $other_goals = explode(",", $request["other_goals"]);
            for ($i = 0; $i < count($other_goals); $i++) {
                if (!Initiatives_goal::where('initiative_id', $initiative_id)->where('details', $other_goals[$i])->first()) {
                    Initiatives_goal::create([
                        'details' => "$other_goals[$i]",
                        'initiative_id' => $initiative_id,
                    ]);
                }
            }
        }
        if (request()['interest'])
            for ($i = 0; $i < count(request()['interest']); $i++) {
                DB::table('initiatives_interests')->insertGetId([
                    'initiative_id' => $initiative_id,
                    'interest_id' => request()['interest'][$i],
                ]);
            }

        /**************start Notification*******************/
        /*use App\User;
        use App\Admin;
        use App\Action;
        use  PDF;
        use DB;
        use Notification;
        use App\Notifications\NotifyUsers;*/

        $action = Action::create(['title' => 'تم اضافة مبادرة جديدة', 'type' => 'من موظف', 'link' => '/admin/initiative/']);
        $suber_admins_ids = User::whereIn('id', Admin::where('super_admin', 1)->pluck('user_id'))->whereNotIn('id', [auth()->user()->id])->pluck('id')->toArray();

        $have_prmission = User::whereIn('id', Admin::whereIn('id', DB::table('admins_links')->leftJoin("links", "link_id", "links.id")->where('links.title', 'إدارة المبادرات')->pluck('admin_id'))->pluck('user_id'))->whereNotIn('id', [auth()->user()->id])->pluck('id')->toArray();

        $users_ids = array_merge($suber_admins_ids, $have_prmission);

        $users = User::whereIn('id', $users_ids)->get();
        if ($users->first())
            Notification::send($users, new NotifyUsers($action));
        /**************end Notification*******************/
        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/admin/initiative/create");
    }

    public function show($id)
    {
        $item = Initiative::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/initiative");
        }

        $hisinterests = $item->interests->all();
        $hisgoals = $item->initiatives_goals->all();
        return view('admin.initiatives.show', compact('hisinterests', 'hisgoals', 'item'));

    }

    public function edit($id)
    {
        $item = Initiative::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/initiative");
        }
        if (!($item->admin_id == auth()->user()->admin->id || auth()->user()->admin->super_admin == 1)) {
            Session::flash("msg", "e:لا تملك صلاحية تعديل مبادرة لست منشطها");
            return redirect("/admin/initiative");
        }

        $cities = City::all();
        $governorates = Governorate::all();
        $hisinterests = $item->interests()->pluck('interests.id')->toArray();
        $interests = Interest::where('status', '1')->get();
        $other_goals = $item->initiatives_goals()->pluck('details')->toArray();
        return view('admin.initiatives.edit', compact('cities', 'other_goals', 'governorates', 'hisinterests', 'interests', 'item'));

    }

    public function update(InitiativeRequest $request, $id)
    {

        $item = Initiative::find($id);

        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/initiative");
        }
        if (!($item->admin_id == auth()->user()->admin->id || auth()->user()->admin->super_admin == 1)) {
            Session::flash("msg", "e:لا تملك صلاحية تعديل مبادرة لست منشطها");
            return redirect("/admin/initiative");
        }


        if ($request->hasFile('image')) {

            if (file_exists(public_path() . "" . $item->img) && $item->img != null) {//اذا يوجد ملف قديم مخزن
                unlink(public_path() . "" . $item->img);//يقوم بحذف القديم
            }

            $myfile = $request->file('image'); // جلد الجديد من الانبوت فورم
            $filename = rand(11111, 99999) . '.' . $myfile->getClientOriginalExtension(); // جلب اسمه
            $myfile->move(public_path() . '/uploads/', $filename);//يخزن الجديد في الموقع المحدد

            request()['img'] = '/uploads/' . $filename;
            //dd(request()->all());
        }
        if (request()['donation'] == "")
            request()['donation'] = 0;

        $item->update(request()->all());

        if (request()['other_goals']) {
            $other_goals = explode(",", $request["other_goals"]);
            for ($i = 0; $i < count($other_goals); $i++) {
                if (!Initiatives_goal::where('initiative_id', $id)->where('details', $other_goals[$i])->first()) {
                    Initiatives_goal::create([
                        'details' => "$other_goals[$i]",
                        'initiative_id' => $id,
                    ]);
                }
            }
        }

        if (request()['interest']) {
            \DB::table("initiatives_interests")->where("initiative_id", $id)->delete();
            if (request()['interest']) {
                foreach (request()['interest'] as $interest)
                    \DB::table("initiatives_interests")->insert([
                        "initiative_id" => $id,
                        "interest_id" => $interest]);
            }
        }

        Session::flash("msg", "تمت عملية التعديل بنجاح");
        return redirect("/admin/initiative");
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $item = Initiative::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/initiative");
        }
        if (!($item->admin_id == auth()->user()->admin->id || auth()->user()->admin->super_admin == 1)) {
            Session::flash("msg", "e:لا تملك صلاحية تعديل مبادرة لست منشطها");
            return redirect("/admin/initiative");
        }


        if ($item->activists_initiatives->all()) {
            Session::flash("msg", "e:لا يمكن حذف مبادرة يشترك بها نشطاء");
            return redirect("/admin/initiative");
        }

        if (file_exists(public_path() . "" . $item->img) && $item->img != null) {//اذا يوجد ملف قديم مخزن
            unlink(public_path() . "" . $item->img);//يقوم بحذف القديم
        }

        $initiativeinterests = DB::table('initiatives_interests')->whereIn('initiative_id', [$item->id])->pluck('id');
        if (count($initiativeinterests) > 0)
            DB::table('initiatives_interests')->whereIn('id', $initiativeinterests)->delete();


        if ($item->initiatives_goals->pluck('id') > 0)
            Initiatives_goal::destroy($item->initiatives_goals->pluck('id'));

        $item->delete();
        Session::flash("msg", "تم حذف مبادرة بنجاح");
        return redirect("/admin/initiative");
    }

    public function acceptActivit($id)
    {
        //

        $item = Activists_initiative::find($id);

        if ($item == NULL ||
            !(auth()->user()->admin->links->contains(\App\Link::where('title', '=', 'قبول منضمين')->first()->id))
        ) {
            return response()->json([
                'message' => 'الرجاء التاكد من الرابط المطلوب'
            ], 401);
        }

        if (!($item->initiative->admin_id == auth()->user()->admin->id || auth()->user()->admin->super_admin == 1)) {
            return response()->json([
                'message' => 'لا تملك صلاحية تعديل مبادرة لست منشطها'
            ], 401);
        }
        $z = count($item->initiative->activists_initiatives()->where('accept', 1)->pluck('activist_id')->toArray());
        if ($item->accept == 0 && $item->initiative->activists_count <= $z) {
            return response()->json([
                'message' => 'لا يمكن تجاوز الحد المسموح للمشاركة' . $item->initiative->activists_count . '<' . $z
            ], 401);
        }


        if ($item->accept == 0)
            $item->accept = 1;
        else
            $item->accept = 0;
        $item->save();

        /**************start Notification*******************/

        if ($item->accept == 1) {
            $action = Action::create(['title' => 'تم قبول ناشط في مبادرة', 'type' => 'من موظف', 'link' => '/admin/initiative/' . $item->initiative->id]);
            $action2 = Action::create(['title' => ''.Site_sting::find(1)->acceptance_msg, 'type' => 'من موظف', 'link' => '/initiative/' . $item->initiative->id]);
            $suber_admins_ids = User::whereIn('id', Admin::where('super_admin', 1)->pluck('user_id'))->whereNotIn('id', [auth()->user()->id])->pluck('id')->toArray();

            $have_prmission = User::whereIn('id', [$item->initiative->admin->user->id])->whereNotIn('id', [auth()->user()->id])->pluck('id')->toArray();

            $activsits_ids = User::whereIn('id', [$item->activist_id])->pluck('id')->toArray();

            $users_ids = array_merge($suber_admins_ids, $have_prmission);

            $users = User::whereIn('id', $users_ids)->get();
            $users2 = User::whereIn('id', $activsits_ids)->get();

            if ($users->first())
                Notification::send($users, new NotifyUsers($action));
            if ($users2->first())
                Notification::send($users2, new NotifyUsers($action2));
        }
        /**************end Notification*******************/


    }

    public function activityInInitiave($id)
    {
        return redirect('/no_accsess');
    }

    public function activitsInInitiative($id, Request $request)
    {
        $the_item = Initiative::find($id);
        if ($the_item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/initiative");
        }

        $q = $request["q"] ?? "";
        $accept = $request["accept"] ?? "";
        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $gender = $request["gender"] ?? "";
        $interests_ids = $request["interests_ids"] ?? "";
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

        $items = $the_item->activists()->leftJoin('users', 'user_id', 'users.id')
            ->leftJoin('activists_initiatives as soso_one', 'activists_initiatives.activist_id', 'activists.id')
            ->where('activists_initiatives.initiative_id', $id)
            ->leftJoin('cities', 'city_id', 'cities.id')->whereRaw(true);


        if ($q)
            $items->whereRaw("(
            (users.name like ? and users.father_name like ? and users.grand_father_name like ? and users.last_name like ?) 
            or (users.name like ? and users.last_name like ? and users.grand_father_name like ? and users.father_name like ?) 
            or (users.name like ? and users.grand_father_name like ? and users.last_name like ? and users.father_name like ?) 
            or (users.father_name like ? and users.grand_father_name like ? and users.name like ? and users.last_name like ?) 
            or (users.father_name like ? and users.last_name like ? and users.grand_father_name like ? and users.name like ?) 
            or (users.grand_father_name like ? and users.last_name like ? and users.father_name like ? and users.name like ?) 
            or users.name like ? or  users.father_name like? or users.grand_father_name like?  or  users.last_name like?
            
            or users.email like ? or activists.mobile like ? or activists.ido like ?)"
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

                    , "%$q%", "%$q%", "%$q%"]);

        if ($city_id)
            $items->where('cities.id', '=', $city_id);

        if (($governorate_id) && !($city_id)) {
            $cities_ids = City::where('governorate_id', $governorate_id)->pluck('id')->toArray();
            $items->whereIn('cities.id', $cities_ids);
        }

        if ($accept || $accept === '0') {
            $items->where('activists_initiatives.accept', '=', $accept);

        }
        if ($gender)
            $items->where('activists.gender', '=', $gender);


        if ($interests_ids) {
            if ($interests_ids[0] != null || count($interests_ids) > 1) {
                foreach ($interests_ids as $interest_id) {
                    $items->whereHas('interests', function ($q) use ($interest_id) {
                        $q->where('interests.id', $interest_id);
                    });
                }

            }
        }


        if ($request['theaction'] == 'excel') {
            $items = Activist::whereIn('activists.id', $items->pluck('activists.id'))
                ->leftJoin('users', 'user_id', 'users.id')
                ->leftJoin('cities', 'city_id', 'cities.id')
                ->leftJoin('governorates', 'cities.governorate_id', 'governorates.id')
                ->select('activists.id as activistsid', 'users.name as usersname', 'users.father_name', 'users.grand_father_name', 'users.last_name',
                    'activists.ido', 'governorates.name as governoratesname', 'cities.name as citiesname', 'activists.neighborhood', 'activists.mobile')->get();

            return Excel::download(new ActivistExport($items), "activist.xlsx");
        } else {

            $items = Activist::whereIn('activists.id', $items->pluck('activists.id'))
                ->paginate(20)
                ->appends([
                    "q" => $q, "city_id" => $city_id, 'governorate_id' => $governorate_id
                    , "gender" => $gender
                    , 'interests_ids' => $interests_ids
                    , 'accept' => $accept]);
            $cities = City::all();
            $governorates = Governorate::all();
            $initiatives = Initiative::all();
            $interests = Interest::where('status', '1')->get();
            return view('admin.initiatives.activitsInInitiative', compact('the_item', 'items', 'interests', 'initiatives', 'governorate_id', 'governorates', 'cities', 'city_id'));
        }

    }

    public function evaluteToInitiave($id, Request $request)
    {
        $q = $request["q"] ?? "";
        $status = $request["status"] ?? "";
        $keywords = preg_split("/[\s,]+/", $q);
        $item = Initiative::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/initiative");
        }
        if (!($item->admin_id == auth()->user()->admin->id || auth()->user()->admin->super_admin == 1)) {
            Session::flash("msg", "e:لا تملك صلاحية عرض تقييمات مبادرة لست منشطها");
            return redirect("/admin/initiative");
        }

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

        $items1 = $item->initiative_evaluations()->join('admins', 'admins.id', '=', 'initiative_evaluation.admin_id')->
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
        $items2 = $item->initiative_evaluations()->join('activists', 'activists.id', '=', 'initiative_evaluation.activist_id')->
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
                "q" => $q, 'status' => $status]);

        return view('admin.initiatives.evaluteToInitiave', compact('items', 'initiatives', 'item'));

    }

    public function articleToInitiave($id, Request $request)
    {
        $q = $request["q"] ?? "";
        $category_id = $request["category_id"] ?? "";
        $status = $request["status"] ?? "";
        $the_item = Initiative::find($id);
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


        $items = $items->orderBy("articles.id", 'desc')->paginate(12)->appends([
            "q" => $q, "category_id" => $category_id,
            'status' => $status]);
        $admin = auth()->user()->admin;
        if (!$admin->super_admin == 1) {
            $categories = $admin->categories->all();
            $initiatives = $admin->initiatives->all();
        } else {
            $categories = Category::where('type', '1')->get();
            $initiatives = Initiative::all();
        }
        return view("admin.initiatives.articleToInitiave", compact('items', 'the_item', 'categories', 'initiatives'));
    }

    public function rememberEvaluteToInitiave($id)
    {
        $item = Initiative::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/initiative");
        }
        if (!($item->admin_id == auth()->user()->admin->id || auth()->user()->admin->super_admin == 1)) {
            Session::flash("msg", "e:لا تملك صلاحية عرض تقييمات مبادرة لست منشطها");
            return redirect("/admin/initiative");
        }

        DB::table('notify_initiaves')->insert([ 'initiative_id' => $item->id]);
            $action = Action::create(['title' => "يرجى تقييم المبادرة $item->title ", 'type' => 'تذكير', 'link' => '/admin/initiative/'.$item->id]);
            $action2 = Action::create(['title' => "يرجى تقييم المبادرة $item->title ", 'type' => 'تذكير', 'link' => '/initiative/'.$item->id]);
            $have_prmission = User::where('id', $item->admin->user->id)->pluck('id')->toArray();
            $activsits_ids = User::whereIn('id', $item->activists()->pluck('user_id')->toArray())->pluck('id')->toArray();

            //$users_ids = array_merge($activsits_ids, $have_prmission);
            $users = User::whereIn('id', $have_prmission)->whereNotIn('id',Admin::find(Initiative_evaluation::Where('initiative_id',$id)->pluck('admin_id')->toArray())->pluck('user_id')->toArray())->get();
            $users2 = User::whereIn('id', $activsits_ids)->whereNotIn('id',Activist::find(Initiative_evaluation::Where('initiative_id',$id)->pluck('activist_id')->toArray())->pluck('user_id')->toArray())->get();
            if($users->first())
                Notification::send($users, new NotifyUsers($action));
            if($users2->first())
                Notification::send($users2, new NotifyUsers($action2));


        Session::flash("msg", "تم ارسال التذكير بنجاح");
        return redirect("/admin/initiative/evaluteToInitiave/".$id);
    }

}
