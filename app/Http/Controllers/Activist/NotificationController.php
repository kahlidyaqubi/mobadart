<?php

namespace App\Http\Controllers\Activist;

use App\Notification;
use Session;

class NotificationController extends BaseController
{
    public function index()
    {
        $items = auth()->user()->notifications()->orderByDesc('created_at')->paginate(20);
        return view('activist.notifications.index', compact('items'));
    }

    public function delete($id)
    {

        $item = Notification::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/activist/notification");
        }
        $item->delete();
        Session::flash("msg", "تم حذف اشعار بنجاح");
        return redirect("/activist/notification");
    }

}
