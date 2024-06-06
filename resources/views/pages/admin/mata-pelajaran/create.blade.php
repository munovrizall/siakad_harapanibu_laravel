@extends('layouts.app')

@section('title', 'Tambah Mata Pelajaran')

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
            <h1>Tambah Mata Pelajaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/mata-pelajaran') }}">Mata Pelajaran</a></div>
                <div class="breadcrumb-item">Tambah Mata Pelajaran</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah Mata Pelajaran</h2>
            <p class="section-lead">
                Anda dapat menambah mata pelajaran untuk digunakan pada sistem ini.
            </p>
            <div class="card">
                <form action="{{ route('mata-pelajaran.store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4>Form Penambahan Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Nama Mata Pelajaran <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('nama_pelajaran')
                                is-invalid
                            @enderror" name="nama_pelajaran">
                            @error('nama_pelajaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>KKM <span style="color: red;">*</span></label>
                            <input type="number" class="form-control @error('kkm')
                                is-invalid
                            @enderror" name="kkm">
                            @error('kkm')
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