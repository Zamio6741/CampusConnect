@extends('layouts.admin')

@section('title', 'Settings')

@section('content')

<div class="py-8">

    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}
    <div class="mb-8">

        @if(session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-700">
                <span class="text-xl">✓</span>
                <span class="font-semibold">{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5">

            <div>
                <p class="text-sm font-bold uppercase tracking-widest text-sky-600">
                    Administration
                </p>

                <h1 class="mt-1 text-3xl font-black text-slate-900">
                    Settings
                </h1>

                <p class="mt-2 max-w-3xl text-slate-500">
                    Manage your CampusConnect platform configuration, users,
                    academic content, marketplace, payments, notifications,
                    security and system controls.
                </p>
            </div>

            <div class="rounded-xl border border-sky-200 bg-sky-50 px-4 py-3">
                <p class="text-xs font-bold text-sky-700">
                    CampusConnect Control Center
                </p>

                <p class="mt-1 text-xs text-sky-600">
                    Changes take effect after saving.
                </p>
            </div>

        </div>
    </div>


    {{-- =========================================================
         SETTINGS FORM
    ========================================================== --}}
    <form action="{{ route('admin.settings.update') }}" method="POST">

        @csrf
        @method('PUT')


        {{-- =====================================================
             QUICK NAVIGATION
        ====================================================== --}}
        <div class="mb-8 rounded-3xl border border-slate-200 bg-white p-4 shadow-sm">

            <div class="mb-3 px-2">
                <p class="text-xs font-bold uppercase tracking-widest text-slate-400">
                    Settings Center
                </p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 xl:grid-cols-11 gap-2">

                <a href="#general"
                   class="rounded-xl border border-slate-200 px-3 py-3 text-center text-sm font-semibold text-slate-600 hover:border-sky-300 hover:bg-sky-50 hover:text-sky-700 transition">
                    ⚙️ General
                </a>

                <a href="#users"
                   class="rounded-xl border border-slate-200 px-3 py-3 text-center text-sm font-semibold text-slate-600 hover:border-sky-300 hover:bg-sky-50 hover:text-sky-700 transition">
                    👥 Users
                </a>

                <a href="#universities"
                   class="rounded-xl border border-slate-200 px-3 py-3 text-center text-sm font-semibold text-slate-600 hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-700 transition">
                    🏫 Universities
                </a>

                <a href="#academic"
                   class="rounded-xl border border-slate-200 px-3 py-3 text-center text-sm font-semibold text-slate-600 hover:border-purple-300 hover:bg-purple-50 hover:text-purple-700 transition">
                    📚 Academic
                </a>

                <a href="#marketplace"
                   class="rounded-xl border border-slate-200 px-3 py-3 text-center text-sm font-semibold text-slate-600 hover:border-orange-300 hover:bg-orange-50 hover:text-orange-700 transition">
                    🏪 Marketplace
                </a>

                <a href="#announcements"
                   class="rounded-xl border border-slate-200 px-3 py-3 text-center text-sm font-semibold text-slate-600 hover:border-red-300 hover:bg-red-50 hover:text-red-700 transition">
                    📢 Announcements
                </a>

                <a href="#payments"
                   class="rounded-xl border border-slate-200 px-3 py-3 text-center text-sm font-semibold text-slate-600 hover:border-emerald-300 hover:bg-emerald-50 hover:text-emerald-700 transition">
                    💰 Payments
                </a>

                <a href="#notifications"
                   class="rounded-xl border border-slate-200 px-3 py-3 text-center text-sm font-semibold text-slate-600 hover:border-amber-300 hover:bg-amber-50 hover:text-amber-700 transition">
                    🔔 Notifications
                </a>

                <a href="#security"
                   class="rounded-xl border border-slate-200 px-3 py-3 text-center text-sm font-semibold text-slate-600 hover:border-red-300 hover:bg-red-50 hover:text-red-700 transition">
                    🔐 Security
                </a>

                <a href="#system"
                   class="rounded-xl border border-slate-200 px-3 py-3 text-center text-sm font-semibold text-slate-600 hover:border-slate-400 hover:bg-slate-50 hover:text-slate-800 transition">
                    🛠️ System
                </a>

                <a href="#admins"
                   class="rounded-xl border border-slate-200 px-3 py-3 text-center text-sm font-semibold text-slate-600 hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-700 transition">
                    👨‍💼 Admins
                </a>

            </div>
        </div>


        <div class="space-y-8">


            {{-- =================================================
                 1. GENERAL SETTINGS
            ================================================== --}}
            <section id="general"
                     class="scroll-mt-8 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 bg-slate-50 px-7 py-6">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-slate-200 bg-white text-2xl shadow-sm">
                            ⚙️
                        </div>

                        <div>
                            <h2 class="text-xl font-black text-slate-900">
                                General Settings
                            </h2>

                            <p class="text-sm text-slate-500">
                                Basic identity and contact information for CampusConnect.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="grid gap-6 p-7">

                    {{-- Platform Name --}}
                    <div>
                        <label class="mb-2 block text-sm font-bold text-slate-700">
                            Platform Name
                        </label>

                        <input
                            type="text"
                            name="settings[platform_name]"
                            value="{{ $settings->get('platform_name')?->value ?? 'CampusConnect' }}"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100"
                        >
                    </div>


                    {{-- Support Email --}}
                    <div>
                        <label class="mb-2 block text-sm font-bold text-slate-700">
                            Support Email
                        </label>

                        <input
                            type="email"
                            name="settings[support_email]"
                            value="{{ $settings->get('support_email')?->value ?? '' }}"
                            placeholder="support@campusconnect.co.ke"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100"
                        >
                    </div>


                    {{-- Support Phone --}}
                    <div>
                        <label class="mb-2 block text-sm font-bold text-slate-700">
                            Support Phone / WhatsApp
                        </label>

                        <input
                            type="text"
                            name="settings[support_phone]"
                            value="{{ $settings->get('support_phone')?->value ?? '' }}"
                            placeholder="+254..."
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100"
                        >
                    </div>


                    {{-- Default University --}}
                    <div>
                        <label class="mb-2 block text-sm font-bold text-slate-700">
                            Default University
                        </label>

                        <input
                            type="text"
                            name="settings[default_university]"
                            value="{{ $settings->get('default_university')?->value ?? 'Kenyatta University' }}"
                            placeholder="e.g. Kenyatta University"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100"
                        >
                    </div>


                    {{-- Platform Description --}}
                    <div>

                        <label class="mb-2 block text-sm font-bold text-slate-700">
                            Platform Description
                        </label>

                        <textarea
                            name="settings[platform_description]"
                            rows="4"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100"
                        >{{ $settings->get('platform_description')?->value ?? '' }}</textarea>

                    </div>

                </div>

            </section>



            {{-- =================================================
                 2. USER & REGISTRATION SETTINGS
            ================================================== --}}
            <section id="users"
                     class="scroll-mt-8 overflow-hidden rounded-3xl border border-sky-200 bg-white shadow-sm">

                <div class="border-b border-sky-100 bg-sky-50 px-7 py-6">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-sky-200 bg-white text-2xl shadow-sm">
                            👥
                        </div>

                        <div>
                            <h2 class="text-xl font-black text-slate-900">
                                User & Registration Settings
                            </h2>

                            <p class="text-sm text-slate-500">
                                Control who can register and how new accounts are handled.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="space-y-4 p-7">

                    @php
                        $userSettings = [
                            'student_registration' => [
                                'Student Registration',
                                'Allow students to create CampusConnect accounts.'
                            ],
                            'landlord_registration' => [
                                'Landlord Registration',
                                'Allow landlords to register accommodation accounts.'
                            ],
                            'business_registration' => [
                                'Business Registration',
                                'Allow businesses to register on CampusConnect.'
                            ],
                            'require_admin_approval' => [
                                'Require Admin Approval',
                                'Require administrator approval for new accounts.'
                            ],
                        ];
                    @endphp


                    @foreach($userSettings as $key => [$label, $description])

                        <div class="flex items-center justify-between gap-6 rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-sky-300 hover:shadow-sm">

                            <div>
                                <p class="font-bold text-slate-800">
                                    {{ $label }}
                                </p>

                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $description }}
                                </p>
                            </div>


                            <label class="relative inline-flex shrink-0 cursor-pointer items-center">

                                <input
                                    type="checkbox"
                                    name="settings[{{ $key }}]"
                                    value="1"
                                    class="peer sr-only"
                                    {{ $settings->get($key)?->value === '1' ? 'checked' : '' }}
                                >

                                <div class="h-7 w-12 rounded-full border border-slate-300 bg-slate-200 transition peer-checked:border-sky-500 peer-checked:bg-sky-500">
                                </div>

                                <div class="absolute left-1 top-1 h-5 w-5 rounded-full bg-white shadow-sm transition peer-checked:translate-x-5">
                                </div>

                            </label>

                        </div>

                    @endforeach

                </div>

            </section>



            {{-- =================================================
                 3. UNIVERSITY SETTINGS
            ================================================== --}}
            <section id="universities"
                     class="scroll-mt-8 overflow-hidden rounded-3xl border border-indigo-200 bg-white shadow-sm">

                <div class="border-b border-indigo-100 bg-indigo-50 px-7 py-6">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-indigo-200 bg-white text-2xl shadow-sm">
                            🏫
                        </div>

                        <div>
                            <h2 class="text-xl font-black text-slate-900">
                                University Settings
                            </h2>

                            <p class="text-sm text-slate-500">
                                Configure the university currently used as the platform default.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="p-7">

                    <div class="max-w-2xl">

                        <label class="mb-2 block text-sm font-bold text-slate-700">
                            Default University
                        </label>

                        <input
                            type="text"
                            name="settings[default_university]"
                            value="{{ $settings->get('default_university')?->value ?? 'Kenyatta University' }}"
                            placeholder="e.g. Kenyatta University"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                        >

                        <p class="mt-2 text-sm text-slate-500">
                            CampusConnect currently starts with Kenyatta University and can expand to additional universities later.
                        </p>

                    </div>


                    <div class="mt-6 rounded-2xl border border-indigo-200 bg-indigo-50 p-5">

                        <p class="font-bold text-indigo-900">
                            Multi-university expansion
                        </p>

                        <p class="mt-1 text-sm leading-6 text-indigo-700">
                            University records, faculties, departments and programmes
                            should eventually be managed through their dedicated
                            administration modules rather than duplicating those controls here.
                        </p>

                    </div>

                </div>

            </section>



            {{-- =================================================
                 4. ACADEMIC CONTENT
            ================================================== --}}
            <section id="academic"
                     class="scroll-mt-8 overflow-hidden rounded-3xl border border-purple-200 bg-white shadow-sm">

                <div class="border-b border-purple-100 bg-purple-50 px-7 py-6">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-purple-200 bg-white text-2xl shadow-sm">
                            📚
                        </div>

                        <div>
                            <h2 class="text-xl font-black text-slate-900">
                                Academic Content
                            </h2>

                            <p class="text-sm text-slate-500">
                                Control moderation and approval of academic resources.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="space-y-4 p-7">

                    <div class="flex items-center justify-between gap-6 rounded-2xl border border-slate-200 bg-white p-5">

                        <div>
                            <p class="font-bold text-slate-800">
                                Notes Approval
                            </p>

                            <p class="mt-1 text-sm text-slate-500">
                                New notes require administrator approval before becoming available.
                            </p>
                        </div>

                        <label class="relative inline-flex shrink-0 cursor-pointer items-center">

                            <input
                                type="checkbox"
                                name="settings[notes_approval]"
                                value="1"
                                class="peer sr-only"
                                {{ $settings->get('notes_approval')?->value === '1' ? 'checked' : '' }}
                            >

                            <div class="h-7 w-12 rounded-full border border-slate-300 bg-slate-200 transition peer-checked:border-purple-500 peer-checked:bg-purple-500"></div>

                            <div class="absolute left-1 top-1 h-5 w-5 rounded-full bg-white shadow-sm transition peer-checked:translate-x-5"></div>

                        </label>

                    </div>


                    <div class="rounded-2xl border border-purple-200 bg-purple-50 p-5">

                        <p class="font-bold text-purple-900">
                            Academic Resources
                        </p>

                        <p class="mt-1 text-sm leading-6 text-purple-700">
                            Notes and past papers remain part of the Academic Hub.
                            Approval controls can be expanded here as additional
                            academic content types are introduced.
                        </p>

                    </div>

                </div>

            </section>



            {{-- =================================================
                 5. MARKETPLACE & BUSINESS
            ================================================== --}}
            <section id="marketplace"
                     class="scroll-mt-8 overflow-hidden rounded-3xl border border-orange-200 bg-white shadow-sm">

                <div class="border-b border-orange-100 bg-orange-50 px-7 py-6">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-orange-200 bg-white text-2xl shadow-sm">
                            🏪
                        </div>

                        <div>
                            <h2 class="text-xl font-black text-slate-900">
                                Marketplace & Business
                            </h2>

                            <p class="text-sm text-slate-500">
                                Control business, marketplace and accommodation moderation.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="space-y-4 p-7">

                    {{-- Business Approval --}}
                    <div class="flex items-center justify-between gap-6 rounded-2xl border border-slate-200 bg-white p-5">

                        <div>
                            <p class="font-bold text-slate-800">
                                Business Listing Approval
                            </p>

                            <p class="mt-1 text-sm text-slate-500">
                                New business listings require administrator approval.
                            </p>
                        </div>

                        <label class="relative inline-flex shrink-0 cursor-pointer items-center">

                            <input
                                type="checkbox"
                                name="settings[business_approval]"
                                value="1"
                                class="peer sr-only"
                                {{ $settings->get('business_approval')?->value === '1' ? 'checked' : '' }}
                            >

                            <div class="h-7 w-12 rounded-full border border-slate-300 bg-slate-200 transition peer-checked:border-orange-500 peer-checked:bg-orange-500"></div>

                            <div class="absolute left-1 top-1 h-5 w-5 rounded-full bg-white shadow-sm transition peer-checked:translate-x-5"></div>

                        </label>

                    </div>


                    {{-- Accommodation Approval --}}
                    <div class="flex items-center justify-between gap-6 rounded-2xl border border-slate-200 bg-white p-5">

                        <div>
                            <p class="font-bold text-slate-800">
                                Accommodation Approval
                            </p>

                            <p class="mt-1 text-sm text-slate-500">
                                New accommodation listings require administrator approval.
                            </p>
                        </div>

                        <label class="relative inline-flex shrink-0 cursor-pointer items-center">

                            <input
                                type="checkbox"
                                name="settings[accommodation_approval]"
                                value="1"
                                class="peer sr-only"
                                {{ $settings->get('accommodation_approval')?->value === '1' ? 'checked' : '' }}
                            >

                            <div class="h-7 w-12 rounded-full border border-slate-300 bg-slate-200 transition peer-checked:border-orange-500 peer-checked:bg-orange-500"></div>

                            <div class="absolute left-1 top-1 h-5 w-5 rounded-full bg-white shadow-sm transition peer-checked:translate-x-5"></div>

                        </label>

                    </div>


                    <div class="grid gap-4 md:grid-cols-2">

                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                            <p class="font-bold text-slate-800">
                                Businesses
                            </p>

                            <p class="mt-1 text-sm text-slate-500">
                                Manage registered businesses and approvals from the admin business management area.
                            </p>

                            <a
                                href="{{ route('admin.businesses') }}"
                                class="mt-4 inline-flex rounded-xl border border-orange-200 bg-white px-4 py-2 text-sm font-bold text-orange-700 hover:bg-orange-50 transition"
                            >
                                Manage Businesses →
                            </a>

                        </div>


                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                            <p class="font-bold text-slate-800">
                                Accommodations
                            </p>

                            <p class="mt-1 text-sm text-slate-500">
                                Manage accommodation listings and approval requests.
                            </p>

                            <a
                                href="{{ route('admin.accommodations') }}"
                                class="mt-4 inline-flex rounded-xl border border-orange-200 bg-white px-4 py-2 text-sm font-bold text-orange-700 hover:bg-orange-50 transition"
                            >
                                Manage Accommodations →
                            </a>

                        </div>

                    </div>

                </div>

            </section>



            {{-- =================================================
                 6. ANNOUNCEMENTS
            ================================================== --}}
            <section id="announcements"
                     class="scroll-mt-8 overflow-hidden rounded-3xl border border-red-200 bg-white shadow-sm">

                <div class="border-b border-red-100 bg-red-50 px-7 py-6">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-red-200 bg-white text-2xl shadow-sm">
                            📢
                        </div>

                        <div>
                            <h2 class="text-xl font-black text-slate-900">
                                Announcement Settings
                            </h2>

                            <p class="text-sm text-slate-500">
                                Control how announcements are moderated before publishing.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="p-7">

                    <div class="flex items-center justify-between gap-6 rounded-2xl border border-slate-200 bg-white p-5">

                        <div>
                            <p class="font-bold text-slate-800">
                                Announcement Approval
                            </p>

                            <p class="mt-1 text-sm text-slate-500">
                                Require administrator approval before announcements are published.
                            </p>
                        </div>

                        <label class="relative inline-flex shrink-0 cursor-pointer items-center">

                            <input
                                type="checkbox"
                                name="settings[announcement_approval]"
                                value="1"
                                class="peer sr-only"
                                {{ $settings->get('announcement_approval')?->value === '1' ? 'checked' : '' }}
                            >

                            <div class="h-7 w-12 rounded-full border border-slate-300 bg-slate-200 transition peer-checked:border-red-500 peer-checked:bg-red-500"></div>

                            <div class="absolute left-1 top-1 h-5 w-5 rounded-full bg-white shadow-sm transition peer-checked:translate-x-5"></div>

                        </label>

                    </div>

                </div>

            </section>



            {{-- =================================================
                 7. PAYMENTS & MONETIZATION
            ================================================== --}}
            <section id="payments"
                     class="scroll-mt-8 overflow-hidden rounded-3xl border border-emerald-200 bg-white shadow-sm">

                <div class="border-b border-emerald-100 bg-emerald-50 px-7 py-6">

                    <div class="flex items-center justify-between gap-4">

                        <div class="flex items-center gap-4">

                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-emerald-200 bg-white text-2xl shadow-sm">
                                💰
                            </div>

                            <div>
                                <h2 class="text-xl font-black text-slate-900">
                                    Payments & Monetization
                                </h2>

                                <p class="text-sm text-slate-500">
                                    Control CampusConnect pricing and revenue settings.
                                </p>
                            </div>

                        </div>

                        <span class="hidden rounded-full border border-emerald-200 bg-white px-3 py-1 text-xs font-bold text-emerald-700 sm:inline-flex">
                            Revenue
                        </span>

                    </div>

                </div>


                <div class="p-7">

                    {{-- Monetization Toggle --}}
                    <div class="mb-6 flex items-center justify-between gap-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-5">

                        <div>
                            <p class="font-bold text-slate-800">
                                Monetization System
                            </p>

                            <p class="mt-1 text-sm text-slate-500">
                                Enable or disable paid CampusConnect features.
                            </p>
                        </div>


                        <label class="relative inline-flex shrink-0 cursor-pointer items-center">

                            <input
                                type="checkbox"
                                name="settings[monetization_enabled]"
                                value="1"
                                class="peer sr-only"
                                {{ $settings->get('monetization_enabled')?->value === '1' ? 'checked' : '' }}
                            >

                            <div class="h-7 w-12 rounded-full border border-slate-300 bg-slate-200 transition peer-checked:border-emerald-500 peer-checked:bg-emerald-500"></div>

                            <div class="absolute left-1 top-1 h-5 w-5 rounded-full bg-white shadow-sm transition peer-checked:translate-x-5"></div>

                        </label>

                    </div>


                    @php
                        $moneySettings = [
                            'notes_price' => [
                                'Notes Price',
                                'Price users pay for notes.'
                            ],
                            'past_papers_price' => [
                                'Past Papers Price',
                                'Price users pay for past papers.'
                            ],
                            'accommodation_pass_price' => [
                                'Accommodation Pass',
                                'Campus accommodation access price.'
                            ],
                            'business_listing_fee' => [
                                'Business Listing Fee',
                                'Fee for registering a business.'
                            ],
                            'featured_listing_fee' => [
                                'Featured Listing Fee',
                                'Fee for featured listings.'
                            ],
                            'advertisement_fee' => [
                                'Advertisement Fee',
                                'Base advertisement fee.'
                            ],
                        ];
                    @endphp


                    <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">

                        @foreach($moneySettings as $key => [$label, $description])

                            <div class="rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-emerald-300 hover:shadow-sm">

                                <label class="block font-bold text-slate-800">
                                    {{ $label }}
                                </label>

                                <p class="mt-1 mb-4 text-xs leading-5 text-slate-500">
                                    {{ $description }}
                                </p>


                                <div class="flex">

                                    <span class="inline-flex items-center rounded-l-xl border border-r-0 border-slate-300 bg-slate-100 px-3 text-sm font-bold text-slate-600">
                                        KSh
                                    </span>

                                    <input
                                        type="number"
                                        min="0"
                                        step="1"
                                        name="settings[{{ $key }}]"
                                        value="{{ $settings->get($key)?->value ?? 0 }}"
                                        class="w-full rounded-r-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-800 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                                    >

                                </div>

                            </div>

                        @endforeach

                    </div>


                    <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-5">

                        <p class="font-bold text-emerald-900">
                            Payment provider configuration
                        </p>

                        <p class="mt-1 text-sm leading-6 text-emerald-700">
                            M-Pesa and other payment credentials should be handled
                            securely through environment configuration rather than
                            being exposed in this Blade file.
                        </p>

                    </div>

                </div>

            </section>



            {{-- =================================================
                 8. NOTIFICATIONS
            ================================================== --}}
            <section id="notifications"
                     class="scroll-mt-8 overflow-hidden rounded-3xl border border-amber-200 bg-white shadow-sm">

                <div class="border-b border-amber-100 bg-amber-50 px-7 py-6">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-amber-200 bg-white text-2xl shadow-sm">
                            🔔
                        </div>

                        <div>
                            <h2 class="text-xl font-black text-slate-900">
                                Notifications
                            </h2>

                            <p class="text-sm text-slate-500">
                                Control important administrative and platform alerts.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="space-y-4 p-7">

                    @php
                        $notificationSettings = [
                            'admin_notifications' => [
                                'Admin Notifications',
                                'Receive important administrative alerts.'
                            ],
                            'new_user_notifications' => [
                                'New User Notifications',
                                'Receive alerts when new users register.'
                            ],
                            'pending_content_notifications' => [
                                'Pending Content Alerts',
                                'Receive alerts when content requires approval.'
                            ],
                        ];
                    @endphp


                    @foreach($notificationSettings as $key => [$label, $description])

                        <div class="flex items-center justify-between gap-6 rounded-2xl border border-slate-200 bg-white p-5">

                            <div>
                                <p class="font-bold text-slate-800">
                                    {{ $label }}
                                </p>

                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $description }}
                                </p>
                            </div>


                            <label class="relative inline-flex shrink-0 cursor-pointer items-center">

                                <input
                                    type="checkbox"
                                    name="settings[{{ $key }}]"
                                    value="1"
                                    class="peer sr-only"
                                    {{ $settings->get($key)?->value === '1' ? 'checked' : '' }}
                                >

                                <div class="h-7 w-12 rounded-full border border-slate-300 bg-slate-200 transition peer-checked:border-amber-500 peer-checked:bg-amber-500"></div>

                                <div class="absolute left-1 top-1 h-5 w-5 rounded-full bg-white shadow-sm transition peer-checked:translate-x-5"></div>

                            </label>

                        </div>

                    @endforeach

                </div>

            </section>



            {{-- =================================================
                 9. SECURITY
            ================================================== --}}
            <section id="security"
                     class="scroll-mt-8 overflow-hidden rounded-3xl border border-red-200 bg-white shadow-sm">

                <div class="border-b border-red-100 bg-red-50 px-7 py-6">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-red-200 bg-white text-2xl shadow-sm">
                            🔐
                        </div>

                        <div>
                            <h2 class="text-xl font-black text-slate-900">
                                Security
                            </h2>

                            <p class="text-sm text-slate-500">
                                Protect the CampusConnect administration system.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="space-y-4 p-7">

                    @php
                        $securitySettings = [
                            'login_protection' => [
                                'Login Protection',
                                'Enable additional protection around authentication.'
                            ],
                            'activity_logging' => [
                                'Admin Activity Logging',
                                'Record important administrative actions.'
                            ],
                        ];
                    @endphp


                    @foreach($securitySettings as $key => [$label, $description])

                        <div class="flex items-center justify-between gap-6 rounded-2xl border border-slate-200 bg-white p-5">

                            <div>
                                <p class="font-bold text-slate-800">
                                    {{ $label }}
                                </p>

                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $description }}
                                </p>
                            </div>


                            <label class="relative inline-flex shrink-0 cursor-pointer items-center">

                                <input
                                    type="checkbox"
                                    name="settings[{{ $key }}]"
                                    value="1"
                                    class="peer sr-only"
                                    {{ $settings->get($key)?->value === '1' ? 'checked' : '' }}
                                >

                                <div class="h-7 w-12 rounded-full border border-slate-300 bg-slate-200 transition peer-checked:border-red-500 peer-checked:bg-red-500"></div>

                                <div class="absolute left-1 top-1 h-5 w-5 rounded-full bg-white shadow-sm transition peer-checked:translate-x-5"></div>

                            </label>

                        </div>

                    @endforeach


                    <div class="rounded-2xl border border-red-200 bg-red-50 p-5">

                        <p class="font-bold text-red-900">
                            Security reminder
                        </p>

                        <p class="mt-1 text-sm leading-6 text-red-700">
                            Sensitive credentials, API tokens and payment secrets
                            should never be stored directly in Blade templates.
                        </p>

                    </div>

                </div>

            </section>



            {{-- =================================================
                 10. SYSTEM / MAINTENANCE
            ================================================== --}}
            <section id="system"
                     class="scroll-mt-8 overflow-hidden rounded-3xl border border-slate-300 bg-white shadow-sm">

                <div class="border-b border-slate-200 bg-slate-50 px-7 py-6">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-slate-200 bg-white text-2xl shadow-sm">
                            🛠️
                        </div>

                        <div>
                            <h2 class="text-xl font-black text-slate-900">
                                System & Maintenance
                            </h2>

                            <p class="text-sm text-slate-500">
                                Control platform availability and maintenance state.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="space-y-5 p-7">

                    {{-- Maintenance Mode --}}
                    <div class="flex items-center justify-between gap-6 rounded-2xl border border-red-200 bg-red-50 p-5">

                        <div>
                            <p class="font-bold text-red-800">
                                Maintenance Mode
                            </p>

                            <p class="mt-1 text-sm text-red-600">
                                Temporarily restrict platform access while maintenance is being performed.
                            </p>
                        </div>


                        <label class="relative inline-flex shrink-0 cursor-pointer items-center">

                            <input
                                type="checkbox"
                                name="settings[maintenance_mode]"
                                value="1"
                                class="peer sr-only"
                                {{ $settings->get('maintenance_mode')?->value === '1' ? 'checked' : '' }}
                            >

                            <div class="h-7 w-12 rounded-full border border-slate-300 bg-slate-200 transition peer-checked:border-red-500 peer-checked:bg-red-500">
                            </div>

                            <div class="absolute left-1 top-1 h-5 w-5 rounded-full bg-white shadow-sm transition peer-checked:translate-x-5">
                            </div>

                        </label>

                    </div>


                    {{-- Maintenance End Time --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-5">

                        <div class="mb-4">

                            <p class="font-bold text-slate-800">
                                Maintenance End Time
                            </p>

                            <p class="mt-1 text-sm text-slate-500">
                                Set the expected time when maintenance will end.
                            </p>

                        </div>


                        <div class="max-w-md">

                            <label class="mb-2 block text-sm font-bold text-slate-700">
                                Expected Completion
                            </label>

                            <input
                                type="datetime-local"
                                name="settings[maintenance_end_at]"
                                value="{{ $settings->get('maintenance_end_at')?->value ? \Carbon\Carbon::parse($settings->get('maintenance_end_at')->value)->format('Y-m-d\TH:i') : '' }}"
                                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-100"
                            >

                            <p class="mt-2 text-xs text-slate-500">
                                This time will be used by the maintenance page countdown.
                            </p>

                        </div>

                    </div>


                    {{-- Maintenance information --}}
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                        <p class="font-bold text-slate-800">
                            Maintenance information
                        </p>

                        <p class="mt-1 text-sm leading-6 text-slate-500">
                            When Maintenance Mode is enabled, normal users will be
                            redirected to the CampusConnect maintenance page.
                            Administrators can continue accessing the administration
                            area so maintenance work can be completed.
                        </p>

                    </div>

                </div>

            </section>



            {{-- =================================================
                 11. ADMIN MANAGEMENT
            ================================================== --}}
            <section id="admins"
                     class="scroll-mt-8 overflow-hidden rounded-3xl border border-indigo-200 bg-white shadow-sm">

                <div class="border-b border-indigo-100 bg-indigo-50 px-7 py-6">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-indigo-200 bg-white text-2xl shadow-sm">
                            👨‍💼
                        </div>

                        <div>
                            <h2 class="text-xl font-black text-slate-900">
                                Admin Management
                            </h2>

                            <p class="text-sm text-slate-500">
                                Manage administrator accounts through the user management system.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="p-7">

                    <div class="grid gap-5 md:grid-cols-2">

                        <div class="rounded-2xl border border-slate-200 bg-white p-5">

                            <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl border border-indigo-200 bg-indigo-50">
                                👥
                            </div>

                            <h3 class="font-black text-slate-800">
                                Administrator Accounts
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                Manage users, roles and account status from the admin user management area.
                            </p>

                            <a
                                href="{{ route('admin.users') }}"
                                class="mt-4 inline-flex rounded-xl border border-indigo-200 bg-white px-4 py-2 text-sm font-bold text-indigo-700 hover:bg-indigo-50 transition"
                            >
                                Manage Users →
                            </a>

                        </div>


                        <div class="rounded-2xl border border-slate-200 bg-white p-5">

                            <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl border border-indigo-200 bg-indigo-50">
                                🛡️
                            </div>

                            <h3 class="font-black text-slate-800">
                                Administrative Security
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                Security controls and administrator activity logging are managed in the Security section above.
                            </p>

                            <a
                                href="#security"
                                class="mt-4 inline-flex rounded-xl border border-indigo-200 bg-white px-4 py-2 text-sm font-bold text-indigo-700 hover:bg-indigo-50 transition"
                            >
                                Security Settings →
                            </a>

                        </div>

                    </div>

                </div>

            </section>



            {{-- =================================================
                 SAVE BAR
            ================================================== --}}
            <div class="sticky bottom-5 z-30">

                <div class="flex flex-col gap-4 rounded-2xl border border-slate-800 bg-slate-950 p-4 shadow-2xl sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <p class="font-bold text-white">
                            CampusConnect Settings
                        </p>

                        <p class="text-xs text-slate-400">
                            Save your changes to update the platform configuration.
                        </p>

                    </div>


                    {{-- UPDATED SAVE BUTTON --}}
                    <button
                        type="submit"
                        class="group w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-sky-500 px-8 py-3.5 text-sm font-black text-white shadow-lg shadow-sky-500/30 ring-1 ring-sky-400 transition-all duration-200 hover:bg-sky-400 hover:shadow-xl hover:shadow-sky-500/40 hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-sky-300/50 active:translate-y-0"
                    >
                        <span class="text-base">
                            💾
                        </span>

                        <span>
                            Save Changes
                        </span>

                        <span class="transition-transform duration-200 group-hover:translate-x-1">
                            →
                        </span>
                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection