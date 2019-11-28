<template>
  <div>
    <div class="modal-content"> <br>
       <form @submit.prevent="editar(expediente)" v-if="editarActivo">
          <h5 class="text-center"> Actualizar Información <i> (Modulo - I) </i> </h5> <br>
          
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Datos de las partes" v-model="expediente.nombre_actor">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Nomb" v-model="expediente.nombre_demandado">
            </div>
          </div><br> 
    
          <center>    
          <button class="btn btn-primary" type="submit"> Actualizar </button>
          <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
          </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
          <h4 class="text-center"> Datos de las partes en los procesos (Modulo I)  </h4> <br>



         
          
           <div class="row">
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Datos de las partes de los procesos" v-model="expediente.nombre_actor">
            </div>
            <div class="form-group col-md-4">
              <select id="inputState" class="form-control">
                <option selected>Persona fisica o moral</option>
                <option>Fisica</option>
                <option>Moral</option>
              </select>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Razon social" v-model="expediente.nombre_demandado">
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Nombre comercial" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Nombre completo" v-model="expediente.nombre_demandado">
            </div>
            <div class="form-group col-md-4">
              <select id="inputState" class="form-control">
                <option selected>Sexo</option>
                <option>Femenino</option>
                <option>Masculino</option>
                <option>Transgenero femenino</option>
                <option>Transgenero masculino</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <input type="date" class="form-control" placeholder="Fecha de nacimiento" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="RFC" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="CURP" v-model="expediente.nombre_demandado">
            </div>
          </div><br>

          <div class="row">
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Pais de nacimiento" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Entidad de nacimiento" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Municipio de nacimiento" v-model="expediente.nombre_demandado">
            </div>
          </div><br>

          <div class="row">
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Nacionalidad" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Pais de residencia habitual" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Entidad de residencia habitual" v-model="expediente.nombre_demandado">
            </div>
          </div><br>


          <div class="row">
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Entidad de residencia habitual" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Municipio de residencia habitual" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Tipo de domicilio" v-model="expediente.nombre_demandado">
            </div>
          </div><br>        

          <div class="row">
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Discapacidad" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Tipo de discapacidad" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Situacion conyugal" v-model="expediente.nombre_demandado">
            </div>
          </div><br>


          <div class="row">
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Escolaridad" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Condicion migratoria" v-model="expediente.nombre_demandado">
            </div>
            <div class="form-group col-md-4">
              <select id="inputState" class="form-control">
                <option selected>¿Habla español?</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
              <select id="inputState" class="form-control">
                <option selected>¿Habla lengua indigena?</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Tipo lengua indigena" v-model="expediente.nombre_demandado">
            </div>
            <div class="form-group col-md-4">
              <select id="inputState" class="form-control">
                <option selected>¿Habla lengua extranjera?</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Ocupacion" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Condicion de actividad" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Principal fuente de ingresos" v-model="expediente.nombre_demandado">
            </div>
          </div><br>

          <div class="row">
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Ingreso mensual neto" v-model="expediente.nombre_demandado">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Tipo de representación" v-model="expediente.nombre_demandado">
            </div>
            <div class="form-group col-md-4">
              <select id="inputState" class="form-control">
                <option selected>Sexo de la representación</option>
                <option>Femenino</option>
                <option>Masculino</option>
                <option>Transgenero femenino</option>
                <option>Transgenero masculino</option>
              </select>
            </div>
          </div>

          <center>    
          <button class="btn btn-danger" type="submit"> Guardar Registro </button> 
          </center><br>
      </form>  
    </div>

    <br>

    <div>
      <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col"> Número - Expediente </th>
              <th scope="col"> Nombre - Actor</th>
              <th scope="col"> Nombre - Demandado</th>
              <th scope="col"> Fecha - Tribunal</th>
              <th scope="col"> Fecha - Juzgado</th>
              <th scope="col"> Tipo - Juicio</th>
            </tr>
            <tr v-for="(item, index) in modulouno" :key="index">
              <td>{{item.numero_expediente}}</td>
              <td>{{item.nombre_actor}}</td>
              <td>{{item.nombre_demandado}}</td>
              <td>{{item.fecha_en_tribunal}}</td>
              <td>{{item.fecha_en_juzgado}}</td>
              <td>{{item.nombre_juicio}}</td>
              <td> <span class="badge badge-primary"> {{item.created_at}} </span> </td>
              <td><button class="btn btn-primary" @click="editarFormulario(item)">Actualizar</button></td>
              <td><button class="btn btn-danger" @click="eliminarNota(item, index)">Eliminar</button></td>
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
                expediente: {numero_expediente: '', nombre_actor: '', nombre_demandado: '', fecha_en_tribunal: '', fecha_en_juzgado: '', id_juicio: '' },
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
                id_juicio: this.expediente.id_juicio
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
            eliminarNota(item, index){
              axios.delete(`/Proyecto-CJ/public/expedientes/${item.id_expediente}`)
                .then(()=>{
                    this.expedientes.splice(index, 1);
                })

            }
       }
    }
</script>

