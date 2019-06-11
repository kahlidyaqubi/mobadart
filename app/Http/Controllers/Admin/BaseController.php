<?php

namespace App\Http\Controllers\Admin;


use Session;
use App\Http\Controllers\Controller;
    
    
class BaseController extends Controller
{
    //http://127.0.0.1:8000/admin/governorate/ajaxCityInGover/1
    public function __construct()
    {

       $this->middleware('auth')->except('ajaxCityInGover');
       $this->middleware('checkPermission')->except('ajaxCityInGover');

    }
}