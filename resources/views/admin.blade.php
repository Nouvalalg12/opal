<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="admin-container">
    <h1>Dashboard Admin</h1>
    <p>Daftar Pengaduan Kerusakan Sarana Sekolah</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Konfirmasi</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aspirasi as $i => $a)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $a->user->nama ?? 'Siswa' }}</td>
                <td>{{ $a->judul }}</td>
                <td>{{ $a->deskripsi }}</td>
                <td>{{ $a->tanggal }}</td>
                <td>
                    @if($a->status == 'Selesai')
                        <span class="status-selesai">Selesai</span>
                    @elseif($a->status == 'Diproses')
                        <span class="status-proses">Diproses</span>
                    @else
                        <span class="status-baru">Baru</span>
                    @endif
                </td>
                <td>
                    <form method="POST" action="/admin/konfirmasi/{{ $a->id_aspirasi }}">
                        @csrf
                        <select name="status">
                            <option {{ $a->status=='Baru'?'selected':'' }}>Baru</option>
                            <option {{ $a->status=='Diproses'?'selected':'' }}>Diproses</option>
                            <option {{ $a->status=='Selesai'?'selected':'' }}>Selesai</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="/admin/hapus/{{ $a->id_aspirasi }}"
                          onsubmit="return confirm('Hapus pengaduan ini?')">
                        @csrf
                        <button class="btn-hapus">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/logout" class="logout">Logout</a>
</div>

</body>
</html>
