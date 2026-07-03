<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campus_hostel_images', function (Blueprint $table) {

            $table->id();

            $table->foreignId('campus_hostel_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('image_path');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campus_hostel_images');
    }
};