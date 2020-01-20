<template>
  <div>
    <div class="modal-content"> <br>
       <form @submit.prevent="editar(juzgado)" v-if="editarActivo">
        <h5 class="text-center"> Actualizar Información <i> (juzgados) </i> </h5> <br>
        <input type="text" class="form-control mb-2" placeholder="Nombre Juzgado" v-model="juzgado.nombre_juzgado" @blur="comprobarDuplicados"><br>

        <div class="form-group">
          <select id="inputStateJuzgadosActualizar" class="form-control" v-model="juzgado.estatus">
            <option value="">Estatus Juzgado </option>
            <option>Activo</option>
            <option>No-activo</option>
            <option>Suspendido</option>
          </select>
        </div>
        
        <div class="form-group">
          <select id="id_distrito" class="form-control" v-model="juzgado.id_distrito">
            <option value="">Distrito al que pertenece </option>
            <option v-for="(item, index) in distritos" :value="item.id_distrito">{{item.nombre_distrito}}</option>
          </select>
        </div>

        <center>    
        <div class="alert alert-danger" role="alert" id="existeAlerta2">
            Registro existente, verifique la información a almacenar
        </div> 
        <button class="btn btn-primary" type="submit" id="guardarJuzgado"> Actualizar </button>
        <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
        </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
        <h4 class="text-center"> Formulario Juzgados </h4> <br>
        <input type="text" class="form-control mb-2" placeholder="Nombre Juzgado" v-model="juzgado.nombre_juzgado" @blur="comprobarDuplicados"><br>

        <div class="form-group">
          <select id="inputStateJuzgadosGuardar" class="form-control" v-model="juzgado.estatus">
            <option value="">Estatus Juzgado </option>
            <option>Activo</option>
            <option>No-activo</option>
            <option>Suspendido</option>
          </select>
        </div>
       

       <div class="form-group">
          <select id="id_distrito" class="form-control" v-model="juzgado.id_distrito">
            <option value="">Distrito al que pertenece </option>
            <option v-for="(item, index) in distritos" :value="item.id_distrito">{{item.nombre_distrito}}</option>
          </select>
        </div>
        <center>    
        <div class="alert alert-danger" role="alert" id="existeAlerta2">
            Registro existente, verifique la información a almacenar
        </div> 
        <button class="btn btn-danger" type="submit" id="guardarJuzgado"> Guardar </button> 
        </center><br>
      </form>  
    </div> 

    <div class="container">
      <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col"> Nombre - Juzgado </th>
              <th scope="col"> Estatus - Juzgado </th>
              <th scope="col"> Nombre - Distrito </th>
              <th scope="col"> Fecha de Registro </th>
            </tr>
            <tr v-for="(item, index) in juzgados.data" :key="index">
              <td>{{item.nombre_juzgado}}</td>
              <td>{{item.estatus}}</td>
              <td>{{item.nombre_distrito}}</td>
              <td> <span class="badge badge-primary"> {{item.created_at}} </span> </td>
              <td><button class="btn btn-primary" @click="editarFormulario(item)">Actualizar</button></td>
              <td><button class="btn btn-danger" @click="confirmar(item.id_juzgado)">Eliminar</button></td>
            </tr>
        </thead>   
      </table> 

      <pagination :data="juzgados" @pagination-change-page="getResultsJuzgados">
      </pagination>      
    </div>  

    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModal1Label">Confirmar elminación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id" id="id">
            ¿Estas seguro(a) de eliminar el registro seleccionado?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="eliminarJuzgado('cancelar')">Cancelar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" @click="eliminarJuzgado('aceptar')">Eliminar</button>
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
                distritos: {},
                juzgados: {},
                juzgado: {nombre_juzgado: '', estatus: '',id_distrito: ''},
                editarActivo: false
            }
       },
       mounted: function () { 
        // Fetch initial results
        this.getResultsJuzgados();
        $("#existeAlerta2").hide()
      },
       created(){
        axios.get('/Proyecto-CJ/public/distritosAll')
            .then(res => {
                this.distritos = res.data;
            }),
             axios.get('/Proyecto-CJ/public/juzgados')
            .then(res => {
                this.juzgados = res.data;
            })
       },
       methods:{
            getResultsJuzgados(page = 1) {
              axios.get('/Proyecto-CJ/public/juzgados?page=' + page)
                .then(response => {
                  this.juzgados = response.data;
                });
            },
            editarFormulario(item){
              this.editarActivo = true;
              this.juzgado.nombre_juzgado = item.nombre_juzgado;
              this.juzgado.estatus = item.estatus;
              this.juzgado.id_juzgado = item.id_juzgado;
              this.juzgado.id_distrito = item.id_distrito;

            },
           editar(item){
              const params = {nombre_juzgado: item.nombre_juzgado, estatus: item.estatus, id_distrito: item.id_distrito};
              axios.put(`/Proyecto-CJ/public/juzgados/${item.id_juzgado}`, params)
                .then(res =>{
                  this.editarActivo = false;
                  this.getResultsJuzgados(this.juzgados.current_page);
                })
                  this.juzgado.nombre_juzgado = '';
                  this.juzgado.estatus = '';
                  this.juzgado.id_distrito = '';
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.juzgado = {nombre_juzgado: '', estatus: '', id_ditrito: ''}
            },
            agregar(){

                //Valida juzgado de formularios
                 if(this.juzgado.nombre_juzgado.trim() === '', this.juzgado.estatus.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                  }

                //console.log(this.juzgado.nombre_juzgado, this.juzgado.descripcion); 
                const params = {
                nombre_juzgado: this.juzgado.nombre_juzgado,
                estatus: this.juzgado.estatus,
                id_distrito: this.juzgado.id_distrito
                }
                //Accion para limpiar los campos

                this.juzgado.nombre_juzgado = '';
                this.juzgado.estatus = '';
                this.juzgado.id_distrito = '';
                
                axios.post('/Proyecto-CJ/public/juzgados', params)     
                    .then(res => {
                        this.getResultsJuzgados(this.juzgados.last_page);
                    })     
            },
            confirmar(id){
              $('#exampleModal1').modal("show")
              $('#id').val(id)
            },
            eliminarJuzgado(op){
              if (op === "aceptar") {
                axios.delete(`/Proyecto-CJ/public/juzgados/` + $("#id").val())
                  .then(()=>{
                      this.getResultsJuzgados(this.juzgados.current_page);
                      $('#exampleModal1').modal("hide")
                  })
              }
              else{
                $('#exampleModal1').modal("hide")
              }

            },
            comprobarDuplicados() {
              axios.get('/Proyecto-CJ/public/searchNombreJuzgado?nombre_juzgado=' + this.juzgado.nombre_juzgado)
                .then(response => {
                  //console.log(response.data.status)
                  if (response.data.status) {
                    $("#existeAlerta2").show("slow")
                    $("#guardarJuzgado").attr("disabled",true)
                  }
                  else{
                    $("#guardarJuzgado").attr("disabled",false)
                    $("#existeAlerta2").hide("slow")
                  }
                });
            },
       }
    }
</script>


