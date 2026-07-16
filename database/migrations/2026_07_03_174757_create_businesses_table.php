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

    $table->foreignId('university_id')->nullable()->constrained()->nullOnDelete();

    $table->string('business_name');

    $table->string('category');

    $table->text('description');

    $table->string('phone');

    $table->string('whatsapp')->nullable();

    $table->string('email')->nullable();

    $table->string('logo')->nullable();

    $table->string('location');

    $table->string('google_maps')->nullable();

    $table->string('facebook')->nullable();

    $table->string('instagram')->nullable();

    $table->string('tiktok')->nullable();

    $table->string('website')->nullable();

    $table->enum('status', [
        'Pending',
        'Approved',
        'Rejected'
    ])->default('Pending');

    $table->boolean('featured')->default(false);

    $table->unsignedInteger('views')->default(0);

    $table->decimal('rating',3,2)->default(0);

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
