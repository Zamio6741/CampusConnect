<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Account Suspended | CampusConnect</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 flex items-center justify-center px-6">

    <div class="w-full max-w-2xl">

        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden">

            {{-- HEADER --}}

            <div class="bg-gradient-to-r from-red-600 to-rose-600 px-8 py-10 text-center text-white">

                <div class="mx-auto w-20 h-20 rounded-full bg-white/20 flex items-center justify-center mb-5">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-10 h-10"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v3.75m0 3.75h.008M10.29 3.86l-7.08 12.25A2 2 0 004.94 19h14.12a2 2 0 001.73-2.89L13.71 3.86a2 2 0 00-3.42 0z"
                        />
                    </svg>

                </div>

                <h1 class="text-3xl font-bold">
                    Account Suspended
                </h1>

                <p class="mt-3 text-red-100">
                    Your CampusConnect account has been temporarily suspended.
                </p>

            </div>


            {{-- CONTENT --}}

            <div class="px-8 py-10">

                <div class="text-center">

                    <h2 class="text-2xl font-bold text-slate-800">
                        Hi, {{ auth()->user()->name }}
                    </h2>

                    <p class="mt-4 text-slate-600 leading-relaxed">
                        Your account is currently inactive and you cannot access
                        CampusConnect services at the moment.
                    </p>

                </div>


                {{-- NOTICE --}}

                <div class="mt-8 rounded-2xl border border-red-200 bg-red-50 p-6">

                    <div class="flex gap-4">

                        <div class="flex-shrink-0">

                            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">

                                <span class="text-red-600 text-xl">
                                    !
                                </span>

                            </div>

                        </div>

                        <div>

                            <h3 class="font-bold text-red-800">
                                What should you do?
                            </h3>

                            <p class="mt-2 text-sm text-red-700 leading-relaxed">
                                If you believe this suspension was made in error,
                                please contact the CampusConnect administrator or
                                our support team. They will review your account
                                and assist you with recovering access.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- SUPPORT OPTIONS --}}

                <div class="mt-8 grid sm:grid-cols-2 gap-4">

                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                        <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center mb-4">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>

                        </div>

                        <h3 class="font-bold text-slate-800">
                            Contact Admin
                        </h3>

                        <p class="text-sm text-slate-500 mt-2">
                            Contact the CampusConnect administrator to request
                            an account review.
                        </p>

                    </div>


                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                        <div class="w-11 h-11 rounded-xl bg-green-100 text-green-600 flex items-center justify-center mb-4">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M18.364 5.636a9 9 0 11-12.728 0M12 2v10m0 0l3 3m-3-3l-3 3"
                                />
                            </svg>

                        </div>

                        <h3 class="font-bold text-slate-800">
                            Contact Helpline
                        </h3>

                        <p class="text-sm text-slate-500 mt-2">
                            Reach the CampusConnect support team for assistance
                            with your account.
                        </p>

                    </div>

                </div>


                {{-- LOGOUT --}}

                <div class="mt-10 text-center">

                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 px-7 py-3 rounded-xl bg-slate-800 hover:bg-slate-900 text-white font-semibold transition shadow-md hover:shadow-lg"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                />
                            </svg>

                            Log Out

                        </button>

                    </form>

                </div>

            </div>

        </div>


        <p class="text-center text-sm text-slate-400 mt-6">
            © {{ date('Y') }} CampusConnect. All rights reserved.
        </p>

    </div>

</body>
</html>