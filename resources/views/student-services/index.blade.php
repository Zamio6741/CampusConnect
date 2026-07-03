<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-100 via-sky-200 to-blue-100 py-10">

    <div class="max-w-5xl mx-auto px-6">

        <h1 class="text-5xl font-bold text-blue-700 mb-3">
            🎓 Student Services
        </h1>

        <p class="text-gray-600 mb-10">
            Need help with university services? Submit a request and we'll contact you.
        </p>

        @if(session('success'))

            <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-xl mb-8">
                {{ session('success') }}
            </div>

        @endif

        <div class="grid md:grid-cols-2 gap-8">

            <div class="bg-white rounded-3xl shadow-xl p-8">

                <h2 class="text-2xl font-bold text-blue-600 mb-6">
                    Available Services
                </h2>

                <ul class="space-y-4 text-lg">

                    <li>💰 HELB First-Time Application</li>
                    <li>💰 HELB Subsequent Loan</li>
                    <li>💰 HELB Appeals</li>
                    <li>📘 Unit Registration</li>
                    <li>📘 Unit Amendment</li>
                    <li>🖨 Student Portal Assistance</li>
                    <li>📄 Admission & Academic Documents</li>

                </ul>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-8">

                <h2 class="text-2xl font-bold text-blue-600 mb-6">
                    Request a Service
                </h2>

                <form action="{{ route('student-services.store') }}" method="POST">

                    @csrf

                    <label class="font-semibold">
                        Service
                    </label>

                    <select
                        name="service"
                        class="w-full border rounded-xl p-3 mt-2 mb-5">

                        <option>HELB First-Time Application</option>
                        <option>HELB Subsequent Loan</option>
                        <option>HELB Appeal</option>
                        <option>Unit Registration</option>
                        <option>Unit Amendment</option>
                        <option>Student Portal Assistance</option>

                    </select>

                    <label class="font-semibold">
                        Phone Number
                    </label>

                    <input
                        type="text"
                        name="phone"
                        class="w-full border rounded-xl p-3 mt-2 mb-5">

                    <label class="font-semibold">
                       Additional Information
                    </label>

                    <textarea
                        name="notes"
                        rows="4"
                        class="w-full border rounded-xl p-3 mt-2"></textarea>

                    <button
                        class="mt-8 w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-2xl font-bold">

                        Submit Request

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>