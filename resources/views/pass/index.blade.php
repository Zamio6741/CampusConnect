<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-12">

    <div class="max-w-4xl mx-auto">

        @if(session('success'))

            <div class="bg-green-500 text-white rounded-2xl p-5 mb-8 shadow-lg">

                {{ session('success') }}

            </div>

        @endif

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <div class="bg-gradient-to-r from-orange-600 to-amber-500 p-10 text-white text-center">

                <h1 class="text-5xl font-extrabold">

                    🎫 Accommodation Pass

                </h1>

                <p class="mt-4 text-orange-100 text-lg">

                    Unlock landlord contacts and WhatsApp numbers for 30 days.

                </p>

            </div>

            <div class="p-10">

                @if($pass && $pass->status == 'paid' && $pass->expires_at > now())

                    <div class="bg-green-100 border border-green-300 rounded-2xl p-8">

                        <h2 class="text-3xl font-bold text-green-700">

                            ✅ Pass Active

                        </h2>

                        <div class="mt-6 space-y-3">

                            <p>

                                <strong>Status:</strong>

                                Active

                            </p>

                            <p>

                                <strong>Amount Paid:</strong>

                                KES {{ number_format($pass->amount) }}

                            </p>

                            <p>

                                <strong>Expires:</strong>

                                {{ $pass->expires_at->format('d M Y') }}

                            </p>

                            <p>

                                <strong>Days Remaining:</strong>

                                {{ $daysRemaining }}

                            </p>

                        </div>

                    </div>

                @else

                    <div class="text-center">

                        <div class="text-7xl">

                            🔓

                        </div>

                        <h2 class="text-4xl font-bold mt-6">

                            Unlock Contacts

                        </h2>

                        <p class="text-gray-600 mt-4">

                            View landlord phone numbers, WhatsApp, and reserve accommodation instantly.

                        </p>

                        <div class="mt-10 bg-orange-50 rounded-3xl p-8">

                            <h3 class="text-5xl font-extrabold text-orange-600">

                                KES 199

                            </h3>

                            <p class="mt-3 text-gray-600">

                                Valid for 30 Days

                            </p>

                            <ul class="mt-8 text-left max-w-md mx-auto space-y-3">

                                <li>✅ Unlimited landlord contacts</li>

                                <li>✅ Unlimited WhatsApp access</li>

                                <li>✅ Unlimited accommodation viewing</li>

                                <li>✅ Verified accommodation only</li>

                                <li>✅ Priority support</li>

                            </ul>

                            <form

                                action="{{ route('pass.buy') }}"

                                method="POST"

                                class="mt-10">

                                @csrf

                                <button

                                    class="bg-orange-600 hover:bg-orange-700 text-white px-10 py-4 rounded-2xl text-xl font-bold">

                                    Buy Accommodation Pass

                                </button>

                            </form>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>

</x-app-layout>