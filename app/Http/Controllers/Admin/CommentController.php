<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use Session;


class CommentController extends BaseController
{
    public function index()
    {
        return redirect('/no_accsess');
    }

    public function create()
    {
        return redirect('/no_accsess');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
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
        $item=Comment::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/article");
        }
        $item->delete();
        Session::flash("msg", "تم حذف اهتمام بنجاح");
        return redirect("/admin/article/articlesComments/".$item->article->id);
    }

    public function accept($id)
    {
        $item = Comment::find($id);
        if ($item == NULL ||
            !(auth()->user()->admin->links->contains(\App\Link::where('title','=','حذف ومنع تعليقات')->first()->id))
        ) {
            return response()->json([
                'message' => 'الرجاء التاكد من الرابط المطلوب'
            ], 401);
        }
        if($item->status==0)
            $item->status=1;
        else
            $item->status=0;
        $item->save();
    }
}
