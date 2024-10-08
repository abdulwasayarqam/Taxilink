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
        Schema::create('routes_modules', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('association_id')->nullable();
            $table->string('route_number')->nullable();
            $table->string('start_point')->nullable();
            $table->string('start_point_link')->nullable();
            $table->string('end_point')->nullable();
            $table->string('end_point_link')->nullable();
            $table->text('description')->nullable();
            $table->boolean('special_route_permission')->nullable();
            $table->boolean('long_distance')->nullable();
            $table->string('take_off_register')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes_modules');
    }
};
