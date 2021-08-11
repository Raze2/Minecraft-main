@extends('layouts.frontend', ['breadcrumb'=>'News & Updates'])

@section('content')
<section class="blog_area single-post-area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 posts-list">
                <div class="single-post">
                    <div class="feature-img blog_item_img">
                        @if($post->featured_image)
                        <img class="img-fluid w-100" src="{{ $post->featured_image->getUrl() }}">
                        @else
                        <img class="img-fluid w-100" src="../img/blog/single_blog_1.png" alt="">
                        @endif
                        <span class="blog_item_date">
                            <h3>{{ Carbon\Carbon::parse($post->created_at)->format('d') }}</h3>
                            <p>{{ Carbon\Carbon::parse($post->created_at)->formatLocalized('%b') }}</p>
                        </span>
                    </div>
                    <div class="blog_details mt-3">
                        <h2 class="text-white">{{ $post->title }}</h2>
                        @isset ($post->excerpt)
                        {!! $post->excerpt !!}
                        @endif
                        {!!$post->body!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
