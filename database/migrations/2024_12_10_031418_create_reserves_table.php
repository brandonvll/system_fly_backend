<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->string('departure_city');
            $table->string('arrival_city');
            $table->timestamp('departure_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reserves');
    }
};
