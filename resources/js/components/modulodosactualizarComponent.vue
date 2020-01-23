<template>
  <div>
    <div class="modal-content"> <br>
      <form @submit.prevent="editar(modulodos)" v-if="editarActivo">
      <h5 class="text-center"> Actualizar Información <i> (Modulo - VIII) </i> </h5> <br>
        <div class="container">
         
         <div class="form-group">
            <select class="form-control" v-model="modulodos.id_expediente">
              <option value="">Número de expediente </option>
              <option v-for="(item, index) in expedientes" :value="item.id_expediente">{{item.numero_expediente}}</option>
            </select>
          </div>
                
          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState1">Fecha causa sentencia</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_sentencia">
            </div>
            <div class="col-md-4">
              <label for="inputState1">Fecha de promoción</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_promocion">
            </div>
            <div class="col-md-4">
              <label for="inputState1">Solicitud de embargo</label>
              <select class="form-control" v-model="modulodos.solicitud_embargo">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div> <br>

          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState1">Fecha de solicitud de embargo</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_solicitud_embargo">
            </div>
            <div class="col-md-4">
             <label for="inputState1">¿Se autoriza realización de embargo?</label>
             <select class="form-control" v-model="modulodos.autorizacion_embargo ">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState1">Fecha emisión de embargo</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_emision">
            </div>
          </div> <br>

          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState1">Se ejecuta el embargo</label>
              <select class="form-control" v-model="modulodos.ejecucion_embargo">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
             <label for="inputState1">Fecha ejecución de embargo</label>
             <input type="date" class="form-control" v-model="modulodos.fecha_ejecucion_embargo">
            </div>
            <div class="col-md-4">
             <label for="inputState1">¿Cumple voluntariamente con pago?</label>
             <select class="form-control" v-model="modulodos.cumple_pago">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div> <br>
              
          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState1">¿Realiza el embargo de bienes?</label>
              <select class="form-control" v-model="modulodos.bienes_sentencia">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState1">Solicita adjudicación</label>
              <select class="form-control" v-model="modulodos.solicita_adjudicacion">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState1">Designa perito valuador</label>
              <select class="form-control" v-model="modulodos.designa_perito">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div> <br>


          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState1">Fecha designación peritos valuadores</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_designacion">
            </div>
            <div class="col-md-4">
              <label for="inputState1">Fecha de aceptación del cargo peritos</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_aceptacion">
            </div>
            <div class="col-md-4">
              <label for="inputState1">Fecha en que rinden informe</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_informe">
            </div>
          </div> <br>

          <div class="form-row">
              <div class="col-md-4">
                <label for="inputState1">Realiza venta en almoneda</label>
                <select class="form-control" v-model="modulodos.venta_almoneda">
                  <option selected>Seleccionar</option>
                  <option>Si</option>
                  <option>No</option>
                </select>
              </div>
              <div class="col-md-4">
               <label for="inputState1">Fecha de acuerdo orden</label>
                <input type="date" class="form-control" v-model="modulodos.fecha_acuerdo">
              </div>
              <div class="col-md-4">
                <label for="inputState1">Número de publicaciones</label>
                <input type="text" class="form-control" v-model="modulodos.numero_publicaciones">
              </div>
          </div> <br>

           <div class="form-row">
            <div class="col-md-4">
             <label for="inputState1">Fecha venta almoneda pública</label>
             <input type="date" class="form-control" v-model="modulodos.fecha_venta">
            </div>
            <div class="col-md-4">
               <label for="inputState1">Número de almonedas públicas</label>
               <input type="text" class="form-control" v-model="modulodos.almonedas_publicas">
            </div>
            <div class="col-md-4">
             <label for="inputState1">Fecha cambio propietario</label>
             <input type="date" class="form-control" v-model="modulodos.cambio_propietario">
            </div>
          </div> 

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState11">Orden de lanzamiento</label>
              <select class="form-control" v-model="modulodos.orden_lanzamiento">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState12">Fecha ejecución lanzamiento</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_lanzamiento">
            </div>
            <div class="col-md-4">
            <label for="inputState1">Existencia de derechos humandos vulnerados</label>
              <select class="form-control" v-model="modulodos.existencia_derechos">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div> <br>

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState13">Tipo de derechos humanos vulnerados</label>
             <input type="text" class="form-control" v-model="modulodos.tipo_derechos">
            </div>
            <div class="col-md-4">
              <label for="inputState1">Medidas dictadas para reparar el daño</label>
              <select class="form-control" v-model="modulodos.medidas_dictadas">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
            <label for="inputState1">Tipo de medida</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                tipoMedida' :model.sync="result1" v-model="modulodos.tipo_medida"></vue-select>
            </div>
          </div> <br>

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState1">Solicitud de amparo</label>
              <select class="form-control" v-model="modulodos.solicitud_amparo">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState1">Tipo de amparo solicitado</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                tipoAmparo' :model.sync="result1" v-model="modulodos.tipo_amparo"></vue-select>
            </div>
            <div class="col-md-4">
            <label for="inputState1">Se solicito suspension provisional</label>
              <select class="form-control" v-model="modulodos.suspension_provisional">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div> <br>

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState1">Fase procesal</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  faseProcesal' :model.sync="result1" v-model="modulodos.fase_procesal"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState1">Resolución de amparo</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                resolucionAmparo' :model.sync="result1" v-model="modulodos.resolucion_amparo"></vue-select>
            </div>
            <div class="col-md-4">
            <label for="inputState1">Número total de acuerdos emitidos</label>
              <input type="text" class="form-control" v-model="modulodos.total_acuerdos">
            </div>
          </div> <br>

          <center>    
          <button class="btn btn-primary" type="submit"> Actualizar </button>
          <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
          </center> <br>
        </div>     
      </form>  

      <form @submit.prevent="agregar" v-else>
      <h4 class="text-center"> Ejecución de la sentencia (Modulo VIII)  </h4> <br>
        <div class="container">
         
         <div class="form-group">
            <select class="form-control" v-model="modulodos.id_expediente">
              <option value="">Número de expediente </option>
              <option v-for="(item, index) in expedientes" :value="item.id_expediente">{{item.numero_expediente}}</option>
            </select>
          </div>
                
          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState1">Fecha causa sentencia</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_sentencia">
            </div>
            <div class="col-md-4">
              <label for="inputState1">Fecha de promoción</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_promocion">
            </div>
            <div class="col-md-4">
              <label for="inputState1">Solicitud de embargo</label>
              <select class="form-control" v-model="modulodos.solicitud_embargo">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div> <br>

          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState1">Fecha de solicitud de embargo</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_solicitud_embargo">
            </div>
            <div class="col-md-4">
             <label for="inputState1">¿Se autoriza realización de embargo?</label>
             <select class="form-control" v-model="modulodos.autorizacion_embargo ">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState1">Fecha emisión de embargo</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_emision">
            </div>
          </div> <br>

          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState1">Se ejecuta el embargo</label>
              <select class="form-control" v-model="modulodos.ejecucion_embargo">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
             <label for="inputState1">Fecha ejecución de embargo</label>
             <input type="date" class="form-control" v-model="modulodos.fecha_ejecucion_embargo">
            </div>
            <div class="col-md-4">
             <label for="inputState1">¿Cumple voluntariamente con pago?</label>
             <select class="form-control" v-model="modulodos.cumple_pago">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div> <br>
              
          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState1">¿Realiza el embargo de bienes?</label>
              <select class="form-control" v-model="modulodos.bienes_sentencia">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState1">Solicita adjudicación</label>
              <select class="form-control" v-model="modulodos.solicita_adjudicacion">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState1">Designa perito valuador</label>
              <select class="form-control" v-model="modulodos.designa_perito">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div> <br>


          <div class="form-row">
            <div class="col-md-4">
              <label for="inputState1">Fecha designación peritos valuadores</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_designacion">
            </div>
            <div class="col-md-4">
              <label for="inputState1">Fecha de aceptación del cargo peritos</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_aceptacion">
            </div>
            <div class="col-md-4">
              <label for="inputState1">Fecha en que rinden informe</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_informe">
            </div>
          </div> <br>

          <div class="form-row">
              <div class="col-md-4">
                <label for="inputState1">Realiza venta en almoneda</label>
                <select class="form-control" v-model="modulodos.venta_almoneda">
                  <option selected>Seleccionar</option>
                  <option>Si</option>
                  <option>No</option>
                </select>
              </div>
              <div class="col-md-4">
               <label for="inputState1">Fecha de acuerdo orden</label>
                <input type="date" class="form-control" v-model="modulodos.fecha_acuerdo">
              </div>
              <div class="col-md-4">
                <label for="inputState1">Número de publicaciones</label>
                <input type="text" class="form-control" v-model="modulodos.numero_publicaciones">
              </div>
          </div> <br>

           <div class="form-row">
            <div class="col-md-4">
             <label for="inputState1">Fecha venta almoneda pública</label>
             <input type="date" class="form-control" v-model="modulodos.fecha_venta">
            </div>
            <div class="col-md-4">
               <label for="inputState1">Número de almonedas públicas</label>
               <input type="text" class="form-control" v-model="modulodos.almonedas_publicas">
            </div>
            <div class="col-md-4">
             <label for="inputState1">Fecha cambio propietario</label>
             <input type="date" class="form-control" v-model="modulodos.cambio_propietario">
            </div>
          </div> 

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState11">Orden de lanzamiento</label>
              <select class="form-control" v-model="modulodos.orden_lanzamiento">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState12">Fecha ejecución lanzamiento</label>
              <input type="date" class="form-control" v-model="modulodos.fecha_lanzamiento">
            </div>
            <div class="col-md-4">
            <label for="inputState1">Existencia de derechos humandos vulnerados</label>
              <select class="form-control" v-model="modulodos.existencia_derechos">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div> <br>

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState13">Tipo de derechos humanos vulnerados</label>
             <vue-select class="vue-select1"  label="valor_variable" :options='
                tipoDerechos' :model.sync="result1" v-model="modulodos.tipo_derechos"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState1">Medidas dictadas para reparar el daño</label>
              <select class="form-control" v-model="modulodos.medidas_dictadas">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
            <label for="inputState1">Tipo de medida</label>
              <vue-select class="vue-select1"  label="valor_variable" :options='
                tipoMedida' :model.sync="result1" v-model="modulodos.tipo_medida"></vue-select>
            </div>
          </div> <br>

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState1">Solicitud de amparo</label>
              <select class="form-control" v-model="modulodos.solicitud_amparo">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState1">Tipo de amparo solicitado</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                tipoAmparo' :model.sync="result1" v-model="modulodos.tipo_amparo"></vue-select>
            </div>
            <div class="col-md-4">
            <label for="inputState1">Se solicito suspension provisional</label>
              <select class="form-control" v-model="modulodos.suspension_provisional">
                <option selected>Seleccionar</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div> <br>

          <div class="form-row">
            <div class="col-md-4">
             <label for="inputState1">Fase procesal</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                  faseProcesal' :model.sync="result1" v-model="modulodos.fase_procesal"></vue-select>
            </div>
            <div class="col-md-4">
              <label for="inputState1">Resolución de amparo</label>
                <vue-select class="vue-select1"  label="valor_variable" :options='
                resolucionAmparo' :model.sync="result1" v-model="modulodos.resolucion_amparo"></vue-select>
            </div>
            <div class="col-md-4">
            <label for="inputState1">Número total de acuerdos emitidos</label>
              <input type="text" class="form-control" v-model="modulodos.total_acuerdos">
            </div>
          </div> <br>

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
                <th scope="col"> Fecha de sentencia </th>
                <th scope="col"> Fecha de promocion </th>
                <th scope="col"> Solicitud embargo </th>
                <th scope="col"> Fecha solicitud embargo </th>
                <th scope="col"> Autorización embargo </th>
                <th scope="col"> Fecha emisión </th>
                <th scope="col"> Ejecución embargo </th>
                <th scope="col"> Fecha ejecucion embargo </th>
                <th scope="col"> Cumple pago </th>
                <th scope="col"> Bienes sentencia </th>
                <th scope="col"> Solicita adjudicación </th>
                <th scope="col"> Designa Perito </th>
                <th scope="col"> Fecha designacion </th>
                <th scope="col"> Fecha aceptación </th>
                <th scope="col"> Fecha informe </th>
                <th scope="col"> Venta almoneda </th>
                <th scope="col"> Fecha acuerdo </th>
                <th scope="col"> Número publicaciones </th>
                <th scope="col"> Fecha venta </th>
                <th scope="col"> Almonedas publicas </th>
                <th scope="col"> Cambio propietario </th>
                <th scope="col"> Orden lanzamiento </th>
                <th scope="col"> Fecha lanzamiento </th>
                <th scope="col"> Existencia derechos </th>
                <th scope="col"> Tipo derechos </th>
                <th scope="col"> Medidas dictadas </th>
                <th scope="col"> Tipo de medida </th>
                <th scope="col"> Solicitud de amparo </th>
                <th scope="col"> Tipo amparo </th>
                <th scope="col"> Suspensión provisional </th>
                <th scope="col"> Fase procesal </th>
                <th scope="col"> Resolución amparo </th>
                <th scope="col"> Total acuerdos </th>
                <th scope="col"> Actualizar </th>
                <th scope="col"> Eliminar </th>
              </tr>
              <tr v-for="(item, index) in modulodoss.data" :key="index">
                <td>{{item.numero_expediente}}</td>
                <td>{{item.fecha_sentencia}}</td>
                <td>{{item.fecha_promocion}}</td>
                <td>{{item.solicitud_embargo}}</td>
                <td>{{item.fecha_solicitud_embargo}}</td>
                <td>{{item.autorizacion_embargo}}</td>
                <td>{{item.fecha_emision}}</td>
                <td>{{item.ejecucion_embargo}}</td>
                <td>{{item.fecha_ejecucion_embargo}}</td>
                <td>{{item.cumple_pago}}</td>
                <td>{{item.pais}}</td>
                <td>{{item.solicita_adjudicacion}}</td>
                <td>{{item.designa_perito}}</td>
                <td>{{item.fecha_designacion}}</td>
                <td>{{item.fecha_aceptacion}}</td>
                <td>{{item.fecha_informe}}</td>
                <td>{{item.venta_almoneda}}</td>
                <td>{{item.fecha_acuerdo}}</td>
                <td>{{item.numero_publicaciones}}</td>
                <td>{{item.fecha_venta}}</td>
                <td>{{item.almonedas_publicas}}</td>
                <td>{{item.cambio_propietario}}</td>
                <td>{{item.orden_lanzamiento}}</td>
                <td>{{item.fecha_lanzamiento}}</td>
                <td>{{item.existencia_derechos}}</td>
                <td>{{item.tipo_derechos}}</td>
                <td>{{item.medidas_dictadas}}</td>
                <td>{{item.tipo_medida}}</td>
                <td>{{item.solicitud_amparo}}</td>
                <td>{{item.tipo_amparo}}</td>
                <td>{{item.suspension_provisional}}</td>
                <td>{{item.fase_procesal}}</td>
                <td>{{item.resolucion_amparo}}</td>
                <td>{{item.total_acuerdos}}</td>
                <td><button class="btn btn-primary" @click="editarFormulario(item)">Actualizar</button></td>
                <td><button class="btn btn-danger" @click="confirmar(item.id_modulodos)">Eliminar</button></td>
              </tr>
          </thead>   
        </table>


       <!-- Paginador -->
       <pagination :data="modulodoss" @pagination-change-page="getResultsModuloDos"> </pagination>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalModuloDos" tabindex="-1" role="dialog" aria-labelledby="exampleModalModuloDosLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalModuloDosLabel">Confirmar elminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id" id="id">
                ¿Estas seguro(a) de eliminar el registro seleccionado?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="eliminarModuloDos('cancelar')">Cancelar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" @click="eliminarModuloDos('aceptar')">Eliminar</button>
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
                modulodoss: {},
                modulodos: {id_expediente: '', fecha_sentencia: '', fecha_promocion: '', solicitud_embargo: '', fecha_solicitud_embargo: '',autorizacion_embargo: '', fecha_emision: '', ejecucion_embargo: '', fecha_ejecucion_embargo: '', cumple_pago: '', bienes_sentencia: '', solicita_adjudicacion: '', designa_perito: '', fecha_designacion: '', fecha_aceptacion: '', fecha_informe: '', venta_almoneda: '', fecha_acuerdo: '', numero_publicaciones: '', fecha_venta: '', almonedas_publicas: '', cambio_propietario: '', orden_lanzamiento: '', fecha_lanzamiento: '', existencia_derechos: '', tipo_derechos: '', medidas_dictadas: '', tipo_medida: '', solicitud_amparo: '', tipo_amparo: '', suspension_provisional: '', fase_procesal: '', resolucion_amparo: '', total_acuerdos: ''},
                tipoDerechos: [] ,
                tipoMedida: [] ,
                tipoAmparo: [] ,
                faseProcesal: [] ,
                resolucionAmparo: [] ,
                editarActivo: false,
                result1: "",
            }
       },
       mounted() {
        // Fetch initial results
        this.getResultsModuloDos();
      },
       created(){
            axios.get('/Proyecto-CJ/public/expedientesAll')
            .then(res => {
                this.expedientes = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/tipoDerechosCatalogos')
            .then(res => {
                this.tipoDerechos = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/tipoMedidaCatalogos')
            .then(res => {
                this.tipoMedida = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/tipoAmparoCatalogos')
            .then(res => {
                this.tipoAmparo = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/faseProcesalCatalogos')
            .then(res => {
                this.faseProcesal = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/resolucionAmparoCatalogos')
            .then(res => {
                this.resolucionAmparo = res.data;
            }).catch(error => {
                console.log(error.response)
            });
       },
        methods:{
            getResultsModuloDos(page = 1) {
              axios.get('/Proyecto-CJ/public/modulodos?page=' + page)
                .then(response => {
                  this.modulodoss = response.data;
                }).catch(error => {
                    console.log(error.response)
                });
            },
            editarFormulario(item){
              this.editarActivo = true;
              this.modulodos.id_expediente = item.id_expediente;
              this.modulodos.fecha_sentencia = item.fecha_sentencia;
              this.modulodos.fecha_promocion = item.fecha_promocion;
              this.modulodos.solicitud_embargo = item.solicitud_embargo;
              this.modulodos.fecha_solicitud_embargo = item.fecha_solicitud_embargo;
              this.modulodos.autorizacion_embargo = item.autorizacion_embargo;
              this.modulodos.fecha_emision = item.fecha_emision;
              this.modulodos.ejecucion_embargo = item.ejecucion_embargo;
              this.modulodos.fecha_ejecucion_embargo = item.fecha_ejecucion_embargo;
              this.modulodos.cumple_pago = item.cumple_pago;
              this.modulodos.bienes_sentencia = item.bienes_sentencia;
              this.modulodos.solicita_adjudicacion = item.solicita_adjudicacion;
              this.modulodos.designa_perito = item.designa_perito;
              this.modulodos.fecha_designacion = item.fecha_designacion;
              this.modulodos.fecha_aceptacion = item.fecha_aceptacion;
              this.modulodos.fecha_informe = item.fecha_informe;
              this.modulodos.venta_almoneda = item.venta_almoneda;
              this.modulodos.fecha_acuerdo = item.fecha_acuerdo;
              this.modulodos.numero_publicaciones = item.numero_publicaciones;
              this.modulodos.fecha_venta = item.fecha_venta;
              this.modulodos.almonedas_publicas = item.almonedas_publicas;
              this.modulodos.cambio_propietario = item.cambio_propietario;
              this.modulodos.orden_lanzamiento = item.orden_lanzamiento;
              this.modulodos.fecha_lanzamiento = item.fecha_lanzamiento;
              this.modulodos.existencia_derechos = item.existencia_derechos;
              this.modulodos.tipo_derechos = item.tipo_derechos;
              this.modulodos.medidas_dictadas = item.medidas_dictadas;
              this.modulodos.tipo_medida = item.tipo_medida;
              this.modulodos.solicitud_amparo = item.solicitud_amparo;
              this.modulodos.tipo_amparo = item.tipo_amparo;
              this.modulodos.suspension_provisional = item.suspension_provisional;
              this.modulodos.fase_procesal = item.fase_procesal;
              this.modulodos.resolucion_amparo = item.resolucion_amparo;
              this.modulodos.total_acuerdos = item.total_acuerdos;
              this.modulodos.id_modulodos = item.id_modulodos;

            },
           editar(item){
              const params = {id_expediente: item.id_expediente, fecha_sentencia: item.fecha_sentencia, fecha_promocion: item.fecha_promocion, solicitud_embargo: item.solicitud_embargo, fecha_solicitud_embargo: item.fecha_solicitud_embargo, autorizacion_embargo: item.autorizacion_embargo, fecha_emision: item.fecha_emision, ejecucion_embargo: item.ejecucion_embargo, fecha_ejecucion_embargo: item.fecha_ejecucion_embargo, cumple_pago: item.cumple_pago, bienes_sentencia: item.bienes_sentencia, solicita_adjudicacion: item.solicita_adjudicacion, designa_perito: item.designa_perito, fecha_designacion: item.fecha_designacion, fecha_aceptacion: item.fecha_aceptacion, fecha_informe: item.fecha_informe, venta_almoneda: item.venta_almoneda, fecha_acuerdo: item.fecha_acuerdo, numero_publicaciones: item.numero_publicaciones, fecha_venta: item.fecha_venta, almonedas_publicas: item.almonedas_publicas, cambio_propietario: item.cambio_propietario, orden_lanzamiento: item.orden_lanzamiento, fecha_lanzamiento: item.fecha_lanzamiento, existencia_derechos: item.existencia_derechos, tipo_derechos: item.tipo_derechos, medidas_dictadas: item.medidas_dictadas, tipo_medida: item.tipo_medida, solicitud_amparo: item.solicitud_amparo, tipo_amparo: item.tipo_amparo, suspension_provisional: item.suspension_provisional, fase_procesal: item.fase_procesal, resolucion_amparo: item.resolucion_amparo, total_acuerdos: item.total_acuerdos};
              axios.put(`/Proyecto-CJ/public/modulodos/${item.id_modulodos}`, params)
                .then(res =>{
                  this.editarActivo = false;
                  this.getResultsModuloDos(this.modulodoss.current_page);
                })
                  
                this.modulodos.id_expediente = '';
                this.modulodos.fecha_sentencia = '';
                this.modulodos.fecha_promocion = '';
                this.modulodos.solicitud_embargo = '';
                this.modulodos.fecha_solicitud_embargo = '';
                this.modulodos.autorizacion_embargo = '';
                this.modulodos.fecha_emision = '';
                this.modulodos.ejecucion_embargo = '';
                this.modulodos.fecha_ejecucion_embargo = '';
                this.modulodos.cumple_pago = '';
                this.modulodos.bienes_sentencia = '';
                this.modulodos.solicita_adjudicacion = '';
                this.modulodos.designa_perito = '';
                this.modulodos.fecha_designacion = '';
                this.modulodos.fecha_aceptacion = '';
                this.modulodos.fecha_informe = '';
                this.modulodos.venta_almoneda = '';
                this.modulodos.fecha_acuerdo = '';
                this.modulodos.numero_publicaciones = '';
                this.modulodos.fecha_venta = '';
                this.modulodos.almonedas_publicas = '';
                this.modulodos.cambio_propietario = '';
                this.modulodos.orden_lanzamiento = '';
                this.modulodos.fecha_lanzamiento = '';
                this.modulodos.existencia_derechos = '';
                this.modulodos.tipo_derechos = '';
                this.modulodos.medidas_dictadas = '';
                this.modulodos.tipo_medida = '';
                this.modulodos.solicitud_amparo = '';
                this.modulodos.tipo_amparo = '';
                this.modulodos.suspension_provisional = '';
                this.modulodos.fase_procesal = '';
                this.modulodos.resolucion_amparo = '';
                this.modulodos.total_acuerdos = '';
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.modulodos = {id_expediente: '', fecha_sentencia: '', fecha_promocion: '', solicitud_embargo: '', fecha_solicitud_embargo: '',autorizacion_embargo: '', fecha_emision: '', ejecucion_embargo: '', fecha_ejecucion_embargo: '', cumple_pago: '', bienes_sentencia: '', solicita_adjudicacion: '', designa_perito: '', fecha_designacion: '', fecha_aceptacion: '', fecha_informe: '', venta_almoneda: '', fecha_acuerdo: '', numero_publicaciones: '', fecha_venta: '', almonedas_publicas: '', cambio_propietario: '', orden_lanzamiento: '', fecha_lanzamiento: '', existencia_derechos: '', tipo_derechos: '', medidas_dictadas: '', tipo_medida: '', solicitud_amparo: '', tipo_amparo: '', suspension_provisional: '', fase_procesal: '', resolucion_amparo: '', total_acuerdos: ''}
            },
            agregar(){

                //Valida modulodos de formularios
                 //if(this.modulodos.designa_perito.trim() === ''){
                    //alert('Debes completar todos los campos antes de guardar');
                    //return;
                  //}

                //console.log(this.modulodos.id_expediente, this.modulodos.descripcion); 
                const params = {
                id_expediente: this.modulodos.id_expediente,
                fecha_sentencia: this.modulodos.fecha_sentencia,
                fecha_promocion: this.modulodos.fecha_promocion,
                solicitud_embargo: this.modulodos.solicitud_embargo,
                fecha_solicitud_embargo: this.modulodos.fecha_solicitud_embargo,
                autorizacion_embargo: this.modulodos.autorizacion_embargo,
                fecha_emision: this.modulodos.fecha_emision,
                ejecucion_embargo: this.modulodos.ejecucion_embargo,
                fecha_ejecucion_embargo: this.modulodos.fecha_ejecucion_embargo,
                cumple_pago: this.modulodos.cumple_pago,
                bienes_sentencia: this.modulodos.bienes_sentencia,
                solicita_adjudicacion: this.modulodos.solicita_adjudicacion,
                designa_perito: this.modulodos.designa_perito,
                fecha_designacion: this.modulodos.fecha_designacion,
                fecha_aceptacion: this.modulodos.fecha_aceptacion,
                fecha_informe: this.modulodos.fecha_informe,
                venta_almoneda: this.modulodos.venta_almoneda,
                fecha_acuerdo: this.modulodos.fecha_acuerdo,
                numero_publicaciones: this.modulodos.numero_publicaciones,
                fecha_venta: this.modulodos.fecha_venta,
                almonedas_publicas: this.modulodos.almonedas_publicas,
                cambio_propietario: this.modulodos.cambio_propietario,
                orden_lanzamiento: this.modulodos.orden_lanzamiento,
                fecha_lanzamiento: this.modulodos.fecha_lanzamiento,
                existencia_derechos: this.modulodos.existencia_derechos,
                tipo_derechos: this.modulodos.tipo_derechos.valor_variable,
                medidas_dictadas: this.modulodos.medidas_dictadas,
                tipo_medida: this.modulodos.tipo_medida.valor_variable,
                solicitud_amparo: this.modulodos.solicitud_amparo,
                tipo_amparo: this.modulodos.tipo_amparo.valor_variable,
                suspension_provisional: this.modulodos.suspension_provisional,
                fase_procesal: this.modulodos.fase_procesal.valor_variable,
                resolucion_amparo: this.modulodos.resolucion_amparo.valor_variable,
                total_acuerdos: this.modulodos.total_acuerdos,
                }
                //Accion para limpiar los campos

                this.modulodos.id_expediente = '';
                this.modulodos.fecha_sentencia = '';
                this.modulodos.fecha_promocion = '';
                this.modulodos.solicitud_embargo = '';
                this.modulodos.fecha_solicitud_embargo = '';
                this.modulodos.autorizacion_embargo = '';
                this.modulodos.fecha_emision = '';
                this.modulodos.ejecucion_embargo = '';
                this.modulodos.fecha_ejecucion_embargo = '';
                this.modulodos.cumple_pago = '';
                this.modulodos.bienes_sentencia = '';
                this.modulodos.solicita_adjudicacion = '';
                this.modulodos.designa_perito = '';
                this.modulodos.fecha_designacion = '';
                this.modulodos.fecha_aceptacion = '';
                this.modulodos.fecha_informe = '';
                this.modulodos.venta_almoneda = '';
                this.modulodos.fecha_acuerdo = '';
                this.modulodos.numero_publicaciones = '';
                this.modulodos.fecha_venta = '';
                this.modulodos.almonedas_publicas = '';
                this.modulodos.cambio_propietario = '';
                this.modulodos.orden_lanzamiento = '';
                this.modulodos.fecha_lanzamiento = '';
                this.modulodos.existencia_derechos = '';
                this.modulodos.tipo_derechos = '';
                this.modulodos.medidas_dictadas = '';
                this.modulodos.tipo_medida = '';
                this.modulodos.solicitud_amparo = '';
                this.modulodos.tipo_amparo = '';
                this.modulodos.suspension_provisional = '';
                this.modulodos.fase_procesal = '';
                this.modulodos.resolucion_amparo = '';
                this.modulodos.total_acuerdos = '';

                axios.post('/Proyecto-CJ/public/modulodos', params)     
                    .then(res => {
                        this.getResultsModuloDos(this.modulodoss.last_page);
                        this.expedientes.length = 0
                        axios.get('/Proyecto-CJ/public/expedientesAll')
                        .then(res => {
                            this.expedientes = res.data;
                        })
                })

            },
            confirmar(id){
              $('#exampleModalModuloDos').modal("show")
              $('#id').val(id)
            },
            eliminarModuloDos(op){
              if (op === "aceptar") {
                axios.delete(`/Proyecto-CJ/public/modulodos/` + $("#id").val())
                  .then(()=>{
                      this.getResultsModuloDos(this.modulodoss.current_page);
                      $('#exampleModalModuloDos').modal("hide")
                  })
              }
              else{
                $('#exampleModalModuloDos').modal("hide")
              }

            },
       }
    }
</script>


