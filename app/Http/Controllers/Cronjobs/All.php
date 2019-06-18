<?php

namespace App\Http\Controllers\Cronjobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Initiative;
use App\User;
use Validator;
use Carbon\Carbon;
use DB;
use App\Action;
use Notification;
use App\Notifications\NotifyUsers;

class All extends Controller
{

    public function cron_all()
    {

        /**************start Notification*******************/

        $notify_initiaves=DB::table('notify_initiaves')->pluck('initiative_id')->toArray();
        if(count($notify_initiaves)>0) {
            $initiatives = Initiative::where('end_date', '<=', Carbon::now())->whereNotIn('id',$notify_initiaves)->get();
        }else
            $initiatives = Initiative::where('end_date', '<=', Carbon::now())->get();

        foreach ($initiatives as $initiative){
            DB::table('notify_initiaves')->insert([ 'initiative_id' => $initiative->id]);
            $action = Action::create(['title' => "يرجى تقييم المبادرة $initiative->title ", 'type' => 'تذكير', 'link' => '/admin/initiative/'.$initiative->id]);
            $action2 = Action::create(['title' => "يرجى تقييم المبادرة $initiative->title ", 'type' => 'تذكير', 'link' => '/initiative/'.$initiative->id]);
            $have_prmission = User::where('id', $initiative->admin->user->id)->pluck('id')->toArray();
            $activsits_ids = User::whereIn('id', $initiative->activists()->pluck('user_id')->toArray())->pluck('id')->toArray();

            //$users_ids = array_merge($activsits_ids, $have_prmission);
            $users = User::whereIn('id', $have_prmission)->get();
            $users2 = User::whereIn('id', $activsits_ids)->get();
            if($users->first())
                Notification::send($users, new NotifyUsers($action));
            if($users2->first())
                Notification::send($users2, new NotifyUsers($action2));
        }

        /**************end Notification*******************/
        /**************start Notification*******************/


            $initiatives = Initiative::where('start_date', '=', date('Y-m-d'))->get();

        foreach ($initiatives as $initiative){
            $action = Action::create(['title' => "تبدأ اليوم أنشطة مبادرة $initiative->title ", 'type' => 'تذكير', 'link' => '/admin/initiative/'.$initiative->id]);
            $action2 = Action::create(['title' => "تبدأ اليوم أنشطة مبادرة $initiative->title ", 'type' => 'تذكير', 'link' => '/initiative/'.$initiative->id]);
            $have_prmission = User::where('id', $initiative->admin->user->id)->pluck('id')->toArray();
            $activsits_ids = User::whereIn('id', $initiative->activists()->pluck('user_id')->toArray())->pluck('id')->toArray();

            //$users_ids = array_merge($activsits_ids, $have_prmission);
            $users = User::whereIn('id', $have_prmission)->get();
            $users2 = User::whereIn('id', $activsits_ids)->get();
            if($users->first())
                Notification::send($users, new NotifyUsers($action));
            if($users2->first())
                Notification::send($users2, new NotifyUsers($action2));
        }

        return ('succses');
        /**************end Notification*******************/
    }

}
