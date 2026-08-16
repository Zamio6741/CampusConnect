<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->insert([
            'key' => 'maintenance_end_at',
            'value' => null,
            'type' => 'datetime',
            'group' => 'system',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    public function down(): void
    {
        DB::table('settings')
            ->where('key', 'maintenance_end_at')
            ->delete();
    }
};