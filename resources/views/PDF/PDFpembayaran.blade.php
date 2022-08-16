<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DETAIL BAYAR</title>
</head>
<style>
    body {
        padding-left: 10mm;
        margin: 0;
    }

    header {
        background-color: rgb(24, 131, 219);
        color: white;
        padding: 10px;
    }

    .flex {
        display: flex;
        justify-content: space-between;
        padding-left: 20px;
        padding-right: 20px;
    }

    .text-underline {
        text-decoration: underline;
        font-weight: 700;
    }

    .bukti-bayar {
        width: 400px;
        height: max-content;
        border: 1px solid #0000;
        background-color: #bf01bf;
    }
</style>

<body>
    <header class="flex">
        <nav>DETAIL PEMBAYARAN</nav>
    </header>

    <main>
        <h3 class="text-underline">DETAIL PEMBELI</h3>
        <table>
            <tr>
                <td>NAMA</td>
                <td>: {{ $request->name }}</td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td>: {{ $request->alamat }}</td>
            </tr>
            <tr>
                <td>KECAMATAN</td>
                <td>: {{ $request->kecamatan }}</td>
            </tr>
            <tr>
                <td>KABUPATEN/KOTA</td>
                <td>: {{ $request->kabupaten }}</td>
            </tr>
        </table>
        <br>
        <h3 class="text-underline">DETAIL PEMBAYARAN</h3>
        <table>
            <tr>
                <td>TIPE PEMBAYARAN</td>
                <td>: {{ $request['metode'] }}</td>
            </tr>
            <tr>
                <td>TOTAL BAYAR</td>
                <td>: Rp. {{ number_format(intval($param['sub_total']), 0, 2) }}</td>
            </tr>
            <tr>
                <td>TANGGAL TRANSAKSI</td>
                <td>: {{ date('d M Y') }}</td>
            </tr>
            <tr>
                <td>ID TRANSAKSI</td>
                <td>: ID</td>
            </tr>
        </table>
        <br>
        <br>
        @if ($request->foto != null)
            <h3 class="text-underline">BUKTI PEMBAYARAN</h3>
            <br>
            <img class="bukti-bayar" src="{{public_path('bukti/'.$file)}}" alt="">
        @else
            <h3 class="text-underline">DALAM PROSES</h3>
        @endif
    </main>
</body>

</html>
