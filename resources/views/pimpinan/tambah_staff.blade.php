@extends('layouts.pimpinan')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-5 border">
            <div class="p-3 py-5">
                <div class="d-flex mb-3">
                    <a href="{{ URL::previous() }}"><button type="button" class="btn btn-outline-primary">Back</button></a>
                    <h4>&nbsp;Tambah Staff</h4>

                </div>
                <form action="{{ route('tambah_staff') }}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-12 mb-3">
                            <label class="labels">Nama Staff</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="nama staff..." name="name" required />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="labels">Email Staff</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                placeholder="nama staff..." name="email" required />
                            @error('email')
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
