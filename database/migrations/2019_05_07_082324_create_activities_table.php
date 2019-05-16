<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('initiative_id');
			$table->string('target_group');
			$table->dateTime('start_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('end_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('count')->nullable();
			$table->integer('ativiests_count')->nullable();
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
		Schema::drop('activities');
	}

}
