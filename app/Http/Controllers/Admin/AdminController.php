<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('admin.admins.index');
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
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

    public function initiaveToAdmin($id)
    {
        //
    }

    public function articleToAdmin($id)
    {
        //
    }

    public function demanReplayedToAdmin($id)
    {
        //
    }

    public function demandToAdmin($id)
    {
        //
    }

    public function permission($id)
    {
        //
    }
    public function permission_post($id)
    {
        //
    }
    public function hisCategoty($id)
    {
        //
    }
    public function hisCategoty_post($id)
    {
        //
    }
}
