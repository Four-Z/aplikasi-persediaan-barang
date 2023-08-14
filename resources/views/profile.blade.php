@extends($layout)

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px"
                        src="{{ asset('foto_profile/' . $user->foto_profile) }}"><span
                        class="font-weight-bold">{{ $user->name }}</span><span
                        class="text-black-50">{{ $user->email }}</span><span>
                    </span>
                </div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Pengaturan Profile</h4>
                    </div>
                    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="name"
                                    value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Email</label>
                                <input type="text" class="form-control" placeholder="email" name="email"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="labels">Role</label>
                                @if ($user->role == 0)
                                    <input type="text" class="form-control" placeholder="role" value="staff" disabled>
                                @else
                                    <input type="text" class="form-control" placeholder="role" value="pimpinan" disabled>
                                @endif
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="labels">Foto (optional)</label>
                                <input type="file" class="form-control" name="foto_profile" accept="image/*" />
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
@endsection
