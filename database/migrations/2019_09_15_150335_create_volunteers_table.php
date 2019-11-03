<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('prev_participation');
            $table->string('firstName');
            $table->string('surname');
            $table->string('uniEmail');
            $table->string('pEmail')->nullable();
            $table->string('phone');
            $table->string('gender');
            $table->string('address');
            $table->string('ownCar');
            $table->string('rideBike');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('volunteers');
    }
}
