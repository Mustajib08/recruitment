<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRyC7UCKxmA-cQoC9jg1ad3b1E3lPRv9U7Qw&s"
                        alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ auth()->user()->nama }}</span>
                    <span class="text-secondary text-small">Super Admin</span>
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('kategori_loker') }}">
                <span class="menu-title">Kategori Loker</span>
                <i class="mdi mdi-file-document menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('kelola_loker') }}">
                <span class="menu-title">Kelola Loker</span>
                <i class="mdi mdi-file-document menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('kelola_pelamar') }}">
                <span class="menu-title">Kelola Pelamar</span>
                <i class="mdi mdi-account-multiple-outline menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pengguna') }}">
                <span class="menu-title">Pengguna</span>
                <i class="mdi mdi-account-multiple-outline menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
