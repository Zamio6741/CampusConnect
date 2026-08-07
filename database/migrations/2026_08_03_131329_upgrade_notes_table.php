<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('notes', function (Blueprint $table) {

            $table->string('thumbnail')->nullable();

            $table->integer('downloads')->default(0);

            $table->boolean('is_premium')->default(false);

            $table->decimal('price',8,2)->default(0);

            $table->enum('status',[
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

        });
    }

    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {

            $table->dropColumn([
                'thumbnail',
                'downloads',
                'is_premium',
                'price',
                'status'
            ]);

        });
    }
};