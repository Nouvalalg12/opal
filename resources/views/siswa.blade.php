<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Home Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="siswa-container">
    <h1>Form Pengaduan Siswa</h1>
    <p>Laporkan kerusakan sarana sekolah</p>

    {{-- FORM PENGADUAN --}}
    <form class="siswa-form" method="POST" action="/aspirasi">
        @csrf
        <input type="text" name="judul" placeholder="Judul Pengaduan" required>
        <textarea name="deskripsi" placeholder="Jelaskan kerusakan yang terjadi" required></textarea>

        <select name="id_kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="1">Sarana</option>
            <option value="2">Prasarana</option>
        </select>

        <button type="submit">Kirim Pengaduan</button>
    </form>

    {{-- RIWAYAT --}}
    <h2>Riwayat Pengaduan Saya</h2>

    <table class="siswa-table">
        <tr>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @forelse($aspirasi as $a)
        <tr>
            <td>{{ $a->judul }}</td>
            <td>{{ $a->tanggal }}</td>
            <td>
                @if($a->status == 'Selesai')
                    <span class="status selesai">✔ Selesai</span>
                @elseif($a->status == 'Diproses')
                    <span class="status proses">Diproses</span>
                @else
                    <span class="status baru">Baru</span>
                @endif
            </td>
            <td>
                @if($a->status == 'Baru')
                <form method="POST" action="/aspirasi/hapus/{{ $a->id_aspirasi }}"
                      onsubmit="return confirm('Yakin hapus pengaduan ini?')">
                    @csrf
                    <button class="btn-hapus">Hapus</button>
                </form>
                @else
                    <span>-</span>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" style="text-align:center;">Belum ada pengaduan</td>
        </tr>
        @endforelse
    </table>

    <form method="GET" action="/logout">
        <button class="logout-btn">Logout</button>
    </form>
</div>

</body>
</html>
