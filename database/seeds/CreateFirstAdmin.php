<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateFirstAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {


        /*************************/
        $user_id = DB::table('users')->insertGetId([
            'name' => 'admin11',
            'email' => 'khalid.yaqubi.94@gmail.com',
            'password' => bcrypt('12345678'),
            
        ]);

        $admin_id = DB::table('admins')->insertGetId([
            'full_name' => 'admin',
            'mobile' => '+972 599 624984',
            'user_id' => $user_id,
        ]);
        $link_id = DB::table('links')->insertGetId([
            'title' => 'admins',
            'icon' => 'icon-diamond',//https://fontawesome.com/v4.7.0/icons/
            'parent_id' => 0,
            'show' => 1,
            'url' => '',
        ]);
        $link2 = DB::table('links')->insertGetId([
            'title' => 'admins control',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/account/account',
        ]);
        /*************************************************/
        DB::table('admins_links')->insertGetId([
            'admin_id' => $admin_id,
            'link_id' => $link_id,
        ]);
        /************************************/
}
    
}
