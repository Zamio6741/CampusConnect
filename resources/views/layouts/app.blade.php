<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <meta
        name="theme-color"
        content="#0284c7"
    >

    <title>
        {{ config('app.name', 'CampusConnect') }}
    </title>


    <!-- =========================================================
         FONTS
    ========================================================== -->

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap"
        rel="stylesheet"
    >


    <!-- =========================================================
         VITE
    ========================================================== -->

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])


    <!-- =========================================================
         MOBILE / RESPONSIVE STYLES
    ========================================================== -->

    <style>

        /*
        |--------------------------------------------------------------------------
        | Global Mobile Improvements
        |--------------------------------------------------------------------------
        */

        html {
            width: 100%;
            min-height: 100%;
            overflow-x: hidden;
        }

        body {
            width: 100%;
            min-height: 100vh;
            overflow-x: hidden;
            -webkit-text-size-adjust: 100%;
            text-rendering: optimizeLegibility;
        }

        /*
        |--------------------------------------------------------------------------
        | Prevent Long Content From Breaking Mobile Layouts
        |--------------------------------------------------------------------------
        */

        img,
        video,
        iframe {
            max-width: 100%;
            height: auto;
        }

        /*
        |--------------------------------------------------------------------------
        | Tables
        |--------------------------------------------------------------------------
        */

        .mobile-table-wrapper {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            max-width: 100%;
        }

        /*
        |--------------------------------------------------------------------------
        | Forms
        |--------------------------------------------------------------------------
        */

        input,
        textarea,
        select,
        button {
            max-width: 100%;
        }

        /*
        |--------------------------------------------------------------------------
        | Mobile Touch Improvements
        |--------------------------------------------------------------------------
        */

        button,
        a,
        input,
        select,
        textarea {
            -webkit-tap-highlight-color: transparent;
        }

        /*
        |--------------------------------------------------------------------------
        | Small Screens
        |--------------------------------------------------------------------------
        */

        @media (max-width: 640px) {

            /*
            | Reduce excessive horizontal spacing
            */

            .mobile-container {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            /*
            | Make large headings fit smaller screens
            */

            h1 {
                overflow-wrap: anywhere;
            }

            h2 {
                overflow-wrap: anywhere;
            }

            h3 {
                overflow-wrap: anywhere;
            }

            /*
            | Prevent fixed-width elements from creating
            | horizontal scrolling.
            */

            .w-screen {
                max-width: 100vw;
            }

        }

    </style>

</head>


<body class="font-sans antialiased bg-gray-100 text-gray-900">

    <!-- =========================================================
         APPLICATION WRAPPER
    ========================================================== -->

    <div class="min-h-screen w-full overflow-x-hidden">


        <!-- =====================================================
             NAVIGATION
        ====================================================== -->

        @include('layouts.navigation')


        <!-- =====================================================
             OPTIONAL PAGE HEADER
        ====================================================== -->

        @isset($header)

            <header
                class="bg-white shadow-sm border-b border-gray-200"
            >

                <div
                    class="w-full max-w-7xl mx-auto
                           py-4 sm:py-6
                           px-4 sm:px-6 lg:px-8"
                >

                    {{ $header }}

                </div>

            </header>

        @endisset


        <!-- =====================================================
             MAIN CONTENT
        ====================================================== -->

        <main class="w-full min-w-0 overflow-x-hidden">

            {{ $slot }}

        </main>


    </div>


    <!-- =========================================================
         OPTIONAL STACKED SCRIPTS
    ========================================================== -->

    @stack('scripts')

</body>

</html>