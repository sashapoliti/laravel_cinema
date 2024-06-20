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
        //ho modificato sul mio phpMyAdmin il nome della tabella in 'movie_rooms'
        Schema::create('movie_rooms', function (Blueprint $table) {
            $table->id();
            $table->date('date_projection');
            $table->decimal('ticket_price', 4, 2);
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('slot_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_room');
    }
};
