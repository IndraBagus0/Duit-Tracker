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
                    <td>{{ $trx->transactionDate->format('j M Y') }}</td>
                    <td>{{ $trx->kategori->categoryName }}</td>
                    <td>{{ number_format($trx->transactionAmount, 0, ',', '.') }}</td>
                    <td>{{ $trx->notesTransaction }}</td>
                    <td>{{ $trx->transactionType }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Saldo Awal</th>
                <th colspan="3" style="text-align: end">{{ number_format($saldoAwal, 0, ',', '.') }}
                </th>
            </tr>
            <tr>
                <th colspan="3">Pemasukan</th>
                <th colspan="3" style="text-align: end">
                    {{ number_format($totalPemasukan, 0, ',', '.') }}</th>
            </tr>
            <tr>
                <th colspan="3">Pengeluaran</th>
                @php
                    $formattedTotalPengeluaran = number_format($totalPengeluaran * -1, 0, ',', '.');
                @endphp
                <th colspan="3" style="text-align: end">{{ $formattedTotalPengeluaran }}
                </th>
            </tr>
            <tr>
                <th colspan="3">Saldo Akhir</th>
                <th colspan="3" style="text-align: end">{{ number_format($totalSaldo, 0, ',', '.') }}
                </th>
            </tr>
        </tfoot>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>
