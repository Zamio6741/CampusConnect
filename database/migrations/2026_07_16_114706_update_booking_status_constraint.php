<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // PostgreSQL
        if (DB::getDriverName() === 'pgsql') {

            // Remove the existing status constraint if it exists.
            DB::statement("
                ALTER TABLE booking_requests
                DROP CONSTRAINT IF EXISTS booking_requests_status_check
            ");

            // Add the new allowed status values.
            DB::statement("
                ALTER TABLE booking_requests
                ADD CONSTRAINT booking_requests_status_check
                CHECK (
                    status IN (
                        'Pending',
                        'Approved',
                        'Rejected',
                        'Completed',
                        'Moved In'
                    )
                )
            ");

            // Make sure the default is Pending.
            DB::statement("
                ALTER TABLE booking_requests
                ALTER COLUMN status SET DEFAULT 'Pending'
            ");

            return;
        }

        // SQLite
        if (DB::getDriverName() === 'sqlite') {

            DB::statement("
                CREATE TABLE booking_requests_new (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    accommodation_id INTEGER,
                    student_id INTEGER,
                    visit_date DATE,
                    phone TEXT,
                    message TEXT,
                    status TEXT CHECK(
                        status IN (
                            'Pending',
                            'Approved',
                            'Rejected',
                            'Completed',
                            'Moved In'
                        )
                    ) DEFAULT 'Pending',
                    created_at DATETIME,
                    updated_at DATETIME
                )
            ");

            DB::statement("
                INSERT INTO booking_requests_new
                SELECT * FROM booking_requests
            ");

            DB::statement("DROP TABLE booking_requests");

            DB::statement("
                ALTER TABLE booking_requests_new
                RENAME TO booking_requests
            ");
        }
    }

    public function down(): void
    {
        // Nothing to reverse.
    }
};