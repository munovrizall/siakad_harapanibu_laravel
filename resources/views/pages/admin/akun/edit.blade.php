@extends('layouts.app')

@section('title', 'Edit Akun')

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
            <h1>Edit Akun</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/admin-home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/akun') }}">Akun</a></div>
                <div class="breadcrumb-item">Edit Akun</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Akun</h2>
            <p class="section-lead">
                Anda dapat mengubah akun yang digunakan pada sistem ini.
            </p>
            <div class="card">
                <form action="{{ route('akun.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Form Edit Akun</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Pengguna <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('name')
                                is-invalid
                            @enderror" name="name" value="{{ $user->name }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email <span style="color: red;">*</span></label>
                            <input type="email" class="form-control @error('email')
                                is-invalid
                            @enderror" name="email" value="{{ $user->email }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
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
                        <div class="form-group">
                            <label class="form-label">Jenis Akun</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="roles" value="ADMIN" class="selectgroup-input" @if ($user->roles == 'ADMIN') checked @endif>
                                    <span class="selectgroup-button">Admin</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="roles" value="GURU" class="selectgroup-input" @if ($user->roles == 'GURU') checked @endif>
                                    <span class="selectgroup-button">Guru</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="roles" value="SISWA" class="selectgroup-input" @if ($user->roles == 'SISWA') checked @endif>
                                    <span class="selectgroup-button">Siswa</span>
                                </label>
                            </div>
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