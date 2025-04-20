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
        Schema::create('cpostal', function (Blueprint $table) {
            $table->id();
            $table->string('country_code', 2);
            $table->string('postal_code', 20);
            $table->string('place_name', 180);
            $table->string('state_name', 100);
            $table->string('state_code', 2);
            $table->string('county_name', 100);
            $table->string('county_code', 20);
            $table->string('community', 100);
            $table->string('community_code', 20);
            $table->string('latitude', 100);
            $table->string('longitude', 100);
            $table->string('accuracy', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpostal');
    }
};
