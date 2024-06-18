@extends('layouts.app')

@section('title', 'Lihat Nilai')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
<style>
    /* CSS untuk mengubah warna latar belakang pada elemen Select2 ketika dihover */
    .select2-container--default .select2-results__option--highlighted[aria-selected],
    .select2-container--default .select2-results__option--highlighted[data-selected] {
        background-color: #fbbd0d !important;
    }
</style>
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Nilai {{ $mata_pelajaran->nama_pelajaran }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/home') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/laporan-akademik') }}">Nilai Pelajaran</a></div>
                <div class="breadcrumb-item">Kelas {{ $kelas->nama_kelas }} {{ $mata_pelajaran->nama_pelajaran }}</div>
            </div>
        </div>

        <div class="section-body">

            @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            @if (session('danger'))
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('danger') }}
                </div>
            </div>
            @endif

            <h2 class="section-title">Kelas {{ $kelas->nama_kelas }}</h2>
            <p class="section-lead">
                Kapasitas Kelas : {{ $siswas->count() }}/{{ $kelas->kapasitas }}
            </p>
            <div class="card">
                <div class="table-responsive">
                    <table class="table-striped table">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nilai UTS</th>
                            <th>Nilai UAS</th>
                            <th>Nilai Rapot</th>
                        </tr>
                        @foreach ($siswas as $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{ $siswa->nama_siswa }}</td>
                            <td> {{ $siswa->uts }}</td>
                            <td> {{ $siswa->uas }}</td>
                            <td> {{ $siswa->nilai }}</td>
                           
                        </tr>
                        @endforeach

                    </table>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" onclick="window.history.back()">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                </div>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2();

    });

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
</script>
@endpush