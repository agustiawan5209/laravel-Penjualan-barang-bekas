<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
</head>
<style>
    table {
        width: 100%;

    }

    td {
        text-align: center;
        padding: 0;
        margin: 0;
        font-size: 12px;
        white-space: nowrap;
    }
    th{
        font-size: 12px;
        font-weight: 700;
    }
</style>

<body>
    <center>
        <h6> <span
                style="font-weight: 700; margin-botton: 7px; text-decoration:underline; font-size: 28px; font-style: sans-serif;">Gribs</span>
            <br>
            <span>Laporan Penjualan</span></h4> <br>
            <span>Tgl : {{ date('Y-m-d') }}</span>
    </center>

    <center>
        <table class="w-full table-auto" border="1" cellspacing='1' cellpadding='1'>
            <thead class="">
                <tr class="text-xs p-1">
                    <th>No.</th>
                    <th>ID Transaksi</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Pembelian</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total_price = [];
                @endphp
                @if ($data->count() > 0)
                    @foreach ($data as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->kode_transaksi }}</td>
                            <td>{{ $item->barang->nama_produk }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->barang->harga }}</td>
                            <td>{{ $item->subtotal }}</td>
                        </tr>
                        @php
                            $total_price[] = $item->subtotal;
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="4">Total Penjualan</td>
                        <td colspan="2">Rp. {{ number_format(array_sum($total_price), 0, 2) }}
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="8">
                            Kosong
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </center>
</body>

</html>
