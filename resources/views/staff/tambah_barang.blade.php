@extends('layouts.staff')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-5 border">
            <div class="p-3 py-5">
                <div class="d-flex mb-3">
                    <a href="{{ URL::previous() }}"><button type="button" class="btn btn-outline-primary">Back</button></a>
                    <h4>&nbsp;Tambah Barang</h4>

                </div>
                <form action="{{ route('tambah_barang') }}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-12 mb-3">
                            <label class="labels">Nama Barang</label>
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                placeholder="nama barang..." name="nama_barang" required />
                            @error('nama_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="labels">Harga Barang</label>
                            <input type="number" class="form-control @error('harga_barang') is-invalid @enderror"
                                placeholder="harga barang..." name="harga_barang" required />
                            @error('harga_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="col-md-12 mb-3"><label class="labels">Stok Barang</label>
                            <input type="number" class="form-control @error('stok_barang') is-invalid @enderror"
                                placeholder="stok barang..." value="0" name="stok_barang" required />

                            @error('stok_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                    </div>

                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                            type="sumbit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
