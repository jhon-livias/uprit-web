<template>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-12">
                            <span style="font-weight:bold; color: #20272f; font-size: 24px;">Lista de Noticias</span>
                            <button type="button" class="btn btn-success" @click="showNuevo"
                                style="float: right; color: white;">
                                <i class="icon-plus"></i> <span> Nueva Noticia</span>
                            </button>
                            <button type="button" class="btn btn-info" @click="showNuevoCat"
                                style="float: right; color: white; margin-right: 10px;">
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
                                                    <th style="text-align: center">Categoría</th>
                                                    <th style="text-align: center">Título</th>
                                                    <th style="text-align: center">Fecha</th>
                                                    <th style="text-align: center">Descripción Corta</th>
                                                    <th style="text-align: center">Imagen</th>
                                                    <th style="text-align: center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr v-for="(item, index) in noticias" :key="item.id">
                                                    <td style="text-align: center">{{ index + 1 }}</td>
                                                    <td style="text-align: center">{{ item.categoria_noticia.nombre }}
                                                    </td>
                                                    <td style="text-align: center">{{ item.titulo }}</td>
                                                    <td style="text-align: center">{{ formatFecha(item.fecha) }}</td>

                                                    <td
                                                        style="text-align: center; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                        {{ item.descripcion_corta }}</td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <img v-if="item.imagen"
                                                            :src="asset('noticias_imagenes/' + item.imagen)"
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
                            <div class="modal fade" id="mdlNuevaNoticia" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <form v-on:submit.prevent="storeNoticia()" enctype="multipart/form-data">

                                            <div class="modal-header">
                                                <h4 class="modal-title">Agregar Noticia</h4> <button type="button"
                                                    data-dismiss="modal" aria-label="Close" class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-5  ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Categoría<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <select v-model="noticia.categoria_noticia_id" required
                                                                    class="form-control">
                                                                    <option value="">Seleccionar Categoría</option>
                                                                    <option v-for="cat in cat_noticias" :key="cat.id"
                                                                        :value="cat.id">
                                                                        {{ cat.nombre }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5   mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Fecha<span style="color: red;">
                                                                        *</span></label>
                                                                <input type="date" v-model="noticia.fecha" required
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10  ml-auto mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Título<span style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="noticia.titulo" required
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Descripción Corta<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <textarea v-model="noticia.descripcion_corta" required
                                                                    class="form-control" rows="3"></textarea>
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
                                                    <div class="col-md-10  ml-auto mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Tags</label>
                                                                <input type="text" id="tags" class="form-control"
                                                                    ref="tagsCreate">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10  ml-auto mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Nombre del Autor</label>
                                                                <input type="text" v-model="noticia.autor_nombre"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10  ml-auto mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Descripción del Autor</label>
                                                                <textarea v-model="noticia.autor_descripcion"
                                                                    class="form-control" rows="3"></textarea>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Imagen Autor</label>
                                                                <input type="file" class="dropify"
                                                                    @change="imagen_autor"
                                                                    accept=".jpg,.jpeg,.png,.webp"
                                                                    data-allowed-file-extensions="jpg jpeg png webp"
                                                                    name="autor_imagen">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10  ml-auto mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Descripción Completa</label>
                                                                <textarea ref="editorCreate" class="form-control"
                                                                    rows="6"></textarea>

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
                            <div class="modal fade" id="modEditarNoticia" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <form v-on:submit.prevent="updateNoticia()" enctype="multipart/form-data">

                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar Noticia</h4>
                                                <button type="button" data-dismiss="modal" aria-label="Close"
                                                    class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-5  ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Categoría<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <select v-model="noticia.categoria_noticia_id" required
                                                                    class="form-control">
                                                                    <option value="">Seleccionar Categoría</option>
                                                                    <option v-for="cat in cat_noticias" :key="cat.id"
                                                                        :value="cat.id">
                                                                        {{ cat.nombre }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Fecha<span style="color: red;">
                                                                        *</span></label>
                                                                <input type="date" v-model="noticia.fecha" required
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 ml-auto mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Título<span style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="noticia.titulo" required
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Descripción Corta<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <textarea v-model="noticia.descripcion_corta" required
                                                                    class="form-control" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Imagen</label>
                                                                <input type="file" class="dropify dropify-edit-imagen"
                                                                    @change="imagen_edit" accept=".jpg,.jpeg,.png,.webp"
                                                                    data-allowed-file-extensions="jpg jpeg png webp"
                                                                    name="imagen">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10  ml-auto mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Tags</label>
                                                                <input type="text" class="form-control tags-input"
                                                                    ref="tagsEdit">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10  ml-auto mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Nombre del Autor</label>
                                                                <input type="text" v-model="noticia.autor_nombre"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10  ml-auto mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Descripción del Autor</label>
                                                                <textarea v-model="noticia.autor_descripcion"
                                                                    class="form-control" rows="3"></textarea>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Imagen Autor</label>
                                                                <input type="file" class="dropify dropify-edit-autor"
                                                                    @change="imagen_autor_edit"
                                                                    accept=".jpg,.jpeg,.png,.webp"
                                                                    data-allowed-file-extensions="jpg jpeg png webp"
                                                                    name="autor_imagen">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10  ml-auto mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Descripción Completa</label>
                                                                <textarea ref="editorEdit" class="form-control ckeditor"
                                                                    rows="6"></textarea>

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
                            <div class="modal fade" id="mdlNuevaCategoria" tabindex="-1" role="dialog">

                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                Administrar Categorías
                                            </h4>

                                            <button type="button" class="close" data-dismiss="modal">
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            <form @submit.prevent="storeCatNoticia">

                                                <div class="row mb-4 align-items-end">

                                                    <div class="col-md-10">

                                                        <label>
                                                            Nombre de la Categoría
                                                            <span style="color:red">*</span>
                                                        </label>

                                                        <input v-model="cat_noticia.nombre" type="text" required
                                                            class="form-control">
                                                    </div>

                                                    <div class="col-md-2">

                                                        <button type="submit" class="btn btn-primary btn-block">

                                                            <i class="fa fa-plus"></i>
                                                            Agregar

                                                        </button>

                                                    </div>

                                                </div>

                                            </form>

                                            <div class="table-responsive">

                                                <table class="table table-bordered table-hover">

                                                    <thead style="color:#fff;background:#545b62">

                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Categoría</th>
                                                            <th class="text-center">Acciones</th>
                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        <tr v-for="(cat, index) in cat_noticias" :key="cat.id">

                                                            <td class="text-center">
                                                                {{ index + 1 }}
                                                            </td>

                                                            <td>

                                                                <input v-model="cat.nombre" class="form-control">

                                                            </td>

                                                            <td class="text-center">

                                                                <button class="btn btn-warning btn-sm mr-1"
                                                                    @click="updateCategoria(cat)">

                                                                    <i class="fa fa-pencil"></i>

                                                                </button>

                                                                <button class="btn btn-danger btn-sm"
                                                                    @click="deleteCategoria(cat.id)">

                                                                    <i class="fa fa-trash-o"></i>

                                                                </button>

                                                            </td>

                                                        </tr>

                                                        <tr v-if="!cat_noticias.length">

                                                            <td colspan="3" class="text-center">
                                                                No hay categorías registradas
                                                            </td>

                                                        </tr>

                                                    </tbody>

                                                </table>

                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">

                                                Cerrar

                                            </button>

                                        </div>

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
            noticias: [],
            cat_noticias: [],
            noticia: {},
            cat_noticia: {},
            tagifyCreate: null,
            tagifyEdit: null,

        }
    },
    mounted() {
        this.getNoticias();
        this.getCatNoticias();
        this._editorCreate = null;
        this._editorEdit = null;
    },
    methods: {
        resetForm() {
            this.noticia = {
                id: null,
                categoria_noticia_id: '',
                titulo: '',
                fecha: '',
                descripcion_corta: '',
                imagen: null,
                tags: '',
                autor_nombre: '',
                autor_descripcion: '',
                autor_imagen: null,
                descripcion_total: '',
            };
            this.cat_noticia = {
                id: null,
                nombre: '',
            };

        },
        formatFecha(fecha) {
            if (!fecha) return '-';

            return new Date(fecha).toLocaleDateString('es-PE', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
        },
        initDropify() {
            this.$nextTick(() => {
                $('.dropify').dropify();
            });
        },
        async initCreateEditor() {

            if (this.editorCreate) {
                await this.editorCreate.destroy();
            }

            this.editorCreate = await ClassicEditor.create(
                this.$refs.editorCreate
            );

            this.editorCreate.model.document.on('change:data', () => {
                this.noticia.descripcion_total =
                    this.editorCreate.getData();
            });

        },
        async initEditEditor() {

            if (this.editorEdit) {
                await this.editorEdit.destroy();
            }

            this.editorEdit = await ClassicEditor.create(
                this.$refs.editorEdit
            );

            this.editorEdit.setData(
                this.noticia.descripcion_total || ''
            );

            this.editorEdit.model.document.on('change:data', () => {
                this.noticia.descripcion_total =
                    this.editorEdit.getData();
            });

        },
        getCatNoticias() {
            axios.get(route('noticias.get.categoria')).then((response) => {

                this.cat_noticias = response.data;

            }).catch(error => {
                console.log('Error en el Servidor');
            })
        },
        getNoticias() {
            axios.get(route('noticias.get')).then((response) => {
                this.destroyDatatable();
                this.noticias = response.data;
                this.initDatatable();
            }).catch(error => {
                console.log('Error en el Servidor');
            })
        },

        showNuevoCat() {
            this.resetForm();
            $("#mdlNuevaCategoria").modal('show');
        },
        showNuevo() {
            this.resetForm();
            this.initDropify();
            $("#mdlNuevaNoticia").modal('show');
            this.$nextTick(async () => {

                if (this.tagifyCreate) {
                    this.tagifyCreate.destroy();
                }

                this.tagifyCreate = new Tagify(this.$refs.tagsCreate, {
                    delimiters: null
                });

                this.tagifyCreate.on('change', () => {
                    this.noticia.tags = JSON.stringify(
                        this.tagifyCreate.value.map(tag => tag.value)
                    );
                });
                await this.initCreateEditor();
            });
        },

        storeCatNoticia() {
            let formData = new FormData();
            formData.append('nombre', this.cat_noticia.nombre);
            axios.post(route('noticias.categorias.store'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'CATEGORÍA AGREGADA',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.getCatNoticias();
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

        storeNoticia() {
            if (this.tagifyCreate) {
                this.noticia.tags = JSON.stringify(
                    this.tagifyCreate.value.map(tag => tag.value)
                );
            }
            let formData = new FormData();
            formData.append('categoria_noticia_id', this.noticia.categoria_noticia_id);
            formData.append('titulo', this.noticia.titulo);
            formData.append('fecha', this.noticia.fecha);
            formData.append('descripcion_corta', this.noticia.descripcion_corta);
            formData.append('imagen', this.noticia.imagen);
            formData.append('tags', this.noticia.tags);
            formData.append('autor_nombre', this.noticia.autor_nombre);
            formData.append('autor_descripcion', this.noticia.autor_descripcion);
            formData.append('autor_imagen', this.noticia.autor_imagen);
            formData.append('descripcion_total', this.noticia.descripcion_total);
            axios.post(route('noticias.store'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'NOTICIA AGREGADA',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.getNoticias();
                    $('#mdlNuevaNoticia').modal('hide');
                    this.resetForm();
                } else {
                    toastr.warning("No se pudo registrar la Noticia");
                }
            }).catch(error => {
                toastr.error("No se pudo registrar la Noticia, problema de servidor");
                console.log(error);
            });
        },
        showEdit(item) {
            this.noticia = { ...item };
            this.$nextTick(async () => {

                let drImagen = $('.dropify-edit-imagen').dropify({
                    defaultFile: item.imagen
                        ? this.asset('noticias_imagenes/' + item.imagen)
                        : ''
                });

                drImagen = drImagen.data('dropify');

                drImagen.resetPreview();
                drImagen.clearElement();

                drImagen.settings.defaultFile =
                    item.imagen
                        ? this.asset('noticias_imagenes/' + item.imagen)
                        : '';

                drImagen.destroy();
                drImagen.init();


                let drAutor = $('.dropify-edit-autor').dropify({
                    defaultFile: item.autor_imagen
                        ? this.asset('noticias_autor_imagenes/' + item.autor_imagen)
                        : ''
                });

                drAutor = drAutor.data('dropify');

                drAutor.resetPreview();
                drAutor.clearElement();

                drAutor.settings.defaultFile =
                    item.autor_imagen
                        ? this.asset('noticias_autor_imagenes/' + item.autor_imagen)
                        : '';

                drAutor.destroy();
                drAutor.init();


                if (this.tagifyEdit) {
                    this.tagifyEdit.destroy();
                }

                this.tagifyEdit = new Tagify(this.$refs.tagsEdit, {
                    delimiters: null
                });

                this.$refs.tagsEdit.value = '';

                const tags = Array.isArray(this.noticia.tags)
                    ? this.noticia.tags
                    : JSON.parse(this.noticia.tags || '[]');

                this.tagifyEdit.removeAllTags();
                this.tagifyEdit.addTags(tags);

                this.tagifyEdit.on('change', () => {
                    this.noticia.tags = JSON.stringify(
                        this.tagifyEdit.value.map(tag => tag.value)
                    );
                });

                await this.initEditEditor();

            });
            $("#modEditarNoticia").modal('show');
            
        },
        updateCategoria(cat) {

            let formData = new FormData();

            formData.append('id', cat.id);
            formData.append('nombre', cat.nombre);

            axios.post(
                route('noticias.categorias.edit'),
                formData
            )
                .then((response) => {

                    if (response.data) {

                        Swal.fire({
                            icon: 'success',
                            title: 'CATEGORÍA ACTUALIZADA',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        this.getCatNoticias();

                    }

                })
                .catch((error) => {
                    console.log(error);
                    toastr.error('No se pudo actualizar la categoría');
                });

        },
        updateNoticia() {
            if (this.tagifyEdit) {
                this.noticia.tags = JSON.stringify(
                    this.tagifyEdit.value.map(tag => tag.value)
                );
            }

            let formData = new FormData();
            formData.append('id', this.noticia.id);
            formData.append('categoria_noticia_id', this.noticia.categoria_noticia_id);
            formData.append('titulo', this.noticia.titulo);
            formData.append('fecha', this.noticia.fecha);
            formData.append('descripcion_corta', this.noticia.descripcion_corta);
            formData.append('imagen', this.noticia.imagen);
            formData.append('tags', this.noticia.tags);
            formData.append('autor_nombre', this.noticia.autor_nombre);
            formData.append('autor_descripcion', this.noticia.autor_descripcion);
            formData.append('autor_imagen', this.noticia.autor_imagen);
            formData.append('descripcion_total', this.noticia.descripcion_total);
            axios.post(route('noticias.edit'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'NOTICIA EDITADA',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.destroyDatatable();
                    this.getNoticias();
                    this.initDatatable();
                    $("#modEditarNoticia").modal('hide');
                    this.resetForm();
                } else {
                    toastr.error('No se actualizo la Noticia');
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
                    axios.post(route('noticias.delete', id))
                        .then((response) => {
                            if (response.data) {
                                this.getNoticias();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'NOTICIA ELIMINADA',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                this.resetForm();
                            } else {
                                toastr.warning("No se pudo eliminar la Noticia");
                            }
                        }).catch(error => {
                            toastr.error("Error al eliminar la Noticia");
                            console.log(error);
                        });
                }
            });
        },
        deleteCategoria(id) {

            Swal.fire({
                title: '¿Eliminar categoría?',
                text: 'No podrás revertir esto',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar'
            })
                .then((result) => {

                    if (!result.isConfirmed) return;

                    axios.post(
                        route('noticias.categorias.delete', id)
                    )
                        .then((response) => {

                            if (response.data) {

                                Swal.fire({
                                    icon: 'success',
                                    title: 'CATEGORÍA ELIMINADA',
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                                this.getCatNoticias();

                            }

                        })
                        .catch((error) => {
                            console.log(error);
                            toastr.error('No se pudo eliminar la categoría');
                        });

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
            this.noticia.imagen = event.target.files[0];
        },

        imagen_edit(event) {
            var drEvent = $('.dropify').dropify(
            );
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.settings.defaultFile = "";
            drEvent.destroy();
            drEvent.init();
            this.noticia.imagen = event.target.files[0];
        },
        imagen_autor(event) {
            var drEvent = $('.dropify').dropify(
            );
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.settings.defaultFile = "";
            drEvent.destroy();
            drEvent.init();
            this.noticia.autor_imagen = event.target.files[0];
        },

        imagen_autor_edit(event) {
            var drEvent = $('.dropify').dropify(
            );
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.settings.defaultFile = "";
            drEvent.destroy();
            drEvent.init();
            this.noticia.autor_imagen = event.target.files[0];
        },


    }

}
</script>