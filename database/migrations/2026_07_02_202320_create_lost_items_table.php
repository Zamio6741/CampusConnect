<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lost_items', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('title');

            $table->text('description');

            $table->enum('type', ['lost', 'found']);

            $table->string('location');

            $table->date('date');

            $table->string('phone');

            $table->string('image')->nullable();

            $table->enum('status', ['open', 'claimed'])->default('open');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lost_items');
    }
};