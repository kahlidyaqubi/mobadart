<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInitiativesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initiatives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->string('title');
            $table->string('team_name');
            $table->string('img')->nullable();
            $table->double('donation')->default(0);
            $table->double('paid_up')->default(0);
            $table->integer('city_id');
            $table->string('neighborhood');
            $table->string('details');
            $table->string('Changing');
            $table->string('justifications');
            $table->string('problem');
            $table->string('main_goale');
            $table->dateTime('start_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('end_date')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::drop('initiatives');
    }

}
