<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
    </button>
    <div class="offcanvas-header">
        <img class="image" src="{{ asset ('imgUser/' .Auth::user()->gb_user) }}" alt="" >
        <div class="subJudul">
            <a href="#" class="profil">
                {{ Auth::user()->panggilan }}
            </a>
        </div>
    </div>
    <div class="offcanvas-body">
        <ul class="menu-profil">
            <li class="item">
                <span>
                    {{ Auth::user()->name }}
                </span>
            </li>
            <li class="item">
                <span>
                    {{ Auth::user()->email }}
                </span>
            </li>
            <li class="item">
                <span>
                    {{ Auth::user()->nik }}
                </span>
            </li>
            <li class="item">
                <span>
                    {{ Auth::user()->jabatan }}
                </span>
            </li>
            <li class="item">
                <span>
                    {{ Auth::user()->lokasi_kerja }}
                </span>
            </li>
            <li class="tombol">
                <a class="btn btn-primary" href="{{ route('user.show', Auth::user()->id) }}">Selengkapnya .....</a>
            </li>
        </ul>
        <ul class="menu-item">
            <li class="item">
                <a class="nav-item {{request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <span class="fa-solid fa-house"></span>
                    Home
                </a>
            </li>

            <li class="item">
                @if (Auth::check() && Auth::user()->jabatan == 'Pengawas Petugas Parkir')
                    <a class="nav-item {{request()->is('user') ? 'active' : '' }}" href="{{ route('user.index') }}">
                        <span class="fas fa-solid fa-user"></span>
                        User    
                    </a>
                @elseif (Auth::check() && Auth::user()->jabatan == 'Central Park Manager')
                    <a class="nav-item {{request()->is('user') ? 'active' : '' }}" href="{{ route('user.index') }}">
                        <span class="fas fa-solid fa-user"></span>
                        User    
                    </a>
                @else (Auth::check() && Auth::user()->jabatan == 'Staff Petugas Parkir')
                    
                @endif

            
            </li>

            <li class="item">
                <a href="#" class="mobil">
                    <span class="fa-solid fa-car"></span>
                    Mobil
                    <i class="fa-solid fa-circle-chevron-down rotate-mobil"></i>
                </a>
                <ul class="sub-item mobil-show">
                    <li>
                        <form action="{{route('mobil.index')}}" method="GET" class="d-flex">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari Data Kendaraan Mobil" name="cari" id="cari">
                                <button class="btn btn-outline-primary" id="cari" type="submit">Search</button>
                            </div>
                        </form>
                    </li>
                    <li>
                        <a class="ukuran-latop {{request()->is('mobil') ? 'active' : '' }}" href="{{route('mobil.index')}}">Data Mobil</a>
                    </li>
                    <li>
                        @if (Auth::check() && Auth::user()->jabatan == 'Pengawas Petugas Parkir')
                            <a class="{{request()->is('mobil/create') ? 'active' : '' }}" href="{{route('mobil.create')}}">Tambah Data Mobil</a>
                        @elseif (Auth::check() && Auth::user()->jabatan == 'Staff Petugas Lapangan')
                            <a class="{{request()->is('mobil/create') ? 'active' : '' }}" href="{{route('mobil.create')}}">Tambah Data Mobil</a>
                        @else (Auth::check() && Auth::user()->jabatan == 'Central Park Manager')
                        @endif
                    </li>
                </ul>
            </li>

            <li class="item">
                <a href="#" class="motor">
                    <span class="fa-solid fa-motorcycle"></span>
                    Motor
                    <i class="fa-solid fa-circle-chevron-down rotate-motor"></i>
                </a>
                <ul class="sub-item motor-show" >
                    <li>
                        <form action="{{route('motor.index')}}" method="GET">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari Data Kendaraan Motor" name="cari" id="cari">
                                <button class="btn btn-outline-success" id="cari" type="submit">Search</button>
                            </div>
                        </form>
                    </li>
                    <li>
                        <a class="ukuran-latop {{request()->is('motor') ? 'active' : '' }}" href="{{route('motor.index')}}">Data Motor</a>
                    </li>
                    <li>
                        @if (Auth::check() && Auth::user()->jabatan == 'Pengawas Petugas Parkir')
                            <a class="{{request()->is('motor/create') ? 'active' : '' }}" href="{{route('motor.create')}}">Tambah Data Motor</a>
                        @elseif (Auth::check() && Auth::user()->jabatan == 'Staff Petugas Lapangan')
                            <a class="{{request()->is('motor/create') ? 'active' : '' }}" href="{{route('motor.create')}}">Tambah Data Motor</a>
                        @else (Auth::check() && Auth::user()->jabatan == 'Central Park Manager')
                        @endif
                    </li>
                </ul>
            </li>

            @if (Auth::check() && Auth::user()->jabatan == 'Pengawas Petugas Parkir')
                <li class="item">
                    <a class="nav-item {{request()->is('problem') ? 'active' : '' }}" href="{{ route('problem.index') }}">
                        <span class="fa-solid fa-triangle-exclamation"></span>
                        Problem
                    </a>
                </li>
            @elseif (Auth::check() && Auth::user()->jabatan == 'Central Park Manager')
                <li class="item">
                    <a class="nav-item {{request()->is('problem') ? 'active' : '' }}" href="{{ route('problem.index') }}">
                        <span class="fa-solid fa-triangle-exclamation"></span>
                        Problem
                    </a>
                </li>    
            @else (Auth::check() && Auth::user()->jabatan == 'Staff Petugas Parkir')
                {{--  kosong  --}}
            @endif



            <li class="item">
                <a class="nav-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <span class="fa-solid fa-right-from-bracket"></span>
                    {{ __('Logout') }}                    
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>