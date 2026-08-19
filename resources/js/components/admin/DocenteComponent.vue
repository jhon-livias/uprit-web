<template>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-12">
                            <span style="font-weight:bold; color: #20272f; font-size: 24px;">Lista de Docentes</span>
                            <button type="button" class="btn btn-success" @click="showNuevo"
                                style="float: right; color: white;">
                                <i class="icon-plus"></i> <span> Nuevo Docente</span>
                            </button>
                        </div>

                        <div class="col-12 tab-content padding-0">
                            <div class="tab-pane active">
                                <div class="body">
                                    <div class="table-responsive" style="padding-top: 20px;">
                                        <table class="table table-hover js-basic-example table-striped">
                                            <thead style="color: #fff; background-color: #545b62;">
                                                <tr>
                                                    <th style="text-align: center">#</th>
                                                    <th style="text-align: center">Nombre</th>
                                                    <th style="text-align: center">Correo</th>
                                                    <th style="text-align: center">Departamento</th>
                                                    <th style="text-align: center">Carreras</th>
                                                    <th style="text-align: center">Investigador</th>
                                                    <th style="text-align: center">Imagen</th>
                                                    <th style="text-align: center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in docentes" :key="item.id">
                                                    <td style="text-align: center">{{ index + 1 }}</td>
                                                    <td style="text-align: center">{{ item.nombre }}</td>
                                                    <td style="text-align: center">{{ item.correo || '-' }}</td>
                                                    <td style="text-align: center">{{ item.departamento || '-' }}</td>
                                                    <td style="text-align: center">{{ item.carreras_count || 0 }}</td>
                                                    <td style="text-align: center">
                                                        <span v-if="item.es_investigador" class="badge badge-success">Sí</span>
                                                        <span v-else class="text-muted">No</span>
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <img v-if="item.imagen" :src="asset(item.imagen)" alt="Imagen"
                                                            width="80"
                                                            style="border-radius: 8px; object-fit: cover; border: 1px solid #ddd;">
                                                        <span v-else class="text-muted">No disponible</span>
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

                            <div class="modal fade" id="mdlNuevoDocente" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <form @submit.prevent="storeDocente()">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Agregar Docente</h4>
                                                <button type="button" data-dismiss="modal" class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Nombre <span style="color: red;">*</span></label>
                                                        <input type="text" v-model="docente.nombre" required
                                                            class="form-control mb-3">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Correo</label>
                                                        <input type="email" v-model="docente.correo"
                                                            class="form-control mb-3">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Departamento</label>
                                                        <input type="text" v-model="docente.departamento"
                                                            class="form-control mb-3">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>LinkedIn</label>
                                                        <input type="text" v-model="docente.linkedin"
                                                            class="form-control mb-3">
                                                    </div>
                                                    <div class="col-12">
                                                        <label>{{ docente.es_investigador ? 'Historial / biografía completa' : 'Descripción' }}</label>
                                                        <textarea v-model="docente.descripcion" class="form-control mb-3 docente-descripcion-textarea"
                                                            :placeholder="docente.es_investigador ? 'Texto completo que aparece en el perfil de Dirección de Investigación' : ''"></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <label>Etiquetas</label>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control" placeholder="Etiqueta"
                                                                @keyup.enter.prevent="agregarTag($event)">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-success"
                                                                    @click="agregarTag($event)">
                                                                    Agregar
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <span v-for="(tag, tagIndex) in docente.tags" :key="tagIndex"
                                                                class="badge badge-primary mr-2">
                                                                {{ tag }}
                                                                <i class="fa fa-times ml-1" style="cursor:pointer"
                                                                    @click="docente.tags.splice(tagIndex, 1)"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="esInvestigadorNuevo" v-model="docente.es_investigador">
                                                            <label class="custom-control-label" for="esInvestigadorNuevo">
                                                                Mostrar en Dirección de Investigación
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <template v-if="docente.es_investigador">
                                                        <div class="col-md-4">
                                                            <label>Orden en investigación</label>
                                                            <input type="number" min="1" max="999"
                                                                v-model.number="docente.orden_investigacion"
                                                                class="form-control mb-3">
                                                        </div>
                                                        <div class="col-12">
                                                            <label>Resumen para Dirección de Investigación</label>
                                                            <textarea v-model="docente.resumen_investigacion"
                                                                class="form-control mb-3 docente-descripcion-textarea"
                                                                placeholder="Texto que aparece en la tarjeta del equipo directivo"></textarea>
                                                        </div>
                                                    </template>
                                                    <div class="col-12">
                                                        <label>Carreras asignadas</label>
                                                        <select id="selectCarrerasDocenteNuevo" class="form-control" multiple style="width:100%">
                                                            <option v-for="carrera in carrerasDisponibles" :key="carrera.id" :value="carrera.id">
                                                                {{ labelCarrera(carrera) }}
                                                            </option>
                                                        </select>
                                                        <small class="text-muted">El docente aparecerá en la sección <strong>Nuestros Docentes</strong> de cada carrera seleccionada.</small>
                                                    </div>
                                                    <div v-if="carrerasSeleccionadasInfo.length" class="col-12">
                                                        <div class="d-flex flex-wrap" style="gap:8px;">
                                                            <span v-for="c in carrerasSeleccionadasInfo" :key="c.id" class="badge badge-light border p-2">
                                                                {{ c.nombre }}
                                                                <i class="fa fa-times ml-1" style="cursor:pointer" @click="quitarCarrera(c.id, 'nuevo')"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label>Imagen</label>
                                                        <input type="file" class="dropify" @change="onImagenChange"
                                                            accept=".jpg,.jpeg,.png"
                                                            data-allowed-file-extensions="jpg jpeg png">
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

                            <div class="modal fade" id="modEditarDocente" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <form @submit.prevent="updateDocente()">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar Docente</h4>
                                                <button type="button" data-dismiss="modal" class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Nombre <span style="color: red;">*</span></label>
                                                        <input type="text" v-model="docente.nombre" required
                                                            class="form-control mb-3">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Correo</label>
                                                        <input type="email" v-model="docente.correo"
                                                            class="form-control mb-3">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Departamento</label>
                                                        <input type="text" v-model="docente.departamento"
                                                            class="form-control mb-3">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>LinkedIn</label>
                                                        <input type="text" v-model="docente.linkedin"
                                                            class="form-control mb-3">
                                                    </div>
                                                    <div class="col-12">
                                                        <label>{{ docente.es_investigador ? 'Historial / biografía completa' : 'Descripción' }}</label>
                                                        <textarea v-model="docente.descripcion" class="form-control mb-3 docente-descripcion-textarea"
                                                            :placeholder="docente.es_investigador ? 'Texto completo que aparece en el perfil de Dirección de Investigación' : ''"></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <label>Etiquetas</label>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control" placeholder="Etiqueta"
                                                                @keyup.enter.prevent="agregarTag($event)">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-success"
                                                                    @click="agregarTag($event)">
                                                                    Agregar
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <span v-for="(tag, tagIndex) in docente.tags" :key="tagIndex"
                                                                class="badge badge-primary mr-2">
                                                                {{ tag }}
                                                                <i class="fa fa-times ml-1" style="cursor:pointer"
                                                                    @click="docente.tags.splice(tagIndex, 1)"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="esInvestigadorEditar" v-model="docente.es_investigador">
                                                            <label class="custom-control-label" for="esInvestigadorEditar">
                                                                Mostrar en Dirección de Investigación
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <template v-if="docente.es_investigador">
                                                        <div class="col-md-4">
                                                            <label>Orden en investigación</label>
                                                            <input type="number" min="1" max="999"
                                                                v-model.number="docente.orden_investigacion"
                                                                class="form-control mb-3">
                                                        </div>
                                                        <div class="col-12">
                                                            <label>Resumen para Dirección de Investigación</label>
                                                            <textarea v-model="docente.resumen_investigacion"
                                                                class="form-control mb-3 docente-descripcion-textarea"
                                                                placeholder="Texto que aparece en la tarjeta del equipo directivo"></textarea>
                                                        </div>
                                                    </template>
                                                    <div class="col-12">
                                                        <label>Carreras asignadas</label>
                                                        <select id="selectCarrerasDocenteEditar" class="form-control" multiple style="width:100%">
                                                            <option v-for="carrera in carrerasDisponibles" :key="carrera.id" :value="carrera.id">
                                                                {{ labelCarrera(carrera) }}
                                                            </option>
                                                        </select>
                                                        <small class="text-muted">El docente aparecerá en la sección <strong>Nuestros Docentes</strong> de cada carrera seleccionada.</small>
                                                    </div>
                                                    <div v-if="carrerasSeleccionadasInfo.length" class="col-12">
                                                        <div class="d-flex flex-wrap" style="gap:8px;">
                                                            <span v-for="c in carrerasSeleccionadasInfo" :key="c.id" class="badge badge-light border p-2">
                                                                {{ c.nombre }}
                                                                <i class="fa fa-times ml-1" style="cursor:pointer" @click="quitarCarrera(c.id, 'editar')"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label>Imagen</label>
                                                        <div v-if="docente.imagen_actual" class="mb-2">
                                                            <img :src="asset(docente.imagen_actual)" width="120"
                                                                class="rounded">
                                                        </div>
                                                        <input type="file" class="dropify-edit" @change="onImagenChange"
                                                            accept=".jpg,.jpeg,.png"
                                                            data-allowed-file-extensions="jpg jpeg png">
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
import axios from 'axios';

export default {
    data() {
        return {
            docentes: [],
            docente: {},
            carrerasDisponibles: [],
            carrerasSeleccionadas: [],
        };
    },
    computed: {
        carrerasSeleccionadasInfo() {
            if (!this.carrerasSeleccionadas.length || !this.carrerasDisponibles.length) return [];
            const ids = this.carrerasSeleccionadas.map(Number);
            return this.carrerasDisponibles.filter(c => ids.includes(c.id));
        },
    },
    mounted() {
        this.getDocentes();
        this.getCarrerasCatalogo();
    },
    methods: {
        resetForm() {
            this.docente = {
                id: null,
                nombre: '',
                correo: '',
                departamento: '',
                descripcion: '',
                linkedin: '',
                tags: [],
                imagen: null,
                imagen_actual: null,
                es_investigador: false,
                orden_investigacion: null,
                resumen_investigacion: '',
            };
            this.carrerasSeleccionadas = [];
        },
        labelCarrera(carrera) {
            const nivel = carrera.categoria?.nivel_academico?.nombre ?? '';
            const facultad = carrera.categoria?.nombre ?? '';
            return `${nivel} — ${facultad} — ${carrera.nombre}`;
        },
        getCarrerasCatalogo() {
            axios.get(route('carreras.get')).then((response) => {
                this.carrerasDisponibles = response.data;
            }).catch(() => {
                toastr.error('No se pudo cargar el catálogo de carreras');
            });
        },
        initSelectCarreras(context) {
            const selectId = context === 'editar' ? '#selectCarrerasDocenteEditar' : '#selectCarrerasDocenteNuevo';
            const modalId = context === 'editar' ? '#modEditarDocente' : '#mdlNuevoDocente';
            const $select = $(selectId);

            if ($select.hasClass('select2-hidden-accessible')) {
                $select.off('change.carreras');
                $select.select2('destroy');
            }

            $select.val(this.carrerasSeleccionadas);

            $select.select2({
                placeholder: 'Buscar carrera...',
                allowClear: true,
                width: '100%',
                dropdownParent: $(modalId),
                language: {
                    noResults: () => 'No se encontraron carreras',
                    searching: () => 'Buscando...',
                },
            });

            $select.on('change.carreras', () => {
                this.carrerasSeleccionadas = $select.val() || [];
            });
        },
        destroySelectCarreras(context) {
            const selectId = context === 'editar' ? '#selectCarrerasDocenteEditar' : '#selectCarrerasDocenteNuevo';
            const $select = $(selectId);
            if ($select.hasClass('select2-hidden-accessible')) {
                $select.off('change.carreras');
                $select.select2('destroy');
            }
        },
        quitarCarrera(id, context) {
            this.carrerasSeleccionadas = this.carrerasSeleccionadas.filter(c => String(c) !== String(id));
            const selectId = context === 'editar' ? '#selectCarrerasDocenteEditar' : '#selectCarrerasDocenteNuevo';
            const $select = $(selectId);
            if ($select.hasClass('select2-hidden-accessible')) {
                $select.val(this.carrerasSeleccionadas).trigger('change');
            }
        },
        initDropify(selector = '.dropify') {
            this.$nextTick(() => {
                $(selector).dropify();
            });
        },
        getDocentes() {
            axios.get(route('docentes.get')).then((response) => {
                this.destroyDatatable();
                this.docentes = response.data;
                this.initDatatable();
            }).catch(() => {
                toastr.error('No se pudo cargar la lista de docentes');
            });
        },
        showNuevo() {
            this.resetForm();
            $('#mdlNuevoDocente').modal('show');
            this.initDropify('.dropify');
            $('#mdlNuevoDocente').one('shown.bs.modal', () => {
                this.$nextTick(() => this.initSelectCarreras('nuevo'));
            });
        },
        showEdit(item) {
            this.docente = {
                ...item,
                tags: [...(item.tags ?? [])],
                imagen: null,
                imagen_actual: item.imagen ?? null,
                es_investigador: !!item.es_investigador,
                orden_investigacion: item.orden_investigacion ?? null,
                resumen_investigacion: item.resumen_investigacion ?? '',
            };
            this.carrerasSeleccionadas = item.carreras?.length
                ? item.carreras.map(c => String(c.id))
                : [];
            $('#modEditarDocente').modal('show');
            this.initDropify('.dropify-edit');
            $('#modEditarDocente').one('shown.bs.modal', () => {
                this.$nextTick(() => this.initSelectCarreras('editar'));
            });
        },
        onImagenChange(event) {
            this.docente.imagen = event.target.files[0] ?? null;
        },
        agregarTag(event) {
            const input = event.target.closest('.input-group').querySelector('input');
            const valor = input.value.trim();
            if (!valor) return;
            this.docente.tags.push(valor);
            input.value = '';
        },
        buildFormData() {
            const formData = new FormData();
            formData.append('nombre', this.docente.nombre);
            formData.append('correo', this.docente.correo ?? '');
            formData.append('departamento', this.docente.departamento ?? '');
            formData.append('descripcion', this.docente.descripcion ?? '');
            formData.append('linkedin', this.docente.linkedin ?? '');
            formData.append(
                'etiquetas_tags',
                JSON.stringify(this.docente.tags.map((tag) => ({ value: tag })))
            );
            formData.append('es_investigador', this.docente.es_investigador ? '1' : '0');
            if (this.docente.es_investigador) {
                formData.append('orden_investigacion', this.docente.orden_investigacion ?? '');
                formData.append('resumen_investigacion', this.docente.resumen_investigacion ?? '');
            }
            if (this.docente.imagen) {
                formData.append('imagen', this.docente.imagen);
            }
            (this.carrerasSeleccionadas || []).forEach((carreraId) => {
                formData.append('carrera_ids[]', carreraId);
            });
            return formData;
        },
        storeDocente() {
            axios.post(route('docentes.store'), this.buildFormData()).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'DOCENTE AGREGADO',
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    this.getDocentes();
                    $('#mdlNuevoDocente').modal('hide');
                    this.destroySelectCarreras('nuevo');
                    this.resetForm();
                } else {
                    toastr.warning('No se pudo registrar el docente');
                }
            }).catch(() => {
                toastr.error('No se pudo registrar el docente');
            });
        },
        updateDocente() {
            const formData = this.buildFormData();
            formData.append('id', this.docente.id);
            axios.post(route('docentes.edit'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'DOCENTE EDITADO',
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    this.getDocentes();
                    $('#modEditarDocente').modal('hide');
                    this.destroySelectCarreras('editar');
                    this.resetForm();
                } else {
                    toastr.error('No se actualizó el docente');
                }
            }).catch(() => {
                toastr.error('No se actualizó el docente');
            });
        },
        eliminar(id) {
            Swal.fire({
                title: 'Estas seguro?',
                text: 'Se quitará de todas las carreras asignadas.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar!',
            }).then((result) => {
                if (result.value) {
                    axios.post(route('docentes.delete', id)).then((response) => {
                        if (response.data) {
                            this.getDocentes();
                            Swal.fire({
                                icon: 'success',
                                title: 'DOCENTE ELIMINADO',
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            this.resetForm();
                        } else {
                            toastr.warning('No se pudo eliminar el docente');
                        }
                    }).catch(() => {
                        toastr.error('Error al eliminar el docente');
                    });
                }
            });
        },
    },
};
</script>

<style scoped>
.docente-descripcion-textarea {
    min-height: 220px;
    resize: vertical;
}
</style>
