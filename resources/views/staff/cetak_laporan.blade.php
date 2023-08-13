@php
    use App\Models\Product;
@endphp

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Laporan Keuangan</title>

    <script>
        window.print();
    </script>
</head>

<body>
    <center>
        <table>
            <tr>
                {{-- <td>
                    <img src="" width="300px" alt="">
                </td> --}}
                <td colspan="3">
                    <h2 style="text-align: center;">LAPORAN BARANG {{ $judul }}</h2>
                    <h2 style="text-align: center;"> CV BERKAH BANGKIT ELEKTRONIK</h2>
                    <h4 style="text-align: center;">Periode :{{ $tanggal_awal->format('Y-m-d') }} -
                        {{ $tanggal_akhir->format('Y-m-d') }}</h4>

                </td>
            </tr>
        </table>
        <hr style="border-width: 2px">
        <br>
    </center>

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Supplier</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>

            </tr>
        </thead>

        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($barang as $b)
                @foreach ($b->detailBarang as $db)
                    <tr>
                        <td>{{ $b->tanggal }}</td>
                        <td>{{ $b->supplier->nama_supplier }}</td>
                        <td>{{ $db->barang->nama_barang }}</td>
                        <td>{{ number_format($db->jumlah_barang) }}</td>
                        <td>Rp. {{ number_format($db->barang->harga_barang) }}</td>
                        <td>Rp. {{ number_format($db->jumlah_barang * $db->barang->harga_barang) }}</td>
                    </tr>
                    @php
                        $total += $db->jumlah_barang * $db->barang->harga_barang;
                    @endphp
                @endforeach
            @endforeach
        </tbody>
    </table>

    <div>
        <h3>Total: Rp. {{ number_format($total) }}</h3>
    </div>


    <footer style="margin-top:200px; padding: 5px; background-color:rgba(250, 250, 250, 0.6);">
        <center>
            <p style="font-weight: 400;">CV. BANGKIT BERKAH ELEKTRONIK</p>
        </center>
    </footer>

</body>

</html>
