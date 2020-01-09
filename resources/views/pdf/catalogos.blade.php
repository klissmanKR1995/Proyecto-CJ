<!DOCTYPE html>
<html>
<head>
	<title>Consulta-Variables</title>
	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>

	<div class="container">
		
		<h4 class="text-center">PODER JUDICIAL DEL ESTADO DE TLAXCALA</h4><br>

		<center>
			<img src="{{ asset('/images/escudo.png') }}" width="120">
		</center>

		<hr></hr>

		<p class="text-center"> <strong> REPORTE GENERAL VARIABLES </strong> </p>

	</div>
	<br> <br>

	<center>
		<table class="table table-striped">
	        <thead>
	            <tr>
	              <th scope="col"> Nombre Variable </th>
	              <th scope="col"> Estatus Variable </th>
	              <th scope="col"> Fecha de Registro</th>
	            </tr>
	            
	          @foreach($catalogos as $catalogo)
	          	<tr>
	          		 <td>{{$catalogo->nombre_variable}}</td>
		             <td>{{$catalogo->estatus}}</td>
		             <td> <span class="badge badge-primary"> {{$catalogo->created_at}} </span> </td>
	          	</tr>
	          @endforeach 

	        </thead>
	    </table>
    </center>

</body>
</html>