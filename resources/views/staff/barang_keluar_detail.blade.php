@extends('layouts.staff')

@section('content')
    <div class="container-fluid mt-4 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 border card">
                <div class="p-3 py-5">
                    <div class="d-flex mb-3">
                        <h4 class="font-weight-bold">&nbsp;Detail Barang Keluar</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">ID Barang Keluar</label>
                            <p>{{ $barang_keluar->id }}</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Tanggal</label>
                            <p>{{ $barang_keluar->tanggal }}</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Supplier</label>
                            <p>{{ $barang_keluar->supplier->nama_supplier }}</p>
                        </div>

                    </div>

                    <div class="row mt-2">
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Staff</label>
                            <p>{{ $barang_keluar->staff->name }}</p>
                        </div>
                        <div class=" col-md-4 mb-3">
                            <label class="font-weight-bold">Catatan</label>
                            <p>{{ $barang_keluar->catatan }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
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
                    @foreach ($barang_keluar->detailBarangKeluar as $bkd)
                        <tr>
                            <td>
                                {{ $bkd->barang_id }}
                            </td>
                            <td>
                                {{ $bkd->barang->nama_barang }}
                            </td>
                            <td>
                                {{ $bkd->barang->harga_barang }}
                            </td>
                            <td>
                                {{ $bkd->jumlah_barang }}
                            </td>
                            <td>
                                Rp. {{ number_format($bkd->barang->harga_barang * $bkd->jumlah_barang) }}
                            </td>
                            @php
                                $total += $bkd->barang->harga_barang * $bkd->jumlah_barang;
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

    <div class="container-fluid mt-4 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 border">
                <div class="p-3">
                    <center>
                        <a href=""><button type="submit" class="btn btn-success mt-2"
                                style="width: 200px">CETAK</button></a>

                        <a href="{{ URL::previous() }}"><button type="button" class="btn btn-primary mt-2"
                                style="width: 200px">KEMBALI</button></a>

                    </center>
                </div>
            </div>
        </div>
    </div>
@endsection
