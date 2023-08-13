@php
    use App\Models\Siswa;
@endphp

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice TK Islam Asmaul Husna</title>
    <link rel="stylesheet" href="{{ asset('css/cetak_detail.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        window.print();
    </script>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="page-content container">


        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-150">
                                <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                                <span class="text-default-d3">Detail Barang {{ $judul }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->

                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                    <div class="row">

                        <div class="text-95 col-sm-12 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Keterangan
                                </div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">ID Barang {{ $judul }}:</span>
                                    <b>{{ $barang->id }}</b>
                                </div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Tanggal: </span>
                                    <b>{{ $barang->tanggal }}</b>
                                </div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Supplier:</span>
                                    <b>{{ $barang->supplier->nama_supplier }}</b>
                                </div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Staff:</span>
                                    <b>{{ $barang->staff->name }}</b>
                                </div>

                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="container-fluid mt-5">
                        <div class="card p-5">
                            <h5 class="card-title font-weight-bold">Daftar Barang</h5>
                            <table class="table align-middle mb-0 bg-white">
                                <thead class="bg-light font-weight-bold">
                                    <tr>
                                        <th>ID BARANG</th>
                                        <th>NAMA BARANG</th>
                                        <th>HARGA BARANG</th>
                                        <th>JUMLAH BARANG</th>
                                        <th>TOTAL HARGA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($barang->detailBarang as $bmd)
                                        <tr>
                                            <td>
                                                {{ $bmd->barang_id }}
                                            </td>
                                            <td>
                                                {{ $bmd->barang->nama_barang }}
                                            </td>
                                            <td>
                                                Rp. {{ number_format($bmd->barang->harga_barang) }}
                                            </td>
                                            <td>
                                                {{ $bmd->jumlah_barang }}
                                            </td>
                                            <td>
                                                Rp.
                                                {{ number_format($bmd->barang->harga_barang * $bmd->jumlah_barang) }}
                                            </td>
                                            @php
                                                $total += $bmd->barang->harga_barang * $bmd->jumlah_barang;
                                            @endphp
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-light font-weight-bold">
                                    <td colspan="4" style="text-align: center">TOTAL</td>
                                    <td>Rp. {{ number_format($total) }}</td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
