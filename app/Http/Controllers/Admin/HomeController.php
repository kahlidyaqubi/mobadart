<?php

namespace App\Http\Controllers\Admin;

use App\Family_center;
use App\Http\Requests\AdminProfileRequest;
use Illuminate\Http\Request;
use Session;
use App\User;
use App\Admin;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends BaseController
{

    public function  changePassword(){
        return view("admin.home.change-password");
    }

    public function changePassword_post(ChangePasswordRequest $request)
    {
        $credentials = [
            'email' => Auth::user()->email,
            'password' => $request->old_password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->password = bcrypt($request["password"]);
            $user->save();

            Session::flash("msg", "s:تم تغيير كلمة المرور بنجاح");
        } else {
            Session::flash("msg", "e: كلمة المرور الحالية غير صحيحة");
        }
        return redirect('/admin/changePassword');
    }

    public function noaccess(){
        return view('admin.home.noaccess');
    }

    public function show()
    {

        if(auth()->user()->admin->super_admin==1) {
            $type = 'مدير النظام';

        }
        else {
            $type = "المنشط";
        }
        $item=auth()->user()->admin;
        return view('admin.home.profile',compact('type','item'));
    }

    public function editProfile()
    {
        $item=auth()->user()->admin;
        $family_centers =Family_center::all();
        return view("admin.home.edit_profile", compact("item",'family_centers'));
    }

    public function editProfile_post(AdminProfileRequest $request){

        $item = auth()->user()->admin;

        if(!$item->super_admin){
            $testeroor=$this->validate($request,[
                'family_center_id'=>'required|max:3',

            ]);
        }

        $user = User::find($item->user_id);
        if ($request["password"] != "") {
            $user->password = bcrypt($request["password"]);
        }


        $item->update($request->all());
        $user->update($request->all());
        Session::flash("msg", "i:تمت عملية الحفظ بنجاح");
        return redirect("/admin");
    }

    public function hisArticle()
    {

    }

    public function hisInitiave()
    {

    }


}