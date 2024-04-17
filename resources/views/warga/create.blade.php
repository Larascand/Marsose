<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Warga</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Create New Warga</h1>
        <form action="{{ route('warga.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="NIK" class="block mb-2 font-bold">NIK:</label>
                <input type="text" name="NIK" id="NIK" class="border border-gray-300 rounded-lg p-2" value="{{ old('NIK') }}" required>
            </div>
            <div class="mb-4">
                <label for="username" class="block mb-2 font-bold">Username:</label>
                <input type="text" name="username" id="username" class="border border-gray-300 rounded-lg p-2" value="{{ old('username') }}" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 font-bold">Password:</label>
                <input type="password" name="password" id="password" class="border border-gray-300 rounded-lg p-2" required>
            </div>
            <div class="mb-4">
                <label for="nama" class="block mb-2 font-bold">Nama:</label>
                <input type="text" name="nama" id="nama" class="border border-gray-300 rounded-lg p-2" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block mb-2 font-bold">Alamat:</label>
                <input type="text" name="alamat" id="alamat" class="border border-gray-300 rounded-lg p-2" value="{{ old('alamat') }}" required>
            </div>
            <div class="mb-4">
                <label for="jenis_kelamin" class="block mb-2 font-bold">Jenis Kelamin:</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="border border-gray-300 rounded-lg p-2" required>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="tempat_lahir" class="block mb-2 font-bold">Tempat Lahir:</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="border border-gray-300 rounded-lg p-2" value="{{ old('tempat_lahir') }}" required>
            </div>
            <div class="mb-4">
                <label for="tanggal_lahir" class="block mb-2 font-bold">Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="border border-gray-300 rounded-lg p-2" value="{{ old('tanggal_lahir') }}" required>
            </div>
            <div class="mb-4">
                <label for="agama" class="block mb-2 font-bold">Agama:</label>
                <input type="text" name="agama" id="agama" class="border border-gray-300 rounded-lg p-2" value="{{ old('agama') }}" required>
            </div>
            <div class="mb-4">
                <label for="no_telp" class="block mb-2 font-bold">No. Telepon:</label>
                <input type="text" name="no_telp" id="no_telp" class="border border-gray-300 rounded-lg p-2" value="{{ old('no_telp') }}" required>
            </div>
            <div class="mb-4">
                <label for="No_KK" class="block mb-2 font-bold">Nomor KK:</label>
                <input type="text" name="No_KK" id="No_KK" class="border border-gray-300 rounded-lg p-2" value="{{ old('No_KK') }}" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create</button>
                <a href="{{ route('warga.index') }}" class="ml-2 text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
