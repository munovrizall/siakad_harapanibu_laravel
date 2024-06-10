@extends('layouts.app')

@section('title', 'Laporan Nilai')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Nilai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/laporan-penilaian') }}">Laporan Penilaian</a></div>
                <div class="breadcrumb-item">Semua Nilai</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Laporan Penilaian {{ $siswa->nama_siswa}}</h2>
            <p class="section-lead">
                Anda dapat melihat nilai {{ $siswa->nama_siswa }} pada semua mata pelajaran.
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
                                        <a href="{{ route('laporan-penilaian.cetak-pdf') }}" class="btn btn-info"><i class="fas fa-file-pdf"></i> Lihat PDF</a>

                                    </div>
                                </div>
                            </div>


                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th>Mata Pelajaran</th>
                                        <th>Nilai UTS</th>
                                        <th>Nilai UAS</th>
                                        <th>Nilai Rapot</th>
                                    </tr>
                                    @foreach ($nilai_pelajarans as $nilai_pelajaran)
                                    <tr>
                                        <td>{{ $nilai_pelajaran->mataPelajaran->nama_pelajaran }}</td>
                                        <td>{{ $nilai_pelajaran->uts }}</td>
                                        <td>{{ $nilai_pelajaran->uas }}</td>
                                        <td>{{ $nilai_pelajaran->nilai }}</td>
                                    </tr>
                                    @endforeach

                                </table>
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