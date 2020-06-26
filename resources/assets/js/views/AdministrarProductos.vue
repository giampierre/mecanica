<template>
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Administrar Articulos</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li class="dropdown">
              <button
                type="button"
                class="btn btn-primary"
                data-toggle="modal"
                data-target=".bs-example-modal-lg"
              >Nuevo</button>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="x_content">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Codigo</th>
              <th>Articulo</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(articulo,index ) in articulos" :key="articulo.index">
              <th scope="row">{{index+1}}</th>
              <td>{{articulo.codigo}}</td>
              <td>{{articulo.nombre}}</td>
              <td>{{articulo.descripcion}}</td>
              <td>{{articulo.precio}}</td>
              <td>
                <span v-if="articulo.estado === '1'" class="badge badge-success">Activo</span>
                <span v-else class="badge badge-danger">Inactivo</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Añadiendo Articulo</h4>
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
            </button>
          </div>

          <div class="modal-body">
            <div>
              <div class="x_content">
                <form class="form-horizontal form-label-left" novalidate>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                      Codigo
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                      <input
                        id="name"
                        class="form-control"
                        data-validate-length-range="6"
                        data-validate-words="2"
                        name="name"
                        type="text"
                        v-model="nuevoArticulo.codigo"
                      />
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                      Articulo
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                      <input
                        id="name"
                        class="form-control"
                        data-validate-length-range="6"
                        d
                        ata-validate-words="2"
                        name="name"
                        type="text"
                        v-model="nuevoArticulo.nombre"
                      />
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                      Precio
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                      <input
                        id="name"
                        class="form-control"
                        data-validate-length-range="6"
                        data-validate-words="2"
                        name="name"
                        v-model="nuevoArticulo.precio"
                        type="text"
                      />
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                      Descripcion
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                      <textarea
                        id="textarea"
                        required="required"
                        v-model="nuevoArticulo.descripcion"
                        name="textarea"
                        class="form-control"
                      ></textarea>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 offset-md-3">
                      <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                      <button
                        id="send"
                        class="btn btn-success"
                        data-dismiss="modal"
                        @click="agregarArticulo()"
                      >Guardar</button>
                    </div>
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
  name: "agregar-articulos",
  mounted() {
    let app = this;
    app.listarArticulos();
  },
  data() {
    return {
      nuevoArticulo: {},
      articulos: []
    };
  },
  methods: {
    agregarArticulo() {
      let app = this;
      let url = "articulos/crear";
      axios
        .post(url, app.nuevoArticulo)
        .then(response => {
          console.log("articulo registrado");
          new PNotify({
            title: "Articulo resgistrado",
            text: "Correctamente",
            type: "success",
            styling: "bootstrap3"
          });
        })
        .catch(error => {
          console.log("error");
          new PNotify({
            title: "Error al Registrar",
            text: "Articulo no registro",
            type: "success",
            styling: "bootstrap3"
          });
        });
      app.listarArticulos();
      app.nuevoArticulo = {};
    },
    listarArticulos() {
      let app = this;
      let url = "articulos/listar";
      axios
        .get(url)
        .then(response => {
          app.articulos = response.data;
          console.log(app.articulos);
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>

<style>
</style>