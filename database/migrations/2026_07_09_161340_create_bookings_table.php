<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('bookings', function (Blueprint $table) {

        $table->id();

        // Student making the booking
        $table->foreignId('student_id')
            ->constrained('users')
            ->cascadeOnDelete();

        // Property being booked
        $table->foreignId('accommodation_id')
            ->constrained()
            ->cascadeOnDelete();

        // Requested move-in date
        $table->date('move_in_date');

        // Student message
        $table->text('message')->nullable();

        // Booking status
        $table->enum('status', [
            'Pending',
            'Approved',
            'Rejected',
            'Cancelled'
        ])->default('Pending');

        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};