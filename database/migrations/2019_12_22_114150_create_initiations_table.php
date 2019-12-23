<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitiationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initiations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->longText('description')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('show_price')->nullable();
            $table->string('facebook_group')->nullable();
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
        Schema::dropIfExists('initiations');
    }
}
