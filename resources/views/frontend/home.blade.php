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
                        <a href="#" class="btn_1">Install Now</a>
                        <button onclick="copyToClipboard('127.128.1.1')" class="btn_1 copy-btn">Copy Server IP</button>
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
        setTimeout(function() { $(".copy-btn").html('Copy Server IP') }, 1000);
    }
</script>