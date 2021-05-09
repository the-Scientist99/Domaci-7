<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->date('date_from');
            $table->date('date_to');
            $table->float('price');
            $table->foreignId('location_from')->constrained('location_froms');
            $table->foreignId('location_to')->constrained('location_tos');
            $table->foreignId('equipment_id')->constrained('equipment');
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
        Schema::dropIfExists('reservations');
    }
}
