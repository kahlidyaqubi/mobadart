<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\City;
use App\Family_center;
use App\Governorate;
use App\Http\Requests\Family_centerRequest;
use Illuminate\Http\Request;
use Session;

class Family_centerController extends BaseController
{
   public function index( Request $request)
    {
        $q = $request["q"]??"";
        $city_id = $request["city_id"] ?? "";
        $governorate_id=$request["governorate_id"] ?? "";


        $items=Family_center::leftJoin('cities','city_id','cities.id')->whereRaw(true);

        if ($q)
            $items->whereRaw("(family_centers.name like ? or family_centers.manager_name like ? or family_centers.mobile like ?)"
                , ["%$q%","%$q%","%$q%"]);

        if ($city_id)
            $items->where('cities.id','=',$city_id);

        if (($governorate_id)&&!($city_id)) {
            $cities_ids=City::where('governorate_id',$governorate_id)->pluck('id')->toArray();
            $items->whereIN('cities.id', $cities_ids);
        }


        $items = Family_center::whereIn('id',$items->pluck('family_centers.id'))->paginate(20)
            ->appends([
                "q" => $q , "city_id" => $city_id ,'governorate_id'=>$governorate_id ]);

        $cities=City::all();
        $governorates=Governorate::all();

        return view('admin.family_centers.index',compact('items','governorate_id','governorates','cities','city_id'));

    }

    public function create()
    {
        //
        $cities=City::all();
        $governorates=Governorate::all();
        return view('admin.family_centers.create',compact('governorates','cities'));


    }

    public function store(Family_centerRequest $request)
    {
        //
        Family_center::create(request()->all());

        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/admin/family_center/create");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $item=Family_center::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/family_center");
        }

        $cities=City::all();
        $governorates=Governorate::all();
        return view('admin.family_centers.edit',compact('governorates','cities','item'));

    }

    public function update(Family_centerRequest $request, $id)
    {
        //
        $item=Family_center::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/family_center");
        }
        $item->update($request->all());

        Session::flash("msg", "تمت عملية التعديل بنجاح");
        return redirect("/admin/family_center");
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        //
        $item=Family_center::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/family_center");
        }
        if ($item->admins->all()) {
            Session::flash("msg", "e:لا يمكن حذف مركز عائلة به منشطين");
            return redirect("/admin/family_center");
        }
        $item->delete();
        Session::flash("msg", "تم حذف مركز عائلة بنجاح");
        return redirect("/admin/family_center");
    }

    public function adminInFamily($id,Request $request)
    {
        $item=Family_center::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/family_center");
        }

        $q = $request["q"]??"";


        $items=$item->admins()->leftJoin('users','user_id','users.id')->whereRaw(true);

        if ($q)
            $items->whereRaw("(users.name like ? or users.email like ? or users.user_name like ? or admins.mobile like ?)"
                , ["%$q%","%$q%","%$q%","%$q%"]);

        $items = Admin::whereIn('id',$items->pluck('admins.id'))->orderBy("admins.id")->paginate(20)
            ->appends([
                "q" => $q ]);

        return view('admin.family_centers.adminInFamily',compact('items','item'));
    }

    public function initiaveInFamily($id)
    {
        //
    }
}
