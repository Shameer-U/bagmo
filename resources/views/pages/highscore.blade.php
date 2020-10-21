@extends('layouts.app')

@section('content')

@include('inc.navbar')

<div class="container mt-2">
		    
    <div class="text-center pb-2">
     <h2>Highscore</h2>
   </div>
  
   <div id="chartContainer" style="height: 300px; width: 100%;"></div>
 
</div>
@include('inc.footer')  


{{-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>   --}}
<script src="{{ asset('src/js/canvasjs.min.js')}}"></script>
<script>
    var score = <?php echo $scores; ?>;
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,  
        title:{
            text: "Highscores of each player"
        },
        axisY: {
            title: "Runs",
          //  valueFormatString: "#0,,.",
           // valueFormatString: "$#,##0.##"
           // suffix: "mn",
            //prefix: "$"
        },
        data: [{
            type: "splineArea",
            color: "rgba(54,158,173,.7)",
            markerSize: 5,
           // xValueFormatString: "$#,##0.##",
           // yValueFormatString: "$#,##0.##",
           /* dataPoints: [
                { y: 50 , label: "rohit"},
                { y: 100, label: "kohli" },
                { x: 2, y: 150 },
                { x: 2.5, y: 200 },
                { x: 3, y: 250 }
            ]*/
            dataPoints: score
        }]
        });
    chart.render();
    
    }
    </script>    
@endsection
    