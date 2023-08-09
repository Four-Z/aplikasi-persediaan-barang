@extends('layouts.staff')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-5 border">
            <div class="p-3 py-5">
                <div class="d-flex mb-3">
                    <a href="{{ URL::previous() }}"><button type="button" class="btn btn-outline-primary">Back</button></a>
                    <h4>&nbsp;Tambah Supplier</h4>

                </div>
                <form action="{{ route('tambah_supplier') }}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-12 mb-3">
                            <label class="labels">Nama Supplier</label>
                            <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror"
                                placeholder="nama supplier..." name="nama_supplier" required />
                            @error('nama_supplier')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="labels">Lokasi Supplier</label>
                            <textarea name="lokasi_supplier"class="form-control  @error('lokasi_supplier') is-invalid @enderror" rows="5"
                                placeholder="lokasi supplier..." required></textarea>
                            {{-- <input type="text" class="form-control @error('lokasi_supplier') is-invalid @enderror"
                                placeholder="lokasi supplier..." name="lokasi_supplier" required /> --}}

                            @error('lokasi_supplier')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="col-md-12 mb-3"><label class="labels">Kontak Supplier</label>
                            <input type="number" class="form-control @error('kontak_supplier') is-invalid @enderror"
                                placeholder="kontak supplier..." name="kontak_supplier" required />
                            @error('kontak_supplier')
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
        @endsection
