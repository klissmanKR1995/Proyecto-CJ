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

          <div class="container"> 


            <div class="form-group">
              <select id="id_expediente" class="form-control" v-model="modulouno.id_expediente">
                <option value="">Número de expediente </option>
                <option v-for="(item, index) in expedientes" :value="item.id_expediente">{{item.numero_expediente}}</option>
              </select>
            </div>

            
            <div class="form-row">
              <div class="col-md-4">
                <label for="inputState">Pais de nacimiento</label>
                <vue-select class="vue-select1" name="id_valor" label="valor_variable" :options='
                  paises' :model.sync="result1" v-model="modulouno.municipios"></vue-select>
              </div>
              <div class="col-md-4">
                <label for="inputState">Estado de nacimiento</label>
                <vue-select class="vue-select1" name="id_valor" label="valor_variable" :options='
                  estados' :model.sync="result1" v-model="modulouno.estados"></vue-select>
              </div>
            </div> 

          </div>
            
            
          <br>
          <center>    
          <button class="btn btn-danger" type="submit"> Guardar Registro </button> 
          </center><br>
      </form>  
    </div>

    <br>

    <table class="table table-striped">
      <thead>
          <tr>
            <th scope="col"> Número de expediente </th>
            <th scope="col"> Pais </th>
            <th scope="col"> Estados </th>
            <th scope="col"> Fecha de Registro</th>
          </tr>
          <tr v-for="(item, index) in modulounos" :key="index">
            <td>{{item.numero_expediente}}</td>
            <td>{{item.municipios}}</td>
            <td>{{item.estados}}</td>
            <td> <span class="badge badge-primary"> {{item.created_at}} </span> </td>
            <td><button class="btn btn-primary" @click="editarFormulario(item)">Actualizar</button></td>
            <td><button class="btn btn-danger" @click="confirmar(item.id_juzgado)">Eliminar</button></td>
          </tr>
      </thead>   
    </table> 

    <div>
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
                modulouno: {id_expediente: '', municipios: '',estados: ''},
                paises: [] ,
                estados: [] ,
                editarActivo: false,
                result1: ""
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
            }),
            axios.get('/Proyecto-CJ/public/getCatalogos?id_catalogo=4')
            .then(res => {
                this.paises = res.data;
            }),
            axios.get('/Proyecto-CJ/public/getCatalogos?id_catalogo=1')
            .then(res => {
                this.estados = res.data;
            })
       },
        methods:{
            getResults(page = 1) {
              axios.get('/Proyecto-CJ/public/modulouno?page=' + page)
                .then(response => {
                  this.modulounos = response.data;
                });
            },
            editarFormulario(item){
              this.editarActivo = true;
              this.modulouno.id_expediente = item.id_expediente;
              this.modulouno.municipios = item.municipios;
              this.modulouno.estados = item.estados;
              this.modulouno.id_modulo = item.id_modulo;

            },
           editar(item){
              const params = {id_expediente: item.id_expediente, municipios: item.municipios, estados: item.estados};
              axios.put(`/Proyecto-CJ/public/modulouno/${item.id_modulouno}`, params)
                .then(res =>{
                  this.editarActivo = false;
                  this.getResults(this.modulounos.current_page);
                })
                  this.modulouno.id_expediente = '';
                  this.modulouno.municipios = '';
                  this.modulouno.estados = '';
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.modulouno = {id_expediente: '', municipios: '', estados: ''}
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
                municipios: this.modulouno.municipios.valor_variable,
                estados: this.modulouno.estados.valor_variable
                }
                //Accion para limpiar los campos

                this.modulouno.id_expediente = '';
                this.modulouno.municipios = '';
                this.modulouno.estados = '';
                
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
              $('#exampleModal1').modal("show")
              $('#id').val(id)
            },
            eliminarmodulouno(op){
              if (op === "aceptar") {
                axios.delete(`/Proyecto-CJ/public/modulouno/` + $("#id").val())
                  .then(()=>{
                      this.getResults(this.modulounos.current_page);
                      $('#exampleModal1').modal("hide")
                  })
              }
              else{
                $('#exampleModal1').modal("hide")
              }

            },
            comprobarDuplicados() {
              axios.get('/Proyecto-CJ/public/searchNombremodulouno?nombre_modulouno=' + this.modulouno.nombre_modulouno)
                .then(response => {
                  //console.log(response.data.status)
                  if (response.data.status) {
                    $("#existeAlerta2").show("slow")
                    $("#guardarmodulouno").attr("disabled",true)
                  }
                  else{
                    $("#guardarmodulouno").attr("disabled",false)
                    $("#existeAlerta2").hide("slow")
                  }
                });
            },
       }
    }
</script>


