<?php

namespace App\Http\Controllers\Admin;


use Session;
use App\Http\Controllers\Controller;
    
    
class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
       $this->middleware('checkPermission');

    }
}