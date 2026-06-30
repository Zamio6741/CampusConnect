<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {

            $table->id();

            $table->foreignId('programme_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('semester_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('unit_code')->unique();

            $table->string('unit_name');

            $table->string('lecturer')->nullable();

            $table->integer('credit_hours')->default(3);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};