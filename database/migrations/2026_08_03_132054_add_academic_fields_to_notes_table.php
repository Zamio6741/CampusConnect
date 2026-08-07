<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('notes', function (Blueprint $table) {

            $table->foreignId('faculty_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('department_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('programme_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('semester_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {

            $table->dropForeign(['faculty_id']);
            $table->dropForeign(['department_id']);
            $table->dropForeign(['programme_id']);
            $table->dropForeign(['semester_id']);

            $table->dropColumn([
                'faculty_id',
                'department_id',
                'programme_id',
                'semester_id'
            ]);

        });
    }
};