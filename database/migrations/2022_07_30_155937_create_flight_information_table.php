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
        Schema::create('flight_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_schedules_id')->constrained('flight_schedules');
            $table->foreignId('responsible_id')->constrained('responsible');
            $table->string('Customers_number');
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
        Schema::dropIfExists('flight_information');
    }
};
