<x-guest-layout>


    <div class="auth-heading">
        Welcome back 👋
    </div>

    <p class="auth-subheading">
        Sign in to continue to your CampusConnect experience.
    </p>

    <x-auth-session-status
        class="session-message"
        :status="session('status')" />

    <form
        method="POST"
        action="{{ route('login') }}"
        class="auth-form">

        @csrf

        <!-- EMAIL -->

        <div class="form-group">

            <label
                for="email"
                class="form-label">

                Email Address

            </label>

            <input
                id="email"
                class="auth-input"
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email address"
                required
                autofocus
                autocomplete="username">

            @if($errors->get('email'))

                <div class="error-message">
                    {{ $errors->first('email') }}
                </div>

            @endif

        </div>

        <!-- PASSWORD -->

        <div class="form-group">

            <label
                for="password"
                class="form-label">

                Password

            </label>

            <div class="password-wrapper">

                <input
                    id="password"
                    class="auth-input"
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password">

                <button
                    type="button"
                    class="password-toggle"
                    onclick="togglePassword(this, 'password')">

                    Show

                </button>

            </div>

            @if($errors->get('password'))

                <div class="error-message">
                    {{ $errors->first('password') }}
                </div>

            @endif

        </div>

        <!-- REMEMBER / FORGOT -->

        <div class="auth-row">

            <label
                for="remember_me"
                class="remember-label">

                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember">

                <span>
                    Remember me
                </span>

            </label>

            @if (Route::has('password.request'))

                <a
                    href="{{ route('password.request') }}"
                    class="auth-link">

                    Forgot password?

                </a>

            @endif

        </div>

        <!-- BUTTON -->

        <button
            type="submit"
            class="auth-button">

            Sign In →

        </button>

    </form>

    <!-- FOOTER -->

    <div class="auth-footer">

        Don't have an account?

        <a href="{{ route('register') }}">
            Create one
        </a>

    </div>

    <div class="security-note">
        🔒 Your account information is securely protected.
    </div>


</x-guest-layout>