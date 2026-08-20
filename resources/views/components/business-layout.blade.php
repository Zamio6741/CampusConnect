<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<meta charset="utf-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1"

>

<meta
name="csrf-token"
content="{{ csrf_token() }}"

>

<title>
    {{ config('app.name', 'CampusConnect') }} — Business Portal
</title>

@vite([
'resources/css/app.css',
'resources/js/app.js'
])

</head>

<body class="font-sans antialiased overflow-x-hidden bg-slate-100">

@php

/*                                                                         
-------------------------------------------------------------------------- 
BUSINESS INSTANCE                                                          
-------------------------------------------------------------------------- 
*/                                                                         

$businessForLayout = $business ?? optional(auth()->user())->business;

/*                                                                         
-------------------------------------------------------------------------- 
BUSINESS OWNER                                                            
-------------------------------------------------------------------------- 
*/                                                                         

$businessOwner = auth()->user();

/*                                                                         
-------------------------------------------------------------------------- 
OWNER INITIAL                                                              
-------------------------------------------------------------------------- 
*/                                                                         

$ownerInitial = $businessOwner
? strtoupper(substr($businessOwner->name, 0, 1))
: 'B';

/*                                                                         
-------------------------------------------------------------------------- 
NOTIFICATION COUNT                                                         
-------------------------------------------------------------------------- 
*/                                                                         

$businessNotificationCount = $notificationCount ?? 0;

@endphp

<div
    x-data="{
        sidebar: false,
        mobileSidebar: false,
        userMenu: false
    }"
    class="min-h-screen bg-slate-100"
>

{{-- ========================================================= --}}
{{-- BUSINESS SIDEBAR --}}
{{-- ========================================================= --}}

<aside


@mouseenter="sidebar = true"

@mouseleave="sidebar = false"

:class="[
    mobileSidebar
        ? 'translate-x-0'
        : '-translate-x-full lg:translate-x-0',

    sidebar
        ? 'lg:w-72'
        : 'lg:w-24'
]"

class="
    fixed
    inset-y-0
    left-0
    z-50
    h-screen
    w-72
    bg-slate-900
    text-white
    transition-all
    duration-300
    ease-in-out
    flex
    flex-col
    shadow-2xl
    overflow-hidden
"


>


{{-- ===================================================== --}}
{{-- SIDEBAR HEADER --}}
{{-- ===================================================== --}}

<div
    class="
        h-24
        flex
        items-center
        shrink-0
        border-b
        border-white/5
    "
>

    {{-- ================================================= --}}
    {{-- COLLAPSED BUSINESS LOGO --}}
    {{-- ================================================= --}}

    <div
        x-show="!sidebar && !mobileSidebar"
        x-transition.opacity

        class="
            w-full
            flex
            justify-center
            items-center
        "
    >

        <div
            class="
                w-12
                h-12
                rounded-2xl
                bg-gradient-to-r
                from-blue-600
                to-indigo-600
                flex
                items-center
                justify-center
                text-2xl
                shadow-lg
                shrink-0
            "
        >

            🏪

        </div>

    </div>


    {{-- ================================================= --}}
    {{-- EXPANDED BUSINESS LOGO --}}
    {{-- ================================================= --}}

    <div
        x-show="sidebar || mobileSidebar"
        x-transition

        class="
            px-6
            flex
            items-center
            gap-3
            whitespace-nowrap
        "
    >

        <div
            class="
                w-11
                h-11
                rounded-xl
                bg-gradient-to-r
                from-blue-600
                to-indigo-600
                flex
                items-center
                justify-center
                text-xl
                shadow-lg
                shrink-0
            "
        >

            🏪

        </div>


        <div class="min-w-0">

            <h1
                class="
                    text-xl
                    font-extrabold
                    tracking-tight
                    truncate
                "
            >

                CampusConnect

            </h1>


            <p
                class="
                    text-xs
                    text-blue-300
                    truncate
                "
            >

                Business Portal

            </p>

        </div>

    </div>

</div>


{{-- ===================================================== --}}
{{-- BUSINESS OWNER --}}
{{-- ===================================================== --}}

<div
    x-show="sidebar || mobileSidebar"
    x-transition

    class="
        px-5
        py-6
        border-b
        border-white/5
        shrink-0
    "
>

    <div
        class="
            flex
            items-center
            gap-3
            min-w-0
        "
    >

        <div
            class="
                w-12
                h-12
                rounded-full
                bg-gradient-to-r
                from-blue-500
                to-indigo-600
                flex
                items-center
                justify-center
                text-white
                font-bold
                text-lg
                shrink-0
            "
        >

            {{ $ownerInitial }}

        </div>


        <div class="min-w-0">

            <p
                class="
                    font-bold
                    text-sm
                    truncate
                "
            >

                {{ $businessOwner?->name ?? 'Business Owner' }}

            </p>


            <p
                class="
                    text-xs
                    text-slate-400
                    mt-1
                    truncate
                "
            >

                Business Owner

            </p>

        </div>

    </div>

</div>


{{-- ===================================================== --}}
{{-- BUSINESS NAVIGATION --}}
{{-- ===================================================== --}}

<nav
    class="
        flex-1
        overflow-y-auto
        overflow-x-hidden
        px-3
        py-6
        space-y-2
    "
>

    {{-- ================================================= --}}
    {{-- DASHBOARD --}}
    {{-- ================================================= --}}

    @if(Route::has('business.dashboard'))

        <a
            href="{{ route('business.dashboard') }}"
            @click="mobileSidebar = false"

            class="
                sidebar-link
                {{ request()->routeIs('business.dashboard')
                    ? 'sidebar-link-active'
                    : '' }}
            "

            :class="sidebar || mobileSidebar
                ? 'justify-start px-4 gap-4'
                : 'justify-center'"
        >

            <span class="text-xl shrink-0">
                🏠
            </span>

            <span
                x-show="sidebar || mobileSidebar"
                x-transition
                class="whitespace-nowrap"
            >

                Dashboard

            </span>

        </a>

    @endif


    {{-- ================================================= --}}
    {{-- BUSINESS PROFILE --}}
    {{-- ================================================= --}}

    @if(Route::has('business.profile'))

        <a
            href="{{ route('business.profile') }}"
            @click="mobileSidebar = false"

            class="
                sidebar-link
                {{ request()->routeIs('business.profile')
                    ? 'sidebar-link-active'
                    : '' }}
            "

            :class="sidebar || mobileSidebar
                ? 'justify-start px-4 gap-4'
                : 'justify-center'"
        >

            <span class="text-xl shrink-0">
                🏪
            </span>

            <span
                x-show="sidebar || mobileSidebar"
                x-transition
                class="whitespace-nowrap"
            >

                Business Profile

            </span>

        </a>

    @endif


    {{-- ================================================= --}}
    {{-- GALLERY --}}
    {{-- ================================================= --}}

    @if(Route::has('business.gallery') && $businessForLayout)

        <a
            href="{{ route('business.gallery', $businessForLayout) }}"
            @click="mobileSidebar = false"

            class="
                sidebar-link
                {{ request()->routeIs('business.gallery*')
                    ? 'sidebar-link-active'
                    : '' }}
            "

            :class="sidebar || mobileSidebar
                ? 'justify-start px-4 gap-4'
                : 'justify-center'"
        >

            <span class="text-xl shrink-0">
                🖼️
            </span>

            <span
                x-show="sidebar || mobileSidebar"
                x-transition
                class="whitespace-nowrap"
            >

                Gallery

            </span>

        </a>

    @endif


    {{-- ================================================= --}}
    {{-- PRODUCTS --}}
    {{-- ================================================= --}}

    @if(Route::has('products.index'))

        <a
            href="{{ route('products.index') }}"
            @click="mobileSidebar = false"

            class="
                sidebar-link
                {{ request()->routeIs('products.*')
                    ? 'sidebar-link-active'
                    : '' }}
            "

            :class="sidebar || mobileSidebar
                ? 'justify-start px-4 gap-4'
                : 'justify-center'"
        >

            <span class="text-xl shrink-0">
                🛍️
            </span>

            <span
                x-show="sidebar || mobileSidebar"
                x-transition
                class="whitespace-nowrap"
            >

                Products

            </span>

        </a>

    @endif


    {{-- ================================================= --}}
    {{-- ADVERTISEMENTS --}}
    {{-- ================================================= --}}

    @if(Route::has('business.advertisements.index'))

        <a
            href="{{ route('business.advertisements.index') }}"
            @click="mobileSidebar = false"

            class="
                sidebar-link
                {{ request()->routeIs('business.advertisements.*')
                    ? 'sidebar-link-active'
                    : '' }}
            "

            :class="sidebar || mobileSidebar
                ? 'justify-start px-4 gap-4'
                : 'justify-center'"
        >

            <span class="text-xl shrink-0">
                📢
            </span>

            <span
                x-show="sidebar || mobileSidebar"
                x-transition
                class="whitespace-nowrap"
            >

                Advertisements

            </span>

        </a>

    @endif


    {{-- ================================================= --}}
    {{-- ANALYTICS --}}
    {{-- ================================================= --}}

    @if(Route::has('business.analytics'))

        <a
            href="{{ route('business.analytics') }}"
            @click="mobileSidebar = false"

            class="
                sidebar-link
                {{ request()->routeIs('business.analytics*')
                    ? 'sidebar-link-active'
                    : '' }}
            "

            :class="sidebar || mobileSidebar
                ? 'justify-start px-4 gap-4'
                : 'justify-center'"
        >

            <span class="text-xl shrink-0">
                📈
            </span>

            <span
                x-show="sidebar || mobileSidebar"
                x-transition
                class="whitespace-nowrap"
            >

                Analytics

            </span>

        </a>

    @endif


    {{-- ================================================= --}}
    {{-- MESSAGES --}}
    {{-- ================================================= --}}

    @if(Route::has('business.messages'))

        <a
            href="{{ route('business.messages') }}"
            @click="mobileSidebar = false"

            class="
                sidebar-link
                {{ request()->routeIs('business.messages*')
                    ? 'sidebar-link-active'
                    : '' }}
            "

            :class="sidebar || mobileSidebar
                ? 'justify-start px-4 gap-4'
                : 'justify-center'"
        >

            <span class="text-xl shrink-0">
                💬
            </span>

            <span
                x-show="sidebar || mobileSidebar"
                x-transition
                class="whitespace-nowrap"
            >

                Messages

            </span>

        </a>

    @endif


    {{-- ================================================= --}}
    {{-- REVIEWS --}}
    {{-- ================================================= --}}

    @if(Route::has('business.reviews'))

        <a
            href="{{ route('business.reviews') }}"
            @click="mobileSidebar = false"

            class="
                sidebar-link
                {{ request()->routeIs('business.reviews*')
                    ? 'sidebar-link-active'
                    : '' }}
            "

            :class="sidebar || mobileSidebar
                ? 'justify-start px-4 gap-4'
                : 'justify-center'"
        >

            <span class="text-xl shrink-0">
                ⭐
            </span>

            <span
                x-show="sidebar || mobileSidebar"
                x-transition
                class="whitespace-nowrap"
            >

                Reviews

            </span>

        </a>

    @endif


    {{-- ================================================= --}}
    {{-- NOTIFICATIONS --}}
    {{-- ================================================= --}}

    @if(Route::has('business.notifications'))

        <a
            href="{{ route('business.notifications') }}"
            @click="mobileSidebar = false"

            class="
                sidebar-link
                {{ request()->routeIs('business.notifications*')
                    ? 'sidebar-link-active'
                    : '' }}
            "

            :class="sidebar || mobileSidebar
                ? 'justify-start px-4 gap-4'
                : 'justify-center'"
        >

            <span class="relative text-xl shrink-0">

                🔔

                @if($businessNotificationCount > 0)

                    <span
                        class="
                            absolute
                            -top-2
                            -right-3
                            bg-red-500
                            text-white
                            text-[9px]
                            rounded-full
                            min-w-4
                            h-4
                            px-1
                            flex
                            items-center
                            justify-center
                            font-bold
                        "
                    >

                        {{ $businessNotificationCount > 99
                            ? '99+'
                            : $businessNotificationCount }}

                    </span>

                @endif

            </span>


            <span
                x-show="sidebar || mobileSidebar"
                x-transition
                class="whitespace-nowrap"
            >

                Notifications

            </span>

        </a>

    @endif

</nav>


{{-- ===================================================== --}}
{{-- SIDEBAR FOOTER --}}
{{-- ===================================================== --}}

<div
    x-show="sidebar || mobileSidebar"
    x-transition

    class="
        shrink-0
        border-t
        border-white/5
        p-4
    "
>

    <p
        class="
            text-center
            text-xs
            text-slate-500
            whitespace-nowrap
        "
    >

        CampusConnect Business Portal

    </p>

    <p
        class="
            text-center
            text-[10px]
            text-slate-600
            mt-1
        "
    >

        v2.0

    </p>

</div>


</aside>

{{-- ========================================================= --}}
{{-- MOBILE OVERLAY --}}
{{-- ========================================================= --}}

<div
    x-show="mobileSidebar"
    x-transition.opacity


@click="mobileSidebar = false"

class="
    fixed
    inset-0
    z-40
    bg-black/50
    backdrop-blur-sm
    lg:hidden
"

aria-hidden="true"


> </div>

{{-- ========================================================= --}}
{{-- MAIN BUSINESS AREA --}}
{{-- ========================================================= --}}

<main
    class="
        min-h-screen
        w-full
        lg:pl-24
    "
>


{{-- ===================================================== --}}
{{-- BUSINESS TOP BAR --}}
{{-- ===================================================== --}}

<header
    class="
        bg-white
        border-b
        border-gray-200
        sticky
        top-0
        z-30
    "
>

    <div
        class="
            flex
            items-center
            justify-between
            gap-3
            px-4
            sm:px-5
            lg:px-10
            py-3
            sm:py-4
        "
    >

        {{-- ================================================= --}}
        {{-- TOP BAR LEFT --}}
        {{-- ================================================= --}}

        <div
            class="
                flex
                items-center
                gap-3
                min-w-0
            "
        >

            {{-- MOBILE MENU --}}

            <button
                @click="mobileSidebar = !mobileSidebar"
                type="button"

                class="
                    lg:hidden
                    w-11
                    h-11
                    rounded-xl
                    bg-gray-100
                    hover:bg-blue-50
                    flex
                    items-center
                    justify-center
                    text-xl
                    transition
                    shrink-0
                "

                aria-label="Open business navigation"
                :aria-expanded="mobileSidebar"
            >

                <span x-show="!mobileSidebar">
                    ☰
                </span>

                <span
                    x-show="mobileSidebar"
                    x-transition
                >
                    ✕
                </span>

            </button>


            {{-- BUSINESS BRAND --}}

            <div
                class="
                    hidden
                    sm:flex
                    items-center
                    gap-3
                    min-w-0
                "
            >

                <div
                    class="
                        w-10
                        h-10
                        rounded-xl
                        bg-gradient-to-r
                        from-blue-600
                        to-indigo-600
                        flex
                        items-center
                        justify-center
                        text-white
                        shadow
                        shrink-0
                    "
                >

                    🏪

                </div>


                <div class="min-w-0">

                    <h1
                        class="
                            font-extrabold
                            text-lg
                            text-gray-800
                            truncate
                        "
                    >

                        CampusConnect

                    </h1>


                    <p
                        class="
                            text-xs
                            text-gray-400
                            truncate
                        "
                    >

                        Business Portal

                    </p>

                </div>

            </div>


            {{-- MOBILE BUSINESS TITLE --}}

            <div
                class="
                    sm:hidden
                    min-w-0
                "
            >

                <p
                    class="
                        font-extrabold
                        text-base
                        text-gray-800
                        truncate
                    "
                >

                    Business Portal

                </p>

            </div>

        </div>


        {{-- ================================================= --}}
        {{-- TOP BAR RIGHT --}}
        {{-- ================================================= --}}

        <div
            class="
                flex
                items-center
                gap-2
                sm:gap-3
                shrink-0
            "
        >

            {{-- ================================================= --}}
            {{-- BUSINESS NOTIFICATIONS --}}
            {{-- ================================================= --}}

            @if(Route::has('business.notifications'))

                <a
                    href="{{ route('business.notifications') }}"

                    class="
                        relative
                        w-10
                        h-10
                        sm:w-11
                        sm:h-11
                        rounded-xl
                        bg-gray-100
                        hover:bg-blue-50
                        hover:shadow-lg
                        flex
                        items-center
                        justify-center
                        transition
                        shrink-0
                    "

                    title="Business Notifications"
                    aria-label="Business Notifications"
                >

                    🔔

                    @if($businessNotificationCount > 0)

                        <span
                            class="
                                absolute
                                -top-1
                                -right-1
                                sm:-top-2
                                sm:-right-2
                                bg-red-500
                                text-white
                                text-[10px]
                                sm:text-xs
                                rounded-full
                                min-w-5
                                h-5
                                px-1
                                flex
                                items-center
                                justify-center
                                font-bold
                            "
                        >

                            {{ $businessNotificationCount > 99
                                ? '99+'
                                : $businessNotificationCount }}

                        </span>

                    @endif

                </a>

            @endif


            {{-- ================================================= --}}
            {{-- BUSINESS OWNER MENU --}}
            {{-- ================================================= --}}

            <div
                class="relative"
                @click.outside="userMenu = false"
            >

                <button
                    type="button"

                    @click="userMenu = !userMenu"

                    class="
                        flex
                        items-center
                        gap-2
                        sm:gap-3
                        bg-gray-50
                        hover:bg-blue-50
                        border
                        border-gray-200
                        hover:border-blue-200
                        rounded-2xl
                        px-2
                        sm:px-3
                        lg:px-4
                        py-1.5
                        sm:py-2
                        shadow-sm
                        hover:shadow-md
                        transition-all
                        duration-200
                        focus:outline-none
                        focus:ring-2
                        focus:ring-blue-500/30
                    "

                    :aria-expanded="userMenu"
                    aria-label="Open business owner menu"
                >

                    {{-- AVATAR --}}

                    <div
                        class="
                            w-9
                            h-9
                            sm:w-10
                            sm:h-10
                            rounded-full
                            bg-gradient-to-r
                            from-blue-600
                            to-indigo-600
                            text-white
                            flex
                            items-center
                            justify-center
                            font-bold
                            shrink-0
                        "
                    >

                        {{ $ownerInitial }}

                    </div>


                    {{-- OWNER INFORMATION --}}

                    <div
                        class="
                            hidden
                            md:block
                            text-left
                            min-w-0
                        "
                    >

                        <p
                            class="
                                font-semibold
                                text-sm
                                text-gray-800
                                max-w-[150px]
                                lg:max-w-[200px]
                                truncate
                            "
                        >

                            {{ $businessOwner?->name ?? 'Business Owner' }}

                        </p>


                        <small class="text-gray-500">

                            Business Owner

                        </small>

                    </div>


                    {{-- ARROW --}}

                    <svg
                        class="
                            w-4
                            h-4
                            text-gray-500
                            transition-transform
                            duration-200
                            shrink-0
                        "

                        :class="{ 'rotate-180': userMenu }"

                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"
                        />

                    </svg>

                </button>


                {{-- ================================================= --}}
                {{-- BUSINESS USER DROPDOWN --}}
                {{-- ================================================= --}}

                <div
                    x-show="userMenu"
                    x-transition

                    class="
                        absolute
                        right-0
                        mt-3
                        w-[calc(100vw-2rem)]
                        max-w-72
                        bg-white
                        rounded-2xl
                        shadow-2xl
                        border
                        border-gray-200
                        overflow-hidden
                        z-50
                    "

                    style="display: none;"
                >

                    {{-- BUSINESS OWNER HEADER --}}

                    <div
                        class="
                            px-5
                            py-4
                            bg-gradient-to-r
                            from-blue-600
                            to-indigo-600
                            text-white
                        "
                    >

                        <div
                            class="
                                flex
                                items-center
                                gap-3
                            "
                        >

                            <div
                                class="
                                    w-11
                                    h-11
                                    rounded-full
                                    bg-white/20
                                    border
                                    border-white/20
                                    flex
                                    items-center
                                    justify-center
                                    font-bold
                                    shrink-0
                                "
                            >

                                {{ $ownerInitial }}

                            </div>


                            <div class="min-w-0">

                                <p
                                    class="
                                        font-bold
                                        text-sm
                                        truncate
                                    "
                                >

                                    {{ $businessOwner?->name ?? 'Business Owner' }}

                                </p>


                                <p
                                    class="
                                        text-xs
                                        text-blue-100
                                        mt-1
                                        break-all
                                    "
                                >

                                    {{ $businessOwner?->email }}

                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="p-2">

                        {{-- ================================================= --}}
                        {{-- BUSINESS PROFILE --}}
                        {{-- ================================================= --}}

                        @if(Route::has('business.profile'))

                            <a
                                href="{{ route('business.profile') }}"

                                @click="userMenu = false"

                                class="
                                    flex
                                    items-center
                                    gap-3
                                    px-4
                                    py-3
                                    rounded-xl
                                    text-gray-700
                                    hover:bg-blue-50
                                    hover:text-blue-700
                                    transition
                                "
                            >

                                <span
                                    class="
                                        w-9
                                        h-9
                                        rounded-lg
                                        bg-blue-100
                                        text-blue-600
                                        flex
                                        items-center
                                        justify-center
                                        shrink-0
                                    "
                                >

                                    🏪

                                </span>


                                <div class="min-w-0">

                                    <p
                                        class="
                                            font-semibold
                                            text-sm
                                        "
                                    >

                                        Business Profile

                                    </p>


                                    <p
                                        class="
                                            text-xs
                                            text-gray-400
                                            truncate
                                        "
                                    >

                                        Manage your business

                                    </p>

                                </div>

                            </a>

                        @endif


                        {{-- ================================================= --}}
                        {{-- DIVIDER --}}
                        {{-- ================================================= --}}

                        <div class="my-2 border-t border-gray-100"></div>


                        {{-- ================================================= --}}
                        {{-- LOGOUT --}}
                        {{-- ================================================= --}}

                        @if(Route::has('logout'))

                            <form
                                method="POST"
                                action="{{ route('logout') }}"
                            >

                                @csrf


                                <button
                                    type="submit"

                                    class="
                                        w-full
                                        flex
                                        items-center
                                        gap-3
                                        px-4
                                        py-3
                                        rounded-xl
                                        text-gray-700
                                        hover:bg-red-50
                                        hover:text-red-600
                                        transition
                                        text-left
                                    "
                                >

                                    <span
                                        class="
                                            w-9
                                            h-9
                                            rounded-lg
                                            bg-red-100
                                            text-red-600
                                            flex
                                            items-center
                                            justify-center
                                            shrink-0
                                        "
                                    >

                                        🚪

                                    </span>


                                    <div class="min-w-0">

                                        <p
                                            class="
                                                font-semibold
                                                text-sm
                                            "
                                        >

                                            Log Out

                                        </p>


                                        <p
                                            class="
                                                text-xs
                                                text-gray-400
                                                truncate
                                            "
                                        >

                                            Sign out of your account

                                        </p>

                                    </div>

                                </button>

                            </form>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>


{{-- ===================================================== --}}
{{-- BUSINESS PAGE CONTENT --}}
{{-- ===================================================== --}}

<div
    class="
        min-h-screen
        w-full
        min-w-0
    "
>

    {{ $slot }}

</div>


</main>

{{-- ========================================================= --}}
{{-- BUSINESS SIDEBAR STYLES --}}
{{-- ========================================================= --}}

<style>

    .sidebar-link {

        display: flex;

        align-items: center;

        min-height: 48px;

        width: 100%;

        border-radius: 14px;

        color: #cbd5e1;

        font-weight: 500;

        transition:
            background-color .2s ease,
            color .2s ease,
            transform .2s ease;

        white-space: nowrap;

    }


    .sidebar-link:hover {

        background: rgba(59, 130, 246, .15);

        color: #ffffff;

        transform: translateX(2px);

    }


    .sidebar-link-active {

        background:
            linear-gradient(
                90deg,
                rgba(37, 99, 235, .95),
                rgba(79, 70, 229, .95)
            );

        color: #ffffff;

        box-shadow:
            0 8px 20px
            rgba(37, 99, 235, .20);

    }


    .sidebar-link-active:hover {

        background:
            linear-gradient(
                90deg,
                rgba(37, 99, 235, 1),
                rgba(79, 70, 229, 1)
            );

        color: #ffffff;

    }


    .sidebar-link:active {

        transform: translateX(1px) scale(.99);

    }


    @media (max-width: 1023px) {

        .sidebar-link {

            min-height: 52px;

        }

    }


    /* =========================================================
       CUSTOM SCROLLBAR
       ========================================================= */

    aside nav::-webkit-scrollbar {

        width: 5px;

    }


    aside nav::-webkit-scrollbar-track {

        background: transparent;

    }


    aside nav::-webkit-scrollbar-thumb {

        background: rgba(148, 163, 184, .25);

        border-radius: 999px;

    }


    aside nav::-webkit-scrollbar-thumb:hover {

        background: rgba(148, 163, 184, .45);

    }

</style>

</div>

</body>

</html>