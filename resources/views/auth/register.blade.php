<x-guest-layout>

    <div class="auth-heading">
        Join CampusConnect 🚀
    </div>

    <p class="auth-subheading">
        Create your account and connect with your university community.
    </p>

    <form
        method="POST"
        action="{{ route('register') }}"
        class="auth-form">

        @csrf

        <!-- FULL NAME -->

        <div class="form-group">

            <label
                for="name"
                class="form-label">

                Full Name

            </label>

            <input
                id="name"
                class="auth-input"
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter your full name"
                required
                autofocus
                autocomplete="name">

            @if($errors->get('name'))

                <div class="error-message">
                    {{ $errors->first('name') }}
                </div>

            @endif

        </div>

        <!-- ACCOUNT TYPE -->

        <div class="form-group">

            <label
                for="role_id"
                class="form-label">

                Register As

            </label>

            <select
                id="role_id"
                name="role_id"
                class="auth-select"
                required>

                <option value="">
                    Choose Account Type
                </option>

                @foreach($roles as $role)

                    @if($role->name !== 'Admin')

                        <option
                            value="{{ $role->id }}"
                            {{ old('role_id') == $role->id ? 'selected' : '' }}>

                            {{ $role->name }}

                        </option>

                    @endif

                @endforeach

            </select>

            @if($errors->get('role_id'))

                <div class="error-message">
                    {{ $errors->first('role_id') }}
                </div>

            @endif

        </div>

        <!-- UNIVERSITY -->

        <div class="form-group">

            <label
                for="university_id"
                class="form-label">

                University

            </label>

            <select
                id="university_id"
                name="university_id"
                class="auth-select"
                required>

                <option value="">
                    Select your University
                </option>

                @foreach($universities as $university)

                    <option
                        value="{{ $university->id }}"
                        {{ old('university_id') == $university->id ? 'selected' : '' }}>

                        {{ $university->name }}

                    </option>

                @endforeach

            </select>

            @if($errors->get('university_id'))

                <div class="error-message">
                    {{ $errors->first('university_id') }}
                </div>

            @endif

        </div>

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
                    placeholder="Create a strong password"
                    required
                    autocomplete="new-password">

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

        <!-- CONFIRM PASSWORD -->

        <div class="form-group">

            <label
                for="password_confirmation"
                class="form-label">

                Confirm Password

            </label>

            <div class="password-wrapper">

                <input
                    id="password_confirmation"
                    class="auth-input"
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirm your password"
                    required
                    autocomplete="new-password">

                <button
                    type="button"
                    class="password-toggle"
                    onclick="togglePassword(this, 'password_confirmation')">

                    Show

                </button>

            </div>

            @if($errors->get('password_confirmation'))

                <div class="error-message">
                    {{ $errors->first('password_confirmation') }}
                </div>

            @endif

        </div>

        <!-- REGISTER -->

        <button
            type="submit"
            class="auth-button">

            Create My Account →

        </button>

    </form>

    <!-- FOOTER -->

    <div class="auth-footer">

        Already have an account?

        <a href="{{ route('login') }}">
            Sign in
        </a>

    </div>

    <div class="security-note">
        🔒 Your information is securely protected.
    </div>

</div>

</x-guest-layout>