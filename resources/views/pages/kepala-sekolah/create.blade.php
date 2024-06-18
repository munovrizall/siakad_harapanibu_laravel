@extends('layouts.app')

@section('title', 'Tambah Kepala Sekolah')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kepala Sekolah</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/kepala-sekolah') }}">Kepala Sekolah</a></div>
                <div class="breadcrumb-item">Tambah Kepala Sekolah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah Kepala Sekolah</h2>
            <p class="section-lead">
                Anda dapat menambah kepala sekolah untuk digunakan pada sistem ini.
            </p>
            <div class="card">
                <form action="{{ route('kepala-sekolah.store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4>Form Penambahan Kepala Sekolah</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kepala Sekolah <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('nama')
                                is-invalid
                            @enderror" name="nama">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>NIP Kepala Sekolah <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('nip')
                                is-invalid
                            @enderror" name="nip">
                            @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin <span style="color: red;">*</span></label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">Laki-laki</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="selectgroup-input">
                                    <span class="selectgroup-button">Perempuan</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('alamat')
                                is-invalid
                            @enderror" name="alamat">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No. Telepon <span style="color: red;">*</span></label>
                            <input type="number" class="form-control @error('no_telepon')
                                is-invalid
                            @enderror" name="no_telepon">
                            @error('no_telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email <span style="color: red;">*</span></label>
                            <input type="email" class="form-control @error('email')
                                is-invalid
                            @enderror" name="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control @error('password')
                                is-invalid
                            @enderror" name="password">
                            </div>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection

@push('scripts')
@endpush