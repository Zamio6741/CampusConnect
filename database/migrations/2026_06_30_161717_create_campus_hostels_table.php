<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campus_hostels', function (Blueprint $table) {

            $table->id();

            $table->foreignId('university_id')->constrained()->cascadeOnDelete();

            $table->string('name');

            $table->enum('gender', [
                'Male',
                'Female'
            ]);

            $table->string('block')->nullable();

            $table->enum('room_type', [
                'Single',
                'Double',
                '4 Bed',
                '6 Bed'
            ]);

            $table->integer('rooms_available')->default(0);

            $table->text('description')->nullable();

            $table->boolean('wifi')->default(false);
            $table->boolean('water')->default(true);
            $table->boolean('electricity')->default(true);
            $table->boolean('laundry')->default(false);
            $table->boolean('security')->default(true);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campus_hostels');
    }
};