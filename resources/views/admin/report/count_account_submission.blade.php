<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 11px;
        }

        .header {
            margin-bottom: 40px;
        }

        .logo {
            width: 120px;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-top: -60px;
        }

        .subtitle {
            text-align: center;
            font-size: 12px;
            margin-top: 5px;
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

        .right {
            text-align: right;
        }

        .footer {
            margin-top: 40px;
            width: 100%;
        }

        .signature {
            width: 30%;
            text-align: center;
            float: right;
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
        {{-- <div class="subtitle">
            Laporan Bagian Admin
        </div> --}}
    </div>

    <div class="meta">
        <strong>Periode:</strong>
        {{ \Carbon\Carbon::parse($tanggal_awal)->format('d M Y') }}
        s/d
        {{ \Carbon\Carbon::parse($tanggal_akhir)->format('d M Y') }}
    </div>

    {{-- TABLE --}}
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="35%">Nama Akun</th>
                <th width="30%">Divisi</th>
                <th width="30%">Jumlah Pengajuan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($akun as $i => $row)
                <tr>
                    <td class="center">{{ $i + 1 }}</td>
                    <td>{{ $row['nama'] }}</td>
                    <td class="center">{{ $row['divisi'] }}</td>
                    <td class="center">{{ $row['jumlah_pengajuan'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="center">
                        Tidak ada data akun
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- FOOTER --}}
    <div class="footer">
        <div class="signature">
            <p>
                {{ now()->format('d M Y') }}<br>
                Admin
            </p>

            <br><br><br>

            <strong>{{ Auth::user()->name }}</strong><br>
            {{ Auth::user()->role }}
        </div>
    </div>

</body>
</html>