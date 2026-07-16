<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
        CREATE TABLE booking_requests_new (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            accommodation_id INTEGER,
            student_id INTEGER,
            visit_date DATE,
            phone TEXT,
            message TEXT,
            status TEXT CHECK(status IN ('Pending','Approved','Rejected','Completed','Moved In')) DEFAULT 'Pending',
            created_at DATETIME,
            updated_at DATETIME
        );
        ");

        DB::statement("
        INSERT INTO booking_requests_new
        SELECT * FROM booking_requests;
        ");

        DB::statement("DROP TABLE booking_requests;");

        DB::statement("
        ALTER TABLE booking_requests_new
        RENAME TO booking_requests;
        ");
    }

    public function down(): void
    {
        //
    }
};