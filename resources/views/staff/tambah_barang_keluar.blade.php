@extends('layouts.staff')

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
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 border">
                <div class="p-3 py-5">
                    <div class="d-flex mb-3">
                        <h4>&nbsp;Tambah Barang keluar</h4>
                    </div>
                    @csrf
                    <div class="row mt-2">
                        <div class="form-group col-md-6 mb-3">
                            <label for="nama_barang">Barang</label>
                            <select class="form-control" id="nama_barang">
                                @foreach ($barang as $b)
                                    <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-2 mb-4">
                            <label class="labels">Jumlah</label>
                            <input type="text" class="form-control" value="0" name="jumlah_barang"
                                id="jumlah_barang" required />
                        </div>
                        <div class="form-group col-md-2 mt-4">
                            <button type="button" class="btn btn-primary mt-2" style="width: 200px"
                                onclick="add()">Tambahkan</button>
                        </div>
                    </div>

                    <hr>

                    <form action="{{ route('tambah_barang_keluar') }}" method="POST">
                        @csrf
                        <div id="barang">
                            {{-- field daftar barang --}}
                        </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 border">
                <div class="p-3 py-5">
                    <div class="d-flex mb-3">
                        <h4>&nbsp;Detail Barang Keluar</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-md-4 mb-3">
                            <label for="datepicker">Tanggal</label>
                            <div class="input-group date" id="datepicker">
                                <input type="text" class="form-control" name="tanggal" placeholder="tanggal...">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label for="exampleFormControlSelect1">Supplier</label>
                            <select class="form-control" name="supplier">
                                @foreach ($supplier as $s)
                                    <option value="{{ $s->id }}">{{ $s->nama_supplier }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-2 mb-3">
                            <label for="staff">Staff</label>
                            <input type="text" class="form-control" value="{{ $staff->id }}" name="staff" required
                                readonly hidden />
                            <input type="text" class="form-control" value="{{ $staff->name }}" required readonly />
                        </div>

                    </div>

                    <div class="row mt-2">
                        <div class="form-group col-md-4 mb-3">
                            <label for="catatan">Catatan</label>
                            <textarea name="catatan"class="form-control  @error('catatan') is-invalid @enderror" rows="5"
                                placeholder="catatan..." required></textarea>

                            @error('catatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 border">
                <div class="p-3">
                    <center>
                        <button type="submit" class="btn btn-success mt-2" style="width: 200px">TAMBAH</button>
                        </form>
                        <a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger mt-2"
                                style="width: 200px">BATAL</button></a>

                    </center>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/tambahBarang.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
@endsection
