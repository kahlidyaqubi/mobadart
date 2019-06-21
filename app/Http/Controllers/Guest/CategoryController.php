<?php

namespace App\Http\Controllers\Guest;

use App\Article;
use App\Category;
use App\Initiative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $q = $request["q"]??"";

        $items=Category::where('type',1)->whereRaw(true);

        if ($q)
            $items->whereRaw("(name like ?)"
                , ["%$q%"]);
        $items = Category::whereIn('id',$items->pluck('id'))->paginate(20)
            ->appends([
                "q" => $q ]);

        return view('guest.sections.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/no_accsess');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {

        $q = $request["q"] ?? "";
        $initiative_id = $request["initiative_id"] ?? "";


        $the_item = Category::find($id);
        if ($the_item == NULL) {
            return redirect("/no_accsess");
        }

        $items = $the_item->articles()->join('categories', 'categories.id', '=', 'articles.category_id')->select('articles.*')->whereRaw("true");
        if ($q)
            $items->whereRaw("(title like ?)"
                , ["%$q%"]);


        if ($initiative_id)
            $items->whereRaw("(initiative_id = ?)"
                , [$initiative_id]);

        $items = $items->orderBy("articles.id", 'desc')->paginate(6)->appends([
            "q" => $q, 'initiative_id' => $initiative_id]);

            $initiatives = Initiative::all();
        return view("guest.sections.show", compact('items','the_item', 'initiatives'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('/no_accsess');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
