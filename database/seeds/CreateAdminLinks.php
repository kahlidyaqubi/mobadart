<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateAdminLinks extends Seeder
{

    /*
    You need to put SongsTableSeeder into file SongsTableSeeder.php in the same directory where you have your DatabaseSeeder.php file.

    And you need to run in your console:

    composer dump-autoload
    to generate new class map and then run:

    php artisan db:seed
    */

    public function run()
    {
        /*******************الاعدادات ************************//*mult*/
        $mult_id = DB::table('links')->insertGetId([
            'title' => 'الاعدادات',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'in_menu' => 1,
            'link' => '',
            'mult' => 1,
            'order_id' => 15,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة الحسابات*********************/
        $alink_id = DB::table('links')->insertGetId([
            'title' => 'الحسابات',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 1,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $alink1 = DB::table('links')->insertGetId([
            'title' => 'إدارة الحسابات',
            'icon' => 'icon-diamond',
            'parent_id' => $alink_id,
            'in_menu' => 1,
            'link' => '/admin/admin',
            'order_id' => 1,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $alink2 = DB::table('links')->insertGetId([
            'title' => 'إضافة حساب',
            'icon' => 'icon-diamond',
            'parent_id' => $alink_id,
            'in_menu' => 1,
            'link' => '/admin/admin/create',
            'order_id' => 1,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $alink3 = DB::table('links')->insertGetId([
            'title' => 'تعديل حساب',
            'icon' => 'icon-diamond',
            'parent_id' => $alink_id,
            'in_menu' => 0,
            'link' => '/admin/admin/edit',
            'order_id' => 1,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $alink4 = DB::table('links')->insertGetId([
            'title' => 'صلاحيات حساب',
            'icon' => 'icon-diamond',
            'parent_id' => $alink_id,
            'in_menu' => 0,
            'link' => '/admin/admin/permission',
            'order_id' => 1,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $alink5 = DB::table('links')->insertGetId([
            'title' => 'عرض حساب',
            'icon' => 'icon-diamond',
            'parent_id' => $alink_id,
            'in_menu' => 0,
            'link' => '/admin/admin/show',
            'order_id' => 1,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $alink6 = DB::table('links')->insertGetId([
            'title' => 'حذف حساب',
            'icon' => 'icon-diamond',
            'parent_id' => $alink_id,
            'in_menu' => 0,
            'link' => '/admin/admin/delete',
            'order_id' => 1,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة المبادرات*********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'المبادرات',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 2,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إدارة المبادرات',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/initiative',
            'order_id' => 2,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إضافة مبادرة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/initiative/create',
            'order_id' => 2,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'تعديل مبادرة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/initiative/edit',
            'order_id' => 2,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'قبول منضمين',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/initiative/acceptActivit',
            'order_id' => 2,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'عرض مبادرة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/initiative/show',
            'order_id' => 2,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف مبادرة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/initiative/delete',
            'order_id' => 2,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة الأنشطة*********************/

        $link1 = DB::table('links')->insertGetId([
            'title' => 'إنشاء نشاط',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/activity/create',
            'order_id' => 2,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'تعديل نشاط',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/activity/edit',
            'order_id' => 2,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف نشاط',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/activity/delete',
            'order_id' => 2,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة التبرعات*********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'التبرعات',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 3,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إدارة التبرعات',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/donationList',
            'order_id' => 3,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'اعتماد تبرع',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/donationList/edit',
            'order_id' => 3,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف تبرع',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/donationList/delete',
            'order_id' => 3,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة مراكز العائلة*********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'مراكز العائلة',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'mult_id' => $mult_id,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 4,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إدارة مراكز العائلة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/family_center',
            'order_id' => 4,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إضافة مراكز العائلة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/family_center/create',
            'order_id' => 4,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'تعديل مركز عائلة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/family_center/edit',
            'order_id' => 4,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف مركز عائلة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/family_center/delete',
            'order_id' => 4,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة النشطاء *********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'النشطاء',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 5,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إدارة النشطاء',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/activsit',
            'order_id' => 5,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إضافة ناشط',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/activsit/create',
            'order_id' => 5,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'تعديل ناشط',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/activsit/edit',
            'order_id' => 4,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'عرض ناشط',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/activsit/show',
            'order_id' => 5,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف ناشط',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/activsit/delete',
            'order_id' => 5,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة التقيمات *********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'التقييمات',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 6,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إدارة التقيمات',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/evalution',
            'order_id' => 6,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'عرض تقييم',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/evalution/show',
            'order_id' => 6,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف تقييم',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/evalution/delete',
            'order_id' => 6,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة الأخبار*********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'الأخبار',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 7,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إدارة الأخبار',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/article',
            'order_id' => 7,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إضافة خبر',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/article/create',
            'order_id' => 7,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'تعديل خبر',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/article/edit',
            'order_id' => 7,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف ومنع تعليقات',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/comment/delete',
            'order_id' => 7,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف خبر',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/article/delete',
            'order_id' => 7,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة النماذج*********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'النماذج',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'in_menu' => 0,
            'link' => '',
            'order_id' => 8,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إدارة النماذج',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/demand',
            'order_id' => 8,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إضافة نموذج',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/demand/create',
            'order_id' => 8,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إضافة رد',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/replay/create',
            'order_id' => 8,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'عرض النموذج',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/demand/show',
            'order_id' => 8,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف نموذج',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/demand/delete',
            'order_id' => 8,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة الاهتمامات*********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'الاهتمامات',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'mult_id' => $mult_id,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 9,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إدارة الاهتمامات',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/interest',
            'order_id' => 9,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إضافة اهتمام',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/interest/create',
            'order_id' => 9,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'تعديل اهتمام',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/interest/edit',
            'order_id' => 9,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف اهتمام',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/interest/delete',
            'order_id' => 9,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة المدن*********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'المدن',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'mult_id' => $mult_id,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 10,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إدارة المدن',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/city',
            'order_id' => 10,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إضافة مدينة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/city/create',
            'order_id' => 10,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'تعديل مدينة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/city/edit',
            'order_id' => 10,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف مدينة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/city/delete',
            'order_id' => 10,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة المحافظات*********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'المحافظات',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'mult_id' => $mult_id,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 11,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إدارة المحافظات',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/governorate',
            'order_id' => 11,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إضافة محافظة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/governorate/create',
            'order_id' => 11,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'تعديل محافظة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/governorate/edit',
            'order_id' => 11,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف محافظة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/governorate/delete',
            'order_id' => 11,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة فئات النماذج*********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'فئات النماذج',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'mult_id' => $mult_id,
            'in_menu' => 0,
            'link' => '',
            'order_id' => 12,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إدارة فئات النماذج',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/categoryDemand',
            'order_id' => 12,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إضافة فئة نماذج',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/categoryDemand/create',
            'order_id' => 12,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'تعديل فئة نماذج',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/categoryDemand/edit',
            'order_id' => 12,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف فئة نماذج',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/categoryDemand/delete',
            'order_id' => 12,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************فئات الأخبار*********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'فئات الأخبار',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'mult_id' => $mult_id,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 12,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إدارة فئات الأخبار',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/categoryArticle',
            'order_id' => 12,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'إضافة فئة أخبار',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/categoryArticle/create',
            'order_id' => 12,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'تعديل فئة أخبار',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/categoryArticle/edit',
            'order_id' => 12,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف فئة أخبار',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/categoryArticle/delete',
            'order_id' => 12,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);

        /********************إدارة الموقع*********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'اعدادات الموقع',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'mult_id' => $mult_id,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 13,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'رسائل الزوار',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/siteSting/message',
            'order_id' => 13,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'حذف رسائل الزوار',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 0,
            'link' => '/admin/siteSting/message/delete',
            'order_id' => 13,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'تعديل معلومات الموقع',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/siteSting/editSting',
            'order_id' => 13,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'تعديل ترتيب القائمة',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/siteSting/menuOrder',
            'order_id' => 13,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        /********************إدارة الرسزوم*********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'الرسوم البيانية',
            'icon' => 'icon-diamond',
            'parent_id' => 0,
            'in_menu' => 1,
            'link' => '',
            'order_id' => 14,
            'super' => 0,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'التبرع للمبادرات',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/chart',
            'order_id' => 14,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'النشطاء للإهتمامات',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/chart/activistTOInterests',
            'order_id' => 14,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'النشطاء في المبادرات',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/chart/activistTOInitiatives',
            'order_id' => 14,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'النشطاء في المدن',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/chart/activistTOCities',
            'order_id' => 14,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'الأعمار للنشطاء',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/chart/ageTOActivists',
            'order_id' => 14,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);
        $link1 = DB::table('links')->insertGetId([
            'title' => 'الجنس للنشطاء',
            'icon' => 'icon-diamond',
            'parent_id' => $link_id,
            'in_menu' => 1,
            'link' => '/admin/chart/genderTOActivists',
            'order_id' => 14,
            'super' => 1,
            'new_window' => 0,
            'route' => '',
        ]);

        /****************************************************************************/
        /*****انشاء مدير***/
        $user_id = DB::table('users')->insertGetId([
            'name' => 'khalid',
            'user_name' => 'admin',
            'email' => 'khalid.yaqubi.94@gmail.com',
            'the_type' => 1,
            'password' => bcrypt('12345678'),

        ]);

        $a_admin_id = DB::table('admins')->insertGetId([
            'super_admin' => 1,
            'mobile' => '+972 599 636064',
            'user_id' => $user_id,
        ]);
        /*****منشط مدير***/
        $user_id = DB::table('users')->insertGetId([
            'name' => 'rami',
            'user_name' => 'bink_92',
            'email' => 'bink_92@hotmail.com',
            'the_type' => 1,
            'password' => bcrypt('12345678'),

        ]);
        $admin_id = DB::table('admins')->insertGetId([
            'super_admin' => 0,
            'mobile' => '+972 599 624984',
            'user_id' => $user_id,
            'family_center_id' => 1
        ]);
        /*****ناشط حساب***/
        $user_id = DB::table('users')->insertGetId([
            'name' => 'zaaer',
            'user_name' => 'fotnail',
            'email' => 'fotnail@hotmail.com',
            'the_type' => 2,
            'password' => bcrypt('12345678'),

        ]);
        $activist_id = DB::table('activists')->insertGetId([
            'city_id' => 1,
            'mobile' => '+972 599 624984',
            'user_id' => $user_id,
            'neighborhood' => 'hosameya',
            'brth_day' => '2019-05-01',
            'gender' => 'M',
            'face_url' => 'https://www.facebook.com/khaled.yaqubi.3',
            'ido' => '400012345',

        ]);
        /*****صلاحية مدير***/
        DB::table('admins_links')->insertGetId([
            'admin_id' => $a_admin_id,
            'link_id' => $alink_id,
        ]);
        DB::table('admins_links')->insertGetId([
            'admin_id' => $a_admin_id,
            'link_id' => $alink1,
        ]);
        DB::table('admins_links')->insertGetId([
            'admin_id' => $a_admin_id,
            'link_id' => $alink2,
        ]);
        DB::table('admins_links')->insertGetId([
            'admin_id' => $a_admin_id,
            'link_id' => $alink3,
        ]);
        DB::table('admins_links')->insertGetId([
            'admin_id' => $a_admin_id,
            'link_id' => $alink4,
        ]);
        DB::table('admins_links')->insertGetId([
            'admin_id' => $a_admin_id,
            'link_id' => $alink5,
        ]);
        DB::table('admins_links')->insertGetId([
            'admin_id' => $a_admin_id,
            'link_id' => $mult_id,
        ]);
        /**************مركز عائلة*************/
        $governorate_id = DB::table('governorates')->insertGetId([
            'name' => 'غزة',
        ]);
        $city_id = DB::table('cities')->insertGetId([
            'name' => 'غزة',
            'governorate_id' => $governorate_id,
        ]);
        DB::table('family_centers')->insertGetId([
            'name' => 'عائلة غزى',
            'city_id' => $city_id,
            'manager_id' => $a_admin_id,
            'manager_name' => 'رامي حسنين',
            'mobile' => '99636064',
        ]);
        /***************اليوزر سيتنج******************/
        DB::table('site_sting')->insertGetId([
            'title_page' => 'مركز العمل التنموي/معا',
            'project_title' => 'مشروع تعزيز قدرة اللاجئين الفلسطينيين على التأثير في ظروف معيشتهم',
            'about_project' => 'مشروع ممول من الوكالة الألمانية للتأمين يهدف لتغيير مخيمات اللاجئين وتعزيز قدرتهم يستهدف هذا المشروع  الشباب اللاجئين من خلال القيام بالعديد من المبادرات والحملات الشبابية',
            'img1' => '/setting/pr-video6.jpg',
            'who_are' => '
    مركز معا للتطوير هو مؤسسة فلسطينية للتدريب مستقلة وغير حكومية وغير حزبية تأسست في كانون الثاني (يناير) 1989 ، وهي مسجلة بموجب القانون كمنظمة غير ربحية. يقع المكتب الرئيسي في رام الله والمكاتب الفرعية الأربعة في غزة وخان يونس وطولكرم وجنين. إن عمل معان مستنير بضرورة إنشاء مبادرات مستقلة تعتمد على الذات تؤدي إلى تنمية الموارد البشرية من أجل التنمية المستدامة ، والتي تتضمن قيم الاكتفاء الذاتي والتمكين الذات ',
            'img2' => '/setting/200.jpg',
            'motivational_words' => 'هدفنا أن يصنع الشباب العربي نموذجا عالمياً في بناء الإنسان والأوطان',
            'img3' => '/setting/102.jpg',
            'experiences' => 'هي قصص نجاح عالمية تتقاطع عبرها قصص الكفاح والإصرار والإبداع والتفكير خارج الصندوق المعتاد والرتيب. في هذه التجارب الملهمة ما قد يفتح بعض نوافذ الأمل',
            'email'=>'info@maan-ctr.org',
            'address' => 'دوار حيدر عبد الشافي /عمارة المعتز2 الطابق الأرضي /بجوار بنك الدم',
            'mobile1' => '2823712',
            'mobile2' => ' 2840287',
            'bank_account' => '100200300',
            'accession_msg' => 'تم استلام طلب انضمامك،في حال قبولك سيتم ابلاغك في أقرب وقت',
            'acceptance_msg' => 'لقد تم قبول انضمام في المبادرة التي طلبت الإنضمام لها مؤخراً',
            'donation_msg' => 'شكرا لمساهمتك المالية في دعم مشروعنا، سنكون عند حسن ظنك',
        ]);
        /**********************/
        DB::table('categories')->insertGetId([
            'name' => 'تجارب ملهمة',
            'type' => 1,
        ]);
        /**********************/
        DB::table('interests')->insertGetId([
            'name' => 'قطاع التعليم',
            'status' => 1,
        ]);
        DB::table('interests')->insertGetId([
            'name' => 'قطاع الصحة',
            'status' => 1,
        ]);
        DB::table('interests')->insertGetId([
            'name' => 'قطاع البنية التحتية',
            'status' => 1,
        ]);
        DB::table('interests')->insertGetId([
            'name' => 'قطاع تمثيل الشباب في المخيمات',
            'status' => 1,
        ]);
        DB::table('interests')->insertGetId([
            'name' => 'قطاع الخدمات الدعم النفسي  والاجتماعي',
            'status' => 1,
        ]);
        DB::table('interests')->insertGetId([
            'name' => 'تجارب ملهمة',
            'status' => 1,
        ]);
        /*************************/
        $gover_id=DB::table('governorates')->insertGetId([
            'name' => 'رفح',
        ]);
        DB::table('cities')->insertGetId([
            'name' => 'رفح',
            'governorate_id'=>$gover_id,
        ]);

        $gover_id=DB::table('governorates')->insertGetId([
            'name' => 'خانيونس',
        ]);
        DB::table('cities')->insertGetId([
            'name' => 'بني سهيلا',
            'governorate_id'=>$gover_id,
        ]);
        DB::table('cities')->insertGetId([
            'name' => 'خانيونس',
            'governorate_id'=>$gover_id,
        ]);
        $gover_id=DB::table('governorates')->insertGetId([
            'name' => 'الوسطى',
        ]);
        DB::table('cities')->insertGetId([
            'name' => 'دير البلح',
            'governorate_id'=>$gover_id,
        ]);
        $gover_id=DB::table('governorates')->insertGetId([
            'name' => 'غزة',
        ]);
        DB::table('cities')->insertGetId([
            'name' => 'غزة',
            'governorate_id'=>$gover_id,
        ]);
        $gover_id= DB::table('governorates')->insertGetId([
            'name' => 'شمال غزة',
        ]);
        DB::table('cities')->insertGetId([
            'name' => 'جباليا',
            'governorate_id'=>$gover_id,
        ]);
        DB::table('cities')->insertGetId([
            'name' => 'بيت حانون',
            'governorate_id'=>$gover_id,
        ]);
        DB::table('cities')->insertGetId([
            'name' => 'بيت لاهيا',
            'governorate_id'=>$gover_id,
        ]);
    }
}
