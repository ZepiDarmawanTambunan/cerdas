<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('home')}}">
            <img src="{{asset('adminkit-3.1.0/images/logo.png')}}" alt="logo" width="50" height="50">
            <span class="align-middle">Cerdas</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Fitur
            </li>

            <li class="sidebar-item {{ Route::is('home') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('home')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Home</span>
                </a>
            </li>

            <li class="sidebar-item {{ Route::is('cet*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('cet')}}">
                    <i class="align-middle" data-feather="book"></i>
                    <span class="align-middle">
                        Cetakan
                    </span>
                </a>
            </li>

            {{-- <li class="sidebar-header">
                Master
            </li>

            <li class="sidebar-item {{ Route::is('pasien*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('pasien')}}">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Pasien</span>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
