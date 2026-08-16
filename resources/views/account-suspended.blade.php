<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Account Suspended | CampusConnect</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-slate-100 flex items-center justify-center p-6">

    <div class="w-full max-w-2xl">

        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden">

            {{-- Header --}}

            <div class="bg-gradient-to-r from-red-600 to-orange-500 px-8 py-10 text-center text-white">

                <div class="mx-auto mb-5 w-20 h-20 rounded-full bg-white/20 flex items-center justify-center">

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
                            d="M12 9v4m0 4h.01M10.29 3.86l-7.5 13A2 2 0 004.54 20h14.92a2 2 0 001.75-3.14l-7.5-13a2 2 0 00-3.42 0z"
                        />
                    </svg>

                </div>

                <h1 class="text-3xl md:text-4xl font-extrabold">
                    Account Suspended
                </h1>

                <p class="mt-3 text-red-50 text-lg">
                    Your CampusConnect account has been temporarily suspended.
                </p>

            </div>


            {{-- Content --}}

            <div class="p-8 md:p-10">

                <div class="text-center">

                    <h2 class="text-2xl font-bold text-slate-800">
                        Hi, {{ auth()->user()->name }}
                    </h2>

                    <p class="mt-4 text-slate-600 leading-relaxed">
                        Your account is currently unavailable because it has
                        been suspended by a CampusConnect administrator.
                    </p>

                    <p class="mt-3 text-slate-600 leading-relaxed">
                        If you believe this suspension was made in error,
                        or you need assistance recovering your account,
                        please contact the CampusConnect administration team.
                    </p>

                </div>


                {{-- Information Cards --}}

                <div class="grid md:grid-cols-2 gap-5 mt-8">

                    <div class="rounded-2xl border border-sky-200 bg-sky-50 p-6">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-xl bg-sky-600 text-white flex items-center justify-center">

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
                                        d="M8 10h8m-8 4h5m7-2a8 8 0 11-16 0 8 8 0 0116 0z"
                                    />
                                </svg>

                            </div>

                            <h3 class="font-bold text-slate-800">
                                Contact Administration
                            </h3>

                        </div>

                        <p class="mt-4 text-sm text-slate-600 leading-relaxed">
                            Contact a CampusConnect administrator and explain
                            your situation to request an account review.
                        </p>

                    </div>


                    <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-6">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-xl bg-emerald-600 text-white flex items-center justify-center">

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
                                        d="M3 5a2 2 0 012-2h3.28a2 2 0 011.94 1.515L11.5 8a2 2 0 01-.51 1.94l-1.27 1.27a16 16 0 006.07 6.07l1.27-1.27a2 2 0 011.94-.51l3.485.28A2 2 0 0122 17.72V21a2 2 0 01-2 2C10.059 23 1 13.941 1 2a2 2 0 012-2z"
                                    />
                                </svg>

                            </div>

                            <h3 class="font-bold text-slate-800">
                                Need Help?
                            </h3>

                        </div>

                        <p class="mt-4 text-sm text-slate-600 leading-relaxed">
                            Reach out through the official CampusConnect
                            support or helpline for assistance.
                        </p>

                    </div>

                </div>


                {{-- Account Information --}}

                <div class="mt-8 rounded-2xl bg-slate-50 border border-slate-200 p-6">

                    <h3 class="font-bold text-slate-800 mb-4">
                        Account Information
                    </h3>

                    <div class="space-y-3 text-sm">

                        <div class="flex justify-between gap-4">

                            <span class="text-slate-500">
                                Name
                            </span>

                            <span class="font-semibold text-slate-800 text-right">
                                {{ auth()->user()->name }}
                            </span>

                        </div>

                        <div class="flex justify-between gap-4">

                            <span class="text-slate-500">
                                Email
                            </span>

                            <span class="font-semibold text-slate-800 text-right break-all">
                                {{ auth()->user()->email }}
                            </span>

                        </div>

                        <div class="flex justify-between gap-4">

                            <span class="text-slate-500">
                                Account Status
                            </span>

                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold">

                                <span class="w-2 h-2 rounded-full bg-red-500"></span>

                                Suspended

                            </span>

                        </div>

                    </div>

                </div>


                {{-- Logout --}}

                <div class="mt-8 text-center">

                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-900 text-white font-semibold transition shadow-sm"
                        >
                            Sign Out
                        </button>

                    </form>

                </div>

                <p class="text-center text-xs text-slate-400 mt-6">
                    CampusConnect &copy; {{ date('Y') }}.
                    Your account can be restored after an administrative review.
                </p>

            </div>

        </div>

    </div>

</body>

</html>