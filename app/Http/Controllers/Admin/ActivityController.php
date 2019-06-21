<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Http\Requests\ActivityRequest;
use Illuminate\Http\Request;

class ActivityController extends BaseController
{
    public function index(Request $request)
    {
        $id = $request['id'];
        $item = auth()->user()->admin->initiatives->find($id);
        if ($item == NULL) {
            return response()->json(["status"=>0, "msg"=>'رقم المبادرة غير صحيح']);
        }
        $activities = $item->activities()->paginate(4)->appends([
            "id" => $id]);

        return $activities;
    }

    public function create()
    {
        return redirect('/no_accsess');
    }

    public function store(ActivityRequest $request)
    {

        Activity::create($request->all());
        return response()->json(["msg"=>'تم إنشاء نشاط بنجاح']);
    }

    public function show($id)
    {
        return redirect('/no_accsess');
    }

    public function edit($id)
    {
        return redirect('/no_accsess');
    }

    public function update(ActivityRequest $request, $id)
    {

        $activity = Activity::find($id);
        if(!$activity){
            return response()->json(["status"=>0, "msg"=>'رقم النشاط غير صحيح']);
        }
        $activity->update($request->all());
        return response()->json([
            "status"=>1,
            "msg"=>'تم تعديل نشاط بنجاح'
        ]);
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $activity = Activity::find($id);
        $activity->delete();
        return response()->json(["msg"=>"تم حذف نشاط بنجاح"]);
    }

}
