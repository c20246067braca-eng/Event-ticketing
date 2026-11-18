<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('buyer_id')
                ->constrained('buyers')
                ->restrictOnDelete();

            $table->foreignId('event_id')
                ->constrained('events')
                ->restrictOnDelete();

            $table->foreignId('seat_id')
                ->constrained('seats')
                ->restrictOnDelete();

            $table->decimal('ticket_price', 10, 2);

            $table->timestamp('purchase_timestamp');

            $table->enum('booking_status', [
                'Pending',
                'Confirmed',
                'Cancelled'
            ])->default('Pending');

            $table->timestamps();

            $table->unique(['event_id', 'seat_id']);
            $table->index('booking_status');
            $table->index('purchase_timestamp');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
