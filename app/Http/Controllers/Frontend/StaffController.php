<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;

class GameController extends Controller
{

    public function index()
    {
        $game = Game::with('media')->get();

        return view('frontend.games.index', compact('game'));
    }

  }
