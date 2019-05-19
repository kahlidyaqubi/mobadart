<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Family_center;
use App\Http\Requests\AdminRequest;
use App\Link;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        $q = $request["q"]??"";
        $super_admin = $request["super_admin"] ?? "";
        $family_center_id = $request["family_center_id"] ?? "";


        $items=Admin::leftJoin('users','user_id','users.id')->leftJoin('family_centers','family_center_id','family_centers.id')->whereRaw(true);

        if ($q)
            $items->whereRaw("(users.name like ? or users.email like ? or users.user_name like ? or admins.mobile like ?)"
                , ["%$q%","%$q%","%$q%","%$q%"]);
        if ($super_admin ||$super_admin==='0' )
            $items->where('super_admin','=',$super_admin);

        if ($family_center_id)
            $items->where('family_centers.id','=',$family_center_id);



        $items = Admin::whereIn('id',$items->pluck('admins.id'))->orderBy("admins.id")->paginate(20)
            ->appends([
                "q" => $q , "super_admin" => $super_admin , "family_center_id"=>$family_center_id]);

        $family_centers=Family_center::all();
        return view('admin.admins.index',compact('items','family_centers','super_admin','family_center_id'));
    }
    public function create()
    {
        //
        $family_centers=Family_center::all();
        return view('admin.admins.create',compact('family_centers'));
    }

    public function store(AdminRequest $request)
    {
        //
        if(!request()->super_admin){
            $testeroor=$this->validate($request,[
                'family_center_id'=>'required|max:3',

            ]);
        }
        $testeroor=$this->validate($request,[

            'password'=>'required|min:6',

        ]);
        $user_id = User::create([
            'name' => request()->name,
            'user_name' => request()->user_name,
            'email' => request()->email,
            'the_type' => 1,
            'password' => bcrypt(request()->password),
        ])->id;
        request()['user_id']=$user_id;
        Admin::create(request()->all());

        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/admin/admin/create");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $item=Admin::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }
        $family_centers=Family_center::all();
        return view('admin.admins.edit',compact('family_centers','item'));
    }

    public function update(AdminRequest $request, $id)
    {
        //
        $item=Admin::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }
        $user = User::find($item->user_id);
        if ($request["password"] != "") {
            $user->password = bcrypt($request["password"]);
        }
        $user->name = $request["name"];
        $user->email = $request["email"];
        $user->user_name = $request["user_name"];
        $user->save();

        $item->update($request->all());

        Session::flash("msg", "تمت عملية التعديل بنجاح");
        return redirect("/admin/admin");
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        //
        $item=Admin::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }
        if (auth()->user()->admin->id == $item->id) {
            Session::flash("msg", "e:لا يمكن لصاحب الحساب حذف نفسه");
            return redirect("/admin/admin");
        }

        $adminlink = DB::table('admins_links')->whereIn('admin_id', [$item->id])->pluck('id');
        if (count($adminlink) > 0)
            DB::table('admins_links')->whereIn('id', $adminlink)->delete();
        $theuser = $item->user;
        $item->delete();
        $theuser->delete();
        Session::flash("msg", "تم حذف حساب بنجاح");
        return redirect("/admin/admin");

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
        $item=Admin::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }

        $super_links=Link::where('super','=',1)->where("parent_id",0)->get();
        $other_links=Link::where('super','!=',1)->where("parent_id",0)->get();

        return view('admin.admins.permission',compact('other_links','super_links','item'));

    }
    public function permission_post(Request $request,$id)
    {
        //
        \DB::table("admins_links")->where("admin_id", $id)->delete();
        if ($request["permission"]) {
            foreach ($request["permission"] as $link)
                \DB::table("admins_links")->insert(["admin_id" => $id,
                    "link_id" => $link]);
        }
        Session::flash("msg", "i:تمت حفظ الصلاحيات بنجاح");
        return redirect("/admin/admin");
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
