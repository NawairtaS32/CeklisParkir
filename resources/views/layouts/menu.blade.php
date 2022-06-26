<div class="navbottom" id="navBottom">
    <ul class="nav nav-pills nav-fill fixed-top">
        <li class="nav-item">
            <a class="nav-link {{request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                <span>
                    <i class="fas fa-home fa-2x"></i>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->is('motor') ? 'active' : '' }}" href="{{ route('motor.index') }}">
                <span>
                    <i class="fas fa-motorcycle fa-2x"></i>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->is('mobil') ? 'active' : '' }}" href="{{ route('mobil.index') }}">
                <span>
                    <i class="fas fa-car-side fa-2x"></i>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <span>
                    <i class="fas fa-duotone fa-bars fa-2x"></i>
                </span>
            </a>
        </li>
    </ul>
</div>