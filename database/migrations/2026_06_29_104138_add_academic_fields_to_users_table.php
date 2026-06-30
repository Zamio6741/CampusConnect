<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->foreignId('role_id')
                ->nullable()
                ->after('id')
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('university_id')
                ->nullable()
                ->after('role_id')
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('faculty_id')
                ->nullable()
                ->after('university_id')
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('department_id')
                ->nullable()
                ->after('faculty_id')
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('programme_id')
                ->nullable()
                ->after('department_id')
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('semester_id')
                ->nullable()
                ->after('programme_id')
                ->constrained()
                ->nullOnDelete();

            $table->string('profile_photo')->nullable()->after('password');

            $table->text('bio')->nullable()->after('profile_photo');

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropConstrainedForeignId('role_id');
            $table->dropConstrainedForeignId('university_id');
            $table->dropConstrainedForeignId('faculty_id');
            $table->dropConstrainedForeignId('department_id');
            $table->dropConstrainedForeignId('programme_id');
            $table->dropConstrainedForeignId('semester_id');

            $table->dropColumn('profile_photo');
            $table->dropColumn('bio');

        });
    }
};