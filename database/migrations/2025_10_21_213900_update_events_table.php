<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('title', 512)->change();
            $table->string('text', 512)->default('')->change();
            $table->string('link', 512)->nullable()->change();
            $table->string('link_title', 512)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('title')->change();
            $table->string('text')->change();
            $table->string('link')->nullable()->change();
            $table->string('link_title')->nullable()->change();
        });
    }
};
