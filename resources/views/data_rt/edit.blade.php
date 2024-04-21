<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data RT</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Edit Data RT</h1>
        <form action="{{ route('data_rt.update', $dataRt->No_RT) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="No_RT" class="block mb-2 font-bold">No. RT:</label>
                <input type="text" name="No_RT" id="No_RT" class="border border-gray-300 rounded-lg p-2" value="{{ $dataRt->No_RT }}" required>
            </div>
            <div class="mb-4">
                <label for="NIK" class="block mb-2 font-bold">NIK:</label>
                <input type="text" name="NIK" id="NIK" class="border border-gray-300 rounded-lg p-2" value="{{ $dataRt->NIK }}">
            </div>
            <div class="mb-4">
                <label for="nama" class="block mb-2 font-bold">Nama:</label>
                <input type="text" name="nama" id="nama" class="border border-gray-300 rounded-lg p-2" value="{{ $dataRt->nama }}">
            </div>
            <div class="mb-4">
                <label for="alamat" class="block mb-2 font-bold">Alamat:</label>
                <input type="text" name="alamat" id="alamat" class="border border-gray-300 rounded-lg p-2" value="{{ $dataRt->alamat }}">
            </div>
            <div class="mb-4">
                <label for="periode_jabatan" class="block mb-2 font-bold">Periode Jabatan:</label>
                <input type="text" name="periode_jabatan" id="periode_jabatan" class="border border-gray-300 rounded-lg p-2" value="{{ $dataRt->periode_jabatan }}">
            </div>
            <div class="mb-4">
                <label for="username" class="block mb-2 font-bold">Username:</label>
                <input type="text" name="username" id="username" class="border border-gray-300 rounded-lg p-2" value="{{ $dataRt->username }}">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 font-bold">Password:</label>
                <input type="password" name="password" id="password" class="border border-gray-300 rounded-lg p-2" value="{{ $dataRt->password }}">
            </div>
            <div class="mb-4">
    <label for="No_RW" class="block mb-2 font-bold">No. RW:</label>
    <select name="No_RW" id="No_RW" class="border border-gray-300 rounded-lg p-2" required>
        @foreach($dataRw as $rw)
            <option value="{{ $rw->No_RW }}" {{ $rw->No_RW == $dataRt->No_RW ? 'selected' : '' }}>{{ $rw->No_RW }}</option>
        @endforeach
    </select>
</div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
                <a href="{{ route('data_rt.index') }}" class="ml-2 text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
