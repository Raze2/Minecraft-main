@extends('layouts.frontend')

@section('content')

    <section class="pricing_part padding_top">
        <div class="container">
            @php($roles = App\Models\Role::whereHas('showUsers')->with('showUsers')->get())
            @foreach($roles as $role)
                @if ($role->showUsers() !== null )
                @php($players = $role->showUsers()->get())
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_tittle text-center  mt-5 mb-4">
                            <h2>{{Str::plural($role->title)}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($players as $player)
                    <?php 
                        if($player->uuid == null || !$player->uuid){
                            $mincraftPlayer = \Illuminate\Support\Facades\Http::get('https://playerdb.co/api/player/minecraft/' . $player->username);
                            if($mincraftPlayer['success'] == 1){
                                $player->uuid = $mincraftPlayer['data']['player']['id'];
                            } else {
                                $player->uuid = 'b1887aba5b633a5b994c336227775524';
                            }
                          }
                    ?>
                    <div class="col-lg-3 col-sm-6 my-2">
                        <div class="single_pricing_part">
                            <img class="h-100" src="https://crafatar.com/renders/body/{{$player->uuid}}?scale=8&default=MHF_Steve" alt="">
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