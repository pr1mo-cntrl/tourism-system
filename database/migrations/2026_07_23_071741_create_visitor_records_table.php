<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitor_records', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->string('year');
            $table->string('municipality_name');
            $table->string('attraction_name');
            
            // This Municipality
            $table->integer('local_male')->default(0);
            $table->integer('local_female')->default(0);
            
            // Other Municipality
            $table->integer('other_mun_male')->default(0);
            $table->integer('other_mun_female')->default(0);
            
            // Other Province
            $table->integer('other_prov_male')->default(0);
            $table->integer('other_prov_female')->default(0);
            
            // Foreign Country Residence
            $table->integer('foreign_male')->default(0);
            $table->integer('foreign_female')->default(0);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitor_records');
    }
};