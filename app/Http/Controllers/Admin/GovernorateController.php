<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Governorate;
use App\Http\Requests\GovernorateRequest;
use Illuminate\Http\Request;
use Session;

class GovernorateController extends BaseController
{

    public function index( Request $request)
    {
        $q = $request["q"]??"";

        $items=Governorate::whereRaw(true);

        if ($q)
            $items->whereRaw("(name like ?)"
                , ["%$q%"]);

        $items = Governorate::whereIn('id',$items->pluck('id'))->paginate(20)
            ->appends([
                "q" => $q ]);

        return view('admin.governorates.index',compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.governorates.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GovernorateRequest $request)
    {
        //
        Governorate::create(request()->all());

        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/admin/governorate/create");
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
        $item=Governorate::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/governorate");
        }

        return view('admin.governorates.edit',compact('item'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GovernorateRequest $request, $id)
    {
        //
        $item=Governorate::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/governorate");
        }
        $item->update($request->all());

        Session::flash("msg", "تمت عملية التعديل بنجاح");
        return redirect("/admin/governorate");
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
        $item=Governorate::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/governorate");
        }
        if ($item->cities->all()) {
            Session::flash("msg", "e:لا يمكن حذف محافظة بها مدن");
            return redirect("/admin/governorate");
        }
        $item->delete();
        Session::flash("msg", "تم حذف محافظة بنجاح");
        return redirect("/admin/governorate");
    }
    public function cityInGover($id,Request $request)
    {
        $item=Governorate::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/governorate");
        }
        $q = $request["q"]??"";

        $items=$item->cities()->whereRaw(true);

        if ($q)
            $items->whereRaw("(name like ?)"
                , ["%$q%"]);



        $items = City::whereIn('id',$items->pluck('id'))->paginate(20)
            ->appends([
                "q" => $q ]);

        $governorates=Governorate::all();
        return view('admin.governorates.cityInGover',compact('items','item','governorates'));


        //
    }
    public function ajaxCityInGover($id=null)
    {
        //
        if($id!=null)
        $cities=City::where('governorate_id',$id)->get();
        else
            $cities=City::get();
        return $cities;
    }

}
