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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
//            association ID
            $table->unsignedBigInteger('association_id');
            $table->foreign('association_id')->references('id')->on('associations')->onDelete('cascade');
//           relevent to vehicles
            $table->string('vehicle_id')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->string('number_plate')->nullable();
            $table->string('vin_number')->nullable();
            $table->string('engine_number')->nullable();
            $table->date('license_disc_expiry')->nullable();
            $table->date('operator_license_expiry')->nullable();
            $table->string('linked_associations')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
