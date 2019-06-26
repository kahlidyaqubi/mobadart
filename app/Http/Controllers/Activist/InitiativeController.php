<?php

namespace App\Http\Controllers\Activist;

use App\Activists_initiative;
use App\Initiative;
use App\Site_sting;
use Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Validation\Rule;
use App\User;
use App\Admin;
use App\Action;
use Notification;
use App\Notifications\NotifyUsers;

class InitiativeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function application($id)
    {
        $item = Initiative::find($id);
        if ($item == NULL) {
            return redirect("/no_accsess");
        }
        if($item->activists->count() >= $item->activists_count){
            Session::flash("msg", "e: انتهى العدد المسموح للمشاركة في هذه المبادرة");
            return redirect("/initiative/".$item->id);
        }
        if($item->activists_initiatives->where('activist_id',auth()->user()->activist->id)->first()){
            Session::flash("msg", "e: انت منضم للمبادرة من قبل");
            return redirect("/initiative/".$item->id);
        }
        Activists_initiative::create(['initiative_id' => $id, 'activist_id' => auth()->user()->activist->id]);
/**************start Notification*******************/
        /*use App\User;
        use App\Admin;
        use App\Action;
        use DB;
        use Notification;
        use App\Notifications\NotifyUsers;*/

        $action = Action::create(['title' => ' طلب انضمام جديد لمبادرة'.$item->title, 'type' => 'من ناشط', 'link' => "/admin/initiative/activitsInInitiative/$id?accept=0"]);
        $suber_admins_ids = User::whereIn('id', Admin::where('super_admin', 1)->pluck('user_id'))->pluck('id')->toArray();

        $have_prmission = User::where('id', Admin::where('id', $item->admin_id)->pluck('user_id'))->pluck('id')->toArray();

        $users_ids = array_merge($suber_admins_ids, $have_prmission);

        $users = User::whereIn('id', $users_ids)->get();

        if ($users->first())
            Notification::send($users, new NotifyUsers($action));
        /**************end Notification*******************/

        Session::flash("msg", "".Site_sting::find(1)->accession_msg);
        return redirect("/initiative/".$item->id);
    }

    public function goOut($id)
    {
        $item = Initiative::find($id);
        if ($item == NULL) {
            return redirect("/no_accsess");
        }
        $aplic = Activists_initiative::where('initiative_id', '=', $id)->where('activist_id', '=', auth()->user()->activist->id)->first();
        if ($aplic) {
            $aplic->delete();
        }else{
            return redirect("/no_accsess");
        }
        Session::flash("msg", "تم الانسحاب من المبادرة بنجاح");
        return redirect("/initiative/".$item->id);


    }
}
