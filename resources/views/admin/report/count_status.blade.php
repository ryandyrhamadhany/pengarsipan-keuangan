<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 11px;
            margin: 20px 30px;
        }

        .header {
            margin-bottom: 35px;
        }

        .logo {
            width: 120px;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-top: -60px; /* kunci posisi judul */
            text-transform: uppercase;
        }

        .meta {
            margin-top: 20px;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: middle;
        }

        th {
            background: #f0f0f0;
            text-align: center;
        }

        .center {
            text-align: center;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 11px;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <div class="header">
        <img src="{{ $watermark }}" class="logo">

        <div class="title">
            {{ $title }}
        </div>
    </div>

    {{-- PERIODE --}}
    <div class="meta">
        <strong>Periode:</strong>
        {{ $tanggal_awal ?? '-' }}
        s/d
        {{ $tanggal_akhir ?? '-' }}
    </div>

    {{-- TABLE --}}
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Status Pengajuan</th>
                <th width="25%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="center">1</td>
                <td>Pengajuan</td>
                <td class="center">{{ $pengajuan }}</td>
            </tr>
            <tr>
                <td class="center">2</td>
                <td>Verifikasi</td>
                <td class="center">{{ $verifikasi }}</td>
            </tr>
            <tr>
                <td class="center">3</td>
                <td>Ditanda Tangani</td>
                <td class="center">{{ $ttd }}</td>
            </tr>
            <tr>
                <td class="center">3</td>
                <td>Arsip</td>
                <td class="center">{{ $arsip }}</td>
            </tr>
        </tbody>
    </table>

    {{-- FOOTER --}}
    <div class="footer">
        Dicetak pada : {{ now()->format('d M Y') }}
    </div>

</body>
</html>