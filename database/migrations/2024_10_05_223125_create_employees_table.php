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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // Foreign key to the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // General fields for employees (drivers, assistants, etc.)
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('known_as')->nullable();  // Nickname, optional
            $table->string('id_number')->unique();  // 13-digit South African ID number
            $table->string('primary_phone');
            $table->string('secondary_phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address');  // Full physical address
            $table->string('next_of_kin')->nullable();
            $table->string('next_of_kin_phone')->nullable();

            // License information for drivers
            $table->string('license_number')->nullable();
            $table->date('license_first_issue')->nullable();
            $table->string('license_code')->nullable();  // A, B, C, etc.
            $table->date('license_expiry')->nullable();
            $table->date('pdpr_first_issue')->nullable();
            $table->date('pdpr_expiry')->nullable();  // Expiry every 2 years for PDPr

            // Employment status and other details
            $table->enum('role', ['driver', 'driver_assistant', 'rank_marshal', 'route_patrol', 'hlokomela'])->default('driver');  // Employee role
            $table->enum('status', ['active', 'inactive'])->default('active');  // Employment status

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
