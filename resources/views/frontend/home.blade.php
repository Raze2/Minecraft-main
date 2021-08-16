@extends('layouts.frontend')

@section('content')

<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-8">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h1>Best Minecraft Server</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua. Quis ipsum </p>
                        @guest
                        <a href="{{ route('register') }}" class="btn_1 mr-2">Sign Up NOW</a>
                        @else
                        <a href="#" class="btn_1 mr-2">Contact Us</a>
                        @endguest
                        <button onclick="copyToClipboard('127.128.1.1')" class="btn_1 copy-btn">Copy Server IP</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->
@if ($posts->count() > 0)
<section class="blog_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_tittle text-center">
                    <h2 class="text-white">Latest News & Updates</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-5 mb-lg-0">
                <div class="blog_left_sidebar m-2 row">
                    @foreach ($posts as $post)
                    <article class="blog_item col-12">
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
                                <h2 class="text-white">{{ $post->title }}</h2>
                            </a>
                            @isset($post->excerpt)
                            <p>{!! $post->excerpt !!}</p>
                            @else
                            <p>{!! Str::limit($post->body,1000) !!}</p>
                            @endisset
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <a href="{{route('posts.index')}}" class="btn_1" style="color: #fff !important">More News and Updates</a>
        </div>
    </div>
</section>
@endif
<!--================Blog Area =================-->

<!-- about_us part start-->
<section class="about_us section_padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-5 col-lg-6 col-xl-6">
                <div class="learning_img">
                    <img src="{{ asset('img/about_img.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-7 col-lg-6 col-xl-5">
                <div class="about_us_text text-white">
                    <h2>Who We Are?</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. </p>
                    <div class="profilecard d-flex align-items-center flex-row">
                        <div class="me px-3">
                            <div class="avatar">
                                <img src="https://discord.com/assets/6debd47ed13483642cf09e832ed0bc1b.png" />
                            </div>
                            <div class="username">
                                <span class="text-white font-weight-normal">Mincrafter Discord Community</span>
                            </div>
                        </div>
                        <div class="role">
                            <a href="https://domaincord.com/discord" class="discord-button d-flex justify-content-center" target="_blank">
                                <div class="icon">
                                    <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 240">
                                        <path class="st0" d="M104.4 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1.1-6.1-4.5-11.1-10.2-11.1zM140.9 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1s-4.5-11.1-10.2-11.1z" />
                                        <path class="st0" d="M189.5 20h-134C44.2 20 35 29.2 35 40.6v135.2c0 11.4 9.2 20.6 20.5 20.6h113.4l-5.3-18.5 12.8 11.9 12.1 11.2 21.5 19V40.6c0-11.4-9.2-20.6-20.5-20.6zm-38.6 130.6s-3.6-4.3-6.6-8.1c13.1-3.7 18.1-11.9 18.1-11.9-4.1 2.7-8 4.6-11.5 5.9-5 2.1-9.8 3.5-14.5 4.3-9.6 1.8-18.4 1.3-25.9-.1-5.7-1.1-10.6-2.7-14.7-4.3-2.3-.9-4.8-2-7.3-3.4-.3-.2-.6-.3-.9-.5-.2-.1-.3-.2-.4-.3-1.8-1-2.8-1.7-2.8-1.7s4.8 8 17.5 11.8c-3 3.8-6.7 8.3-6.7 8.3-22.1-.7-30.5-15.2-30.5-15.2 0-32.2 14.4-58.3 14.4-58.3 14.4-10.8 28.1-10.5 28.1-10.5l1 1.2c-18 5.2-26.3 13.1-26.3 13.1s2.2-1.2 5.9-2.9c10.7-4.7 19.2-6 22.7-6.3.6-.1 1.1-.2 1.7-.2 6.1-.8 13-1 20.2-.2 9.5 1.1 19.7 3.9 30.1 9.6 0 0-7.9-7.5-24.9-12.7l1.4-1.6s13.7-.3 28.1 10.5c0 0 14.4 26.1 14.4 58.3 0 0-8.5 14.5-30.6 15.2z" />
                                    </svg>
                                </div>
                                <span class="font-weight-normal">Join Our Community</span>
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
