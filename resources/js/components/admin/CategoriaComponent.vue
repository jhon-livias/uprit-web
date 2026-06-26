<template>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-12">
                            <span style="font-weight:bold; color: #20272f; font-size: 24px;">Lista de Categorías</span>
                            <button type="button" class="btn btn-success" @click="showNuevo" style="float: right; color: white;">
                                <i class="icon-plus"></i> <span> Nueva Categoría</span>
                            </button>

                        </div>

                        <div class="col-12 tab-content padding-0">

                            <div class="tab-pane active" id="español">
                                <div class="body">
                                    <div class="table-responsive" style="padding-top: 20px;">

                                        <table class="table table-hover js-basic-example table-striped">
                                            <thead style="color: #fff; background-color: #545b62;">
                                                <tr>
                                                    <th style="text-align: center">#</th>
                                                    <th style="text-align: center">Nivel Académico</th>
                                                    <th style="text-align: center">Categoría Padre</th>
                                                    <th style="text-align: center">Nombre</th>

                                                    <th style="text-align: center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr v-for="(item, index) in categorias" :key="item.id">
                                                    <td style="text-align: center">{{ index + 1 }}</td>
                                                    <td style="text-align: center">{{ item.nivel_academico.nombre}}
                                                    </td>
                                                    <td style="text-align: center">{{ item.padre ? item.padre.nombre
                                                        : '-' }}</td>
                                                    <td style="text-align: center">{{ item.nombre }}</td>

                                                    <td style="text-align: center" class="text-nowrap">
                                                        <a href="javascript:;" @click="showEdit(item)"
                                                            class="btn btn-info esp-dere" title="Editar">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <a href="javascript:;" @click="eliminar(item.id)"
                                                            class="btn btn-danger">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="mdlNuevaCategoria" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <form v-on:submit.prevent="storeCategoria()" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Agregar Categoría</h4> <button type="button"
                                                    data-dismiss="modal" aria-label="Close" class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Nivel Académico<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <select v-model="categoria.nivel_academico_id" required
                                                                    class="form-control">
                                                                    <option value="">Seleccionar Nivel</option>

                                                                    <option v-for="nivel in niveles" :key="nivel.id"
                                                                        :value="nivel.id">
                                                                        {{ nivel.nombre }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Categoría Padre</label>
                                                                <select v-model="categoria.padre_id"
                                                                    class="form-control">
                                                                    <option value="">
                                                                        Seleccionar Categoría Padre
                                                                    </option>

                                                                    <option v-for="cat in categorias" :key="cat.id"
                                                                        :value="cat.id">
                                                                        {{ cat.nombre }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Nombre<span style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="categoria.nombre" required
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modlEditarCategoria" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <form v-on:submit.prevent="updateCategoria()" enctype="multipart/form-data">

                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar Categoría</h4>
                                                <button type="button" data-dismiss="modal" aria-label="Close"
                                                    class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Nivel
                                                                    Académico<span style="color: red;">
                                                                        *</span></label>
                                                                <select v-model="categoria.nivel_academico_id" required
                                                                    class="form-control">
                                                                    <option value="">
                                                                        Seleccionar Nivel
                                                                    </option>

                                                                    <option v-for="nivel in niveles" :key="nivel.id"
                                                                        :value="nivel.id">
                                                                        {{ nivel.nombre }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Categoría
                                                                    Padre</label>
                                                                <select v-model="categoria.padre_id"
                                                                    class="form-control">
                                                                    <option value="">
                                                                        Seleccionar Categoría Padre
                                                                    </option>

                                                                    <option v-for="cat in categorias" :key="cat.id"
                                                                        :value="cat.id">
                                                                        {{ cat.nombre }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                                <label>Nombre<span style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="categoria.nombre" required class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            categorias: [],
            niveles: [],
            categoria: {}
        }
    },
    mounted() {
        this.getCategorias();
        this.getNiveles();
    },
    methods: {
        resetForm() {
            this.categoria = {
                id: null,
                nivel_academico_id: '',
                padre_id: '',
                nombre: '',
            };
        },
        getNiveles() {
            axios.get(route('niveles.get')).then((response) => {

                this.niveles = response.data;
            }).catch(error => {
                console.log('Error en el Servidor');
            })
        },
        getCategorias() {
            axios.get(route('categorias.get')).then((response) => {
                this.destroyDatatable();
                this.categorias = response.data;
                this.initDatatable();
            }).catch(error => {
                console.log('Error en el Servidor');
            })
        },
        showNuevo() {
            this.resetForm();
            $("#mdlNuevaCategoria").modal('show');
        },

        storeCategoria() {
            let formData = new FormData();
            formData.append('nivel_academico_id', this.categoria.nivel_academico_id);
            formData.append('padre_id', this.categoria.padre_id);
            formData.append('nombre', this.categoria.nombre);
            axios.post(route('categorias.store'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'CATEGORÍA AGREGADA',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.getCategorias();
                    $('#mdlNuevaCategoria').modal('hide');
                    this.resetForm();
                } else {
                    toastr.warning("No se pudo registrar la Categoría");
                }
            }).catch(error => {
                toastr.error("No se pudo registrar la Categoría, problema de servidor");
                console.log(error);
            });
        },
        showEdit(item) {
            this.categoria = { ...item };

            $("#modlEditarCategoria").modal('show');
        },
        updateCategoria() {
            let formData = new FormData();
            formData.append('id', this.categoria.id);
            formData.append('nivel_academico_id', this.categoria.nivel_academico_id);
            formData.append('padre_id', this.categoria.padre_id);
            formData.append('nombre', this.categoria.nombre);
            axios.post(route('categorias.edit'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'CATEGORÍA EDITADA',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.destroyDatatable();
                    this.getCategorias();
                    this.initDatatable();
                    $("#modlEditarCategoria").modal('hide');
                    this.resetForm();
                } else {
                    toastr.error('No se actualizo la Categoría');
                }
            }).catch((error) => {
                console.log(error);
            });
        },
        eliminar(id) {
            Swal.fire({
                title: 'Estas seguro?',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar!'
            }).then((result) => {
                if (result.value) {
                    axios.post(route('categorias.delete', id))
                        .then((response) => {
                            if (response.data) {
                                this.getCategorias();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'CATEGORÍA ELIMINADA',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                this.resetForm();
                            } else {
                                toastr.warning("No se pudo eliminar la Categoría");
                            }
                        }).catch(error => {
                            toastr.error("Error al eliminar la Categoría");
                            console.log(error);
                        });
                }
            });
        },
    }
}
</script>