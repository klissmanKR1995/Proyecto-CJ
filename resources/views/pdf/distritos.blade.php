<!DOCTYPE html>
<html>
<head>
	<title>Consulta-Distritos</title>
	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>

	<div class="container">
		
		<h4 class="text-center">PODER JUDICIAL DEL ESTADO DE TLAXCALA</h4><br>

		<center>
			<img src="{{ asset('/images/escudo.png') }}" width="120">
		</center>

		<hr></hr>

		<p class="text-center"> <strong> REPORTE GENERAL DISTRITOS </strong> </p>

	</div>
	<br> <br>

	<center>
		<table class="table table-striped">
	        <thead>
	            <tr>
	              <th scope="col"> Nombre Distrito </th>
	              <th scope="col"> Estatus Distrito </th>
	              <th scope="col"> Fecha de Registro</th>
	            </tr>
	            
	          @foreach($distritos as $distrito)
	          	<tr>
	          		 <td>{{$distrito->nombre_distrito}}</td>
		             <td>{{$distrito->estatus}}</td>
		             <td> <span class="badge badge-primary"> {{$distrito->created_at}} </span> </td>
	          	</tr>
	          @endforeach 

	        </thead>
	    </table>
    </center>

</body>
</html>