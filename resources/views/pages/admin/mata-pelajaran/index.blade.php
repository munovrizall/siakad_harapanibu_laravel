@extends('layouts.app')

@section('title', 'Mata Pelajaran')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Mata Pelajaran</h1>
            <div class="section-header-button">
                <a href="{{ route('mata-pelajaran.create') }}" class="btn btn-primary"> <i class="fas fa-plus" style="margin-right: 8px;"></i>Tambah Mata Pelajaran</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/admin-home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/mata-pelajaran') }}">Mata Pelajaran</a></div>
                <div class="breadcrumb-item">Semua Mata Pelajaran</div>
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
            <h2 class="section-title">Data Mata Pelajaran</h2>
            <p class="section-lead">
                Anda dapat mengatur semua mata pelajaran, seperti membuat, mengubah, menghapus mata pelajaran.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5>Semua Mata Pelajaran</h5>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <form method="GET" action="{{ route('mata-pelajaran.index') }}">
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

                                        <th>Nama Mata Pelajaran</th>
                                        <th>KKM</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    @foreach ($mata_pelajarans as $mata_pelajaran)
                                    <tr>

                                        <td>{{ $mata_pelajaran->nama_pelajaran }}
                                        <td>{{ $mata_pelajaran->kkm }}
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href='{{ route('mata-pelajaran.edit', $mata_pelajaran->id) }}' class="btn btn-sm btn-info btn-icon">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>

                                                <form action="{{ route('mata-pelajaran.destroy', $mata_pelajaran->id) }}" method="POST" class="ml-2">
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
                                {{ $mata_pelajarans->withQueryString()->links() }}
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