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
        Schema::table('users', function (Blueprint $table) {
            // Pickup details
            $table->string('pickup_route')->nullable()->after('pickup_location');
            $table->string('pickup_date')->nullable()->after('pickup_route');
            $table->string('pickup_bus_no')->nullable()->after('pickup_date');

            // Drop-off details
            $table->string('dropoff_route')->nullable()->after('pickup_bus_no');
            $table->string('dropoff_date')->nullable()->after('dropoff_route');
            $table->string('dropoff_bus_no')->nullable()->after('dropoff_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'pickup_route',
                'pickup_date',
                'pickup_bus_no',
                'dropoff_route',
                'dropoff_date',
                'dropoff_bus_no'
            ]);
        });
    }
};
