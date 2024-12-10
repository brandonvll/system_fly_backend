<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->date('dateOfDeparture');
            $table->time('timeOfDeparture');
            $table->date('dateOfArrival');
            $table->time('timeOfArrival');
            $table->string('marketingCarrier');
            $table->string('flightOrtrainNumber');
            $table->string('departureCity');
            $table->string('arrivalCity');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
