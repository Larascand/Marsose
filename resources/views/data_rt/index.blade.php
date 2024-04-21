<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data RT</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Daftar Data RT</h1>
        <a href="{{ route('data_rt.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Data RT Baru</a>
        <table class="mt-4 w-full" border="1">
            <thead>
                <tr>
                    <th class="px-4 py-2">No. RT</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Alamat</th>
                    <th class="px-4 py-2">Periode Jabatan</th>
                    <th class="px-4 py-2">No. RW</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataRt as $rt)
                <tr>
                    <td class="border px-4 py-2">{{ $rt->No_RT }}</td>
                    <td class="border px-4 py-2">{{ $rt->nama }}</td>
                    <td class="border px-4 py-2">{{ $rt->alamat }}</td>
                    <td class="border px-4 py-2">{{ $rt->periode_jabatan }}</td>
                    <td class="border px-4 py-2">{{ $rt->No_RW }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('data_rt.edit', $rt->No_RT) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                        <form action="{{ route('data_rt.destroy', $rt->No_RT) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Apakah Anda yakin ingin menghapus data RT ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body
