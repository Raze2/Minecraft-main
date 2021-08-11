@extends('layouts.frontend', ['breadcrumb'=>'Latest News & Updates'])

@section('content')
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
                        <div class="d-flex justify-content-center">{{$posts->links()}}</div> 
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection