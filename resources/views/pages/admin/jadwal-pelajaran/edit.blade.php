@extends('layouts.app')

@section('title', 'Edit Jadwal')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Jadwal</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/admin-home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/jadwal-pelajaran') }}">Jadwal Pelajaran</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/jadwal-pelajaran/' . $kelas->id) }}">Semua Jadwal {{ $kelas->nama_kelas}}</a></div>
                <div class="breadcrumb-item">Edit Jadwal</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Jadwal</h2>
            <p class="section-lead">
                Anda dapat menambah jadwal kelas untuk digunakan pada sistem ini.
            </p>
            <div class="card">
                <form action="{{ route('jadwal-pelajaran.update', ['jadwal_pelajaran' => $jadwal_pelajaran->id, 'id_kelas' => $kelas->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Form Penambahan Jadwal</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label class="form-label">Kelas <span style="color: red;">*</span></label>
                            <select class="form-control select2 @error('id_kelas') is-invalid @enderror" disabled>
                                <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                            </select>
                            <input type="hidden" name="id_kelas" value="{{ $kelas->id }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Mata Pelajaran <span style="color: red;">*</span></label>
                            <select class="form-control select2 @error('id_matpel') is-invalid @enderror" name="id_matpel">
                                <option value="">-- Pilih Mata Pelajaran --</option>
                                @foreach ($pelajarans as $pelajaran)
                                <option value="{{ $pelajaran->id }}" {{ $pelajaran->id == $jadwal_pelajaran->id_matpel ? 'selected' : '' }}>
                                    {{ $pelajaran->nama_pelajaran }}
                                </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label class="form-label">Guru <span style="color: red;">*</span></label>
                            <select class="form-control select2 @error('id_guru') is-invalid @enderror" name="id_guru">
                                <option value="">-- Pilih Guru --</option>
                                @foreach ($gurus as $guru)
                                <option value="{{ $guru->id }}"  {{ $guru->id == $jadwal_pelajaran->id_guru ? 'selected' : '' }}>
                                    {{ $guru->nama_guru }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Hari <span style="color: red;">*</span></label>
                            <select class="form-control select2 @error('hari') is-invalid @enderror" name="hari">
                                <option value="">-- Pilih Hari --</option>
                                <option value="Senin" {{ $jadwal_pelajaran->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                                <option value="Selasa" {{ $jadwal_pelajaran->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                <option value="Rabu" {{ $jadwal_pelajaran->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                <option value="Kamis" {{ $jadwal_pelajaran->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                <option value="Jumat" {{ $jadwal_pelajaran->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="form-label">Jam Mulai <span style="color: red;">*</span></label>
                                <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $jadwal_pelajaran->jam_mulai }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Jam Selesai <span style="color: red;">*</span></label>
                                <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" name="jam_selesai" value="{{ $jadwal_pelajaran->jam_selesai }}">
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