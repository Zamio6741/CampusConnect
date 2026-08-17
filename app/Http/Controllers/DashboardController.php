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
use App\Models\Unit;
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
        | University Filter
        |--------------------------------------------------------------------------
        */

        $universityId = $user->university_id;

        /*
        |--------------------------------------------------------------------------
        | Dashboard Content
        |--------------------------------------------------------------------------
        */

        $announcements = Announcement::where('university_id', $universityId)
            ->latest()
            ->take(3)
            ->get();

        $businesses = Business::where('university_id', $universityId)
            ->latest()
            ->take(3)
            ->get();

        $trendingNotes = Note::with(['user', 'unit'])
            ->where('university_id', $universityId)
            ->latest()
            ->take(3)
            ->get();

        $pastPapers = PastPaper::with(['user', 'unit'])
            ->where('university_id', $universityId)
            ->latest()
            ->take(3)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $stats = [

            'notes' => Note::where('university_id', $universityId)->count(),

            'pastpapers' => PastPaper::where('university_id', $universityId)->count(),

            'businesses' => Business::where('university_id', $universityId)->count(),

            'accommodations' => Accommodation::where('university_id', $universityId)->count(),

            'announcements' => Announcement::where('university_id', $universityId)->count(),

            'units' => Unit::count(),

            'myNotes' => Note::where('user_id', $user->id)->count(),

            'messages' => Message::where(function ($query) use ($user) {
                $query->where('student_id', $user->id)
                    ->orWhere('sender_id', $user->id);
            })->count(),

            'marketplace' => 0,
        ];

        /*
        |--------------------------------------------------------------------------
        | Notifications
        |--------------------------------------------------------------------------
        */

        $notifications = Notification::where('user_id', $user->id)
            ->where('created_at', '>=', now()->subDays(7))
            ->latest()
            ->get();

        $notificationCount = $notifications
            ->where('is_read', false)
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Unread Messages
        |--------------------------------------------------------------------------
        */

        $unreadMessages = Message::where('student_id', $user->id)
            ->where('sender_id', '!=', $user->id)
            ->where('is_read', false)
            ->count();

        /*
        |--------------------------------------------------------------------------
        | REAL SEMESTER DATA
        |--------------------------------------------------------------------------
        |
        | Semester information comes from the student_semesters table.
        |
        */

        $semester = StudentSemester::where('user_id', $user->id)
            ->latest()
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Default Semester Values
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
        | Calculate Semester Progress
        |--------------------------------------------------------------------------
        */

        if ($semester) {

            $semesterStartDate = $semester->start_date;

            $semesterEndDate = $semester->end_date;

            $startDate = Carbon::parse($semesterStartDate)->startOfDay();

            $endDate = Carbon::parse($semesterEndDate)->startOfDay();

            $today = Carbon::now()->startOfDay();

            /*
            |--------------------------------------------------------------------------
            | Total Semester Duration
            |--------------------------------------------------------------------------
            */

            $semesterTotalDays = max(
                1,
                $startDate->diffInDays($endDate)
            );

            /*
            |--------------------------------------------------------------------------
            | Semester Has NOT Started
            |--------------------------------------------------------------------------
            */

            if ($today->lt($startDate)) {

                $semesterProgress = 0;

                $semesterStarted = false;

                $semesterCompleted = false;

                $semesterDaysPassed = 0;

                $semesterDaysRemaining = $today->diffInDays($endDate);
            }

            /*
            |--------------------------------------------------------------------------
            | Semester Is Currently Running
            |--------------------------------------------------------------------------
            */

            elseif ($today->lt($endDate)) {

                $semesterStarted = true;

                $semesterCompleted = false;

                $semesterDaysPassed = $startDate->diffInDays($today);

                $semesterProgress = round(
                    ($semesterDaysPassed / $semesterTotalDays) * 100
                );

                $semesterProgress = min(
                    100,
                    max(
                        0,
                        $semesterProgress
                    )
                );

                $semesterDaysRemaining = $today->diffInDays($endDate);
            }

            /*
            |--------------------------------------------------------------------------
            | Semester Has Ended
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
        | CONTEXT-AWARE DAILY TIP
        |--------------------------------------------------------------------------
        |
        | The dashboard chooses the category of encouragement based on the
        | student's actual semester situation.
        |
        | The message changes automatically each day.
        |
        */

        $dailyTip = $this->getDailyTip(
            $semesterStarted,
            $semesterCompleted,
            $semesterDaysRemaining,
            $semesterProgress
        );

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        return view('student.dashboard', [

            /*
            |--------------------------------------------------------------------------
            | User
            |--------------------------------------------------------------------------
            */

            'user' => $user,

            /*
            |--------------------------------------------------------------------------
            | Dashboard Content
            |--------------------------------------------------------------------------
            */

            'announcements' => $announcements,

            'businesses' => $businesses,

            'trendingNotes' => $trendingNotes,

            'pastPapers' => $pastPapers,

            /*
            |--------------------------------------------------------------------------
            | Statistics
            |--------------------------------------------------------------------------
            */

            'stats' => $stats,

            /*
            |--------------------------------------------------------------------------
            | Notifications
            |--------------------------------------------------------------------------
            */

            'notifications' => $notifications,

            'notificationCount' => $notificationCount,

            /*
            |--------------------------------------------------------------------------
            | Messages
            |--------------------------------------------------------------------------
            */

            'unreadMessages' => $unreadMessages,

            /*
            |--------------------------------------------------------------------------
            | Semester Information
            |--------------------------------------------------------------------------
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
            |--------------------------------------------------------------------------
            | Daily Tip
            |--------------------------------------------------------------------------
            */

            'dailyTip' => $dailyTip,
        ]);
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

        /*
        |--------------------------------------------------------------------------
        | Daily Rotation Number
        |--------------------------------------------------------------------------
        |
        | January 1, 2026 is used as the reference date.
        |
        | Every day gets a different number.
        | Refreshing the dashboard on the same day keeps the same tip.
        |
        */

        $referenceDate = Carbon::create(2026, 1, 1)->startOfDay();

        $today = Carbon::now()->startOfDay();

        $dayNumber = $referenceDate->diffInDays($today);

        /*
        |--------------------------------------------------------------------------
        | SEMESTER NOT STARTED
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | SEMESTER COMPLETED
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | FINAL 7 DAYS
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | 7–14 DAYS REMAINING
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | 14–30 DAYS REMAINING
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | 30+ DAYS REMAINING
        |--------------------------------------------------------------------------
        */

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
     *
     * NOTE:
     * Semester dates are normally handled by StudentSemesterController.
     *
     * This method remains here because the existing
     * dashboard.semester.update route may still point to it.
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

        /*
        |--------------------------------------------------------------------------
        | Create a new StudentSemester record
        |--------------------------------------------------------------------------
        */

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