@extends('layouts.app')

@section('title', 'Edit Siswa')

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
            <h1>Edit Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/admin-home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/siswa') }}">Siswa</a></div>
                <div class="breadcrumb-item">Edit Siswa</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Siswa</h2>
            <p class="section-lead">
                Anda dapat mengubah data siswa untuk digunakan pada sistem ini.
            </p>
            <div class="card">
                <form action="{{ route('siswa.update', $siswa) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Form Edit Siswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Siswa <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('nama_siswa')
                                is-invalid
                            @enderror" name="nama_siswa" value="{{ $siswa->nama_siswa }}">
                            @error('nama_siswa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>NIP Siswa <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('nis')
                                is-invalid
                            @enderror" name="nis" value="{{ $siswa->nis }}">
                            @error('nis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kelas <span style="color: red;">*</span></label>
                            <select class="form-control select2 @error('id_kelas') is-invalid @enderror" name="id_kelas">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach ($kelases as $kelas)
                                <option value="{{ $kelas->id }}" {{ $kelas->id == $siswa->id_kelas ? 'selected' : '' }}>
                                    {{ $kelas->nama_kelas }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin <span style="color: red;">*</span></label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" class="selectgroup-input" @if ($siswa->jenis_kelamin == 'Laki-laki') checked @endif>
                                    <span class="selectgroup-button">Laki-laki</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="selectgroup-input" @if ($siswa->jenis_kelamin == 'Perempuan') checked @endif>
                                    <span class="selectgroup-button">Perempuan</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('alamat')
                                is-invalid
                            @enderror" name="alamat" value="{{ $siswa->alamat }}">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No. Telepon <span style="color: red;">*</span></label>
                            <input type="text" class="form-control @error('no_telepon')
                                is-invalid
                            @enderror" name="no_telepon" value="{{ $siswa->no_telepon }}">
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