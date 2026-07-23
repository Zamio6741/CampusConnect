<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('business_messages', function (Blueprint $table) {

            $table->id();

            $table->foreignId('business_id')->constrained()->cascadeOnDelete();

            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();

            // Who actually sent this message
            $table->foreignId('sender_id')->constrained('users')->cascadeOnDelete();

            $table->text('message');

            $table->boolean('is_read')->default(false);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('business_messages');
    }
};