<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Family_center;
use App\Governorate;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;
use Session;

class CityController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request["q"]??"";
        $governorate_id=$request["governorate_id"] ?? "";


        $items=City::whereRaw(true);

        if ($q)
            $items->whereRaw("(name like ?)"
                , ["%$q%"]);


        if ($governorate_id) {
            $items->where('governorate_id',$governorate_id);
        }


        $items = City::whereIn('id',$items->pluck('id'))->paginate(20)
            ->appends([
                "q" => $q ,'governorate_id'=>$governorate_id ]);

        $governorates=Governorate::all();
        return view('admin.cities.index',compact('items','governorate_id','governorates'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $governorates=Governorate::all();
        return view('admin.cities.create',compact('governorates'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        //
        City::create(request()->all());

        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/admin/city/create");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/no_accsess');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=City::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/city");
        }

        $governorates=Governorate::all();
        return view('admin.cities.edit',compact('governorates','item'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $item=City::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/city");
        }
        $item->update($request->all());

        Session::flash("msg", "تمت عملية التعديل بنجاح");
        return redirect("/admin/city");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        //
        $item=City::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/city");
        }
        if ($item->family_centers->all()) {
            Session::flash("msg", "e:لا يمكن حذف مدينة بها مراكز عائلة");
            return redirect("/admin/city");
        }
		if ($item->activists->all()) {
            Session::flash("msg", "e:لا يمكن حذف مدينة بها ناشطين");
            return redirect("/admin/city");
        }
        $item->delete();
        Session::flash("msg", "تم حذف محافظة بنجاح");
        return redirect("/admin/city");
    }
    public function familyInCity($id,Request $request)
    {

        $item=City::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/city");
        }

        $q = $request["q"]??"";

        $items=$item->family_centers()->whereRaw(true);

        if ($q)
            $items->whereRaw("(name like ? )"
                , ["%$q%"]);


        $items = Family_center::whereIn('id',$items->pluck('family_centers.id'))->paginate(20)
            ->appends([
                "q" => $q ]);

        return view('admin.cities.familyInCity',compact('item','items'));
    }
}
