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
                                                    <th style="text-align: center">T. Superior</th>
                                                    <th style="text-align: center">T. Principal</th>
                                                    <th style="text-align: center">Descripción</th>
                                                    <th style="text-align: center">Enlace</th>
                                                    <th style="text-align: center">Video</th>
                                                    <th style="text-align: center">Imagen</th>
                                                    <th style="text-align: center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="item in sliders" :key="item.id">
                                                    <td style="text-align: center">{{ item.orden }}</td>
                                                    <td style="text-align: center">{{ item.titulo_superior }}</td>
                                                    <td style="text-align: center">{{ item.titulo_principal }}</td>
                                                    <td
                                                        style="text-align: center; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                        {{ item.descripcion }}</td>
                                                    <td style="text-align: center">
                                                        <a v-if="item.enlace_boton" :href="item.enlace_boton"
                                                            target="_blank" class="btn btn-primary"
                                                            title="Visitar Enlace">
                                                            <i class="fa fa-external-link"></i>
                                                        </a>

                                                        <button v-else class="btn btn-secondary" disabled>
                                                            <i class="fa fa-ban"></i>
                                                        </button>
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <video v-if="item.video" width="140" controls autoplay muted
                                                            loop playsinline
                                                            style="border-radius: 8px; object-fit: cover; border: 1px solid #ddd;">
                                                            <source
                                                                :src="asset('slider_principal_videos/' + item.video)"
                                                                type="video/mp4">
                                                            Tu navegador no soporta video.
                                                        </video>

                                                        <span v-else class="text-muted">
                                                            No disponible
                                                        </span>
                                                    </td>

                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <img v-if="item.imagen"
                                                            :src="asset('slider_principal_imagenes/' + item.imagen)"
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
                                                    <div class="col-md-5  ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Orden</label>
                                                                <input type="number" v-model="slider.orden"
                                                                    class="form-control">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5 mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Enlace Botón</label>
                                                                <input type="text" v-model="slider.enlace_boton"
                                                                    class="form-control">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5  ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Titulo Superior<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="slider.titulo_superior"
                                                                    class="form-control">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5 mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Titulo Principal<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="slider.titulo_principal"
                                                                    class="form-control">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Descripción<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <textarea v-model="slider.descripcion" required
                                                                    class="form-control" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Video</label>
                                                                <input type="file" @change="video" class="dropify"
                                                                    accept=".mp4,.avi,.mov"
                                                                    data-allowed-file-extensions="mp4 avi mov"
                                                                    name="video">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Imagen</label>
                                                                <input type="file" @change="imagen" class="dropify"
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
                                                    <div class="col-md-5  ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Orden</label>
                                                                <input type="number" class="form-control"
                                                                    v-model="slider.orden">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5 mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Enlace Botón</label>
                                                                <input type="text" v-model="slider.enlace_boton"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5  ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Titulo Superior<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="slider.titulo_superior"
                                                                    class="form-control">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5 mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Titulo Principal<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="slider.titulo_principal"
                                                                    class="form-control">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Descripción<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <textarea v-model="slider.descripcion" required
                                                                    class="form-control" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Video</label>
                                                                <input type="file" @change="video_edit"
                                                                    class="dropify dropify-edit-video"
                                                                    accept=".mp4,.avi,.mov"
                                                                    data-allowed-file-extensions="mp4 avi mov"
                                                                    name="video">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Imagen</label>
                                                                <input type="file" @change="imagen_edit"
                                                                    class="dropify dropify-edit-image"
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
            slider: {}
        }
    },
    mounted() {
        this.getSliders();
    },
    methods: {
        resetForm() {
            this.slider = {
                id: null,
                titulo_superior: '',
                titulo_principal: '',
                descripcion: '',
                enlace_botonn: '',
                video: null,
                imagen: null,
                orden: ''
            };
        },
        getSliders() {
            axios.get(route('sliders.get')).then((response) => {
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
            formData.append('titulo_superior', this.slider.titulo_superior);
            formData.append('titulo_principal', this.slider.titulo_principal);
            formData.append('descripcion', this.slider.descripcion);
            formData.append('enlace_boton', this.slider.enlace_boton);
            formData.append('video', this.slider.video);
            formData.append('imagen', this.slider.imagen);
            formData.append('orden', this.slider.orden);
            axios.post(route('sliders.store'), formData).then((response) => {
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
                        ? this.asset('slider_principal_imagenes/' + item.imagen)
                        : ''
                });

                drImage = drImage.data('dropify');

                drImage.resetPreview();
                drImage.clearElement();
                drImage.settings.defaultFile =
                    item.imagen
                        ? this.asset('slider_principal_imagenes/' + item.imagen)
                        : '';

                drImage.destroy();
                drImage.init();

                let drVideo = $('.dropify-edit-video').dropify({
                    defaultFile: item.video
                        ? this.asset('slider_principal_videos/' + item.video)
                        : ''
                });

                drVideo = drVideo.data('dropify');

                drVideo.resetPreview();
                drVideo.clearElement();
                drVideo.settings.defaultFile =
                    item.video
                        ? this.asset('slider_principal_videos/' + item.video)
                        : '';

                drVideo.destroy();
                drVideo.init();

            });

            $("#modEditarSlider").modal('show');
        },
        updateSlider() {
            let formData = new FormData();
            formData.append('id', this.slider.id);
            formData.append('titulo_superior', this.slider.titulo_superior);
            formData.append('titulo_principal', this.slider.titulo_principal);
            formData.append('descripcion', this.slider.descripcion);
            formData.append('enlace_boton', this.slider.enlace_boton);
            formData.append('video', this.slider.video);
            formData.append('imagen', this.slider.imagen);
            formData.append('orden', this.slider.orden);
            axios.post(route('sliders.edit'), formData).then((response) => {
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
                    axios.post(route('sliders.delete', id))
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

        video(event) {
            var drEvent = $('.dropify').dropify(
            );
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.settings.defaultFile = "";
            drEvent.destroy();
            drEvent.init();
            this.slider.video = event.target.files[0];
        },

        video_edit(event) {
            var drEvent = $('.dropify').dropify(
            );
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.settings.defaultFile = "";
            drEvent.destroy();
            drEvent.init();
            this.slider.video = event.target.files[0];
        },

    }
}
</script>