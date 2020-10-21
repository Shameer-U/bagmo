@extends('layouts.app')

@section('content')

@include('inc.navbar')

<div class="container mt-2">
		    
    <div class="text-center">
     <h2>Players</h2>
   </div>

<div class="offset-md-3 col-md-6">
   <form class="p-4"  action="{{ url('players') }}" method="POST" enctype="multipart/form-data" >
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" id="name"  placeholder="Enter Name" autocomplete="off">
            <span class="error_form" id="name_errmsg"></span>
        </div>
        <div class="form-group">
            <label>Country</label>
            <select name="country" class="form-control" id="country">
                <option value="">Select Country</option> 
                @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{ $country->country_name }}</option> 
                @endforeach
            </select>
            <span class="error_form" id="country_errmsg"></span>
        </div>
        <div class="form-group">
            <label>Highest Score</label>
            <input type="text" class="form-control" name="highest_score" id="highest_score" placeholder="Enter Highest Score" autocomplete="off">
            <span class="error_form" id="highest_score_errmsg"></span>
        </div>
        <button type="submit"  name="submit" id="submit_btn" class="btn btn-primary btn-block text-center">Submit</button>
        
    </form>
</div>

</div>
@include('inc.footer')   

<!--Validation section-->
<script>
    
    var error_msg;
    var error_span_id;
    var error_input_field;
    
    var error_name;
    var error_country;
    var error_highest_score;
    
    $('#name_errmsg').hide();
    $('country_errmsg').hide();
    $('#highest_score_errmsg').hide();
    
    
    $('#name').on('input',function(){
        //check_name(); 
        hide_error('#name_errmsg', '#name');  
    });
    $('#country').on('input',function(){
       // check_country();
        hide_error('#country_errmsg', '#country');  
    });
    $('#highest_score').on('input',function(){
        //check_highest_score(); 
        hide_error('#highest_score_errmsg', '#highest_score');  
    });

  
    function check_name(){
        var name = $('#name').val();
      
        if(name != '' ){
            hide_error('#name_errmsg', '#name');
            error_name = false;
        }
        else{
            display_error_msg('Invalid name', '#name_errmsg', '#name');
            error_name = true; 
        }
    }

    function check_country(){
        var country = $('#country').val();
      
        if(country != '' ){
            hide_error('#country_errmsg', '#country');
            error_country = false;
        }
        else{
            display_error_msg('Select a country', '#country_errmsg', '#country');
            error_country = true; 
        }
    }

    function check_highest_score(){
        var highest_score = $('#highest_score').val();
        var regex = /^[0-9]+$/;//allows digits , nothing else
    
        if(highest_score != '' &&  highest_score.match(regex)){
            hide_error('#highest_score_errmsg', '#highest_score');
            error_highest_score = false;
        }
        else{
            display_error_msg('Invalid score', '#highest_score_errmsg', '#highest_score');
            error_highest_score = true; 
        }
    }
    
     
    
    //FOR UPDATING COMPLAINT

    $('#submit_btn').click(function(e){
            error_name     = true;
            error_country    = true;
            error_highest_score   = true;

            check_name(); 
            check_country();
            check_highest_score();

        if(error_name == true || error_country == true || error_highest_score == true ){
                e.preventDefault();
                e.stopPropagation();
            }
    });
    
    
    function hide_error(error_span_id, error_input_field){
        $(error_span_id).hide();
        $(error_input_field).css("border", "1px solid #ced4da");
    }
    
    function display_error_msg(error_msg, error_span_id, error_input_field){
        $(error_span_id).html(error_msg);
        $(error_span_id).show();
        $(error_span_id).css("color", "#F90A0A");
        $(error_input_field).css("border", "2px solid #F90A0A");
    }
</script>

@endsection
    