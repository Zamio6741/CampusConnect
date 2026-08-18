<section>

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <header>

        <h2 class="text-lg sm:text-xl font-bold text-slate-800">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-slate-500 leading-relaxed">
            {{ __("Update your account's profile information and email address.") }}
        </p>

    </header>


    {{-- ========================================================= --}}
    {{-- EMAIL VERIFICATION FORM --}}
    {{-- ========================================================= --}}

    <form
        id="send-verification"
        method="post"
        action="{{ route('verification.send') }}"
    >
        @csrf
    </form>


    {{-- ========================================================= --}}
    {{-- PROFILE UPDATE FORM --}}
    {{-- ========================================================= --}}

    <form
        method="post"
        action="{{ route('profile.update') }}"
        class="mt-6 space-y-6"
    >

        @csrf
        @method('patch')


        {{-- ===================================================== --}}
        {{-- NAME --}}
        {{-- ===================================================== --}}

        <div>

            <x-input-label
                for="name"
                :value="__('Name')"
                class="font-semibold text-slate-700"
            />

            <x-text-input
                id="name"
                name="name"
                type="text"
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
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')"
            />

        </div>


        {{-- ===================================================== --}}
        {{-- EMAIL --}}
        {{-- ===================================================== --}}

        <div>

            <x-input-label
                for="email"
                :value="__('Email')"
                class="font-semibold text-slate-700"
            />

            <x-text-input
                id="email"
                name="email"
                type="email"
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
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')"
            />


            {{-- ================================================= --}}
            {{-- EMAIL VERIFICATION --}}
            {{-- ================================================= --}}

            @if (
                $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail
                && ! $user->hasVerifiedEmail()
            )

                <div
                    class="mt-4
                           rounded-xl
                           border-2 border-amber-200
                           bg-amber-50
                           p-4"
                >

                    <div class="flex items-start gap-3">

                        <div
                            class="w-9 h-9
                                   rounded-lg
                                   bg-amber-100
                                   border border-amber-200
                                   flex items-center justify-center
                                   shrink-0"
                        >
                            ⚠️
                        </div>


                        <div class="min-w-0">

                            <p class="text-sm text-amber-800 leading-relaxed">

                                {{ __('Your email address is unverified.') }}

                            </p>


                            <button
                                form="send-verification"
                                class="mt-2
                                       text-sm
                                       font-semibold
                                       text-blue-600
                                       hover:text-blue-800
                                       underline
                                       underline-offset-2
                                       rounded-md
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-blue-500
                                       focus:ring-offset-2
                                       transition"
                            >

                                {{ __('Click here to re-send the verification email.') }}

                            </button>


                            @if (session('status') === 'verification-link-sent')

                                <p
                                    class="mt-3
                                           rounded-lg
                                           border
                                           border-green-200
                                           bg-green-50
                                           px-3 py-2
                                           font-medium
                                           text-sm
                                           text-green-700"
                                >

                                    ✓
                                    {{ __('A new verification link has been sent to your email address.') }}

                                </p>

                            @endif

                        </div>

                    </div>

                </div>

            @endif

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

            @if (session('status') === 'profile-updated')

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