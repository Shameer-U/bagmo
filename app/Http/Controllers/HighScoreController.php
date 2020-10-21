<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class HighScoreController extends Controller
{
    public function index()
    {
        $data = array();
        $players = Player::all();                                                                        
      
       foreach($players as $player){
           $y = (int) $player->highest_score;
           $label = $player->name;
           $data[] = ['y'=> $y, 'label'=> $label];
       }

       return view('pages.highscore', ['scores' => json_encode($data)]);
    }
}
