<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data KK</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Daftar Data KK</h1>
        <a href="{{ route('data_kk.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Data KK Baru</a>
        <table class="mt-4 w-full" border="1">
            <thead>
                <tr>
                    <th class="px-4 py-2">No. KK</th>
                    <th class="px-4 py-2">Kepala Keluarga</th>
                    <th class="px-4 py-2">No. RT</th>
                    <th class="px-4 py-2">No. RW</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataKK as $kk)
                <tr>
                    <td class="px-4 py-2">{{ $kk->No_KK }}</td>
                    <td class="px-4 py-2">{{ $kk->kepala_keluarga }}</td>
                    <td class="px-4 py-2">{{ $kk->No_RT }}</td>
                    <td class="px-4 py-2">{{ $kk->No_RW }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('data_kk.edit', $kk->No_KK) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                        <form action="{{ route('data_kk.destroy', $kk->No_KK) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Apakah Anda yakin ingin menghapus data KK ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
