<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Laporan Pengaduan</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Daftar Laporan Pengaduan</h1>
        <a href="{{ route('laporan_pengaduan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Buat Laporan Pengaduan Baru</a>
        <table class="mt-4 w-full" border="1">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID Laporan</th>
                    <th class="px-4 py-2">Tanggal Laporan</th>
                    <th class="px-4 py-2">Jenis Laporan</th>
                    <th class="px-4 py-2">Gambar</th>
                    <th class="px-4 py-2">Keterangan</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">NIK</th>
                    <th class="px-4 py-2">No. RW</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporanPengaduan as $laporan)
                <tr>
                    <td class="px-4 py-2">{{ $laporan->ID_Laporan }}</td>
                    <td class="px-4 py-2">{{ $laporan->tanggal_laporan }}</td>
                    <td class="px-4 py-2">{{ $laporan->jenis_laporan }}</td>
                    <td class="px-4 py-2">
                        @if($laporan->gambar)
                            <img src="{{ asset($laporan->gambar) }}" alt="Gambar Laporan" ">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $laporan->keterangan }}</td>
                    <td class="px-4 py-2">{{ $laporan->status }}</td>
                    <td class="px-4 py-2">{{ $laporan->NIK }}</td>
                    <td class="px-4 py-2">{{ $laporan->No_RW }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('laporan_pengaduan.edit', $laporan->ID_Laporan) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                        <form action="{{ route('laporan_pengaduan.destroy', $laporan->ID_Laporan) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan pengaduan ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
