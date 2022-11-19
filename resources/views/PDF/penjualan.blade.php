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
                    <th>Pengguna</th>
                    <th>Email</th>
                    <th>Tanggal Pembelian</th>
                    <th>Pesanan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @if ($data->count() > 0)
                    @foreach ($data as $transaksi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaksi->payment->user->name }}</td>
                            <td>{{ $transaksi->payment->user->email }}</td>
                            {{-- <td>{{ $transaksi->nama }}</td> --}}
                            <td>{{ $transaksi->tgl_transaksi }}</td>
                            <td>
                                @php
                                    $exp = explode(',', $transaksi->item_details);
                                @endphp
                                <ul>
                                    <li>Barang : {{ $exp[1] }}</li>
                                    <li>Jumlah : {{ $exp[0] }}</li>
                                </ul>
                            </td>
                            <td>Rp. {{ number_format($transaksi->total, 0, 2) }}</td>
                            @php
                                $total_price[] = $transaksi->total;
                            @endphp
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5">Total Penjualan</td>
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
