<template>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-12">
                            <span style="font-weight:bold; color: #20272f; font-size: 24px;">Lista de Carreras</span>
                            <button type="button" class="btn btn-success" @click="showNuevo"
                                style="float: right; color: white;">
                                <i class="icon-plus"></i> <span> Nueva Carrera</span>
                            </button>

                        </div>

                        <div class="col-12 tab-content padding-0">

                            <div class="tab-pane active" id="español">
                                <div class="body card-body tabla-responsiva-custom">
                                    <div class="table-responsive tabla-responsiva-custom" style="padding-top: 20px;">

                                        <table class="table table-hover js-basic-example table-striped">
                                            <thead style="color: #fff; background-color: #545b62;">
                                                <tr>
                                                    <th style="text-align: center">#</th>
                                                    <th style="text-align: center">Nivel Académico</th>
                                                    <th style="text-align: center">Categoría</th>
                                                    <th style="text-align: center">Nombre</th>
                                                    <th style="text-align: center">Adminsión</th>
                                                    <th style="text-align: center">Imagen</th>
                                                    <th style="text-align: center">Brochure</th>
                                                    <th style="text-align: center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in carreras" :key="item.id">
                                                    <td style="text-align: center">{{ index + 1 }}</td>
                                                    <td style="text-align: center" class="col-nombre">
                                                        {{ item.categoria.nivel_academico.nombre }}</td>
                                                    <td style="text-align: center" class="col-nombre">
                                                        {{ item.categoria.nombre }}</td>
                                                    <td style="text-align: center; max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                                                        class="col-nombre">{{ item.nombre }}</td>
                                                    <td style="text-align: center">
                                                        {{ formatFecha(item.admision) }}

                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <img v-if="item.effective_imagen"
                                                            :src="asset('brochures_imagenes/' + item.effective_imagen)"
                                                            alt="Imagen" width="80"
                                                            style="border-radius: 8px; object-fit: cover; border: 1px solid #ddd;">

                                                        <span v-else class="text-muted">
                                                            No disponible
                                                        </span>
                                                    </td>

                                                    <td style="text-align: center">
                                                        <a v-if="item.effective_brochure"
                                                            :href="asset('brochures_carreras/' + item.effective_brochure)"
                                                            target="_blank" class="btn btn-warning"
                                                            title="Ver Brochure">
                                                            <i class="fa fa-file-pdf-o"></i>
                                                        </a>

                                                        <span v-else class="text-muted">
                                                            No disponible
                                                        </span>
                                                    </td>

                                                    <td style="text-align: center" class="text-nowrap col-acciones">
                                                        <a href="javascript:;" @click="showEdit(item)"
                                                            class="btn btn-info esp-dere" title="Editar página completa">
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
                            <div class="modal fade" id="mdlNuevaCarrera" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <form v-on:submit.prevent="storeCarrera()" enctype="multipart/form-data">

                                            <div class="modal-header">
                                                <h4 class="modal-title">Agregar Carrera</h4> <button type="button"
                                                    data-dismiss="modal" aria-label="Close" class="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-5  ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Categoría<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <select v-model="carrera.categoria_id" required
                                                                    class="form-control">
                                                                    <option value="">Seleccionar Categoría</option>

                                                                    <option v-for="categoria in categorias"
                                                                        :key="categoria.id" :value="categoria.id">
                                                                        {{ categoria.nivel_academico.nombre }}
                                                                        {{ categoria.padre ? ' - ' +
                                                                            categoria.padre.nombre : '' }}
                                                                        - {{ categoria.nombre }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5 mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Nombre<span style="color: red;">
                                                                        *</span></label>
                                                                <input type="text" v-model="carrera.nombre" required
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Descripción<span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                                <textarea v-model="carrera.descripcion" required
                                                                    class="form-control" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5 ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Adminsión</label>
                                                                <input type="date" v-model="carrera.admision"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 mr-auto ">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Duración</label>
                                                                <input type="text" v-model="carrera.duracion"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5  ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Grado Obtenido</label>
                                                                <textarea v-model="carrera.grado_obtenido" id=""
                                                                    class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 mr-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Titulación</label>
                                                                <textarea v-model="carrera.titulacion"
                                                                    class="form-control" id=""></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Modalidades</label>
                                                                <textarea v-model="carrera.modalidades" id=""
                                                                    class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Imagen banner (hero)</label>
                                                                <input type="file" class="dropify" @change="imagen_banner"
                                                                    accept=".jpg,.jpeg,.png,.webp"
                                                                    data-allowed-file-extensions="jpg jpeg png webp"
                                                                    name="imagen_banner">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Imagen sidebar</label>
                                                                <input type="file" class="dropify" @change="imagen"
                                                                    accept=".jpg,.jpeg,.png"
                                                                    data-allowed-file-extensions="jpg jpeg png"
                                                                    name="imagen">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Brochure (PDF)</label>
                                                                <input type="file" class="dropify" accept=".pdf"
                                                                    @change="brochure"
                                                                    data-allowed-file-extensions="pdf"
                                                                    data-max-file-size="100M" name="brochure">
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
                            <div class="modal fade" id="modEditarCarreraCompleta" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document" style="max-width:960px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                Editar página de carrera
                                                <small class="text-muted d-block" v-if="carrera.nombre">{{ carrera.nombre }}</small>
                                            </h4>
                                            <button type="button" data-dismiss="modal" class="close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="nav nav-tabs mb-3">
                                                <li class="nav-item">
                                                    <a class="nav-link" :class="{ active: tabActiva === 'general' }" href="javascript:;" @click="cambiarTab('general')">Información general</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" :class="{ active: tabActiva === 'descripcion' }" href="javascript:;" @click="cambiarTab('descripcion')">Descripción</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" :class="{ active: tabActiva === 'malla' }" href="javascript:;" @click="cambiarTab('malla')">Malla curricular</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" :class="{ active: tabActiva === 'perfil' }" href="javascript:;" @click="cambiarTab('perfil')">Perfil de egresado</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" :class="{ active: tabActiva === 'docentes' }" href="javascript:;" @click="cambiarTab('docentes')">Docentes</a>
                                                </li>
                                            </ul>

                                            <!-- Tab: Información general -->
                                            <div v-show="tabActiva === 'general'">
                                                <form @submit.prevent="updateCarrera">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Categoría <span style="color:red">*</span></label>
                                                                <select v-model="carrera.categoria_id" required class="form-control">
                                                                    <option value="">Seleccionar Categoría</option>
                                                                    <option v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">
                                                                        {{ categoria.nivel_academico.nombre }}
                                                                        {{ categoria.padre ? ' - ' + categoria.padre.nombre : '' }}
                                                                        - {{ categoria.nombre }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Nombre <span style="color:red">*</span></label>
                                                                <input type="text" v-model="carrera.nombre" required class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Descripción corta (hero) <span style="color:red">*</span></label>
                                                                <textarea v-model="carrera.descripcion" required class="form-control" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Admisión</label>
                                                                <input type="date" v-model="carrera.admision" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Duración</label>
                                                                <input type="text" v-model="carrera.duracion" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Grado obtenido</label>
                                                                <textarea v-model="carrera.grado_obtenido" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Titulación</label>
                                                                <textarea v-model="carrera.titulacion" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Modalidades</label>
                                                                <textarea v-model="carrera.modalidades" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div v-if="esPregrado(carrera)" class="col-12">
                                                            <div class="alert alert-info py-2 mb-0">
                                                                La imagen sidebar y el brochure se comparten con la misma carrera de <strong>Pregrado Puede</strong>.
                                                                Sube los archivos solo en Pregrado Puede; aquí se mostrarán automáticamente.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Imagen banner (hero)</label>
                                                                <input type="file" class="dropify dropify-edit-banner" @change="imagen_banner_edit" accept=".jpg,.jpeg,.png,.webp" data-allowed-file-extensions="jpg jpeg png webp" name="imagen_banner">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Imagen sidebar</label>
                                                                <input type="file" class="dropify dropify-edit-imagen" @change="imagen_edit" accept=".jpg,.jpeg,.png" data-allowed-file-extensions="jpg jpeg png" name="imagen">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Brochure (PDF)</label>
                                                                <input type="file" class="dropify dropify-edit-brochure" accept=".pdf" @change="brochure_edit" data-allowed-file-extensions="pdf" data-max-file-size="100M" name="brochure">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary">Guardar información general</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab: Descripción -->
                                            <div v-show="tabActiva === 'descripcion'">
                                                <form @submit.prevent="guardarDetalle">
                                                    <div class="form-group">
                                                        <label>Descripción extendida</label>
                                                        <textarea v-model="detalle.descripcion" class="form-control" rows="4"></textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <label>Oportunidades en el mercado</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" v-model="nuevaOportunidad" @keyup.enter.prevent="agregarOportunidad">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-success" @click="agregarOportunidad">Agregar</button>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3">
                                                            <span v-for="(item, index) in detalle.oportunidades" :key="index" class="badge badge-primary mr-2">
                                                                {{ item }}
                                                                <i class="fa fa-times ml-1" style="cursor:pointer" @click="eliminarOportunidad(index)"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <label>Preguntas frecuentes</label>
                                                        <div v-for="(faq, index) in detalle.preguntas" :key="index" class="border rounded p-3 mb-3">
                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                <strong>Pregunta / Respuesta</strong>
                                                                <div>
                                                                    <button type="button" class="btn btn-info btn-sm esp-dere" @click="faq.collapsed = !faq.collapsed">
                                                                        <i class="fa" :class="faq.collapsed ? 'fa-plus' : 'fa-minus'"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger btn-sm" @click="eliminarFaq(index)">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div v-show="!faq.collapsed">
                                                                <div class="form-group">
                                                                    <input v-model="faq.pregunta" class="form-control" placeholder="Pregunta">
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea v-model="faq.respuesta" class="form-control" rows="3" placeholder="Respuesta"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-success" @click="agregarFaq">
                                                            <i class="fa fa-plus"></i> Agregar pregunta
                                                        </button>
                                                    </div>
                                                    <div class="text-right mt-3">
                                                        <button type="submit" class="btn btn-primary">Guardar descripción</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab: Malla curricular -->
                                            <div v-show="tabActiva === 'malla'">
                                                <form @submit.prevent="guardarMalla">
                                                    <div v-for="(item, index) in malla" :key="index" class="border rounded p-3 mb-3">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <strong>Ciclo</strong>
                                                            <div>
                                                                <button type="button" class="btn btn-info btn-sm esp-dere" @click="item.collapsed = !item.collapsed">
                                                                    <i class="fa" :class="item.collapsed ? 'fa-plus' : 'fa-minus'"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-danger btn-sm" @click="eliminarMalla(index)">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div v-show="!item.collapsed">
                                                            <div class="form-group">
                                                                <input v-model="item.ciclo" type="text" class="form-control" placeholder="Ciclo">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea v-model="item.descripcion" rows="3" class="form-control" placeholder="Descripción"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Cursos</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" placeholder="Agregar curso" @keyup.enter.prevent="agregarCurso(item, $event)">
                                                                    <div class="input-group-append">
                                                                        <button type="button" class="btn btn-success" @click="agregarCurso(item, $event)">Agregar</button>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <span v-for="(curso, cursoIndex) in item.cursos" :key="cursoIndex" class="badge badge-primary mr-2">
                                                                        {{ curso }}
                                                                        <i class="fa fa-times ml-1" style="cursor:pointer" @click="item.cursos.splice(cursoIndex, 1)"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-success" @click="agregarMalla">
                                                        <i class="fa fa-plus"></i> Agregar ciclo
                                                    </button>
                                                    <div class="text-right mt-3">
                                                        <button type="submit" class="btn btn-primary">Guardar malla curricular</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab: Perfil de egresado -->
                                            <div v-show="tabActiva === 'perfil'">
                                                <form @submit.prevent="guardarPerfil">
                                                    <div class="form-group">
                                                        <label>Descripción del perfil de egresado</label>
                                                        <textarea v-model="perfil.descripcion" class="form-control" rows="10" required></textarea>
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary">Guardar perfil de egresado</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab: Docentes -->
                                            <div v-show="tabActiva === 'docentes'">
                                                <form @submit.prevent="guardarDocentes">
                                                    <div class="form-group">
                                                        <label>Buscar y asignar docentes</label>
                                                        <select id="selectDocentesCarrera" class="form-control" multiple style="width:100%">
                                                            <option v-for="docente in docentesDisponibles" :key="docente.id" :value="docente.id">
                                                                {{ docente.nombre }}{{ docente.correo ? ` — ${docente.correo}` : '' }}{{ docente.departamento ? ` · ${docente.departamento}` : '' }}
                                                            </option>
                                                        </select>
                                                        <small class="text-muted">Los datos del docente (foto, bio, etc.) se editan en <strong>Docentes</strong>.</small>
                                                    </div>
                                                    <div v-if="docentesSeleccionadosInfo.length" class="mt-3">
                                                        <p class="mb-2"><strong>Docentes asignados:</strong></p>
                                                        <div class="d-flex flex-wrap" style="gap:8px;">
                                                            <span v-for="d in docentesSeleccionadosInfo" :key="d.id" class="badge badge-light border p-2">
                                                                {{ d.nombre }}
                                                                <i class="fa fa-times ml-1" style="cursor:pointer" @click="quitarDocente(d.id)"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="text-right mt-3">
                                                        <button type="submit" class="btn btn-primary">Guardar docentes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
            carreras: [],
            categorias: [],
            carrera: {},
            detalle: {
                descripcion: '',
                oportunidades: [],
                preguntas: []
            },

            nuevaOportunidad: '',
            malla: [],
            perfil: {
                descripcion: ''
            },
            nuevoCurso: '',
            tagifyCreate: null,
            tagifyEdit: null,
            docentesDisponibles: [],
            docentesSeleccionados: [],
            tabActiva: 'general',

        }
    },
    computed: {
        docentesSeleccionadosInfo() {
            if (!this.docentesSeleccionados.length || !this.docentesDisponibles.length) return [];
            const ids = this.docentesSeleccionados.map(Number);
            return this.docentesDisponibles.filter(d => ids.includes(d.id));
        },
    },
    mounted() {
        this.getCarreras();
        this.getCategorias();
        this.getDocentesCatalogo();
        this._editorCreate = null;
        this._editorEdit = null;
    },
    methods: {
        esPregrado(carrera) {
            const nivelId = carrera?.categoria?.nivel_academico_id
                ?? carrera?.categoria?.nivel_academico?.id;

            return Number(nivelId) === 3;
        },
        resetForm() {
            this.carrera = {
                id: null,
                categoria_id: '',
                nombre: '',
                descripcion: '',
                admision: '',
                duracion: '',
                grado_obtenido: '',
                titulacion: '',
                modalidades: '',
                brochure: null,
                imagen: null,
                imagen_banner: null,
            };

        },
        cargarDatosCompletos(item) {
            this.carrera = { ...item };

            this.detalle = {
                descripcion: item.detalle_descripcion?.descripcion ?? '',
                oportunidades: item.detalle_descripcion?.oportunidades ?? [],
                preguntas: item.preguntas?.map(p => ({
                    pregunta: p.pregunta ?? '',
                    respuesta: p.respuesta ?? '',
                    collapsed: true
                })) ?? []
            };

            this.malla = item.malla?.length
                ? item.malla.map(m => ({
                    ciclo: m.ciclo ?? '',
                    descripcion: m.descripcion === 'null' ? '' : m.descripcion ?? '',
                    cursos: m.cursos ?? [],
                    collapsed: true
                }))
                : [{
                    ciclo: '',
                    descripcion: '',
                    cursos: [],
                    collapsed: false
                }];

            this.perfil = {
                descripcion: item.perfil_egresado?.descripcion ?? ''
            };

            this.docentesSeleccionados = item.docentes?.length
                ? item.docentes.map(d => String(d.id))
                : [];
        },
        initDropifyEdit(item) {
            this.$nextTick(() => {
                this.initDropifyField('.dropify-edit-imagen', item.effective_imagen
                    ? this.asset('brochures_imagenes/' + item.effective_imagen) : '');
                this.initDropifyField('.dropify-edit-banner', item.imagen_banner
                    ? this.asset('brochures_imagenes/' + item.imagen_banner) : '');
                this.initDropifyField('.dropify-edit-brochure', item.effective_brochure
                    ? this.asset('brochures_carreras/' + item.effective_brochure) : '');
            });
        },
        initDropifyField(selector, defaultFile) {
            const $el = $(selector);
            if (!$el.length) return;
            if ($el.data('dropify')) {
                $el.data('dropify').destroy();
                $el.removeData('dropify');
            }
            $el.dropify({ defaultFile });
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
        getCarreras() {
            axios.get(route('carreras.get')).then((response) => {
                this.destroyDatatable();
                this.carreras = response.data;
                this.initDatatable();
            }).catch(error => {
                console.log('Error en el Servidor');
            })
        },
        getCategorias() {
            axios.get(route('categorias.get')).then((response) => {

                this.categorias = response.data;

            }).catch(error => {
                console.log('Error en el Servidor');
            })
        },
        showNuevo() {
            this.resetForm();
            this.initDropify();
            $("#mdlNuevaCarrera").modal('show');

        },

        showEdit(item, tab = 'general') {
            this.cargarDatosCompletos(item);
            this.tabActiva = tab;
            this.initDropifyEdit(item);
            $('#modEditarCarreraCompleta').modal('show');
            if (tab === 'docentes') {
                $('#modEditarCarreraCompleta').one('shown.bs.modal', () => {
                    this.$nextTick(() => this.initSelectDocentes());
                });
            }
        },

        cambiarTab(tab) {
            this.tabActiva = tab;
            if (tab === 'docentes') {
                this.$nextTick(() => this.initSelectDocentes());
            }
        },
        quitarDocente(id) {
            this.docentesSeleccionados = this.docentesSeleccionados.filter(d => String(d) !== String(id));
            const $select = $('#selectDocentesCarrera');
            if ($select.hasClass('select2-hidden-accessible')) {
                $select.val(this.docentesSeleccionados).trigger('change');
            }
        },
        getDocentesCatalogo() {
            axios.get(route('docentes.get')).then((response) => {
                this.docentesDisponibles = response.data;
            }).catch(() => {
                toastr.error('No se pudo cargar el catálogo de docentes');
            });
        },
        initSelectDocentes() {
            const $select = $('#selectDocentesCarrera');

            if ($select.hasClass('select2-hidden-accessible')) {
                $select.off('change.docentes');
                $select.select2('destroy');
            }

            $select.val(this.docentesSeleccionados);

            $select.select2({
                placeholder: 'Escribe para buscar docente...',
                allowClear: true,
                width: '100%',
                dropdownParent: $('#modEditarCarreraCompleta'),
                language: {
                    noResults: () => 'No se encontraron docentes',
                    searching: () => 'Buscando...',
                },
            });

            $select.on('change.docentes', () => {
                this.docentesSeleccionados = $select.val() || [];
            });
        },
        destroySelectDocentes() {
            const $select = $('#selectDocentesCarrera');
            if ($select.hasClass('select2-hidden-accessible')) {
                $select.off('change.docentes');
                $select.select2('destroy');
            }
        },

        storeCarrera() {

            let formData = new FormData();
            formData.append('categoria_id', this.carrera.categoria_id);
            formData.append('nombre', this.carrera.nombre);
            formData.append('descripcion', this.carrera.descripcion);
            this.appendIfPresent(formData, 'admision', this.carrera.admision);
            formData.append('duracion', this.carrera.duracion);
            formData.append('grado_obtenido', this.carrera.grado_obtenido);
            formData.append('titulacion', this.carrera.titulacion);
            formData.append('modalidades', this.carrera.modalidades);
            this.appendFileIfSelected(formData, 'brochure', this.carrera.brochure);
            this.appendFileIfSelected(formData, 'imagen', this.carrera.imagen);
            this.appendFileIfSelected(formData, 'imagen_banner', this.carrera.imagen_banner);
            axios.post(route('carreras.store'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'CARRERA AGREGADA',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.getCarreras();
                    $('#mdlNuevaCarrera').modal('hide');
                    this.resetForm();
                } else {
                    toastr.warning("No se pudo registrar la Carrera");
                }
            }).catch(error => {
                toastr.error("No se pudo registrar la Carrera, problema de servidor");
                console.log(error);
            });
        },

        updateCarrera() {
            let formData = new FormData();
            formData.append('id', this.carrera.id);
            formData.append('categoria_id', this.carrera.categoria_id);
            formData.append('nombre', this.carrera.nombre);
            formData.append('descripcion', this.carrera.descripcion);
            this.appendIfPresent(formData, 'admision', this.carrera.admision);
            formData.append('duracion', this.carrera.duracion);
            formData.append('grado_obtenido', this.carrera.grado_obtenido);
            formData.append('titulacion', this.carrera.titulacion);
            formData.append('modalidades', this.carrera.modalidades);
            this.appendFileIfSelected(formData, 'brochure', this.carrera.brochure);
            this.appendFileIfSelected(formData, 'imagen', this.carrera.imagen);
            this.appendFileIfSelected(formData, 'imagen_banner', this.carrera.imagen_banner);
            axios.post(route('carreras.edit'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'INFORMACIÓN GUARDADA',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.getCarreras();
                } else {
                    toastr.error('No se actualizo la Carrera');
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
                    axios.post(route('carreras.delete', id))
                        .then((response) => {
                            if (response.data) {
                                this.getCarreras();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'CARRERA ELIMINADA',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                this.resetForm();
                            } else {
                                toastr.warning("No se pudo eliminar la Carrera");
                            }
                        }).catch(error => {
                            toastr.error("Error al eliminar la Carrera");
                            console.log(error);
                        });
                }
            });
        },

        appendFileIfSelected(formData, key, value) {
            if (value instanceof File) {
                formData.append(key, value);
            }
        },

        appendIfPresent(formData, key, value) {
            if (value !== null && value !== undefined && value !== '' && value !== 'null') {
                formData.append(key, value);
            }
        },

        imagen(event) {
            const file = event.target.files?.[0];
            if (file) {
                this.carrera.imagen = file;
            }
        },

        imagen_edit(event) {
            const file = event.target.files?.[0];
            if (file) {
                this.carrera.imagen = file;
            }
        },

        imagen_banner(event) {
            const file = event.target.files?.[0];
            if (file) {
                this.carrera.imagen_banner = file;
            }
        },

        imagen_banner_edit(event) {
            const file = event.target.files?.[0];
            if (file) {
                this.carrera.imagen_banner = file;
            }
        },

        brochure(event) {
            const file = event.target.files?.[0];
            if (file) {
                this.carrera.brochure = file;
            }
        },

        brochure_edit(event) {
            const file = event.target.files?.[0];
            if (file) {
                this.carrera.brochure = file;
            }
        },

        agregarFaq() {

            this.detalle.preguntas.push({
                pregunta: '',
                respuesta: '',
                collapsed: false
            });

        },

        eliminarFaq(index) {

            this.detalle.preguntas.splice(index, 1);

        },

        agregarOportunidad() {

            if (!this.nuevaOportunidad.trim()) return;

            this.detalle.oportunidades.push(
                this.nuevaOportunidad.trim()
            );

            this.nuevaOportunidad = '';

        },

        eliminarOportunidad(index) {

            this.detalle.oportunidades.splice(index, 1);

        },

        guardarDetalle() {

            let formData = new FormData();

            formData.append(
                'carrera_id',
                this.carrera.id
            );

            formData.append(
                'descripcion',
                this.detalle.descripcion
            );

            formData.append(
                'oportunidades',
                JSON.stringify(
                    this.detalle.oportunidades
                )
            );

            this.detalle.preguntas.forEach(item => {

                formData.append(
                    'pregunta[]',
                    item.pregunta
                );

                formData.append(
                    'respuesta[]',
                    item.respuesta
                );

            });

            axios.post(
                route('carreras.descripcion.store'),
                formData
            )
                .then((response) => {

                    Swal.fire({
                        icon: 'success',
                        title: 'DESCRIPCION GUARDADA',
                        showConfirmButton: false,
                        timer: 1500
                    });


                    this.getCarreras();

                })
                .catch((error) => {

                    console.log(error);

                    toastr.error(
                        'Error al guardar'
                    );

                });

        },
        agregarMalla() {

            this.malla.push({
                ciclo: '',
                descripcion: '',
                cursos: [],
                collapsed: false
            });

        },
        eliminarMalla(index) {

            this.malla.splice(index, 1);

        },
        agregarCurso(item, event) {

            const input =
                event.target
                    .closest('.input-group')
                    .querySelector('input');

            const valor =
                input.value.trim();

            if (!valor) return;

            item.cursos.push(valor);

            input.value = '';

        },
        guardarMalla() {

            let formData = new FormData();

            formData.append(
                'carrera_id',
                this.carrera.id
            );

            this.malla.forEach(item => {

                formData.append(
                    'ciclo[]',
                    item.ciclo
                );

                formData.append(
                    'descripcion[]',
                    item.descripcion
                );

                formData.append(
                    'cursos[]',
                    JSON.stringify(item.cursos)
                );

            });

            axios.post(
                route('carreras.malla.store'),
                formData
            )
                .then(() => {

                    Swal.fire({
                        icon: 'success',
                        title: 'MALLA GUARDADA',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    this.getCarreras();

                })
                .catch(error => {

                    console.log(error);

                    toastr.error(
                        'Error al guardar'
                    );

                });

        },
        guardarPerfil() {

            let formData = new FormData();

            formData.append(
                'carrera_id',
                this.carrera.id
            );

            formData.append(
                'descripcion',
                this.perfil.descripcion
            );

            axios.post(
                route('carreras.perfil.store'),
                formData
            )
                .then(() => {

                    Swal.fire({
                        icon: 'success',
                        title: 'PERFIL GUARDADO',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    this.getCarreras();

                })
                .catch(error => {

                    console.log(error);

                    toastr.error(
                        'Error al guardar'
                    );

                });

        },
        guardarDocentes() {

            let formData = new FormData();

            formData.append(
                'carrera_id',
                this.carrera.id
            );

            (this.docentesSeleccionados || []).forEach((docenteId) => {
                formData.append('docente_ids[]', docenteId);
            });

            axios.post(
                route('carreras.docente.store'),
                formData
            )
                .then(() => {

                    Swal.fire({
                        icon: 'success',
                        title: 'DOCENTES GUARDADOS',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    this.getCarreras();
                    this.destroySelectDocentes();

                });

        }
    }
}
</script>