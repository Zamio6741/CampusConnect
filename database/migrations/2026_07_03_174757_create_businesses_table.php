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
       Schema::create('businesses', function (Blueprint $table) {
    $table->id();

    $table->foreignId('user_id')->constrained()->cascadeOnDelete();

    $table->string('name');

    $table->string('category');

    $table->text('description');

    $table->string('phone');

    $table->string('whatsapp')->nullable();

    $table->string('location');

    $table->string('opening_hours')->nullable();

    $table->string('cover_image')->nullable();

    $table->boolean('featured')->default(false);

    $table->boolean('active')->default(true);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
