@extends('layouts.app')

@section('title', 'Data Siswa')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h1>Biodata Siswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('/home') }}">Home</a></div>
                    <div class="breadcrumb-item"><a href="{{ url('/biodata-siswa') }}">Biodata Siswa</a></div>
                    <div class="breadcrumb-item">Biodata {{$siswa->nama_siswa}}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <!-- Ikon User Profile -->
                            <i class="fas fa-user-circle mb-4" style="font-size: 120px; color: #6c757d;"></i>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Nomor Induk:</th>
                                            <td>{{ $siswa->nis }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama:</th>
                                            <td>{{ $siswa->nama_siswa }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin:</th>
                                            <td>{{ $siswa->jenis_kelamin }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Alamat:</th>
                                            <td>{{ $siswa->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th>No Telepon:</th>
                                            <td>{{ $siswa->no_telepon }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ $siswa->email }}</td>
                                        </tr>
                                    </table>
                                </div>
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