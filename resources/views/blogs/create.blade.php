<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Blog</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-xl w-full bg-white rounded-lg shadow-lg p-8">
        <!-- Header Form -->
        <h1 class="text-3xl font-extrabold bg-gradient-to-r from-blue-500 to-indigo-500 text-transparent bg-clip-text text-center mb-6">
            Tambah Blog
        </h1>

        <!-- Form -->
        <form action="/tambah" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Judul -->
            <div>
                <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">Judul</label>
                <input type="text" name="judul" id="judul" placeholder="Masukkan judul blog"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                    required>
            </div>

            <!-- Isi -->
            <div>
                <label for="isi" class="block text-sm font-semibold text-gray-700 mb-2">Isi</label>
                <textarea name="isi" id="isi" rows="5" placeholder="Tulis isi blog Anda..."
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                    required></textarea>
            </div>

            <!-- Gambar -->
            <div>
                <label for="gambar" class="block text-sm font-semibold text-gray-700 mb-2">Gambar</label>
                <input type="file" name="gambar" id="gambar"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2">
            </div>

            <!-- Tombol -->
            <div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold px-4 py-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                    Tambah Blog
                </button>
            </div>
        </form>
    </div>
</body>

</html>
