<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Blog</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 min-h-screen flex flex-col items-center p-6">
    @if (session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded mb-4 shadow">
        {{ session('success') }}
    </div>
    @endif

    <!-- Header -->
    <div class="w-full bg-gradient-to-r from-pink-500 to-indigo-500 text-white py-6 px-4 rounded-lg mb-8 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-extrabold">Daftar Blog</h1>
            <div class="flex gap-4">
                <a href="/tambah" class="bg-white text-blue-500 px-5 py-2 rounded-lg font-medium hover:bg-gray-200">
                    Tambah Blog
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-5 py-2 rounded-lg font-medium hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Blog Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-6xl">
        @foreach($blogs as $blog)
        <a href="/blogs/{{ $blog->id }}" class="p-4 bg-white rounded-lg shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
            <div class="overflow-hidden rounded-md mb-4">
                <img src="{{ asset('storage/' . $blog->gambar) }}" alt="Gambar Blog" class="w-full h-48 object-cover transition-transform transform hover:scale-110">
            </div>
            <h2 class="text-xl font-semibold text-gray-800">{{ $blog->judul }}</h2>
            <p class="text-gray-600 mt-2 line-clamp-3">{{ $blog->isi }}</p>
            <p class="text-sm text-gray-500 mt-4">Author: {{ $blog->pembuat }}</p>
        </a>
        @endforeach
    </div>

    <!-- Footer -->
    <footer class="w-full mt-12 text-center text-gray-600">
        <p>&copy; 2024 Daftar Blog. All rights reserved.</p>
    </footer>
</body>

</html>
