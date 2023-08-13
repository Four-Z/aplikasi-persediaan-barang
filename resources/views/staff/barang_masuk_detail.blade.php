@extends('layouts.staff')

@section('content')
    <div class="container-fluid mt-4 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 border card">
                <div class="p-3 py-5">
                    <div class="d-flex mb-3">
                        <h4 class="font-weight-bold">&nbsp;Detail Barang Masuk</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">ID Barang Masuk</label>
                            <p>{{ $barang_masuk->id }}</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Tanggal</label>
                            <p>{{ $barang_masuk->tanggal }}</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Supplier</label>
                            <p>{{ $barang_masuk->supplier->nama_supplier }}</p>
                        </div>

                    </div>

                    <div class="row mt-2">
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Staff</label>
                            <p>{{ $barang_masuk->staff->name }}</p>
                        </div>
                        <div class=" col-md-4 mb-3">
                            <label class="font-weight-bold">Catatan</label>
                            <p>{{ $barang_masuk->catatan }}</p>
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
                    @foreach ($barang_masuk->detailBarang as $bmd)
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
                                Rp. {{ number_format($bmd->barang->harga_barang * $bmd->jumlah_barang) }}
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

    <div class="container-fluid mt-4 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 border">
                <div class="p-3">
                    <center>
                        <a href="{{ route('cetak_barang_masuk', $barang_masuk->id) }}" target="_blank"><button
                                type="submit" class="btn btn-success mt-2" style="width: 200px">CETAK</button></a>

                        <a href="{{ URL::previous() }}"><button type="button" class="btn btn-primary mt-2"
                                style="width: 200px">KEMBALI</button></a>

                    </center>
                </div>
            </div>
        </div>
    </div>
@endsection
