<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data RW</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Daftar Data RW</h1>
        <a href="{{ route('data_rw.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Data RW Baru</a>
        <table class="mt-4 w-full" border="1">
    <thead>
        <tr>
            <th class="px-4 py-2">No. RW</th>
            <th class="px-4 py-2">Nama</th>
            <th class="px-4 py-2">Alamat</th>
            <th class="px-4 py-2">Periode Jabatan</th>
            <th class="px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataRw as $rw)
        <tr>
            <td class="px-4 py-2" border="1">{{ $rw->No_RW }}</td>
            <td class="px-4 py-2" border="1">{{ $rw->nama }}</td>
            <td class="px-4 py-2" border="1">{{ $rw->alamat }}</td>
            <td class="px-4 py-2" border="1">{{ $rw->periode_jabatan }}</td>
            <td class="px-4 py-2">
                <a href="{{ route('data_rw.edit', $rw->No_RW) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                <form action="{{ route('data_rw.destroy', $rw->No_RW) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Apakah Anda yakin ingin menghapus data RW ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    </div>
</body>
</html>
