<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Blog</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 min-h-screen flex flex-col items-center p-6">
    <!-- Link Kembali -->
    <a href="/blogs"
        class="text-blue-500 font-semibold hover:text-blue-700 mb-6 flex items-center space-x-2 transition">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <span>Kembali ke Daftar Blog</span>
    </a>

    <!-- Container -->
    <div class="max-w-3xl w-full bg-white rounded-lg shadow-lg p-8">
        <!-- Gambar -->
        <img src="{{ asset('storage/' . $blog->gambar) }}" alt="Gambar Blog"
            class="w-full h-80 object-cover rounded-lg shadow mb-6">

        <!-- Judul -->
        <h1
            class="text-3xl font-extrabold bg-gradient-to-r from-blue-500 to-indigo-500 text-transparent bg-clip-text mb-4">
            {{ $blog->judul }}
        </h1>

        <!-- Author -->
        <p class="text-sm text-gray-500 mb-6">Author: <span class="font-medium">{{ $blog->pembuat }}</span></p>

        <!-- Isi -->
        <div class="text-gray-800 leading-relaxed space-y-4">
            <p>{{ $blog->isi }}</p>
        </div>
    </div>

    <!-- Tombol Aksi -->
    @if (Auth::check() && Auth::user()->name === $blog->pembuat)
    <div class="mt-6 flex space-x-4">
        <!-- Tombol Edit -->
        <a href="/blogs/{{ $blog->id }}/edit"
            class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-semibold px-4 py-2 rounded-lg shadow hover:from-blue-600 hover:to-indigo-600 transition">
            Edit
        </a>

        <!-- Form Hapus -->
        <form action="/blogs/{{ $blog->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold px-4 py-2 rounded-lg shadow hover:from-red-600 hover:to-red-700 transition">
                Delete
            </button>
        </form>
    </div>
    @endif
</body>

</html>
