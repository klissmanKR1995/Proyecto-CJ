<!DOCTYPE html>
<html>
<head>
	<title>Consulta-Juzgados</title>
	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>

	<div class="container">
		
		<h4 class="text-center">PODER JUDICIAL DEL ESTADO DE TLAXCALA</h4><br>

		<center>
			<img src="{{ asset('/images/escudo.png') }}" width="120">
		</center>

		<hr></hr>

		<p class="text-center"> <strong> REPORTE GENERAL JUZGADOS </strong> </p>

	</div>
	<br> <br>

	<center>
		<table class="table table-striped">
	        <thead>
	            <tr>
	              <th scope="col"> Nombre Juzgado </th>
	              <th scope="col"> Estatus Juzgado </th>
	              <th scope="col"> Nombre Distrito</th>
	              <th scope="col"> Fecha Registro</th>

	            </tr>
	            
	          @foreach($juzgados as $juzgado)
	          	<tr>
	          		 <td>{{$juzgado->nombre_juzgado}}</td>
		             <td>{{$juzgado->estatus}}</td>
		             <td>{{$juzgado->nombre_distrito}}</td>
		             <td> <span class="badge badge-primary"> {{$juzgado->created_at}} </span> </td>
	          	</tr>
	          @endforeach 

	        </thead>
	    </table>
    </center>

</body>
</html>