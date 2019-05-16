<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
		    $table->increments('id');
			$table->string('name', 191);
			$table->string('last_name', 191)->nullable();;
			$table->string('user_name', 191);
			$table->string('email', 191);
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password', 191);
			$table->string('lang', 191)->nullable();
			$table->integer('the_type')->nullable();
            $table->rememberToken();
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
		Schema::drop('users');
	}

}
