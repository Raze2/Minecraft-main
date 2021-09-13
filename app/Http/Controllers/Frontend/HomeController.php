<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {
        $posts = Post::latest()->paginate(3);
        $latestPlayers = DB::connection('players')->select('select uniqueId,lastNickname from user_profiles ORDER BY firstSeen desc LIMIT 5');
        $tokensPlayers = DB::connection('tokens')->select('select uuid,tokens from PLAYER_TOKENS ORDER BY tokens desc LIMIT 5');
        $ToptokensPlayers = array();
        foreach($tokensPlayers as $topTokenPlayer) {
            $player = DB::connection('players')->select('select uniqueId,lastNickname,hashedPassword from user_profiles where uniqueId = ?', [str_replace("-","",$topTokenPlayer->uuid)]);
            if($player) {
                $ToptokensPlayers[] = [
                    'UUID' => $topTokenPlayer->uuid,
                    'tokens' => $topTokenPlayer->tokens,
                    'username' => $player[0]->lastNickname,
                ];
            }
        }
        $buyerPlayers = DB::connection('orders')->select('select username from purchase ORDER BY id desc LIMIT 5');
        $lastBuyerPlayers = array();
        foreach($buyerPlayers as $lastbuyPlayer) {
            $player = DB::connection('players')->select('select uniqueId,lastNickname,hashedPassword from user_profiles where lastNickname = ?', [$lastbuyPlayer->username]);
            if($player) {
                $lastBuyerPlayers[] = [
                    'UUID' => $player[0]->uniqueId,
                    'username' => $player[0]->lastNickname,
                ];
            }
        }
        $ToptimePlayers = DB::connection('toptime')->select('select UUID,username,time from toptime ORDER BY time desc LIMIT 5');
        return view('frontend.home', compact('posts', 'latestPlayers', 'ToptokensPlayers', 'ToptimePlayers', 'lastBuyerPlayers'));
    }
}
