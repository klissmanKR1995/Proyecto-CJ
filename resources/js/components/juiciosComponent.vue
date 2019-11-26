<template>
  <div>
    <div class="modal-content"> <br>
       <form @submit.prevent="editar(juicio)" v-if="editarActivo">
          <h5 class="text-center"> Actualizar Información <i> (juicios) </i> </h5> <br>
          <input type="text" class="form-control mb-2" placeholder="Nombre Juicio" v-model="juicio.nombre_juicio"></input><br>

          <input type="text" class="form-control mb-2" placeholder="Estatus Juicio" v-model="juicio.estatus"></input><br>
          
          <div class="form-group">
            <select id="id_materia" class="form-control" v-model="juicio.id_materia">
              <option value="">Distrito al que pertenece </option>
              <option v-for="(item, index) in materias" :value="item.id_materia">{{item.nombre_materia}}</option>
            </select>
          </div>

          <center>    
          <button class="btn btn-primary" type="submit"> Actualizar </button>
          <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
          </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
          <h4 class="text-center"> Formulario juicios </h4> <br>
          <input type="text" class="form-control mb-2" placeholder="Nombre Juicio" v-model="juicio.nombre_juicio"></input><br>

          <input type="text" class="form-control mb-2" placeholder="Estatus Juicio" v-model="juicio.estatus"></input><br>
         

         <div class="form-group">
            <select id="id_materia" class="form-control" v-model="juicio.id_materia">
              <option value="">Materia al que pertenece </option>
              <option v-for="(item, index) in materias" :value="item.id_materia">{{item.nombre_materia}}</option>
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
              <th scope="col"> Nombre - Juicio </th>
              <th scope="col"> Estatus - Juicio </th>
              <th scope="col"> ID - Distrito </th>
              <th scope="col"> Fecha de Registro</th>
            </tr>
            <tr v-for="(item, index) in juicios" :key="index">
              <td>{{item.nombre_juicio}}</td>
              <td>{{item.estatus}}</td>
              <td>{{item.id_materia}}</td>
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
                juicios: [],
                juicio: {nombre_juicio: '', estatus: '',id_materia: ''},
                editarActivo: false
            }
       },
       created(){
        axios.get('/Proyecto-CJ/public/materias')
            .then(res => {
                this.materias = res.data;
            }),
             axios.get('/Proyecto-CJ/public/juicios')
            .then(res => {
                this.juicios = res.data;
            })
       },
       methods:{
            editarFormulario(item){
              this.editarActivo = true;
              this.juicio.nombre_juicio = item.nombre_juicio;
              this.juicio.estatus = item.estatus;
              this.juicio.id_juicio = item.id_juicio;
              this.juicio.id_materia = item.id_materia;

            },
           editar(item){
              const params = {nombre_juicio: item.nombre_juicio, estatus: item.estatus, id_materia: item.id_materia};
              console.log("identificador " + item.id_juicio)
              axios.put(`/Proyecto-CJ/public/juicios/${item.id_juicio}`, params)
                .then(res =>{

                  this.editarActivo = false;
                  const index = this.juicios.findIndex(
                    juicioBuscar => juicioBuscar.id_juicio === res.data.id_juicio)

                    this.juicios[index] = res.data;

                    this.juicio = {nombre_juicio: '', estatus: '', id_ditrito: ''}

                     axios.get('/Proyecto-CJ/public/juicios')
                      .then(res => {
                          this.juicios = res.data;
                      })
                })
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.juicio = {nombre_juicio: '', estatus: '', id_ditrito: ''}
            },
            agregar(){

                //Valida juicio de formularios
                 if(this.juicio.nombre_juicio.trim() === '', this.juicio.estatus.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                  }

                //console.log(this.juicio.nombre_juicio, this.juicoo.descripcion); 
                const params = {
                nombre_juicio: this.juicio.nombre_juicio,
                estatus: this.juicio.estatus,
                id_materia: this.juicio.id_materia
                }
                //Accion para limpiar los campos

                this.juicio.nombre_juicio = '';
                this.juicio.estatus = '';
                this.juicio.id_materia = '';

                console.log(params)
                
                axios.post('/Proyecto-CJ/public/juicios', params)     
                    .then(res => {
                        this.juicios.push(res.data)
                        console.log(res)
                    })     
            },
            eliminar(item, index){
              console.log("identificador " + item.id_juicio)
              axios.delete(`/Proyecto-CJ/public/juicios/${item.id_juicio}`)
                .then(()=>{
                    this.juicios.splice(index, 1);
                })

            }
       }
    }
</script>

