<!-- Header -->
<div style="display:none;">
    <h1>Heading1</h1><h2>Heading2</h2>
</div>
<div class="container d-flex clearfix" id="b-accessibility">
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
                <!-- <img src="images/icons/ico-accessibility.png" alt="accessibility icon" title="Accessibility Dropdown" class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;"> -->

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
</div>
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
</style>

<!-- Global Navigation -->
<div class="globalnav-bg">
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark px-3">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav main-menu d-flex">
                    <li class="nav-item d-block"> <a href="index.html" class="nav-link active">{{ __("labels.home") }}</a> </li>
                    @if(Auth::user())
                    <li class="nav-item d-block" style="text-align: right; width: 100%;">
                        <a href="{{ route('logout') }}" class="nav-link">
                            {{ __("labels.logout") }} 
                        </a>
                    </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="{{ url('lang/en') }}">English</a></li>
                            <li><a class="dropdown-item" href="{{ url('lang/hi') }}">हिन्दी</a></li>                            
                        </ul>
                    </li>

                    <!-- <li class="nav-item d-block" style="float:right;"> 
                        <a class="nav-link dropdown-toggle b-db-color" href="#" id="userDropdown" role="button" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name ?? '' }}
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
                    </li> -->

                    <!-- <li class="nav-item d-block ml-auto b-loginbut" data-toggle="modal" data-target="#login-modal">
                        <a class="nav-link" href="javascript:void(0);">Log In</a>
                    </li> -->    
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
                <!-- <button class="btn btn-outline-light align-self-center ml-auto b-btn-login" type="button" data-toggle="modal" data-target="#login-modal">
                    Log In
                </button> --> 
            </div>
        </nav>
    </div>
</div>
<script>
    function myFunction(x) {
    x.classList.toggle("change");
    }
</script>