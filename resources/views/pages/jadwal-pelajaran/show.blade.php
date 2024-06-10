@extends('layouts.app')

@section('title', 'Jadwal Kelas')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Jadwal Kelas {{ $kelas->nama_kelas }}</h1>
            <div class="section-header-button">
                <a href="{{ route('jadwal-pelajaran.tambah', $kelas->id) }}" class="btn btn-primary"> <i class="fas fa-plus" style="margin-right: 8px;"></i>Tambah Jadwal</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/jadwal-pelajaran') }}">Jadwal Pelajaran</a></div>
                <div class="breadcrumb-item">Semua Jadwal {{ $kelas-> nama_kelas }}</div>
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
            <h2 class="section-title">Jadwal Pelajaran</h2>
            <p class="section-lead">
                Anda dapat mengatur semua jadwal pelajaran pada kelas ini, seperti membuat, mengubah, menghapus jadwal.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5>Semua Jadwal</h5>
                                </div>
                            </div>


                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>

                                        <th>Hari</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Guru</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    @foreach ($jadwal_pelajarans as $jadwal_pelajaran)
                                    <tr>

                                        <td>{{ $jadwal_pelajaran->hari }}
                                        <td>{{ $jadwal_pelajaran->jam_mulai }}
                                        <td>{{ $jadwal_pelajaran->jam_selesai }}
                                        <td>{{ $jadwal_pelajaran->matpel->nama_pelajaran }}</td>
                                        <td>{{ $jadwal_pelajaran->guru->nama_guru }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('jadwal-pelajaran.ubah', [$kelas->id, $jadwal_pelajaran->id]) }}" class="btn btn-sm btn-info btn-icon">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>

                                                <form action="{{ route('jadwal-pelajaran.destroy', $jadwal_pelajaran->id) }}" method="POST" class="ml-2">
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
                                {{ $jadwal_pelajarans->withQueryString()->links() }}
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" onclick="window.history.back()">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </button>
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