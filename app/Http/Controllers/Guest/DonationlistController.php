<?php

namespace App\Http\Controllers\Guest;

use App\Country;
use App\DonationList;
use App\Http\Requests\DonationListsRequest;
use App\Initiative;
use App\Site_sting;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Controllers\Controller;
use App\User;
use App\Admin;
use App\Action;
use Notification;
use App\Notifications\NotifyUsers;

class DonationListController extends BaseController
{
    public function index()
    {
        return redirect('/no_accsess');
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
        if(!(in_array(request()['country'], Country::pluck('name')->toArray()))){
            Session::flash("msg", "e:يرجى ادخال اسم دولة صحيح");
            return redirect("/donationList/create")->withInput();
        }
        DonationList::create(request()->all());

        $donation_msg=Site_sting::find(1)->donation_msg;


        /*use App\User;
        use App\Admin;
        use App\Action;
        use DB;
        use Notification;
        use App\Notifications\NotifyUsers;*/

        $action = Action::create(['title' => 'تم ادخال تبرع جديد', 'type' => 'من زائر', 'link' => '/admin/donationList/']);
        $suber_admins_ids = User::whereIn('id', Admin::where('super_admin', 1)->pluck('user_id'))->pluck('id')->toArray();

        $have_prmission = User::whereIn('id', Admin::whereIn('id', DB::table('admins_links')->leftJoin("links", "link_id", "links.id")->where('links.title', 'إدارة التبرعات')->pluck('admin_id'))->pluck('user_id'))->pluck('id')->toArray();

        $users_ids = array_merge($suber_admins_ids, $have_prmission);

        $users = User::whereIn('id', $users_ids)->get();

        if($users->first())
            Notification::send($users, new NotifyUsers($action));
        /**************end Notification*******************/

        Session::flash("msg", " تم ارسال تبرع بنجاح  / $donation_msg ");
        return redirect("/donationList/create");
    }

    public function show($id)
    {
        return redirect('/no_accsess');
    }
    public function show_accept($id)
    {
        return redirect('/no_accsess');
    }

    public function edit($id)
    {
        return redirect('/no_accsess');
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
        return redirect('/no_accsess');
    }


}
