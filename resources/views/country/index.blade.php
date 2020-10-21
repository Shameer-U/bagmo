@extends('layouts.app')

@section('content')

@include('inc.navbar')

<div class="container mt-2">
		    
    <div class="text-center">
     <h2>Dashboard</h2>
   </div>

   <div class="mb-2">
       <a href="{{url('country/create')}}" class="btn btn-primary">Create New Country</a>
   </div>

   <div class="card card-body">
    <table id="dataTable" class="display mt-2" style="width:100%">
         <thead>
             <tr>
                 <th>No</th>
                 <th>Country Name</th>
                 <th>Action</th>>
             </tr>
         </thead>
         <tbody>
 
         <?php $i = 0; ?>
         @foreach( $countries as $country )
           <?php $i++; ?>
           <tr>
              <td>{{$i}}</td>
              <td>{{$country->country_name }}</td>
               <td>
                   <a class="btn btn-info btn-sm" href="/country/{{$country->id}}/edit">Edit</a>
                   <form action="{{ url('country/'.$country->id) }}" method="POST" enctype="multipart/form-data" style="display:inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
               </td>
              
           </tr>
           @endforeach
         </tbody>
         <tfoot>
             <tr>
                <th>No</th>
                <th>Country Name</th>
                <th>Action</th>>
             </tr>
         </tfoot>
     </table>
 </div>

</div>
@include('inc.footer')   

<script type="text/javascript" src="{{ asset('src/datatables/js/jquery.dataTables.min.js') }}"></script>
<script>
   $(document).ready(function() { 
        $('#dataTable').DataTable({  });
    });
</script>

@endsection
    