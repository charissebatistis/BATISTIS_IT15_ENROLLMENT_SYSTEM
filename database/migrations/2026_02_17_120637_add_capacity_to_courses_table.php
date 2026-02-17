<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('courses') && !Schema::hasColumn('courses', 'capacity')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->integer('capacity')->after('course_name');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('courses') && Schema::hasColumn('courses', 'capacity')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('capacity');
            });
        }
    }
};
