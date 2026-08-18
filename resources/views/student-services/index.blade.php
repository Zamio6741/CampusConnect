<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-100 via-sky-200 to-blue-100 py-10">

    <div class="max-w-6xl mx-auto px-6">

        <!-- Header -->
        <div class="text-center mb-10">

            <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-600 text-white rounded-3xl shadow-xl text-4xl mb-5">
                🎓
            </div>

            <h1 class="text-5xl font-extrabold text-blue-700">
                Student Services
            </h1>

            <p class="text-gray-600 mt-4 text-lg max-w-2xl mx-auto">
                Need help with university services? Submit a request and our team will get in touch with you.
            </p>

        </div>

        <!-- Success Message -->
        @if(session('success'))

            <div class="mb-8 bg-green-50 border-2 border-green-200 text-green-700 p-5 rounded-2xl shadow-sm">

                <div class="flex items-center gap-3">

                    <span class="text-2xl">
                        ✅
                    </span>

                    <div>
                        <p class="font-bold">
                            Request Submitted Successfully
                        </p>

                        <p class="text-sm mt-1">
                            {{ session('success') }}
                        </p>
                    </div>

                </div>

            </div>

        @endif

        <!-- Validation Errors -->
        @if($errors->any())

            <div class="mb-8 bg-red-50 border-2 border-red-200 text-red-700 p-5 rounded-2xl">

                <div class="flex items-center gap-2 font-bold mb-3">
                    ⚠️ Please correct the following:
                </div>

                <ul class="list-disc ml-6 space-y-1">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div class="grid lg:grid-cols-2 gap-8">

            <!-- Available Services -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-blue-600 to-sky-500 text-white p-7">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center text-3xl">
                            📋
                        </div>

                        <div>

                            <h2 class="text-2xl font-extrabold">
                                Available Services
                            </h2>

                            <p class="text-blue-100 mt-1">
                                Choose the assistance you need.
                            </p>

                        </div>

                    </div>

                </div>

                <div class="p-8">

                    <div class="space-y-4">

                        <!-- Service -->
                        <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-2xl border border-blue-100 hover:border-blue-300 transition">

                            <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-xl">
                                💰
                            </div>

                            <div>
                                <p class="font-bold text-gray-800">
                                    HELB First-Time Application
                                </p>

                                <p class="text-sm text-gray-500">
                                    Assistance with your first HELB application.
                                </p>
                            </div>

                        </div>

                        <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-2xl border border-blue-100 hover:border-blue-300 transition">

                            <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-xl">
                                💰
                            </div>

                            <div>
                                <p class="font-bold text-gray-800">
                                    HELB Subsequent Loan
                                </p>

                                <p class="text-sm text-gray-500">
                                    Help with subsequent loan applications.
                                </p>
                            </div>

                        </div>

                        <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-2xl border border-blue-100 hover:border-blue-300 transition">

                            <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-xl">
                                ⚖️
                            </div>

                            <div>
                                <p class="font-bold text-gray-800">
                                    HELB Appeals
                                </p>

                                <p class="text-sm text-gray-500">
                                    Get assistance with HELB appeals.
                                </p>
                            </div>

                        </div>

                        <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-2xl border border-blue-100 hover:border-blue-300 transition">

                            <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-xl">
                                📘
                            </div>

                            <div>
                                <p class="font-bold text-gray-800">
                                    Unit Registration
                                </p>

                                <p class="text-sm text-gray-500">
                                    Assistance with registering your units.
                                </p>
                            </div>

                        </div>

                        <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-2xl border border-blue-100 hover:border-blue-300 transition">

                            <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-xl">
                                ✏️
                            </div>

                            <div>
                                <p class="font-bold text-gray-800">
                                    Unit Amendment
                                </p>

                                <p class="text-sm text-gray-500">
                                    Help with changing registered units.
                                </p>
                            </div>

                        </div>

                        <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-2xl border border-blue-100 hover:border-blue-300 transition">

                            <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-xl">
                                🖥️
                            </div>

                            <div>
                                <p class="font-bold text-gray-800">
                                    Student Portal Assistance
                                </p>

                                <p class="text-sm text-gray-500">
                                    Get help navigating your student portal.
                                </p>
                            </div>

                        </div>

                        <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-2xl border border-blue-100 hover:border-blue-300 transition">

                            <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-xl">
                                📄
                            </div>

                            <div>
                                <p class="font-bold text-gray-800">
                                    Admission & Academic Documents
                                </p>

                                <p class="text-sm text-gray-500">
                                    Assistance with important academic documents.
                                </p>
                            </div>

                        </div>

                    </div>

                    <!-- Information Box -->
                    <div class="mt-8 bg-sky-50 border-2 border-sky-100 rounded-2xl p-5">

                        <div class="flex gap-3">

                            <span class="text-2xl">
                                💡
                            </span>

                            <div>

                                <h3 class="font-bold text-blue-800">
                                    Need something else?
                                </h3>

                                <p class="text-sm text-gray-600 mt-1">
                                    Select the closest service and explain what you need in the additional information section.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Request Form -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-sky-500 to-blue-600 text-white p-7">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center text-3xl">
                            📝
                        </div>

                        <div>

                            <h2 class="text-2xl font-extrabold">
                                Request a Service
                            </h2>

                            <p class="text-blue-100 mt-1">
                                Tell us how we can help.
                            </p>

                        </div>

                    </div>

                </div>

                <form
                    action="{{ route('student-services.store') }}"
                    method="POST"
                    class="p-8 space-y-6">

                    @csrf

                    <!-- Service -->
                    <div>

                        <label
                            for="service"
                            class="block font-bold text-gray-700 mb-2">

                            Service
                            <span class="text-red-500">*</span>

                        </label>

                        <select
                            id="service"
                            name="service"
                            class="w-full border-2 border-gray-300 rounded-xl px-4 py-3.5 bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition"
                            required>

                            <option value="">
                                Select a service
                            </option>

                            <option
                                value="HELB First-Time Application"
                                {{ old('service') == 'HELB First-Time Application' ? 'selected' : '' }}>
                                💰 HELB First-Time Application
                            </option>

                            <option
                                value="HELB Subsequent Loan"
                                {{ old('service') == 'HELB Subsequent Loan' ? 'selected' : '' }}>
                                💰 HELB Subsequent Loan
                            </option>

                            <option
                                value="HELB Appeal"
                                {{ old('service') == 'HELB Appeal' ? 'selected' : '' }}>
                                ⚖️ HELB Appeal
                            </option>

                            <option
                                value="Unit Registration"
                                {{ old('service') == 'Unit Registration' ? 'selected' : '' }}>
                                📘 Unit Registration
                            </option>

                            <option
                                value="Unit Amendment"
                                {{ old('service') == 'Unit Amendment' ? 'selected' : '' }}>
                                ✏️ Unit Amendment
                            </option>

                            <option
                                value="Student Portal Assistance"
                                {{ old('service') == 'Student Portal Assistance' ? 'selected' : '' }}>
                                🖥️ Student Portal Assistance
                            </option>

                            <option
                                value="Admission & Academic Documents"
                                {{ old('service') == 'Admission & Academic Documents' ? 'selected' : '' }}>
                                📄 Admission & Academic Documents
                            </option>

                        </select>

                        @error('service')

                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    <!-- Phone -->
                    <div>

                        <label
                            for="phone"
                            class="block font-bold text-gray-700 mb-2">

                            Phone Number
                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            id="phone"
                            type="text"
                            name="phone"
                            value="{{ old('phone', auth()->user()->phone ?? '') }}"
                            placeholder="+254712345678"
                            class="w-full border-2 border-gray-300 rounded-xl px-4 py-3.5 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition"
                            required>

                        @error('phone')

                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    <!-- Additional Information -->
                    <div>

                        <label
                            for="notes"
                            class="block font-bold text-gray-700 mb-2">

                            Additional Information
                        </label>

                        <textarea
                            id="notes"
                            name="notes"
                            rows="6"
                            placeholder="Explain what you need help with..."
                            class="w-full border-2 border-gray-300 rounded-xl px-4 py-3.5 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition resize-y">{{ old('notes') }}</textarea>

                        @error('notes')

                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    <!-- Notice -->
                    <div class="bg-blue-50 border-2 border-blue-100 rounded-2xl p-5">

                        <div class="flex gap-3">

                            <span class="text-2xl">
                                🔒
                            </span>

                            <div>

                                <h3 class="font-bold text-blue-800">
                                    Your information is safe
                                </h3>

                                <p class="text-sm text-gray-600 mt-1">
                                    We'll use the contact details you provide only to respond to your service request.
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- Submit -->
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-sky-500 hover:from-blue-700 hover:to-sky-600 text-white py-4 rounded-2xl font-extrabold shadow-lg hover:shadow-xl transition-all duration-200">

                        📤 Submit Service Request

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>