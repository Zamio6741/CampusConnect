<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accommodations', function (Blueprint $table) {

            $table->id();

            // Owner
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // University
            $table->foreignId('university_id')
                ->constrained()
                ->cascadeOnDelete();

            // Nearby Area
            $table->foreignId('nearby_area_id')
                ->constrained()
                ->cascadeOnDelete();

            // Listing Type
            $table->enum('listing_type', [
                'campus',
                'rental'
            ]);

            // Property Type
            $table->enum('property_type', [
                'hostel',
                'bedsitter',
                'single_room',
                'shared_room',
                'one_bedroom',
                'two_bedroom'
            ]);

            // Title
            $table->string('title');

            // Description
            $table->text('description')->nullable();

            // Rent
            $table->decimal('price',10,2);

            // Contacts
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();

            // Location
            $table->string('location');

            // Availability
            $table->integer('available_spaces')->default(1);

            // Optional campus hostel fields
            $table->integer('capacity')->nullable();
            $table->string('gender')->nullable();
            $table->string('room_number')->nullable();

            // Status
            $table->boolean('verified')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('available')->default(true);

            // Statistics
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('bookings')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};