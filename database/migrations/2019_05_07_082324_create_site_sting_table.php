<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiteStingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('site_sting', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('bank_account');
            $table->string('about_project');
			$table->string('motivational_words');
			$table->string('who_are');
			$table->string('maan_msg');
			$table->string('call_us');
			$table->string('donation_msg');
			$table->string('complaint_msg');
			$table->string('proposal_msg');
			$table->string('recommendation_msg');
			$table->string('accession_msg');
			$table->string('acceptance_msg');
			$table->string('rejection_msg');
			$table->string('contact_msg');
            $table->string('experiences');
			$table->string('mobile1');
			$table->string('mobile2');
			$table->string('mobile3');
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
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
		Schema::drop('site_sting');
	}

}
