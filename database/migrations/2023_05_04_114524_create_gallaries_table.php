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
        Schema::create('gallaries', function (Blueprint $table) {
            $table->id();
            $table->string('image1_url')->nullable();
            $table->string('image2_url')->nullable();
            $table->string('image3_url')->nullable();
            $table->string('image4_url')->nullable();
            $table->string('image5_url')->nullable();
            $table->integer('service_provider_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallaries');
    }
};
