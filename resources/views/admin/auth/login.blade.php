<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <title>CampusConnect Admin</title>

    @vite(['resources/css/app.css'])

</head>

<body class="bg-gradient-to-br from-black via-gray-900 to-red-900 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md">

    <div class="bg-white rounded-3xl shadow-2xl p-10">

        <div class="text-center">

            <h1 class="text-5xl font-extrabold text-red-600">
                🛠
            </h1>

            <h2 class="text-3xl font-bold mt-4">
                CampusConnect Admin
            </h2>

            <p class="text-gray-500 mt-2">
                Secure Administrator Access
            </p>

        </div>

        @if($errors->any())

            <div class="bg-red-100 text-red-700 rounded-xl p-4 mt-6">

                {{ $errors->first() }}

            </div>

        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="mt-8 space-y-6">

            @csrf

            <div>

                <label class="font-semibold">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full border rounded-xl mt-2 p-4">

            </div>

            <div>

                <label class="font-semibold">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-xl mt-2 p-4">

            </div>

            <button
                class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-4 rounded-xl">

                Login

            </button>

        </form>

    </div>

</div>

</body>
</html>