<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan Transaksi</title>
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
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>Laporan Transaksi</h2>
    <p>Periode: {{ $startDate->format('j M Y') }} - {{ $endDate->format('j M Y') }}</p>
    <p>Jenis Transaksi: {{ $jenisTransaksi ? ucfirst($jenisTransaksi) : 'Semua' }}</p>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>TANGGAL</th>
                <th>KATEGORI</th>
                <th>NOMINAL</th>
                <th>CATATAN</th>
                <th>JENIS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $index => $trx)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $trx->tanggal_transaksi->format('j M Y') }}</td>
                    <td>{{ $trx->kategori->nama_kategori }}</td>
                    <td>{{ number_format($trx->nominal_transaksi, 2) }}</td>
                    <td>{{ $trx->catatan_transaksi }}</td>
                    <td>{{ $trx->jenis_transaksi }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Saldo Awal</th>
                <th colspan="3" style="text-align: end">{{ number_format($saldoAwal, 2) }}
                </th>
            </tr>
            <tr>
                <th colspan="3">Pemasukan</th>
                <th colspan="3" style="text-align: end">
                    {{ number_format($totalPemasukan, 2) }}</th>
            </tr>
            <tr>
                <th colspan="3">Pengeluaran</th>
                @php
                    $formattedTotalPengeluaran = number_format($totalPengeluaran * -1, 2);
                @endphp
                <th colspan="3" style="text-align: end">{{ $formattedTotalPengeluaran }}
                </th>
            </tr>
            <tr>
                <th colspan="3">Saldo Akhir</th>
                <th colspan="3" style="text-align: end">{{ number_format($totalSaldo, 2) }}
                </th>
            </tr>
        </tfoot>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>
