<template>
  <div>
    <div class="modal-content"> <br>
       <form @submit.prevent="editar(juzgado)" v-if="editarActivo">
          <h5 class="text-center"> Actualizar Información <i> (juzgados) </i> </h5> <br>
          <input type="text" class="form-control mb-2" placeholder="Nombre Juzgado" v-model="juzgado.nombre_juzgado"></input><br>

          <input type="text" class="form-control mb-2" placeholder="Estatus Juzgado" v-model="juzgado.estatus"></input><br>
          
          <div class="form-group">
            <select id="id_distrito" class="form-control" v-model="juzgado.id_distrito">
              <option value="">Distrito al que pertenece </option>
              <option v-for="(item, index) in distritos" :value="item.id_distrito">{{item.nombre_distrito}}</option>
            </select>
          </div>

          <center>    
          <button class="btn btn-primary" type="submit"> Actualizar </button>
          <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
          </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
          <h4 class="text-center"> Formulario juzgados </h4> <br>
          <input type="text" class="form-control mb-2" placeholder="Nombre Juzgado" v-model="juzgado.nombre_juzgado"></input><br>

          <input type="text" class="form-control mb-2" placeholder="Estatus Juzgado" v-model="juzgado.estatus"></input><br>
         

         <div class="form-group">
            <select id="id_distrito" class="form-control" v-model="juzgado.id_distrito">
              <option value="">Distrito al que pertenece </option>
              <option v-for="(item, index) in distritos" :value="item.id_distrito">{{item.nombre_distrito}}</option>
            </select>
          </div>
          <center>    
          <button class="btn btn-danger" type="submit"> Guardar </button> 
          </center><br>
      </form>  
    </div>

    <br>

    <div>
      <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col"> Nombre - Juzgado </th>
              <th scope="col"> Estatus - Juzgado </th>
              <th scope="col"> ID - Distrito </th>
              <th scope="col"> Fecha de Registro</th>
            </tr>
            <tr v-for="(item, index) in juzgados" :key="index">
              <td>{{item.nombre_juzgado}}</td>
              <td>{{item.estatus}}</td>
              <td>{{item.id_distrito}}</td>
              <td> <span class="badge badge-primary"> {{item.created_at}} </span> </td>
              <td><button class="btn btn-primary" @click="editarFormulario(item)">Actualizar</button></td>
              <td><button class="btn btn-danger" @click="eliminar(item, index)">Eliminar</button></td>
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
                distritos: [],
                juzgados: [],
                juzgado: {nombre_juzgado: '', estatus: '',id_distrito: ''},
                editarActivo: false
            }
       },
       created(){
        axios.get('/Proyecto-CJ/public/distritos')
            .then(res => {
                this.distritos = res.data;
            }),
             axios.get('/Proyecto-CJ/public/juzgados')
            .then(res => {
                this.juzgados = res.data;
            })
       },
       methods:{
            editarFormulario(item){
              this.editarActivo = true;
              this.juzgado.nombre_juzgado = item.nombre_juzgado;
              this.juzgado.estatus = item.estatus;
              this.juzgado.id_juzgado = item.id_juzgado;
              this.juzgado.id_distrito = item.id_distrito;

            },
           editar(item){
              const params = {nombre_juzgado: item.nombre_juzgado, estatus: item.estatus, id_distrito: item.id_distrito};
              console.log("identificador " + item.id_juzgado)
              axios.put(`/Proyecto-CJ/public/juzgados/${item.id_juzgado}`, params)
                .then(res =>{

                  this.editarActivo = false;
                  const index = this.juzgados.findIndex(
                    juzgadoBuscar => juzgadoBuscar.id_juzgado === res.data.id_juzgado)

                    this.juzgados[index] = res.data;

                    this.juzgado = {nombre_juzgado: '', estatus: '', id_ditrito: ''}

                     axios.get('/Proyecto-CJ/public/juzgados')
                      .then(res => {
                          this.juzgados = res.data;
                      })
                })
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

                console.log(params)
                
                axios.post('/Proyecto-CJ/public/juzgados', params)     
                    .then(res => {
                        this.juzgados.push(res.data)
                        console.log(res)
                    })     
            },
            eliminar(item, index){
              console.log("identificador " + item.id_juzgado)
              axios.delete(`/Proyecto-CJ/public/juzgados/${item.id_juzgado}`)
                .then(()=>{
                    this.juzgados.splice(index, 1);
                })

            }
       }
    }
</script>

