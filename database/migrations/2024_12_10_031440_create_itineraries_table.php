<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserve_id')->constrained('reserves')->onDelete('cascade');
            $table->string('origin');
            $table->string('destination');
            $table->timestamp('departure_date');
            $table->timestamp('arrival_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('itineraries');
    }
};
