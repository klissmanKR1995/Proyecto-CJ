<!DOCTYPE html>
<html>
<head>
	<title>Consulta-ValoresCatalogos</title>
	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>

	<div class="container">
		
		<h4 class="text-center">PODER JUDICIAL DEL ESTADO DE TLAXCALA</h4><br>

		<center>
			<img src="{{ asset('/images/escudo.png') }}" width="120">
		</center>

		<hr></hr>

		<p class="text-center"> <strong> REPORTE GENERAL VALORES-CATALOGOS </strong> </p>

	</div>
	<br> <br>

	<center>
		<table class="table table-striped">
	        <thead>
	            <tr>
	              <th scope="col"> Nombre Catalogo </th>
	              <th scope="col"> Valor Catalogo </th>
	              <th scope="col"> Fecha de Registro</th>
	            </tr>
	            
	          @foreach($valorescatalagos as $valorescatalago)
	          	<tr>
	          		 <td>{{$valorescatalago->nombre_variable}}</td>
		             <td>{{$valorescatalago->valor_variable}}</td>
		             <td> <span class="badge badge-primary"> {{$valorescatalago->created_at}} </span> </td>
	          	</tr>
	          @endforeach 

	        </thead>
	    </table>
    </center>

</body>
</html>