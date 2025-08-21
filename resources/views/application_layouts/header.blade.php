<nav class="navbar navbar-expand-lg navbar-light dashboard-bgcolor border-bottom">
    <button class="btn b-db-color" id="menu-toggle">
        <span style="display:none;">Menu</span>
        <!-- <span class="fas fa-bars" style="font-size: 1.4rem"></span> -->
    </button>

    <h5 style="color:white;">{{ __("labels.project_name") }}</h5>

    <button class="navbar-toggler b-dropmenubtn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="far fa-caret-square-down" style="font-size: 30px; color: #FFF"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle b-db-color" href="#" id="userDropdown" role="button" data-toggle="dropdown" 
                   aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
