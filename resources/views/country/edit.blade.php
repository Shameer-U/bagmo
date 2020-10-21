@extends('layouts.app')

@section('content')

@include('inc.navbar1')

<div class="container mt-2">


<div class="offset-md-3 col-md-6">
    <div class="text-center">
        <h2>Edit Country</h2>
    </div>
   <form class="p-4"  action="{{ url('country/'.$country->id ) }}" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Country Name</label>
            <input type="text" class="form-control" name="country_name" id="country_name"  placeholder="Enter Country Name" value="{{ $country->country_name }}">
            <span class="error_form" id="country_name_errmsg"></span>
        </div>
        <button type="submit"  name="submit" id="submit_btn" class="btn btn-primary btn-block text-center">Save</button>
    </form>
</div>

</div>
@include('inc.footer')   

<!--Validation section-->
<script>
    
    var error_msg;
    var error_span_id;
    var error_input_field;
    
    var error_country_name;
    
    $('#country_name').on('input',function(){
       // check_country_name();
        hide_error('#country_name_errmsg', '#country_name');  
    });

    function check_country_name(){
        var country_name = $('#country_name').val();
      
        if(country_name != '' ){
            hide_error('#country_name_errmsg', '#country_name');
            error_country_name = false;
        }
        else{
            display_error_msg('Invalid country name', '#country_name_errmsg', '#country_name');
            error_country_name = true; 
        }
    }
    
     
    
    //FOR UPDATING COMPLAINT

    $('#submit_btn').click(function(e){
          error_country_name    = true;

          check_country_name();

          if( error_country_name == true ){
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
    