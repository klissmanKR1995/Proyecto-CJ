<template>
  <div>
    <div class="modal-content"> <br>
      <form @submit.prevent="editar(distrito)" v-if="editarActivo">
        <h5 class="text-center"> Actualizar Información <i> (distritos) </i> </h5> <br>
        <input type="text" class="form-control mb-2" placeholder="Nombre Distrito" v-model="distrito.nombre_distrito" @blur="comprobarDuplicados"><br>
         
        <div class="form-group">
          <select id="inputStateDistrito" class="form-control" v-model="distrito.estatus">
            <option>Activo</option>
            <option>No-activo</option>
            <option>Suspendido</option>
          </select>
        </div>
        
        <center>   
        <div class="alert alert-danger" role="alert" id="existeAlerta">
          Registro existente, verifique la información a almacenar
        </div> 
        <button class="btn btn-primary" type="submit" id="guardar"> Actualizar </button>
        <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
        </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
        <h4 class="text-center"> Formulario Distritos </h4> <br>
        <input type="text" class="form-control mb-2" placeholder="Nombre Distrito" v-model="distrito.nombre_distrito"  @blur="comprobarDuplicados"><br>

        <div class="form-group">
          <select id="inputStateDistrito" class="form-control" v-model="distrito.estatus">
            <option value="">Estatus Distrito </option>
            <option>Activo</option>
            <option>No-activo</option>
            <option>Suspendido</option>
          </select>
        </div>
        
        <center>    
        <div class="alert alert-danger" role="alert" id="existeAlerta">
          Registro existente, verifique la información a almacenar
        </div>
        <button class="btn btn-danger" type="submit" id="guardar"> Guardar </button> 
        </center><br>
      </form>  
    </div>

    <br>

    <div>
      
      <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col"> Nombre - Distrito </th>
              <th scope="col"> Estatus - Distrito </th>
              <th scope="col"> Fecha de Registro</th>
            </tr>
            <tr v-for="(item, index) in distritos.data" :key="index">
              <td>{{item.nombre_distrito}}</td>
              <td>{{item.estatus}}</td>
              <td> <span class="badge badge-primary"> {{item.created_at}} </span> </td>
              <td><button class="btn btn-primary" @click="editarFormulario(item)">Actualizar</button></td>
              <td><button class="btn btn-danger" @click="confirmar(item.id_distrito)">Eliminar</button></td>
            </tr>
        </thead>   
      </table>
      

      <!-- Paginador -->
      <pagination :data="distritos" @pagination-change-page="getResultsDistritos">
      </pagination>



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
              ¿Estas seguro(a) de eliminar el registro seleccionado?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal" @click="eliminarDistrito('cancelar')">Cancelar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal" @click="eliminarDistrito('aceptar')">Eliminar</button>
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
                laravelData: {},
                distritos: {},
                distrito: {nombre_distrito: '', estatus: ''},
                editarActivo: false
            }
       },
       mounted() {
        // Fetch initial results
        this.getResultsDistritos();
        $("#existeAlerta").hide()
      },
       created(){
            axios.get('/Proyecto-CJ/public/distritos')
            .then(res => {
                this.distritos = res.data;
                
            })
       },
       methods:{
            getResultsDistritos(page = 1) {
              axios.get('/Proyecto-CJ/public/distritos?page=' + page)
                .then(response => {
                  this.distritos = response.data;
                });
            },
            editarFormulario(item){
              this.editarActivo = true;
              this.distrito.nombre_distrito = item.nombre_distrito;
              this.distrito.estatus = item.estatus;
              this.distrito.id_distrito = item.id_distrito;

            },
           editar(item){
              const params = {nombre_distrito: item.nombre_distrito, estatus: item.estatus};
              axios.put(`/Proyecto-CJ/public/distritos/${item.id_distrito}`, params)
                .then(res =>{

                  this.editarActivo = false;
                  this.distrito = {nombre_distrito: '', estatus: ''}
                  this.getResultsDistritos(this.distritos.current_page);
                })
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.distrito = {nombre_distrito: '', estatus: ''}
            },
            agregar(){
                //Valida distrito de formularios
                 if(this.distrito.nombre_distrito.trim() === '', this.distrito.estatus.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                  }

                //console.log(this.distrito.nombre_distrito, this.distrito.descripcion); 
                const params = {
                nombre_distrito: this.distrito.nombre_distrito,
                estatus: this.distrito.estatus
                }
                //Accion para limpiar los campos

                this.distrito.nombre_distrito = '';
                this.distrito.estatus = '';
                
                axios.post('/Proyecto-CJ/public/distritos', params)     
                    .then(res => {
                        this.getResultsDistritos(this.distritos.last_page);
                       
                    })     
            },
            confirmar(id){
              $('#exampleModal').modal("show")
              $('#id').val(id)
            },
            eliminarDistrito(op){
              if (op === "aceptar") {
                axios.delete(`/Proyecto-CJ/public/distritos/` + $("#id").val())
                  .then(()=>{
                      this.getResultsDistritos(this.distritos.current_page);
                      
                      $('#exampleModal').modal("hide")
                  })
              }
              else{
                $('#exampleModal').modal("hide")
              }
            },
            comprobarDuplicados() {
              axios.get('/Proyecto-CJ/public/searchNombreDistrito?nombre_distrito=' + this.distrito.nombre_distrito)
                .then(response => {
                  //console.log(response.data.status)
                  if (response.data.status) {
                    $("#existeAlerta").show("slow")
                    $("#guardar").attr("disabled",true)
                  }
                  else{
                    $("#guardar").attr("disabled",false)
                    $("#existeAlerta").hide("slow")
                  }
                });
            },
       }
    }
</script>

