
<template>
  <div>
    <div class="modal-content"> <br>
       <form @submit.prevent="editar(valorescatalogo)" v-if="editarActivo">
        <h5 class="text-center"> Actualizar Información <i> (valores-variables) </i> </h5> <br>
        
        <div class="form-group">
          <select id="id_catalogo" class="form-control" v-model="valorescatalogo.id_catalogo">
            <option value="">Catalogo </option>
            <option v-for="(item, index) in catalogos" :value="item.id_catalogo">{{item.nombre_variable}}</option>
          </select>
        </div>

        <input type="text" class="form-control mb-2" placeholder="Escribe un valor para el catalogo" v-model="valorescatalogo.valor_variable"><br>
        
        <center>    
        <button class="btn btn-primary" type="submit"> Actualizar </button>
        <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
        </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
        <h4 class="text-center"> Formulario valorescatalogos </h4> <br>
        

        <div class="form-group">
          <select id="id_catalogo" class="form-control" v-model="valorescatalogo.id_catalogo">
            <option value="">Catalogos </option>
            <option v-for="(item, index) in catalogos" :value="item.id_catalogo">{{item.nombre_variable}}</option>
          </select>
        </div>

        <input type="text" class="form-control mb-2" placeholder="Escribe un valor para el catalogo" v-model="valorescatalogo.valor_variable"><br>
        
        <center>    
        <button class="btn btn-danger" type="submit"> Guardar </button> 
        </center><br>
      </form>  
    </div> <br>

    <div>
      <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col"> Nombre - Catalogo </th>
              <th scope="col"> Valor - Catalogo</th>
              <th scope="col"> Fecha - Registro</th>
            </tr>
            <tr v-for="(item, index) in valorescatalogos" :key="index">
              <td>{{item.nombre_variable}}</td>
              <td>{{item.valor_variable}}</td>
              <td> <span class="badge badge-primary"> {{item.created_at}} </span> </td>
              <td><button class="btn btn-primary" @click="editarFormulario(item)">Actualizar</button></td>
              <td><button class="btn btn-danger" @click="eliminarNota(item, index)">Eliminar</button></td>
            </tr>
        </thead>   
      </table> <br>
    </div>   
  </div>            
</template>

<script>
    export default {
       data(){
            return{
                valorescatalogos: [],
                catalogos: [],
                valorescatalogo: {id_catalogo: '', valor_variable: '' },
                editarActivo: false
            }
       },
       created(){
            axios.get('/Proyecto-CJ/public/variables')
            .then(res => {
                this.catalogos = res.data;
            }),
            axios.get('/Proyecto-CJ/public/valorescatalogos')
            .then(res => {
                this.valorescatalogos = res.data;
            })
       },

       methods:{
            editarFormulario(item){
              this.editarActivo = true;
              this.valorescatalogo.id_valor = item.id_valor;
              this.valorescatalogo.id_catalogo = item.id_catalogo;
              this.valorescatalogo.valor_variable = item.valor_variable;
            },
            editar(item){
              const params = {id_catalogo: item.id_catalogo, valor_variable: item.valor_variable };
              axios.put(`/Proyecto-CJ/public/valorescatalogos/${item.id_valor}`, params)
                .then(res =>{

                  this.editarActivo = false;
                  const index = this.valorescatalogos.findIndex(
                    notaBuscar => notaBuscar.id_valor === res.data.id_valor)

                    this.valorescatalogos[index] = res.data;

                    this.valorescatalogo = {id_catalogo: '', valor_variable: ''}

                     axios.get('/Proyecto-CJ/public/valorescatalogos')
                      .then(res => {
                          this.valorescatalogos = res.data;
                      })
                })
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.valorescatalogo = {id_catalogo: '', valor_variable: ''}
            },
            agregar(){

                //Validacion de formularios
                 if(this.valorescatalogo.valor_variable.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                  }

                //console.log(this.valorescatalogo.nombre, this.valorescatalogo.descripcion); 
                const params = {
                id_catalogo: this.valorescatalogo.id_catalogo,
                valor_variable: this.valorescatalogo.valor_variable
                }
                //Accion para limpiar los campos

                this.valorescatalogo.id_catalogo = '';
                this.valorescatalogo.valor_variable = '';


                axios.post('/Proyecto-CJ/public/valorescatalogos', params)     
                    .then(res => {
                        this.valorescatalogos.push(res.data[0])
                    })    
            },
            eliminarNota(item, index){
              axios.delete(`/Proyecto-CJ/public/valorescatalogos/${item.id_valor}`)
                .then(()=>{
                    this.valorescatalogos.splice(index, 1);
                })

            }
       }
    }
</script>

