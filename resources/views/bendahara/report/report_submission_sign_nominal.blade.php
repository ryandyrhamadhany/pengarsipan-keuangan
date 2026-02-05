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

        .right {
            text-align: right;
        }

        .total-row td {
            font-weight: bold;
            background: #eaeaea;
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

    {{-- INFO --}}
    <div class="meta">
        <strong>Ditanda tangani oleh:</strong> {{ $name }}
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
                <th width="30%">Nama Pengajuan</th>
                <th width="15%">Divisi</th>
                <th width="15%">Tgl TTD</th>
                <th width="20%">Nominal</th>
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
                        {{ $item->updated_at->format('d M Y') }}
                    </td>

                    <td class="right">
                        Rp {{ number_format($item->nominal, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="center">
                        Tidak ada data pengajuan
                    </td>
                </tr>
            @endforelse

            {{-- TOTAL --}}
            <tr class="total-row">
                <td colspan="4" class="right">
                    TOTAL NOMINAL
                </td>
                <td class="right">
                    Rp {{ number_format($totalNominal, 0, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

    {{-- FOOTER / TTD --}}
    <div class="footer">
        <div class="signature">
            <p>
                {{ now()->format('d M Y') }}<br>
                Bendahara,
            </p>

            <br><br><br>

            <strong>{{ $name }}</strong><br>
            {{ Auth::user()->role }}
        </div>
    </div>

</body>
</html>