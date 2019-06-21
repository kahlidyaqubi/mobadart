<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Initiative;
use Illuminate\Http\Request;
use Session;

class CategoryArticleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $q = $request["q"]??"";

        $items=Category::where('type',1)->whereRaw(true);

        if ($q)
            $items->whereRaw("(name like ?)"
                , ["%$q%"]);
        $items = Category::whereIn('id',$items->pluck('id'))->paginate(20)
            ->appends([
                "q" => $q ]);

        return view('admin.categories_article.index',compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories_article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        request()['type']=1;
        Category::create(request()->all());

        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/admin/categoryArticle/create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/no_accsess');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Category::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/categoryArticle");
        }
        if ($item->id==1) {
            Session::flash("msg", "e:فئة تجارب ملهمة مثبة في النظام");
            return redirect("/admin/categoryArticle");
        }

        return view('admin.categories_article.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $item=Category::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/categoryArticle");
        }
        if ($item->id==1) {
            Session::flash("msg", "e:فئة تجارب ملهمة مثبة في النظام");
            return redirect("/admin/categoryArticle");
        }

        $item->update($request->all());

        Session::flash("msg", "تمت عملية التعديل بنجاح");
        return redirect("/admin/categoryArticle");
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
    public function delete($id)
    {
        $item=Category::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/categoryArticle");
        }
        if ($item->id==1) {
            Session::flash("msg", "e:فئة تجارب ملهمة مثبة في النظام");
            return redirect("/admin/categoryArticle");
        }
        if ($item->articles->all()) {
            Session::flash("msg", "e:لا يمكن حذف فئة طلبات عليها طلبات");
            return redirect("/admin/categoryArticle");
        }
        $item->delete();
        Session::flash("msg", "تم حذف فئة بنجاح");
        return redirect("/admin/categoryArticle");
    }
    public function articlesInCate($id,Request $request)
    {
        $q = $request["q"] ?? "";
        $initiative_id = $request["initiative_id"] ?? "";
        $the_item=Category::find($id);
        if ($the_item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }
        $items = $the_item->articles()->join('categories', 'categories.id', '=', 'articles.category_id')->select('articles.*')->whereRaw("true");
        if ($q)
            $items->whereRaw("(title like ?)"
                , ["%$q%"]);

        if ($initiative_id)
            $items->whereRaw("(initiative_id = ?)"
                , [$initiative_id]);

        $items = $items->orderBy("articles.id", 'desc')->paginate(12)->appends([
            "q" => $q,'initiative_id' => $initiative_id]);
        $admin = auth()->user()->admin;
        if (!$admin->super_admin == 1) {
            $categories = $admin->categories->all();
            $initiatives = $admin->initiatives->all();
        } else {
            $categories = Category::where('type', '1')->get();
            $initiatives = Initiative::all();
        }
        return view("admin.categories_article.articleToCategory", compact('items','the_item', 'categories', 'initiatives'));

    }
}
