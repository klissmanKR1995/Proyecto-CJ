<!DOCTYPE html>
<html>
<head>
	<title>Consulta-Juicios</title>
	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>

	<div class="container">
		
		<h4 class="text-center">PODER JUDICIAL DEL ESTADO DE TLAXCALA</h4><br>

		<center>
			<img src="{{ asset('/images/escudo.png') }}" width="120">
		</center>

		<hr></hr>

		<p class="text-center"> <strong> REPORTE GENERAL JUICIOS </strong> </p>

	</div>
	<br> <br>

	<center>
		<table class="table table-striped">
	        <thead>
	            <tr>
	              <th scope="col"> Nombre Juicio </th>
	              <th scope="col"> Estatus Juicio </th>
	              <th scope="col"> Materia Perteneciente </th>
	              <th scope="col"> Fecha de Registro</th>
	            </tr>
	            
	          @foreach($juicios as $juicio)
	          	<tr>
	          		 <td>{{$juicio->nombre_juicio}}</td>
		             <td>{{$juicio->estatus}}</td>
		             <td>{{$juicio->nombre_materia}}</td>
		             <td> <span class="badge badge-primary"> {{$juicio->created_at}} </span> </td>
	          	</tr>
	          @endforeach 

	        </thead>
	    </table>
    </center>

</body>
</html>