<?php

namespace App\Http\Controllers\Activist;

use App\Activists_initiative;
use App\Http\Requests\Initiative_evaluationRequest;
use App\Initiative;
use App\Initiative_evaluation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class EvalutionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $initiative_id = $request["initiative_id"] ?? "";

        $items=auth()->user()->activist->initiative_evaluations()->whereRaw(true);

        if ($initiative_id) {
            $items->whereRaw("(initiative_id = ?)"
                , [$initiative_id]);
        }

        $items = Initiative_evaluation::whereIn('id', $items->pluck('initiative_evaluation.id'))->paginate(20)
            ->appends([ 'initiative_id' => $initiative_id]);

        $initiatives = auth()->user()->activist->initiatives->all();
        return view('activist.initiative_evaluation.index',compact('items','initiatives'));
    }

    public function create(Request $request)
    {
        if (request()['initiative_id']) {
            $the_item=Initiative::find(request()['initiative_id']);
            $shared = Activists_initiative::where('activist_id', auth()->user()->activist->id)
                ->where('initiative_id', request()['initiative_id'])
                ->where('accept', 1)
                ->first();
            if ($shared) {
                $initiative = $shared->initiative()->where('end_date', '<=', Carbon::now())->first();
                if ($initiative) {
                    if ($initiative->initiative_evaluations->where('activist_id', auth()->user()->activist->id)->first()) {
                        Session::flash("msg", "e:لقد قمت بتقييم المبادرة من قبل");
                        return redirect("/initiative/" . request()['initiative_id']);
                    } else {
                        return view('activist.initiative_evaluation.create',compact('the_item'));
                    }
                } else {
                    dd('1');
                    return redirect("/no_accsess");
                }

            } else {
                dd('2');
                return redirect("/no_accsess");
            }

        } else {
            dd('3');
            return redirect("/no_accsess");
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Initiative_evaluationRequest $request)
    {
        request()['activist_id']=auth()->user()->activist->id;
        Initiative_evaluation::create(request()->all());

        Session::flash("msg", "تمت ادخال التقييم بنجاح");
        return redirect("/initiative/" . request()['initiative_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Initiative_evaluation::find($id);
        if ($item == NULL || $item->activist_id == null || auth()->user()->activist->id !=$item->activist_id) {
            return redirect("/no_accsess");
        }
        $the_item=Initiative::find($item->initiative_id);

        return view('activist.initiative_evaluation.show', compact('item','the_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('/no_accsess');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        return redirect('/no_accsess');
    }

    public function printEval($id)
    {
        return redirect('/no_accsess');
    }
}
