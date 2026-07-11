<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CampusConnect</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-50 text-gray-800">

<!-- ================= NAVBAR ================= -->

<header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-slate-200">

    <div class="max-w-7xl mx-auto px-8">

        <div class="h-20 flex items-center justify-between">

            <!-- Logo -->

            <a href="/" class="flex items-center gap-4">

                <div class="w-12 h-12 rounded-2xl bg-blue-600 flex items-center justify-center shadow-lg">

                    <span class="text-2xl">🎓</span>

                </div>

                <div>

                    <h1 class="text-3xl font-black tracking-tight">

                        <span class="text-slate-900">Campus</span>

                        <span class="text-blue-600">Connect</span>

                    </h1>

                    <p class="text-sm text-slate-500">

                        Kenya's Smart Student Platform

                    </p>

                </div>

            </a>

            <!-- Navigation -->

            <nav class="hidden lg:flex items-center gap-10">

                <a href="#features"
                   class="font-semibold text-slate-600 hover:text-blue-600 transition">

                    Features

                </a>

                <a href="#about"
                   class="font-semibold text-slate-600 hover:text-blue-600 transition">

                    About

                </a>

                <a href="#how"
                   class="font-semibold text-slate-600 hover:text-blue-600 transition">

                    How It Works

                </a>

                <a href="#contact"
                   class="font-semibold text-slate-600 hover:text-blue-600 transition">

                    Contact

                </a>

            </nav>

            <!-- Buttons -->

            <div class="flex items-center gap-4">

                @auth

                    <a href="{{ route('dashboard') }}"
                       class="px-6 py-3 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition shadow-lg">

                        Dashboard

                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="px-6 py-3 rounded-xl border-2 border-blue-600 font-semibold text-blue-600 hover:bg-blue-50 transition">

                        Login

                    </a>

                    <a href="{{ route('register') }}"
                       class="px-6 py-3 rounded-xl bg-blue-600 text-white font-bold shadow-lg hover:bg-blue-700 transition">

                        Get Started

                    </a>

                @endauth

            </div>

        </div>

    </div>

</header>

<section
    data-aos="fade-up"
    class="relative overflow-hidden bg-gradient-to-br from-slate-50 via-blue-50 to-sky-100">

    <div class="max-w-7xl mx-auto px-8 py-24">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- LEFT -->

            <div>

                <span class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-5 py-2 rounded-full font-semibold">

                    🎓 Kenya's Smart Student Platform

                </span>

                <h1 class="mt-8 text-6xl lg:text-7xl font-black leading-tight tracking-tight text-slate-900">

                    Your Campus.

                    <br>

                    <span class="text-blue-600">

                        Connected.

                    </span>

                </h1>

                <p class="mt-8 text-xl leading-9 text-slate-600 max-w-xl">

                    CampusConnect brings together notes, accommodation,
                    marketplace, student services, announcements,
                    businesses and everything a university student needs
                    in one modern platform.

                </p>

                <div class="flex flex-wrap gap-5 mt-10">

                    @guest

                        <a href="{{ route('register') }}"
                           class="px-8 py-4 rounded-2xl bg-blue-600 text-white font-bold shadow-xl hover:bg-blue-700 transition">

                            Get Started

                        </a>

                        <a href="{{ route('login') }}"
                           class="px-8 py-4 rounded-2xl border-2 border-blue-600 text-blue-600 font-bold hover:bg-blue-50 transition">

                            Login

                        </a>

                    @else

                        <a href="{{ route('dashboard') }}"
                           class="px-8 py-4 rounded-2xl bg-blue-600 text-white font-bold shadow-xl hover:bg-blue-700 transition">

                            Go To Dashboard

                        </a>

                    @endguest

                </div>

                <!-- Statistics -->

                <div class="grid grid-cols-3 gap-8 mt-16">

                    <div>

                        <h2 class="text-4xl font-black text-blue-600">

                            10K+

                        </h2>

                        <p class="text-slate-500 mt-2">

                            Students

                        </p>

                    </div>

                    <div>

                        <h2 class="text-4xl font-black text-blue-600">

                            5K+

                        </h2>

                        <p class="text-slate-500 mt-2">

                            Resources

                        </p>

                    </div>

                    <div>

                        <h2 class="text-4xl font-black text-blue-600">

                            24/7

                        </h2>

                        <p class="text-slate-500 mt-2">

                            Support

                        </p>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="relative">

                <div class="absolute -top-10 -left-10 w-48 h-48 bg-blue-300 rounded-full blur-3xl opacity-20"></div>

                <div class="absolute -bottom-10 -right-10 w-56 h-56 bg-sky-300 rounded-full blur-3xl opacity-20"></div>

                <img

                    src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80"

                    alt="University Students"

                    class="relative rounded-[40px] shadow-2xl w-full h-[620px] object-cover"

                >

            </div>

        </div>

    </div>

</section>

<!-- ================= FEATURES ================= -->

<section id="features" class="py-28 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <!-- Heading -->

        <div class="text-center max-w-3xl mx-auto">

            <span class="text-blue-600 uppercase tracking-[0.25em] font-bold">

                Everything You Need

            </span>

            <h2 class="mt-5 text-5xl font-black text-slate-900">

                One Platform.

                <br>

                Every Student Service.

            </h2>

            <p class="mt-6 text-xl text-slate-500 leading-9">

                CampusConnect combines all essential university services
                into one beautiful and secure platform.

            </p>

        </div>

        <!-- Cards -->

        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8 mt-20">

            <!-- Notes -->

            <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl">📚</div>

                <h3 class="mt-6 text-2xl font-bold">

                    Notes

                </h3>

                <p class="mt-4 text-slate-500 leading-7">

                    Access quality lecture notes uploaded by students.

                </p>

            </div>

            <!-- Past Papers -->

            <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl">📄</div>

                <h3 class="mt-6 text-2xl font-bold">

                    Past Papers

                </h3>

                <p class="mt-4 text-slate-500 leading-7">

                    Prepare smarter with CATs and previous examinations.

                </p>

            </div>

            <!-- Accommodation -->

            <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl">🏠</div>

                <h3 class="mt-6 text-2xl font-bold">

                    Accommodation

                </h3>

                <p class="mt-4 text-slate-500 leading-7">

                    Find hostels and trusted off-campus rentals.

                </p>

            </div>

            <!-- Marketplace -->

            <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl">🛒</div>

                <h3 class="mt-6 text-2xl font-bold">

                    Marketplace

                </h3>

                <p class="mt-4 text-slate-500 leading-7">

                    Buy and sell safely with fellow students.

                </p>

            </div>

            <!-- Student Services -->

            <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl">🎓</div>

                <h3 class="mt-6 text-2xl font-bold">

                    Student Services

                </h3>

                <p class="mt-4 text-slate-500 leading-7">

                    HELB information, registration and student support.

                </p>

            </div>

            <!-- Lost & Found -->

            <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl">🔍</div>

                <h3 class="mt-6 text-2xl font-bold">

                    Lost & Found

                </h3>

                <p class="mt-4 text-slate-500 leading-7">

                    Report and recover lost items within campus.

                </p>

            </div>

            <!-- Businesses -->

            <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl">🏪</div>

                <h3 class="mt-6 text-2xl font-bold">

                    Businesses

                </h3>

                <p class="mt-4 text-slate-500 leading-7">

                    Discover nearby shops and student-friendly services.

                </p>

            </div>

            <!-- Announcements -->

            <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl">📢</div>

                <h3 class="mt-6 text-2xl font-bold">

                    Announcements

                </h3>

                <p class="mt-4 text-slate-500 leading-7">

                    Stay updated with university news and notices.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- ================= WHY CAMPUSCONNECT ================= -->

<section id="about" class="py-28 bg-slate-50">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            <!-- LEFT IMAGE -->

            <div class="relative">

                <div class="absolute -top-8 -left-8 w-40 h-40 bg-blue-200 rounded-full blur-3xl opacity-30"></div>

                <div class="absolute -bottom-8 -right-8 w-48 h-48 bg-sky-200 rounded-full blur-3xl opacity-30"></div>

                <img
                    src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1200&q=80"
                    alt="Students collaborating"
                    class="relative w-full h-[650px] object-cover rounded-[40px] shadow-2xl">

            </div>

            <!-- RIGHT CONTENT -->

            <div>

                <span class="uppercase tracking-[0.25em] text-blue-600 font-bold">

                    WHY CAMPUSCONNECT

                </span>

                <h2 class="mt-5 text-5xl font-black leading-tight text-slate-900">

                    Built

                    <span class="text-blue-600">

                        By Students,

                    </span>

                    For Students.

                </h2>

                <p class="mt-8 text-xl leading-9 text-slate-600">

                    University life shouldn't require ten different apps,
                    WhatsApp groups, Telegram channels and random Facebook pages.

                    CampusConnect brings everything together into one
                    modern platform that's fast, secure and easy to use.

                </p>

                <div class="space-y-8 mt-14">

                    <div class="flex gap-5">

                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">

                            📚

                        </div>

                        <div>

                            <h3 class="font-bold text-2xl">

                                Academic Resources

                            </h3>

                            <p class="mt-2 text-slate-500 leading-7">

                                Quality notes, revision materials and past papers.

                            </p>

                        </div>

                    </div>

                    <div class="flex gap-5">

                        <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">

                            🏠

                        </div>

                        <div>

                            <h3 class="font-bold text-2xl">

                                Student Housing

                            </h3>

                            <p class="mt-2 text-slate-500 leading-7">

                                Easily discover campus hostels and nearby rentals.

                            </p>

                        </div>

                    </div>

                    <div class="flex gap-5">

                        <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-2xl">

                            🛒

                        </div>

                        <div>

                            <h3 class="font-bold text-2xl">

                                Safe Marketplace

                            </h3>

                            <p class="mt-2 text-slate-500 leading-7">

                                Buy and sell books, electronics and student essentials.

                            </p>

                        </div>

                    </div>

                    <div class="flex gap-5">

                        <div class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center text-2xl">

                            🚀

                        </div>

                        <div>

                            <h3 class="font-bold text-2xl">

                                One Complete Platform

                            </h3>

                            <p class="mt-2 text-slate-500 leading-7">

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

<!-- ================= HOW IT WORKS ================= -->

<section id="how" class="py-28 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <!-- Heading -->

        <div class="text-center max-w-3xl mx-auto">

            <span class="uppercase tracking-[0.25em] text-blue-600 font-bold">

                HOW IT WORKS

            </span>

            <h2 class="mt-5 text-5xl font-black text-slate-900">

                Get Started in

                <span class="text-blue-600">

                    Four Simple Steps

                </span>

            </h2>

            <p class="mt-6 text-xl text-slate-500 leading-9">

                Everything inside CampusConnect was designed to be simple,
                fast and intuitive for every university student.

            </p>

        </div>

        <!-- Timeline -->

        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-10 mt-24">

            <!-- STEP 1 -->

            <div class="relative">

                <div class="bg-slate-50 rounded-3xl p-10 h-full shadow hover:shadow-2xl hover:-translate-y-2 transition">

                    <div class="w-16 h-16 rounded-full bg-blue-600 text-white flex items-center justify-center text-2xl font-bold">

                        1

                    </div>

                    <div class="text-6xl mt-8">

                        👤

                    </div>

                    <h3 class="mt-6 text-2xl font-bold">

                        Create Account

                    </h3>

                    <p class="mt-4 text-slate-500 leading-8">

                        Register in less than one minute using your university details.

                    </p>

                </div>

            </div>

            <!-- STEP 2 -->

            <div class="relative">

                <div class="bg-slate-50 rounded-3xl p-10 h-full shadow hover:shadow-2xl hover:-translate-y-2 transition">

                    <div class="w-16 h-16 rounded-full bg-green-600 text-white flex items-center justify-center text-2xl font-bold">

                        2

                    </div>

                    <div class="text-6xl mt-8">

                        🔍

                    </div>

                    <h3 class="mt-6 text-2xl font-bold">

                        Explore

                    </h3>

                    <p class="mt-4 text-slate-500 leading-8">

                        Browse notes, hostels, businesses,
                        marketplace and student services.

                    </p>

                </div>

            </div>

            <!-- STEP 3 -->

            <div class="relative">

                <div class="bg-slate-50 rounded-3xl p-10 h-full shadow hover:shadow-2xl hover:-translate-y-2 transition">

                    <div class="w-16 h-16 rounded-full bg-purple-600 text-white flex items-center justify-center text-2xl font-bold">

                        3

                    </div>

                    <div class="text-6xl mt-8">

                        🤝

                    </div>

                    <h3 class="mt-6 text-2xl font-bold">

                        Connect

                    </h3>

                    <p class="mt-4 text-slate-500 leading-8">

                        Interact with students,
                        sellers and trusted campus businesses.

                    </p>

                </div>

            </div>

            <!-- STEP 4 -->

            <div class="relative">

                <div class="bg-slate-50 rounded-3xl p-10 h-full shadow hover:shadow-2xl hover:-translate-y-2 transition">

                    <div class="w-16 h-16 rounded-full bg-orange-600 text-white flex items-center justify-center text-2xl font-bold">

                        4

                    </div>

                    <div class="text-6xl mt-8">

                        🚀

                    </div>

                    <h3 class="mt-6 text-2xl font-bold">

                        Succeed

                    </h3>

                    <p class="mt-4 text-slate-500 leading-8">

                        Save time, stay informed,
                        perform better academically
                        and enjoy campus life.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= STATISTICS & TESTIMONIALS ================= -->

<section class="py-28 bg-gradient-to-br from-blue-600 via-blue-700 to-sky-700">

    <div class="max-w-7xl mx-auto px-8">

        <!-- Heading -->

        <div class="text-center text-white">

            <span class="uppercase tracking-[0.25em] font-bold text-blue-200">

                TRUSTED BY STUDENTS

            </span>

            <h2 class="mt-5 text-5xl font-black">

                Everything You Need
                <br>
                In One Platform
            </h2>

            <p class="mt-6 text-xl text-blue-100 max-w-3xl mx-auto leading-9">

                Thousands of students use CampusConnect to simplify
                university life every single day.

            </p>

        </div>

        <!-- Statistics -->

        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8 mt-20">

            <div class="bg-white/10 backdrop-blur rounded-3xl p-10 text-center">

                <h3 class="text-5xl font-black text-white">

                    10K+

                </h3>

                <p class="mt-4 text-blue-100">

                    Active Students

                </p>

            </div>

            <div class="bg-white/10 backdrop-blur rounded-3xl p-10 text-center">

                <h3 class="text-5xl font-black text-white">

                    5K+

                </h3>

                <p class="mt-4 text-blue-100">

                    Study Resources

                </p>

            </div>

            <div class="bg-white/10 backdrop-blur rounded-3xl p-10 text-center">

                <h3 class="text-5xl font-black text-white">

                    300+

                </h3>

                <p class="mt-4 text-blue-100">

                    Student Businesses

                </p>

            </div>

            <div class="bg-white/10 backdrop-blur rounded-3xl p-10 text-center">

                <h3 class="text-5xl font-black text-white">

                    50+

                </h3>

                <p class="mt-4 text-blue-100">

                    Partner Campuses

                </p>

            </div>

        </div>

        <!-- Testimonials -->

        <div class="grid lg:grid-cols-3 gap-8 mt-24">

            <div class="bg-white rounded-3xl p-8 shadow-xl">

                <p class="text-gray-600 leading-8 italic">

                    "CampusConnect helped me find revision notes
                    and a hostel within two days.
                    It's now the first website I open every semester."

                </p>

                <div class="mt-8">

                    <h4 class="font-bold text-xl">

                        Brian K.

                    </h4>

                    <p class="text-gray-500">

                        Computer Science Student

                    </p>

                </div>

            </div>

            <div class="bg-white rounded-3xl p-8 shadow-xl">

                <p class="text-gray-600 leading-8 italic">

                    "Selling my laptop through CampusConnect
                    was much safer than using random Facebook groups."

                </p>

                <div class="mt-8">

                    <h4 class="font-bold text-xl">

                        Faith M.

                    </h4>

                    <p class="text-gray-500">

                        Business Student

                    </p>

                </div>

            </div>

            <div class="bg-white rounded-3xl p-8 shadow-xl">

                <p class="text-gray-600 leading-8 italic">

                    "Everything from announcements
                    to accommodation is finally in one place."

                </p>

                <div class="mt-8">

                    <h4 class="font-bold text-xl">

                        Kevin O.

                    </h4>

                    <p class="text-gray-500">

                        Engineering Student

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= CALL TO ACTION ================= -->

<section class="relative overflow-hidden py-28 bg-slate-900">

    <!-- Background Glow -->

    <div class="absolute inset-0">

        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full blur-3xl opacity-20"></div>

        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-sky-400 rounded-full blur-3xl opacity-20"></div>

    </div>

    <div class="relative max-w-5xl mx-auto px-8 text-center">

        <span class="inline-flex items-center px-5 py-2 rounded-full bg-blue-600/20 border border-blue-400 text-blue-200 font-semibold">

            🚀 Join CampusConnect Today

        </span>

        <h2 class="mt-8 text-5xl lg:text-6xl font-black leading-tight text-white">

            Everything You Need
            <br>

            <span class="text-blue-400">

                For University Life

            </span>

        </h2>

        <p class="mt-8 text-xl text-gray-300 leading-9 max-w-3xl mx-auto">

            Whether you're looking for notes, accommodation,
            businesses, past papers, student services or a secure marketplace,
            CampusConnect brings it all together in one platform.

        </p>

        <div class="flex flex-wrap justify-center gap-6 mt-12">

            @guest

                <a href="{{ route('register') }}"
                   class="px-10 py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-lg shadow-2xl transition duration-300">

                    Create Free Account

                </a>

                <a href="{{ route('login') }}"
                   class="px-10 py-4 rounded-2xl border-2 border-white text-white font-bold text-lg hover:bg-white hover:text-slate-900 transition duration-300">

                    Login

                </a>

            @else

                <a href="{{ route('dashboard') }}"
                   class="px-10 py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-lg shadow-2xl transition duration-300">

                    Go To Dashboard →

                </a>

            @endguest

        </div>

    </div>

</section>

<!-- ================= FOOTER ================= -->

<footer id="contact" class="bg-slate-950 text-gray-300">

    <div class="max-w-7xl mx-auto px-8 py-20">

        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-14">

            <!-- Brand -->

            <div>

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-2xl bg-blue-600 flex items-center justify-center">

                        🎓

                    </div>

                    <div>

                        <h2 class="text-3xl font-black text-white">

                            Campus<span class="text-blue-400">Connect</span>

                        </h2>

                        <p class="text-sm text-gray-400">

                            Kenya's Smart Student Platform

                        </p>

                    </div>

                </div>

                <p class="mt-6 leading-8 text-gray-400">

                    CampusConnect simplifies university life by bringing
                    academic resources, accommodation, businesses,
                    marketplace and student services together in one platform.

                </p>

            </div>

            <!-- Quick Links -->

            <div>

                <h3 class="text-xl font-bold text-white mb-6">

                    Quick Links

                </h3>

                <ul class="space-y-4">

                    <li>
                        <a href="#features" class="hover:text-blue-400 transition">
                            Features
                        </a>
                    </li>

                    <li>
                        <a href="#about" class="hover:text-blue-400 transition">
                            About
                        </a>
                    </li>

                    <li>
                        <a href="#how" class="hover:text-blue-400 transition">
                            How It Works
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('login') }}" class="hover:text-blue-400 transition">
                            Login
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Platform -->

            <div>

                <h3 class="text-xl font-bold text-white mb-6">

                    Platform

                </h3>

                <ul class="space-y-4 text-gray-400">

                    <li>📚 Notes</li>

                    <li>📄 Past Papers</li>

                    <li>🏠 Accommodation</li>

                    <li>🛒 Marketplace</li>

                    <li>🏪 Businesses</li>

                    <li>📢 Announcements</li>

                </ul>

            </div>

            <!-- Contact -->

            <div>

                <h3 class="text-xl font-bold text-white mb-6">

                    Contact

                </h3>

                <div class="space-y-4 text-gray-400">

                    <p>

                        📍 Nairobi, Kenya

                    </p>

                    <p>

                        📧 support@campusconnect.co.ke

                    </p>

                    <p>

                        📞 +254 700 000 000

                    </p>

                </div>

                <div class="flex gap-5 mt-8 text-2xl">

                    <a href="#" class="hover:scale-110 transition">🌐</a>

                    <a href="#" class="hover:scale-110 transition">📘</a>

                    <a href="#" class="hover:scale-110 transition">📷</a>

                    <a href="#" class="hover:scale-110 transition">💼</a>

                </div>

            </div>

        </div>

        <hr class="border-slate-800 my-12">

        <div class="flex flex-col md:flex-row justify-between items-center gap-4">

            <p class="text-gray-500">

                © {{ date('Y') }} CampusConnect. All Rights Reserved.

            </p>

            <p class="text-gray-500">

                Built with Love for university students across Kenya.

            </p>

        </div>

    </div>

</footer>


</body>
</html>

</body>
</html>