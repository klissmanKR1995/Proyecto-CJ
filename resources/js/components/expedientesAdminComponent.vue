<template>
  <div>
    <div class="modal-content"> <br>
       <form @submit.prevent="editar(expediente)" v-if="editarActivo">
          <h5 class="text-center"> Actualizar Información <i> (Libro de gobierno) </i> </h5> <br>
          
           <input type="text" class="form-control mb-2" placeholder="Número de expediente" v-model="expediente.numero_expediente" @blur="comprobarDuplicados"><br>

           <div class="form-row">
            <div class="col">
              <center>
              <label for="Fecha-tribunal">Materia al que pertenece</label>
              </center>
                <select  class="form-control" v-model="expediente.id_materia">
                  <option v-for="(item, index) in materias" :value="item.id_materia">{{item.nombre_materia}}</option>
                </select>
            </div>
            <div class="col">
              <center>
              <label for="Fecha-tribunal">Juzgado al que pertenece</label>
              </center>
                <select id="id_juzgado" class="form-control" v-model="expediente.id_juzgado">
                  <option v-for="(item, index) in juzgados" :value="item.id_juzgado">{{item.nombre_juzgado}}</option>
                </select>
            </div>
          </div><br>

          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Nombre-actor" v-model="expediente.nombre_actor">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Nombre-demandado" v-model="expediente.nombre_demandado">
            </div>
          </div><br>

          <div class="form-row">
            <div class="col">
              <center>
              <label for="Fecha-tribunal">Fecha de entrada al tribunal</label>
              </center>
              <input type="date" class="form-control" placeholder="Fecha-tribunal" v-model="expediente.fecha_en_tribunal">
            </div>
            <div class="col">
              <center>
              <label for="Fecha-tribunal">Fecha de entrada al juzgado</label>
              </center>
              <input type="date" class="form-control" placeholder="Fecha-juzgado" v-model="expediente.fecha_en_juzgado">
            </div>
          </div><br>

          <div class="form-group">
            <select id="id_juicio" class="form-control" v-model="expediente.id_juicio">
              <option value="">Juicio al expediente</option>
              <option v-for="(item, index) in juicios" :value="item.id_juicio">{{item.nombre_juicio}}</option>
            </select>
          </div>

          
          <center>    
          <div class="alert alert-danger" role="alert" id="existeAlertaExpediente">
            Registro existente, verifique la información a almacenar
          </div> 
          <button class="btn btn-primary" type="submit" id="guardarexpediente"> Actualizar </button>
          <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
          </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
          <h4 class="text-center"> Formulario Libro de Gobierno </h4> <br>
          
          <input type="text" class="form-control mb-2" placeholder="Número de expediente/Año" v-model="expediente.numero_expediente" @blur="comprobarDuplicados"><br>


          <div class="form-row">
            <div class="col">
              <center>
              <label for="Fecha-tribunal">Materia al que pertenece</label>
              </center>
                <select  class="form-control" v-model="expediente.id_materia">
                  <option v-for="(item, index) in materias" :value="item.id_materia">{{item.nombre_materia}}</option>
                </select>
            </div>
            <div class="col">
              <center>
              <label for="Fecha-tribunal">Juzgado al que pertenece</label>
              </center>
                <select id="id_juzgado" class="form-control" v-model="expediente.id_juzgado">
                  <option v-for="(item, index) in juzgados" :value="item.id_juzgado">{{item.nombre_juzgado}}</option>
                </select>
            </div>
          </div><br>

          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Nombre-actor" v-model="expediente.nombre_actor">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Nombre-demandado" v-model="expediente.nombre_demandado">
            </div>
          </div><br>

          <div class="form-row">
            <div class="col">
              <center>
              <label for="Fecha-tribunal">Fecha de entrada al tribunal</label>
              </center>
              <input type="date" class="form-control" placeholder="Fecha-tribunal" v-model="expediente.fecha_en_tribunal">
            </div>
            <div class="col">
              <center>
              <label for="Fecha-tribunal">Fecha de entrada al juzgado</label>
              </center>
              <input type="date" class="form-control" placeholder="Fecha-juzgado" v-model="expediente.fecha_en_juzgado">
            </div>
          </div><br>

          <div class="form-group">
            <select id="id_juicio" class="form-control" v-model="expediente.id_juicio">
              <option value="">Juicio al expediente</option>
              <option v-for="(item, index) in juicios" :value="item.id_juicio">{{item.nombre_juicio}}</option>
            </select>
          </div>
          
          <center>    
          <div class="alert alert-danger" role="alert" id="existeAlertaExpediente">
            Registro existente, verifique la información a almacenar
          </div> 
          <button class="btn btn-danger" type="submit" id="guardarexpediente"> Guardar </button> 
          </center><br>
      </form>  
    </div>

    <br>

    <div class="table-responsive">
      <table class="table  table-bordered">
        <thead>
            <tr>
              <th scope="col"> Número - Expediente </th>
              <th scope="col"> Materia </th>
              <th scope="col"> Juzgado </th>
              <th scope="col"> Nombre - Actor</th>
              <th scope="col"> Nombre - Demandado</th>
              <th scope="col"> Fecha - Tribunal</th>
              <th scope="col"> Fecha - Juzgado</th>
              <th scope="col"> Tipo - Juicio</th>
              <th scope="col"> Fecha - Registro</th>
              <th scope="col"> Actualizar - Registro</th>
              <th scope="col"> Eliminar - Registro</th>
            </tr>
            <tr v-for="(item, index) in expedientes" :key="index">
              <td>{{item.numero_expediente}}</td>
              <td>{{item.nombre_materia}}</td>
              <td>{{item.nombre_juzgado}}</td>
              <td>{{item.nombre_actor}}</td>
              <td>{{item.nombre_demandado}}</td>
              <td>{{item.fecha_en_tribunal}}</td>
              <td>{{item.fecha_en_juzgado}}</td>
              <td>{{item.nombre_juicio}}</td>
              <td> <span class="badge badge-primary"> {{item.created_at}} </span> </td>
              <td><button class="btn btn-primary" @click="editarFormulario(item)">Actualizar</button></td>
              <td><button class="btn btn-danger"  @click="confirmar(item.id_expediente)">Eliminar</button></td>
            </tr>
        </thead>   
      </table>
    </div>   
    <!-- Modal -->
    <div class="modal fade" id="exampleModalExpedientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalExpedientesLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalExpedientesLabel">Confirmar elminación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id" id="id">
            ¿Estas seguro(a) de eliminar el registro seleccionado?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="eliminarExpediente('cancelar')">Cancelar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" @click="eliminarExpediente('aceptar')">Eliminar</button>
          </div>
        </div>
      </div>
    </div>
  </div>            
</template>

<script>
    export default {
       data(){
            return{
                juicios: {},
                materias: {},
                juzgados: {},
                expedientes: {},
                expediente: {numero_expediente: '', id_materia: '', id_juzgado: '', nombre_actor: '', nombre_demandado: '', fecha_en_tribunal: '', fecha_en_juzgado: '', id_juicio: '' },
                editarActivo: false
            }
       },
       mounted: function () { 
        // Fetch initial results
        this.getResults();
        $("#existeAlertaExpediente").hide()
        },
       created(){
            axios.get('/Proyecto-CJ/public/juiciosAll')
            .then(res => {
                this.juicios = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/materiasAll')
            .then(res => {
                this.materias = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/juzgadosAll')
            .then(res => {
                this.juzgados = res.data;
            }).catch(error => {
                console.log(error.response)
            });
            axios.get('/Proyecto-CJ/public/expedientes')
            .then(res => {
                this.expedientes = res.data;
            }).catch(error => {
                console.log(error.response)
            });
       },
        methods:{
            getResults(page = 1) {
              axios.get('/Proyecto-CJ/public/expedientes?page=' + page)
                .then(response => {
                  this.expedientes = response.data;
                }).catch(error => {
                    console.log(error.response)
                });
            },
            editarFormulario(item){
              this.editarActivo = true;
              this.expediente.id_expediente = item.id_expediente;
              this.expediente.id_materia = item.id_materia;
              this.expediente.id_juzgado = item.id_juzgado;
              this.expediente.numero_expediente = item.numero_expediente;
              this.expediente.nombre_actor = item.nombre_actor;
              this.expediente.nombre_demandado = item.nombre_demandado;
              this.expediente.fecha_en_tribunal = item.fecha_en_tribunal;
              this.expediente.fecha_en_juzgado = item.fecha_en_juzgado;
              this.expediente.id_juicio = item.id_juicio;

            },
           editar(item){
              const params = {numero_expediente: item.numero_expediente, id_materia: item.id_materia, id_juzgado: item.id_juzgado, nombre_actor: item.nombre_actor, nombre_demandado: item.nombre_demandado, fecha_en_tribunal: item.fecha_en_tribunal, fecha_en_juzgado: item.fecha_en_juzgado, id_juicio: item.id_juicio };
              axios.put(`/Proyecto-CJ/public/expedientes/${item.id_expediente}`, params)
                .then(res =>{
                  this.editarActivo = false;
                  this.getResults(this.expedientes.current_page);
                })
                  this.expediente.numero_expediente = '';
                  this.expediente.id_materia = '';
                  this.expediente.id_juzgado = '';
                  this.expediente.nombre_actor = '';
                  this.expediente.nombre_demandado = '';
                  this.expediente.fecha_en_tribunal = '';
                  this.expediente.fecha_en_juzgado = '';
                  this.expediente.id_juicio = '';
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.expediente = {numero_expediente: '', id_materia: '', id_juzgado: '', nombre_actor: '', nombre_demandado: '', fecha_en_tribunal: '', fecha_en_juzgado: '', id_juicio: ''}
            },
            agregar(){

                //Valida juzgado de formularios
                 if(this.expediente.numero_expediente.trim() === '', this.expediente.nombre_actor.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                  }

                //console.log(this.juzgado.nombre_juzgado, this.juzgado.descripcion); 
                const params = {
                numero_expediente: this.expediente.numero_expediente,
                id_materia: this.expediente.id_materia,
                nombre_materia: this.expediente.nombre_materia,
                id_juzgado: this.expediente.id_juzgado,
                nombre_juzgado: this.expediente.nombre_juzgado,
                nombre_actor: this.expediente.nombre_actor,
                nombre_demandado: this.expediente.nombre_demandado,
                fecha_en_tribunal: this.expediente.fecha_en_tribunal,
                fecha_en_juzgado: this.expediente.fecha_en_juzgado,
                id_juicio: this.expediente.id_juicio,
                nombre_juicio: this.expediente.nombre_juicio
                }
                //Accion para limpiar los campos

                this.expediente.numero_expediente = '';
                this.expediente.id_materia = '';
                this.expediente.id_juzgado = '';
                this.expediente.nombre_actor = '';
                this.expediente.nombre_demandado = '';
                this.expediente.fecha_en_tribunal = '';
                this.expediente.fecha_en_juzgado = '';
                this.expediente.id_juicio = '';
                
                axios.post('/Proyecto-CJ/public/expedientes', params)     
                    .then(res => {
                        this.getResults(this.expedientes.last_page);
                    })     
            },
            confirmar(id){
              $('#exampleModalExpedientes').modal("show")
              $('#id').val(id)
            },
            eliminarExpediente(op){
              if (op === "aceptar") {
                axios.delete(`/Proyecto-CJ/public/expedientes/` + $("#id").val())
                  .then(()=>{
                      this.getResults(this.expedientes.current_page);
                      $('#exampleModalExpedientes').modal("hide")
                  })
              }
              else{
                $('#exampleModalExpedientes').modal("hide")
              }

            },
            comprobarDuplicados() {
              axios.get('/Proyecto-CJ/public/searchNombreExpdiente?numero_expediente=' + this.expediente.numero_expediente)
                .then(response => {
                  //console.log(response.data.status)
                  if (response.data.status) {
                    $("#existeAlertaExpediente").show("slow")
                    $("#guardarexpediente").attr("disabled",true)
                  }
                  else{
                    $("#guardarexpediente").attr("disabled",false)
                    $("#existeAlertaExpediente").hide("slow")
                  }
                });
            },
       }
    }
</script>


