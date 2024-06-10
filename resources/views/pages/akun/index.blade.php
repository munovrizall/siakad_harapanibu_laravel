@extends('layouts.app')

@section('title', 'Akun Pengguna')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Akun Pengguna</h1>
            <div class="section-header-button">
                <a href="{{ route('akun.create') }}" class="btn btn-primary"> <i class="fas fa-plus" style="margin-right: 8px;"></i>Buat Akun</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/akun') }}">Akun</a></div>
                <div class="breadcrumb-item">Semua Akun</div>
            </div>
        </div>
        <div class="section-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            @if (session('danger'))
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('danger') }}
                </div>
            </div>
            @endif
            {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}
            <h2 class="section-title">Akun Pengguna</h2>
            <p class="section-lead">
                Anda dapat mengatur semua pengguna, seperti membuat, mengubah, menghapus akun.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5>Semua Akun</h5>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <form method="GET" action="{{ route('akun.index') }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search" name="name">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>

                                        <th>Nama Pengguna</th>
                                        <th>Email</th>
                                        <th>Jenis Akun</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    @foreach ($users as $user)
                                    <tr>

                                        <td>{{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->getRoleNames()->implode(', ') }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href='{{ route('akun.edit', $user->id) }}' class="btn btn-sm btn-info btn-icon">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>

                                                <form action="{{ route('akun.destroy', $user->id) }}" method="POST" class="ml-2">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                        <i class="fas fa-times"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                            <div class="float-right">
                                {{ $users->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush