<section>

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <header>

        <h2 class="text-lg sm:text-xl font-bold text-slate-800">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-slate-500 leading-relaxed">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>

    </header>


    {{-- ========================================================= --}}
    {{-- PASSWORD UPDATE FORM --}}
    {{-- ========================================================= --}}

    <form
        method="post"
        action="{{ route('password.update') }}"
        class="mt-6 space-y-6"
    >

        @csrf
        @method('put')


        {{-- ===================================================== --}}
        {{-- CURRENT PASSWORD --}}
        {{-- ===================================================== --}}

        <div>

            <x-input-label
                for="update_password_current_password"
                :value="__('Current Password')"
                class="font-semibold text-slate-700"
            />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-2 block w-full
                       !border-2
                       !border-slate-300
                       rounded-xl
                       bg-white
                       px-4 py-3
                       text-slate-800
                       shadow-sm
                       focus:!border-blue-500
                       focus:ring-4
                       focus:ring-blue-500/10
                       hover:!border-slate-400
                       transition-all duration-200"
                autocomplete="current-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2"
            />

        </div>


        {{-- ===================================================== --}}
        {{-- NEW PASSWORD --}}
        {{-- ===================================================== --}}

        <div>

            <x-input-label
                for="update_password_password"
                :value="__('New Password')"
                class="font-semibold text-slate-700"
            />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-2 block w-full
                       !border-2
                       !border-slate-300
                       rounded-xl
                       bg-white
                       px-4 py-3
                       text-slate-800
                       shadow-sm
                       focus:!border-blue-500
                       focus:ring-4
                       focus:ring-blue-500/10
                       hover:!border-slate-400
                       transition-all duration-200"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2"
            />

        </div>


        {{-- ===================================================== --}}
        {{-- CONFIRM PASSWORD --}}
        {{-- ===================================================== --}}

        <div>

            <x-input-label
                for="update_password_password_confirmation"
                :value="__('Confirm Password')"
                class="font-semibold text-slate-700"
            />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-2 block w-full
                       !border-2
                       !border-slate-300
                       rounded-xl
                       bg-white
                       px-4 py-3
                       text-slate-800
                       shadow-sm
                       focus:!border-blue-500
                       focus:ring-4
                       focus:ring-blue-500/10
                       hover:!border-slate-400
                       transition-all duration-200"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2"
            />

        </div>


        {{-- ===================================================== --}}
        {{-- SAVE BUTTON --}}
        {{-- ===================================================== --}}

        <div
            class="flex flex-col sm:flex-row
                   sm:items-center
                   gap-3
                   pt-2"
        >

            <x-primary-button
                class="w-full sm:w-auto
                       justify-center
                       rounded-xl
                       px-6 py-3
                       bg-blue-600
                       hover:bg-blue-700
                       focus:ring-4
                       focus:ring-blue-500/20
                       shadow-md
                       transition-all duration-200"
            >
                {{ __('Save') }}
            </x-primary-button>


            {{-- ================================================= --}}
            {{-- SAVED MESSAGE --}}
            {{-- ================================================= --}}

            @if (session('status') === 'password-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm
                           font-medium
                           text-green-600
                           flex items-center gap-2"
                >

                    <span
                        class="w-6 h-6
                               rounded-full
                               bg-green-100
                               border border-green-200
                               flex items-center justify-center"
                    >
                        ✓
                    </span>

                    {{ __('Saved.') }}

                </p>

            @endif

        </div>

    </form>

</section>