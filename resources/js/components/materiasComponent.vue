<template>
  <div>
    <div class="modal-content"> <br>
       <form @submit.prevent="editar(materia)" v-if="editarActivo">
          <h5 class="text-center"> Actualizar Información <i> (materias) </i> </h5> <br>
          <input type="text" class="form-control mb-2" placeholder="Nombre Materia" v-model="materia.nombre_materia"></input><br>

          <input type="text" class="form-control mb-2" placeholder="Estatus Materia" v-model="materia.estatus"></input><br>
          
          <center>    
          <button class="btn btn-primary" type="submit"> Actualizar </button>
          <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
          </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
          <h4 class="text-center"> Formulario materias </h4> <br>
          <input type="text" class="form-control mb-2" placeholder="Nombre Materia" v-model="materia.nombre_materia"></input><br>

          <input type="text" class="form-control mb-2" placeholder="Estatus Materia" v-model="materia.estatus"></input><br>
          
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
              <th scope="col"> Nombre - Materia </th>
              <th scope="col"> Estatus - Materia </th>
              <th scope="col"> Fecha de Registro</th>
            </tr>
            <tr v-for="(item, index) in materias" :key="index">
              <td>{{item.nombre_materia}}</td>
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
                materias: [],
                materia: {nombre_materia: '', estatus: ''},
                editarActivo: false
            }
       },
       created(){
            axios.get('/Proyecto-CJ/public/materias')
            .then(res => {
                this.materias = res.data;
            })
       },
       methods:{
            editarFormulario(item){
              this.editarActivo = true;
              this.materia.nombre_materia = item.nombre_materia;
              this.materia.estatus = item.estatus;
              this.materia.id_materia = item.id_materia;

            },
           editar(item){
              const params = {nombre_materia: item.nombre_materia, estatus: item.estatus};
              console.log("identificador " + item.id_materia)
              axios.put(`/Proyecto-CJ/public/materias/${item.id_materia}`, params)
                .then(res =>{

                  this.editarActivo = false;
                  const index = this.materias.findIndex(
                    materiaBuscar => materiaBuscar.id_materia === res.data.id_materia)

                    this.materias[index] = res.data;

                    this.materia = {nombre_materia: '', estatus: ''}

                     axios.get('/Proyecto-CJ/public/materias')
                      .then(res => {
                          this.materias = res.data;
                      })
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

                console.log(params)
                
                axios.post('/Proyecto-CJ/public/materias', params)     
                    .then(res => {
                        this.materias.push(res.data)
                        console.log(res)
                    })     
            },
            eliminar(item, index){
              console.log("identificador " + item.id_materia)
              axios.delete(`/Proyecto-CJ/public/materias/${item.id_materia}`)
                .then(()=>{
                    this.materias.splice(index, 1);
                })

            }
       }
    }
</script>

