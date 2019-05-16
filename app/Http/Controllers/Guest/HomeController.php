<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Admin;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends BaseController
{
    
    public function mainPage()
    {
        return view('welcome');
    }

        
}