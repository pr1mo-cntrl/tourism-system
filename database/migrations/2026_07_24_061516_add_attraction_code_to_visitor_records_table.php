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
    Schema::table('visitor_records', function (Blueprint $table) {
        $table->string('attraction_code')->nullable()->after('attraction_name');
    });
}

public function down(): void
{
    Schema::table('visitor_records', function (Blueprint $table) {
        $table->dropColumn('attraction_code');
    });
}
};
