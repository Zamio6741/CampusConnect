<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CampusConnect Admin</title>

    @vite(['resources/css/app.css'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    >

</head>


<body class="min-h-screen bg-slate-100 font-[Inter] overflow-x-hidden">


<div class="min-h-screen flex flex-col lg:flex-row">


    <!-- ========================================================= -->
    <!-- LEFT PANEL -->
    <!-- ========================================================= -->

    <section
        class="relative w-full
               lg:w-[55%]
               xl:w-[58%]
               overflow-hidden
               bg-gradient-to-br
               from-[#071a3d]
               via-[#0b2f68]
               to-[#0759b8]
               text-white"
    >


        <!-- ===================================================== -->
        <!-- DECORATIVE BACKGROUND -->
        <!-- ===================================================== -->

        <div
            class="absolute
                   -top-24
                   -left-24
                   sm:-top-32
                   sm:-left-32
                   w-64
                   h-64
                   sm:w-96
                   sm:h-96
                   bg-blue-400/20
                   rounded-full
                   blur-3xl
                   pointer-events-none"
        ></div>


        <div
            class="absolute
                   -bottom-24
                   -right-24
                   sm:-bottom-40
                   sm:-right-32
                   w-72
                   h-72
                   sm:w-[500px]
                   sm:h-[500px]
                   bg-cyan-400/10
                   rounded-full
                   blur-3xl
                   pointer-events-none"
        ></div>


        <!-- ===================================================== -->
        <!-- LEFT CONTENT -->
        <!-- ===================================================== -->

        <div
            class="relative z-10
                   flex flex-col
                   min-h-full
                   px-5
                   py-7
                   sm:px-8
                   sm:py-10
                   md:px-10
                   lg:px-14
                   xl:px-20
                   lg:py-14"
        >


            <!-- ================================================= -->
            <!-- BRAND -->
            <!-- ================================================= -->

            <div>

                <div class="flex items-center gap-3 sm:gap-4">


                    <!-- LOGO -->

                    <div
                        class="w-11
                               h-11
                               sm:w-14
                               sm:h-14
                               rounded-xl
                               sm:rounded-2xl
                               bg-blue-500
                               flex
                               items-center
                               justify-center
                               shrink-0
                               shadow-xl
                               shadow-blue-950/40
                               border
                               border-blue-300/20"
                    >

                        <span class="text-2xl sm:text-3xl">
                            🎓
                        </span>

                    </div>


                    <!-- BRAND NAME -->

                    <div class="min-w-0">

                        <h1
                            class="text-xl
                                   sm:text-2xl
                                   md:text-3xl
                                   font-extrabold
                                   tracking-tight
                                   truncate"
                        >

                            <span class="text-white">
                                Campus
                            </span>

                            <span class="text-blue-300">
                                Connect
                            </span>

                        </h1>


                        <p
                            class="text-[11px]
                                   sm:text-sm
                                   text-blue-100/80
                                   mt-0.5"
                        >
                            University Management Platform
                        </p>

                    </div>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- MAIN MESSAGE -->
            <!-- ================================================= -->

            <div
                class="max-w-2xl
                       mt-12
                       sm:mt-16
                       lg:mt-auto
                       lg:mb-auto
                       lg:pt-20"
            >


                <!-- PORTAL BADGE -->

                <div
                    class="inline-flex
                           items-center
                           gap-2
                           px-3
                           py-1.5
                           rounded-full
                           bg-white/10
                           border
                           border-white/10
                           text-blue-100
                           text-xs
                           sm:text-sm
                           font-semibold
                           mb-5
                           sm:mb-6"
                >

                    <span
                        class="w-2
                               h-2
                               rounded-full
                               bg-green-400
                               shrink-0"
                    ></span>

                    Administrator Portal

                </div>


                <!-- HEADING -->

                <h2
                    class="text-3xl
                           sm:text-4xl
                           md:text-5xl
                           xl:text-6xl
                           font-black
                           leading-[1.08]
                           tracking-tight"
                >

                    Manage CampusConnect

                    <span class="text-blue-300">
                        with confidence.
                    </span>

                </h2>


                <!-- DESCRIPTION -->

                <p
                    class="mt-5
                           sm:mt-6
                           text-sm
                           sm:text-base
                           lg:text-lg
                           leading-6
                           sm:leading-7
                           lg:leading-8
                           text-blue-50/85
                           max-w-xl"
                >

                    Your central command center for managing users,
                    businesses, accommodation, academic resources,
                    announcements and platform activity.

                </p>


                <!-- ================================================= -->
                <!-- FEATURES -->
                <!-- ================================================= -->

                <div
                    class="mt-7
                           sm:mt-10
                           grid
                           grid-cols-1
                           sm:grid-cols-2
                           gap-3
                           sm:gap-4
                           lg:gap-5"
                >


                    <!-- USER MANAGEMENT -->

                    <div
                        class="flex
                               items-start
                               gap-3
                               p-3
                               sm:p-4
                               rounded-xl
                               sm:rounded-2xl
                               bg-white/5
                               border
                               border-white/10
                               backdrop-blur-sm"
                    >

                        <div
                            class="w-8
                                   h-8
                                   sm:w-9
                                   sm:h-9
                                   rounded-lg
                                   sm:rounded-xl
                                   bg-blue-500
                                   flex
                                   items-center
                                   justify-center
                                   shrink-0
                                   shadow-lg
                                   font-bold"
                        >
                            ✓
                        </div>


                        <div class="min-w-0">

                            <h3
                                class="font-bold
                                       text-sm
                                       sm:text-base
                                       text-white"
                            >
                                User Management
                            </h3>


                            <p
                                class="text-xs
                                       sm:text-sm
                                       text-blue-100/70
                                       mt-1"
                            >
                                Control platform users
                            </p>

                        </div>

                    </div>


                    <!-- CONTENT CONTROL -->

                    <div
                        class="flex
                               items-start
                               gap-3
                               p-3
                               sm:p-4
                               rounded-xl
                               sm:rounded-2xl
                               bg-white/5
                               border
                               border-white/10
                               backdrop-blur-sm"
                    >

                        <div
                            class="w-8
                                   h-8
                                   sm:w-9
                                   sm:h-9
                                   rounded-lg
                                   sm:rounded-xl
                                   bg-blue-500
                                   flex
                                   items-center
                                   justify-center
                                   shrink-0
                                   shadow-lg
                                   font-bold"
                        >
                            ✓
                        </div>


                        <div class="min-w-0">

                            <h3
                                class="font-bold
                                       text-sm
                                       sm:text-base
                                       text-white"
                            >
                                Content Control
                            </h3>


                            <p
                                class="text-xs
                                       sm:text-sm
                                       text-blue-100/70
                                       mt-1"
                            >
                                Manage academic resources
                            </p>

                        </div>

                    </div>


                    <!-- PLATFORM MONITORING -->

                    <div
                        class="flex
                               items-start
                               gap-3
                               p-3
                               sm:p-4
                               rounded-xl
                               sm:rounded-2xl
                               bg-white/5
                               border
                               border-white/10
                               backdrop-blur-sm"
                    >

                        <div
                            class="w-8
                                   h-8
                                   sm:w-9
                                   sm:h-9
                                   rounded-lg
                                   sm:rounded-xl
                                   bg-blue-500
                                   flex
                                   items-center
                                   justify-center
                                   shrink-0
                                   shadow-lg
                                   font-bold"
                        >
                            ✓
                        </div>


                        <div class="min-w-0">

                            <h3
                                class="font-bold
                                       text-sm
                                       sm:text-base
                                       text-white"
                            >
                                Platform Monitoring
                            </h3>


                            <p
                                class="text-xs
                                       sm:text-sm
                                       text-blue-100/70
                                       mt-1"
                            >
                                Track system activity
                            </p>

                        </div>

                    </div>


                    <!-- SECURE ACCESS -->

                    <div
                        class="flex
                               items-start
                               gap-3
                               p-3
                               sm:p-4
                               rounded-xl
                               sm:rounded-2xl
                               bg-white/5
                               border
                               border-white/10
                               backdrop-blur-sm"
                    >

                        <div
                            class="w-8
                                   h-8
                                   sm:w-9
                                   sm:h-9
                                   rounded-lg
                                   sm:rounded-xl
                                   bg-blue-500
                                   flex
                                   items-center
                                   justify-center
                                   shrink-0
                                   shadow-lg
                                   font-bold"
                        >
                            ✓
                        </div>


                        <div class="min-w-0">

                            <h3
                                class="font-bold
                                       text-sm
                                       sm:text-base
                                       text-white"
                            >
                                Secure Access
                            </h3>


                            <p
                                class="text-xs
                                       sm:text-sm
                                       text-blue-100/70
                                       mt-1"
                            >
                                Protected administrator area
                            </p>

                        </div>

                    </div>


                </div>

            </div>


            <!-- ================================================= -->
            <!-- FOOTER -->
            <!-- ================================================= -->

            <div
                class="mt-10
                       sm:mt-14
                       pt-5
                       sm:pt-6
                       border-t
                       border-white/10
                       flex
                       flex-col
                       sm:flex-row
                       sm:items-center
                       sm:justify-between
                       gap-2"
            >

                <p
                    class="text-xs
                           sm:text-sm
                           text-blue-100/60"
                >
                    © 2026 CampusConnect
                </p>


                <p
                    class="text-xs
                           sm:text-sm
                           text-blue-100/60"
                >
                    Administrator Portal
                </p>

            </div>


        </div>

    </section>



    <!-- ========================================================= -->
    <!-- RIGHT LOGIN PANEL -->
    <!-- ========================================================= -->

    <section
        class="w-full
               lg:w-[45%]
               xl:w-[42%]
               bg-slate-50
               flex
               items-center
               justify-center
               px-4
               py-10
               sm:px-6
               sm:py-12
               md:px-8
               lg:px-10
               xl:px-16"
    >


        <div class="w-full max-w-md">


            <!-- ================================================= -->
            <!-- LOGIN HEADER -->
            <!-- ================================================= -->

            <div class="mb-6 sm:mb-8">


                <!-- ICON -->

                <div
                    class="w-12
                           h-12
                           sm:w-14
                           sm:h-14
                           rounded-xl
                           sm:rounded-2xl
                           bg-blue-600
                           flex
                           items-center
                           justify-center
                           text-xl
                           sm:text-2xl
                           shadow-lg
                           shadow-blue-600/20
                           mb-5
                           sm:mb-6"
                >
                    🔐
                </div>


                <h2
                    class="text-3xl
                           sm:text-4xl
                           font-extrabold
                           text-slate-900
                           tracking-tight"
                >
                    Welcome back
                </h2>


                <p
                    class="mt-2
                           text-sm
                           sm:text-base
                           text-slate-600"
                >
                    Sign in to your administrator account.
                </p>

            </div>


            <!-- ================================================= -->
            <!-- ERRORS -->
            <!-- ================================================= -->

            @if($errors->any())

                <div
                    class="mb-5
                           sm:mb-6
                           rounded-xl
                           sm:rounded-2xl
                           border
                           border-red-200
                           bg-red-50
                           p-3
                           sm:p-4"
                >

                    <div class="flex items-start gap-3">

                        <div
                            class="w-8
                                   h-8
                                   rounded-lg
                                   bg-red-100
                                   text-red-600
                                   flex
                                   items-center
                                   justify-center
                                   shrink-0
                                   font-bold"
                        >
                            !
                        </div>


                        <div class="min-w-0">

                            <p class="font-bold text-red-800">
                                Login failed
                            </p>


                            <p
                                class="text-sm
                                       text-red-700
                                       mt-1
                                       break-words"
                            >
                                {{ $errors->first() }}
                            </p>

                        </div>

                    </div>

                </div>

            @endif


            <!-- ================================================= -->
            <!-- LOGIN CARD -->
            <!-- ================================================= -->

            <div
                class="bg-white
                       rounded-2xl
                       sm:rounded-3xl
                       border
                       border-slate-200
                       shadow-xl
                       shadow-slate-900/5
                       p-5
                       sm:p-8"
            >

                <form
                    action="{{ route('admin.login.submit') }}"
                    method="POST"
                    class="space-y-5 sm:space-y-6"
                >

                    @csrf


                    <!-- ================================================= -->
                    <!-- EMAIL -->
                    <!-- ================================================= -->

                    <div>

                        <label
                            for="email"
                            class="block
                                   text-sm
                                   font-bold
                                   text-slate-800
                                   mb-2"
                        >
                            Email Address
                        </label>


                        <div class="relative">

                            <div
                                class="absolute
                                       left-4
                                       top-1/2
                                       -translate-y-1/2
                                       text-slate-400
                                       pointer-events-none"
                            >
                                ✉️
                            </div>


                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                placeholder="admin@example.com"
                                class="w-full
                                       h-13
                                       sm:h-14
                                       rounded-xl
                                       border
                                       border-slate-300
                                       bg-slate-50
                                       pl-12
                                       pr-4
                                       text-sm
                                       sm:text-base
                                       text-slate-900
                                       placeholder:text-slate-400
                                       outline-none
                                       transition
                                       focus:bg-white
                                       focus:border-blue-500
                                       focus:ring-4
                                       focus:ring-blue-500/10"
                            >

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- PASSWORD -->
                    <!-- ================================================= -->

                    <div>

                        <label
                            for="password"
                            class="block
                                   text-sm
                                   font-bold
                                   text-slate-800
                                   mb-2"
                        >
                            Password
                        </label>


                        <div class="relative">

                            <div
                                class="absolute
                                       left-4
                                       top-1/2
                                       -translate-y-1/2
                                       text-slate-400
                                       pointer-events-none"
                            >
                                🔒
                            </div>


                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter your password"
                                class="w-full
                                       h-13
                                       sm:h-14
                                       rounded-xl
                                       border
                                       border-slate-300
                                       bg-slate-50
                                       pl-12
                                       pr-4
                                       text-sm
                                       sm:text-base
                                       text-slate-900
                                       placeholder:text-slate-400
                                       outline-none
                                       transition
                                       focus:bg-white
                                       focus:border-blue-500
                                       focus:ring-4
                                       focus:ring-blue-500/10"
                            >

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- REMEMBER -->
                    <!-- ================================================= -->

                    <div class="flex items-center">

                        <label
                            class="inline-flex
                                   items-center
                                   gap-3
                                   cursor-pointer"
                        >

                            <input
                                type="checkbox"
                                name="remember"
                                class="w-4
                                       h-4
                                       rounded
                                       border-slate-300
                                       text-blue-600
                                       focus:ring-blue-500"
                            >


                            <span
                                class="text-sm
                                       text-slate-600"
                            >
                                Remember me
                            </span>

                        </label>

                    </div>


                    <!-- ================================================= -->
                    <!-- LOGIN BUTTON -->
                    <!-- ================================================= -->

                    <button
                        type="submit"
                        class="w-full
                               h-13
                               sm:h-14
                               rounded-xl
                               bg-gradient-to-r
                               from-blue-600
                               to-blue-700
                               hover:from-blue-700
                               hover:to-blue-800
                               active:scale-[0.99]
                               text-white
                               font-bold
                               text-sm
                               sm:text-base
                               shadow-lg
                               shadow-blue-600/20
                               transition
                               duration-200
                               flex
                               items-center
                               justify-center
                               gap-2"
                    >

                        <span>
                            Sign In
                        </span>

                        <span class="text-lg">
                            →
                        </span>

                    </button>


                </form>

            </div>


            <!-- ================================================= -->
            <!-- SECURITY MESSAGE -->
            <!-- ================================================= -->

            <div
                class="mt-5
                       sm:mt-6
                       flex
                       items-center
                       justify-center
                       gap-2
                       text-xs
                       sm:text-sm
                       text-slate-500
                       text-center"
            >

                <span>
                    🔐
                </span>

                <span>
                    Secure administrator access
                </span>

            </div>


            <!-- ================================================= -->
            <!-- COPYRIGHT -->
            <!-- ================================================= -->

            <p
                class="text-center
                       text-[11px]
                       sm:text-xs
                       text-slate-400
                       mt-6
                       sm:mt-8"
            >
                CampusConnect © 2026. All rights reserved.
            </p>


        </div>

    </section>


</div>

</body>
</html>