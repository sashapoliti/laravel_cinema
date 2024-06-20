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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200)->unique();
            $table->text('description')->nullable();
            $table->string('minutes', 20);
            $table->string('language', 20);
            $table->string('thumb', 255)->nullable();
            $table->string('trailer', 255)->nullable();
            $table->date('release_date');
            $table->string('slug', 255);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
