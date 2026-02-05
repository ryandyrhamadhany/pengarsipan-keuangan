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
            margin-bottom: 50px;
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
            margin-top: 4px;
        }

        .meta {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }

        th {
            background: #f0f0f0;
            text-align: center;
        }

        .center {
            text-align: center;
        }

        .status-yes {
            font-weight: bold;
            color: green;
        }

        .status-no {
            font-weight: bold;
            color: red;
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

        <div class="subtitle">
            Laporan Divisi Keuangan
        </div>
    </div>

    {{-- RANGE TANGGAL --}}
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
                <th width="30%">Nama Pengajuan</th>
                <th width="15%">Divisi</th>
                <th width="15%">Tanggal Dibuat</th>
                <th width="15%">Tanggal Update</th>
                <th width="20%">Status Verifikasi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengajuan as $i => $item)
                <tr>
                    <td class="center">{{ $i + 1 }}</td>

                    <td>
                        {{ $item->budget_submission_name }}
                    </td>

                    <td class="center">
                        {{ $item->user->role ?? '-' }}
                    </td>

                    <td class="center">
                        {{ $item->created_at->format('d M Y') }}
                    </td>

                    <td class="center">
                        {{ $item->updated_at->format('d M Y') }}
                    </td>

                    <td class="center">
                        @if ($item->verification_status)
                            <span class="status-yes">TERVERIFIKASI</span>
                        @else
                            <span class="status-no">BELUM</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="center">
                        Tidak ada data pengajuan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>