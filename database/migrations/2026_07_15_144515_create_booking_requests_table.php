<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('accommodation_id')->constrained()->cascadeOnDelete();

            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();

            $table->date('visit_date');

            $table->string('phone');

            $table->text('message')->nullable();

            $table->enum('status', [
                'Pending',
                'Approved',
                'Rejected',
                'Completed'
            ])->default('Pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_requests');
    }
};