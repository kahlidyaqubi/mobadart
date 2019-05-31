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
            $table->boolean('shared')->default(0);
            $table->longText('shared_ditalis', 1000)->nullable();
			$table->integer('user_id');
			$table->integer('city_id');
			$table->string('neighborhood');
			$table->date('brth_day');
            $table->integer('ido');
			$table->string('mobile')->nullable();;
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
