<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Announcement;
use App\Models\Business;
use App\Models\Message;
use App\Models\Note;
use App\Models\Notification;
use App\Models\PastPaper;
use App\Models\StudentSemester;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the student dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | UNIVERSITY
        |--------------------------------------------------------------------------
        */

        $universityId = $user->university_id;


        /*
        |--------------------------------------------------------------------------
        | RECENT ANNOUNCEMENTS
        |--------------------------------------------------------------------------
        */

        $announcements = Announcement::where(
                'university_id',
                $universityId
            )
            ->select([
                'id',
                'title',
                'content',
                'created_at',
            ])
            ->latest()
            ->take(4)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | TRENDING NOTES
        |--------------------------------------------------------------------------
        */

        $trendingNotes = Note::with([
                'user:id,name',
            ])
            ->where(
                'university_id',
                $universityId
            )
            ->select([
                'id',
                'user_id',
                'title',
                'created_at',
            ])
            ->latest()
            ->take(3)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | REAL DASHBOARD / SIDEBAR STATISTICS
        |--------------------------------------------------------------------------
        |
        | These values are pulled directly from the database.
        |
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

            $query->where('student_id', $user->id)
                ->orWhere('sender_id', $user->id);

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
        | MARKETPLACE
        |--------------------------------------------------------------------------
        |
        | IMPORTANT:
        |
        | Your current project does not show a Marketplace model in this
        | controller. Therefore we do NOT pretend there is real marketplace
        | data available.
        |
        | We expose the value as 0 until the actual marketplace model/table
        | is connected.
        |
        */

        $marketplaceCount = 0;


        /*
        |--------------------------------------------------------------------------
        | SIDEBAR DATA
        |--------------------------------------------------------------------------
        |
        | This is the exact data structure the student sidebar should use.
        |
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
        | DASHBOARD STATISTICS
        |--------------------------------------------------------------------------
        */

        $stats = [

            'notes' => $notesCount,

            'pastpapers' => $pastPapersCount,

            'businesses' => $businessesCount,

            'accommodations' => $accommodationsCount,

            'announcements' => $announcementsCount,

            'myNotes' => Note::where(
                'user_id',
                $user->id
            )->count(),

            'messages' => $messagesCount,

            'marketplace' => $marketplaceCount,
        ];


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
        | REAL SEMESTER DATA
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
        | DEFAULT SEMESTER VALUES
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
        | CALCULATE REAL SEMESTER PROGRESS
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
            | TOTAL SEMESTER DAYS
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
        | SEMESTER MESSAGES
        |--------------------------------------------------------------------------
        */

        $semesterMessages = $this->getSemesterMessages(
            $semesterStarted,
            $semesterCompleted,
            $semesterDaysRemaining,
            $semesterProgress
        );


        /*
        |--------------------------------------------------------------------------
        | DAILY TIP
        |--------------------------------------------------------------------------
        */

        $dailyTip = $this->getDailyTip(
            $semesterStarted,
            $semesterCompleted,
            $semesterDaysRemaining,
            $semesterProgress
        );


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD VIEW
        |--------------------------------------------------------------------------
        */

        return view('student.dashboard', [

            /*
            | User
            */

            'user' => $user,


            /*
            | Dashboard content
            */

            'announcements' => $announcements,

            'trendingNotes' => $trendingNotes,


            /*
            | Dashboard statistics
            */

            'stats' => $stats,


            /*
            | SIDEBAR STATISTICS
            |
            | The sidebar should use this variable.
            */

            'sidebarStats' => $sidebarStats,


            /*
            | Notifications
            */

            'notificationCount' => $notificationCount,

            'unreadMessages' => $unreadMessages,


            /*
            | Semester
            */

            'semesterProgress' => $semesterProgress,

            'semesterStarted' => $semesterStarted,

            'semesterCompleted' => $semesterCompleted,

            'semesterDaysRemaining' => $semesterDaysRemaining,

            'semesterTotalDays' => $semesterTotalDays,

            'semesterDaysPassed' => $semesterDaysPassed,

            'semesterStartDate' => $semesterStartDate,

            'semesterEndDate' => $semesterEndDate,


            /*
            | Rotating messages
            */

            'semesterMessages' => $semesterMessages,


            /*
            | Daily tip
            */

            'dailyTip' => $dailyTip,
        ]);
    }


    /**
     * Get context-aware rotating messages.
     */
    private function getSemesterMessages(
        bool $semesterStarted,
        bool $semesterCompleted,
        ?int $daysRemaining,
        int $semesterProgress
    ): array {

        if (!$semesterStarted && !$semesterCompleted) {

            return [

                '🎓 Use this time to prepare. A strong semester starts before the first lecture.',

                '📚 Get organized now and make your semester easier from day one.',

                '🚀 Preparation today can make tomorrow much easier.',

                '🎯 Set your academic goals before the semester begins.',

                '📅 Build a study routine now instead of waiting for assignments.',

                '🧠 Start the semester with a clear mind and a clear plan.',
            ];
        }


        if ($semesterCompleted) {

            return [

                '🎉 Semester complete! Take a moment to appreciate how far you have come.',

                '🏆 You made it through. Be proud of the progress you made.',

                '🌟 Another chapter completed. Get ready for what comes next.',

                '💪 You finished strong. Keep that momentum going.',

                '🎓 One semester down. Keep growing, learning and moving forward.',

                '❤️ Give yourself credit for making it through another semester.',
            ];
        }


        if ($semesterProgress >= 80) {

            return [

                '🔥 You are almost there. Stay consistent and finish strong.',

                '🏁 The finish line is close. Give these final days your best.',

                '💪 Keep going! Your hard work is starting to pay off.',

                '🚀 Almost done. Do not slow down now.',

                '🎯 Stay focused. Every remaining day counts.',

                '🏆 You have come a long way. Finish the semester with confidence.',
            ];
        }


        if ($semesterProgress >= 60) {

            return [

                '📚 You are well into the semester. Keep your momentum going.',

                '🔥 Consistency now will make the final stretch much easier.',

                '🎯 Keep focusing on the topics that need the most attention.',

                '💪 You have already made great progress. Keep moving forward.',

                '🧠 Review what you have learned before moving on to new material.',

                '🚀 Stay disciplined. Your progress is building every day.',
            ];
        }


        if ($semesterProgress >= 30) {

            return [

                '📖 Keep building your understanding one topic at a time.',

                '💡 This is a great time to identify your strongest and weakest subjects.',

                '📝 Stay on top of your notes before the workload becomes heavier.',

                '🎯 Focus on steady progress instead of trying to do everything at once.',

                '🔥 Your semester is moving. Keep your study habits consistent.',

                '🧠 Understanding a topic today is better than memorizing everything later.',
            ];
        }


        return [

            '🌱 You are just getting started. Build good habits now.',

            '📚 Stay consistent from the beginning and future revision will be easier.',

            '🎯 Set realistic goals for the week and work toward them.',

            '🚀 Every great semester starts with small consistent steps.',

            '🧠 Focus on understanding your lessons rather than simply memorizing them.',

            '💪 Start strong and give yourself a good foundation for the semester.',
        ];
    }


    /**
     * Generate a context-aware daily tip.
     */
    private function getDailyTip(
        bool $semesterStarted,
        bool $semesterCompleted,
        ?int $daysRemaining,
        int $semesterProgress
    ): string {

        $referenceDate = Carbon::create(
            2026,
            1,
            1
        )->startOfDay();


        $today = Carbon::now()->startOfDay();


        $dayNumber = $referenceDate->diffInDays(
            $today
        );


        if (!$semesterStarted && !$semesterCompleted) {

            $tips = [

                '🎓 Use this time to prepare. A strong semester starts before the first lecture.',

                '📚 Get your study materials ready before classes begin.',

                '📝 Use this time to organize your notes, timetable and academic goals.',

                '🚀 Preparation today can make the first weeks of your semester much easier.',

                '🎯 Set a few realistic academic goals before the semester begins.',

                '📅 Plan your study routine early instead of waiting for assignments to pile up.',

                '🧠 Start the semester with a clear mind and a clear plan.',

                '🌱 Good habits built before the semester starts can make a huge difference later.',
            ];

            return $tips[$dayNumber % count($tips)];
        }


        if ($semesterCompleted) {

            $tips = [

                '🎉 Semester complete! Take a moment to appreciate how far you have come.',

                '🏆 You finished the semester. Be proud of the effort you put in.',

                '🌱 Every semester teaches you something new. Carry those lessons forward.',

                '🚀 Rest, reflect and prepare yourself for the next chapter.',

                '⭐ Another chapter completed. Keep building toward the future you want.',

                '💭 Look back at what challenged you this semester and think about what you learned.',

                '❤️ Give yourself credit for making it through another semester.',

                '🎓 One semester down. Keep growing, keep learning and keep moving forward.',
            ];

            return $tips[$dayNumber % count($tips)];
        }


        if ($daysRemaining !== null && $daysRemaining <= 7) {

            $tips = [

                '🚀 Final push! Stay focused and make these last days count.',

                '🔥 You are almost there. Keep your focus until the very end.',

                '📚 Prioritize the topics you find most difficult and give them extra attention.',

                '🎯 Do not let the finish line distract you. Stay consistent.',

                '💪 You have already made it this far. Finish the semester strong.',

                '🧠 Test yourself on what you know instead of only rereading your notes.',

                '🏆 Every focused study session now can make a difference. Keep going.',

                '⚡ Stay disciplined during these final days. Your future self will appreciate it.',
            ];

            return $tips[$dayNumber % count($tips)];
        }


        if ($daysRemaining !== null && $daysRemaining <= 14) {

            $tips = [

                '🔥 The semester is entering its final stretch. Stay consistent and finish strong.',

                '📖 Focus your revision on the areas where you need the most improvement.',

                '📝 Use past papers to test your understanding before exams arrive.',

                '🎯 Prioritize your weakest topics instead of only studying what feels easy.',

                '🧠 Active recall can help you discover what you actually remember.',

                '⏰ Manage your remaining time carefully. Every study session matters now.',

                '💪 Do not panic because the semester is ending. Stick to your plan.',

                '🚀 You are close. Keep your momentum going.',
            ];

            return $tips[$dayNumber % count($tips)];
        }


        if ($daysRemaining !== null && $daysRemaining <= 30) {

            $tips = [

                '📚 Now is a great time to increase your revision before exams get close.',

                '🧠 Do not just read your notes. Try explaining each topic in your own words.',

                '📄 Start working through past papers to identify areas that need more revision.',

                '🎯 Make a list of your weakest topics and work through them one by one.',

                '📝 Review what you learned this week before moving on to new material.',

                '⏳ The semester is moving quickly. Use your remaining time wisely.',

                '🔥 Consistent revision now can save you a lot of pressure later.',

                '📖 Create a simple revision schedule and stick to it.',
            ];

            return $tips[$dayNumber % count($tips)];
        }


        $tips = [

            '📚 Do not wait until exams to revise. A little progress today goes a long way.',

            '🎯 Focus on one important task at a time. Your attention is valuable.',

            '🧠 Review something you learned today before going to bed.',

            '✍️ Write down the most important thing you learned today.',

            '💪 You do not have to be perfect. You just have to keep moving forward.',

            '🔥 Progress may feel slow, but consistency always adds up.',

            '🚀 Your future self will thank you for the effort you put in today.',

            '🌱 Every expert was once a beginner. Keep learning.',

            '📖 Do not just read your notes. Test yourself to see what you actually remember.',

            '⏰ A focused hour can accomplish more than several distracted hours.',

            '📵 Put distractions away when you need to concentrate.',

            '⚡ Start with something small. Starting is often the hardest part.',

            '🤝 Do not be afraid to ask questions. Learning is a team effort.',

            '📅 Keep track of your deadlines before they become emergencies.',

            '💡 Take advantage of the academic resources available to you.',

            '🌟 Do not compare your journey with someone else’s. Focus on your own progress.',

            '🛠️ Difficult problems become easier when you break them into smaller pieces.',

            '❤️ Remember to rest. Your brain needs recovery to learn effectively.',

            '💧 Stay hydrated and give yourself time to recharge.',

            '🎓 University is not just about passing exams. It is also about building yourself.',
        ];

        return $tips[$dayNumber % count($tips)];
    }


    /**
     * Save/update semester dates.
     */
    public function updateSemester(Request $request)
    {
        $validated = $request->validate([

            'semester_start_date' => [
                'required',
                'date',
            ],

            'semester_end_date' => [
                'required',
                'date',
                'after:semester_start_date',
            ],
        ]);


        $user = Auth::user();


        StudentSemester::create([

            'user_id' => $user->id,

            'start_date' => $validated['semester_start_date'],

            'end_date' => $validated['semester_end_date'],
        ]);


        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Your semester dates have been updated successfully.'
            );
    }
}