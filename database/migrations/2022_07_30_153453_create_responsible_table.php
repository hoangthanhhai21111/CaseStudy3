<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsible', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_schedules_id')->constrained('flight_schedules');
            $table->string('captain');
            $table->string('engine_deal');
            $table->string('chief_flight_attendant');
            $table->string('deputy_attendant');
            $table->string('stewardess_1');
            $table->string('stewardess_2');
            $table->string('stewardess_3');
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
        Schema::dropIfExists('_responsible');
    }
};
