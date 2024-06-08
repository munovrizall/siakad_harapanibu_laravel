@extends('layouts.app')

@section('title', 'Nilai Pelajaran')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Nilai Pelajaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/nilai-pelajaran') }}">Nilai Pelajaran</a></div>
                <div class="breadcrumb-item">Semua Mata Pelajaran</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Nilai Pelajaran</h2>
            <p class="section-lead">
                Anda dapat melihat, mengubah, dan menghapus semua nilai mata pelajaran.
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
                                        <form method="GET" action="{{ route('nilai-pelajaran.index') }}">
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
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    @foreach ($jadwal_pelajarans as $jadwal_pelajaran)
                                    <tr>
                                        <td>{{ $jadwal_pelajaran->kelas->nama_kelas }}</td>
                                        <td>{{ $jadwal_pelajaran->matpel->nama_pelajaran }}</td>
                                        <td>

                                            <div class="d-flex justify-content-center">
                                                <a href='{{ route('nilai-pelajaran.beri-nilai', ['id_kelas' => $jadwal_pelajaran->id_kelas, 'id_matpel' => $jadwal_pelajaran->id_matpel]) }}' class="btn btn-sm btn-primary btn-icon" style="margin-right: 8px">
                                                    <i class="fas fa-edit"></i>
                                                    Beri Nilai
                                                </a>
                                            </div>

                                        </td>
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