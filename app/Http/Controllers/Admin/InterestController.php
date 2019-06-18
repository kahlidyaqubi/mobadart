<?php

namespace App\Http\Controllers\Admin;

use App\Activists_interest;
use App\Http\Requests\InterestRequest;
use App\Initiatives_interest;
use App\Interest;
use Illuminate\Http\Request;
use Session;

class InterestController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        //

        $item = Interest::find($id);
        if ($item == NULL ||
            !(auth()->user()->admin->links->contains(\App\Link::where('title','=','تعديل اهتمام')->first()->id))
        ) {
            return response()->json([
                'message' => 'الرجاء التاكد من الرابط المطلوب'
            ], 401);
        }
		if($item->status==0)
			$item->status=1;
		else
			$item->status=0;
            $item->save();


    }
    public function index(Request $request)
    {
        $q = $request["q"]??"";
        $status=$request["status"] ?? "";


        $items=Interest::whereRaw(true);

        if ($q)
            $items->whereRaw("(name like ?)"
                , ["%$q%"]);


        if ($status || $status==='0') {
            $items->where('status',$status);
        }


        $items = Interest::whereIn('id',$items->pluck('id'))->paginate(20)
            ->appends([
                "q" => $q ,'status'=>$status ]);


        return view('admin.interests.index',compact('items','status'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterestRequest $request)
    {
        request()['status']=1;
        Interest::create(request()->all());

        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/admin/interest/create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Interest::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/interest");
        }

        return view('admin.interests.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InterestRequest $request, $id)
    {
        $item=Interest::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/interest");
        }

        $item->update($request->all());

        Session::flash("msg", "تمت عملية التعديل بنجاح");
        return redirect("/admin/interest");
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
        $item=Interest::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/interest");
        }
        Initiatives_interest::where('interest_id',$id)->delete();
        Activists_interest::where('interest_id',$id)->delete();
        $item->delete();
        Session::flash("msg", "تم حذف اهتمام بنجاح");
        return redirect("/admin/interest");
    }

}
