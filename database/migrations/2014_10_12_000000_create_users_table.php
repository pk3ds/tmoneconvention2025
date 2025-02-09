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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('staff_id')->unique()->nullable();
            $table->string('phone_no')->nullable();
            $table->string('room_no')->nullable();
            $table->integer('points')->default(0);
            $table->string('transport_mode')->nullable();
            $table->string('pickup_location')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('use_password')->default(false);
            $table->string('password');
            $table->string('employee_no')->nullable();
            $table->string('position')->nullable();
            $table->string('unit')->nullable();
            $table->string('division')->nullable();
            $table->string('gender')->nullable();
            $table->integer('band')->nullable();
            $table->string('tag_category')->nullable();
            $table->string('tag_division')->nullable();
            $table->string('room_type')->nullable();
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
