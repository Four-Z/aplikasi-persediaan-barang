@extends('layouts.staff')

@section('css')
    <link href="{{ asset('js/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script>
        $('#dataTable').dataTable({
            "order": []
        });
    </script>
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="p-3">
            <a href="{{ route('tambah_barang_keluar_page') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa-solid fa-plus"></i>
                </span>
                <span class="text">Tambah Barang Keluar</span>
            </a>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Barang Keluar</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Barang Keluar</th>
                                <th>Tanggal Transmisi</th>
                                <th>Nama Supplier</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID Barang Keluar</th>
                                <th>Tanggal Transmisi</th>
                                <th>Nama Supplier</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($barang_keluar as $bk)
                                <tr>
                                    <td>{{ $bk->id }}</td>
                                    <td>{{ $bk->tanggal }}</td>
                                    <td>{{ $bk->supplier->nama_supplier }}</td>
                                    <td>
                                        <center>
                                            <form action="{{ route('barang_keluar_detail', $bk->id) }}" method="GET"
                                                class="d-inline-block">
                                                @csrf
                                                <button class="btn btn-info btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <span class="text">Lihat Detail</span>
                                                </button>
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@section('script')
    <script>
        $('#dataTable').dataTable({
            "order": []
        });
    </script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/datatables-demo.js') }}"></script>
@endsection
