<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>KRS</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #1a1a1a;
            padding: 30px;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #0d6efd;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }
        .header h2 {
            font-size: 16px;
            font-weight: bold;
            color: #0d6efd;
            margin-bottom: 2px;
        }
        .header p {
            font-size: 11px;
            color: #555;
        }

        .info-box {
            background: #f0f4ff;
            border: 1px solid #c7d7fc;
            border-radius: 6px;
            padding: 12px 16px;
            margin-bottom: 20px;
        }
        .info-box table { width: 100%; }
        .info-box td { padding: 2px 0; font-size: 12px; }
        .info-box td:first-child {
            width: 130px;
            color: #555;
        }
        .info-box td:nth-child(2) { width: 10px; }
        .info-box td:last-child { font-weight: bold; }

        .krs-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .krs-table thead tr {
            background: #0d6efd;
            color: #fff;
        }
        .krs-table th {
            padding: 8px 10px;
            text-align: left;
            font-size: 11px;
            font-weight: normal;
        }
        .krs-table td {
            padding: 7px 10px;
            border-bottom: 1px solid #e9ecef;
            font-size: 11px;
        }
        .krs-table tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        .total-box {
            text-align: right;
            margin-bottom: 30px;
        }
        .total-box span {
            background: #0d6efd;
            color: #fff;
            padding: 5px 14px;
            border-radius: 4px;
            font-size: 12px;
        }

        .ttd {
            margin-top: 40px;
            display: table;
            width: 100%;
        }
        .ttd-box {
            display: table-cell;
            width: 50%;
            text-align: center;
            font-size: 11px;
        }
        .ttd-box .ttd-line {
            margin-top: 60px;
            border-top: 1px solid #333;
            padding-top: 4px;
            width: 160px;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
</head>
<body>

    <div class="header">
        <h2>SISTEM INFORMASI AKADEMIK</h2>
        <p>{{ $title }}</p>
        <p>Dicetak pada: {{ now()->format('d F Y, H:i') }} WIB</p>
    </div>

    <div class="info-box">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $nama }}</td>
            </tr>
            @if(auth()->user()->isMahasiswa())
            <tr>
                <td>NPM</td>
                <td>:</td>
                <td>{{ auth()->user()->npm }}</td>
            </tr>
            @endif
            <tr>
                <td>Total Mata Kuliah</td>
                <td>:</td>
                <td>{{ $dataKrs->count() }} mata kuliah</td>
            </tr>
            @php
                $totalSks = $dataKrs->sum(fn($k) => $k->mataKuliah->sks ?? 0);
            @endphp
            @if($totalSks > 0)
            <tr>
                <td>Total SKS</td>
                <td>:</td>
                <td>{{ $totalSks }} SKS</td>
            </tr>
            @endif
        </table>
    </div>

    <table class="krs-table">
        <thead>
            <tr>
                <th style="width:30px;">No</th>
                <th>Mata Kuliah</th>
                @if($totalSks > 0)
                    <th style="width:60px;">SKS</th>
                @endif
                @if(auth()->user()->isAdmin())
                    <th>Mahasiswa</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($dataKrs as $i => $krs)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $krs->mataKuliah->nama ?? '-' }}</td>
                @if($totalSks > 0)
                    <td>{{ $krs->mataKuliah->sks ?? '-' }}</td>
                @endif
                @if(auth()->user()->isAdmin())
                    <td>{{ $krs->mahasiswa->nama ?? '-' }}</td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align:center; color:#aaa; padding:20px;">
                    Belum ada data KRS
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($totalSks > 0)
    <div class="total-box">
        <span>Total SKS: {{ $totalSks }}</span>
    </div>
    @endif

    <div class="ttd">
        <div class="ttd-box">
            <p>Mengetahui,</p>
            <p>Dosen Pembimbing Akademik</p>
            <div class="ttd-line">(...........................)</div>
        </div>
        <div class="ttd-box">
            <p>{{ now()->format('d F Y') }}</p>
            <p>Mahasiswa,</p>
            <div class="ttd-line">{{ $nama }}</div>
        </div>
    </div>

</body>
</html>