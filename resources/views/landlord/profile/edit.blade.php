<x-landlord-layout>

    <div class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-cyan-100">

        {{-- ========================================================= --}}
        {{-- PROFILE HERO --}}
        {{-- ========================================================= --}}

        <div class="bg-gradient-to-r from-sky-700 via-blue-700 to-indigo-700 text-white">

            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

                <div class="flex flex-col sm:flex-row sm:items-center gap-5">

                    {{-- Avatar --}}
                    <div
                        class="w-20 h-20 sm:w-24 sm:h-24
                               rounded-3xl
                               bg-white/15
                               border-2 border-white/30
                               backdrop-blur-sm
                               flex items-center justify-center
                               text-3xl sm:text-4xl
                               font-extrabold
                               shadow-xl
                               shrink-0"
                    >
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>


                    {{-- User information --}}
                    <div class="min-w-0">

                        <p class="text-sm font-medium text-blue-100 mb-1">
                            CampusConnect Account
                        </p>

                        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold break-words">
                            {{ Auth::user()->name }}
                        </h1>

                        <p class="mt-1 text-sm sm:text-base text-blue-100 break-all">
                            {{ Auth::user()->email }}
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- PROFILE CONTENT --}}
        {{-- ========================================================= --}}

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10">


            {{-- ===================================================== --}}
            {{-- BACK TO DASHBOARD --}}
            {{-- ===================================================== --}}

            <div class="mb-6">

                <a
                    href="{{ $dashboardRoute ?? route('dashboard') }}"
                    class="inline-flex items-center gap-2
                           px-4 py-2.5
                           rounded-xl
                           bg-white
                           border-2 border-slate-200
                           text-slate-700
                           font-semibold
                           text-sm
                           shadow-sm
                           hover:bg-blue-50
                           hover:border-blue-300
                           hover:text-blue-700
                           transition-all duration-200"
                >

                    <span class="text-lg">
                        ←
                    </span>

                    <span>
                        Back to Dashboard
                    </span>

                </a>

            </div>


            {{-- ===================================================== --}}
            {{-- PROFILE INFORMATION --}}
            {{-- ===================================================== --}}

            <div
                class="bg-white
                       rounded-2xl sm:rounded-3xl
                       border-2 border-slate-200
                       shadow-lg
                       overflow-hidden
                       mb-6"
            >

                {{-- Section header --}}
                <div
                    class="px-5 sm:px-7 lg:px-8
                           py-5
                           bg-gradient-to-r
                           from-blue-50
                           to-sky-50
                           border-b-2 border-slate-200"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="w-11 h-11
                                   rounded-xl
                                   bg-blue-100
                                   border-2 border-blue-200
                                   text-blue-600
                                   flex items-center justify-center
                                   text-xl
                                   shrink-0"
                        >
                            👤
                        </div>

                        <div class="min-w-0">

                            <h2 class="text-lg sm:text-xl font-bold text-slate-800">
                                Profile Information
                            </h2>

                            <p class="text-sm text-slate-500 mt-0.5">
                                Update your name and email address.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Form --}}
                <div class="p-5 sm:p-7 lg:p-8">

                    <div
                        class="w-full max-w-2xl
                               rounded-2xl
                               border-2 border-slate-200
                               bg-slate-50/50
                               p-4 sm:p-6"
                    >

                        @include('landlord.profile.partials.update-profile-information-form')

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- PASSWORD --}}
            {{-- ===================================================== --}}

            <div
                class="bg-white
                       rounded-2xl sm:rounded-3xl
                       border-2 border-slate-200
                       shadow-lg
                       overflow-hidden
                       mb-6"
            >

                {{-- Section header --}}
                <div
                    class="px-5 sm:px-7 lg:px-8
                           py-5
                           bg-gradient-to-r
                           from-indigo-50
                           to-blue-50
                           border-b-2 border-slate-200"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="w-11 h-11
                                   rounded-xl
                                   bg-indigo-100
                                   border-2 border-indigo-200
                                   text-indigo-600
                                   flex items-center justify-center
                                   text-xl
                                   shrink-0"
                        >
                            🔐
                        </div>

                        <div class="min-w-0">

                            <h2 class="text-lg sm:text-xl font-bold text-slate-800">
                                Update Password
                            </h2>

                            <p class="text-sm text-slate-500 mt-0.5">
                                Keep your CampusConnect account secure.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Form --}}
                <div class="p-5 sm:p-7 lg:p-8">

                    <div
                        class="w-full max-w-2xl
                               rounded-2xl
                               border-2 border-slate-200
                               bg-slate-50/50
                               p-4 sm:p-6"
                    >

                        @include('landlord.profile.partials.update-password-form')

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- DELETE ACCOUNT --}}
            {{-- ===================================================== --}}

            <div
                class="bg-white
                       rounded-2xl sm:rounded-3xl
                       border-2 border-red-200
                       shadow-lg
                       overflow-hidden"
            >

                {{-- Section header --}}
                <div
                    class="px-5 sm:px-7 lg:px-8
                           py-5
                           bg-gradient-to-r
                           from-red-50
                           to-rose-50
                           border-b-2 border-red-200"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="w-11 h-11
                                   rounded-xl
                                   bg-red-100
                                   border-2 border-red-200
                                   text-red-600
                                   flex items-center justify-center
                                   text-xl
                                   shrink-0"
                        >
                            ⚠️
                        </div>

                        <div class="min-w-0">

                            <h2 class="text-lg sm:text-xl font-bold text-slate-800">
                                Delete Account
                            </h2>

                            <p class="text-sm text-slate-500 mt-0.5">
                                Permanently remove your CampusConnect account.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Form --}}
                <div class="p-5 sm:p-7 lg:p-8">

                    <div
                        class="w-full max-w-2xl
                               rounded-2xl
                               border-2 border-red-200
                               bg-red-50/30
                               p-4 sm:p-6"
                    >

                        @include('landlord.profile.partials.delete-user-form')

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- SECURITY NOTE --}}
            {{-- ===================================================== --}}

            <div
                class="mt-6
                       rounded-2xl
                       bg-slate-900
                       border-2 border-slate-700
                       p-5 sm:p-6
                       shadow-lg"
            >

                <div class="flex items-start gap-4">

                    <div
                        class="w-10 h-10
                               rounded-xl
                               bg-blue-500/10
                               border-2 border-blue-500/30
                               flex items-center justify-center
                               text-lg
                               shrink-0"
                    >
                        🛡️
                    </div>

                    <div class="min-w-0">

                        <h3 class="font-bold text-white">
                            Keep your account secure
                        </h3>

                        <p class="mt-1 text-sm text-slate-400 leading-relaxed">
                            Never share your CampusConnect password with anyone.
                            Use a strong password and make sure your account details
                            are kept up to date.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- VISIBLE FORM INPUT BORDERS --}}
    {{-- ========================================================= --}}

    <style>

        /*
        |--------------------------------------------------------------------------
        | PROFILE FORM INPUTS
        |--------------------------------------------------------------------------
        | These styles make the actual input fields clearly visible even when
        | Tailwind's default border color is too faint.
        |--------------------------------------------------------------------------
        */

        .profile-input-border input,
        .profile-input-border textarea,
        .profile-input-border select {

            border: 2px solid #cbd5e1 !important;

            border-radius: 12px !important;

            background-color: #ffffff !important;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background-color .2s ease;

        }


        .profile-input-border input:hover,
        .profile-input-border textarea:hover,
        .profile-input-border select:hover {

            border-color: #94a3b8 !important;

        }


        .profile-input-border input:focus,
        .profile-input-border textarea:focus,
        .profile-input-border select:focus {

            border-color: #2563eb !important;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, .12) !important;

            outline: none !important;

        }


        /*
        |--------------------------------------------------------------------------
        | MOBILE INPUTS
        |--------------------------------------------------------------------------
        */

        @media (max-width: 640px) {

            .profile-input-border input,
            .profile-input-border textarea,
            .profile-input-border select {

                width: 100% !important;

                font-size: 16px !important;

                min-height: 46px;

            }

        }

    </style>


</x-landlord-layout>
