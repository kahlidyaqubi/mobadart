<?php

namespace App\Http\Controllers\Activist;

use App\Activists_initiative;
use App\Initiative;
use App\Site_sting;
use Session;
use Illuminate\Http\Request;

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
