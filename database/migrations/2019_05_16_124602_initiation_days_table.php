<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitiationDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('initiation_days');
        Schema::create('initiation_days', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('extra')->nullable();;
            $table->string('date')->nullable();;
            $table->string('time')->nullable();;
            $table->longText('location')->nullable();;
            $table->string('order')->nullable();;
            $table->integer('initiation_id')->unsigned();
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
        Schema::dropIfExists('initiation_days');
    }
}
