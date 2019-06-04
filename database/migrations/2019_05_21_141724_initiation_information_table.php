<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitiationInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('initiation_information');
        Schema::create('initiation_information', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('description');
            $table->integer('price');
            $table->boolean('showPrice')->nullable();
            $table->string('facebookGroup');
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
        Schema::dropIfExists('initiation_information');
    }
}
