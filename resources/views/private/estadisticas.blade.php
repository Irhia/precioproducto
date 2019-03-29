<!-- Heredar de master.blade.php-->
@extends('master_user')


<!-- Para confifurar el título de nuestra página-->
@section('title','Anuncios')

 
 <!-- GOOGLE CHART: para sacar gráficos -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!--BOOSTRAP: -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	


<!-- Gráfico-->
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Anuncios', 'Mes'],
          ['Chollos',  {{$ads_total}}],
          ['Correcto', {{$correcto}}],
          ['Excesivo', {{$alto}}]
        ]);

        var options = {
          title: 'Anuncios',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>


@section('enlace')
    <link rel="stylesheet" type="text/css" href="css/my_css.css" />
@endsection


<!-- Para incluir el contenido. 
  @yield ('content') se lo indicamos en master.blade.php -->
@section('content')


<div class="container">
		 
		<div class="row border border-dark alert alert-danger">
		
			<div class="col-5 ">

				<h3>Anuncios: {{$ads_total}} <h3> <hr>
				<h5>Chollos: {{$chollos}}</h5> <br>
				<h5>Correcto: {{$correcto}}</h5><br>
				<h5>Alto: {{$alto}}</h5><br>

			</div>
				 
			<div class="col-7">
				<div id="piechart_3d" style="width: 500px; height: 300px;></div>
			</div>
			
			
		
		</div>
		
</div>	
				  
				
   

@endsection