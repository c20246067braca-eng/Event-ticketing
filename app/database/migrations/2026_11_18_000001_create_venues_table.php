<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->id();

            $table->string('venue_name');
            $table->unsignedInteger('venue_capacity');

            $table->timestamps();

            $table->index('venue_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
