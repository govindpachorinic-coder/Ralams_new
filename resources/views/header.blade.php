<div class="header-bar">
    <div class="logo-container">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Emblem_of_India.svg/1200px-Emblem_of_India.svg.png"
            alt="Logo" />
        <div class="sys-titles">
            <span class="sys-title-main">{{ __('labels.project_name') }}</span>
            <span class="sys-title-sub">{{ __('labels.department_of_revenue_rajasthan') }},
                {{ __('labels.government_of_rajasthan') }}</span>
        </div>
    </div>
    <button class="lang-btn">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-translate" viewBox="0 0 16 16">
                <path
                    d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z" />
                <path
                    d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31" />
            </svg>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ url('lang/en') }}">English</a>
            <a class="dropdown-item" href="{{ url('lang/hi') }}">हिन्दी</a>
        </div>
    </button>

</div>



<!-- Navigation Bar -->
<nav class="navbar">
    <input type="checkbox" id="nav-toggle" hidden>
    <label for="nav-toggle" class="nav-toggle-label" title="Menu"><span class="material-icons">menu</span></label>
    <div class="nav-center">
        <a href="#" class="nav-link"><span class="material-icons">home</span>{{ __('labels.home') }}</a>
        <div class="dropdown">
            <a href="#" class="nav-link"><span class="material-icons">description</span> {{ __('labels.rules') }}
                <span class="material-icons ms-1">arrow_drop_down</span></a>
            <div class="dropdown-content">
                <a href="{{ asset('rules-pdf/form-1963.pdf') }}" target="_blank">{{ __('labels.rule_1963') }}</a>
                <a href="{{ asset('rules-pdf/form-1959.pdf') }}" target="_blank">{{ __('labels.rule_1959') }}</a>
                <a href="{{ asset('rules-pdf/form-2007.pdf') }}" target="_blank">{{ __('labels.rule_2007') }}</a>
                <a href="{{ asset('rules-pdf/form-2007.pdf') }}" target="_blank">{{ __('labels.rule_1956') }}</a>
            </div>
        </div>
        <a href="#" class="nav-link"><span class="material-icons">call</span>{{ __('labels.contactus') }}</a>
    </div>
    @if (Auth::check())
        <a href="{{ route('user.dashboard') }}" class="btn-dashboard">
            <span class="material-icons">arrow_back</span> Go to Dashboard
        </a>
        <div class="user-group">
            <span class="welcome">Welcome, {{ Auth::user()->name }}</span>
            <a href="{{ route('logout') }}" class="logout-btn"><span class="material-icons"
                    style="font-size:1em;vertical-align:-2px;margin-right:3px;">logout</span>Logout</a>
        </div>
    @endif

</nav>

<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        min-width: 200px;
        z-index: 1;
    }

    .dropdown-content a {
        display: block;
        padding: 8px 12px;
        text-decoration: none;
        color: #333;
    }

    .dropdown-content a:hover {
        background: #f0f0f0;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .btn-dashboard {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        background: linear-gradient(135deg, #5a8dee, #46c7fa);
        color: white;
        font-weight: 700;
        font-size: 17px;
        border-radius: 30px;
        text-decoration: none;
        /* Remove underline */
        box-shadow: 0 6px 15px rgba(90, 141, 238, 0.5);
        transition: background 0.3s, box-shadow 0.3s, transform 0.2s;
        cursor: pointer;
        border: none;
    }

    .btn-dashboard .material-icons {
        font-size: 20px;
    }

    .btn-dashboard:hover {
        background: linear-gradient(135deg, #3a5edc, #2fa1e0);
        box-shadow: 0 10px 25px rgba(60, 94, 220, 0.7);
        transform: translateY(-3px);
        text-decoration: none;
    }
</style>
