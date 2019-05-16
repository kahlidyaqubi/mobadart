<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFamilyCentersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('family_centers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('city_id');
			$table->integer('manager_id')->nullable();
			$table->string('manager_name')->nullable();
			$table->string('mobile')->nullable();
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
		Schema::drop('family_centers');
	}

}
