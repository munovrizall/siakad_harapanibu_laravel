<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/home') }}">Siakad - Harapan Ibu</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/home') }}">HI</a>
        </div>

        @role('admin')
        <ul class="sidebar-menu">
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i> <span>Home</span></a>
            </li>

            <li class="{{ Request::is('jadwal-pelajaran*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/jadwal-pelajaran') }}"><i class="fas fa-calendar-week"></i> <span>Jadwal Pelajaran</span></a>
            </li>

            <li class="{{ Request::is('mata-pelajaran*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/mata-pelajaran') }}"><i class="fas fa-book"></i> <span>Mata Pelajaran</span></a>
            </li>

            <li class="{{ Request::is('siswa*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/siswa') }}"><i class="fas fa-user-group"></i> <span>Data Siswa</span></a>
            </li>

            <li class="{{ Request::is('guru*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/guru') }}"><i class="fas fa-chalkboard-user"></i> <span>Data Guru</span></a>
            </li>

            <li class="{{ Request::is('kepala-sekolah*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/kepala-sekolah') }}"><i class="fas fa-user-tie"></i> <span>Data Kepala Sekolah</span></a>
            </li>

            <li class="{{ Request::is('kelas*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/kelas') }}"><i class="fas fa-chalkboard"></i> <span>Data Kelas</span></a>
            </li>

            <li class="{{ Request::is('jurusan*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/jurusan') }}"><i class="fas fa-school"></i> <span>Data Jurusan</span></a>
            </li>

            <li class="{{ Request::is('akun*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/akun') }}"><i class="fas fa-user-gear"></i> <span>Akun Pengguna</span></a>
            </li>
        </ul>
        @endrole

        @role('guru')
        <ul class="sidebar-menu">
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i> <span>Home</span></a>
            </li>

            <li class="{{ Request::is('jadwal-mengajar*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/jadwal-mengajar') }}"><i class="fas fa-calendar-week"></i> <span>Jadwal Mengajar</span></a>
            </li>

            <li class="{{ Request::is('nilai-pelajaran*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/nilai-pelajaran') }}"><i class="fas fa-apple-whole"></i> <span>Nilai Pelajaran</span></a>
            </li>

            <li class="{{ Request::is('biodata-guru') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/biodata-guru') }}"><i class="fas fa-user"></i> <span>Biodata Guru</span></a>
            </li>
        </ul>
        @endrole

        @role('siswa')
        <ul class="sidebar-menu">
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i> <span>Home</span></a>
            </li>

            <li class="{{ Request::is('laporan-penilaian') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/laporan-penilaian') }}"><i class="fas fa-book"></i> <span>Laporan Penilaian</span></a>
            </li>
           
            <li class="{{ Request::is('biodata-siswa') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/biodata-siswa') }}"><i class="fas fa-user"></i> <span>Biodata Siswa</span></a>
            </li>

        </ul>
        @endrole

        @role('kepala sekolah')
        <ul class="sidebar-menu">
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i> <span>Home</span></a>
            </li>

            <li class="{{ Request::is('siswa*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/siswa') }}"><i class="fas fa-user-group"></i> <span>Data Siswa</span></a>
            </li>

            <li class="{{ Request::is('guru*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/guru') }}"><i class="fas fa-chalkboard-user"></i> <span>Data Guru</span></a>
            </li>
            
            <li class="{{ Request::is('laporan-akademik*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/laporan-akademik') }}"><i class="fas fa-book"></i> <span>Laporan Akademik</span></a>
            </li>
        </ul>
        @endrole
    </aside>
</div>