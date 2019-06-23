<?php

namespace App\Http\Controllers\Guest;

use App\Article;
use App\Category;
use App\Initiative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $q = $request["q"] ?? "";
        $category_id = $request["category_id"] ?? "";
        $initiative_id = $request["initiative_id"] ?? "";
        $items = Article::join('categories', 'categories.id', '=', 'articles.category_id')->select('articles.*')->whereRaw("true");
        if ($q)
            $items->whereRaw("(title like ?)"
                , ["%$q%"]);
        if ($category_id)
            $items->whereRaw("(category_id = ?)"
                , [$category_id]);


        if ($initiative_id)
            $items->whereRaw("(initiative_id = ?)"
                , [$initiative_id]);

        $items = $items->orderBy("articles.id", 'desc')->paginate(20)->appends([
            "q" => $q, "category_id" => $category_id, 'initiative_id' => $initiative_id]);

            $categories = Category::where('type', '1')->get();
            $initiatives = Initiative::all();
        return view("guest.articles.index", compact('items', 'categories', 'initiatives'));

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
    public function show($id)
    {
        $item = Article::find($id);
        if ($item == NULL) {
            return redirect("/no_accsess");
        }
        $article_files=$item->article_files;

        return view('guest.articles.show', compact('item','article_files'));

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
