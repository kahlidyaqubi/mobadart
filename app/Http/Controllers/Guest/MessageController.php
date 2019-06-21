<?php

namespace App\Http\Controllers\Guest;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class MessageController extends Controller
{

	  public function create($id)
    {
        return redirect('/no_accsess');
    }
	public function store(Request $request)
    {
        Message::create(request()->all());

        Session::flash("msg", "تمت ارسال رسالة بنجاح");
        return redirect("/#contact");
    }
}