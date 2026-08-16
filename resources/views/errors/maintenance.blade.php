<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CampusConnect — Maintenance</title>

    @php
        $maintenanceEndAt = \App\Models\Setting::get('maintenance_end_at');
    @endphp

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --navy: #0f172a;
            --blue: #2563eb;
            --blue-light: #3b82f6;
            --sky: #e0f2fe;
            --slate: #64748b;
            --slate-light: #94a3b8;
            --border: #e2e8f0;
            --orange: #f97316;
            --orange-light: #fff7ed;
        }

        html,
        body {
            min-height: 100%;
        }

        body {
            min-height: 100vh;

            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            color: var(--navy);

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px;

            overflow-x: hidden;

            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(59, 130, 246, 0.12),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(14, 165, 233, 0.12),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #f8fafc 0%,
                    #eff6ff 50%,
                    #f8fafc 100%
                );
        }

        /* =====================================================
           BACKGROUND SHAPES
        ====================================================== */

        .background-shape {
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(2px);
            opacity: 0.6;
        }

        .shape-one {
            width: 280px;
            height: 280px;
            top: -120px;
            left: -100px;
            background: rgba(37, 99, 235, 0.08);
        }

        .shape-two {
            width: 360px;
            height: 360px;
            right: -160px;
            bottom: -150px;
            background: rgba(14, 165, 233, 0.08);
        }

        /* =====================================================
           MAIN CARD
        ====================================================== */

        .maintenance-card {
            position: relative;

            width: 100%;
            max-width: 680px;

            background: rgba(255, 255, 255, 0.96);

            border: 1px solid rgba(226, 232, 240, 0.9);

            border-radius: 30px;

            padding: 54px 54px 42px;

            text-align: center;

            box-shadow:
                0 30px 80px rgba(15, 23, 42, 0.10),
                0 8px 25px rgba(37, 99, 235, 0.05);

            backdrop-filter: blur(12px);

            animation: cardEnter 0.7s ease-out;
        }

        @keyframes cardEnter {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =====================================================
           LOGO
        ====================================================== */

        .logo-wrapper {
            position: relative;

            width: 92px;
            height: 92px;

            margin: 0 auto 22px;
        }

        .logo-glow {
            position: absolute;

            inset: -10px;

            border-radius: 28px;

            background: rgba(37, 99, 235, 0.12);

            filter: blur(12px);
        }

        .logo {
            position: relative;

            width: 92px;
            height: 92px;

            border-radius: 26px;

            background:
                linear-gradient(
                    145deg,
                    #172554,
                    #0f172a
                );

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 44px;

            box-shadow:
                0 15px 30px rgba(15, 23, 42, 0.18),
                inset 0 1px 0 rgba(255, 255, 255, 0.08);

            animation: logoFloat 4s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        /* =====================================================
           BRAND
        ====================================================== */

        .brand {
            font-size: 31px;

            font-weight: 850;

            letter-spacing: -1px;

            color: var(--navy);

            margin-bottom: 25px;
        }

        .brand span {
            color: var(--blue);
        }

        /* =====================================================
           STATUS
        ====================================================== */

        .status {
            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding: 9px 15px;

            border: 1px solid #fed7aa;

            border-radius: 999px;

            background: var(--orange-light);

            color: #c2410c;

            font-size: 13px;

            font-weight: 750;

            margin-bottom: 24px;
        }

        .status-dot {
            position: relative;

            width: 8px;
            height: 8px;

            background: var(--orange);

            border-radius: 50%;
        }

        .status-dot::after {
            content: "";

            position: absolute;

            inset: -4px;

            border-radius: 50%;

            border: 1px solid rgba(249, 115, 22, 0.35);

            animation: pulse 1.8s ease-out infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.7);
                opacity: 0.9;
            }

            100% {
                transform: scale(1.8);
                opacity: 0;
            }
        }

        /* =====================================================
           HEADING
        ====================================================== */

        h1 {
            font-size: 44px;

            line-height: 1.08;

            letter-spacing: -1.8px;

            font-weight: 850;

            margin-bottom: 18px;
        }

        .description {
            max-width: 510px;

            margin: 0 auto 32px;

            color: var(--slate);

            font-size: 16px;

            line-height: 1.75;
        }

        /* =====================================================
           INFORMATION PANEL
        ====================================================== */

        .info {
            position: relative;

            display: flex;

            align-items: center;

            gap: 16px;

            text-align: left;

            padding: 19px 20px;

            border: 1px solid var(--border);

            border-radius: 18px;

            background:
                linear-gradient(
                    135deg,
                    #f8fafc,
                    #f1f5f9
                );

            color: #475569;

            font-size: 14px;

            line-height: 1.65;

            margin-bottom: 28px;
        }

        .info-icon {
            flex: 0 0 44px;

            width: 44px;
            height: 44px;

            border-radius: 13px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #dbeafe;

            color: var(--blue);

            font-size: 21px;
        }

        .info strong {
            display: block;

            color: var(--navy);

            font-size: 14px;

            margin-bottom: 2px;
        }

        /* =====================================================
           COUNTDOWN
        ====================================================== */

        .countdown-section {
            margin: 8px 0 30px;
        }

        .countdown-heading {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            color: #64748b;

            font-size: 12px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 0.9px;

            margin-bottom: 14px;
        }

        .countdown-icon {
            color: var(--blue);

            font-size: 16px;
        }

        .countdown {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 10px;
        }

        .countdown-box {
            min-width: 0;

            padding: 16px 8px 13px;

            border: 1px solid var(--border);

            border-radius: 16px;

            background:
                linear-gradient(
                    145deg,
                    #ffffff,
                    #f8fafc
                );

            box-shadow:
                0 5px 15px rgba(15, 23, 42, 0.04);
        }

        .countdown-number {
            display: block;

            color: var(--blue);

            font-size: 30px;

            line-height: 1;

            font-weight: 850;

            letter-spacing: -1px;

            font-variant-numeric: tabular-nums;
        }

        .countdown-label {
            display: block;

            margin-top: 7px;

            color: #64748b;

            font-size: 12px;

            font-weight: 600;
        }

        /* =====================================================
           EXPECTED DATE
        ====================================================== */

        .expected-date {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            margin-top: 15px;

            color: #64748b;

            font-size: 13px;

            font-weight: 650;
        }

        .calendar-icon {
            color: var(--blue);

            font-size: 16px;
        }

        /* =====================================================
           EXPIRED STATE
        ====================================================== */

        .maintenance-ended {
            display: none;

            margin-top: 12px;

            padding: 15px;

            border: 1px solid #bfdbfe;

            border-radius: 16px;

            background: #eff6ff;

            color: #1d4ed8;

            font-size: 14px;

            font-weight: 700;
        }

        /* =====================================================
           FOOTER
        ====================================================== */

        .footer {
            padding-top: 25px;

            border-top: 1px solid #eef2f7;

            color: var(--slate-light);

            font-size: 12px;

            line-height: 1.6;
        }

        .footer-brand {
            color: #64748b;

            font-weight: 700;
        }

        /* =====================================================
           MOBILE
        ====================================================== */

        @media (max-width: 700px) {

            body {
                padding: 18px;
            }

            .maintenance-card {
                padding: 42px 25px 34px;

                border-radius: 24px;
            }

            .logo-wrapper,
            .logo {
                width: 78px;
                height: 78px;
            }

            .logo {
                border-radius: 22px;

                font-size: 37px;
            }

            .brand {
                font-size: 27px;
            }

            h1 {
                font-size: 34px;

                letter-spacing: -1.2px;
            }

            .description {
                font-size: 15px;
            }

            .info {
                align-items: flex-start;

                padding: 16px;
            }

            .countdown {
                gap: 7px;
            }

            .countdown-box {
                padding: 14px 5px 12px;
            }

            .countdown-number {
                font-size: 24px;
            }

            .countdown-label {
                font-size: 11px;
            }
        }

        @media (max-width: 430px) {

            body {
                padding: 12px;
            }

            .maintenance-card {
                padding: 35px 20px 30px;
            }

            h1 {
                font-size: 30px;
            }

            .brand {
                font-size: 25px;
            }

            .status {
                font-size: 12px;
            }

            .info {
                gap: 12px;

                font-size: 13px;
            }

            .info-icon {
                flex-basis: 38px;

                width: 38px;
                height: 38px;

                font-size: 18px;
            }

            .countdown {
                gap: 5px;
            }

            .countdown-box {
                border-radius: 12px;

                padding: 12px 3px 10px;
            }

            .countdown-number {
                font-size: 21px;
            }

            .countdown-label {
                font-size: 10px;
            }

            .expected-date {
                font-size: 12px;
            }
        }

        /* =====================================================
           ACCESSIBILITY
        ====================================================== */

        @media (prefers-reduced-motion: reduce) {

            *,

            *::before,

            *::after {
                animation-duration: 0.01ms !important;

                animation-iteration-count: 1 !important;
            }
        }
    </style>
</head>

<body>

    <div class="background-shape shape-one"></div>
    <div class="background-shape shape-two"></div>


    <main class="maintenance-card">

        <!-- =================================================
             LOGO
        ================================================== -->

        <div class="logo-wrapper">

            <div class="logo-glow"></div>

            <div class="logo">
                🎓
            </div>

        </div>


        <!-- =================================================
             BRAND
        ================================================== -->

        <div class="brand">
            Campus<span>Connect</span>
        </div>


        <!-- =================================================
             STATUS
        ================================================== -->

        <div class="status">

            <span class="status-dot"></span>

            Maintenance in progress

        </div>


        <!-- =================================================
             HEADING
        ================================================== -->

        <h1>
            We'll be back shortly.
        </h1>


        <p class="description">

            CampusConnect is temporarily unavailable while we work on
            improvements that will make your campus experience better,
            faster and more reliable.

        </p>


        <!-- =================================================
             INFORMATION
        ================================================== -->

        <div class="info">

            <div class="info-icon">
                🔧
            </div>

            <div>

                <strong>
                    We're improving CampusConnect
                </strong>

                Our team is working behind the scenes to make the
                platform better for students, businesses, landlords
                and the entire campus community.

            </div>

        </div>


        <!-- =================================================
             COUNTDOWN
        ================================================== -->

        <div class="countdown-section">

            <div class="countdown-heading">

                <span class="countdown-icon">
                    ◷
                </span>

                Expected to be back in

            </div>


            <div class="countdown">

                <div class="countdown-box">

                    <span
                        class="countdown-number"
                        id="days"
                    >
                        00
                    </span>

                    <span class="countdown-label">
                        Days
                    </span>

                </div>


                <div class="countdown-box">

                    <span
                        class="countdown-number"
                        id="hours"
                    >
                        00
                    </span>

                    <span class="countdown-label">
                        Hours
                    </span>

                </div>


                <div class="countdown-box">

                    <span
                        class="countdown-number"
                        id="minutes"
                    >
                        00
                    </span>

                    <span class="countdown-label">
                        Minutes
                    </span>

                </div>


                <div class="countdown-box">

                    <span
                        class="countdown-number"
                        id="seconds"
                    >
                        00
                    </span>

                    <span class="countdown-label">
                        Seconds
                    </span>

                </div>

            </div>


            <!-- Expected date -->

            @if($maintenanceEndAt)

                <div class="expected-date">

                    <span class="calendar-icon">
                        📅
                    </span>

                    <span>
                        Expected return:
                        {{ \Carbon\Carbon::parse($maintenanceEndAt)->timezone('Africa/Nairobi')->format('d M Y h:i A') }}
                    </span>

                </div>

            @endif


            <!-- Countdown expired -->

            <div
                id="maintenance-ended"
                class="maintenance-ended"
            >
                The scheduled maintenance window has ended.
                We are completing the final checks before returning CampusConnect online.
            </div>

        </div>


        <!-- =================================================
             FOOTER
        ================================================== -->

        <div class="footer">

            <span class="footer-brand">
                CampusConnect
            </span>

            &nbsp;•&nbsp;

            Built for the campus community

            <br><br>

            &copy; {{ date('Y') }}
            CampusConnect.
            All rights reserved.

        </div>

    </main>


    <!-- =====================================================
         COUNTDOWN SCRIPT
    ====================================================== -->

    <script>

        /*
|--------------------------------------------------------------------------
| Maintenance End Time
|--------------------------------------------------------------------------
|
| The value comes directly from the maintenance_end_at setting.
|
| Laravel converts the value into JSON before passing it to JavaScript.
|
*/

        const maintenanceEndAt = {!! json_encode($maintenanceEndAt) !!};


        /*
        |--------------------------------------------------------------------------
        | Countdown Elements
        |--------------------------------------------------------------------------
        */

        const daysElement =
            document.getElementById('days');

        const hoursElement =
            document.getElementById('hours');

        const minutesElement =
            document.getElementById('minutes');

        const secondsElement =
            document.getElementById('seconds');

        const endedElement =
            document.getElementById('maintenance-ended');


        /*
        |--------------------------------------------------------------------------
        | Format Number
        |--------------------------------------------------------------------------
        */

        function padNumber(number) {

            return String(number).padStart(2, '0');

        }


        /*
        |--------------------------------------------------------------------------
        | Update Countdown
        |--------------------------------------------------------------------------
        */

        function updateCountdown() {

            /*
            |--------------------------------------------------------------------------
            | No Maintenance End Time
            |--------------------------------------------------------------------------
            */

            if (!maintenanceEndAt) {

                daysElement.textContent = '--';
                hoursElement.textContent = '--';
                minutesElement.textContent = '--';
                secondsElement.textContent = '--';

                return;

            }


            /*
            |--------------------------------------------------------------------------
            | Convert Laravel Date To JavaScript Date
            |--------------------------------------------------------------------------
            */

            const endTime =
                new Date(
                    maintenanceEndAt.replace(' ', 'T')
                ).getTime();


            const now =
                new Date().getTime();


            let difference =
                endTime - now;


            /*
            |--------------------------------------------------------------------------
            | Maintenance Finished
            |--------------------------------------------------------------------------
            */

            if (difference <= 0) {

                daysElement.textContent = '00';
                hoursElement.textContent = '00';
                minutesElement.textContent = '00';
                secondsElement.textContent = '00';

                endedElement.style.display = 'block';

                return;

            }


            /*
            |--------------------------------------------------------------------------
            | Calculate Remaining Time
            |--------------------------------------------------------------------------
            */

            const days =
                Math.floor(
                    difference /
                    (1000 * 60 * 60 * 24)
                );


            difference -=
                days *
                (1000 * 60 * 60 * 24);


            const hours =
                Math.floor(
                    difference /
                    (1000 * 60 * 60)
                );


            difference -=
                hours *
                (1000 * 60 * 60);


            const minutes =
                Math.floor(
                    difference /
                    (1000 * 60)
                );


            difference -=
                minutes *
                (1000 * 60);


            const seconds =
                Math.floor(
                    difference /
                    1000
                );


            /*
            |--------------------------------------------------------------------------
            | Update UI
            |--------------------------------------------------------------------------
            */

            daysElement.textContent =
                padNumber(days);

            hoursElement.textContent =
                padNumber(hours);

            minutesElement.textContent =
                padNumber(minutes);

            secondsElement.textContent =
                padNumber(seconds);

        }


        /*
        |--------------------------------------------------------------------------
        | Start Countdown
        |--------------------------------------------------------------------------
        */

        updateCountdown();


        setInterval(
            updateCountdown,
            1000
        );

    </script>

</body>
</html>