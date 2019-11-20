<template>
  <div>
    <div class="modal-content"> <br>
       <form @submit.prevent="editar(catalogo)" v-if="editarActivo">
          <h5 class="text-center"> Actualizar Información <i> (catalogos) </i> </h5> <br>
          <input type="text" class="form-control mb-2" placeholder="Nombre Variable" v-model="catalogo.nombre_variable"></input><br>

          <input type="text" class="form-control mb-2" placeholder="Estatus Variable" v-model="catalogo.estatus"></input><br>
          
          <center>    
          <button class="btn btn-primary" type="submit"> Actualizar </button>
          <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
          </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
          <h4 class="text-center"> Formulario catalogos </h4> <br>
          <input type="text" class="form-control mb-2" placeholder="Nombre Variable" v-model="catalogo.nombre_variable"></input><br>

          <input type="text" class="form-control mb-2" placeholder="Estatus Variable" v-model="catalogo.estatus"></input><br>
          
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
              <th scope="col"> Nombre - Variable </th>
              <th scope="col"> Estatus - Variable </th>
              <th scope="col"> Fecha de Registro</th>
            </tr>
            <tr v-for="(item, index) in catalogos" :key="index">
              <td>{{item.nombre_variable}}</td>
              <td>{{item.estatus}}</td>
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
                catalogos: [],
                catalogo: {nombre_variable: '', estatus: ''},
                editarActivo: false
            }
       },
       created(){
            axios.get('/Proyecto-CJ/public/variables')
            .then(res => {
                this.catalogos = res.data;
            })
       },
       methods:{
            editarFormulario(item){
              this.editarActivo = true;
              this.catalogo.nombre_variable = item.nombre_variable;
              this.catalogo.estatus = item.estatus;
              this.catalogo.id_catalogo = item.id_catalogo;

            },
           editar(item){
              const params = {nombre_variable: item.nombre_variable, estatus: item.estatus};
              console.log("identificador " + item.id_catalogo)
              axios.put(`/Proyecto-CJ/public/variables/${item.id_catalogo}`, params)
                .then(res =>{

                  this.editarActivo = false;
                  const index = this.catalogos.findIndex(
                    catalogoBuscar => catalogoBuscar.id_catalogo === res.data.id_catalogo)

                    this.catalogos[index] = res.data;

                    this.catalogo = {nombre_variable: '', estatus: ''}

                     axios.get('/Proyecto-CJ/public/variables')
                      .then(res => {
                          this.catalogos = res.data;
                      })
                })
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.catalogo = {nombre_variable: '', estatus: ''}
            },
            agregar(){

                //Validcatalogosacion de formularios
                 if(this.catalogo.nombre_variable.trim() === '', this.catalogo.estatus.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                  }

                //console.log(this.catalogo.nombre_variable, this.catalogo.descripcion); 
                const params = {
                nombre_variable: this.catalogo.nombre_variable,
                estatus: this.catalogo.estatus
                }
                //Accion para limpiar los campos

                this.catalogo.nombre_variable = '';
                this.catalogo.estatus = '';

                console.log(params)
                
                axios.post('/Proyecto-CJ/public/variables', params)     
                    .then(res => {
                        this.catalogos.push(res.data)
                        console.log(res)
                    })     
            },
            eliminar(item, index){
              console.log("identificador " + item.id_catalogo)
              axios.delete(`/Proyecto-CJ/public/variables/${item.id_catalogo}`)
                .then(()=>{
                    this.catalogos.splice(index, 1);
                })

            }
       }
    }
</script>

