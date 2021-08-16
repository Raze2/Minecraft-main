@extends('layouts.frontend', ['breadcrumb'=>'Store'])

@section('content')
<section class="section_padding container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="section_tittle text-center">
                <h2>Store</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 mt-4">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="{{asset('img/img-1.jpg')}}">
                    </a>
                    <span class="product-discount-label">-33%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Skin Avocado</a></h3>
                    <div class="price"><span>$90.00</span> $66.00</div>
                    <a class="add-to-cart" href="#">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mt-4">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="{{asset('img/img-1.jpg')}}">
                    </a>
                    <span class="product-discount-label">-33%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Skin Avocado</a></h3>
                    <div class="price"><span>$90.00</span> $66.00</div>
                    <a class="add-to-cart" href="#">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mt-4">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="{{asset('img/img-1.jpg')}}">
                    </a>
                    <span class="product-discount-label">-33%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Skin Avocado</a></h3>
                    <div class="price"><span>$90.00</span> $66.00</div>
                    <a class="add-to-cart" href="#">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mt-4">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="{{asset('img/img-1.jpg')}}">
                    </a>
                    <span class="product-discount-label">-33%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Skin Avocado</a></h3>
                    <div class="price"><span>$90.00</span> $66.00</div>
                    <a class="add-to-cart" href="#">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mt-4">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="{{asset('img/img-1.jpg')}}">
                    </a>
                    <span class="product-discount-label">-33%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Skin Avocado</a></h3>
                    <div class="price"><span>$90.00</span> $66.00</div>
                    <a class="add-to-cart" href="#">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mt-4">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="{{asset('img/img-1.jpg')}}">
                    </a>
                    <span class="product-discount-label">-33%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Skin Avocado</a></h3>
                    <div class="price"><span>$90.00</span> $66.00</div>
                    <a class="add-to-cart" href="#">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mt-4">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="{{asset('img/img-1.jpg')}}">
                    </a>
                    <span class="product-discount-label">-33%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Skin Avocado</a></h3>
                    <div class="price"><span>$90.00</span> $66.00</div>
                    <a class="add-to-cart" href="#">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mt-4">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="{{asset('img/img-1.jpg')}}">
                    </a>
                    {{-- <ul class="product-links">
                        <li><a href="#" data-tip="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                        <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                        <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                    </ul> --}}
                </div>
                <div class="product-content">
                    {{-- <ul class="rating">
                        <li class="fas fa-star"></li>
                        <li class="fas fa-star"></li>
                        <li class="fas fa-star"></li>
                        <li class="fas fa-star"></li>
                        <li class="far fa-star"></li>
                    </ul> --}}
                    <h3 class="title"><a href="#">Avocado Skin</a></h3>
                    <div class="price">$79.90</div>
                    <a class="add-to-cart" href="#">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

    @endsection
