<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan Pengaduan Baru</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Buat Laporan Pengaduan Baru</h1>
        <form action="{{ route('laporan_pengaduan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="tanggal_laporan" class="block mb-2 font-bold">Tanggal Laporan:</label>
                <input type="date" name="tanggal_laporan" id="tanggal_laporan" class="border border-gray-300 rounded-lg p-2" required>
            </div>
            <div class="mb-4">
                <label for="jenis_laporan" class="block mb-2 font-bold">Jenis Laporan:</label>
                <input type="text" name="jenis_laporan" id="jenis_laporan" class="border border-gray-300 rounded-lg p-2" required>
            </div>
            <div class="mb-4">
                <label for="gambar" class="block mb-2 font-bold">Gambar:</label>
                <input type="file" name="gambar" id="gambar" class="border border-gray-300 rounded-lg p-2">
            </div>
            <div class="mb-4">
                <label for="keterangan" class="block mb-2 font-bold">Keterangan:</label>
                <textarea name="keterangan" id="keterangan" rows="4" class="border border-gray-300 rounded-lg p-2"></textarea>
            </div>
            <input type="hidden" name="status" value="proses">
            <div class="mb-4">
                <label for="NIK" class="block mb-2 font-bold">NIK:</label>
                <select name="NIK" id="NIK" class="border border-gray-300 rounded-lg p-2" required>
                    @foreach($warga as $warga)
                        <option value="{{ $warga->NIK }}">{{ $warga->NIK }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="No_RW" class="block mb-2 font-bold">No. RW:</label>
                <select name="No_RW" id="No_RW" class="border border-gray-300 rounded-lg p-2" required>
                    @foreach($rw as $rw)
                        <option value="{{ $rw->No_RW }}">{{ $rw->No_RW }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
                <a href="{{ route('laporan_pengaduan.index') }}" class="ml-2 text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
