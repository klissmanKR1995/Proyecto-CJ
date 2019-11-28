<template>
  <div>
    <div class="modal-content"> <br>
       <form @submit.prevent="editar(expediente)" v-if="editarActivo">
          <h5 class="text-center"> Actualizar Información <i> (Libro de gobierno) </i> </h5> <br>
          
           <input type="text" class="form-control mb-2" placeholder="Número de expediente" v-model="expediente.numero_expediente"></input><br>

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
          <button class="btn btn-primary" type="submit"> Actualizar </button>
          <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
          </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
          <h4 class="text-center"> Formulario Libro de gobierno </h4> <br>
          
          <input type="text" class="form-control mb-2" placeholder="Número de expediente" v-model="expediente.numero_expediente"></input><br>

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
            <select id="id_juicio" class="form-control" v-model="expediente.id_juicio"  @change="cambio()">
              <option value="">Juicio al expediente</option>
              <option v-for="(item, index) in juicios" :value="item.id_juicio">{{item.nombre_juicio}}</option>
            </select>
          </div>
          
          <center>    
          <button class="btn btn-danger" type="submit"> Guardar </button> 
          </center><br>
      </form>  
    </div>

    <br>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col"> Número - Expediente </th>
              <th scope="col"> Nombre - Actor</th>
              <th scope="col"> Nombre - Demandado</th>
              <th scope="col"> Fecha - Tribunal</th>
              <th scope="col"> Fecha - Juzgado</th>
              <th scope="col"> Tipo - Juicio</th>
              <th scope="col"> Fecha - Registro</th>
            </tr>
            <tr v-for="(item, index) in expedientes" :key="index">
              <td>{{item.numero_expediente}}</td>
              <td>{{item.nombre_actor}}</td>
              <td>{{item.nombre_demandado}}</td>
              <td>{{item.fecha_en_tribunal}}</td>
              <td>{{item.fecha_en_juzgado}}</td>
              <td>{{item.nombre_juicio}}</td>
              <td> <span class="badge badge-primary"> {{item.created_at}} </span> </td>
              <td><button class="btn btn-primary" @click="editarFormulario(item)">Actualizar</button></td>
              <td><button class="btn btn-danger"  @click="confirmar(item.id_expediente, index)">Eliminar</button></td>
            </tr>
        </thead>   
      </table>

       <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar elminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="index" id="index">
                ¿Estas seguro(a) de eliminar el registro seleccionado?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="eliminarExpediente('cancelar')">Cancelar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" @click="eliminarExpediente('aceptar')">Eliminar</button>
              </div>
            </div>
          </div>
        </div>

        


      <br>
    </div>   
  </div>            
</template>

<script>
    export default {
       data(){
            return{
                expedientes: [],
                juicios: [],
                expediente: {numero_expediente: '', nombre_actor: '', nombre_demandado: '', fecha_en_tribunal: '', fecha_en_juzgado: '',nombre_juicio:'', id_juicio: '' },
                editarActivo: false
            }
       },
       created(){
            axios.get('/Proyecto-CJ/public/juicios')
            .then(res => {
                this.juicios = res.data;
            }),
            axios.get('/Proyecto-CJ/public/expedientes')
            .then(res => {
                this.expedientes = res.data;
            })
       },

       methods:{
            editarFormulario(item){
              this.editarActivo = true;
              this.expediente.id_expediente = item.id_expediente;
              this.expediente.numero_expediente = item.numero_expediente;
              this.expediente.nombre_actor = item.nombre_actor;
              this.expediente.nombre_demandado = item.nombre_demandado;
              this.expediente.fecha_en_tribunal = item.fecha_en_tribunal;
              this.expediente.fecha_en_juzgado = item.fecha_en_juzgado;
              this.expediente.id_juicio = item.id_juicio;
            },
            editar(item){
              const params = {numero_expediente: item.numero_expediente, nombre_actor: item.nombre_actor, nombre_demandado: item.nombre_demandado, fecha_en_tribunal: item.fecha_en_tribunal, fecha_en_juzgado: item.fecha_en_juzgado, id_juicio: item.id_juicio };
              axios.put(`/Proyecto-CJ/public/expedientes/${item.id_expediente}`, params)
                .then(res =>{

                  this.editarActivo = false;
                  const index = this.expedientes.findIndex(
                    notaBuscar => notaBuscar.id_expediente === res.data.id_expediente)

                    this.expedientes[index] = res.data;

                    this.expediente = {numero_expediente: '', nombre_actor: '', nombre_demandado: '', fecha_en_tribunal: '', fecha_en_juzgado: '', id_juicio: ''}

                     axios.get('/Proyecto-CJ/public/expedientes')
                      .then(res => {
                          this.expedientes = res.data;
                      })
                })
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.expediente = {numero_expediente: '', nombre_actor: '', nombre_demandado: '', fecha_en_tribunal: '', fecha_en_juzgado: '', id_juicio: ''}
            },
            cambio(){
              axios.get('/Proyecto-CJ/public/searchByID?id_juicio=' + this.expediente.id_juicio)
              .then(res => {
                  console.log(res)
                  this.expediente.nombre_juicio = res.data[0].nombre_juicio
              })
            },
            agregar(){

                //Validacion de formularios
                 if(this.expediente.numero_expediente.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                  }

                //console.log(this.expediente.nombre, this.expediente.descripcion); 
                const params = {
                numero_expediente: this.expediente.numero_expediente,
                nombre_actor: this.expediente.nombre_actor,
                nombre_demandado: this.expediente.nombre_demandado,
                fecha_en_tribunal: this.expediente.fecha_en_tribunal,
                fecha_en_juzgado: this.expediente.fecha_en_juzgado,
                id_juicio: this.expediente.id_juicio,
                nombre_juicio: this.expediente.nombre_juicio
                }
                //Accion para limpiar los campos

                this.expediente.numero_expediente = '';
                this.expediente.nombre_actor = '';
                this.expediente.nombre_demandado = '';
                this.expediente.fecha_en_tribunal = '';
                this.expediente.fecha_en_juzgado = '';
                this.expediente.id_juicio = '';

               
                
                axios.post('/Proyecto-CJ/public/expedientes', params)     
                    .then(res => {
                        this.expedientes.push(res.data)
                    })     
            },
            confirmar(id, index){
              $('#exampleModal').modal("show")
              $('#id').val(id)
              $('#index').val(index)
            },
            eliminarExpediente(op){
              if (op === "aceptar") {
                axios.delete(`/Proyecto-CJ/public/expedientes/` + $("#id").val())
                  .then(()=>{
                      this.expedientes.splice($("#index").val(), 1);
                      $('#exampleModal').modal("hide")
                  })
              }
              else{
                $('#exampleModal').modal("hide")
              }

            }
       }
    }
</script>

