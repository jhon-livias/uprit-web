<template>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-12">
                            <span style="font-weight:bold; color: #20272f; font-size: 24px;">Lista de Testimonios</span>
                            <button type="button" class="btn btn-success" @click="showNuevo"
                                style="float: right; color: white;">
                                <i class="icon-plus"></i> <span> Nuevo Testimonio</span>
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
                                                    <th style="text-align: center">Profesión</th>
                                                    <th style="text-align: center">Calificación</th>
                                                    <th style="text-align: center">Comentario</th>
                                                    <th style="text-align: center">Imagen</th>
                                                    <th style="text-align: center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr v-for="(item, index) in testimonios" :key="item.id">
                                                    <td style="text-align: center">{{ index + 1 }}</td>
                                                    <td style="text-align: center">{{ item.nombre }}</td>
                                                    <td style="text-align: center">{{ item.profesion }}</td>
                                                    <td style="text-align: center">
                                                        <i v-for="i in 5" :key="i" :class="i <= item.calificacion
                                                            ? 'fa fa-star text-warning'
                                                            : 'fa fa-star-o text-muted'"></i>
                                                    </td>
                                                    <td
                                                        style="text-align: center; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                        {{ item.comentario }}</td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <img v-if="item.imagen"
                                                            :src="asset('testimonios_imagenes/' + item.imagen)"
                                                            alt="Imagen" width="80"
                                                            style="border-radius: 8px; object-fit: cover; border: 1px solid #ddd;">

                                                        <span v-else class="text-muted">
                                                            No disponible
                                                        </span>
                                                    </td>


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
                            <div class="modal fade" id="mdlNuevoTestimonio" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <form v-on:submit.prevent="storeTestimonio()" enctype="multipart/form-data">

                                            <div class="modal-header">
                                                <h4 class="modal-title">Agregar Testimonio</h4> <button type="button"
                                                    data-dismiss="modal" aria-label="Close" class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-5  ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Nombre<span style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="testimonio.nombre" required
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5 mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Profesión</label>
                                                                <input type="text" v-model="testimonio.profesion"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                                <label>Calificación: </label>

                                                                <div class="rating-stars">
                                                                    <template v-for="i in [5, 4, 3, 2, 1]" :key="i">
                                                                        <input type="radio" :id="'star' + i"
                                                                            v-model="testimonio.calificacion"
                                                                            :value="i">

                                                                        <label :for="'star' + i">
                                                                            <i class="fa fa-star"></i>
                                                                        </label>
                                                                    </template>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Comentario<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <textarea v-model="testimonio.comentario" required
                                                                    class="form-control" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Imagen</label>
                                                                <input type="file" class="dropify" @change="imagen"
                                                                    accept=".jpg,.jpeg,.png"
                                                                    data-allowed-file-extensions="jpg jpeg png"
                                                                    name="imagen">
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
                            <div class="modal fade" id="modEditarTestimonio" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <form v-on:submit.prevent="updateTestimonio()" enctype="multipart/form-data">

                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar Testimonio</h4>
                                                <button type="button" data-dismiss="modal" aria-label="Close"
                                                    class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-5  ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Nombre<span style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="testimonio.nombre" required
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5 mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Profesión</label>
                                                                <input type="text" v-model="testimonio.profesion"
                                                                    class="form-control">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                                <label>Calificación: </label>

                                                                <div class="rating-stars">
                                                                    <template v-for="i in [5, 4, 3, 2, 1]" :key="i">
                                                                        <input type="radio" :id="'star' + i"
                                                                            name="calificacion" :value="i"
                                                                            v-model="testimonio.calificacion">

                                                                        <label :for="'star' + i">
                                                                            <i class="fa fa-star"></i>
                                                                        </label>
                                                                    </template>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Comentario<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <textarea v-model="testimonio.comentario" required
                                                                    class="form-control" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Imagen</label>
                                                                <input type="file" class="dropify dropify-edit-image" @change="imagen_edit"
                                                                    accept=".jpg,.jpeg,.png,.webp"
                                                                    data-allowed-file-extensions="jpg jpeg png webp"
                                                                    name="imagen">
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
            testimonios: [],
            testimonio: {}
        }
    },
    mounted() {
        this.getTestimonios();
    },
    methods: {
        resetForm() {
            this.testimonio = {
                id: null,
                nombre: '',
                profesion: '',
                comentario: '',
                calificacion: '',
                imagen: null
            };
        },
        getTestimonios() {
            axios.get(route('testimonios.get')).then((response) => {
                this.destroyDatatable();
                this.testimonios = response.data;
                this.initDatatable();
            }).catch(error => {
                console.log('Error en el Servidor');
            })
        },
        showNuevo() {
            this.resetForm();
            $("#mdlNuevoTestimonio").modal('show');
        },
        storeTestimonio() {
            let formData = new FormData();
            formData.append('nombre', this.testimonio.nombre);
            formData.append('profesion', this.testimonio.profesion);
            formData.append('comentario', this.testimonio.comentario);
            formData.append('calificacion', this.testimonio.calificacion);
            formData.append('imagen', this.testimonio.imagen);
            axios.post(route('testimonios.store'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'TESTIMONIO AGREGADO',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.getTestimonios();
                    $('#mdlNuevoTestimonio').modal('hide');
                    this.resetForm();
                } else {
                    toastr.warning("No se pudo registrar el Testimonio");
                }
            }).catch(error => {
                toastr.error("No se pudo registrar el Testimonio, problema de servidor");
                console.log(error);
            });
        },
        showEdit(item) {
            this.testimonio = { ...item };
            this.$nextTick(() => {

                let drImage = $('.dropify-edit-image').dropify({
                    defaultFile: item.imagen
                        ? this.asset('testimonios_imagenes/' + item.imagen)
                        : ''
                });

                drImage = drImage.data('dropify');

                drImage.resetPreview();
                drImage.clearElement();
                drImage.settings.defaultFile =
                    item.imagen
                        ? this.asset('testimonios_imagenes/' + item.imagen)
                        : '';

                drImage.destroy();
                drImage.init();


            });
            $("#modEditarTestimonio").modal('show');
        },
        updateTestimonio() {
            let formData = new FormData();
            formData.append('id', this.testimonio.id);
            formData.append('nombre', this.testimonio.nombre);
            formData.append('profesion', this.testimonio.profesion);
            formData.append('comentario', this.testimonio.comentario);
            formData.append('calificacion', this.testimonio.calificacion);
            formData.append('imagen', this.testimonio.imagen);
            axios.post(route('testimonios.edit'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'TESTIMONIO EDITADO',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.destroyDatatable();
                    this.getTestimonios();
                    this.initDatatable();
                    $("#modEditarTestimonio").modal('hide');
                    this.resetForm();
                } else {
                    toastr.error('No se actualizo el Testimonio');
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
                    axios.post(route('testimonios.delete', id))
                        .then((response) => {
                            if (response.data) {
                                this.getTestimonios();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'TESTIMONIO ELIMINADO',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                this.resetForm();
                            } else {
                                toastr.warning("No se pudo eliminar el Testimonio");
                            }
                        }).catch(error => {
                            toastr.error("Error al eliminar el Testimonio");
                            console.log(error);
                        });
                }
            });
        },

        imagen(event) {
            var drEvent = $('.dropify').dropify(
            );
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.settings.defaultFile = "";
            drEvent.destroy();
            drEvent.init();
            this.testimonio.imagen = event.target.files[0];
        },

        imagen_edit(event) {
            var drEvent = $('.dropify').dropify(
            );
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.settings.defaultFile = "";
            drEvent.destroy();
            drEvent.init();
            this.testimonio.imagen = event.target.files[0];
        },
    }
}
</script>