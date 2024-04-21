<!DOCTYPE html>
<html>
<head>
    <title>Daftar Warga</title>
</head>
<body>
    <h1>Daftar Warga</h1>
    <a href="{{ route('warga.create') }}">Tambah Warga Baru</a>
    <table border="1">
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Telepon</th>
            <th>No. KK</th>
            <th>Action</th>
        </tr>
        @foreach ($warga as $warga)
        <tr>
            <td>{{ $warga->NIK }}</td>
            <td>{{ $warga->nama }}</td>
            <td>{{ $warga->alamat }}</td>
            <td>{{ $warga->jenis_kelamin }}</td>
            <td>{{ $warga->tempat_lahir }}</td>
            <td>{{ $warga->tanggal_lahir }}</td>
            <td>{{ $warga->agama }}</td>
            <td>{{ $warga->no_telp }}</td>
            <td>{{ $warga->No_KK }}</td>
            <td>
                <a href="{{ route('warga.edit', $warga->NIK) }}">Edit</a>
                <form action="{{ route('warga.destroy', $warga->NIK) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus warga ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
