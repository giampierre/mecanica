<template>
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Administrar Clientes
            <input type="text" class="form-control" v-model="buscar" placeholder="Buscar por nombre">
          </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li class="dropdown">
              <button
                type="button"
                class="btn btn-primary"
                data-toggle="modal"
                data-target=".bs-example-modal-lg"
                @click="modalCrearCliente()"
              >Nuevo cliente</button>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th style="width: 80px !important;">Nombre</th>
                <th>dni</th>
                <th>Estado</th>
                <th colspan="2" class="text-center">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(cliente, index) in buscarCliente" :key="cliente.id">
                <th scope="row">{{index+1}}</th>
                <td>{{cliente.nombre}}</td>
                <td>{{cliente.dni}}</td>
                <td>
                  <span v-if="cliente.estado === '1'" class="badge badge-success">Activo</span>
                  <span v-else class="badge badge-danger">Inactivo</span>
                </td>
                <td>
                  <button type="button" class="btn btn-round btn-sm btn-warning" data-toggle="modal" data-target=".bs-example-modal-lg" @click="modalEditarCliente(cliente)">Editar</button>
                </td>
                <td>
                   <button type="button" class="btn btn-round btn-sm btn-danger" @click="eliminarCliente(cliente.id)">Eliminar</button>
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
            <h4 class="modal-title" id="myModalLabel">{{textModal}}</h4>
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div>
              <div class="x_content">
                <form id="demo-form" data-parsley-validate novalidate>
                  <label for="fullname">Nombre * :</label>
                  <input
                    v-model="dataCliente.nombre"
                    type="text"
                    id="fullname"
                    class="form-control"
                    name="fullname"
                    required
                  />
                  <br>
                  <label for="fullname">DNI * :</label>
                  <input
                    v-model="dataCliente.dni"
                    type="text"
                    id="fullname"
                    class="form-control"
                    name="fullname"
                    required
                  />

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button v-if="modoEdit" type="button" class="btn btn-primary" data-dismiss="modal" @click="actualizarCliente(dataCliente.id)">Actualizar cliente</button>
                    <button v-else type="button" class="btn btn-primary" data-dismiss="modal" @click="crearCliente()">Guardar cliente</button>
                  </div>
                </form>
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
    name: 'administrar-clientes',

    mounted(){
        let app = this;
        app.listarClientes();
    },

    data(){
        return {
            clientes:[],
            dataCliente:{},
            modoEdit: false,
            textModal: '',
            buscar: ''
        }
    },

    methods: {

        listarClientes(){

            let app = this;
            let url = 'clientes/listar';

            axios.get(url)
                .then(response => {
                    app.clientes = response.data;
                })
                .catch(error => console.log(error))
        },

        modalCrearCliente(){
            let app = this;
            app.modoEdit = false;
            app.dataCliente = {};
            app.textModal = 'Registrando cliente';
        },

        crearCliente(){

            let app = this;
            let url = 'clientes/crear';
            let nuevoCliente = app.dataCliente;
            axios.post(url, nuevoCliente)
                .then(response => {
                    new PNotify({
                        title: 'Cliente resgistrado',
                        text: 'satisfactoriamente',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    app.listarClientes();
                    app.dataCliente = {};
                })
                .catch(error => console.log(error))


        },

        modalEditarCliente(cliente){
          let app = this;
          app.modoEdit = true;
          app.dataCliente = cliente;
          app.textModal = 'Editando cliente';
        },

        actualizarCliente(id){
          let app = this;
          let url = 'clientes/actualizar/';
          let editarCliente = app.dataCliente;
          axios.put(url+id, editarCliente)
                .then(response => {
                    new PNotify({
                        title: 'Cliente actualizado',
                        text: 'satisfactoriamente',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    app.listarClientes();
                })
                .catch(error => console.log(error))
        },

        eliminarCliente(id){
          let app = this;
          let url = 'clientes/eliminar/';

          Vue.swal({ 
            title: '¿Seguro de eliminar?',
            text: "No podrá revertir esta acción",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1cbb9c',
            cancelButtonColor: '#ccc',
            confirmButtonText: 'Si, eliminar'
          }).then((result) => {
            if (result.value) {

              axios.put(url+id)
              .then(response => {
                      new PNotify({
                          title: 'Cliente eliminado',
                          text: 'satisfactoriamente',
                          type: 'success',
                          styling: 'bootstrap3'
                      });
                      app.listarClientes();
                  })
              .catch(error => console.log(error))

            }
          })
  
        }

    },

    computed: {

      buscarCliente(){
        let app = this;
        return app.clientes.filter(cliente => {
          return cliente.nombre.toLowerCase().includes(app.buscar.toLowerCase());
        })
      }

    }

    
}
</script>


