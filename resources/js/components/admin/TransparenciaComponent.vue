<template>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <span style="font-weight:bold; color: #20272f; font-size: 24px;">Portal de Transparencia</span>
                            <button type="button" class="btn btn-success" @click="showNuevaSeccion"
                                style="float: right; color: white;">
                                <i class="icon-plus"></i> <span> Nueva sección</span>
                            </button>
                        </div>
                    </div>

                    <div v-if="secciones.length === 0" class="alert alert-info">
                        No hay secciones. Crea una nueva o ejecuta
                        <code>php artisan transparencia:import-legacy</code> en el servidor.
                    </div>

                    <div v-for="(seccion, index) in secciones" :key="seccion.id" class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ index + 1 }}. {{ seccion.titulo }}</strong>
                                <small v-if="seccion.subtitulo" class="text-muted d-block">{{ seccion.subtitulo }}</small>
                            </div>
                            <div class="text-nowrap">
                                <button type="button" class="btn btn-sm btn-primary" @click="showNuevoDocumento(seccion)">
                                    <i class="fa fa-plus"></i> Documento
                                </button>
                                <button type="button" class="btn btn-sm btn-info" @click="showEditSeccion(seccion)">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" @click="eliminarSeccion(seccion.id)">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Etiqueta</th>
                                        <th>Enlace / Archivo</th>
                                        <th style="width: 120px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="!seccion.documentos || seccion.documentos.length === 0">
                                        <td colspan="4" class="text-center text-muted">Sin documentos</td>
                                    </tr>
                                    <tr v-for="(doc, docIndex) in seccion.documentos" :key="doc.id">
                                        <td>{{ docIndex + 1 }}</td>
                                        <td>{{ doc.etiqueta }}</td>
                                        <td>
                                            <a v-if="doc.url" :href="doc.url" target="_blank">{{ doc.url }}</a>
                                            <span v-else-if="doc.archivo">{{ doc.archivo }}</span>
                                            <span v-else class="text-muted">—</span>
                                        </td>
                                        <td class="text-nowrap">
                                            <button type="button" class="btn btn-sm btn-info" @click="showEditDocumento(seccion, doc)">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" @click="eliminarDocumento(doc.id)">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal fade" id="mdlSeccion" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form @submit.prevent="guardarSeccion">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ seccionForm.id ? 'Editar sección' : 'Nueva sección' }}</h4>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Título <span style="color:red">*</span></label>
                                            <input type="text" v-model="seccionForm.titulo" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Subtítulo</label>
                                            <input type="text" v-model="seccionForm.subtitulo" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Icono</label>
                                                    <select v-model="seccionForm.icono" class="form-control">
                                                        <option value="graduation">Graduación</option>
                                                        <option value="book-open">Libro</option>
                                                        <option value="document">Documento</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Orden</label>
                                                    <input type="number" v-model.number="seccionForm.orden" min="0" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mt-4">
                                                    <label>
                                                        <input type="checkbox" v-model="seccionForm.abierta_por_defecto">
                                                        Abierta por defecto
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="mdlDocumento" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form @submit.prevent="guardarDocumento">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ documentoForm.id ? 'Editar documento' : 'Nuevo documento' }}</h4>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Etiqueta <span style="color:red">*</span></label>
                                            <input type="text" v-model="documentoForm.etiqueta" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>URL externa</label>
                                            <input type="url" v-model="documentoForm.url" class="form-control"
                                                placeholder="https://cdn.uprit.edu.pe/documents/...">
                                        </div>
                                        <div class="form-group">
                                            <label>O subir PDF</label>
                                            <input type="file" class="form-control" accept=".pdf" @change="onArchivo">
                                        </div>
                                        <div class="form-group">
                                            <label>Orden</label>
                                            <input type="number" v-model.number="documentoForm.orden" min="0" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
import axios from 'axios';

export default {
    data() {
        return {
            secciones: [],
            seccionForm: {},
            documentoForm: {},
            archivo: null,
        };
    },
    mounted() {
        this.getSecciones();
    },
    methods: {
        resetSeccionForm() {
            this.seccionForm = {
                id: null,
                titulo: '',
                subtitulo: '',
                icono: 'document',
                orden: this.secciones.length,
                abierta_por_defecto: false,
            };
        },
        resetDocumentoForm(seccionId = null) {
            this.documentoForm = {
                id: null,
                seccion_id: seccionId,
                etiqueta: '',
                url: '',
                orden: 0,
            };
            this.archivo = null;
        },
        getSecciones() {
            axios.get(route('transparencia.get')).then((response) => {
                this.secciones = response.data;
            }).catch(() => {
                toastr.error('No se pudo cargar el portal de transparencia');
            });
        },
        showNuevaSeccion() {
            this.resetSeccionForm();
            $('#mdlSeccion').modal('show');
        },
        showEditSeccion(seccion) {
            this.seccionForm = { ...seccion };
            $('#mdlSeccion').modal('show');
        },
        guardarSeccion() {
            const payload = { ...this.seccionForm };
            const request = payload.id
                ? axios.post(route('transparencia.seccion.edit'), payload)
                : axios.post(route('transparencia.seccion.store'), payload);

            request.then((response) => {
                if (response.data) {
                    Swal.fire({ icon: 'success', title: 'Sección guardada', showConfirmButton: false, timer: 1500 });
                    this.getSecciones();
                    $('#mdlSeccion').modal('hide');
                }
            }).catch(() => {
                toastr.error('No se pudo guardar la sección');
            });
        },
        eliminarSeccion(id) {
            Swal.fire({
                title: '¿Eliminar sección?',
                text: 'Se eliminarán también sus documentos.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
            }).then((result) => {
                if (result.value) {
                    axios.post(route('transparencia.seccion.delete', id)).then((response) => {
                        if (response.data) {
                            this.getSecciones();
                            Swal.fire({ icon: 'success', title: 'Sección eliminada', showConfirmButton: false, timer: 1500 });
                        }
                    });
                }
            });
        },
        showNuevoDocumento(seccion) {
            this.resetDocumentoForm(seccion.id);
            this.documentoForm.orden = seccion.documentos ? seccion.documentos.length : 0;
            $('#mdlDocumento').modal('show');
        },
        showEditDocumento(seccion, doc) {
            this.documentoForm = { ...doc, seccion_id: seccion.id };
            this.archivo = null;
            $('#mdlDocumento').modal('show');
        },
        onArchivo(event) {
            this.archivo = event.target.files[0] || null;
        },
        guardarDocumento() {
            const formData = new FormData();
            formData.append('seccion_id', this.documentoForm.seccion_id);
            formData.append('etiqueta', this.documentoForm.etiqueta);
            formData.append('orden', this.documentoForm.orden ?? 0);

            if (this.documentoForm.id) {
                formData.append('id', this.documentoForm.id);
            }

            if (this.archivo) {
                formData.append('archivo', this.archivo);
            } else if (this.documentoForm.url) {
                formData.append('url', this.documentoForm.url);
            }

            const request = this.documentoForm.id
                ? axios.post(route('transparencia.documento.edit'), formData)
                : axios.post(route('transparencia.documento.store'), formData);

            request.then((response) => {
                if (response.data) {
                    Swal.fire({ icon: 'success', title: 'Documento guardado', showConfirmButton: false, timer: 1500 });
                    this.getSecciones();
                    $('#mdlDocumento').modal('hide');
                }
            }).catch(() => {
                toastr.error('No se pudo guardar el documento');
            });
        },
        eliminarDocumento(id) {
            Swal.fire({
                title: '¿Eliminar documento?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
            }).then((result) => {
                if (result.value) {
                    axios.post(route('transparencia.documento.delete', id)).then((response) => {
                        if (response.data) {
                            this.getSecciones();
                            Swal.fire({ icon: 'success', title: 'Documento eliminado', showConfirmButton: false, timer: 1500 });
                        }
                    });
                }
            });
        },
    },
};
</script>
