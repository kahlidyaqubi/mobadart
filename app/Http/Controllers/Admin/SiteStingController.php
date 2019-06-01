<?php

namespace App\Http\Controllers\Admin;

use App\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SiteStingController extends BaseController
{

    public function editSting()
    {
        //
    }
    public function editSting_post()
    {
        //
    }
    public function menuOrder()
    {
        $links = auth()->user()->admin->links()->where("in_menu", 1)->where("parent_id", 0)->where("mult_id", 0)->orderBy('order_id')->get();

        return view('admin.site.menuOrder', compact('links'));

    }

    public function menuOrder_post(Request $request)
    {
        unset(request()['_token']);
        $i=1;
        foreach (request()->all() as $id_link){
            Link::find($id_link)->update(['order_id'=>$i]);
            $i++;
        }
        Session::flash("msg", "تمت ترتيب القائمة بنجاح");
        return redirect("/admin/siteSting/menuOrder");
    }

}
