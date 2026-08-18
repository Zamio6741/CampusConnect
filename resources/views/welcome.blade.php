<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="CampusConnect - Kenya's Smart Student Platform"
    >

    <title>CampusConnect</title>

    <script src="https://unpkg.com/lucide@latest"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-50 text-gray-800 antialiased">

@php

    /*
    |--------------------------------------------------------------------------
    | ADMIN CONFIGURABLE SETTINGS
    |--------------------------------------------------------------------------
    |
    | These values should eventually come from your admin settings table.
    | The controller should pass $siteSettings to this view.
    |
    */

    $settings = $siteSettings ?? [];

    $contactAddress = data_get(
        $settings,
        'contact_address',
        'Nairobi, Kenya'
    );

    $contactEmail = data_get(
        $settings,
        'contact_email',
        'campusconnectke8@gmail.com'
    );

    $contactPhone = data_get(
        $settings,
        'contact_phone',
        '+254 117 582 339'
    );

    $whatsapp = data_get(
        $settings,
        'whatsapp',
        $contactPhone
    );

    $facebook = data_get(
        $settings,
        'facebook',
        '#'
    );

    $instagram = data_get(
        $settings,
        'instagram',
        '#'
    );

    $linkedin = data_get(
        $settings,
        'linkedin',
        '#'
    );

    $twitter = data_get(
        $settings,
        'twitter',
        '#'
    );

    $supportHours = data_get(
        $settings,
        'support_hours',
        '24/7 Support'
    );

    $platformName = data_get(
        $settings,
        'platform_name',
        'CampusConnect'
    );

    $platformTagline = data_get(
        $settings,
        'platform_tagline',
        "Kenya's Smart Student Platform"
    );

@endphp


<!-- ========================================================= -->
<!-- NAVBAR -->
<!-- ========================================================= -->

<header
    class="sticky top-0 z-50 bg-white/95 backdrop-blur-xl border-b border-slate-200 shadow-sm"
>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="min-h-16 sm:min-h-20 flex items-center justify-between gap-4">

            <!-- LOGO -->

            <a
                href="/"
                class="flex items-center gap-2 sm:gap-4 min-w-0"
            >

                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-blue-600 flex items-center justify-center shadow-lg flex-shrink-0"
                >

                    <span class="text-xl sm:text-2xl">
                        🎓
                    </span>

                </div>

                <div class="min-w-0">

                    <h1
                        class="text-xl sm:text-2xl lg:text-3xl font-black tracking-tight truncate"
                    >

                        <span class="text-slate-900">
                            Campus
                        </span>

                        <span class="text-blue-600">
                            Connect
                        </span>

                    </h1>

                    <p
                        class="hidden sm:block text-xs sm:text-sm text-slate-500 truncate"
                    >

                        {{ $platformTagline }}

                    </p>

                </div>

            </a>


            <!-- DESKTOP NAVIGATION -->

            <nav class="hidden lg:flex items-center gap-7 xl:gap-10">

                <a
                    href="#features"
                    class="font-semibold text-slate-600 hover:text-blue-600 transition"
                >
                    Features
                </a>

                <a
                    href="#about"
                    class="font-semibold text-slate-600 hover:text-blue-600 transition"
                >
                    About
                </a>

                <a
                    href="#how"
                    class="font-semibold text-slate-600 hover:text-blue-600 transition"
                >
                    How It Works
                </a>

                <a
                    href="#contact"
                    class="font-semibold text-slate-600 hover:text-blue-600 transition"
                >
                    Contact
                </a>

            </nav>


            <!-- DESKTOP BUTTONS -->

            <div class="hidden md:flex items-center gap-2 sm:gap-3">

                @auth

                    <a
                        href="{{ route('dashboard') }}"
                        class="px-4 sm:px-6 py-2.5 sm:py-3 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition shadow-lg text-sm sm:text-base"
                    >

                        Dashboard

                    </a>

                @else

                    <a
                        href="{{ route('login') }}"
                        class="px-4 sm:px-6 py-2.5 sm:py-3 rounded-xl border-2 border-blue-600 font-semibold text-blue-600 hover:bg-blue-50 transition text-sm sm:text-base"
                    >

                        Login

                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="px-4 sm:px-6 py-2.5 sm:py-3 rounded-xl bg-blue-600 text-white font-bold shadow-lg hover:bg-blue-700 transition text-sm sm:text-base"
                    >

                        Get Started

                    </a>

                @endauth

            </div>


            <!-- MOBILE MENU BUTTON -->

            <button
                id="mobile-menu-button"
                type="button"
                aria-label="Open navigation menu"
                aria-expanded="false"
                class="md:hidden flex items-center justify-center w-11 h-11 rounded-xl border border-slate-300 bg-white text-slate-700 hover:bg-slate-50 transition"
            >

                <i
                    data-lucide="menu"
                    id="menu-open-icon"
                    class="w-6 h-6"
                ></i>

                <i
                    data-lucide="x"
                    id="menu-close-icon"
                    class="w-6 h-6 hidden"
                ></i>

            </button>

        </div>


        <!-- MOBILE NAVIGATION -->

        <div
            id="mobile-menu"
            class="hidden md:hidden border-t border-slate-200 py-4"
        >

            <nav class="flex flex-col gap-2">

                <a
                    href="#features"
                    class="mobile-nav-link px-4 py-3 rounded-xl font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-600 transition"
                >
                    Features
                </a>

                <a
                    href="#about"
                    class="mobile-nav-link px-4 py-3 rounded-xl font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-600 transition"
                >
                    About
                </a>

                <a
                    href="#how"
                    class="mobile-nav-link px-4 py-3 rounded-xl font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-600 transition"
                >
                    How It Works
                </a>

                <a
                    href="#contact"
                    class="mobile-nav-link px-4 py-3 rounded-xl font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-600 transition"
                >
                    Contact
                </a>


                <div class="border-t border-slate-200 mt-2 pt-4 grid grid-cols-2 gap-3">

                    @auth

                        <a
                            href="{{ route('dashboard') }}"
                            class="col-span-2 text-center px-4 py-3 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition"
                        >
                            Dashboard
                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="text-center px-4 py-3 rounded-xl border-2 border-blue-600 text-blue-600 font-semibold hover:bg-blue-50 transition"
                        >
                            Login
                        </a>

                        <a
                            href="{{ route('register') }}"
                            class="text-center px-4 py-3 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition"
                        >
                            Get Started
                        </a>

                    @endauth

                </div>

            </nav>

        </div>

    </div>

</header>


<!-- ========================================================= -->
<!-- HERO -->
<!-- ========================================================= -->

<section
    class="relative overflow-hidden bg-gradient-to-br from-slate-50 via-blue-50 to-sky-100"
>

    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-20 lg:py-24"
    >

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">


            <!-- LEFT -->

            <div class="text-center lg:text-left">

                <span
                    class="inline-flex items-center justify-center gap-2 bg-blue-100 text-blue-700 px-4 sm:px-5 py-2 rounded-full font-semibold text-sm sm:text-base"
                >

                    🎓 Kenya's Smart Student Platform

                </span>


                <h1
                    class="mt-6 sm:mt-8 text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black leading-[1.05] tracking-tight text-slate-900"
                >

                    Your Campus.

                    <br>

                    <span class="text-blue-600">
                        Connected.
                    </span>

                </h1>


                <p
                    class="mt-6 sm:mt-8 text-base sm:text-lg lg:text-xl leading-7 sm:leading-9 text-slate-600 max-w-xl mx-auto lg:mx-0"
                >

                    CampusConnect brings together notes, accommodation,
                    marketplace, student services, announcements,
                    businesses and everything a university student needs
                    in one modern platform.

                </p>


                <div
                    class="flex flex-col sm:flex-row justify-center lg:justify-start gap-3 sm:gap-5 mt-8 sm:mt-10"
                >

                    @guest

                        <a
                            href="{{ route('register') }}"
                            class="w-full sm:w-auto text-center px-7 sm:px-8 py-3.5 sm:py-4 rounded-2xl bg-blue-600 text-white font-bold shadow-xl hover:bg-blue-700 transition"
                        >

                            Get Started

                        </a>

                        <a
                            href="{{ route('login') }}"
                            class="w-full sm:w-auto text-center px-7 sm:px-8 py-3.5 sm:py-4 rounded-2xl border-2 border-blue-600 text-blue-600 font-bold hover:bg-blue-50 transition"
                        >

                            Login

                        </a>

                    @else

                        <a
                            href="{{ route('dashboard') }}"
                            class="w-full sm:w-auto text-center px-7 sm:px-8 py-3.5 sm:py-4 rounded-2xl bg-blue-600 text-white font-bold shadow-xl hover:bg-blue-700 transition"
                        >

                            Go To Dashboard

                        </a>

                    @endguest

                </div>


                <!-- STATISTICS -->

                <div
                    class="grid grid-cols-3 gap-4 sm:gap-8 mt-12 sm:mt-16"
                >

                    <div>

                        <h2
                            class="text-2xl sm:text-3xl lg:text-4xl font-black text-blue-600"
                        >
                            10K+
                        </h2>

                        <p class="text-slate-500 mt-1 sm:mt-2 text-xs sm:text-base">
                            Students
                        </p>

                    </div>

                    <div>

                        <h2
                            class="text-2xl sm:text-3xl lg:text-4xl font-black text-blue-600"
                        >
                            5K+
                        </h2>

                        <p class="text-slate-500 mt-1 sm:mt-2 text-xs sm:text-base">
                            Resources
                        </p>

                    </div>

                    <div>

                        <h2
                            class="text-2xl sm:text-3xl lg:text-4xl font-black text-blue-600"
                        >
                            24/7
                        </h2>

                        <p class="text-slate-500 mt-1 sm:mt-2 text-xs sm:text-base">
                            Support
                        </p>

                    </div>

                </div>

            </div>


            <!-- RIGHT IMAGE -->

            <div class="relative">

                <div
                    class="absolute -top-10 -left-10 w-48 h-48 bg-blue-300 rounded-full blur-3xl opacity-20"
                ></div>

                <div
                    class="absolute -bottom-10 -right-10 w-56 h-56 bg-sky-300 rounded-full blur-3xl opacity-20"
                ></div>

                <img
                    src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80"
                    alt="University Students"
                    loading="lazy"
                    class="relative rounded-3xl sm:rounded-[40px] shadow-2xl w-full h-[360px] sm:h-[480px] lg:h-[620px] object-cover"
                >

            </div>

        </div>

    </div>

</section>


<!-- ========================================================= -->
<!-- FEATURES -->
<!-- ========================================================= -->

<section
    id="features"
    class="py-16 sm:py-20 lg:py-28 bg-white"
>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div class="text-center max-w-3xl mx-auto">

            <span
                class="text-blue-600 uppercase tracking-[0.2em] sm:tracking-[0.25em] font-bold text-sm"
            >
                Everything You Need
            </span>

            <h2
                class="mt-4 sm:mt-5 text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900"
            >

                One Platform.

                <br>

                Every Student Service.

            </h2>

            <p
                class="mt-5 sm:mt-6 text-base sm:text-lg lg:text-xl text-slate-500 leading-7 sm:leading-9"
            >

                CampusConnect combines all essential university services
                into one beautiful and secure platform.

            </p>

        </div>


        <div
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6 lg:gap-8 mt-12 sm:mt-16 lg:mt-20"
        >


            <!-- FEATURE CARD -->

            @php

                $features = [

                    [
                        'icon' => '📚',
                        'title' => 'Notes',
                        'description' => 'Access quality lecture notes uploaded by students.'
                    ],

                    [
                        'icon' => '📄',
                        'title' => 'Past Papers',
                        'description' => 'Prepare smarter with CATs and previous examinations.'
                    ],

                    [
                        'icon' => '🏠',
                        'title' => 'Accommodation',
                        'description' => 'Find hostels and trusted off-campus rentals.'
                    ],

                    [
                        'icon' => '🛒',
                        'title' => 'Marketplace',
                        'description' => 'Buy and sell safely with fellow students.'
                    ],

                    [
                        'icon' => '🎓',
                        'title' => 'Student Services',
                        'description' => 'HELB information, registration and student support.'
                    ],

                    [
                        'icon' => '🔍',
                        'title' => 'Lost & Found',
                        'description' => 'Report and recover lost items within campus.'
                    ],

                    [
                        'icon' => '🏪',
                        'title' => 'Businesses',
                        'description' => 'Discover nearby shops and student-friendly services.'
                    ],

                    [
                        'icon' => '📢',
                        'title' => 'Announcements',
                        'description' => 'Stay updated with university news and notices.'
                    ],

                ];

            @endphp


            @foreach($features as $feature)

                <div
                    class="bg-white border border-slate-200 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-sm hover:shadow-2xl hover:-translate-y-1 sm:hover:-translate-y-2 transition duration-300"
                >

                    <div class="text-4xl sm:text-5xl">
                        {{ $feature['icon'] }}
                    </div>

                    <h3 class="mt-5 sm:mt-6 text-xl sm:text-2xl font-bold">
                        {{ $feature['title'] }}
                    </h3>

                    <p class="mt-3 sm:mt-4 text-slate-500 leading-7">
                        {{ $feature['description'] }}
                    </p>

                </div>

            @endforeach

        </div>

    </div>

</section>


<!-- ========================================================= -->
<!-- ABOUT -->
<!-- ========================================================= -->

<section
    id="about"
    class="py-16 sm:py-20 lg:py-28 bg-slate-50"
>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">


            <!-- IMAGE -->

            <div class="relative">

                <div
                    class="absolute -top-8 -left-8 w-40 h-40 bg-blue-200 rounded-full blur-3xl opacity-30"
                ></div>

                <div
                    class="absolute -bottom-8 -right-8 w-48 h-48 bg-sky-200 rounded-full blur-3xl opacity-30"
                ></div>

                <img
                    src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1200&q=80"
                    alt="Students collaborating"
                    loading="lazy"
                    class="relative w-full h-[380px] sm:h-[500px] lg:h-[650px] object-cover rounded-3xl sm:rounded-[40px] shadow-2xl"
                >

            </div>


            <!-- CONTENT -->

            <div>

                <span
                    class="uppercase tracking-[0.2em] text-blue-600 font-bold text-sm"
                >
                    WHY CAMPUSCONNECT
                </span>

                <h2
                    class="mt-4 sm:mt-5 text-3xl sm:text-4xl lg:text-5xl font-black leading-tight text-slate-900"
                >

                    Built

                    <span class="text-blue-600">
                        By Students,
                    </span>

                    For Students.

                </h2>

                <p
                    class="mt-6 sm:mt-8 text-base sm:text-lg lg:text-xl leading-7 sm:leading-9 text-slate-600"
                >

                    University life shouldn't require ten different apps,
                    WhatsApp groups, Telegram channels and random Facebook pages.

                    CampusConnect brings everything together into one
                    modern platform that's fast, secure and easy to use.

                </p>


                <div class="space-y-6 sm:space-y-8 mt-10 sm:mt-14">


                    <div class="flex gap-4 sm:gap-5">

                        <div
                            class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl bg-blue-100 flex items-center justify-center text-xl sm:text-2xl flex-shrink-0"
                        >
                            📚
                        </div>

                        <div>

                            <h3 class="font-bold text-xl sm:text-2xl">
                                Academic Resources
                            </h3>

                            <p class="mt-1 sm:mt-2 text-slate-500 leading-7">
                                Quality notes, revision materials and past papers.
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-4 sm:gap-5">

                        <div
                            class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl bg-green-100 flex items-center justify-center text-xl sm:text-2xl flex-shrink-0"
                        >
                            🏠
                        </div>

                        <div>

                            <h3 class="font-bold text-xl sm:text-2xl">
                                Student Housing
                            </h3>

                            <p class="mt-1 sm:mt-2 text-slate-500 leading-7">
                                Easily discover campus hostels and nearby rentals.
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-4 sm:gap-5">

                        <div
                            class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl bg-purple-100 flex items-center justify-center text-xl sm:text-2xl flex-shrink-0"
                        >
                            🛒
                        </div>

                        <div>

                            <h3 class="font-bold text-xl sm:text-2xl">
                                Safe Marketplace
                            </h3>

                            <p class="mt-1 sm:mt-2 text-slate-500 leading-7">
                                Buy and sell books, electronics and student essentials.
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-4 sm:gap-5">

                        <div
                            class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl bg-orange-100 flex items-center justify-center text-xl sm:text-2xl flex-shrink-0"
                        >
                            🚀
                        </div>

                        <div>

                            <h3 class="font-bold text-xl sm:text-2xl">
                                One Complete Platform
                            </h3>

                            <p class="mt-1 sm:mt-2 text-slate-500 leading-7">
                                Student services, announcements, businesses,
                                lost & found and much more.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ========================================================= -->
<!-- HOW IT WORKS -->
<!-- ========================================================= -->

<section
    id="how"
    class="py-16 sm:py-20 lg:py-28 bg-white"
>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div class="text-center max-w-3xl mx-auto">

            <span
                class="uppercase tracking-[0.2em] text-blue-600 font-bold text-sm"
            >
                HOW IT WORKS
            </span>

            <h2
                class="mt-4 sm:mt-5 text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900"
            >

                Get Started in

                <span class="text-blue-600">
                    Four Simple Steps
                </span>

            </h2>

            <p
                class="mt-5 sm:mt-6 text-base sm:text-lg lg:text-xl text-slate-500 leading-7 sm:leading-9"
            >

                Everything inside CampusConnect was designed to be simple,
                fast and intuitive for every university student.

            </p>

        </div>


        <div
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-8 lg:gap-10 mt-12 sm:mt-16 lg:mt-24"
        >

            @php

                $steps = [

                    [
                        'number' => 1,
                        'color' => 'bg-blue-600',
                        'icon' => '👤',
                        'title' => 'Create Account',
                        'description' => 'Register in less than one minute using your university details.'
                    ],

                    [
                        'number' => 2,
                        'color' => 'bg-green-600',
                        'icon' => '🔍',
                        'title' => 'Explore',
                        'description' => 'Browse notes, hostels, businesses, marketplace and student services.'
                    ],

                    [
                        'number' => 3,
                        'color' => 'bg-purple-600',
                        'icon' => '🤝',
                        'title' => 'Connect',
                        'description' => 'Interact with students, sellers and trusted campus businesses.'
                    ],

                    [
                        'number' => 4,
                        'color' => 'bg-orange-600',
                        'icon' => '🚀',
                        'title' => 'Succeed',
                        'description' => 'Save time, stay informed, perform better academically and enjoy campus life.'
                    ],

                ];

            @endphp


            @foreach($steps as $step)

                <div class="relative">

                    <div
                        class="bg-slate-50 rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-10 h-full shadow hover:shadow-2xl hover:-translate-y-1 sm:hover:-translate-y-2 transition"
                    >

                        <div
                            class="w-14 h-14 sm:w-16 sm:h-16 rounded-full {{ $step['color'] }} text-white flex items-center justify-center text-xl sm:text-2xl font-bold"
                        >

                            {{ $step['number'] }}

                        </div>

                        <div class="text-5xl sm:text-6xl mt-6 sm:mt-8">
                            {{ $step['icon'] }}
                        </div>

                        <h3 class="mt-5 sm:mt-6 text-xl sm:text-2xl font-bold">
                            {{ $step['title'] }}
                        </h3>

                        <p class="mt-3 sm:mt-4 text-slate-500 leading-7 sm:leading-8">
                            {{ $step['description'] }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<!-- ========================================================= -->
<!-- STATISTICS & TESTIMONIALS -->
<!-- ========================================================= -->

<section
    class="py-16 sm:py-20 lg:py-28 bg-gradient-to-br from-blue-600 via-blue-700 to-sky-700"
>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div class="text-center text-white">

            <span
                class="uppercase tracking-[0.2em] font-bold text-blue-200 text-sm"
            >
                TRUSTED BY STUDENTS
            </span>

            <h2
                class="mt-4 sm:mt-5 text-3xl sm:text-4xl lg:text-5xl font-black"
            >

                Everything You Need

                <br>

                In One Platform

            </h2>

            <p
                class="mt-5 sm:mt-6 text-base sm:text-lg lg:text-xl text-blue-100 max-w-3xl mx-auto leading-7 sm:leading-9"
            >

                Thousands of students use CampusConnect to simplify
                university life every single day.

            </p>

        </div>


        <div
            class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 lg:gap-8 mt-12 sm:mt-16 lg:mt-20"
        >

            <div class="bg-white/10 backdrop-blur rounded-2xl sm:rounded-3xl p-5 sm:p-8 lg:p-10 text-center">

                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white">
                    10K+
                </h3>

                <p class="mt-2 sm:mt-4 text-blue-100 text-sm sm:text-base">
                    Active Students
                </p>

            </div>

            <div class="bg-white/10 backdrop-blur rounded-2xl sm:rounded-3xl p-5 sm:p-8 lg:p-10 text-center">

                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white">
                    5K+
                </h3>

                <p class="mt-2 sm:mt-4 text-blue-100 text-sm sm:text-base">
                    Study Resources
                </p>

            </div>

            <div class="bg-white/10 backdrop-blur rounded-2xl sm:rounded-3xl p-5 sm:p-8 lg:p-10 text-center">

                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white">
                    300+
                </h3>

                <p class="mt-2 sm:mt-4 text-blue-100 text-sm sm:text-base">
                    Student Businesses
                </p>

            </div>

            <div class="bg-white/10 backdrop-blur rounded-2xl sm:rounded-3xl p-5 sm:p-8 lg:p-10 text-center">

                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white">
                    50+
                </h3>

                <p class="mt-2 sm:mt-4 text-blue-100 text-sm sm:text-base">
                    Partner Campuses
                </p>

            </div>

        </div>


        <!-- TESTIMONIALS -->

        <div
            class="grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-8 mt-14 sm:mt-20 lg:mt-24"
        >

            <div class="bg-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-xl">

                <p class="text-gray-600 leading-7 sm:leading-8 italic">

                    "CampusConnect helped me find revision notes
                    and a hostel within two days.
                    It's now the first website I open every semester."

                </p>

                <div class="mt-6 sm:mt-8">

                    <h4 class="font-bold text-lg sm:text-xl">
                        Brian K.
                    </h4>

                    <p class="text-gray-500 text-sm sm:text-base">
                        Computer Science Student
                    </p>

                </div>

            </div>


            <div class="bg-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-xl">

                <p class="text-gray-600 leading-7 sm:leading-8 italic">

                    "Selling my laptop through CampusConnect
                    was much safer than using random Facebook groups."

                </p>

                <div class="mt-6 sm:mt-8">

                    <h4 class="font-bold text-lg sm:text-xl">
                        Faith M.
                    </h4>

                    <p class="text-gray-500 text-sm sm:text-base">
                        Business Student
                    </p>

                </div>

            </div>


            <div class="bg-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-xl">

                <p class="text-gray-600 leading-7 sm:leading-8 italic">

                    "Everything from announcements
                    to accommodation is finally in one place."

                </p>

                <div class="mt-6 sm:mt-8">

                    <h4 class="font-bold text-lg sm:text-xl">
                        Kevin O.
                    </h4>

                    <p class="text-gray-500 text-sm sm:text-base">
                        Engineering Student
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ========================================================= -->
<!-- CALL TO ACTION -->
<!-- ========================================================= -->

<section
    class="relative overflow-hidden py-16 sm:py-20 lg:py-28 bg-slate-900"
>

    <div class="absolute inset-0">

        <div
            class="absolute -top-24 -left-24 w-72 sm:w-96 h-72 sm:h-96 bg-blue-500 rounded-full blur-3xl opacity-20"
        ></div>

        <div
            class="absolute -bottom-24 -right-24 w-72 sm:w-96 h-72 sm:h-96 bg-sky-400 rounded-full blur-3xl opacity-20"
        ></div>

    </div>


    <div
        class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center"
    >

        <span
            class="inline-flex items-center px-4 sm:px-5 py-2 rounded-full bg-blue-600/20 border border-blue-400 text-blue-200 font-semibold text-sm sm:text-base"
        >

            🚀 Join CampusConnect Today

        </span>


        <h2
            class="mt-6 sm:mt-8 text-3xl sm:text-4xl lg:text-6xl font-black leading-tight text-white"
        >

            Everything You Need

            <br>

            <span class="text-blue-400">
                For University Life
            </span>

        </h2>


        <p
            class="mt-6 sm:mt-8 text-base sm:text-lg lg:text-xl text-gray-300 leading-7 sm:leading-9 max-w-3xl mx-auto"
        >

            Whether you're looking for notes, accommodation,
            businesses, past papers, student services or a secure marketplace,
            CampusConnect brings it all together in one platform.

        </p>


        <div
            class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-6 mt-8 sm:mt-12"
        >

            @guest

                <a
                    href="{{ route('register') }}"
                    class="w-full sm:w-auto px-8 sm:px-10 py-3.5 sm:py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-base sm:text-lg shadow-2xl transition"
                >

                    Create Free Account

                </a>

                <a
                    href="{{ route('login') }}"
                    class="w-full sm:w-auto px-8 sm:px-10 py-3.5 sm:py-4 rounded-2xl border-2 border-white text-white font-bold text-base sm:text-lg hover:bg-white hover:text-slate-900 transition"
                >

                    Login

                </a>

            @else

                <a
                    href="{{ route('dashboard') }}"
                    class="w-full sm:w-auto px-8 sm:px-10 py-3.5 sm:py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-base sm:text-lg shadow-2xl transition"
                >

                    Go To Dashboard →

                </a>

            @endguest

        </div>

    </div>

</section>



<!-- ========================================================= -->
<!-- FOOTER -->
<!-- ========================================================= -->

<footer
    id="contact"
    class="bg-slate-950 text-gray-300"
>

    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-16 lg:py-20"
    >

        <div
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 sm:gap-12 lg:gap-14"
        >


            <!-- BRAND -->

            <div>

                <div class="flex items-center gap-3 sm:gap-4">

                    <div
                        class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-blue-600 flex items-center justify-center"
                    >
                        🎓
                    </div>

                    <div>

                        <h2 class="text-2xl sm:text-3xl font-black text-white">

                            Campus<span class="text-blue-400">Connect</span>

                        </h2>

                        <p class="text-xs sm:text-sm text-gray-400">
                            {{ $platformTagline }}
                        </p>

                    </div>

                </div>


                <p
                    class="mt-5 sm:mt-6 leading-7 sm:leading-8 text-gray-400"
                >

                    CampusConnect simplifies university life by bringing
                    academic resources, accommodation, businesses,
                    marketplace and student services together in one platform.

                </p>

            </div>


            <!-- QUICK LINKS -->

            <div>

                <h3 class="text-lg sm:text-xl font-bold text-white mb-5 sm:mb-6">
                    Quick Links
                </h3>

                <ul class="space-y-3 sm:space-y-4">

                    <li>
                        <a
                            href="#features"
                            class="hover:text-blue-400 transition"
                        >
                            Features
                        </a>
                    </li>

                    <li>
                        <a
                            href="#about"
                            class="hover:text-blue-400 transition"
                        >
                            About
                        </a>
                    </li>

                    <li>
                        <a
                            href="#how"
                            class="hover:text-blue-400 transition"
                        >
                            How It Works
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('login') }}"
                            class="hover:text-blue-400 transition"
                        >
                            Login
                        </a>
                    </li>

                </ul>

            </div>


            <!-- PLATFORM -->

            <div>

                <h3 class="text-lg sm:text-xl font-bold text-white mb-5 sm:mb-6">
                    Platform
                </h3>

                <ul class="space-y-3 sm:space-y-4 text-gray-400">

                    <li>📚 Notes</li>

                    <li>📄 Past Papers</li>

                    <li>🏠 Accommodation</li>

                    <li>🛒 Marketplace</li>

                    <li>🏪 Businesses</li>

                    <li>📢 Announcements</li>

                </ul>

            </div>


            <!-- CONTACT / CUSTOMER CARE -->

            <div>

                <h3 class="text-lg sm:text-xl font-bold text-white mb-5 sm:mb-6">

                    Customer Care

                </h3>


                <div class="space-y-4 text-gray-400">


                    <!-- ADDRESS -->

                    <div class="flex items-start gap-3">

                        <div class="flex-shrink-0 mt-0.5">
                            📍
                        </div>

                        <div class="min-w-0">

                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Location
                            </p>

                            <p class="break-words">
                                {{ $contactAddress }}
                            </p>

                        </div>

                    </div>


                    <!-- EMAIL -->

                    <div class="flex items-start gap-3">

                        <div class="flex-shrink-0 mt-0.5">
                            📧
                        </div>

                        <div class="min-w-0">

                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Email
                            </p>

                            <a
                                href="mailto:{{ $contactEmail }}"
                                class="hover:text-blue-400 break-all transition"
                            >
                                {{ $contactEmail }}
                            </a>

                        </div>

                    </div>


                    <!-- PHONE -->

                    <div class="flex items-start gap-3">

                        <div class="flex-shrink-0 mt-0.5">
                            📞
                        </div>

                        <div class="min-w-0">

                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Phone
                            </p>

                            <a
                                href="tel:{{ preg_replace('/\s+/', '', $contactPhone) }}"
                                class="hover:text-blue-400 transition"
                            >
                                {{ $contactPhone }}
                            </a>

                        </div>

                    </div>


                    <!-- WHATSAPP -->

                    <div class="flex items-start gap-3">

                        <div class="flex-shrink-0 mt-0.5">
                            💬
                        </div>

                        <div class="min-w-0">

                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                WhatsApp
                            </p>

                            <a
                                href="https://wa.me/{{ preg_replace('/\D/', '', $whatsapp) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="hover:text-green-400 transition"
                            >

                                {{ $whatsapp }}

                            </a>

                        </div>

                    </div>


                    <!-- SUPPORT HOURS -->

                    <div class="flex items-start gap-3">

                        <div class="flex-shrink-0 mt-0.5">
                            🕐
                        </div>

                        <div class="min-w-0">

                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Customer Care
                            </p>

                            <p class="break-words">
                                {{ $supportHours }}
                            </p>

                        </div>

                    </div>

                </div>


                <!-- SOCIAL LINKS -->

                <div class="flex flex-wrap gap-3 sm:gap-4 mt-7 sm:mt-8">


                    @if($facebook && $facebook !== '#')

                        <a
                            href="{{ $facebook }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Facebook"
                            class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-xl hover:bg-blue-600 transition"
                        >
                            📘
                        </a>

                    @endif


                    @if($instagram && $instagram !== '#')

                        <a
                            href="{{ $instagram }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Instagram"
                            class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-xl hover:bg-pink-600 transition"
                        >
                            📷
                        </a>

                    @endif


                    @if($twitter && $twitter !== '#')

                        <a
                            href="{{ $twitter }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="X"
                            class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-xl hover:bg-sky-600 transition"
                        >
                            𝕏
                        </a>

                    @endif


                    @if($linkedin && $linkedin !== '#')

                        <a
                            href="{{ $linkedin }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="LinkedIn"
                            class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-xl hover:bg-blue-700 transition"
                        >
                            💼
                        </a>

                    @endif

                </div>

            </div>

        </div>


        <hr class="border-slate-800 my-10 sm:my-12">


        <div
            class="flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left"
        >

            <p class="text-gray-500 text-sm sm:text-base">

                © {{ date('Y') }}

                {{ $platformName }}.

                All Rights Reserved.

            </p>

            <p class="text-gray-500 text-sm sm:text-base">

                Built with Love for university students across Kenya.

            </p>

        </div>

    </div>

</footer>


<!-- ========================================================= -->
<!-- MOBILE MENU SCRIPT -->
<!-- ========================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const menuButton = document.getElementById('mobile-menu-button');

    const mobileMenu = document.getElementById('mobile-menu');

    const openIcon = document.getElementById('menu-open-icon');

    const closeIcon = document.getElementById('menu-close-icon');

    const mobileLinks = document.querySelectorAll('.mobile-nav-link');


    if (!menuButton || !mobileMenu) {
        return;
    }


    menuButton.addEventListener('click', function () {

        const isOpen =
            !mobileMenu.classList.contains('hidden');


        if (isOpen) {

            mobileMenu.classList.add('hidden');

            openIcon.classList.remove('hidden');

            closeIcon.classList.add('hidden');

            menuButton.setAttribute(
                'aria-expanded',
                'false'
            );

        } else {

            mobileMenu.classList.remove('hidden');

            openIcon.classList.add('hidden');

            closeIcon.classList.remove('hidden');

            menuButton.setAttribute(
                'aria-expanded',
                'true'
            );

        }

    });


    mobileLinks.forEach(function (link) {

        link.addEventListener('click', function () {

            mobileMenu.classList.add('hidden');

            openIcon.classList.remove('hidden');

            closeIcon.classList.add('hidden');

            menuButton.setAttribute(
                'aria-expanded',
                'false'
            );

        });

    });

});


/*
|--------------------------------------------------------------------------
| Initialize Lucide Icons
|--------------------------------------------------------------------------
*/

if (typeof lucide !== 'undefined') {

    lucide.createIcons();

}

</script>


</body>

</html>