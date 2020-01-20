<template>
  <div>
    <div class="modal-content"> <br>
      <form @submit.prevent="editar(materia)" v-if="editarActivo">
        <h5 class="text-center"> Actualizar Información <i> (materias) </i> </h5> <br>
        <input type="text" class="form-control mb-2" placeholder="Nombre Materia" v-model="materia.nombre_materia" @blur="comprobarDuplicados"><br>

        <div class="form-group">
          <select id="inputStateMateriasActualizar" class="form-control" v-model="materia.estatus">
            <option value="">Estatus Materia </option>
            <option>Activo</option>
            <option>No-activo</option>
            <option>Suspendido</option>
          </select>
        </div>
        
        <center>    
        <div class="alert alert-danger" role="alert" id="existeAlertaMateria">
          Registro existente, verifique la información a almacenar
        </div>
        <button class="btn btn-primary" type="submit" id="guardarMateria"> Actualizar </button>
        <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
        </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
        <h4 class="text-center"> Formulario Materias </h4> <br>
        <input type="text" class="form-control mb-2" placeholder="Nombre Materia" v-model="materia.nombre_materia" @blur="comprobarDuplicados"><br>

        <div class="form-group">
          <select id="inputStateMateriasGuardar" class="form-control" v-model="materia.estatus">
            <option value="">Estatus Materia </option>
            <option>Activo</option>
            <option>No-activo</option>
            <option>Suspendido</option>
          </select>
        </div>
        
        <center>    
        <div class="alert alert-danger" role="alert" id="existeAlertaMateria">
          Registro existente, verifique la información a almacenar
        </div>
        <button class="btn btn-danger" type="submit" id="guardarMateria"> Guardar </button> 
        </center><br>
      </form>  
    </div> <br>

    <div class="container">
      <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col"> Nombre - Materia </th>
              <th scope="col"> Estatus - Materia </th>
              <th scope="col"> Fecha de Registro</th>
            </tr>
            <tr v-for="(item, index) in materias.data" :key="index">
              <td>{{item.nombre_materia}}</td>
              <td>{{item.estatus}}</td>
              <td> <span class="badge badge-primary"> {{item.created_at}} </span> </td>
              <td><button class="btn btn-primary" @click="editarFormulario(item)">Actualizar</button></td>
              <td><button class="btn btn-danger" @click="confirmar(item.id_materia)">Eliminar</button></td>
            </tr>
        </thead>   
      </table> 

      <pagination :data="materias" @pagination-change-page="getResultsMaterias">
      </pagination>
    </div>  
    <!-- Modal -->
    <div class="modal fade" id="modal_materias" tabindex="-1" role="dialog" aria-labelledby="modal_materiasLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal_materiasLabel">Confirmar elminación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id" id="id">
            ¿Estas seguro(a) de eliminar el registro seleccionado?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="eliminarMateria('cancelar')">Cancelar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" @click="eliminarMateria('aceptar')">Eliminar</button>
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
                laravelData: {},
                materias: {},
                materia: {nombre_materia: '', estatus: ''},
                editarActivo: false
            }
       },
       mounted() {
        // Fetch initial results
        this.getResultsMaterias();
        $("#existeAlertaMateria").hide()
      },
       created(){
            axios.get('/Proyecto-CJ/public/materias')
            .then(res => {
                this.materias = res.data;
                
            })
       },
       methods:{
            getResultsMaterias(page = 1) {
              axios.get('/Proyecto-CJ/public/materias?page=' + page)
                .then(response => {
                  this.materias = response.data;
                });
            },
            editarFormulario(item){
              this.editarActivo = true;
              this.materia.nombre_materia = item.nombre_materia;
              this.materia.estatus = item.estatus;
              this.materia.id_materia = item.id_materia;

            },
           editar(item){
              const params = {nombre_materia: item.nombre_materia, estatus: item.estatus};
              axios.put(`/Proyecto-CJ/public/materias/${item.id_materia}`, params)
                .then(res =>{

                  this.editarActivo = false;
                  this.materia = {nombre_materia: '', estatus: ''}
                  this.getResultsMaterias(this.materias.current_page);
                })
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.materia = {nombre_materia: '', estatus: ''}
            },
            agregar(){
                //Valida materia de formularios
                 if(this.materia.nombre_materia.trim() === '', this.materia.estatus.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                  }

                //console.log(this.materia.nombre_materia, this.materia.descripcion); 
                const params = {
                nombre_materia: this.materia.nombre_materia,
                estatus: this.materia.estatus
                }
                //Accion para limpiar los campos

                this.materia.nombre_materia = '';
                this.materia.estatus = '';
                
                axios.post('/Proyecto-CJ/public/materias', params)     
                    .then(res => {
                        this.getResultsMaterias(this.materias.last_page);
                    })     
            },
            confirmar(id){
              $('#modal_materias').modal("show")
              $('#id').val(id)
            },
            eliminarMateria(op){
              if (op === "aceptar") {
                axios.delete(`/Proyecto-CJ/public/materias/` + $("#id").val())
                  .then(()=>{
                      this.getResultsMaterias(this.materias.current_page);
                      $('#modal_materias').modal("hide")
                  })
              }
              else{
                $('#modal_materias').modal("hide")
              }

            },
            comprobarDuplicados() {
              axios.get('/Proyecto-CJ/public/searchNombreMateria?nombre_materia=' + this.materia.nombre_materia)
                .then(response => {
                  //console.log(response.data.status)
                  if (response.data.status) {
                    $("#existeAlertaMateria").show("slow")
                    $("#guardarMateria").attr("disabled",true)
                  }
                  else{
                    $("#guardarMateria").attr("disabled",false)
                    $("#existeAlertaMateria").hide("slow")
                  }
                });
            },
       }
    }
</script>

