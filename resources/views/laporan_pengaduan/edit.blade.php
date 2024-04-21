<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Laporan Pengaduan</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Edit Laporan Pengaduan</h1>
        <form action="{{ route('laporan_pengaduan.update', $laporanPengaduan->ID_Laporan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="tanggal_laporan" class="block mb-2 font-bold">Tanggal Laporan:</label>
                <input type="date" name="tanggal_laporan" id="tanggal_laporan" class="border border-gray-300 rounded-lg p-2" value="{{ $laporanPengaduan->tanggal_laporan }}" required>
            </div>
            <div class="mb-4">
                <label for="jenis_laporan" class="block mb-2 font-bold">Jenis Laporan:</label>
                <input type="text" name="jenis_laporan" id="jenis_laporan" class="border border-gray-300 rounded-lg p-2" value="{{ $laporanPengaduan->jenis_laporan }}" required>
            </div>
            <div class="mb-4">
                <label for="gambar" class="block mb-2 font-bold">Gambar:</label>
                <input type="file" name="gambar" id="gambar" class="border border-gray-300 rounded-lg p-2">
                @if($laporanPengaduan->gambar)
                    <img src="{{ asset($laporanPengaduan->gambar) }}" alt="Gambar Laporan" style="max-width: 200px; max-height: 200px; margin-top: 5px;">
                @else
                    <span>Tidak ada gambar</span>
                @endif
            </div>
            <div class="mb-4">
                <label for="keterangan" class="block mb-2 font-bold">Keterangan:</label>
                <textarea name="keterangan" id="keterangan" rows="4" class="border border-gray-300 rounded-lg p-2">{{ $laporanPengaduan->keterangan }}</textarea>
            </div>
            <div class="mb-4">
                <label for="status" class="block mb-2 font-bold">Status:</label>
                <select name="status" id="status" class="border border-gray-300 rounded-lg p-2" required>
                    <option value="proses" {{ $laporanPengaduan->status === 'proses' ? 'selected' : '' }}>Proses</option>
                    <option value="ditolak" {{ $laporanPengaduan->status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    <option value="diterima" {{ $laporanPengaduan->status === 'diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="selesai" {{ $laporanPengaduan->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="NIK" class="block mb-2 font-bold">NIK:</label>
                <select name="NIK" id="NIK" class="border border-gray-300 rounded-lg p-2" required>
                    @foreach($warga as $item)
                        <option value="{{ $item->NIK }}" {{ $laporanPengaduan->NIK === $item->NIK ? 'selected' : '' }}>{{ $item->NIK }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="No_RW" class="block mb-2 font-bold">No. RW:</label>
                <select name="No_RW" id="No_RW" class="border border-gray-300 rounded-lg p-2" required>
                    @foreach($rw as $item)
                        <option value="{{ $item->No_RW }}" {{ $laporanPengaduan->No_RW === $item->No_RW ? 'selected' : '' }}>{{ $item->No_RW }}</option>
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
