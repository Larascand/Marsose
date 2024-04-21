<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data KK</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Edit Data KK</h1>
        <form action="{{ route('data_kk.update', $dataKK->No_KK) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="No_KK" class="block mb-2 font-bold">No. KK:</label>
                <input type="text" name="No_KK" id="No_KK" class="border border-gray-300 rounded-lg p-2" value="{{ $dataKK->No_KK }}" required>
            </div>
            <div class="mb-4">
                <label for="kepala_keluarga" class="block mb-2 font-bold">Kepala Keluarga:</label>
                <input type="text" name="kepala_keluarga" id="kepala_keluarga" class="border border-gray-300 rounded-lg p-2" value="{{ $dataKK->kepala_keluarga }}">
            </div>
            <div class="mb-4">
                <label for="No_RW" class="block mb-2 font-bold">No. RW:</label>
                <select name="No_RW" id="No_RW" class="border border-gray-300 rounded-lg p-2">
                    @foreach($dataRW as $rw)
                        <option value="{{ $rw->No_RW }}" {{ $rw->No_RW == $dataKK->No_RW ? 'selected' : '' }}>{{ $rw->No_RW }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="No_RT" class="block mb-2 font-bold">No. RT:</label>
                <select name="No_RT" id="No_RT" class="border border-gray-300 rounded-lg p-2">
                    @foreach($dataRT as $rt)
                        <option value="{{ $rt->No_RT }}" {{ $rt->No_RT == $dataKK->No_RT ? 'selected' : '' }}>{{ $rt->No_RT }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
                <a href="{{ route('data_kk.index') }}" class="ml-2 text-gray-600 hover:text-gray-800">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
