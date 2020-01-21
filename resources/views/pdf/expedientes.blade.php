<!DOCTYPE html>
<html>
<head>
	<title>Consulta-Expedientes</title>
	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>

	<div class="container">
		
		<h4 class="text-center">PODER JUDICIAL DEL ESTADO DE TLAXCALA</h4><br>

		<center>
			<img src="{{ asset('/images/escudo.png') }}" width="120">
		</center>

		<hr></hr>

		<p class="text-center"> <strong> REPORTE GENERAL EXPEDIENTES </strong> </p>

	</div>
	<br> <br>

	<center>
		<table class="table table-striped">
	        <thead>
	            <tr>
	              <th scope="col"> Número de expediente </th>
	              <th scope="col"> Materia </th>
	              <th scope="col"> Juicio </th>
	              <th scope="col"> Nombre-Actor</th>
	              <th scope="col"> Nombre-Demandado</th>
	              <th scope="col"> Fecha-Tribunal</th>
	              <th scope="col"> Fecha-Juzgado</th>
	              <th scope="col"> Tipo-Juicio</th>
	            </tr>
	            
	          @foreach($expedientes as $expediente)
	          	<tr>
	          		 <td>{{$expediente->numero_expediente}}</td>
		             <td>{{$expediente->nombre_materia}}</td>
		             <td>{{$expediente->nombre_juzgado}}</td>
		             <td>{{$expediente->nombre_actor}}</td>
		             <td>{{$expediente->nombre_demandado}}</td>
		             <td>{{$expediente->fecha_en_tribunal}}</td>
		             <td>{{$expediente->fecha_en_juzgado}}</td>
		             <td>{{$expediente->nombre_juicio}}</td>
	          	</tr>
	          @endforeach 

	        </thead>
	    </table>
    </center>

</body>
</html>