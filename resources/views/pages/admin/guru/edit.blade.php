@extends('layouts.app')

@section('title', 'Edit Guru')

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
            <h1>Edit Guru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/admin-home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/guru') }}">Guru</a></div>
                <div class="breadcrumb-item">Edit Guru</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Guru</h2>
            <p class="section-lead">
                Anda dapat mengubah data guru untuk digunakan pada sistem ini.
            </p>
            <div class="card">
                <form action="{{ route('guru.update', $guru) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Form Edit Guru</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Guru <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('nama_guru')
                                is-invalid
                            @enderror" name="nama_guru" value="{{ $guru->nama_guru }}">
                            @error('nama_guru')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>NIP Guru <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('nip')
                                is-invalid
                            @enderror" name="nip" value="{{ $guru->nip }}">
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
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" class="selectgroup-input" @if ($guru->jenis_kelamin == 'Laki-laki') checked @endif>
                                    <span class="selectgroup-button">Laki-laki</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="selectgroup-input" @if ($guru->jenis_kelamin == 'Perempuan') checked @endif>
                                    <span class="selectgroup-button">Perempuan</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('alamat')
                                is-invalid
                            @enderror" name="alamat" value="{{ $guru->alamat }}">
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
                            @enderror" name="no_telepon" value="{{ $guru->no_telepon }}">
                            @error('no_telepon')
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