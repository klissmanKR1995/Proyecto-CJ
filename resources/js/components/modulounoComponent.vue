<template>
  <div>
    <div class="modal-content"> <br>
      <form @submit.prevent="editar(modulouno)" v-if="editarActivo">
      <h5 class="text-center"> Actualizar Información <i> (Modulo - I) </i> </h5> <br>
        <div class="container">
         
         <div class="form-group">
            <select id="id_expediente" class="form-control" v-model="modulouno.id_expediente">
              <option value="">Número de expediente </option>
              <option v-for="(item, index) in expedientes" :value="item.id_expediente">{{item.numero_expediente}}</option>
            </select>
          </div>
                
          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState">Datos de las partes</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                datosPartes' :model.sync="result1" v-model="modulouno.persona"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Persona</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                persona' :model.sync="result1" v-model="modulouno.datos"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Razon Social</label>
              <input type="text" class="form-control" v-model="modulouno.razon_social">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState">Nombre Comercial</label>
              <input type="text" class="form-control" v-model="modulouno.nombre_comercial">
            </div>
            <div class="col-md-4">
             <label for="inputState">Nombre Completo</label>
             <input type="text" class="form-control" v-model="modulouno.nombre_completo">
            </div>
            <div class="col-md-4">
              <label for="inputState">Sexo</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  sexo' :model.sync="result1" v-model="modulouno.sexo"></vue-select>
            </div>
          </div> <br>

          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState">Fecha de nacimiento</label>
              <input type="date" class="form-control" v-model="modulouno.fecha_nacimiento">
            </div>
            <div class="col-md-4">
             <label for="inputState">RFC</label>
             <input type="text" class="form-control" v-model="modulouno.rfc">
            </div>
            <div class="col-md-4">
             <label for="inputState">CURP</label>
             <input type="text" class="form-control" v-model="modulouno.curp">
            </div>
          </div> <br>
              
          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState">Pais de nacimiento</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                paises' :model.sync="result1" v-model="modulouno.pais"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Estado de nacimiento</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                estados' :model.sync="result1" v-model="modulouno.estados"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Municipio de nacimiento</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                municipios' :model.sync="result1" v-model="modulouno.municipios"></vue-select>
            </div>
          </div> 


          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState">Nacionalidad</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                nacionalidades' :model.sync="result1" v-model="modulouno.nacionalidad"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Pais habitual</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                pais_habitual' :model.sync="result1" v-model="modulouno.pais_habitual"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Estado habitual</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                estado_habitual' :model.sync="result1" v-model="modulouno.estado_habitual"></vue-select>
            </div>
          </div> 

          <div class="form-row">
              <div class="col-md-4">
                <label for="inputState">Municipio habitual</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  municipio_habitual' :model.sync="result1" v-model="modulouno.municipio_habitual"></vue-select>
              </div>
              <div class="col-md-4">
               <label for="inputState">Tipo domicilio</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  tipoDomicilio' :model.sync="result1" v-model="modulouno.tipo_domicilio"></vue-select>
              </div>
              <div class="col-md-4">
                <label for="inputState">Tipo discapacidad</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  discapacidades' :model.sync="result1" v-model="modulouno.tipo_discapacidad"></vue-select>
              </div>
          </div> 

           <div class="form-row">
            <div class="col-md-4">
             <label for="inputState">Situación conyugal</label>
             <input type="text" class="form-control" v-model="modulouno.situacion_conyugal">
            </div>
            <div class="col-md-4">
               <label for="inputState">Escolaridad</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  escolaridad' :model.sync="result1" v-model="modulouno.escolaridad"></vue-select>
            </div>
            <div class="col-md-4">
             <label for="inputState">Condición migratoria</label>
             <input type="text" class="form-control" v-model="modulouno.condicion_migratoria">
            </div>
          </div> 

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState1">¿Habla español?</label>
              <select id="inputState1" class="form-control" v-model="modulouno.habla_español">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState2">¿Habla lengua indigena?</label>
               <select id="inputState2" class="form-control" v-model="modulouno.habla_lengua_indigena">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
            <label for="inputState">Tipo lengua indigena</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  lenguaIndigena' :model.sync="result1" v-model="modulouno.tipo_lengua_indigena"></vue-select>
            </div>
          </div> 

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState3">¿Habla lengua extranjera?</label>
              <select id="inputState3" class="form-control" v-model="modulouno.habla_lengua_extranjera">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Ocupación</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  ocupacion' :model.sync="result1" v-model="modulouno.trabaja_ocupacion"></vue-select>
            </div>
            <div class="col-md-4">
            <label for="inputState">Condicion actividad</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  condicionActividad' :model.sync="result1" v-model="modulouno.condicion_actividad"></vue-select>
            </div>
          </div> 

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState">Fuente de ingresos</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  fuenteIngresos' :model.sync="result1" v-model="modulouno.fuente_ingresos"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Ingreso mensual</label>
                <input type="text" class="form-control" v-model="modulouno.ingreso_mensual">
            </div>
            <div class="col-md-4">
            <label for="inputState">Tipo representación</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  tipoRepresentacion' :model.sync="result1" v-model="modulouno.tipo_representacion"></vue-select>
            </div>
          </div> 

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState">Sexo representación</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  sexo' :model.sync="result1" v-model="modulouno.sexo_representacion"></vue-select>
            </div>
          </div> 

          <center>    
          <button class="btn btn-primary" type="submit"> Actualizar </button>
          <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
          </center> <br>
        </div>     
      </form>  

      <form @submit.prevent="agregar" v-else>
      <h4 class="text-center"> Datos de las partes en los procesos (Modulo I)  </h4> <br>
        <div class="container">
         
         <div class="form-group">
            <select id="id_expediente" class="form-control" v-model="modulouno.id_expediente">
              <option value="">Número de expediente </option>
              <option v-for="(item, index) in expedientes" :value="item.id_expediente">{{item.numero_expediente}}</option>
            </select>
          </div>
                
          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState">Datos de las partes</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                datosPartes' :model.sync="result1" v-model="modulouno.persona"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Persona</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                persona' :model.sync="result1" v-model="modulouno.datos"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Razon Social</label>
              <input type="text" class="form-control" v-model="modulouno.razon_social">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState">Nombre Comercial</label>
              <input type="text" class="form-control" v-model="modulouno.nombre_comercial">
            </div>
            <div class="col-md-4">
             <label for="inputState">Nombre Completo</label>
             <input type="text" class="form-control" v-model="modulouno.nombre_completo">
            </div>
            <div class="col-md-4">
              <label for="inputState">Sexo</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  sexo' :model.sync="result1" v-model="modulouno.sexo"></vue-select>
            </div>
          </div> <br>

          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState">Fecha de nacimiento</label>
              <input type="date" class="form-control" v-model="modulouno.fecha_nacimiento">
            </div>
            <div class="col-md-4">
             <label for="inputState">RFC</label>
             <input type="text" class="form-control" v-model="modulouno.rfc">
            </div>
            <div class="col-md-4">
             <label for="inputState">CURP</label>
             <input type="text" class="form-control" v-model="modulouno.curp">
            </div>
          </div> <br>
              
          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState">Pais de nacimiento</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                paises' :model.sync="result1" v-model="modulouno.pais"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Estado de nacimiento</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                estados' :model.sync="result1" v-model="modulouno.estados"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Municipio de nacimiento</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                municipios' :model.sync="result1" v-model="modulouno.municipios"></vue-select>
            </div>
          </div> 


          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState">Nacionalidad</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                nacionalidades' :model.sync="result1" v-model="modulouno.nacionalidad"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Pais habitual</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                pais_habitual' :model.sync="result1" v-model="modulouno.pais_habitual"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Estado habitual</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                estado_habitual' :model.sync="result1" v-model="modulouno.estado_habitual"></vue-select>
            </div>
          </div> 

          <div class="form-row">
              <div class="col-md-4">
                <label for="inputState">Municipio habitual</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  municipio_habitual' :model.sync="result1" v-model="modulouno.municipio_habitual"></vue-select>
              </div>
              <div class="col-md-4">
               <label for="inputState">Tipo domicilio</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  tipoDomicilio' :model.sync="result1" v-model="modulouno.tipo_domicilio"></vue-select>
              </div>
              <div class="col-md-4">
                <label for="inputState">Tipo discapacidad</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  discapacidades' :model.sync="result1" v-model="modulouno.tipo_discapacidad"></vue-select>
              </div>
          </div> 

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState">Situación conyugal</label>
             <input type="text" class="form-control" v-model="modulouno.situacion_conyugal">
            </div>
            <div class="col-md-4">
               <label for="inputState">Escolaridad</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  escolaridad' :model.sync="result1" v-model="modulouno.escolaridad"></vue-select>
            </div>
            <div class="col-md-4">
             <label for="inputState">Condición migratoria</label>
             <input type="text" class="form-control" v-model="modulouno.condicion_migratoria">
            </div>
          </div> 

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState1">¿Habla español?</label>
              <select id="inputState1" class="form-control" v-model="modulouno.habla_español">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState2">¿Habla lengua indigena?</label>
               <select id="inputState2" class="form-control" v-model="modulouno.habla_lengua_indigena">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
            <label for="inputState">Tipo lengua indigena</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  lenguaIndigena' :model.sync="result1" v-model="modulouno.tipo_lengua_indigena"></vue-select>
            </div>
          </div> 

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState3">¿Habla lengua extranjera?</label>
              <select id="inputState3" class="form-control" v-model="modulouno.habla_lengua_extranjera">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Ocupación</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  ocupacion' :model.sync="result1" v-model="modulouno.trabaja_ocupacion"></vue-select>
            </div>
            <div class="col-md-4">
            <label for="inputState">Condicion actividad</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  condicionActividad' :model.sync="result1" v-model="modulouno.condicion_actividad"></vue-select>
            </div>
          </div> 

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState">Fuente de ingresos</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  fuenteIngresos' :model.sync="result1" v-model="modulouno.fuente_ingresos"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState">Ingreso mensual</label>
                <input type="text" class="form-control" v-model="modulouno.ingreso_mensual">
            </div>
            <div class="col-md-4">
            <label for="inputState">Tipo representación</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  tipoRepresentacion' :model.sync="result1" v-model="modulouno.tipo_representacion"></vue-select>
            </div>
          </div> 

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState">Sexo representación</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  sexoRepresentacion' :model.sync="result1" v-model="modulouno.sexo_representacion"></vue-select>
            </div>
          </div> 

          <center>    
          <button class="btn btn-danger" type="submit"> Guardar Registro </button> 
          </center><br>
        </div>     
      </form>
    </div>

    <div class="container">  
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
              <tr>
                <th scope="col"> Número de expediente </th>
                <th scope="col"> Datos </th>
                <th scope="col"> Persona </th>
                <th scope="col"> Razón-Social </th>
                <th scope="col"> Nombre-Comercial </th>
                <th scope="col"> Nombre-Completo </th>
                <th scope="col"> Sexo </th>
                <th scope="col"> Fecha-Nacimiento </th>
                <th scope="col"> RFC </th>
                <th scope="col"> Curp </th>
                <th scope="col"> Pais </th>
                <th scope="col"> Estado </th>
                <th scope="col"> Municipio </th>
                <th scope="col"> Nacionalidad </th>
                <th scope="col"> Pais-Habitual </th>
                <th scope="col"> Estado-Habitual </th>
                <th scope="col"> Municipio-Habitual </th>
                <th scope="col"> Tipo-Domicilio </th>
                <th scope="col"> Tipo-Discapacidad </th>
                <th scope="col"> Situación-Conyugal </th>
                <th scope="col"> Escolaridad </th>
                <th scope="col"> Condición-Migratoria </th>
                <th scope="col"> Habla-Español </th>
                <th scope="col"> Habla-Lengua-Indigena </th>
                <th scope="col"> Habla-Lengua-Extranjera </th>
                <th scope="col"> Trabaja-Ocupación </th>
                <th scope="col"> Condición-Actividad </th>
                <th scope="col"> Fuente-Ingresos </th>
                <th scope="col"> Ingreso-Mensual </th>
                <th scope="col"> Tipo-Representación </th>
                <th scope="col"> Sexo-Representación </th>
              </tr>
              <tr v-for="(item, index) in modulounos.data" :key="index">
                <td>{{item.numero_expediente}}</td>
                <td>{{item.datos}}</td>
                <td>{{item.persona}}</td>
                <td>{{item.razon_social}}</td>
                <td>{{item.nombre_comercial}}</td>
                <td>{{item.nombre_completo}}</td>
                <td>{{item.sexo}}</td>
                <td>{{item.fecha_nacimiento}}</td>
                <td>{{item.rfc}}</td>
                <td>{{item.curp}}</td>
                <td>{{item.pais}}</td>
                <td>{{item.estados}}</td>
                <td>{{item.municipios}}</td>
                <td>{{item.nacionalidad}}</td>
                <td>{{item.pais_habitual}}</td>
                <td>{{item.estado_habitual}}</td>
                <td>{{item.municipio_habitual}}</td>
                <td>{{item.tipo_domicilio}}</td>
                <td>{{item.tipo_discapacidad}}</td>
                <td>{{item.situacion_conyugal}}</td>
                <td>{{item.escolaridad}}</td>
                <td>{{item.condicion_migratoria}}</td>
                <td>{{item.habla_español}}</td>
                <td>{{item.habla_lengua_indigena}}</td>
                <td>{{item.habla_lengua_extranjera}}</td>
                <td>{{item.trabaja_ocupacion}}</td>
                <td>{{item.condicion_actividad}}</td>
                <td>{{item.fuente_ingresos}}</td>
                <td>{{item.ingreso_mensual}}</td>
                <td>{{item.tipo_representacion}}</td>
                <td>{{item.sexo_representacion}}</td>
              </tr>
          </thead>   
        </table>


       <!-- Paginador -->
       <pagination :data="modulounos" @pagination-change-page="getResults"> </pagination>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalModuloUno" tabindex="-1" role="dialog" aria-labelledby="exampleModalModuloUnoLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalModuloUnoLabel">Confirmar elminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id" id="id">
                ¿Estas seguro(a) de eliminar el registro seleccionado?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="eliminarModulouno('cancelar')">Cancelar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" @click="eliminarModulouno('aceptar')">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
        <!--Termina modal -->
      </div>  
    </div>    
  </div>            
</template>

<script>
  import vueSelect from 'vue-select'
  Vue.component('vue-select', vueSelect)
  import 'vue-select/dist/vue-select.css'
    export default {
       data(){
            return{
                expedientes: [],
                modulounos: {},
                modulouno: {id_expediente: '', datos: '', persona: '', razon_social: '', nombre_comercial: '',nombre_completo: '', sexo: '', fecha_nacimiento: '', rfc: '', curp: '', pais: '', estados: '', municipios: '', nacionalidad: '', pais_habitual: '', estado_habitual: '', municipio_habitual: '', tipo_domicilio: '', tipo_discapacidad: '', situacion_conyugal: '', escolaridad: '', condicion_migratoria: '', habla_español: '', habla_lengua_indigena: '', tipo_lengua_indigena: '', habla_lengua_extranjera: '', trabaja_ocupacion: '', condicion_actividad: '', fuente_ingresos: '', ingreso_mensual: '', tipo_representacion: '', sexo_representacion: ''},
                datosPartes: [] ,
                persona: [] ,
                sexo: [] ,
                paises: [] ,
                estados: [] ,
                municipios: [] ,
                nacionalidades: [] ,
                pais_habitual: [] ,
                estado_habitual: [] ,
                municipio_habitual: [] ,
                tipoDomicilio: [] ,
                discapacidades: [] ,
                escolaridad: [] ,
                lenguaIndigena: [] ,
                ocupacion: [] ,
                condicionActividad: [] ,
                fuenteIngresos: [] ,
                tipoRepresentacion: [] ,
                sexoRepresentacion: [] ,
                editarActivo: false,
                result1: "",
            }
       },
       mounted() {
        // Fetch initial results
        this.getResults();
      },
       created(){
            axios.get('/Proyecto-CJ/public/expedientesAll')
            .then(res => {
                this.expedientes = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/getCatalogos')
            .then(res => {
                this.datosPartes = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/personaCatalogos')
            .then(res => {
                this.persona = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/sexoCatalogos')
            .then(res => {
                this.sexo = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/paisesCatalogos')
            .then(res => {
                this.paises = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/estadosCatalogos')
            .then(res => {
                this.estados = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/municipiosCatalogos')
            .then(res => {
                this.municipios = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/nacionalidadesCatalogos')
            .then(res => {
                this.nacionalidades = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/pais_habitualCatalogos')
            .then(res => {
                this.pais_habitual = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/estado_habitualCatalogos')
            .then(res => {
                this.estado_habitual = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/municipio_habitualCatalogos')
            .then(res => {
                this.municipio_habitual = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/tipoDomicilioCatalogos')
            .then(res => {
                this.tipoDomicilio = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/discapacidadesCatalogos')
            .then(res => {
                this.discapacidades = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/escolaridadCatalogos')
            .then(res => {
                this.escolaridad = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/lenguaIndigenaCatalogos')
            .then(res => {
                this.lenguaIndigena = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/ocupacionCatalogos')
            .then(res => {
                this.ocupacion = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/condicionActividadCatalogos')
            .then(res => {
                this.condicionActividad = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/fuenteIngresosCatalogos')
            .then(res => {
                this.fuenteIngresos = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/tipoRepresentacionCatalogos')
            .then(res => {
                this.tipoRepresentacion = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/sexoRepresentacionCatalogos')
            .then(res => {
                this.sexoRepresentacion = res.data;
            }).catch(error => {
                console.log(error.response)
            });
       },
        methods:{
            getResults(page = 1) {
              axios.get('/Proyecto-CJ/public/modulouno?page=' + page)
                .then(response => {
                  this.modulounos = response.data;
                }).catch(error => {
                    console.log(error.response)
                });
            },
            editarFormulario(item){
              this.editarActivo = true;
              this.modulouno.id_expediente = item.id_expediente;
              this.modulouno.datos = item.datos;
              this.modulouno.persona = item.persona;
              this.modulouno.razon_social = item.razon_social;
              this.modulouno.nombre_comercial = item.nombre_comercial;
              this.modulouno.nombre_completo = item.nombre_completo;
              this.modulouno.sexo = item.sexo;
              this.modulouno.fecha_nacimiento = item.fecha_nacimiento;
              this.modulouno.rfc = item.rfc;
              this.modulouno.curp = item.curp;
              this.modulouno.pais = item.pais;
              this.modulouno.estados = item.estados;
              this.modulouno.municipios = item.municipios;
              this.modulouno.nacionalidad = item.nacionalidad;
              this.modulouno.pais_habitual = item.pais_habitual;
              this.modulouno.estado_habitual = item.estado_habitual;
              this.modulouno.municipio_habitual = item.municipio_habitual;
              this.modulouno.tipo_domicilio = item.tipo_domicilio;
              this.modulouno.tipo_discapacidad = item.tipo_discapacidad;
              this.modulouno.situacion_conyugal = item.situacion_conyugal;
              this.modulouno.escolaridad = item.escolaridad;
              this.modulouno.condicion_migratoria = item.condicion_migratoria;
              this.modulouno.habla_español = item.habla_español;
              this.modulouno.habla_lengua_indigena = item.habla_lengua_indigena;
              this.modulouno.tipo_lengua_indigena = item.tipo_lengua_indigena;
              this.modulouno.habla_lengua_extranjera = item.habla_lengua_extranjera;
              this.modulouno.trabaja_ocupacion = item.trabaja_ocupacion;
              this.modulouno.condicion_actividad = item.condicion_actividad;
              this.modulouno.fuente_ingresos = item.fuente_ingresos;
              this.modulouno.ingreso_mensual = item.ingreso_mensual;
              this.modulouno.tipo_representacion = item.tipo_representacion;
              this.modulouno.sexo_representacion = item.sexo_representacion;
              this.modulouno.id_modulo = item.id_modulo;

            },
           editar(item){
              const params = {id_expediente: item.id_expediente, datos: item.datos, persona: item.persona, razon_social: item.razon_social, nombre_comercial: item.nombre_comercial, nombre_completo: item.nombre_completo, sexo: item.sexo, fecha_nacimiento: item.fecha_nacimiento, rfc: item.rfc, curp: item.curp, pais: item.pais, estados: item.estados, municipios: item.municipios, nacionalidad: item.nacionalidad, pais_habitual: item.pais_habitual, estado_habitual: item.estado_habitual, municipio_habitual: item.municipio_habitual, tipo_domicilio: item.tipo_domicilio, tipo_discapacidad: item.tipo_discapacidad, situacion_conyugal: item.situacion_conyugal, escolaridad: item.escolaridad, condicion_migratoria: item.condicion_migratoria, habla_español: item.habla_español, habla_lengua_indigena: item.habla_lengua_indigena, tipo_lengua_indigena: item.tipo_lengua_indigena, habla_lengua_extranjera: item.habla_lengua_extranjera, trabaja_ocupacion: item.trabaja_ocupacion, condicion_actividad: item.condicion_actividad, fuente_ingresos: item.fuente_ingresos, ingreso_mensual: item.ingreso_mensual, tipo_representacion: item.tipo_representacion, sexo_representacion: item.sexo_representacion};
              axios.put(`/Proyecto-CJ/public/modulouno/${item.id_modulo}`, params)
                .then(res =>{
                  this.editarActivo = false;
                  this.getResults(this.modulounos.current_page);
                })
                  
                this.modulouno.id_expediente = '';
                this.modulouno.datos = '';
                this.modulouno.persona = '';
                this.modulouno.razon_social = '';
                this.modulouno.nombre_comercial = '';
                this.modulouno.nombre_completo = '';
                this.modulouno.sexo = '';
                this.modulouno.fecha_nacimiento = '';
                this.modulouno.rfc = '';
                this.modulouno.curp = '';
                this.modulouno.pais = '';
                this.modulouno.estados = '';
                this.modulouno.municipios = '';
                this.modulouno.nacionalidad = '';
                this.modulouno.pais_habitual = '';
                this.modulouno.estado_habitual = '';
                this.modulouno.municipio_habitual = '';
                this.modulouno.tipo_domicilio = '';
                this.modulouno.tipo_discapacidad = '';
                this.modulouno.situacion_conyugal = '';
                this.modulouno.escolaridad = '';
                this.modulouno.habla_español = '';
                this.modulouno.habla_lengua_indigena = '';
                this.modulouno.tipo_lengua_indigena = '';
                this.modulouno.habla_lengua_extranjera = '';
                this.modulouno.trabaja_ocupacion = '';
                this.modulouno.condicion_actividad = '';
                this.modulouno.fuente_ingresos = '';
                this.modulouno.ingreso_mensual = '';
                this.modulouno.tipo_representacion = '';
                this.modulouno.sexo_representacion = '';
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.modulouno = {id_expediente: '', datos: '', persona: '', razon_social: '', nombre_comercial: '',nombre_completo: '', sexo: '', fecha_nacimiento: '', rfc: '', curp: '', pais: '', estados: '', municipios: '', nacionalidad: '', pais_habitual: '', estado_habitual: '', municipio_habitual: '', tipo_domicilio: '', tipo_discapacidad: '', situacion_conyugal: '', escolaridad: '', condicion_migratoria: '', habla_español: '', habla_lengua_indigena: '', tipo_lengua_indigena: '', habla_lengua_extranjera: '', trabaja_ocupacion: '', condicion_actividad: '', fuente_ingresos: '', ingreso_mensual: '', tipo_representacion: '', sexo_representacion: ''}
            },
            agregar(){

                //Valida modulouno de formularios
                 //if(this.modulouno.municipios.trim() === ''){
                    //alert('Debes completar todos los campos antes de guardar');
                    //return;
                  //}

                //console.log(this.modulouno.id_expediente, this.modulouno.descripcion); 
                const params = {
                id_expediente: this.modulouno.id_expediente,
                datos: this.modulouno.datos.valor_variable,
                persona: this.modulouno.persona.valor_variable,
                razon_social: this.modulouno.razon_social,
                nombre_comercial: this.modulouno.nombre_comercial,
                nombre_completo: this.modulouno.nombre_completo,
                sexo: this.modulouno.sexo.valor_variable,
                fecha_nacimiento: this.modulouno.fecha_nacimiento,
                rfc: this.modulouno.rfc,
                curp: this.modulouno.curp,
                pais: this.modulouno.pais.valor_variable,
                estados: this.modulouno.estados.valor_variable,
                municipios: this.modulouno.municipios.valor_variable,
                nacionalidad: this.modulouno.nacionalidad.valor_variable,
                pais_habitual: this.modulouno.pais_habitual.valor_variable,
                estado_habitual: this.modulouno.estado_habitual.valor_variable,
                municipio_habitual: this.modulouno.municipio_habitual.valor_variable,
                tipo_domicilio: this.modulouno.tipo_domicilio.valor_variable,
                tipo_discapacidad: this.modulouno.tipo_discapacidad.valor_variable,
                situacion_conyugal: this.modulouno.situacion_conyugal,
                escolaridad: this.modulouno.escolaridad.valor_variable,
                condicion_migratoria: this.modulouno.condicion_migratoria,
                habla_español: this.modulouno.habla_español,
                habla_lengua_indigena: this.modulouno.habla_lengua_indigena,
                tipo_lengua_indigena: this.modulouno.tipo_lengua_indigena.valor_variable,
                habla_lengua_extranjera: this.modulouno.habla_lengua_extranjera,
                trabaja_ocupacion: this.modulouno.trabaja_ocupacion.valor_variable,
                condicion_actividad: this.modulouno.condicion_actividad.valor_variable,
                fuente_ingresos: this.modulouno.fuente_ingresos.valor_variable,
                ingreso_mensual: this.modulouno.ingreso_mensual,
                tipo_representacion: this.modulouno.tipo_representacion.valor_variable,
                sexo_representacion: this.modulouno.sexo_representacion.valor_variable,
                }
                //Accion para limpiar los campos

                this.modulouno.id_expediente = '';
                this.modulouno.datos = '';
                this.modulouno.persona = '';
                this.modulouno.razon_social = '';
                this.modulouno.nombre_comercial = '';
                this.modulouno.nombre_completo = '';
                this.modulouno.sexo = '';
                this.modulouno.fecha_nacimiento = '';
                this.modulouno.rfc = '';
                this.modulouno.curp = '';
                this.modulouno.pais = '';
                this.modulouno.estados = '';
                this.modulouno.municipios = '';
                this.modulouno.nacionalidad = '';
                this.modulouno.pais_habitual = '';
                this.modulouno.estado_habitual = '';
                this.modulouno.municipio_habitual = '';
                this.modulouno.tipo_domicilio = '';
                this.modulouno.tipo_discapacidad = '';
                this.modulouno.situacion_conyugal = '';
                this.modulouno.escolaridad = '';
                this.modulouno.habla_español = '';
                this.modulouno.habla_lengua_indigena = '';
                this.modulouno.tipo_lengua_indigena = '';
                this.modulouno.habla_lengua_extranjera = '';
                this.modulouno.trabaja_ocupacion = '';
                this.modulouno.condicion_actividad = '';
                this.modulouno.fuente_ingresos = '';
                this.modulouno.ingreso_mensual = '';
                this.modulouno.tipo_representacion = '';
                this.modulouno.sexo_representacion = '';

                axios.post('/Proyecto-CJ/public/modulouno', params)     
                    .then(res => {
                        this.getResults(this.modulounos.last_page);
                        this.expedientes.length = 0
                        axios.get('/Proyecto-CJ/public/expedientesAll')
                        .then(res => {
                            this.expedientes = res.data;
                        })
                })

            },
            confirmar(id){
              $('#exampleModalModuloUno').modal("show")
              $('#id').val(id)
            },
            eliminarModulouno(op){
              if (op === "aceptar") {
                axios.delete(`/Proyecto-CJ/public/modulouno/` + $("#id").val())
                  .then(()=>{
                      this.getResults(this.modulounos.current_page);
                      $('#exampleModalModuloUno').modal("hide")
                  })
              }
              else{
                $('#exampleModalModuloUno').modal("hide")
              }

            },
       }
    }
</script>


