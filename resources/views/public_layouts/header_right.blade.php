<!-- Header -->

<!-- <div class="container d-flex clearfix" id="b-accessibility">
    <div class="b-ministryname">
        <div class="text-right d-inline-block font-weight-bold b-acc-goi pr-sm-2">
            <span>{{ __('labels.government_of_rajasthan') }}</span>
        </div>
        <div class="d-inline-block font-weight-bold b-acc-ministry pl-sm-2">
            <span>{{ __('labels.department_of_revenue_rajasthan') }}</span>
        </div>
    </div>
    
    <div class="ml-auto d-flex b-acc-icons">
        <div class="align-self-center">
            <div class="d-inline-block h-100 px-3">
                <img src="{{ asset('public_assets/images/icons/ico-site-search.png') }}" alt="site search icon" title="Site search" class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;">
                <div class="dropdown-menu p-0 border-0 b-search">
                    <label for="site-search" style="display:none;">Site search</label>
                    <input type="text" class="form-control float-left b-site-search" id="site-search" placeholder="Search" style="width: 150px; border-radius: 0;">
                    <div class="input-group-btn float-left">
                        <button class="btn" type="submit" style="border-radius: 0; background: #505050; color: white; box-shadow: 0 0 0 0.2rem rgba(0,123,255,0);"> 
                        <span style="display:none;">Search</span>
                        <span class="fas fa-search"></span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="d-inline-block h-100 px-3 dropdown">
                <img src="{{ asset('public_assets/images/icons/ico-social.png') }}" alt="social sites links" title="Social links" class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;">            
                <div class="dropdown-menu b-social-dropdown" style="min-width: 50px; width: 50px">
                    <a href="javascript:void(0)" class="dropdown-item"> <span style="display:none;">Facebook link</span><span class="fab fa-facebook-f"></span> </a>
                    <a href="javascript:void(0);" class="dropdown-item"> <span style="display:none;">Twitter link</span><span class="fab fa-twitter"></span> </a>
                    <a href="javascript:void(0)" class="dropdown-item"> <span style="display:none;">Youtube link</span><span class="fab fa-youtube"></span> </a>
                </div>
            </div>
            
            <div class="d-inline-block h-100 px-3">
                <a href="#b-homedb" class="align-self-center b-skiptomain" title="Skip to main content">
                    <img src="{{ asset('public_assets/images/icons/ico-skip.png') }}" alt="skip to main content icon">
                </a>
            </div>

            <div class="d-inline-block h-100 px-3">
                <img src="{{ asset('public_assets/images/icons/ico-accessibility.png') }}" alt="accessibility icon" title="Accessibility Dropdown" class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;">
                <!-- <img src="images/icons/ico-accessibility.png" alt="accessibility icon" title="Accessibility Dropdown" class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;"> 

                <div class="dropdown-menu b-accessibility-dropdown" style="min-width: 50px; width: 50px">
                    <a href="javascript:void(0);" class="dropdown-item" title="Increase font size"> <span class="font-weight-bold"> A<sup>+</sup> </span> </a>
                    <a href="javascript:void(0)" class="dropdown-item" title="Reset font size"> <span class="font-weight-bold"> A </span> </a>
                    <a href="javascript:void(0);" class="dropdown-item" title="Decrease font size"> <span class="font-weight-bold"> A<sup>-</sup> </span> </a>
                    <a href="javascript:void(0)" class="dropdown-item bg-dark" title="High contrast"> <span class="font-weight-bold text-white"> A </span> </a>
                </div>
            </div>

            <div class="d-inline-block h-100 px-3">
                <a href="site-map.html" title="Sitemap">
                    <img src="{{ asset('public_assets/images/icons/ico-sitemap.png') }}" alt="sitemap icon">
                </a>
            </div>
        </div>
    </div>   
</div> -->
<div class="container clearfix" id="b-header">
    <div class="float-left d-flex h-100">
        <!-- <img src="images/emblem-dark.png" class="align-self-center b-emblem-image" title="National Emblem of India" alt="emblem of india logo"> -->
        <img src="{{ asset('public_assets/images/emblem-dark.png') }}" class="align-self-center b-emblem-image" title="National Emblem of India" alt="emblem of india logo">
    </div>

    <div class="float-left d-flex h-100">
        <h2 class="align-self-center pl-3 b-appname"><span class="font-weight-bold">{{ __("labels.project_name") }}</span> <br><span class="b-appfullname"> {{ __("labels.department_of_revenue_rajasthan") }}, {{ __("labels.government_of_rajasthan") }}</span></h2>
    </div>
</div>

<style type="text/css">
    .bar1, .bar2, .bar3 {
        width: 25px;
        height: 3px;
        background-color: #fff;
        margin: 5px 0;
        transition: 0.4s;
    }

    .change .bar1 {
        -webkit-transform: rotate(-45deg) translate(-5px, 5px);
        transform: rotate(-45deg) translate(-5px, 5px);
    }

    .change .bar2 {opacity: 0;}

    .change .bar3 {
        -webkit-transform: rotate(45deg) translate(-5px, -7px);
        transform: rotate(45deg) translate(-5px, -7px);
    }

   .submenu {
    display: none;
    top: 100%;
    left: 0;
    background-color: white;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    }

    /* Show submenu on hover */
    .nav-item.dropdown:hover .submenu {
        display: block;
    }

    

    .dropdown-menu .dropdown-item {
        color: #000 !important;
    }







    .globalnav-bg {
    background-color: #00264d;
}

.navbar-nav .nav-link {
    color: #ffffff !important;
    font-weight: bold;
    padding: 10px 15px;
    transition: all 0.3s ease;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link:focus {
    background-color: rgba(255, 255, 255, 0.15);
    border-radius: 5px;
    text-decoration: none;
}

.submenu {
    background-color: #003366;
    padding: 0;
    min-width: 200px;
    display: none;
    border-radius: 0 0 5px 5px;
    z-index: 1000;
}

.nav-item.dropdown:hover .submenu {
    display: block;
}

.submenu li a {
    display: block;
    color: #fff;
    font-weight: 500;
    padding: 10px 15px;
    text-decoration: none;
    white-space: nowrap;
}

.submenu li a:hover {
    background-color: #004080;
    text-decoration: none;
}

/* .b-btn-toggler .bar1,
.b-btn-toggler .bar2,
.b-btn-toggler .bar3 {
    background-color: white;
} */

/* .navbar-nav {
    flex-wrap: wrap;
} */

</style>


<!-- Global Navigation -->
<div class="globalnav-bg">
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark px-0">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav main-menu d-flex w-100 align-items-center">
                    <li class="nav-item d-block"> <a href="{{ (Auth::user() && Auth::user()->user_type == 'user') ? route('user.dashboard') : route('home') }}" class="nav-link ">{{ __("labels.home") }}</a> </li>

                    <li class="nav-item position-relative dropdown">
                        <a href="#" class="nav-link dropdown-toggle">{{ __("labels.rules") }}</a>
                        <ul class="submenu list-unstyled position-absolute">  
                            <li><a href="{{ asset('rules-pdf/form-1963.pdf') }}" target="_blank">{{ __("labels.rule_1963") }}</a></li>
                            <li><a href="{{ asset('rules-pdf/form-1959.pdf') }}" target="_blank">{{ __("labels.rule_1959") }}</a></li>
                            <li><a href="{{ asset('rules-pdf/form-2007.pdf') }}" target="_blank">{{ __("labels.rule_2007") }}</a></li>
                            <li><a href="{{ asset('rules-pdf/form-2007.pdf') }}" target="_blank">{{ __("labels.rule_1956") }}</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"> 
                        <a href="#" class="nav-link">{{ __("labels.contactus") }}</a> 
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
                            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
                            </svg>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('lang/en') }}">English</a>
                            <a class="dropdown-item" href="{{ url('lang/hi') }}">हिन्दी</a>
                        </div>
                    </li>

                    @if(Auth::check())
                        <li class="nav-item ml-auto"> 
                            <a href="{{ route('logout') }}" class="nav-link font-weight-bold">
                                {{ Auth::user()->name }} ({{ Auth::user()->user_type }}) | {{ __("labels.logout") }}
                            </a> 
                        </li>
                    @endif


                </ul>
            </div>

            <div class="d-flex w-100 b-nav-mobile">
                <button class="navbar-toggler align-self-center b-btn-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" onclick="myFunction(this)">
                    <span style="display:none;">Menu</span>
                    <div>
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                </button>
            </div>
        </nav>
    </div>
</div>

<script>
    function myFunction(x) {
    x.classList.toggle("change");
    }
</script>