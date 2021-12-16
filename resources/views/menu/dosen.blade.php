<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            <ul class="nav nav-success">
                <li class="nav-item {{ ($title === "Dashboard") ? 'active' : '' }}">
                    <a href="/dosen" class="" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ ($title === "Materi") ? 'active' : '' }}">
                    <a href="/dosen/materi" class="" aria-expanded="false">
                        <i class="fas fa-book"></i>
                        <p>Materi</p>
                    </a>
                </li>

                <li class="nav-item {{ ($title === "Hasil Evaluasi") ? 'active' : '' }}">
                    <a href="/dosen/evaluasi" class="" aria-expanded="false">
                        <i class="fas fa-bookmark"></i>
                        <p>Hasil Evaluasi</p>
                    </a>
                </li>

                {{-- <li class="nav-item {{ ($title === "Matakuliah") ? 'active' : '' }}">
                    <a href="/dosen/matakuliah" class="" aria-expanded="false">
                        <i class="fas fa-book-reader"></i>
                        <p>Hasil Evaluasi</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item {{ ($title === "Kelas Perkuliahan") ? 'active' : '' }}">
                    <a href="/admin/materi" class="" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                        <p>Kelas Perkuliahan</p>
                    </a>
                </li> --}}

            </ul>
        </div>
    </div>
</div>
