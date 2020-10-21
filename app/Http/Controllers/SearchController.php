<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index()
    {
        $countries = DB::table('countries')->get();
        $players = DB::table('players')
                      ->join('countries', 'players.country_id', '=', 'countries.id')
                      //->get();
                      ->paginate(10);
        
        return view('pages.search', ['countries'=>$countries, 'players' =>$players, 'country_id'=> '', 'player_name'=> '']);
    }

    public function search(Request $request)
    {
        $country_id = $request->input('country');
        $player = $request->input('player');

        if(!empty($country_id)){
            $players = DB::table('players')
                    ->join('countries', 'players.country_id', '=', 'countries.id')
                    ->where('country_id', '=', $country_id)
                    ->where('name', 'like', '%'.$player.'%')
                    //->get();
                    ->paginate(10);
        }
        else{
            $players = DB::table('players')
                    ->join('countries', 'players.country_id', '=', 'countries.id')
                    ->where('name', 'like', '%'.$player.'%')
                    //->get();
                    ->paginate(10);
        }

        $countries = DB::table('countries')->get();
        return view('pages.search', ['countries'=>$countries, 'players' =>$players, 'country_id'=> $country_id, 'player_name'=> $player]);
    }
}
