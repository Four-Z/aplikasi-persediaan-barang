@extends('layouts.staff')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-5 border">
            <div class="p-3 py-5">
                <div class="d-flex mb-3">
                    <a href="{{ URL::previous() }}"><button type="button" class="btn btn-outline-primary">Back</button></a>
                    <h4 class="text-left">&nbsp;Tambah Barang</h4>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-12 mb-3">
                            <label class="labels">Nama Barang</label>
                            <input type="text" class="form-control" placeholder="nama barang..." name="nama_barang"
                                required />
                        </div>
                        @error('nama_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="col-md-12 mb-3">
                            <label class="labels">Harga Barang</label>
                            <input type="number" class="form-control" placeholder="harga barang..." name="harga_barang"
                                required />
                        </div>

                        @error('harga_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="col-md-12 mb-3"><label class="labels">Stok Barang</label>
                            <input type="number" class="form-control" placeholder="stok barang..." value="0"
                                name="stok_barang" required />
                        </div>

                        @error('stok_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                            type="sumbit">Tambah</button>
                </form>
            </div>
        @endsection
