<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />

            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name" />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Register As -->

        <div class="mt-4">

            <x-input-label for="role_id" :value="__('Register As')" />

            <select
                id="role_id"
                name="role_id"
                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                required>

                <option value="">Choose Account Type</option>

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

            <x-input-error :messages="$errors->get('role_id')" class="mt-2" />

        </div>

        <!-- University -->

        <div class="mt-4">

            <x-input-label for="university_id" :value="__('University')" />

            <select
                id="university_id"
                name="university_id"
                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                required>

                <option value="">Select your University</option>

                @foreach($universities as $university)

                    <option
                        value="{{ $university->id }}"
                        {{ old('university_id') == $university->id ? 'selected' : '' }}>

                        {{ $university->name }}

                    </option>

                @endforeach

            </select>

            <x-input-error :messages="$errors->get('university_id')" class="mt-2" />

        </div>

        <!-- Email -->

        <div class="mt-4">

            <x-input-label for="email" :value="__('Email Address')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />

        </div>

        <!-- Password -->

        <div class="mt-4">

            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

        </div>

        <!-- Confirm Password -->

        <div class="mt-4">

            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

        </div>

        <div class="flex items-center justify-between mt-6">

            <a
                class="underline text-sm text-gray-600 hover:text-gray-900"
                href="{{ route('login') }}">

                Already registered?

            </a>

            <x-primary-button>
                Register
            </x-primary-button>

        </div>

    </form>
</x-guest-layout>