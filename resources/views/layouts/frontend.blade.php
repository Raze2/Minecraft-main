<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- style CSS -->
    <link href="{{ asset('css/front.css') }}" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css"
        rel="stylesheet" />
    {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet" /> --}}



    <!-- animate CSS -->
    {{-- <link rel="stylesheet" href="css/animate.css"> --}}
    <!-- owl carousel CSS -->
    {{-- <link rel="stylesheet" href="css/owl.carousel.min.css"> --}}
    <!-- font awesome CSS -->
    {{-- <link href="{{ asset('css/all.css') }}" rel="stylesheet" /> --}}
    <!-- flaticon CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}"> --}}
    <!-- font awesome CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}"> --}}
    <!-- swiper CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/slick.css') }}"> --}}

    @yield('styles')
</head>

<body>
    <div id="app" class="body_bg">
        <!--::header part start::-->
        <header class="main_menu single_page_menu">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            @guest
                            <div class="col d-flex">
                                <a class="btn_1 d-none d-sm-block mr-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                                <a class="btn_1 d-none d-sm-block" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                            @endguest
                            <a class="navbar-brand mx-auto" href="{{ route('home') }}"> <img src="{{asset('img/logo.png')}}"
                                    alt="logo"> </a>
                            <button class="navbar-toggler order-2" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="menu_icon"><i class="fas fa-bars"></i></span>
                            </button>

                            <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('frontend.pages.players') }}">Players</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('frontend.store.index') }}">Store</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Support
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
                                                href="{{ route('frontend.tickets.index') }}">Tickets
                                                @if($unread > 0)
                                                <span class="badge badge-danger navbar-badge">
                                                    {{ $unread }}
                                                </span>
                                                @endif</a>
                                                <a class="dropdown-item" href="#">Discord</a>
                                                <a class="dropdown-item" href="#">TeamSpeak</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('frontend.pages.games') }}">Our Games</a>
                                    </li>
                                </ul>

                            </div>
                            @auth
                            <ul class="nav col">
                                <li class="nav-item dropdown">
                                    <a id="notifictaionDropdown" class="nav-link text-white" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                                        <i class="fas fa-bell text-white"></i>
                                    </a>
                                    @php($alertsCount = \Auth::user()->userUserAlerts()->where('read',
                                    false)->count())
                                    @if($alertsCount > 0)
                                    <span class="badge badge-warning navbar-badge">
                                        {{ $alertsCount }}
                                    </span>
                                    @endif
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
                                        aria-labelledby="notifictaionDropdown">
                                        @if(count($alerts =
                                        \Auth::user()->userUserAlerts()->withPivot('read')->limit(10)->orderBy('created_at',
                                        'ASC')->get()->reverse()) > 0)
                                        @foreach($alerts as $alert)
                                        <div class="dropdown-item">
                                            <a href="{{ $alert->alert_link ? $alert->alert_link : "#" }}"
                                                target="_blank" rel="noopener noreferrer" class="text-white">
                                                @if($alert->pivot->read === 0) <strong> @endif
                                                    {{ $alert->alert_text }}
                                                    @if($alert->pivot->read === 0) </strong> @endif
                                            </a>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="text-center text-white">
                                            {{ trans('global.no_alerts') }}
                                        </div>
                                        @endif
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link text-white" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                                        <i class="fas fa-cog text-white"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item"
                                            href="{{ route('frontend.player.stats') }}">{{ __('Player Stats') }}</a>

                                        <a class="dropdown-item"
                                            href="{{ route('frontend.profile.index') }}">{{ __('Settings') }}</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                            @endauth
                            <div class="form-group d-none d-sm-block col">
                                <div class="input-group mx-2 mt-3">
                                    <input type="text" class="form-control" placeholder="IGN"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'IGN'">
                                    <div class="input-group-append">
                                        <button class="btn btn_1" type="button"><i
                                                class="fa fa-search text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        @if (isset($breadcrumb))
        @include('partials.breadcrumb', ['title' => $breadcrumb])
        @endif
        <main class="py-4">
            @if(session('message'))
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                    </div>
                </div>
            </div>
            @endif
            @if($errors->count() > 0)
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <ul class="list-unstyled mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @yield('content')
            <!--::footer_part end::-->
        </main>
        <!--::footer_part start::-->
        <footer class="footer_part">
            <div class="footer_top">
                <div class="container">
                    <div class="row justify-content-center">
                        {{-- <div class="col">
                            <div class="single_footer_part">
                                <a href="index.html" class="footer_logo_iner"> <img
                                        src="{{ asset('img/logo.png') }}" alt="#"> </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="single_footer_part">
                                <h4 class="text-white">Contact Info</h4>
                                <p>Phone : <a href="tel:02000">+0000000000</a></p>
                                <p>Email : <a href="mailto:asd@asd.com">asd@asd.com</a></p>
                            </div>
                        </div> --}}
                        <div class="col-6">
                            <div class="single_footer_part text-center">
                                <h4 class="text-white">FAQ</h4>
                                <div class="row">
                                    <div class="col">
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('frontend.pages.contact') }}">Contact US</a></li>
                                            <li><a href="{{ route('frontend.pages.privacy') }}">Privacy policy</a></li>
                                            <li><a href="{{ route('frontend.pages.general-terms') }}">General Terms</a></li>
                                            <li><a href="{{ route('frontend.pages.store-terms') }}">Store Terms</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('frontend.pages.about') }}">About us</a></li>
                                            <li><a href="{{ route('frontend.pages.rules') }}">Rules</a></li>
                                            <li><a href="{{ route('frontend.pages.reports') }}">Reports</a></li>
                                            <li><a href="{{ route('frontend.pages.youtuber-apply') }}">YouTuber Apply</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copygight_text">
                <div class="container">
                    <div class="copyright_text text-center w-100">
                        <P>
                            Copyright &copy;{{ now()->year }} All rights reserved
                        </P>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<!-- custom js -->
<script src="{{ asset('js/custom.js') }}"></script>
@yield('scripts')

</html>
