<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Home Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="dashboard">
    <h1>Dashboard Admin</h1>
    <p>Daftar Pengaduan Kerusakan Sarana Sekolah</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Judul Pengaduan</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Konfirmasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aspirasi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->nama }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>
                    <strong>{{ $item->status }}</strong>
                </td>
                <td>
                    <form action="/admin/konfirmasi/{{ $item->id_aspirasi }}" method="POST">
                        @csrf
                        <select name="status">
                            <option value="Baru">Baru</option>
                            <option value="Diproses">Diproses</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/logout">Logout</a>
</div>

</body>
</html>
