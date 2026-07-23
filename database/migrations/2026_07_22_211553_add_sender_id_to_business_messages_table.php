<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('business_messages', function (Blueprint $table) {

            $table->foreignId('sender_id')
                ->nullable()
                ->after('student_id')
                ->constrained('users')
                ->cascadeOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('business_messages', function (Blueprint $table) {

            $table->dropConstrainedForeignId('sender_id');

        });
    }
};