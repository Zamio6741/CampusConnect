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

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->foreignId('university_id')->nullable()->constrained()->nullOnDelete();

            $table->enum('listing_type', [
                'campus',
                'rental'
            ]);

            $table->enum('property_type',[
                'hostel',
                'bedsitter',
                'single_room',
                'one_bedroom',
                'two_bedroom',
                'shared_room'
            ]);

            $table->string('title');

            $table->text('description')->nullable();

            $table->string('gender')->nullable();

            $table->string('room_number')->nullable();

            $table->integer('capacity')->default(1);

            $table->integer('available_spaces')->default(1);

            $table->decimal('price',10,2)->nullable();

            $table->string('phone')->nullable();

            $table->string('whatsapp')->nullable();

            $table->string('location');

            $table->decimal('latitude',10,7)->nullable();

            $table->decimal('longitude',10,7)->nullable();

            $table->boolean('verified')->default(false);

            $table->boolean('featured')->default(false);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};