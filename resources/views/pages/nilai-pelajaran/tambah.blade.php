@extends('layouts.app')

@section('title', 'Input Nilai')

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
            <h1>Input Nilai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/nilai-pelajaran') }}">Nilai Pelajaran</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/nilai-pelajaran/beri-nilai/' . $id_kelas . '/' . $id_matpel) }}">Kelas {{ $nama_kelas }} {{ $nama_pelajaran }}</a></div>
                <div class="breadcrumb-item">Input Nilai</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Input Nilai {{ $nama_siswa }}</h2>
            <p class="section-lead">
                Anda dapat menginput nilai pelajaran {{ $nama_pelajaran }} {{ $nama_siswa }}.
            </p>
            <div class="card">
                <form action="{{ route('nilai-pelajaran.store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4>Form Input Nilai</h4>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id_siswa" value="{{ $id_siswa }}">
                        <input type="hidden" name="id_kelas" value="{{ $id_kelas }}">
                        <input type="hidden" name="id_matpel" value="{{ $id_matpel }}">

                        <div class="form-group">
                            <label>Nilai UTS</label>
                            <input type="number" class="form-control @error('uts')
                                is-invalid
                            @enderror" name="uts">
                            @error('uts')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nilai UAS</label>
                            <input type="number" class="form-control @error('uas')
                                is-invalid
                            @enderror" name="uas">
                            @error('uas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nilai Rapot</label>
                            <input type="number" class="form-control @error('nilai')
                                is-invalid
                            @enderror" name="nilai">
                            @error('nilai')
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