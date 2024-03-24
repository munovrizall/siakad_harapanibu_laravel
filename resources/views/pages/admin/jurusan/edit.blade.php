@extends('layouts.app')

@section('title', 'Edit Jurusan')

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
            <h1>Edit Jurusan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/admin-home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/jurusan') }}">Jurusan</a></div>
                <div class="breadcrumb-item">Edit Jurusan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Jurusan</h2>
            <p class="section-lead">
                Anda dapat mengubah data jurusan untuk digunakan pada sistem ini.
            </p>
            <div class="card">
                <form action="{{ route('jurusan.update', $jurusan) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Form Edit Jurusan</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Nama Jurusan <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('nama_jurusan')
                                is-invalid
                            @enderror" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}">
                            @error('nama_jurusan')
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