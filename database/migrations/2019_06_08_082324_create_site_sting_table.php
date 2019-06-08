<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiteStingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('site_sting', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title_page');//عنوا النافذة
            $table->string('project_title');//عنوان المشروع
            $table->longText('about_project');//عن المشروع
            $table->string('img1')->nullable();//صورة الخلفية
            $table->longText('who_are');//من نحن
            $table->string('img2')->nullable();//صورة من نحن
            $table->string('motivational_words');//عبارة تحفيزية
            $table->string('img3')->nullable();//صورة تحفيزية
            $table->longText('experiences');//كلمة تجارب ملهمة
            $table->string('address');//العنوان
            $table->string('email');
            $table->string('mobile1');//الهاف
            $table->string('mobile2');//الجوال
            $table->integer('bank_account');//رقم الحساب البنكي
            $table->string('accession_msg');//رسالة طلب انضمام
            $table->string('acceptance_msg');//رسالة واشعار قبول شاب
            $table->string('donation_msg');//رسالة بعد ادخال تبرع
			$table->softDeletes();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('site_sting');
	}

}
