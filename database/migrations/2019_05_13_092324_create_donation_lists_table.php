<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donation_lists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('initiative_id');
			$table->integer('bank_account');
			$table->string('financier_name');
			$table->integer('amount');
			$table->string('financier_phone');
			$table->string('financier_email');
			$table->integer('city_id');
            $table->string('financier_address');
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
		Schema::drop('donation_lists');
	}

}
