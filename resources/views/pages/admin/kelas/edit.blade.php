@extends('layouts.app')

@section('title', 'Edit Kelas')

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
            <h1>Edit Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/admin-home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/kelas') }}">Kelas</a></div>
                <div class="breadcrumb-item">Edit Kelas</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Kelas</h2>
            <p class="section-lead">
                Anda dapat mengubah data kelas untuk digunakan pada sistem ini.
            </p>
            <div class="card">
                <form action="{{ route('kelas.update', $kelas) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Form Edit Kelas</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Nama Kelas <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('nama_kelas')
                                is-invalid
                            @enderror" name="nama_kelas" value="{{ $kelas->nama_kelas }}">
                            @error('nama_kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jurusan</label>
                            <select class="form-control select2 @error('id_jurusan') is-invalid @enderror" name="id_jurusan">
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach ($jurusans as $jurusan)
                                <option value="{{ $jurusan->id }}" {{ $kelas->id_jurusan == $jurusan->id ? 'selected' : '' }}>
                                    {{ $jurusan->nama_jurusan }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kapasitas Kelas <span style="color: red;">*</span></label>
                            <input type="number" class="form-control @error('kapasitas')
                                is-invalid
                            @enderror" name="kapasitas" value="{{ $kelas->kapasitas }}">
                            @error('kapasitas')
                            <div class=" invalid-feedback">
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