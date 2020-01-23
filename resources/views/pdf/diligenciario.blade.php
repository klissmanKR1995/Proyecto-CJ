<!DOCTYPE html>
<html>
<head>
	<title>Consulta-Modulo X</title>
	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>

	<div class="container">
		
		<h4 class="text-center">PODER JUDICIAL DEL ESTADO DE TLAXCALA</h4><br>

		<center>
			<img src="{{ asset('/images/escudo.png') }}" width="120">
		</center>

		<hr></hr>

		<p class="text-center"> <strong> REPORTE GENERAL MODULO X </strong> </p>

	</div>
	<br> <br>

	<center>
		<table class="table table-striped">
	        <thead>
	            <tr>
	              <th scope="col"> Número de expediente </th>
	              <th scope="col"> Fecha Juez </th>
	              <th scope="col"> Mecanismos </th>
	              <th scope="col"> Pais</th>
	              <th scope="col"> Estado</th>
	              <th scope="col"> Municipio</th>
	              <th scope="col"> Codigo Postal</th>
	              <th scope="col"> Numero Visitas</th>
	            </tr>
	            
	          @foreach($modulotres as $modulotres)
	          	<tr>
	          		 <td>{{$modulotres->numero_expediente}}</td>
		             <td>{{$modulotres->fecha_juez_emplazamiento}}</td>
		             <td>{{$modulotres->mecanismos_realizar_emplazamiento}}</td>
		             <td>{{$modulotres->pais_emplazamiento}}</td>
		             <td>{{$modulotres->estado_emplazamiento}}</td>
		             <td>{{$modulotres->municipio_emplazamiento}}</td>
		             <td>{{$modulotres->codigo_postal}}</td>
		             <td>{{$modulotres->numero_visitas}}</td>
	          	</tr>
	          @endforeach 

	        </thead>
	    </table>
    </center>

</body>
</html>