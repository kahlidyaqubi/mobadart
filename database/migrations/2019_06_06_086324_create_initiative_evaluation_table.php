<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInitiativeEvaluationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('initiative_evaluation', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('initiative_id');
			$table->integer('activist_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->boolean('changing')->default(0);
            $table->longText('changing_ditalis', 1000)->nullable();
            $table->boolean('impacting')->default(0);
            $table->longText('impacting_ditalis', 1000)->nullable();
            $table->boolean('continuing')->default(0);
            $table->longText('continuing_ditalis', 1000)->nullable();
            $table->boolean('improving')->default(0);
            $table->longText('improving_ditalis', 1000)->nullable();
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
		Schema::drop('initiative_evaluation');
	}

}
