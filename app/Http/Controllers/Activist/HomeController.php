<?php

namespace App\Http\Controllers\Activist;

use Illuminate\Http\Request;
use Session;
use App\Activist;

class HomeController extends BaseController
{

    public function changePassword()
    {

    }

    public function show()
    {
      return "activist";
    }
    public function noaccess()
    {
        return "no access";
    }
    public function editProfile()
    {

    }

    public function hisDemand()
    {

    }

    public function hisInitiave()
    {

    }

        
}