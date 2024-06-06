@extends('layouts.app')

@section('title', 'Jadwal Mengajar')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Jadwal Mengajar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/jadwal-mengajar') }}">Jadwal Mengajar</a></div>
                <div class="breadcrumb-item">Semua Jadwal</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Jadwal Mengajar {{ $guru->nama_guru}}</h2>
            <p class="section-lead">
                Anda dapat melihat semua jadwal mengajar.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5>Semua Jadwal</h5>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <form method="GET" action="{{ route('jadwal-mengajar.index') }}">
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
                                        <th>Kelas</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Hari</th>
                                        <th>Jam Mengajar</th>
                                    </tr>
                                    @foreach ($jadwal_pelajarans as $jadwal_pelajaran)
                                    <tr>
                                        <td>{{ $jadwal_pelajaran->kelas->nama_kelas }}</td>
                                        <td>{{ $jadwal_pelajaran->matpel->nama_pelajaran }}</td>
                                        <td>{{ $jadwal_pelajaran->hari }}
                                        <td>{{ $jadwal_pelajaran->jam_mulai }} - {{ $jadwal_pelajaran->jam_selesai }}</td>
                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                            <div class="float-right">
                                {{ $jadwal_pelajarans->withQueryString()->links() }}
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