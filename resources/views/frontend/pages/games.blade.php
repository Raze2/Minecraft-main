@extends('layouts.frontend')

@section('content')
<section class="pricing_part padding_top game-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_tittle text-center">
                    <h2>{{ __('frontend.our_games') }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="row w-100 justify-content-center">
                <div class="col-md-6">
                    <div class="card p-0 single_pricing_part mb-4">
                        <img class="card-img rounded-top h-100 mb-0" src="{{asset('img/games/sw.png')}}" alt="">
                        <div class="card-body mb-3"> 
                            <h5 class="card-title">
                                SKYWARS
                            </h5>
                            <div class="row">
                                <div class="col-6 col-md-4 text-player-color">
                                    <h6 class="text-center">Top Kills</h6>
                                    @foreach ($game['sw']['kills'] as $player)
                                    <p class="text-left m-0">{{$player->Name}} <span
                                            class="float-right">{{$player->Kills}}</span></p>
                                    @endforeach
                                </div>
                                <div class="col-6 col-md-4 text-player-color">
                                    <h6 class="text-center">Top Wins</h6>
                                    @foreach ($game['sw']['wins'] as $player)
                                    <p class="text-left m-0">{{$player->Name}} <span
                                            class="float-right">{{$player->Wins}}</span></p>
                                    @endforeach
                                </div>
                                <div class="col-6 col-md-4 text-player-color">
                                    <h6 class="text-center">Top Coins</h6>
                                    @foreach ($game['sw']['coins'] as $player)
                                    <p class="text-left m-0">{{$player->Name}} <span
                                            class="float-right">{{$player->Coins}}</span></p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-0 single_pricing_part mb-4">
                        <img class="card-img rounded-top h-100 mb-0" src="{{asset('img/games/skypvp.png')}}" alt="">
                        <div class="card-body mb-3">
                            <h5 class="card-title">
                                SKYPVP
                            </h5>
                            <div class="row">
                                <div class="col-6 col-md-4 text-player-color">
                                    <h6 class="text-center">Top Coins</h6>
                                    @foreach ($game['skypvp']['coins'] as $player)
                                    <p class="text-left m-0">{{$player->username}} <span
                                            class="float-right">{{$player->points}}</span></p>
                                    @endforeach
                                </div>
                                <div class="col-6 col-md-4 text-player-color">
                                    <h6 class="text-center">Top Kills</h6>
                                    @foreach ($game['skypvp']['kills'] as $player)
                                    <p class="text-left m-0">{{$player->username}} <span
                                            class="float-right">{{$player->kills}}</span></p>
                                    @endforeach
                                </div>
                                <div class="col-6 col-md-4 text-player-color">
                                    <h6 class="text-center">Top Killstreak</h6>
                                    @foreach ($game['skypvp']['killstreak'] as $player)
                                    <p class="text-left m-0">{{$player->username}} <span
                                            class="float-right">{{$player->killstreak}}</span></p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card p-0 single_pricing_part mb-4">
                        <img class="card-img rounded-top h-100 mb-0" src="{{asset('img/games/ffa.png')}}" alt="">
                        <div class="card-body mb-3">
                            <h5 class="card-title">
                                FFA
                            </h5>
                            <div class="row">
                                <div class="col-6 col-md-4 text-player-color">
                                    <h6 class="text-center">Top Coins</h6>
                                    @foreach ($game['ffa']['coins'] as $player)
                                    <p class="text-left m-0">{{$player->username}} <span
                                            class="float-right">{{$player->points}}</span></p>
                                    @endforeach
                                </div>
                                <div class="col-6 col-md-4 text-player-color">
                                    <h6 class="text-center">Top Kills</h6>
                                    @foreach ($game['ffa']['kills'] as $player)
                                    <p class="text-left m-0">{{$player->username}} <span
                                            class="float-right">{{$player->kills}}</span></p>
                                    @endforeach
                                </div>
                                <div class="col-6 col-md-4 text-player-color">
                                    <h6 class="text-center">Top Killstreak</h6>
                                    @foreach ($game['ffa']['killstreak'] as $player)
                                    <p class="text-left m-0">{{$player->username}} <span
                                            class="float-right">{{$player->killstreak}}</span></p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card p-0 single_pricing_part mb-4">
                        <img class="card-img rounded-top h-100 mb-0" src="{{asset('img/games/practice.png')}}" alt="">
                        <div class="card-body mb-3">
                            <h5 class="card-title">
                                PRACTICE
                            </h5>
                            <div class="col-6 mx-auto text-player-color">
                                <h6 class="text-center">Top Kills</h6>
                                @foreach ($game['practice']['kills'] as $player)
                                <p class="text-left m-0">{{$player->username}} <span class="float-right">{{$player->kills}}</span></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card p-0 single_pricing_part mb-4">
                        <img class="card-img rounded-top h-100 mb-0" src="{{asset('img/games/tnt.png')}}" alt="">
                        <div class="card-body mb-3">
                            <h5 class="card-title">
                                TNTRUN
                            </h5>
                            <div class="row">
                                <div class="col-6 text-player-color">
                                    <h6 class="text-center">Top Wins</h6>
                                    @foreach ($game['tntrun']['wins'] as $player)
                                    <p class="text-left m-0">{{$player['username']}} <span
                                            class="float-right">{{$player['victories']}}</span></p>
                                    @endforeach
                                </div>
                                <div class="col-6 text-player-color">
                                    <h6 class="text-center">Top PlayedGames</h6>
                                    @foreach ($game['tntrun']['playedgames'] as $player)
                                    <p class="text-left m-0">{{$player['username']}} <span
                                            class="float-right">{{$player['played']}}</span></p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
