<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{

    public function index()
    {
        $game = array();
        $game['sw']['kills'] = DB::connection('sw')->select('select Name,Kills from UltraSkyWars ORDER BY Kills + 0 desc LIMIT 5'); 
        $game['sw']['wins'] = DB::connection('sw')->select('select Name,Wins from UltraSkyWars ORDER BY Wins + 0 desc LIMIT 5'); 
        $game['sw']['coins'] = DB::connection('sw')->select('select Name,Coins from UltraSkyWars ORDER BY Coins + 0 desc LIMIT 5'); 
        $game['skypvp']['coins'] = DB::connection('skypvp')->select('select username,points from skypvp ORDER BY points + 0 desc LIMIT 5'); 
        $game['skypvp']['kills'] = DB::connection('skypvp')->select('select username,kills from skypvp ORDER BY kills + 0 desc LIMIT 5'); 
        $game['skypvp']['killstreak'] = DB::connection('skypvp')->select('select username,killstreak from skypvp ORDER BY killstreak + 0 desc LIMIT 5'); 
        $game['ffa']['coins'] = DB::connection('ffa')->select('select username,points from FFA ORDER BY points + 0 desc LIMIT 5'); 
        $game['ffa']['kills'] = DB::connection('ffa')->select('select username,kills from FFA ORDER BY kills + 0 desc LIMIT 5'); 
        $game['ffa']['killstreak'] = DB::connection('ffa')->select('select username,killstreak from FFA ORDER BY killstreak + 0 desc LIMIT 5'); 
        $game['practice']['kills'] = DB::connection('practice')->select('select username,kills from stats ORDER BY kills + 0 desc LIMIT 5'); 
        $tntrunWinsPlayers = DB::connection('tntrun')->select('select username,victories from tntrun_stats ORDER BY victories + 0 desc LIMIT 5'); 
        foreach($tntrunWinsPlayers as $tntWinsPlayer) {
            $player = DB::connection('players')->select('select uniqueId,lastNickname,hashedPassword from user_profiles where uniqueId = ?', [str_replace("-","",$tntWinsPlayer->username)]);
            if($player) {
                $game['tntrun']['wins'][] = [
                    'username' => $player[0]->lastNickname,
                    'victories' => $tntWinsPlayer->victories,
                ];
            }
        }
        $tntrunGamePlayers = DB::connection('tntrun')->select('select username,played from tntrun_stats ORDER BY played + 0 desc LIMIT 5'); 
        foreach($tntrunGamePlayers as $tntGamePlayer) {
            $player = DB::connection('players')->select('select uniqueId,lastNickname,hashedPassword from user_profiles where uniqueId = ?', [str_replace("-","",$tntGamePlayer->username)]);
            if($player) {
                $game['tntrun']['playedgames'][] = [
                    'username' => $player[0]->lastNickname,
                    'played' => $tntGamePlayer->played,
                ];
            }
        }

        return view('frontend.pages.games', compact('game'));
    }

  }
