@extends('layouts.staff')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="{{ route('stok_barang') }}">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Barang</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_barang }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="{{ route('data_supplier') }}">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Supplier</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_supplier }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-warehouse fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <a href="{{ route('barang_masuk') }}">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Barang Masuk
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_barang_masuk }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-truck-fast fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <a href="{{ route('barang_keluar') }}">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Barang Keluar</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_barang_keluar }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-truck-fast fa-flip-horizontal fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; CV Bangkit Berkah Elektronik</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
@endsection

@section('script')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
@endsection
