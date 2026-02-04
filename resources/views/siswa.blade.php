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

    <form method="GET" action="/logout">
        <button class="logout-btn">Logout</button>
    </form>
</div>

</body>
</html>
