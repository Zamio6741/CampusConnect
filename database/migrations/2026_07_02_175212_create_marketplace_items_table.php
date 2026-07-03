<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('marketplace_items', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');

            $table->text('description');

            $table->decimal('price', 10, 2);

            $table->string('category');

            $table->string('condition')->default('Used');

            $table->string('phone');

            $table->string('whatsapp')->nullable();

            $table->string('location')->nullable();

            $table->boolean('sold')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('marketplace_items');
    }
};