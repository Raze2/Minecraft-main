@extends('layouts.frontend', ['breadcrumb'=>'Our Games'])

@section('content')
<section class="pricing_part padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_tittle text-center">
                    <h2>Our Games</h2>
                </div>
            </div>
        </div>
        @php($games = App\Models\Game::with('media')->get())
        <div class="row justify-content-center">
            <div class="card-columns">
                @foreach ($games as $game)
                    <div class="card p-0 single_pricing_part">
                        @if($game->image)
                        <img class="card-img rounded-0 h-100" src="{{ $game->image->getUrl() }}">
                        @else
                        <img class="card-img rounded-0 h-100" src="img/blog/single_blog_1.png" alt="">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                @if ($game->url)
                                    <a class="text-white" href="{{$game->url}}">{{$game->name}}</a>
                                @else
                                    {{$game->name}}
                                @endif
                            </h5>
                                
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
