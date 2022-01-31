@php
// Create Image Blob
@endphp

<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link @if (Route::current()->getName() == 'dashboard') active @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                        User
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('registration') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Peserta
                    </p>
                </a>
            </li>
{{-- 
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Kepengurusan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('member') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Anggota</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('office') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pengurus</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('division') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Bidang</p>
                        </a>
                    </li>
                </ul>
            </li> --}}

            <li class="nav-header">LAINNYA</li>

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        HOME
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-link text-left text-warning nav-link btn-secondary">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            KELUAR
                        </p>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->

</div>
