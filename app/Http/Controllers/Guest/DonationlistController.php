<?php

namespace App\Http\Controllers\Guest;

use App\Country;
use App\DonationList;
use App\Http\Requests\DonationListsRequest;
use App\Initiative;
use App\Site_sting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Controllers\Controller;

class DonationListController extends BaseController
{
    public function index()
    {
        //
    }

    public function create()
    {

        $site_bank_account=Site_sting::find(1)->bank_account;
        $initiatives = DB::table('initiatives')->whereRaw('initiatives.paid_up < initiatives.donation')->get();
        $countries= Country::all();
        return view('guest.donationList.create',compact('site_bank_account','countries','initiatives'));
    }

    public function store(DonationListsRequest $request)
    {
        request()['status']=0;
        DonationList::create(request()->all());

        $donation_msg=Site_sting::find(1)->donation_msg;

        Session::flash("msg", " تم ارسال تبرع بنجاح  / $donation_msg ");
        return redirect("/donationList/create");
    }

    public function show($id)
    {
        //
    }
    public function show_accept($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        //
    }


}
