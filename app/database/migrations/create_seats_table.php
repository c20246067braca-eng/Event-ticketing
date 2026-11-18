<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();

            $table->foreignId('venue_id')
                ->constrained('venues')
                ->restrictOnDelete();

            $table->string('seat_section');
            $table->string('seat_number');

            $table->enum('seat_status', [
                'Available',
                'Occupied'
            ])->default('Available');

            $table->timestamps();

            $table->unique([
                'venue_id',
                'seat_section',
                'seat_number'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
