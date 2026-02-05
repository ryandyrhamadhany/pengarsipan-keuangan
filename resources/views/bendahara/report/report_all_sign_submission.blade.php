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

        .meta {
            margin: 12px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
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
    </div>

    {{-- PERIODE --}}
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
                <th width="15%">Status Verifikasi</th>
                <th width="15%">Tgl TTD</th>
                <th width="20%">Penandatangan</th>
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
                        {{ $item->verification_status ? 'Terverifikasi' : 'Belum' }}
                    </td>

                    <td class="center">
                        {{ $item->updated_at->format('d M Y') }}
                    </td>

                    <td class="center">
                        {{ $item->revenue_officer->name ?? '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="center">
                        Tidak ada data pengajuan ditandatangani
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- FOOTER --}}
    {{-- <div class="footer">
        <div class="signature">
            <p>
                {{ now()->format('d M Y') }}<br>
                Mengetahui,
            </p>

            <br><br><br>

            <strong>{{ Auth::user()->name }}</strong><br>
            {{ Auth::user()->role }}
        </div>
    </div> --}}

</body>
</html>