@extends('layouts.app')

@section('content')

<div class="container pt-2">
  @include('inc.messages')
</div>

<div class="container mt-2">
		    
    <div class="text-center pb-4">
     <h4>Welcome back! Here is what you can do today</h4>
   </div>

<div class="row">
  <div class="col-md-6">
     <div class="card">
        <div class="card-body">
            <a href="{{ url('/players') }}"><img src="{{ asset('src/imgs/add-user.png')}}" alt="" style="height:100px; width:100px;"><h2 class="h2custom">Create Player</h2></a>
        </div>
     </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
          <a href="{{ url('/search') }}"><img src="{{ asset('src/imgs/seo.png')}}" alt="" style="height:100px; width:100px;"><h2 class="h2custom">Search</h2></a>
      </div>
    </div>
  </div>
</div>
<div class="row mt-2">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <a href="{{ url('/highscore') }}"><img src="{{ asset('src/imgs/sports-trophy.png')}}" alt="" style="height:100px; width:100px;"><h2 class="h2custom">Highscore</h2></a>
      </div>
    </div>
 </div>
 <div class="col-md-6">
    <div class="card">
      <div class="card-body">
          <a href="{{ url('/country') }}"><img src="{{ asset('src/imgs/dashboard.png')}}" alt="" style="height:100px; width:100px;"><h2 class="h2custom">Dashboard</h2></a>
      </div>
    </div>
 </div>
</div>

</div>
@include('inc.footer')  
      
@endsection
    