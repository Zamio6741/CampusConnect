<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('semesters', function (Blueprint $table) {

            $table->id();

            $table->foreignId('programme_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('year');

            $table->integer('semester');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('semesters');
    }
};