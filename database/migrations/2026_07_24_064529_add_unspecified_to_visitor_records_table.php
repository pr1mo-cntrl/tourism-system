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
                $table->integer('unspecified_male')->default(0)->after('foreign_female');
                $table->integer('unspecified_female')->default(0)->after('unspecified_male');
            });
        }

        public function down(): void
        {
            Schema::table('visitor_records', function (Blueprint $table) {
                $table->dropColumn(['unspecified_male', 'unspecified_female']);
            });
        }
};
