<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Admin;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends BaseController
{

    public function changePassword()
    {

    }

    public function show()
    {
        if(auth()->user()->admin->super_admin==1)
            $type='مدير النظام';
        else
            $type="المنشط";
        return view('admin.home.profile',compact('type'));
    }

    public function editProfile()
    {

    }

    public function hisArticle()
    {

    }

    public function hisInitiave()
    {

    }


}