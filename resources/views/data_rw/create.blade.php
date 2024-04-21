<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data RW</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Tambah Data RW</h1>
        <form action="{{ route('data_rw.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="No_RW" class="block mb-2 font-bold">No. RW:</label>
                <input type="text" name="No_RW" id="No_RW" class="border border-gray-300 rounded-lg p-2" required>
            </div>
            <div class="mb-4">
                <label for="NIK" class="block mb-2 font-bold">NIK:</label>
                <input type="text" name="NIK" id="NIK" class="border border-gray-300 rounded-lg p-2">
            </div>
            <div class="mb-4">
                <label for="nama" class="block mb-2 font-bold">Nama:</label>
                <input type="text" name="nama" id="nama" class="border border-gray-300 rounded-lg p-2">
            </div>
            <div class="mb-4">
                <label for="nama" class="block mb-2 font-bold">Username:</label>
                <input type="text" name="username" id="username" class="border border-gray-300 rounded-lg p-2">
            </div>
            <div class="mb-4">
                <label for="nama" class="block mb-2 font-bold">Password:</label>
                <input type="password" name="password" id="password" class="border border-gray-300 rounded-lg p-2">
            </div>
            <div class="mb-4">
                <label for="alamat" class="block mb-2 font-bold">Alamat:</label>
                <input type="text" name="alamat" id="alamat" class="border border-gray-300 rounded-lg p-2">
            </div>
            <div class="mb-4">
                <label for="periode_jabatan" class="block mb-2 font-bold">Periode Jabatan:</label>
                <input type="text" name="periode_jabatan" id="periode_jabatan" class="border border-gray-300 rounded-lg p-2">
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah</button>
                <a href="{{ route('data_rw.index') }}" class="ml-2 text-gray-600 hover:text-gray-800">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
