<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use Session;

class MessageController extends BaseController
{

	  public function show($id)
    {
        $item = Message::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/siteSting/message");
        }

        return view('admin.messages.show', compact('item'));
    }
	public function index(Request $request)
    {
        $q = $request["q"] ?? "";
        $created_at = $request["created_at"] ?? "";
        $items = Message::whereRaw("true");
        if ($items == null) {
            session::flash('msg', 'w:نأسف لا يوجد بيانات لعرضها');
            return redirect('/admin/siteSting/message');
        }

        if ($q)
            $items->whereRaw("(name like ? or content like ? or email like ? or mopile like ?)"
                , ["%$q%", "%$q%", "%$q%", "%$q%"]);
        if ($created_at)
            $items = $items->whereRaw("created_at = ?", [$created_at]);

        $items = $items->orderBy("id", "desc")->paginate(12)->appends([
            "q" => $q, "created_at" => $created_at]);
        return view("admin.messages.index", compact('items'));
    }
	 public function destroy($id)
    {

    }
    public function delete($id)
    {
        $item = Message::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/siteSting/message");
        }
        $item->delete();
        Session::flash("msg", "تم حذف رسالة بنجاح");
        return redirect("/admin/siteSting/message");
    }
}