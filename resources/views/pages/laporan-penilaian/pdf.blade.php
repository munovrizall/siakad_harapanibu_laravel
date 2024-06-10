<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penilaian {{ $siswa->nama_siswa }}</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div style="text-align: center;">
        <img src="{{ public_path('img/hi-logo.png') }}" style="height: 60px;">
    </div>
    <h3 style="text-align: center;">LAPORAN PENILAIAN</h3>
    <h4 style="text-align: center;">SEKOLAH ISLAM HARAPAN IBU</h4>

    <hr style="border: 0;
            height: 1px;
            background: #000;
            margin-top: 20px;
            margin-bottom: 20px;">

    <p>Nama&nbsp;&nbsp;: {{ $siswa->nama_siswa }}</p>
    <p>NIS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $siswa->nis }}</p>
    <p>Kelas&nbsp;&nbsp;: {{ $kelas->nama_kelas }}</p>
    <div class="table-responsive">
        <table class="table-striped table">
            <tr>
                <th style="width: 80%">Mata Pelajaran</th>
                <th style="width: 10%">Nilai</th>
                <th style="width: 10%">Predikat</th>
            </tr>
            @foreach ($nilai_pelajarans as $nilai_pelajaran)
            <tr>
                <td>{{ $nilai_pelajaran->mataPelajaran->nama_pelajaran }}</td>
                <td style="text-align: center;">{{ $nilai_pelajaran->nilai }}</td>
                <td style="text-align: center;">{{ $nilai_pelajaran->predikat }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>