@extends('layouts.pimpinan')

@section('content')
    <div class="container-fluid">
        <div class="p-3">
            <a href="{{ route('tambah_staff_page') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa-solid fa-plus"></i>
                </span>
                <span class="text">Tambah Staff</span>
            </a>
        </div>

        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Dibuat</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staff as $s)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                    style="width: 45px; height: 45px" class="rounded-circle mr-3" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">{{ $s->name }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $s->email }}</p>
                        </td>

                        <td>{{ $s->created_at->format('Y-m-d') }}</td>
                        <td>

                            {{-- <a href="#" class="btn btn-warning btn-circle btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a> --}}

                            <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal"
                                data-target="#modal-{{ $s->id }}">
                                <i class="fas fa-trash"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $s->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Anda yakin ingin menghapus?</h5>
                                            <form action="{{ route('hapus_staff', $s->id) }}" method="POST"
                                                class="d-inline-block">
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
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
@endsection
