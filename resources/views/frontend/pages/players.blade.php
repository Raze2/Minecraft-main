@extends('layouts.frontend', ['breadcrumb'=>'Players'])

@section('content')

    <section class="pricing_part padding_top">
        <div class="container">
            @php($roles = App\Models\Role::where('title', '!=', 'user')->with('users')->get())
            @foreach($roles as $role)
                @php($players = $role->users)
                @if ($players->count() > 0)
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_tittle text-center  mt-5 mb-4">
                            <h2>{{Str::plural($role->title)}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($players as $player)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_pricing_part">
                            @if($player->skin_image)
                                <img class="h-100" src="{{ $player->skin_image->getUrl() }}">
                            @else
                            <img class="h-100" src="{{ asset('img/skin.png')}}" alt="">
                            @endif
                            <h3 class="text-white">{{ $player->username ? $player->username : $player->name }}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            @endforeach
        </div>
    </section>
    
@endsection