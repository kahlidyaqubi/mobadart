<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Site_stingRequest;
use App\Link;
use App\Site_sting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SiteStingController extends BaseController
{

    public function editSting()
    {
        $item = Site_sting::find(1);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin");
        }

        return view('admin.site_sting.edit', compact('item'));
    }

    public function editSting_post(Site_stingRequest $request)
    {
        $item = Site_sting::find(1);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin");
        }
        if ($request->hasFile('the_img1')) {


            if (file_exists(public_path() . "" . $item->img1) && $item->img1 != null) {//اذا يوجد ملف قديم مخزن
                unlink(public_path() . "" . $item->img1);//يقوم بحذف القديم
            }

            $myfile = $request->file('the_img1'); // جلد الجديد من الانبوت فورم
            $filename = rand(11111, 99999) . '.' . $myfile->getClientOriginalExtension(); // جلب اسمه
            $myfile->move(public_path() . '/setting/', $filename);//يخزن الجديد في الموقع المحدد

            request()['img1'] = '/setting/' . $filename;
        }
        if ($request->hasFile('the_img2')) {

            if (file_exists(public_path() . "" . $item->img2) && $item->img2 != null) {//اذا يوجد ملف قديم مخزن
                unlink(public_path() . "" . $item->img2);//يقوم بحذف القديم
            }

            $myfile = $request->file('the_img2'); // جلد الجديد من الانبوت فورم
            $filename = rand(11111, 99999) . '.' . $myfile->getClientOriginalExtension(); // جلب اسمه
            $myfile->move(public_path() . '/setting/', $filename);//يخزن الجديد في الموقع المحدد

            request()['img2'] = '/setting/' . $filename;
        }
        if ($request->hasFile('the_img3')) {

            if (file_exists(public_path() . "" . $item->img3) && $item->img3 != null) {//اذا يوجد ملف قديم مخزن
                unlink(public_path() . "" . $item->img3);//يقوم بحذف القديم
            }

            $myfile = $request->file('the_img3'); // جلد الجديد من الانبوت فورم
            $filename = rand(11111, 99999) . '.' . $myfile->getClientOriginalExtension(); // جلب اسمه
            $myfile->move(public_path() . '/setting/', $filename);//يخزن الجديد في الموقع المحدد

            request()['img3'] = '/setting/' . $filename;
        }

        $item->update(request()->all());
        session::flash('msg', 's:تمت عميلة التعديل بنجاح');
        return redirect('/admin/siteSting/editSting');
    }

    public function menuOrder()
    {
        $links = auth()->user()->admin->links()->where("in_menu", 1)->where("parent_id", 0)->where("mult_id", 0)->orderBy('order_id')->get();

        return view('admin.site.menuOrder', compact('links'));

    }

    public function menuOrder_post(Request $request)
    {
        unset(request()['_token']);
        $i = 1;
        foreach (request()->all() as $id_link) {
            Link::find($id_link)->update(['order_id' => $i]);
            $i++;
        }
        Session::flash("msg", "تمت ترتيب القائمة بنجاح");
        return redirect("/admin/siteSting/menuOrder");
    }

}
