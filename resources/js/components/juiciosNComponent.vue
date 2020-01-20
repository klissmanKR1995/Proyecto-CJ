<template>
  <div>
    <div class="modal-content"> <br>
       <form @submit.prevent="editar(juicio)" v-if="editarActivo">
        <h5 class="text-center"> Actualizar Información <i> (Juicios) </i> </h5> <br>
        <input type="text" class="form-control mb-2" placeholder="Nombre juicio" v-model="juicio.nombre_juicio" @blur="comprobarDuplicados"><br>

        <div class="form-group">
          <select id="inputStateJuicios" class="form-control" v-model="juicio.estatus">
            <option value="">Estatus Juicio </option>
            <option>Activo</option>
            <option>No-activo</option>
            <option>Suspendido</option>
          </select>
        </div>
        
         <div class="form-group">
          <select id="id_materia" class="form-control" v-model="juicio.id_materia">
            <option value="">Materia al que pertenece </option>
            <option v-for="(item, index) in materias" :value="item.id_materia">{{item.nombre_materia}}</option>
          </select>
        </div>

        <div class="text-center">    
          <div class="alert alert-danger" role="alert" id="existeAlertaJuicio">
              Registro existente, verifique la información a almacenar
          </div> 
          <button class="btn btn-primary" type="submit" id="guardarjuicio"> Actualizar </button>
          <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
        </div> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
        
        <h4 class="text-center"> Formulario Juicios </h4> <br>
        
        <input type="text" class="form-control mb-2" placeholder="Nombre juicio" v-model="juicio.nombre_juicio" @blur="comprobarDuplicados"><br>

        <div class="form-group">
          <select id="inputStateJuicios" class="form-control" v-model="juicio.estatus">
            <option value="">Estatus Juicio </option>
            <option>Activo</option>
            <option>No-activo</option>
            <option>Suspendido</option>
          </select>
        </div>

        <div class="form-group">
          <select id="id_materia" class="form-control" v-model="juicio.id_materia">
            <option value="">Materia al que pertenece </option>
            <option v-for="(item, index) in materias" :value="item.id_materia">{{item.nombre_materia}}</option>
          </select>
        </div>

        <div class="text-center">    
        <div class="alert alert-danger" role="alert" id="existeAlertaJuicio">
            Registro existente, verifique la información a almacenar
        </div> 
        <button class="btn btn-danger" type="submit" id="guardarjuicio"> Guardar </button> 
        </div><br>
      </form>  
    </div> <br>

    <div class="container">
      <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col"> Nombre - juicio </th>
              <th scope="col"> Estatus - juicio </th>
              <th scope="col"> Materia </th>
              <th scope="col"> Fecha de Registro</th>
            </tr>
            <tr v-for="(item, index) in juicios.data" :key="index">
              <td>{{item.nombre_juicio}}</td>
              <td>{{item.estatus}}</td>
              <td>{{item.nombre_materia}}</td>
              <td> <span class="badge badge-primary"> {{item.created_at}} </span> </td>
              <td><button class="btn btn-primary" @click="editarFormulario(item)">Actualizar</button></td>
              <td><button class="btn btn-danger" @click="confirmar(item.id_juicio)">Eliminar</button></td>
            </tr>
        </thead>   
      </table> 

      <pagination :data="juicios" @pagination-change-page="getResultsJuicios">
      </pagination>
    </div>   

   <!-- Modal -->
    <div class="modal fade" id="exampleModalJuicios" tabindex="-1" role="dialog" aria-labelledby="exampleModalJuiciosLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalJuiciosLabel">Confirmar elminación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id" id="id">
            ¿Estas seguro(a) de eliminar el registro seleccionado?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="eliminarjuicio('cancelar')">Cancelar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" @click="eliminarjuicio('aceptar')">Eliminar</button>
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
                materias: {},
                juicios: {},
                juicio: {nombre_juicio: '', estatus: '',id_distrito: ''},
                editarActivo: false
            }
       },
       mounted: function () { 
        // Fetch initial results
        this.getResultsJuicios();
        $("#existeAlertaJuicio").hide()
      },
       created(){
        axios.get('/Proyecto-CJ/public/materiasAll')
            .then(res => {
                this.materias = res.data;
            }),
             axios.get('/Proyecto-CJ/public/juicios')
            .then(res => {
                this.juicios = res.data;
            })
       },
       methods:{
            getResultsJuicios(page = 1) {
              axios.get('/Proyecto-CJ/public/juicios?page=' + page)
                .then(response => {
                  this.juicios = response.data;
                });
            },
            editarFormulario(item){
              this.editarActivo = true;
              this.juicio.nombre_juicio = item.nombre_juicio;
              this.juicio.estatus = item.estatus;
              this.juicio.id_juicio = item.id_juicio;
              this.juicio.id_materia = item.id_materia;

            },
           editar(item){
              const params = {nombre_juicio: item.nombre_juicio, estatus: item.estatus, id_materia: item.id_materia};
              axios.put(`/Proyecto-CJ/public/juicios/${item.id_juicio}`, params)
                .then(res =>{
                  this.editarActivo = false;
                  this.getResultsJuicios(this.juicios.current_page);
                })
                  this.juicio.nombre_juicio = '';
                  this.juicio.estatus = '';
                  this.juicio.id_materia = '';
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.juicio = {nombre_juicio: '', estatus: '', id_materia: ''}
            },
            agregar(){

                //Valida juicio de formularios
                 if(this.juicio.nombre_juicio.trim() === '', this.juicio.estatus.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                  }

                //console.log(this.juicio.nombre_juicio, this.juicio.descripcion); 
                const params = {
                nombre_juicio: this.juicio.nombre_juicio,
                estatus: this.juicio.estatus,
                id_materia: this.juicio.id_materia
                }
                //Accion para limpiar los campos

                this.juicio.nombre_juicio = '';
                this.juicio.estatus = '';
                this.juicio.id_materia = '';
                
                axios.post('/Proyecto-CJ/public/juicios', params)     
                    .then(res => {
                        this.getResultsJuicios(this.juicios.last_page);
                    })     
            },
            confirmar(id){
              $('#exampleModalJuicios').modal("show")
              $('#id').val(id)
            },
            eliminarjuicio(op){
              if (op === "aceptar") {
                axios.delete(`/Proyecto-CJ/public/juicios/` + $("#id").val())
                  .then(()=>{
                      this.getResultsJuicios(this.juicios.current_page);
                      $('#exampleModalJuicios').modal("hide")
                  })
              }
              else{
                $('#exampleModalJuicios').modal("hide")
              }

            },
            comprobarDuplicados() {
              axios.get('/Proyecto-CJ/public/searchNombreJuicio?nombre_juicio=' + this.juicio.nombre_juicio)
                .then(response => {
                  //console.log(response.data.status)
                  if (response.data.status) {
                    $("#existeAlertaJuicio").show("slow")
                    $("#guardarjuicio").attr("disabled",true)
                  }
                  else{
                    $("#guardarjuicio").attr("disabled",false)
                    $("#existeAlertaJuicio").hide("slow")
                  }
                });
            },
       }
    }
</script>


