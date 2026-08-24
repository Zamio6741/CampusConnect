<?php

namespace App\View\Composers;

use App\Models\Accommodation;
use App\Models\Announcement;
use App\Models\Business;
use App\Models\Message;
use App\Models\Note;
use App\Models\Notification;
use App\Models\PastPaper;
use App\Models\StudentSemester;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StudentSidebarComposer
{
    /**
     * Bind real student sidebar data to the student layout.
     */
    public function compose(View $view): void
    {
        /*
        |--------------------------------------------------------------------------
        | DEFAULT SIDEBAR DATA
        |--------------------------------------------------------------------------
        */

        $sidebarStats = [
            'notes' => 0,
            'pastpapers' => 0,
            'businesses' => 0,
            'accommodations' => 0,
            'announcements' => 0,
            'messages' => 0,
            'unreadMessages' => 0,
            'marketplace' => 0,
        ];

        $notificationCount = 0;

        /*
        |--------------------------------------------------------------------------
        | DEFAULT SEMESTER DATA
        |--------------------------------------------------------------------------
        */

        $semesterProgress = 0;

        $semesterStarted = false;

        $semesterCompleted = false;

        $semesterDaysRemaining = null;

        $semesterTotalDays = null;

        $semesterDaysPassed = null;

        $semesterStartDate = null;

        $semesterEndDate = null;


        /*
        |--------------------------------------------------------------------------
        | AUTHENTICATION
        |--------------------------------------------------------------------------
        */

        if (!Auth::check()) {

            $view->with([

                'sidebarStats' => $sidebarStats,

                'notificationCount' => $notificationCount,

                'unreadMessages' => 0,

                'semesterProgress' => $semesterProgress,

                'semesterStarted' => $semesterStarted,

                'semesterCompleted' => $semesterCompleted,

                'semesterDaysRemaining' => $semesterDaysRemaining,

                'semesterTotalDays' => $semesterTotalDays,

                'semesterDaysPassed' => $semesterDaysPassed,

                'semesterStartDate' => $semesterStartDate,

                'semesterEndDate' => $semesterEndDate,

            ]);

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | CURRENT USER
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();


        /*
        |--------------------------------------------------------------------------
        | UNIVERSITY
        |--------------------------------------------------------------------------
        */

        $universityId = $user->university_id;


        /*
        |--------------------------------------------------------------------------
        | REAL SIDEBAR COUNTS
        |--------------------------------------------------------------------------
        */

        $notesCount = Note::where(
            'university_id',
            $universityId
        )->count();


        $pastPapersCount = PastPaper::where(
            'university_id',
            $universityId
        )->count();


        $businessesCount = Business::where(
            'university_id',
            $universityId
        )->count();


        $accommodationsCount = Accommodation::where(
            'university_id',
            $universityId
        )->count();


        $announcementsCount = Announcement::where(
            'university_id',
            $universityId
        )->count();


        /*
        |--------------------------------------------------------------------------
        | MESSAGES
        |--------------------------------------------------------------------------
        */

        $messagesCount = Message::where(function ($query) use ($user) {

            $query->where(
                'student_id',
                $user->id
            )
            ->orWhere(
                'sender_id',
                $user->id
            );

        })->count();


        /*
        |--------------------------------------------------------------------------
        | UNREAD MESSAGES
        |--------------------------------------------------------------------------
        */

        $unreadMessages = Message::where(
                'student_id',
                $user->id
            )
            ->where(
                'sender_id',
                '!=',
                $user->id
            )
            ->where(
                'is_read',
                false
            )
            ->count();


        /*
        |--------------------------------------------------------------------------
        | NOTIFICATIONS
        |--------------------------------------------------------------------------
        */

        $notificationCount = Notification::where(
                'user_id',
                $user->id
            )
            ->where(
                'created_at',
                '>=',
                now()->subDays(7)
            )
            ->where(
                'is_read',
                false
            )
            ->count();


        /*
        |--------------------------------------------------------------------------
        | MARKETPLACE
        |--------------------------------------------------------------------------
        |
        | Marketplace model has not yet been connected.
        |
        */

        $marketplaceCount = 0;


        /*
        |--------------------------------------------------------------------------
        | SIDEBAR STATISTICS
        |--------------------------------------------------------------------------
        */

        $sidebarStats = [

            'notes' => $notesCount,

            'pastpapers' => $pastPapersCount,

            'businesses' => $businessesCount,

            'accommodations' => $accommodationsCount,

            'announcements' => $announcementsCount,

            'messages' => $messagesCount,

            'unreadMessages' => $unreadMessages,

            'marketplace' => $marketplaceCount,

        ];


        /*
        |--------------------------------------------------------------------------
        | REAL SEMESTER
        |--------------------------------------------------------------------------
        */

        $semester = StudentSemester::where(
                'user_id',
                $user->id
            )
            ->select([
                'id',
                'user_id',
                'start_date',
                'end_date',
            ])
            ->latest('id')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | CALCULATE SEMESTER PROGRESS
        |--------------------------------------------------------------------------
        */

        if ($semester) {

            $semesterStartDate = $semester->start_date;

            $semesterEndDate = $semester->end_date;


            $startDate = Carbon::parse(
                $semesterStartDate
            )->startOfDay();


            $endDate = Carbon::parse(
                $semesterEndDate
            )->startOfDay();


            $today = Carbon::now()->startOfDay();


            /*
            |--------------------------------------------------------------------------
            | TOTAL DAYS
            |--------------------------------------------------------------------------
            */

            $semesterTotalDays = max(
                1,
                $startDate->diffInDays($endDate)
            );


            /*
            |--------------------------------------------------------------------------
            | SEMESTER NOT STARTED
            |--------------------------------------------------------------------------
            */

            if ($today->lt($startDate)) {

                $semesterProgress = 0;

                $semesterStarted = false;

                $semesterCompleted = false;

                $semesterDaysPassed = 0;

                $semesterDaysRemaining = $today->diffInDays(
                    $startDate
                );

            }


            /*
            |--------------------------------------------------------------------------
            | SEMESTER RUNNING
            |--------------------------------------------------------------------------
            */

            elseif ($today->lt($endDate)) {

                $semesterStarted = true;

                $semesterCompleted = false;


                $semesterDaysPassed = $startDate->diffInDays(
                    $today
                );


                $semesterProgress = round(
                    (
                        $semesterDaysPassed
                        /
                        $semesterTotalDays
                    ) * 100
                );


                $semesterProgress = min(
                    100,
                    max(
                        0,
                        $semesterProgress
                    )
                );


                $semesterDaysRemaining = $today->diffInDays(
                    $endDate
                );

            }


            /*
            |--------------------------------------------------------------------------
            | SEMESTER COMPLETED
            |--------------------------------------------------------------------------
            */

            else {

                $semesterStarted = true;

                $semesterCompleted = true;

                $semesterProgress = 100;

                $semesterDaysPassed = $semesterTotalDays;

                $semesterDaysRemaining = 0;

            }
        }


        /*
        |--------------------------------------------------------------------------
        | SEND DATA TO STUDENT LAYOUT
        |--------------------------------------------------------------------------
        */

        $view->with([

            'sidebarStats' => $sidebarStats,

            'notificationCount' => $notificationCount,

            'unreadMessages' => $unreadMessages,

            'semesterProgress' => $semesterProgress,

            'semesterStarted' => $semesterStarted,

            'semesterCompleted' => $semesterCompleted,

            'semesterDaysRemaining' => $semesterDaysRemaining,

            'semesterTotalDays' => $semesterTotalDays,

            'semesterDaysPassed' => $semesterDaysPassed,

            'semesterStartDate' => $semesterStartDate,

            'semesterEndDate' => $semesterEndDate,

        ]);
    }
}