@extends('layouts.frontend')

@section('content')

<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-8">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h1 class="mb-0 grad-text">{{__('frontend.homepage.heading1')}}</h1>
                        <h4 class="text-white">{{__('frontend.homepage.heading2')}}</h4>
                        <p class="mt-4">{{__('frontend.homepage.description')}}</p>
                        <div>
                            @guest
                            <a href="{{ route('frontend.login') }}" class="btn_1 mr-2 px-5">{{ __('global.login') }}</a>
                            @else
                            <a href="{{ route('frontend.player.stats') }}"
                                class="btn_1 mr-2 px-5">{{ __('frontend.profile') }}</a>
                            @endguest
                            <button onclick="copyToClipboard('127.128.1.1')"
                                class="btn_1 copy-btn">{{__('frontend.homepage.copyServer')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->
<section class="blog_area py-5">
    <div class="container">
        {{-- <div class="row justify-content-center">
            <div class="col-lg-8">
                
            </div>
        </div> --}}
        <div class="row justify-content-center">
            @if ($posts->count() > 0)

            <div class="mb-5 mb-lg-0 col-12 col-md-8 post-area">
                <div class="section_tittle text-center">
                    <h2 class="text-white">{{__('frontend.homepage.latestNewsAndUpdates')}}</h2>
                </div>
                <div id="posts" class="blog_left_sidebar m-2 row justify-content-center">
                    @foreach ($posts as $post)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            @if($post->featured_image)
                            <img class="card-img rounded-0" src="{{ $post->featured_image->getUrl() }}">
                            @else
                            <img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">
                            @endif
                            <span class="blog_item_date">
                                <h3>{{ Carbon\Carbon::parse($post->created_at)->format('d') }}</h3>
                                <p>{{ Carbon\Carbon::parse($post->created_at)->formatLocalized('%b') }}</p>
                            </span>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="{{route('posts.show', $post->id)}}">
                                <h2 class="text-white">
                                    {{ app()->getLocale() == 'en' ? $post->title : $post->title_ar ?? $post->title }}
                                </h2>
                            </a>
                            <div class="blog-div mb-3">
                                <p>
                                @isset($post->excerpt)
                                {!! app()->getLocale() == 'en' ? $post->excerpt : $post->excerpt_ar ?? $post->excerpt
                                !!}
                                @else
                                {!! app()->getLocale() == 'en' ? Str::limit(strip_tags($post->body),300):
                                Str::limit(strip_tags($post->body_ar),300) ?? Str::limit(strip_tags($post->body),300) !!}
                                @endisset
                                </p>
                                <a class="d-inline-block"
                                    href="{{route('posts.show', $post->id)}}">{{__('frontend.homepage.seemore')}}</a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    {{-- <a href="{{route('posts.index')}}" style="color: #fff !important"></a> --}}
                    <button class="see-more btn_1" data-page="2" data-link="{{url('?page=')}}"
                        data-div="#posts">{{__('frontend.homepage.moreNewsAndUpdates')}}</button>
                </div>
            </div>
            @endif

            <div class="col-12 col-md-4">

                <div class="leaderboard rounded">
                    <div class="head">
                        <i class="fas fa-trophy fa-2x mb-3"></i>
                        <h3 class="text-white">{{__('frontend.homepage.mostActive')}}</h3>
                    </div>
                    <div class="body">
                        <ol class="px-0 py-2 text-center">
                            @foreach ($ToptimePlayers as $TopPlayer)
                            <li>
                                <img src="https://crafatar.com/avatars/{{$TopPlayer->UUID}}"
                                    class="rounded-circle leaderboard-img" />
                                <mark><a style="color:#fff !important"
                                        href="{{route('player.IGN')}}?username={{$TopPlayer->username}}">{{$TopPlayer->username}}</a></mark>
                                <small>{{\Carbon\CarbonInterval::seconds($TopPlayer->time)->cascade()->forHumans(['short' => true, 'parts' => 3])}}</small>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="leaderboard rounded">
                    <div class="head">
                        <i class="fas fa-trophy fa-2x mb-3"></i>
                        <h3 class="text-white">{{__('frontend.homepage.topTokens')}}</h3>
                    </div>
                    <div class="body">
                        <ol class="px-0 py-2 text-center">
                            @foreach ($ToptokensPlayers as $ToptokenPlayer)
                            <li>
                                <img src="https://crafatar.com/avatars/{{$ToptokenPlayer['UUID']}}"
                                    class="rounded-circle leaderboard-img" />
                                <mark><a style="color:#fff !important"
                                        href="{{route('player.IGN')}}?username={{$ToptokenPlayer['username']}}">{{$ToptokenPlayer['username']}}</a></mark>
                                <small>{{$ToptokenPlayer['tokens']}}</small>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="leaderboard rounded">
                    <div class="head">
                        <i class="fas fa-trophy fa-2x mb-3"></i>
                        <h3 class="text-white">{{__('frontend.homepage.lastPurchase')}}</h3>
                    </div>
                    <div class="body">
                        <ol class="px-0 py-2 text-center">
                            @foreach ($lastBuyerPlayers as $lastBuyerPlayer)
                            <li>
                                <img src="https://crafatar.com/avatars/{{$lastBuyerPlayer['UUID']}}"
                                    class="rounded-circle leaderboard-img" />
                                <mark><a style="color:#fff !important"
                                        href="{{route('player.IGN')}}?username={{$lastBuyerPlayer['username']}}">{{$lastBuyerPlayer['username']}}</a></mark>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="leaderboard rounded">
                    <div class="head">
                        <i class="fas fa-users fa-2x mb-3"></i>
                        <h3 class="text-white">{{__('frontend.homepage.newMembers')}}</h3>
                    </div>
                    <div class="body">
                        <ol class="px-0 py-2 text-center">
                            @foreach ($latestPlayers as $latestPlayer)
                            <li>
                                <img src="https://crafatar.com/avatars/{{$latestPlayer->uniqueId}}"
                                    class="rounded-circle leaderboard-img" />
                                <mark>{{$latestPlayer->lastNickname}}</mark>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<!-- about_us part start-->
<section class="about_us py-5">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-5 col-lg-6 col-xl-6">
                <div class="learning_img">
                    <img src="{{ asset('img/about_img.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-7 col-lg-6 col-xl-5">
                <div class="about_us_text text-white">
                    <h2>{{__('frontend.homepage.whoWeAre')}}</h2>
                    <p>{{__('frontend.homepage.WhoWeAreDesc')}}</p>
                    <div class="profilecard d-flex align-items-center justify-content-center flex-row">
                        <div class="me pr-5">
                            <div class="avatar">
                                <img src="{{asset('img/discord.png')}}" />
                            </div>
                            <div class="username">
                                <span
                                    class="text-white font-weight-normal">{{__('frontend.homepage.discordCommuinty')}}</span>
                            </div>
                        </div>
                        <div class="role">
                            <a href="https://discord.gg/MilanMC" target="_blank"
                                class="discord-button d-flex justify-content-center" target="_blank">
                                <div class="icon">
                                    <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 240">
                                        <path class="st0"
                                            d="M104.4 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1.1-6.1-4.5-11.1-10.2-11.1zM140.9 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1s-4.5-11.1-10.2-11.1z" />
                                        <path class="st0"
                                            d="M189.5 20h-134C44.2 20 35 29.2 35 40.6v135.2c0 11.4 9.2 20.6 20.5 20.6h113.4l-5.3-18.5 12.8 11.9 12.1 11.2 21.5 19V40.6c0-11.4-9.2-20.6-20.5-20.6zm-38.6 130.6s-3.6-4.3-6.6-8.1c13.1-3.7 18.1-11.9 18.1-11.9-4.1 2.7-8 4.6-11.5 5.9-5 2.1-9.8 3.5-14.5 4.3-9.6 1.8-18.4 1.3-25.9-.1-5.7-1.1-10.6-2.7-14.7-4.3-2.3-.9-4.8-2-7.3-3.4-.3-.2-.6-.3-.9-.5-.2-.1-.3-.2-.4-.3-1.8-1-2.8-1.7-2.8-1.7s4.8 8 17.5 11.8c-3 3.8-6.7 8.3-6.7 8.3-22.1-.7-30.5-15.2-30.5-15.2 0-32.2 14.4-58.3 14.4-58.3 14.4-10.8 28.1-10.5 28.1-10.5l1 1.2c-18 5.2-26.3 13.1-26.3 13.1s2.2-1.2 5.9-2.9c10.7-4.7 19.2-6 22.7-6.3.6-.1 1.1-.2 1.7-.2 6.1-.8 13-1 20.2-.2 9.5 1.1 19.7 3.9 30.1 9.6 0 0-7.9-7.5-24.9-12.7l1.4-1.6s13.7-.3 28.1 10.5c0 0 14.4 26.1 14.4 58.3 0 0-8.5 14.5-30.6 15.2z" />
                                    </svg>
                                </div>
                                <span class="font-weight-normal">{{__('frontend.homepage.joinCommunity')}}</span>
                            </a>
                        </div>
                    </div>
                    <div class="profilecard d-flex align-items-center justify-content-center flex-row team-speak">
                        <div class="me pr-4">
                            <div class="avatar">
                                <img src="{{asset('img/teamspeak_inverse.svg')}}" />
                            </div>
                            <div class="username">
                                <span
                                    class="text-white font-weight-normal">{{__('frontend.homepage.teamSpeakCommuinty')}}</span>
                            </div>
                        </div>
                        <div class="role">
                            <a href="ts3server://Ts.MilanMC.com" target="_blank"
                                class="discord-button d-flex justify-content-center" target="_blank">
                                <div class="icon">
                                    <img src="{{asset('img/teamspeak-icon.png')}}">
                                </div>
                                <span class="font-weight-normal">{{__('frontend.homepage.joinCommunity')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about_us part end-->

@endsection

@yield('script')
<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(element).select();
        document.execCommand("copy");
        $temp.remove();
        $(".copy-btn").html('Copied ...')
        setTimeout(function () {
            $(".copy-btn").html('Copy Server IP')
        }, 1000);
    }

</script>
