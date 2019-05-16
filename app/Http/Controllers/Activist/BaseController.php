<?php

namespace App\Http\Controllers\Activist;


use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
    
    
class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('checkPermissionTow');

    }
}