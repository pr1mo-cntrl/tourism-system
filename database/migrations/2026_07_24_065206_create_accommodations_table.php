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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('municipality');
            $table->string('type')->nullable(); // e.g., OTH, HTL, TIN
            $table->integer('no_of_rooms')->default(0);
            $table->integer('male_employees')->default(0);
            $table->integer('female_employees')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};
