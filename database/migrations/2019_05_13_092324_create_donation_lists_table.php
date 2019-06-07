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
			$table->double('amount');
			$table->string('financier_phone');
			$table->string('financier_email');
			$table->string('financier_address');
            $table->integer('city_id')->nullable();
            $table->string('country');
            $table->double('accept_amount')->default(0);
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
