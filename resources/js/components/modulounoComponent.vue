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
            <div class="form-row">
              <div class="col-md-4">
                <label for="inputState">Datos de las partes</label>
                <select id="inputState" class="form-control">
                  <option selected>Seleccionar</option>
                  <option>Parte actora</option>
                  <option>Parte demandada</option>
                  <option>Tercero interesado</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="inputState">Persona</label>
                <select id="inputState" class="form-control">
                  <option selected>Seleccionar</option>
                  <option>Fisica</option>
                  <option>Moral</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="inputState">Razon Social</label>
                <input type="text" class="form-control">
              </div>
            </div> <br>

             <div class="form-row">
              <div class="col-md-4">
                <label for="inputState">Nombre Comercial</label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-4">
               <label for="inputState">Nombre Completo</label>
               <input type="text" class="form-control">
              </div>
              <div class="col-md-4">
                <label for="inputState">Sexo</label>
                <select id="inputState" class="form-control">
                  <option selected>Seleccionar</option>
                  <option>Femenino</option>
                  <option>Masculino</option>
                  <option>Transgenero femenino</option>
                  <option>Transgenero masculino</option>
                </select>
              </div>
            </div> <br>

            <div class="form-row">
              <div class="col-md-4">
                <label for="inputState">Fecha de nacimiento</label>
                <input type="date" class="form-control">
              </div>
              <div class="col-md-4">
               <label for="inputState">RFC</label>
               <input type="text" class="form-control">
              </div>
              <div class="col-md-4">
               <label for="inputState">CURP</label>
               <input type="text" class="form-control">
              </div>
            </div> <br>

            <div class="form-row">
              <div class="col-md-4">
                <label for="inputState">Pais de nacimiento</label>
                <vue-select class="vue-select1" name="id_valor" label="valor_variable" :options='
                  paises' :model.sync="result1"></vue-select>
              </div>
              <div class="col-md-4">
                <label for="inputState">Estado de nacimiento</label>
                <vue-select class="vue-select1" name="id_valor" label="valor_variable" :options='
                  estados' :model.sync="result1"></vue-select>
              </div>
              <div class="col-md-4">
                <label for="inputState">Municipio de nacimiento</label>
                <vue-select class="vue-select1" name="id_valor" label="valor_variable" :options='
                  municipios' :model.sync="result1"></vue-select>
              </div>
            </div> <br>




          </div>
            
            

          <center>    
          <button class="btn btn-danger" type="submit"> Guardar Registro </button> 
          </center><br>
      </form>  
    </div>

    <br>

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
                paises: [],
                estados: [],
                municipios: [],
                expedientes: [],
                juicios: [],
                modelouno: {id_valor: ''},
                editarActivo: false,
                result1: ""
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
            }),
            axios.get('/Proyecto-CJ/public/getCatalogos?id_catalogo=4')
            .then(res => {
                this.paises = res.data;
            }),
            axios.get('/Proyecto-CJ/public/getCatalogos?id_catalogo=1')
            .then(res => {
                this.estados = res.data;
            }),
            axios.get('/Proyecto-CJ/public/getCatalogos?id_catalogo=2')
            .then(res => {
                this.municipios = res.data;
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