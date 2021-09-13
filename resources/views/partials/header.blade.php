<!--::header part start::-->
<header class="main_menu single_page_menu">
    <div class="container-fluid">
        <div class="row align-items-center">
            <nav class="navbar navbar-expand-lg w-100 navbar-light py-2 fixed-top">
                <a class="navbar-brand col text-md-center" href="{{ route('home') }}"> <img src="{{asset('img/logo.png')}}"
                        alt="logo"> </a>
                {{-- <button class="navbar-toggler order-2 mr-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="menu_icon"><i class="fas fa-bars"></i></span>
                </button> --}}
                <button class="float-left sidebarCollapse navbar-toggler d-md-none text-white mr-3"><i class="fas fa-bars fa-2x"></i></button>

                <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('frontend.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('frontend.pages.staff') }}">{{ __('frontend.staff') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownStore" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                href="#">{{ __('frontend.store') }}</a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdownStore">
                                <a class="dropdown-item" href="{{ route('frontend.store.index', 'ranks') }}">Ranks</a>
                                <a class="dropdown-item" href="{{ route('frontend.store.index', 'tokens') }}">Tokens</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('frontend.pages.games') }}">{{ __('frontend.our_games') }}</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('frontend.support') }}
                                @auth @php($unread = \App\Models\Ticket::unreadCount()) @else @php($unread =
                                0) @endauth
                                @if($unread > 0)
                                <span class="badge badge-danger navbar-badge">
                                    {{ $unread }}
                                </span>
                                @endif
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ route('frontend.tickets.index') }}">{{ __('frontend.tickets') }}
                                    @if($unread > 0)
                                    <span class="badge badge-danger navbar-badge">
                                        {{ $unread }}
                                    </span>
                                    @endif</a>
                                <a class="dropdown-item" href="https://discord.gg/MilanMC" target="_blank">Discord</a>
                                <a class="dropdown-item" href="ts3server://Ts.MilanMC.com" target="_blank">TeamSpeak</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav col justify-content-center d-none d-sm-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" href="#">
                            @if (app()->getLocale() == 'en')
                            English <img alt="English" class="mb-1" title="English" src="https://www.countryflags.io/us/shiny/24.png">
                            @else
                            العربية <img alt="العربية" class="mb-1" title="العربية" src="https://www.countryflags.io/sa/shiny/24.png">
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right text-center">
                            @if (app()->getLocale() == 'en')
                            <a class="dropdown-item"
                                href="{{ request()->fullUrlWithQuery(['change_language'=>'ar']) }}">العربية <img alt="العربية" class="mb-1" title="العربية" src="https://www.countryflags.io/sa/shiny/24.png">
                            </a>
                            @else
                            <a class="dropdown-item"
                                href="{{ request()->fullUrlWithQuery(['change_language'=>'en']) }}">English <img alt="English" class="mb-1" title="English" src="https://www.countryflags.io/us/shiny/24.png">
                            </a>
                            @endif
                        </div>
                    </li>
                </ul>
                @auth
                <ul class="nav col">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username ?? Auth::user()->name  }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item"
                                href="{{ route('frontend.player.stats') }}">{{ __('frontend.profile') }}</a>

                            <a class="dropdown-item"
                                href="{{ route('frontend.orders') }}">{{ __('frontend.orders') }}</a>


                            {{-- <a class="dropdown-item"
                                        href="{{ route('frontend.profile.index') }}">{{ __('Settings') }}</a> --}}

                            <a class="dropdown-item" href="{{ route('frontend.logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                {{ __('global.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                @endauth
                <div class="form-group d-none d-sm-block col">
                    <form action="{{ route('player.IGN') }}" method="GET" role="search">
                        <div class="input-group mx-2 mt-3">
                            <input type="text" class="form-control" placeholder="IGN" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'IGN'" name="username" autocomplete="off" required>
                            <div class="input-group-append">
                                <button class="btn btn_1" type="submit"><i class="fa fa-search text-white"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</header>

