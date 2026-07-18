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
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); // passenger, tugboat, barge
            $table->string('route')->nullable();
            $table->string('capacity')->nullable();
            $table->integer('gt')->nullable(); // Gross Tonnage
            $table->integer('nt')->nullable(); // Net Tonnage
            $table->string('dimensions')->nullable();
            $table->string('engine')->nullable();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ships');
    }
};
