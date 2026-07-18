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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ship_id')->constrained()->onDelete('cascade');
            $table->string('origin_port');
            $table->string('destination_port');
            $table->string('departure_time');
            $table->string('arrival_time');
            $table->string('days_of_week');
            $table->integer('price_vip');
            $table->integer('price_economy');
            $table->integer('price_vehicle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
