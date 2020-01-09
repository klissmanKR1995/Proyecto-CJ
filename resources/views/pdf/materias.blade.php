<!DOCTYPE html>
<html>
<head>
	<title>Consulta-Materias</title>
	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>

	<div class="container">
		
		<h4 class="text-center">PODER JUDICIAL DEL ESTADO DE TLAXCALA</h4><br>

		<center>
			<img src="{{ asset('/images/escudo.png') }}" width="120">
		</center>

		<hr></hr>

		<p class="text-center"> <strong> REPORTE GENERAL MATERIAS </strong> </p>

	</div>
	<br> <br>

	<center>
		<table class="table table-striped">
	        <thead>
	            <tr>
	              <th scope="col"> Nombre Materia </th>
	              <th scope="col"> Estatus Materia </th>
	              <th scope="col"> Fecha de Registro</th>
	            </tr>
	            
	          @foreach($materias as $materia)
	          	<tr>
	          		 <td>{{$materia->nombre_materia}}</td>
		             <td>{{$materia->estatus}}</td>
		             <td> <span class="badge badge-primary"> {{$materia->created_at}} </span> </td>
	          	</tr>
	          @endforeach 

	        </thead>
	    </table>
    </center>

</body>
</html>