<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-center justify-center">
    <!-- Container Form -->
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-xl">
        <!-- Judul -->
        <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Login</h1>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Input Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email Anda"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
            </div>

            <!-- Input Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password Anda"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
            </div>

            <!-- Tombol Login -->
            <div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold py-3 rounded-lg shadow-lg hover:from-blue-600 hover:to-indigo-600 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
                    Login
                </button>
            </div>
        </form>
    </div>
</body>

</html>
