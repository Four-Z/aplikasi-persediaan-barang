@extends('layouts.staff')

@section('css')
    <link href="{{ asset('js/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Begin Page Content -->

    @if (session()->has('message_success'))
        <div class="col-md-8 ml-4">
            <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                <div>{{ session('message_success') }}</div>
            </div>
        </div>
    @elseif (session()->has('message_fail'))
        <div class="col-md-8 ml-4">
            <div class="alert alert-danger alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                <div>{{ session('message_fail') }}</div>
            </div>
        </div>
    @endif


    <div class="container-fluid">
        <div class="p-3">
            <a href="{{ route('tambah_supplier_page') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa-solid fa-plus"></i>
                </span>
                <span class="text">Tambah Supplier</span>
            </a>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Supplier</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Supplier</th>
                                <th>Lokasi Supplier</th>
                                <th>Nomer Handphone </th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Supplier</th>
                                <th>Lokasi Supplier</th>
                                <th>Nomer Handphone </th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                @foreach ($supplier as $s)
                                    <td>{{ $s->nama_supplier }}</td>
                                    <td>{{ $s->lokasi_supplier }}</td>
                                    <td>{{ $s->kontak_supplier }}</td>

                                    <td>
                                        <center>
                                            <form action="{{ route('edit_supplier_page', $s->id) }}" method="GET"
                                                class="d-inline-block">
                                                @csrf
                                                <button class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </form>

                                            <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal"
                                                data-target="#modal-{{ $s->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-{{ $s->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Anda yakin ingin menghapus?</h5>
                                                            <form action="{{ route('hapus_supplier', $s->id) }}"
                                                                method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('delete')
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/datatables-demo.js') }}"></script>
@endsection
