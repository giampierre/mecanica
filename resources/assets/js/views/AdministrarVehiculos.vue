<template>
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
          <div class="x_title">
            <h2>Administrar Vehículos</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li class="dropdown">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Nuevo vehículo</button>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Placa</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(vehiculo, index) in vehiculos" :key="vehiculo.index">
                  <th scope="row">{{index+1}}</th>
                  <td>{{vehiculo.placa}}</td>
                  <td>{{vehiculo.descripcion}}</td>
                  <td>
                    <span v-if="vehiculo.estado === '1'" class="badge badge-success">Activo</span>
                    <span v-else class="badge badge-danger">Inactivo</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Modal Crear y editar -->

      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Registrando Vehículo</h4>
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div>
                  <div class="x_content">

                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate="" novalidate="">

                      <label for="fullname">Placa * :</label>
                      <input type="text" v-model="nuevoVehiculo.placa" id="fullname" class="form-control" name="fullname" required="">

                      <label for="message">Descripción :</label>
                      <textarea id="message" v-model="nuevoVehiculo.descripcion" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="guardarVehiculo()">Guardar Vehículo</button>
                      </div>

                    </form>
                    <!-- end form for validations -->

                  </div>
                </div>
            </div>

          </div>
        </div>
      </div>

    </div>
</template>

<script>
export default {

  name: 'administrar-vehiculos',

  mounted(){
    let app = this;
    app.listarVehiculos();
  },

  data(){
    return {
      nuevoVehiculo: {},
      vehiculos:[]
    }
  },

  methods: {

    listarVehiculos(){
      let app = this;
      let url = 'vehiculos/listar'
      
      axios.get(url)
        .then(response => {
          app.vehiculos = response.data;
          console.log(app.vehiculos);
        })
        .catch(error => {
          console.log(error);
        })
    },

    guardarVehiculo(){
      let app = this;
      let url = 'vehiculos/crear';

      //ARROW FUNCTIONº
      axios.post(url, app.nuevoVehiculo)
        .then(response => {
          console.log('Vehículo resgistrado satisfactoriamente');
          new PNotify({
              title: 'Vehículo resgistrado',
              text: 'satisfactoriamente',
              type: 'success',
              styling: 'bootstrap3'
          });
          app.listarVehiculos();
          app.nuevoVehiculo = {};
          })
        .catch(error => {
          new PNotify({
              title: 'Error al registrar',
              text: 'Voler a intentar',
              type: 'dager',
              styling: 'bootstrap3'
          });
        });
      
      //OR

      //NORMAL FUNCTION
      /* axios.post(url, app.nuevoVehiculo)
       .then(function(response){
          console.log('Vehículo resgistrado satisfactoriamente');
       })
       .catch(function(error){
         console.log(error);
       }) */
      
      
    }

  }

}
</script>

<style>

</style>