<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class ProfileController extends Controller
{
    public function getStats() {
        $mincraftPlayer = Http::get('https://playerdb.co/api/player/minecraft/' . auth()->user()->uuid);
        
        if($mincraftPlayer['success'] == 1){
            $uuid =$mincraftPlayer['data']['player']['id'];
        } else {
            $uuid = substr_replace(auth()->user()->uuid, '-', 8, 0);
            $uuid = substr_replace($uuid, '-', 13, 0);
            $uuid = substr_replace($uuid, '-', 18, 0);
            $uuid = substr_replace($uuid, '-', 23, 0);
        }
        // dd($uuid);
        $user = ['username' => auth()->user()->username , 'uuid' => $uuid];
        $playerStats = Http::get('http://31.214.246.3:81/api/v1/players/' .  $uuid);

        if(isset($playerStats['stats'])){
            $playerStats = $playerStats['stats'];
        } else {
            $playerStats = Null;
        }
        
        return view('frontend.playerStats', compact('playerStats', 'user'));
    }

    public function searchIGN(Request $request) {
        $searchUser = DB::connection('players')->select('select uniqueId,lastNickname  from user_profiles where lastNickname LIKE ?', ['%'. $request->username .'%']);
        if($searchUser){
            $mincraftPlayer = Http::get('https://playerdb.co/api/player/minecraft/' . $searchUser[0]->uniqueId); 
            if($mincraftPlayer['success'] == 1){
                $uuid =$mincraftPlayer['data']['player']['id'];
            } else {
                $uuid = substr_replace($searchUser[0]->uniqueId, '-', 8, 0);
                $uuid = substr_replace($uuid, '-', 13, 0);
                $uuid = substr_replace($uuid, '-', 18, 0);
                $uuid = substr_replace($uuid, '-', 23, 0);
            }
            // dd($uuid);
            $user = ['username' => $searchUser[0]->lastNickname , 'uuid' => $uuid];
            $playerStats = Http::get('http://31.214.246.3:81/api/v1/players/' .  $uuid);
            if(isset($playerStats['stats'])){
                $playerStats = $playerStats['stats'];
            } else {
                $playerStats = Null;
            }
        } else {
            $user = Null;
            $playerStats = Null;
        }
        
        return view('frontend.playerStats', compact('playerStats', 'user'));
    }
}
