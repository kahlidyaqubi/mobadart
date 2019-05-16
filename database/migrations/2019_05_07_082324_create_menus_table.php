<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->integer('order_id');
			$table->boolean('in_login');
			$table->string('icon');
			$table->string('link');
			$table->boolean('in_guest');
			$table->boolean('in_top');
			$table->boolean('in_menu');
			$table->boolean('new_window');
			$table->string('route');
			$table->integer('parent_id');
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
		Schema::drop('menus');
	}

}
