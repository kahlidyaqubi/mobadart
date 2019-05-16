<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('city_id');
			$table->string('neighborhood');
			$table->date('brth_day');
			$table->string('mobile');
			$table->string('gender');
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
		Schema::drop('activists');
	}

}
