@extends('layouts.frontend', ['breadcrumb'=>'Player Stats'])

@section('content')
@php($have = 0)
<section class="pricing_part padding_top">
    @if($have == 0)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_tittle text-center">
                    <h2>Player Stats</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="filter: blur(2px);">
            <div class="card-columns">
                <div class="card p-0 single_pricing_part">
                    <img class="card-img rounded-0 h-100" src="img/blog/single_blog_1.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-white">Minecraft Server 1</h5>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-0 single_pricing_part">
                    <img class="card-img rounded-0 h-100" src="img/blog/single_blog_1.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-white">Minecraft Server 1</h5>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-0 single_pricing_part">
                    <img class="card-img rounded-0 h-100" src="img/blog/single_blog_1.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-white">Minecraft Server 1</h5>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-0 single_pricing_part">
                    <img class="card-img rounded-0 h-100" src="img/blog/single_blog_1.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-white">Minecraft Server 1</h5>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-0 single_pricing_part">
                    <img class="card-img rounded-0 h-100" src="img/blog/single_blog_1.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-white">Minecraft Server 1</h5>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">Kills</p>
                                    <p>N/A</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{route('frontend.profile.index')}}" class="btn_1 position-absolute btn_overpage_1 w-50">Add your username to preview this page</a>
    @else

    @endif
</section>
@endsection
