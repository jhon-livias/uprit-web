<template>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-12">
                            <span style="font-weight:bold; color: #20272f; font-size: 24px;">Lista de Niveles
                                Académicos</span>
                            <button class="btn btn-success" @click="showNuevo" style="float: right; color: white;">
                                <i class="icon-plus"></i> <span> Nuevo Nivel</span>
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
                                                    <th style="text-align: center">Nombre</th>
                                                    <th style="text-align: center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr v-for="(item, index) in niveles" :key="item.id">
                                                    <td style="text-align: center">{{ index + 1 }}</td>
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
                            <div class="modal fade" id="mdlNuevoNivel" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <form v-on:submit.prevent="storeNivel()" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Agregar Nivel Académico</h4> <button
                                                    type="button" data-dismiss="modal" aria-label="Close"
                                                    class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Nombre<span style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="nivel.nombre" required
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
                            <div class="modal fade" id="modEditarNivel" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <form v-on:submit.prevent="updateNivel()" enctype="multipart/form-data">

                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar Nivel Académico</h4>
                                                <button type="button" data-dismiss="modal" aria-label="Close"
                                                    class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                                <label>Nombre<span style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="nivel.nombre" required
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
            niveles: [],
            nivel: {}
        }
    },
    mounted() {
        this.getNiveles();
    },
    methods: {
        resetForm() {
            this.nivel = {
                id: null,
                nombre: ''
            };
        },
        getNiveles() {
            axios.get(route('niveles.get')).then((response) => {
                this.destroyDatatable();
                this.niveles = response.data;
                this.initDatatable();
            }).catch(error => {
                console.log('Error en el Servidor');
            })
        },
        showNuevo() {
            this.resetForm();
            $("#mdlNuevoNivel").modal('show');
        },

        storeNivel() {
            let formData = new FormData();
            formData.append('nombre', this.nivel.nombre);
            axios.post(route('niveles.store'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'NIVEL AGREGADO',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.getNiveles();
                    $('#mdlNuevoNivel').modal('hide');
                    this.resetForm();
                } else {
                    toastr.warning("No se pudo registrar el Nivel");
                }
            }).catch(error => {
                toastr.error("No se pudo registrar el Nivel, problema de servidor");
                console.log(error);
            });
        },
        showEdit(item) {
            this.nivel = { ...item };

            $("#modEditarNivel").modal('show');
        },
        updateNivel() {
            let formData = new FormData();
            formData.append('id', this.nivel.id);
            formData.append('nombre', this.nivel.nombre);
            axios.post(route('niveles.edit'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'NIVEL EDITADO',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.destroyDatatable();
                    this.getNiveles();
                    this.initDatatable();
                    $("#modEditarNivel").modal('hide');
                    this.resetForm();
                } else {
                    toastr.error('No se actualizo el Nivel');
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
                    axios.post(route('niveles.delete', id))
                        .then((response) => {
                            if (response.data) {
                                this.getNiveles();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'NIVEL ELIMINADO',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                this.resetForm();
                            } else {
                                toastr.warning("No se pudo eliminar el Nivel");
                            }
                        }).catch(error => {
                            toastr.error("Error al eliminar el Nivel");
                            console.log(error);
                        });
                }
            });
        },
    }
}
</script>