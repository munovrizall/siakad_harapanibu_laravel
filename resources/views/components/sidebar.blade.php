<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/home') }}">Siakad - Harapan Ibu</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/home') }}">HI</a>
        </div>

        <ul class="sidebar-menu">
            
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i> <span>Home</span></a>
            </li>
            
            <li class="{{ Request::is('data-guru') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/data-guru') }}"><i class="fas fa-user"></i> <span>Data Guru</span></a>
            </li>
           
            <li class="{{ Request::is('data-siswa') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/data-siswa') }}"><i class="fas fa-user"></i> <span>Data Siswa</span></a>
            </li>
            
            <li class="{{ Request::is('mata-pelajaran') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/mata-pelajaran') }}"><i class="fas fa-book"></i> <span>Mata Pelajaran</span></a>
            </li>
            
            <li class="{{ Request::is('jadwal-pelajaran') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/jadwal-pelajaran') }}"><i class="fas fa-book"></i> <span>Jadwal Pelajaran</span></a>
            </li>
            
            <li class="{{ Request::is('nilai-pelajaran') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/nilai-pelajaran') }}"><i class="fas fa-book"></i> <span>Nilai Pelajaran</span></a>
            </li>
            
        </ul>

    </aside>
</div>