<template>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-12">
                            <span style="font-weight:bold; color: #20272f; font-size: 24px;">Lista de Sliders</span>
                            <button type="button" class="btn btn-success" @click="showNuevo"
                                style="float: right; color: white;">
                                <i class="icon-plus"></i> <span> Nuevo Slider</span>
                            </button>

                        </div>

                        <div class="col-12 tab-content padding-0">

                            <div class="tab-pane active" id="español">
                                <div class="body">
                                    <div class="table-responsive" style="padding-top: 20px;">

                                        <table class="table table-hover js-basic-example table-striped">
                                            <thead style="color: #fff; background-color: #545b62;">
                                                <tr>
                                                    <th style="text-align: center">Orden</th>
                                                    <th style="text-align: center">Carrera</th>
                                                    <th style="text-align: center">Imagen</th>
                                                    <th style="text-align: center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr v-for="item in sliders" :key="item.id">
                                                    <td style="text-align: center">{{ item.orden }}</td>
                                                    <td style="text-align: center">{{ item.carrera.nombre }}</td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <img v-if="item.imagen"
                                                            :src="asset('slider_carreras_imagenes/' + item.imagen)"
                                                            alt="Imagen" width="140"
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
                            <div class="modal fade" id="mdlNuevoSlider" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <form v-on:submit.prevent="storeSlider()" enctype="multipart/form-data">

                                            <div class="modal-header">
                                                <h4 class="modal-title">Agregar Slider</h4> <button type="button"
                                                    data-dismiss="modal" aria-label="Close" class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-2  ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Orden</label>
                                                                <input type="number" v-model="slider.orden" class="form-control">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Carrera<span style="color: red;">
                                                                        *</span></label>
                                                                <select v-model="slider.carrera_id" required
                                                                    class="form-control">
                                                                    <option value="" disabled>
                                                                        Seleccione una carrera
                                                                    </option>

                                                                    <option v-for="carrera in carreras"
                                                                        :key="carrera.id" :value="carrera.id">
                                                                        {{ carrera.categoria.nivel_academico.nombre }}
                                                                        {{ carrera.categoria.padre ? ' - ' +
                                                                        carrera.categoria.padre.nombre : '' }}
                                                                        -
                                                                        {{ carrera.nombre }}
                                                                    </option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Imagen</label>
                                                                <input type="file" class="dropify" @change="imagen"
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
                            <div class="modal fade" id="modEditarSlider" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <form v-on:submit.prevent="updateSlider()" enctype="multipart/form-data">
                                            
                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar Slider</h4>
                                                <button type="button" data-dismiss="modal" aria-label="Close"
                                                    class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-2  ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Orden</label>
                                                                <input type="number" v-model="slider.orden" class="form-control">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Carrera<span style="color: red;">
                                                                        *</span></label>
                                                                <select v-model="slider.carrera_id" required class="form-control">
                                                                    <option v-for="carrera in carreras"
                                                                        :key="carrera.id" :value="carrera.id">
                                                                        {{ carrera.categoria.nivel_academico.nombre }}
                                                                        {{ carrera.categoria.padre ? ' - ' +
                                                                        carrera.categoria.padre.nombre : '' }}
                                                                        -
                                                                        {{ carrera.nombre }}
                                                                    </option>
                                                                </select>

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
            sliders: [],
            carreras: [],
            slider: {}
        }
    },
    mounted() {
        this.getSliders();
        this.getCarreras();
    },
    methods: {
        resetForm() {
            this.slider = {
                id: null,
                carrera_id: '',
                orden: '',
                imagen: null
            };
        },
        getCarreras() {
            axios.get(route('carreras.get')).then((response) => {

                this.carreras = response.data;
            }).catch(error => {
                console.log('Error en el Servidor');
            })
        },
        getSliders() {
            axios.get(route('sliderscarrera.get')).then((response) => {
                this.destroyDatatable();
                this.sliders = response.data;
                this.initDatatable();
            }).catch(error => {
                console.log('Error en el Servidor');
            })
        },
        getSiguienteOrden() {

            const ordenes =
                this.sliders
                    .map(s => Number(s.orden))
                    .sort((a, b) => a - b);

            let siguiente = 1;

            for (const orden of ordenes) {

                if (orden !== siguiente) {
                    return siguiente;
                }

                siguiente++;
            }

            return siguiente;
        },
        showNuevo() {
            this.resetForm();
            this.slider.orden = this.getSiguienteOrden();
            $("#mdlNuevoSlider").modal('show');
        },
        storeSlider() {
            let formData = new FormData();
            formData.append('carrera_id', this.slider.carrera_id);
            formData.append('imagen', this.slider.imagen);
            formData.append('orden', this.slider.orden);
            axios.post(route('sliderscarrera.store'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'SLIDER AGREGADO',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.getSliders();
                    $('#mdlNuevoSlider').modal('hide');
                    this.resetForm();
                } else {
                    toastr.warning("No se pudo registrar el Slider");
                }
            }).catch(error => {
                toastr.error("No se pudo registrar el Slider, problema de servidor");
                console.log(error);
            });
        },
        showEdit(item) {
            this.slider = { ...item };
            this.$nextTick(() => {

                let drImage = $('.dropify-edit-image').dropify({
                    defaultFile: item.imagen
                        ? this.asset('slider_carreras_imagenes/' + item.imagen)
                        : ''
                });

                drImage = drImage.data('dropify');

                drImage.resetPreview();
                drImage.clearElement();
                drImage.settings.defaultFile =
                    item.imagen
                        ? this.asset('slider_carreras_imagenes/' + item.imagen)
                        : '';

                drImage.destroy();
                drImage.init();


            });
            $("#modEditarSlider").modal('show');
        },
        updateSlider() {
            let formData = new FormData();
            formData.append('id', this.slider.id);
            formData.append('carrera_id', this.slider.carrera_id);
            formData.append('imagen', this.slider.imagen);
            formData.append('orden', this.slider.orden);
            axios.post(route('sliderscarrera.edit'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'SLIDER EDITADO',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.destroyDatatable();
                    this.getSliders();
                    this.initDatatable();
                    $("#modEditarSlider").modal('hide');
                    this.resetForm();
                } else {
                    toastr.error('No se actualizo el Slider');
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
                    axios.post(route('sliderscarrera.delete', id))
                        .then((response) => {
                            if (response.data) {
                                this.getSliders();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'SLIDER ELIMINADO',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                this.resetForm();
                            } else {
                                toastr.warning("No se pudo eliminar el Slider");
                            }
                        }).catch(error => {
                            toastr.error("Error al eliminar el Slider");
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
            this.slider.imagen = event.target.files[0];
        },

        imagen_edit(event) {
            var drEvent = $('.dropify').dropify(
            );
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.settings.defaultFile = "";
            drEvent.destroy();
            drEvent.init();
            this.slider.imagen = event.target.files[0];
        },



    }
}
</script>