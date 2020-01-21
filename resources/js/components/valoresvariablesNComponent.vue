<template>
  <div>
    <div class="modal-content"> <br>
       <form @submit.prevent="editar(valorescatalogo)" v-if="editarActivo">
        <h5 class="text-center"> Actualizar Información <i> (Valores-Variables) </i> </h5> <br>
        
        <div class="form-group">
          <select id="id_catalogo" class="form-control" v-model="valorescatalogo.id_catalogo">
            <option value="">Catalogo </option>
            <option v-for="(item, index) in catalogos" :value="item.id_catalogo">{{item.nombre_variable}}</option>
          </select>
        </div>

        <input type="text" class="form-control mb-2" placeholder="Escribe un valor para el catalogo" v-model="valorescatalogo.valor_variable" @blur="comprobarDuplicados"><br>
        
        <center>  
        <div class="alert alert-danger" role="alert" id="existeAlertaValores">
            Registro existente, verifique la información a almacenar
        </div>   
        <button class="btn btn-primary" type="submit" id="guardarvalorescatalogo"> Actualizar </button>
        <button class="btn btn-danger" type="submit" @click="cancelarEdicion()"> Cancelar </button>
        </center> <br>
      </form>  

      <form @submit.prevent="agregar" v-else>
        <h4 class="text-center"> Formulario Valores-Variables </h4> <br>
        

        <div class="form-group">
          <select id="id_catalogo" class="form-control" v-model="valorescatalogo.id_catalogo">
            <option value="">Catalogos </option>
            <option v-for="(item, index) in catalogos" :value="item.id_catalogo">{{item.nombre_variable}}</option>
          </select>
        </div>

        <input type="text" class="form-control mb-2" placeholder="Escribe un valor para el catalogo" v-model="valorescatalogo.valor_variable" @blur="comprobarDuplicados"><br>
        
        <center>    
        <div class="alert alert-danger" role="alert" id="existeAlertaValores">
            Registro existente, verifique la información a almacenar
        </div> 
        <button class="btn btn-danger" type="submit" id="guardarvalorescatalogo"> Guardar </button> 
        </center><br>
      </form>  
    </div> <br>

    <div class="container">
      <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col"> Nombre - Catalogo </th>
              <th scope="col"> Valor - Catalogo</th>
              <th scope="col"> Fecha - Registro</th>
              <th scope="col"> <input type="text" class="form-control" name="buscar" id="buscar"  @keyup="buscarDato()" placeholder="Buscar"> </th>
            </tr>
            <tr v-for="(item, index) in valorescatalogos.data" :key="index">
              <td>{{item.nombre_variable}}</td>
              <td>{{item.valor_variable}}</td>
              <td> <span class="badge badge-primary"> {{item.created_at}} </span> </td>
              <td><button class="btn btn-primary" @click="editarFormulario(item)">Actualizar</button></td>
              <td><button class="btn btn-danger" @click="confirmar(item.id_valor)">Eliminar</button></td>
            </tr>
        </thead>   
      </table> 


       <!-- Paginador -->
      <pagination :data="valorescatalogos" @pagination-change-page="getResultsValores">
      </pagination>
    </div>   
     <!-- Modal -->
     <div class="modal fade" id="exampleModalvaloresVariables" tabindex="-1" role="dialog" aria-labelledby="exampleModalvaloresVariablesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalvaloresVariablesLabel">Confirmar elminación</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id" id="id">
              ¿Estas seguro(a) de eliminar el registro seleccionado?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal" @click="eliminarValoresCatalogo('cancelar')">Cancelar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal" @click="eliminarValoresCatalogo('aceptar')">Eliminar</button>
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
                catalogos: {},
                valorescatalogos: {},
                valorescatalogo: {id_catalogo: '', valor_variable: '' },
                editarActivo: false
            }
       },
       mounted: function () { 
        // Fetch initial results
        this.getResultsValores();
        $("#existeAlertaValores").hide()
      },
       created(){
        axios.get('/Proyecto-CJ/public/catalogosAll')
            .then(res => {
                this.catalogos = res.data;
            }),
             axios.get('/Proyecto-CJ/public/valorescatalogos')
            .then(res => {
                this.valorescatalogos = res.data;
            })
       },
       methods:{
            getResultsValores(page = 1) {
              if ($("#buscar").val().length !== 0) {
                axios.get('/Proyecto-CJ/public/valorescatalogos?page=' + page + '&buscar=' + $("#buscar").val())
                  .then(response => {
                    this.valorescatalogos = response.data;
                  });
              }
              else{
                axios.get('/Proyecto-CJ/public/valorescatalogos?page=' + page)
                  .then(response => {
                    this.valorescatalogos = response.data;
                  });
              }
            },
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
                  $("#buscar").val('')
                  this.getResultsValores(this.valorescatalogos.current_page);
                })
                  this.valorescatalogo.id_catalogo = '';
                  this.valorescatalogo.valor_variable = '';
            },
            cancelarEdicion(){
              this.editarActivo = false;
              this.valorescatalogo = {id_catalogo: '', valor_variable: ''}
            },
            agregar(){

                //Valida valorescatalogo de formularios
                 if(this.valorescatalogo.valor_variable.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                  }

                //console.log(this.valorescatalogo.id_catalogo, this.valorescatalogo.descripcion); 
                const params = {
                id_catalogo: this.valorescatalogo.id_catalogo,
                valor_variable: this.valorescatalogo.valor_variable
                }
                //Accion para limpiar los campos

                this.valorescatalogo.id_catalogo = '';
                this.valorescatalogo.valor_variable = '';
                
                axios.post('/Proyecto-CJ/public/valorescatalogos', params)     
                    .then(res => {
                      $("#buscar").val('')
                        this.getResultsValores(this.valorescatalogos.last_page);
                    })     
            },
            confirmar(id){
              $('#exampleModalvaloresVariables').modal("show")
              $('#id').val(id)
            },
            eliminarValoresCatalogo(op){
              if (op === "aceptar") {
                axios.delete(`/Proyecto-CJ/public/valorescatalogos/` + $("#id").val())
                  .then(()=>{
                      this.getResultsValores(this.valorescatalogos.current_page);
                      $("#buscar").val('')
                      $('#exampleModalvaloresVariables').modal("hide")
                  })
              }
              else{
                $('#exampleModalvaloresVariables').modal("hide")
              }

            },
            comprobarDuplicados() {
              axios.get('/Proyecto-CJ/public/searchNombreValores?valor_variable=' + this.valorescatalogo.valor_variable)
                .then(response => {
                  //console.log(response.data.status)
                  if (response.data.status) {
                    $("#existeAlertaValores").show("slow")
                    $("#guardarvalorescatalogo").attr("disabled",true)
                  }
                  else{
                    $("#guardarvalorescatalogo").attr("disabled",false)
                    $("#existeAlertaValores").hide("slow")
                  }
                });
            },
            buscarDato(){
              this.getResultsValores(1);
            },
       }
    }
</script>



