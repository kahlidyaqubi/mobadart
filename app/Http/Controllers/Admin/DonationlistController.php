<?php

namespace App\Http\Controllers\Admin;

use App\DonationList;
use App\Initiative;
use Illuminate\Http\Request;
use Session;

class DonationListController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request["q"] ?? "";
        $status = $request["status"] ?? "";
        $initiative_id = $request["initiative_id"] ?? "";

        $items = DonationList::whereRaw(true);

        if ($q)
            $items->whereRaw("(financier_name like ? or financier_email like ? or financier_phone like ?
            or bank_account like ?)"
                , ["%$q%", "%$q%", "%$q%", "%$q%"]);


        if ($status || $status === '0') {
            if ($status == '0')
                $items->where('accept_amount', '<=', 0);
            else
                $items->where('accept_amount', '>', 0);
        }

        if ($initiative_id)
            $items->whereRaw("(initiative_id = ?)"
                , [$initiative_id]);

        $items = DonationList::whereIn('id', $items->pluck('id'))->paginate(20)
            ->appends([
                "q" => $q, 'status' => $status, 'initiative_id' => $initiative_id]);
        $admin = auth()->user()->admin;
        if (!$admin->super_admin == 1) {
            $initiatives = $admin->initiatives->all();
        } else {
            $initiatives = Initiative::all();
        }

        return view('admin.donation_lists.index', compact('items', 'initiatives'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = DonationList::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/donationList");
        }
        return view('admin.donation_lists.edit', compact('item'));

    }

    public function update(Request $request, $id)
    {
        $item = DonationList::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/donationList");
        }
        if ($request['accept_amount']) {
            if ($request['accept_amount'] < 0) {
                Session::flash("msg", "e:لا يمكن أن يكون المبلغ أقل من صفر");
                return redirect("/admin/donationList");
            }
            $initiative = Initiative::find($item->initiative_id);
            $mount = ($initiative->paid_up - $item->accept_amount + $request['accept_amount']);
            $initiative->update(['paid_up' => $mount]);
            $item->update(['accept_amount' => $request['accept_amount']]);

            Session::flash("msg", "تم تعديل خبر بنجاح");
            return redirect("/admin/donationList");
        }
        return redirect("/admin/donationList");
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $item = DonationList::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:يرجى التأكد من الرابط المطلوب");
            return redirect("/admin/donationList");
        }
        if ($item->accept_amount > 0) {
            Session::flash("msg", "e:لا يمكن حذف تبرع معتمد");
            return redirect("/admin/donationList");
        }
        $item->delete();
        Session::flash("msg", "تم حذف تبرع بنجاح");
        return redirect("/admin/donationList");
    }


}
