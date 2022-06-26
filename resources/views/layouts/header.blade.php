<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <div class="row">
                <div class="col-8">
                    <span class="logo">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                    <br>
                    <span class="lokasi">{{ Auth::user()->lokasi_kerja }}</span>
                </div>
                <div class="col-4">
                    <img class="image" src="{{ asset ('imgUser/' .Auth::user()->gb_user) }}" alt="" >
                </div>
            </div>
        </a>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item" >
                    <a class="nav-user" href="{{ route('user.show', Auth::user()->id) }}">
                        {{ Auth::user()->name }}
                        <br>
                        {{ Auth::user()->jabatan }}
                        <br>
                        {{ Auth::user()->nik }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->is('user/show') ? 'active' : '' }}" href="{{ route('user.show', Auth::user()->id) }}">
                        <img class="navImage" src="{{ asset ('imgUser/' .Auth::user()->gb_user) }}" alt="" >
                    </a>
                </li>

                <li class="nav-menu">
                    <a class="nav-menu-item" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        <i class="fa-solid fa-bars "></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>