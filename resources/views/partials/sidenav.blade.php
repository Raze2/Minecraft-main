<!-- Start SideNav -->
<nav id="sidebar" class="body_bg d-flex align-items-center">
    <div id="dismiss">
        <i class="fas fa-times fa-lg mt-2"></i>
    </div>
    <div class="w-100">
        <ul class="list-unstyled components text-center pb-0">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('home') }}">{{ __('frontend.home') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white"
                    href="{{ route('frontend.pages.staff') }}">{{ __('frontend.staff') }}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" id="navbarDropdownStore" role="button"
                    data-toggle="collapse" aria-haspopup="true" aria-expanded="false"
                    href="#StoreSubmenu">{{ __('frontend.store') }}</a>

                <ul class="list-unstyled collapse" id="StoreSubmenu">
                    <a class="dropdown-item" href="{{ route('frontend.store.index', 'ranks') }}">Ranks</a>
                    <a class="dropdown-item" href="{{ route('frontend.store.index', 'tokens') }}">Tokens</a>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white"
                    href="{{ route('frontend.pages.games') }}">{{ __('frontend.our_games') }}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" href="#SupportSubmenu" id="navbarDropdown" role="button"
                    data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                    {{ __('frontend.support') }}
                    @auth @php($unread = \App\Models\Ticket::unreadCount()) @else @php($unread =
                    0) @endauth
                    @if($unread > 0)
                    <span class="badge badge-danger navbar-badge">
                        {{ $unread }}
                    </span>
                    @endif
                </a>
                <ul class="list-unstyled collapse" id="SupportSubmenu">
                    <li class="dropdown-item"><a class="text-white"
                        href="{{ route('frontend.tickets.index') }}">{{ __('frontend.tickets') }}
                        @if($unread > 0)
                        <span class="badge badge-danger navbar-badge">
                            {{ $unread }}
                        </span>
                        @endif</a></li>
                    <li class="dropdown-item"><a class="text-white" href="https://discord.gg/MilanMC" target="_blank">Discord</a></li>
                    <li class="dropdown-item"><a class="text-white" href="ts3server://Ts.MilanMC.com" target="_blank">TeamSpeak</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" data-toggle="collapse" href="#LangSubmenu">
                    @if (app()->getLocale() == 'en')
                    English <img alt="English" class="mb-1" title="English" src="https://www.countryflags.io/us/shiny/24.png">
                    @else
                    العربية <img alt="العربية" class="mb-1" title="العربية" src="https://www.countryflags.io/sa/shiny/24.png">
                    @endif
                </a>
                <ul class="list-unstyled collapse" id="LangSubmenu">
                    @if (app()->getLocale() == 'en')
                    <li class="dropdown-item"><a class="text-white" href="{{ request()->fullUrlWithQuery(['change_language'=>'ar']) }}">العربية <img alt="العربية" class="mb-1" title="العربية" src="https://www.countryflags.io/sa/shiny/24.png"></a></li>
                    @else
                    <li class="dropdown-item"> <a class="text-white" href="{{ request()->fullUrlWithQuery(['change_language'=>'en']) }}">English <img alt="English" class="mb-1" title="English" src="https://www.countryflags.io/us/shiny/24.png"></a></li>
                    @endif
                </ul>
            </li>
            @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#UserSubmenu" role="button"
                            data-toggle="collapse" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username ?? Auth::user()->name  }} <span class="caret"></span>
                        </a>

                        <ul class="list-unstyled collapse" id="UserSubmenu">

                            <li class="dropdown-item">
                                <a class="text-white" href="{{ route('frontend.player.stats') }}">{{ __('frontend.profile') }} </a></li>

                            <li class="dropdown-item">
                            <a class="text-white" href="{{ route('frontend.orders') }}">{{ __('frontend.orders') }}</a></li>


                            {{-- <a class="dropdown-item"
                                        href="{{ route('frontend.profile.index') }}">{{ __('Settings') }}</a> --}}

                            <li class="dropdown-item"> <a class="text-white" href="{{ route('frontend.logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                {{ __('global.logout') }}</a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endauth                
        </ul>
        <div class="text-center mb-3">
            @guest
                <a href="{{ route('frontend.login') }}" class="btn_1 mr-2 px-5">{{ __('global.login') }}</a>
            @endguest
        </div>
        <div class="w-100 px-3">
            <form action="{{ route('player.IGN') }}" method="GET" role="search">
                <div class="input-group mx-2 mt-3">
                    <input type="text" class="form-control" placeholder="IGN" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'IGN'" name="username" autocomplete="off" required>
                    <div class="input-group-append">
                        <button class="btn btn_1  mt-0" type="submit"><i class="fa fa-search text-white"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>
<div class="overlay"></div>
<!-- End SideNav -->