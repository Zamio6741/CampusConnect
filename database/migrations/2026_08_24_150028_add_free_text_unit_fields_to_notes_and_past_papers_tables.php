<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->string('unit_code')->nullable()->after('unit_id');
            $table->string('unit_name')->nullable()->after('unit_code');
            $table->foreignId('unit_id')->nullable()->change();
        });

        Schema::table('past_papers', function (Blueprint $table) {
            $table->string('unit_code')->nullable()->after('unit_id');
            $table->string('unit_name')->nullable()->after('unit_code');
            $table->foreignId('unit_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropColumn(['unit_code', 'unit_name']);
        });

        Schema::table('past_papers', function (Blueprint $table) {
            $table->dropColumn(['unit_code', 'unit_name']);
        });
    }
};