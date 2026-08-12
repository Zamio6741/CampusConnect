<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CampusConnect') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            min-height: 100%;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: #f8fafc;
        }

        .auth-page {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 10% 20%, rgba(37, 99, 235, .10), transparent 30%),
                radial-gradient(circle at 90% 80%, rgba(14, 165, 233, .12), transparent 30%),
                linear-gradient(135deg, #f8fbff 0%, #eff6ff 50%, #f8fafc 100%);
        }

        .auth-grid {
            position: absolute;
            inset: 0;
            opacity: .35;
            background-image:
                linear-gradient(rgba(37, 99, 235, .06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(37, 99, 235, .06) 1px, transparent 1px);
            background-size: 50px 50px;
            mask-image: linear-gradient(to bottom, black, transparent);
        }

        .auth-orb {
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
            filter: blur(2px);
        }

        .orb-one {
            width: 420px;
            height: 420px;
            top: -180px;
            left: -120px;
            background: rgba(37, 99, 235, .08);
            animation: floatOne 10s ease-in-out infinite;
        }

        .orb-two {
            width: 360px;
            height: 360px;
            right: -130px;
            bottom: -120px;
            background: rgba(14, 165, 233, .10);
            animation: floatTwo 12s ease-in-out infinite;
        }

        .orb-three {
            width: 180px;
            height: 180px;
            right: 20%;
            top: 8%;
            background: rgba(59, 130, 246, .06);
            animation: floatThree 8s ease-in-out infinite;
        }

        @keyframes floatOne {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(40px, 25px); }
        }

        @keyframes floatTwo {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(-35px, -30px); }
        }

        @keyframes floatThree {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(25px); }
        }

        .auth-wrapper {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .auth-container {
            width: 100%;
            max-width: 1080px;
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            background: rgba(255, 255, 255, .82);
            border: 1px solid rgba(255, 255, 255, .8);
            border-radius: 32px;
            overflow: hidden;
            box-shadow:
                0 30px 80px rgba(15, 23, 42, .12),
                0 10px 30px rgba(37, 99, 235, .08);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            animation: cardEnter .8s cubic-bezier(.16, 1, .3, 1);
        }

        @keyframes cardEnter {
            from {
                opacity: 0;
                transform: translateY(30px) scale(.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .auth-brand {
            position: relative;
            overflow: hidden;
            padding: 55px 45px;
            color: white;
            background:
                radial-gradient(circle at 80% 20%, rgba(96, 165, 250, .35), transparent 30%),
                radial-gradient(circle at 20% 90%, rgba(14, 165, 233, .25), transparent 30%),
                linear-gradient(145deg, #0f172a, #172554 55%, #1d4ed8);
        }

        .auth-brand::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border: 1px solid rgba(255, 255, 255, .10);
            border-radius: 50%;
            right: -120px;
            top: -90px;
        }

        .auth-brand::after {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border: 1px solid rgba(255, 255, 255, .07);
            border-radius: 50%;
            left: -200px;
            bottom: -180px;
        }

        .brand-content {
            position: relative;
            z-index: 2;
        }

        .brand-logo {
            width: 64px;
            height: 64px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            box-shadow: 0 15px 35px rgba(37, 99, 235, .35);
            animation: logoFloat 4s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-8px) rotate(2deg);
            }
        }

        .brand-name {
            margin-top: 25px;
            font-size: 34px;
            font-weight: 900;
            letter-spacing: -1.5px;
        }

        .brand-name span {
            color: #60a5fa;
        }

        .brand-tagline {
            margin-top: 8px;
            color: #bfdbfe;
            font-size: 15px;
        }

        .brand-heading {
            margin-top: 70px;
            font-size: 38px;
            line-height: 1.1;
            font-weight: 900;
            letter-spacing: -1.5px;
        }

        .brand-heading span {
            color: #60a5fa;
        }

        .brand-description {
            margin-top: 20px;
            color: #cbd5e1;
            line-height: 1.8;
            font-size: 16px;
        }

        .brand-features {
            margin-top: 38px;
            display: grid;
            gap: 16px;
        }

        .brand-feature {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #e2e8f0;
            font-size: 14px;
        }

        .feature-check {
            width: 28px;
            height: 28px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(96, 165, 250, .15);
            color: #60a5fa;
            font-weight: 900;
        }

        .auth-form-section {
            padding: 50px 55px;
            background: rgba(255, 255, 255, .95);
        }

        .mobile-brand {
            display: none;
        }

        .auth-heading {
            font-size: 32px;
            font-weight: 900;
            letter-spacing: -1px;
            color: #0f172a;
        }

        .auth-subheading {
            margin-top: 8px;
            color: #64748b;
            font-size: 15px;
            line-height: 1.6;
        }

        .auth-form {
            margin-top: 32px;
        }

        .form-group {
            margin-top: 20px;
        }

        .form-group:first-child {
            margin-top: 0;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
            color: #334155;
        }

        .auth-input,
        .auth-select {
            width: 100%;
            height: 50px;
            padding: 0 15px;
            border: 1px solid #cbd5e1;
            border-radius: 13px;
            background: #f8fafc;
            color: #0f172a;
            font-size: 14px;
            outline: none;
            transition: all .25s ease;
        }

        .auth-input:hover,
        .auth-select:hover {
            border-color: #93c5fd;
            background: white;
        }

        .auth-input:focus,
        .auth-select:focus {
            border-color: #2563eb;
            background: white;
            box-shadow:
                0 0 0 4px rgba(37, 99, 235, .10),
                0 8px 20px rgba(37, 99, 235, .05);
            transform: translateY(-1px);
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .auth-input {
            padding-right: 50px;
        }

        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #64748b;
            cursor: pointer;
            font-size: 13px;
            font-weight: 700;
        }

        .password-toggle:hover {
            color: #2563eb;
        }

        .error-message {
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
            font-weight: 600;
        }

        .session-message {
            margin-bottom: 20px;
            padding: 12px 14px;
            border-radius: 12px;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 13px;
            font-weight: 600;
        }

        .auth-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-top: 20px;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
            font-size: 13px;
            cursor: pointer;
        }

        .remember-label input {
            width: 16px;
            height: 16px;
            accent-color: #2563eb;
        }

        .auth-link {
            color: #2563eb;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .auth-button {
            width: 100%;
            height: 52px;
            margin-top: 25px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 12px 25px rgba(37, 99, 235, .22);
            transition: all .25s ease;
        }

        .auth-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 32px rgba(37, 99, 235, .30);
        }

        .auth-footer {
            margin-top: 25px;
            padding-top: 22px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }

        .auth-footer a {
            color: #2563eb;
            font-weight: 800;
            text-decoration: none;
        }

        .security-note {
            margin-top: 18px;
            text-align: center;
            color: #94a3b8;
            font-size: 11px;
        }

        .form-content {
            animation: formEnter .7s ease .15s both;
        }

        @keyframes formEnter {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @media (max-width: 900px) {
            .auth-container {
                max-width: 600px;
                grid-template-columns: 1fr;
            }

            .auth-brand {
                display: none;
            }

            .mobile-brand {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 12px;
                margin-bottom: 28px;
            }

            .mobile-brand-logo {
                width: 46px;
                height: 46px;
                border-radius: 14px;
                background: #2563eb;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .mobile-brand-name {
                font-size: 24px;
                font-weight: 900;
                color: #0f172a;
            }

            .mobile-brand-name span {
                color: #2563eb;
            }

            .auth-form-section {
                padding: 40px 35px;
            }
        }

        @media (max-width: 500px) {
            .auth-wrapper {
                padding: 20px 12px;
            }

            .auth-container {
                border-radius: 24px;
            }

            .auth-form-section {
                padding: 30px 22px;
            }

            .auth-heading {
                font-size: 27px;
            }

            .auth-row {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="auth-page">

    <div class="auth-grid"></div>

    <div class="auth-orb orb-one"></div>
    <div class="auth-orb orb-two"></div>
    <div class="auth-orb orb-three"></div>

    <div class="auth-wrapper">

        <div class="auth-container">

            <div class="auth-brand">

                <div class="brand-content">

                    <div class="brand-logo">
                        <svg width="34" height="34"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="white"
                             stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M22 10 12 5 2 10l10 5 10-5Z"/>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                            <path d="M22 10v6"/>
                        </svg>
                    </div>

                    <div class="brand-name">
                        Campus<span>Connect</span>
                    </div>

                    <div class="brand-tagline">
                        Kenya's Smart Student Platform
                    </div>

                    <h2 class="brand-heading">
                        Your Campus.<br>
                        <span>Connected.</span>
                    </h2>

                    <p class="brand-description">
                        Everything a university student needs, brought
                        together in one modern platform.
                    </p>

                    <div class="brand-features">

                        <div class="brand-feature">
                            <div class="feature-check">✓</div>
                            <span>Academic resources & past papers</span>
                        </div>

                        <div class="brand-feature">
                            <div class="feature-check">✓</div>
                            <span>Accommodation & student services</span>
                        </div>

                        <div class="brand-feature">
                            <div class="feature-check">✓</div>
                            <span>Student marketplace & businesses</span>
                        </div>

                        <div class="brand-feature">
                            <div class="feature-check">✓</div>
                            <span>Announcements & campus community</span>
                        </div>

                    </div>

                </div>

            </div>

            <div class="auth-form-section">

                <div class="form-content">

                    <div class="mobile-brand">

                        <div class="mobile-brand-logo">
                            <svg width="25" height="25"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="white"
                                 stroke-width="2"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M22 10 12 5 2 10l10 5 10-5Z"/>
                                <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                            </svg>
                        </div>

                        <div class="mobile-brand-name">
                            Campus<span>Connect</span>
                        </div>

                    </div>

                    {{ $slot }}

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    function togglePassword(button, inputId) {
        const input = document.getElementById(inputId);

        if (!input) return;

        if (input.type === 'password') {
            input.type = 'text';
            button.textContent = 'Hide';
        } else {
            input.type = 'password';
            button.textContent = 'Show';
        }
    }
</script>

</body>
</html>