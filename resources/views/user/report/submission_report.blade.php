<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 11px;
            color: #000;
        }

        .header {
            width: 100%;
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
            margin-top: 5px;
        }

        .meta {
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .meta table {
            width: 50%;
        }

        .meta td {
            padding: 3px 0;
        }

        table.report {
            width: 100%;
            border-collapse: collapse;
        }

        table.report th,
        table.report td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }

        table.report th {
            background-color: #f0f0f0;
            text-align: center;
        }

        .center {
            text-align: center;
        }

        .status-yes {
            color: green;
            font-weight: bold;
        }

        .status-no {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    {{-- HEADER --}}
    <div class="header">
        <img src="{{ $watermark }}" class="logo">

        <div class="title">
            {{ $title }} {{ Auth::user()->role }}
        </div>

        {{-- <div class="subtitle">
            Semua Pengajuan yang Sudah Dibuat Oleh Anda
        </div> --}}
    </div>

    {{-- RANGE TANGGAL --}}
    <div class="meta">
        <table>
            <tr>
                <td><strong>Tanggal Awal</strong></td>
                <td>: {{ \Carbon\Carbon::parse($tanggal_awal)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td><strong>Tanggal Akhir</strong></td>
                <td>: {{ \Carbon\Carbon::parse($tanggal_akhir)->format('d M Y') }}</td>
            </tr>
        </table>
    </div>

    {{-- TABLE --}}
    <table class="report">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="40%">Nama Pengajuan</th>
                <th width="15%">Tanggal Dibuat</th>
                <th width="15%">Tanggal Update</th>
                <th width="12%">Verifikasi</th>
                <th width="13%">Arsip</th>
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
                        {{ $item->created_at->format('d M Y') }}
                    </td>

                    <td class="center">
                        {{ $item->updated_at->format('d M Y') }}
                    </td>

                    <td class="center">
                        @if ($item->verification_status)
                            <span class="status-yes">YA</span>
                        @else
                            <span class="status-no">TIDAK</span>
                        @endif
                    </td>

                    <td class="center">
                        @if ($item->is_archive)
                            <span class="status-yes">ARSIP</span>
                        @else
                            <span class="status-no">AKTIF</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="center">
                        Tidak ada data pengajuan, wajib terapkan filter
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
