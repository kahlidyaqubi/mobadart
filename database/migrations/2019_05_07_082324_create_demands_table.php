<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDemandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('demands', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('initiative_id');
			$table->integer('activist_id')->nullable();
			$table->integer('title');
            $table->integer('admin_id')->nullable();
			$table->integer('category_id');
			$table->string('detalis');
			$table->string('the_file');
            $table->boolean('status');
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
		Schema::drop('demands');
	}

}
