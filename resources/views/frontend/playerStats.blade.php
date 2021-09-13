@extends('layouts.frontend', ['breadcrumb'=>'Player Stats'])

@section('content')
<section class="pricing_part padding_top playerstats-page">
    @if($user)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_tittle text-center">
                    <img class="img-responsive rounded mb-3" src="https://crafatar.com/avatars/{{$user['uuid']}}" alt="">
                    <h2>{{$user['username']}} - {{$playerStats['LUCKPERMS']['primary_group'] ?? ''}}</h2>  
                    <p><span class="h3 d-inline-block"><i class="far fa-clock"></i> Time Played : {{$playerStats['PLAYTIME']['time'] ? \Carbon\CarbonInterval::seconds($playerStats['PLAYTIME']['time'])->cascade()->forHumans(['short' => true, 'parts' => 3]) : '0'}}</span>  <span class="h3"> - Tokens : {{$playerStats['TOKENS']['tokens'] ?? '0'}}</span></p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" @if ($playerStats==Null) style="filter: blur(2px);" @endif>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card p-0 single_pricing_part m-1">
                        <img class="card-img rounded-top h-100" src="{{asset('img/games/skypvp.png')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-white">SKYPVP</h5>
                            <div class="card-text">
                                <div class="row text-stat-color">
                                    <div class="col-6">
                                        <p class="mb-0">Kills</p>
                                        <p>{{$playerStats['SKYPVP']['kills'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Deaths</p>
                                        <p>{{$playerStats['SKYPVP']['deaths'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Kill Streak</p>
                                        <p>{{$playerStats['SKYPVP']['killstreak'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Coins</p>
                                        <p>{{$playerStats['SKYPVP']['points'] ?? 'N/A'}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-0 single_pricing_part m-2">
                        <img class="card-img rounded-top h-100" src="{{asset('img/games/ffa.png')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-white">FFA</h5>
                            <div class="card-text">
                                <div class="row text-stat-color">
                                    <div class="col-6">
                                        <p class="mb-0">Kills</p>
                                        <p>{{$playerStats['FFA']['kills'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Deaths</p>
                                        <p>{{$playerStats['FFA']['deaths'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Kill Streak</p>
                                        <p>{{$playerStats['FFA']['killstreak'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Coins</p>
                                        <p>{{$playerStats['FFA']['points'] ?? 'N/A'}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-0 single_pricing_part m-2">
                        <img class="card-img rounded-top h-100" src="{{asset('img/games/sw.png')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-white">SKYWARS</h5>
                            <div class="card-text">
                                <div class="row text-stat-color">
                                    <div class="col-6">
                                        <p class="mb-0">Kills</p>
                                        <p>{{$playerStats['SKYWARS']['Kills'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Wins</p>
                                        <p>{{$playerStats['SKYWARS']['Wins'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Deaths</p>
                                        <p>{{$playerStats['SKYWARS']['Deaths'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Coins</p>
                                        <p>{{$playerStats['SKYWARS']['Coins'] ?? 'N/A'}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-0 single_pricing_part m-2">
                        <img class="card-img rounded-top h-100" src="{{asset('img/games/tnt.png')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-white">TNTRUN</h5>
                            <div class="card-text">
                                <div class="row text-stat-color">
                                    <div class="col-6">
                                        <p class="mb-0">Loses</p>
                                        <p>{{$playerStats['TNTRUN']['loses'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Victories</p>
                                        <p>{{$playerStats['TNTRUN']['victories'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Destroyed</p>
                                        <p>{{$playerStats['TNTRUN']['blocks_destroyed'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Played</p>
                                        <p>{{$playerStats['TNTRUN']['played'] ?? 'N/A'}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-0 single_pricing_part m-2">
                        <img class="card-img rounded-top h-100" src="{{asset('img/games/practice.png')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-white">PRACTICE</h5>
                            <div class="card-text">
                                <div class="row text-stat-color">
                                    <div class="col-6">
                                        <p class="mb-0">Kills</p>
                                        <p>{{$playerStats['PRACTICE']['kills'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Deaths</p>
                                        <p>{{$playerStats['PRACTICE']['deaths'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Brackets</p>
                                        <p>{{$playerStats['PRACTICE']['brackets'] ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Sumo Wins</p>
                                        <p>{{$playerStats['PRACTICE']['sumo_wins'] ?? 'N/A'}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-white">No User With This Username</h2>
        </div>
    </div>
    @endif
    @if ($playerStats == Null && $user)
    <p class="btn_1 position-absolute btn_overpage_1 w-50">No Data For This Account On Our Server</p>
    @endif
</section>
@endsection
