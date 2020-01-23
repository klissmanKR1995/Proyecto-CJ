<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Sistema-EstadisticoCJ</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"/>
  <!-- Custom styles for this template --> 
  <link href="{{ asset('css/simple-sidebar.css')}}" rel="stylesheet">
  <link href="{{ asset('css/administrador.css')}}" rel="stylesheet">

</head>

<body>

<div id="app">

  <div class="d-flex" id="wrapper">

   <!-- Sidebar -->
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">  <h5 class="text-white" style="text-align: center;"> Bienvenido -   {{ Auth::user()->name }} <span class="caret"></span> </h5> </div>
          <div class="row">
              <div class="col-md-12  offset-md-1 col-lg-12 col-sm-12">
                  <img src="{{ asset('/images/escudo.png') }}" class="escudo">
              </div>    
          </div>  
          <div class="list-group list-group-flush">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              

              <a class="nav-link menuMain active" id="v-pills-inicio-tab" data-toggle="pill" href="#v-pills-inicio" role="tab" aria-controls="v-pills-inicio" aria-selected="false"><i class="fas fa-home"></i> Inicio</a>

              <a class="nav-link menuMain" id="v-pills-usuarios-tab" data-toggle="pill" href="#v-pills-usuarios" role="tab" aria-controls="v-pills-usuarios" aria-selected="false"><i class="fas fa-user"></i> Usuarios</a>

              

               <!-- Menu con submenu catalogos-->
              <li class="nav-item">
                  <a class="nav-link collapsed py-1 dropdown-toggle menuMain" href="#submenu2sub2" data-toggle="collapse" data-target="#submenu2sub2" role="tab" aria-controls="v-pills-home" aria-selected="false"><i class="fas fa-align-justify"></i> Catalogos</a>
                  <div class="collapse" id="submenu2sub2" aria-expanded="false" aria-controls="v-pills-home">
                      <ul class="flex-column nav pl-4">
                          <li class="nav-item">
                              <a class="nav-link p-1" id="v-pills-distritos-tab" data-toggle="pill" href="#v-pills-distritos" role="tab" aria-controls="v-pills-distritos" aria-selected="false">
                              <i class="fas fa-university"></i>  Distritos
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link p-1" id="v-pills-juzgado-tab" data-toggle="pill" href="#v-pills-juzgado" role="tab" aria-controls="v-pills-juzgado" aria-selected="false">
                               <i class="fas fa-building"></i> Juzgados
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link p-1" id="v-pills-materia-tab-tab" data-toggle="pill" href="#v-pills-materia" role="tab" aria-controls="v-pills-materia" aria-selected="false">
                              <i class="fas fa-gavel"></i>  Materia
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link p-1" id="v-pills-juicios-tab" data-toggle="pill" href="#v-pills-juicios" role="tab" aria-controls="v-pills-juicios" aria-selected="false">
                               <i class="fas fa-align-justify"></i>   Juicios
                              </a>
                          </li>
                           <li class="nav-item">
                              <a class="nav-link p-1" id="v-pills-variables-tab" data-toggle="pill" href="#v-pills-variables" role="tab" aria-controls="v-pills-variables" aria-selected="false">
                              <i class="fas fa-align-justify"></i> Variables
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link p-1" id="v-pills-valoresvariables-tab" data-toggle="pill" href="#v-pills-valoresvariables" role="tab" aria-controls="v-pills-valoresvariables" aria-selected="false">
                              <i class="fas fa-book"></i>  Catalogos-Relacionados
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
          <!-- Termina menu con submenu catalogos-->

              <!-- Menu con submenu catalogos-->
              <li class="nav-item">
                  <a class="nav-link collapsed py-1 dropdown-toggle menuMain" href="#submenu2sub3" data-toggle="collapse" data-target="#submenu2sub3" role="tab" aria-controls="v-pills-home" aria-selected="false"><i class="fas fa-align-justify"></i> Consulta-Modulos</a>
                  <div class="collapse" id="submenu2sub3" aria-expanded="false" aria-controls="v-pills-home">
                      <ul class="flex-column nav pl-4">
                          <li class="nav-item">
                              <a class="nav-link p-1" id="v-pills-expedientes-tab" data-toggle="pill" href="#v-pills-expedientes" role="tab" aria-controls="v-pills-expedientes" aria-selected="false">
                              <i class="fas fa-university"></i>  Expedientes
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link p-1" id="v-pills-moduloUno-tab" data-toggle="pill" href="#v-pills-moduloUno" role="tab" aria-controls="v-pills-moduloUno" aria-selected="false">
                              <i class="fas fa-university"></i>  Modulo - I
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link p-1" id="v-pills-moduloOcho-tab" data-toggle="pill" href="#v-pills-moduloOcho" role="tab" aria-controls="v-pills-moduloOcho" aria-selected="false">
                              <i class="fas fa-university"></i>  Modulo - VIII
                              </a>
                          </li>
                           <li class="nav-item">
                              <a class="nav-link p-1" id="v-pills-moduloDiez-tab" data-toggle="pill" href="#v-pills-moduloDiez" role="tab" aria-controls="v-pills-moduloDiez" aria-selected="false">
                              <i class="fas fa-university"></i>  Modulo - X
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
          <!-- Termina menu con submenu catalogos-->

              
              <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-in-alt"></i> 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                </form>                       
              Cerrar Sesion</a>
            </div>
          </div>

      </div>
      <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">


     <!-- Menu nav -->
      <nav id="fondo" class="navbar navbar-expand-lg navbar-light bg-light border-bottom fondo">
        <button class="btn btn-danger" id="menu-toggle"><i class="fas fa-align-justify"></i></button>
          <div class="row">
              <div class="col-md-12 offset-md-1">
                <h5 class="text-white"> 
                 SISTEMA GESTOR DE VARIABLES ESTADISTICAS DEL PODER JUDICIAL DEL ESTADO DE TLAXCALA
                </h5>       
              </div>
          </div>  
      </nav>
      <!--Termina menu nav-->
      <!-- Etiqueta para los contenidos del menu Nav-->
      <div class="tab-content" id="v-pills-tabContent">
        <!-- Empieza contenido de inicio -->
        <div class="tab-pane fade show active" id="v-pills-inicio" role="tabpanel" aria-labelledby="v-pills-inicio-tab">
            <div class="container-fluid">
              <h1 class="mt-4">Bienvenidos</h1>
              <p> Al sistema de generación de estadísticas del <strong> Poder Judicial del Estado de Tlaxcala. </strong> </p>

                <inicio-component></inicio-component>

              <br> 
            </div>
        </div>
        <!-- Termina contenido de inicio-->


        <!-- Empieza formulario de usuarios -->
        <div class="tab-pane fade" id="v-pills-usuarios" role="tabpanel" aria-labelledby="v-pills-usuarios-tab">

          <div class="alert alert-secondary text-center" role="alert">
            <font size="4"> ACCIONES: </font>  <strong> ALTAS Y BAJAS </strong> de tipos de usuarios, <strong> ACTUALIZACIÓN DE LA INFORMACIÓN </strong> y generación de <strong> REPORTES </strong>
          </div>

          
        </div>  
        <!-- Termina formulario de usuarios -->

        <!-- Empieza formulario de distritos -->
        <div class="tab-pane fade" id="v-pills-distritos" role="tabpanel" aria-labelledby="v-pills-distritos-tab">

          <div class="alert alert-secondary text-center" role="alert">
            <font size="4"> ACCIONES: </font>  <strong> ALTAS Y BAJAS </strong> de distritos, <strong> ACTUALIZACIÓN DE LA INFORMACIÓN </strong> y generación de <strong> REPORTES </strong>
          </div>

          <div class="container">
           
            <distritos-component> </distritos-component>
            
            
                <a href="{{ route('distritos.pdf') }}" class="btn btn-danger"> Exportar PDF </a>

                <a href="{{ route('distritos.xlsx') }}" class="btn btn-success"> Exportar Excel </a>
                
          </div>    
      </div>
     
      <!-- Termina formulario distritos -->

      <!-- Empieza formulario de juzgado -->
        <div class="tab-pane fade" id="v-pills-juzgado" role="tabpanel" aria-labelledby="v-pills-juzgado-tab">

          <div class="alert alert-secondary text-center" role="alert">
            <font size="4"> ACCIONES: </font>  <strong> ALTAS Y BAJAS </strong> de juzgados, <strong> ACTUALIZACIÓN DE LA INFORMACIÓN </strong> y generación de <strong> REPORTES </strong>
          </div>

          <div class="container">
           
            <juzgados-component> </juzgados-component>   


            
                  <a href="{{ route('juzgados.pdf') }}" class="btn btn-danger"> Exportar PDF </a>

                  <a href="{{ route('juzgados.xlsx') }}" class="btn btn-success"> Exportar Excel </a>
 
                
          </div>
        </div>
      <!-- Termina formulario juzgado -->

      <!-- Empieza formulario de catalogos materias -->
        <div class="tab-pane fade" id="v-pills-materia" role="tabpanel" aria-labelledby="v-pills-materia-tab">

          <div class="alert alert-secondary text-center" role="alert">
            <font size="4"> ACCIONES: </font>  <strong> ALTAS Y BAJAS </strong> de materias, <strong> ACTUALIZACIÓN DE LA INFORMACIÓN </strong> y generación de <strong> REPORTES </strong>
          </div>

          <div class="container">
           
            <materias-component> </materias-component>  

            
                  <a href="{{ route('materias.pdf') }}" class="btn btn-danger"> Exportar PDF </a>

                  <a href="{{ route('materias.xlsx') }}" class="btn btn-success"> Exportar Excel </a>
 
             
          </div>
        </div>
      <!-- Termina formulario materias -->


      <!-- Empieza formulario de catalogos juicios -->
        <div class="tab-pane fade" id="v-pills-juicios" role="tabpanel" aria-labelledby="v-pills-juicios-tab">

          <div class="alert alert-secondary text-center" role="alert">
            <font size="4"> ACCIONES: </font>  <strong> ALTAS Y BAJAS </strong> de juicios, <strong> ACTUALIZACIÓN DE LA INFORMACIÓN </strong> y generación de <strong> REPORTES </strong>
          </div>

          <div class="container">
           
            <juicios-component> </juicios-component> 

            
              <a href="{{ route('juicios.pdf') }}" class="btn btn-danger"> Exportar PDF </a>

              <a href="{{ route('juicios.xlsx') }}" class="btn btn-success"> Exportar Excel </a>
             
          </div>
        </div>
      <!-- Termina formulario juicios -->

      <!-- Empieza formulario de catalogos variables -->
        <div class="tab-pane fade" id="v-pills-variables" role="tabpanel" aria-labelledby="v-pills-variables-tab">

          <div class="alert alert-secondary text-center" role="alert">
            <font size="4"> ACCIONES: </font>  <strong> ALTAS Y BAJAS </strong> de variables, <strong> ACTUALIZACIÓN DE LA INFORMACIÓN </strong> y generación de <strong> REPORTES </strong>
          </div>

          <div class="container">
           
            <variables-component> </variables-component>   

            
              <a href="{{ route('variables.pdf') }}" class="btn btn-danger"> Exportar PDF </a>

              <a href="{{ route('variables.xlsx') }}" class="btn btn-success"> Exportar Excel </a>
            

          </div>
        </div>
      <!-- Termina formulario catalogos -->


      <!-- Empieza formulario de valores variables -->
        <div class="tab-pane fade" id="v-pills-valoresvariables" role="tabpanel" aria-labelledby="v-pills-valoresvariables-tab">

          <div class="alert alert-secondary text-center" role="alert">
            <font size="4"> ACCIONES: </font>  <strong> ALTAS Y BAJAS </strong> de valores-variables, <strong> ACTUALIZACIÓN DE LA INFORMACIÓN </strong> y generación de <strong> REPORTES </strong>
          </div>

          <div class="container">
           
            <valoresvariables-component> </valoresvariables-component> 

            
              <a href="{{ route('valoresvariables.pdf') }}" class="btn btn-danger"> Exportar PDF </a>

              <a href="{{ route('valoresvariables.xlsx') }}" class="btn btn-success"> Exportar Excel </a>
            

          </div>
        </div>
      <!-- Termina formulario valores -->

      <!-- Empieza formulario modulo I -->
      <div class="tab-pane fade" id="v-pills-expedientes" role="tabpanel" aria-labelledby="v-pills-expedientes-tab">

        <div class="alert alert-secondary text-center" role="alert">
          <font size="4"> ACCIONES: </font>  <strong> ALTAS Y BAJAS </strong> de expedientes, <strong> ACTUALIZACIÓN DE LA INFORMACIÓN </strong> y generación de <strong> REPORTES </strong>
        </div>

        <div class="container">
         
         <expedientesadmin-component> </expedientesadmin-component> <br>
        
           <a href="{{ route('expedientes.pdf') }}" class="btn btn-danger"> Exportar PDF </a>

           <a href="{{ route('expedientes.xlsx') }}" class="btn btn-success"> Exportar Excel </a>
        
        </div>
      </div>
     
      <!-- Termina formulario modulo I -->



     

        <!-- Empieza formulario modulo I -->
        <div class="tab-pane fade" id="v-pills-moduloUno" role="tabpanel" aria-labelledby="v-pills-moduloUno-tab">

          <div class="alert alert-secondary text-center" role="alert">
            <font size="4"> ACCIONES: </font>  <strong> ALTAS Y BAJAS </strong> de modulo I, <strong> ACTUALIZACIÓN DE LA INFORMACIÓN </strong> y generación de <strong> REPORTES </strong>
          </div>

          <div class="container">
           
              <modulounoactualizar-component> </modulounoactualizar-component> <br>

              <a href="{{ route('modulouno.xlsx') }}" class="btn btn-success"> Exportar Excel </a>
          
          </div>
    
      </div>
     
      <!-- Termina formulario modulo I -->

       <!-- Empieza formulario modulo VIII -->
        <div class="tab-pane fade" id="v-pills-moduloOcho" role="tabpanel" aria-labelledby="v-pills-moduloOcho-tab">

          <div class="alert alert-secondary text-center" role="alert">
            <font size="4"> ACCIONES: </font>  <strong> ALTAS Y BAJAS </strong> de modulo VIII, <strong> ACTUALIZACIÓN DE LA INFORMACIÓN </strong> y generación de <strong> REPORTES </strong>
          </div>

          <div class="container">
           
              <modulodosactualizar-component> </modulodosactualizar-component>
          
          </div>
    
      </div>
     
      <!-- Termina formulario modulo VIII -->

      <!-- Empieza formulario modulo X -->
        <div class="tab-pane fade" id="v-pills-moduloDiez" role="tabpanel" aria-labelledby="v-pills-moduloDiez-tab">

          <div class="alert alert-secondary text-center" role="alert">
            <font size="4"> ACCIONES: </font>  <strong> ALTAS Y BAJAS </strong> de modulo X, <strong> ACTUALIZACIÓN DE LA INFORMACIÓN </strong> y generación de <strong> REPORTES </strong>
          </div>

          <div class="container">
           
              <modulodiezactualizar-component> </modulodiezactualizar-component> <br>

              <a href="{{ route('modulodiez.pdf') }}" class="btn btn-danger"> Exportar PDF </a>  

              <a href="{{ route('modulodiez.xlsx') }}" class="btn btn-success"> Exportar Excel </a> <br>

          
          </div>
    
      </div>
     
      <!-- Termina formulario modulo X -->


    <!-- /#wrapper -->
  </div>
<!--Cierre de div="app" -->
</div>

</div> </div>



<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>



<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>



 

</body>

</html>
