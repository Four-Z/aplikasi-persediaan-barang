@extends('layouts.pimpinan')

@section('css')
    <link href="{{ asset('js/dataTables.bootstrap4.min.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4 p-5">
            <form action="{{ route('pimpinan.cari_laporan') }}" method="GET">
                @csrf
                <div class="row form-group">
                    <div class="col-sm-3">
                        <div class="input-group date" id="datepicker">
                            <input type="text" class="form-control" name="start_date" placeholder="Mulai..." required>
                            <span class="input-group-append">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-group date" id="datepicker2">
                            <input type="text" class="form-control" name="end_date" placeholder="Sampai..." required>
                            <span class="input-group-append">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="opsi_barang" value="masuk" checked>
                            <label class="form-check-label" for="inlineRadio1">Barang Masuk</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="opsi_barang" value="keluar">
                            <label class="form-check-label" for="inlineRadio2">Barang Keluar</label>
                        </div>
                    </div>

                    <div class="col-sm-4">

                        <button type="submit" class="btn btn-primary mr-3 "><i
                                class="fa-solid fa-magnifying-glass"></i>&nbsp; Cari Laporan</button>
            </form>

            <a href="{{ route('pimpinan.laporan') }}"><button type="button"
                    class="btn btn-danger pl-4 pr-4 mr-3">Reset</button></a>

            @if (isset($barang))
                <form action="{{ route('pimpinan.cetak_laporan') }}" method="GET" class="d-inline" target="_blank">
                    @csrf
                    <input type="text" class="form-control" name="start_date" value="{{ $tanggal_awal }}"
                        placeholder="Mulai..." hidden>
                    <input type="text" class="form-control" name="end_date" value="{{ $tanggal_akhir }}"
                        placeholder="Sampai..." hidden>
                    <input class="form-check-input" type="radio" name="opsi_barang" value="{{ $opsi_barang }}" checked
                        hidden>
                    <button type="submit" class="btn btn-info"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;
                        Cetak
                        Laporan</button>
                </form>
            @endif
        </div>
    </div>

    @if (isset($barang))
        <!-- DataTales Example -->
        <div class="card shadow mb-4" id="print-area">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Tanggal {{ $tanggal_awal->format('Y-m-d') }} -
                    {{ $tanggal_akhir->format('Y-m-d') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        <tfoot>
                            <tr>
                                <th>Tanggal</th>
                                <th>Supplier</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>

                            </tr>
                        </tfoot>
                        <tbody>
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
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    </div>
    <!-- /.container-fluid -->
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/datatables-demo.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });

        $(function() {
            $('#datepicker2').datepicker();
        });
    </script>
@endsection
