@extends('layouts.frontend')

@section('content')
<section class="section_padding container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="section_tittle text-center">
                <h2>{{App\Models\Product::CATEGORY_SELECT[$cat]}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3 col-sm-6 mt-4">
            <div class="product-grid">
                <div class="product-image">
                    <a href="{{route('frontend.store.pay', "$product->id")}}" class="image">
                        <img class="pic-1" src="{{ $product->photo->getUrl() }}">
                    </a>
                    {{-- <span class="product-discount-label">-33%</span> --}}
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="{{route('frontend.store.pay', "$product->id")}}">{{$product->name}}</a></h3>
                    <div class="price">${{$product->price}}</div>
                    <a class="add-to-cart" href="{{route('frontend.store.pay', "$product->id")}}">Buy Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    
</section>

    @endsection
