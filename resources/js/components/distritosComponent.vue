<template>
  <div>
    <div class="modal-content"> <br>
       <form @submit.prevent="editar(distrito)" v-if="editarActivo">
          <h5 class="text-center"> Actualizar Información <i> (distritos) </i> </h5> <br>
          <input type="text" class="form-control mb-2" placeholder="Nombre Distrito" v-model="distrito.nombre_distrito"></input><br>

          <input type="text" class="form-control mb-2" placeholder="Estatus Distrito" v-model="distrito.estatus"></input><br>
          
          <center>    
          <button class="btn btn-primary" type="submit"> Actualizar </button>
          <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
          </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
          <h4 class="text-center"> Formulario distritos </h4> <br>
          <input type="text" class="form-control mb-2" placeholder="Nombre Distrito" v-model="distrito.nombre_distrito"></input><br>

          <input type="text" class="form-control mb-2" placeholder="Estatus Distrito" v-model="distrito.estatus"></input><br>
          
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
              <th scope="col"> Nombre - Distrito </th>
              <th scope="col"> Estatus - Distrito </th>
              <th scope="col"> Fecha de Registro</th>
            </tr>
            <tr v-for="(item, index) in distritos" :key="index">
              <td>{{item.nombre_distrito}}</td>
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
                distritos: [],
                distrito: {nombre_distrito: '', estatus: ''},
                editarActivo: false
            }
       },
       created(){
            axios.get('/Proyecto-CJ/public/distritos')
            .then(res => {
                this.distritos = res.data;
            })
       },
       methods:{
            editarFormulario(item){
              this.editarActivo = true;
              this.distrito.nombre_distrito = item.nombre_distrito;
              this.distrito.estatus = item.estatus;
              this.distrito.id_distrito = item.id_distrito;

            },
           editar(item){
              const params = {nombre_distrito: item.nombre_distrito, estatus: item.estatus};
              console.log("identificador " + item.id_distrito)
              axios.put(`/Proyecto-CJ/public/distritos/${item.id_distrito}`, params)
                .then(res =>{

                  this.editarActivo = false;
                  const index = this.distritos.findIndex(
                    distritoBuscar => distritoBuscar.id_distrito === res.data.id_distrito)

                    this.distritos[index] = res.data;

                    this.distrito = {nombre_distrito: '', estatus: ''}

                     axios.get('/Proyecto-CJ/public/distritos')
                      .then(res => {
                          this.distritos = res.data;
                      })
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

                console.log(params)
                
                axios.post('/Proyecto-CJ/public/distritos', params)     
                    .then(res => {
                        this.distritos.push(res.data)
                        console.log(res)
                    })     
            },
            eliminar(item, index){
              console.log("identificador " + item.id_distrito)
              axios.delete(`/Proyecto-CJ/public/distritos/${item.id_distrito}`)
                .then(()=>{
                    this.distritos.splice(index, 1);
                })

            }
       }
    }
</script>

