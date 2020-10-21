
@extends('layouts.app')

@section('content')

@include('inc.navbar')

<div class="container mt-2">

<div class="offset-md-2 col-md-8">
   <div class="text-center pb-2">
    <h2>Search</h2>
  </div>

   <form action="{{ url('search') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <div class="row" >
        <div class="form-group col-md-4">
            <label>Country</label>
            <select name="country" class="form-control" id="country">
                  <option value="">All Countries</option> 
              @foreach ($countries as $country)
                  <option value="{{$country->id}}">{{ $country->country_name }}</option> 
              @endforeach
          </select>
        </div>
        <div class="form-group col-md-5">
          <label>Player</label>
          <input type="text" name="player" class="form-control" id="player" placeholder="Enter Player Name"> 
        </div>
        <div class="form-group col-md-3" style="padding-top:30px;">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
  </form>
</div>

<div class="offset-md-2 col-md-8 pt-2">
 
      @foreach ($players as $player)
          <div class="card mb-2">
              <div class="card-body">
                  <h5 class="card-title">{{ $player->name }}</h5>
                  <p class="card-text"> Country: {{ $player->country_name }}</p>
                  <p class="card-text">Highscore: {{ $player->highest_score }}</p>
              </div>
          </div>
      @endforeach

      <div class="text-center">
          <div style="display:inline-block;">
            {{ $players->links()}}
          </div>
      </div>
</div>

</div>
@include('inc.footer') 

<script>
    var country_id = '<?php echo $country_id; ?>';
    var player_name = '<?php echo $player_name; ?>';
    if(country_id != ''){
      $('#country').val(country_id);  
    }
    if(player_name != ''){
      $('#player').val(player_name);  
    }
</script>  



@endsection
    