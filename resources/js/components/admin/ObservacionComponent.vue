<template>
    <div class="obs-kanban">
        <div class="obs-stats card">
            <div class="body">
                <div class="row text-center">
                    <div class="col"><strong>{{ meta.totales.total }}</strong><br><small>Total</small></div>
                    <div class="col"><strong>{{ meta.totales.pendientes }}</strong><br><small>Pendientes</small></div>
                    <div class="col"><strong>{{ meta.totales.en_progreso }}</strong><br><small>En progreso</small></div>
                    <div class="col"><strong>{{ meta.totales.hechas }}</strong><br><small>Hechas</small></div>
                    <div class="col"><strong>{{ meta.totales.sin_asignar }}</strong><br><small>Sin asignar</small></div>
                    <div class="col"><strong>{{ meta.totales.duplicados }}</strong><br><small>Duplicados</small></div>
                </div>
            </div>
        </div>

        <div class="obs-toolbar card">
            <div class="body">
                <div class="row align-items-end">
                    <div class="col-md-2">
                        <label class="obs-label">Buscar</label>
                        <input v-model="filtros.busqueda" class="form-control" type="search" placeholder="Título o descripción…">
                    </div>
                    <div class="col-md-2">
                        <label class="obs-label">Área</label>
                        <select v-model="filtros.area" class="form-control">
                            <option value="">Todas</option>
                            <option v-for="a in meta.areas" :key="a" :value="a">{{ a }}</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="obs-label">Página</label>
                        <select v-model="filtros.pagina" class="form-control">
                            <option value="">Todas</option>
                            <option v-for="p in meta.paginas" :key="p" :value="p">{{ p }}</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="obs-label">Carpeta origen</label>
                        <select v-model="filtros.carpeta" class="form-control">
                            <option value="">Todas</option>
                            <option v-for="c in meta.carpetas" :key="c" :value="c">{{ c }}</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="obs-label">Asignado a</label>
                        <select v-model="filtros.asignado" class="form-control">
                            <option value="">Todos</option>
                            <option value="sin_asignar">Sin asignar</option>
                            <option value="yo">Asignadas a mí</option>
                            <option v-for="u in meta.usuarios" :key="u.id" :value="String(u.id)">{{ u.name }}</option>
                        </select>
                    </div>
                    <div class="col-md-2 text-right">
                        <span class="obs-stats">{{ filtradas.length }} visibles</span>
                        <div class="mt-2">
                            <button class="btn btn-success btn-sm" @click="abrirNueva">Nueva</button>
                            <button class="btn btn-secondary btn-sm" @click="reimportar">Reimportar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="obs-board">
            <div
                v-for="columna in columnas"
                :key="columna.key"
                class="obs-column"
                @dragover.prevent
                @drop="onDrop($event, columna.key)"
            >
                <div class="obs-column__head" :class="'obs-column__head--' + columna.key">
                    <strong>{{ columna.label }}</strong>
                    <span class="badge badge-light">{{ itemsPorEstado(columna.key).length }}</span>
                </div>

                <div class="obs-column__body">
                    <article
                        v-for="item in itemsPorEstado(columna.key)"
                        :key="item.id"
                        class="obs-card"
                        :class="cardClasses(item)"
                        draggable="true"
                        @dragstart="onDragStart(item)"
                        @click="abrirDetalle(item)"
                    >
                        <div class="obs-card__tags">
                            <span class="obs-tag obs-tag--carpeta" :title="item.carpeta_origen">
                                {{ acortar(item.carpeta_origen, 24) }}
                            </span>
                            <span class="obs-tag" :class="'obs-tag--prio-' + item.prioridad">{{ item.prioridad }}</span>
                            <span v-if="item.es_duplicado" class="obs-tag obs-tag--dup">Dup</span>
                        </div>
                        <h4 class="obs-card__title">{{ item.titulo }}</h4>
                        <p class="obs-card__meta">{{ item.area }} · {{ item.pagina }}</p>
                        <p class="obs-card__desc">{{ acortar(item.descripcion, 100) }}</p>
                        <div class="obs-card__footer">
                            <span v-if="item.asignado" class="obs-assignee" :title="item.asignado.name">
                                <i class="fa fa-user"></i> {{ acortar(item.asignado.name, 16) }}
                            </span>
                            <span v-else class="obs-assignee obs-assignee--empty">Sin asignar</span>
                            <span v-if="item.comentarios_count" class="obs-comments-count">
                                <i class="fa fa-comment-o"></i> {{ item.comentarios_count }}
                            </span>
                            <span v-if="item.fecha_limite" class="obs-due" :class="{ 'obs-due--late': esVencida(item) }">
                                <i class="fa fa-calendar"></i> {{ formatFecha(item.fecha_limite) }}
                            </span>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <div class="modal fade" id="mdlObservacion" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ form.id ? `Observación #${form.id}` : 'Nueva observación' }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Área</label>
                                        <input v-model="form.area" class="form-control" type="text">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Página</label>
                                        <input v-model="form.pagina" class="form-control" type="text">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Carpeta origen</label>
                                        <input v-model="form.carpeta_origen" class="form-control" type="text">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Título</label>
                                        <input v-model="form.titulo" class="form-control" type="text">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Descripción</label>
                                        <textarea v-model="form.descripcion" class="form-control" rows="6"></textarea>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Estado</label>
                                        <select v-model="form.estado" class="form-control">
                                            <option v-for="e in meta.estados" :key="e" :value="e">{{ labelEstado(e) }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Prioridad</label>
                                        <select v-model="form.prioridad" class="form-control">
                                            <option v-for="p in meta.prioridades" :key="p" :value="p">{{ p }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Fecha límite</label>
                                        <input v-model="form.fecha_limite" class="form-control" type="date">
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label>Asignado a</label>
                                        <select v-model="form.asignado_user_id" class="form-control">
                                            <option :value="null">Sin asignar</option>
                                            <option v-for="u in meta.usuarios" :key="u.id" :value="u.id">{{ u.name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group d-flex align-items-end">
                                        <button type="button" class="btn btn-outline-success btn-block" @click="asignarme">
                                            Asignarme a mí
                                        </button>
                                    </div>
                                    <div class="col-md-12 form-group" v-if="form.archivo_origen">
                                        <label>Archivo origen</label>
                                        <input v-model="form.archivo_origen" class="form-control" type="text" readonly>
                                    </div>
                                    <div class="col-md-12" v-if="form.es_duplicado && form.duplicado_de">
                                        <p class="text-warning mb-0">
                                            <i class="fa fa-copy"></i> Duplicado de la observación #{{ form.duplicado_de }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5" v-if="form.id">
                                <div class="obs-comments">
                                    <h5>Comentarios</h5>
                                    <div class="obs-comments__list">
                                        <div v-if="!comentarios.length" class="obs-comments__empty">
                                            Aún no hay comentarios. Usa el equipo para dejar avances, dudas o validaciones.
                                        </div>
                                        <article v-for="c in comentarios" :key="c.id" class="obs-comment">
                                            <div class="obs-comment__head">
                                                <strong>{{ c.user?.name || 'Usuario' }}</strong>
                                                <span>{{ formatFechaHora(c.created_at) }}</span>
                                                <button
                                                    v-if="c.user_id === currentUserId"
                                                    type="button"
                                                    class="btn btn-link btn-sm text-danger p-0"
                                                    @click="eliminarComentario(c.id)"
                                                >Eliminar</button>
                                            </div>
                                            <p>{{ c.comentario }}</p>
                                        </article>
                                    </div>
                                    <div class="obs-comments__form">
                                        <textarea
                                            v-model="nuevoComentario"
                                            class="form-control"
                                            rows="3"
                                            placeholder="Escribe un comentario: avance, bloqueo, validación…"
                                        ></textarea>
                                        <button type="button" class="btn btn-success btn-sm mt-2" @click="enviarComentario">
                                            Publicar comentario
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button v-if="form.id" type="button" class="btn btn-danger mr-auto" @click="eliminar">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success" @click="guardar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

const COLUMNAS = [
    { key: 'pendiente', label: 'Pendiente' },
    { key: 'en_progreso', label: 'En progreso' },
    { key: 'en_revision', label: 'En revisión' },
    { key: 'hecho', label: 'Hecho' },
    { key: 'rechazado', label: 'Rechazado' },
];

const FORM_VACIO = () => ({
    id: null,
    area: '',
    pagina: '',
    carpeta_origen: '',
    titulo: '',
    descripcion: '',
    tipo: 'observación',
    archivo_origen: '',
    estado: 'pendiente',
    prioridad: 'media',
    asignado_user_id: null,
    fecha_limite: null,
    es_duplicado: false,
    duplicado_de: null,
});

export default {
    props: {
        currentUserId: { type: Number, default: 0 },
        currentUserName: { type: String, default: '' },
    },
    data() {
        return {
            observaciones: [],
            comentarios: [],
            nuevoComentario: '',
            meta: {
                estados: COLUMNAS.map((c) => c.key),
                prioridades: ['baja', 'media', 'alta'],
                areas: [],
                paginas: [],
                carpetas: [],
                usuarios: [],
                totales: { total: 0, duplicados: 0, pendientes: 0, en_progreso: 0, hechas: 0, sin_asignar: 0 },
            },
            filtros: {
                busqueda: '',
                area: '',
                pagina: '',
                carpeta: '',
                asignado: '',
            },
            columnas: COLUMNAS,
            dragging: null,
            form: FORM_VACIO(),
        };
    },
    computed: {
        filtradas() {
            const q = this.filtros.busqueda.trim().toLowerCase();

            return this.observaciones.filter((item) => {
                if (this.filtros.area && item.area !== this.filtros.area) return false;
                if (this.filtros.pagina && item.pagina !== this.filtros.pagina) return false;
                if (this.filtros.carpeta && item.carpeta_origen !== this.filtros.carpeta) return false;

                if (this.filtros.asignado === 'sin_asignar' && item.asignado_user_id) return false;
                if (this.filtros.asignado === 'yo' && item.asignado_user_id !== this.currentUserId) return false;
                if (this.filtros.asignado && !['sin_asignar', 'yo'].includes(this.filtros.asignado)) {
                    if (String(item.asignado_user_id) !== this.filtros.asignado) return false;
                }

                if (q) {
                    const hay = `${item.titulo} ${item.descripcion} ${item.area} ${item.pagina}`.toLowerCase();
                    if (!hay.includes(q)) return false;
                }

                return true;
            });
        },
    },
    mounted() {
        this.cargar();
    },
    methods: {
        cargar() {
            Promise.all([
                axios.get(route('observaciones.get')),
                axios.get(route('observaciones.meta')),
            ]).then(([obsRes, metaRes]) => {
                this.observaciones = obsRes.data;
                this.meta = metaRes.data;
            }).catch(() => {
                toastr.error('No se pudieron cargar las observaciones');
            });
        },
        itemsPorEstado(estado) {
            return this.filtradas.filter((item) => item.estado === estado);
        },
        cardClasses(item) {
            return {
                'obs-card--dup': item.es_duplicado,
                'obs-card--alta': item.prioridad === 'alta',
                'obs-card--mine': item.asignado_user_id === this.currentUserId,
            };
        },
        labelEstado(estado) {
            const map = {
                pendiente: 'Pendiente',
                en_progreso: 'En progreso',
                en_revision: 'En revisión',
                hecho: 'Hecho',
                rechazado: 'Rechazado',
            };
            return map[estado] || estado;
        },
        acortar(texto, max) {
            if (!texto) return '';
            return texto.length > max ? `${texto.slice(0, max)}…` : texto;
        },
        formatFecha(fecha) {
            if (!fecha) return '';
            return new Date(fecha).toLocaleDateString('es-PE', { day: '2-digit', month: 'short' });
        },
        formatFechaHora(fecha) {
            if (!fecha) return '';
            return new Date(fecha).toLocaleString('es-PE', {
                day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit',
            });
        },
        esVencida(item) {
            if (!item.fecha_limite || ['hecho', 'rechazado'].includes(item.estado)) return false;
            return new Date(item.fecha_limite) < new Date();
        },
        onDragStart(item) {
            this.dragging = item;
        },
        onDrop(event, estado) {
            event.preventDefault();
            if (!this.dragging || this.dragging.estado === estado) {
                this.dragging = null;
                return;
            }

            const item = this.dragging;
            this.dragging = null;

            axios.post(route('observaciones.estado'), { id: item.id, estado }).then(() => {
                item.estado = estado;
                this.cargarMeta();
                toastr.success('Estado actualizado');
            }).catch(() => toastr.error('No se pudo actualizar el estado'));
        },
        cargarMeta() {
            axios.get(route('observaciones.meta')).then((res) => {
                this.meta.totales = res.data.totales;
            });
        },
        abrirDetalle(item) {
            this.form = {
                ...item,
                asignado_user_id: item.asignado_user_id || null,
                fecha_limite: item.fecha_limite ? item.fecha_limite.substring(0, 10) : null,
            };
            this.nuevoComentario = '';
            this.comentarios = [];
            if (item.id) this.cargarComentarios(item.id);
            $('#mdlObservacion').modal('show');
        },
        abrirNueva() {
            this.form = FORM_VACIO();
            this.comentarios = [];
            this.nuevoComentario = '';
            $('#mdlObservacion').modal('show');
        },
        asignarme() {
            this.form.asignado_user_id = this.currentUserId;
        },
        cargarComentarios(id) {
            axios.get(route('observaciones.comentarios.get', id)).then((res) => {
                this.comentarios = res.data;
            });
        },
        enviarComentario() {
            if (!this.form.id || !this.nuevoComentario.trim()) return;

            axios.post(route('observaciones.comentarios.store'), {
                observacion_id: this.form.id,
                comentario: this.nuevoComentario.trim(),
            }).then((res) => {
                this.comentarios.unshift(res.data);
                this.nuevoComentario = '';
                const obs = this.observaciones.find((o) => o.id === this.form.id);
                if (obs) obs.comentarios_count = (obs.comentarios_count || 0) + 1;
                toastr.success('Comentario publicado');
            }).catch(() => toastr.error('No se pudo publicar el comentario'));
        },
        eliminarComentario(id) {
            axios.post(route('observaciones.comentarios.delete', id)).then(() => {
                this.comentarios = this.comentarios.filter((c) => c.id !== id);
                const obs = this.observaciones.find((o) => o.id === this.form.id);
                if (obs && obs.comentarios_count > 0) obs.comentarios_count -= 1;
            }).catch(() => toastr.error('No se pudo eliminar el comentario'));
        },
        guardar() {
            const payload = { ...this.form };
            const request = payload.id
                ? axios.post(route('observaciones.edit'), payload)
                : axios.post(route('observaciones.store'), payload);

            request.then(() => {
                $('#mdlObservacion').modal('hide');
                this.cargar();
                toastr.success('Observación guardada');
            }).catch(() => toastr.error('No se pudo guardar la observación'));
        },
        eliminar() {
            Swal.fire({
                title: '¿Eliminar observación?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (!result.value) return;
                axios.post(route('observaciones.delete', this.form.id)).then(() => {
                    $('#mdlObservacion').modal('hide');
                    this.cargar();
                    toastr.success('Observación eliminada');
                }).catch(() => toastr.error('No se pudo eliminar'));
            });
        },
        reimportar() {
            Swal.fire({
                title: '¿Reimportar desde JSON?',
                text: 'Se borrarán las observaciones actuales y se cargarán de nuevo.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, reimportar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (!result.value) return;
                axios.post(route('observaciones.reimport')).then((res) => {
                    this.cargar();
                    toastr.success(`Reimportadas ${res.data.total} observaciones`);
                }).catch(() => toastr.error('No se pudo reimportar'));
            });
        },
    },
};
</script>

<style scoped>
.obs-kanban { padding-bottom: 24px; }
.obs-stats.card { margin-bottom: 12px; }
.obs-stats.card strong { font-size: 22px; color: #91001E; }
.obs-toolbar { margin-bottom: 16px; }
.obs-label { display: block; font-size: 12px; font-weight: 700; margin-bottom: 4px; color: #20272f; }
.obs-board { display: grid; grid-template-columns: repeat(5, minmax(240px, 1fr)); gap: 12px; overflow-x: auto; }
.obs-column { background: #f4f5f7; border-radius: 10px; min-height: 460px; display: flex; flex-direction: column; }
.obs-column__head { display: flex; align-items: center; justify-content: space-between; padding: 12px 14px; border-radius: 10px 10px 0 0; color: #fff; font-size: 13px; }
.obs-column__head--pendiente { background: #6c757d; }
.obs-column__head--en_progreso { background: #007bff; }
.obs-column__head--en_revision { background: #fd7e14; }
.obs-column__head--hecho { background: #28a745; }
.obs-column__head--rechazado { background: #91001E; }
.obs-column__body { padding: 10px; flex: 1; overflow-y: auto; max-height: calc(100vh - 340px); }
.obs-card { background: #fff; border-radius: 8px; padding: 12px; margin-bottom: 10px; box-shadow: 0 2px 8px rgba(0,0,0,.08); cursor: grab; border-left: 4px solid #91001E; }
.obs-card--dup { border-left-color: #fd7e14; }
.obs-card--alta { box-shadow: 0 0 0 1px rgba(220,53,69,.25), 0 2px 8px rgba(0,0,0,.08); }
.obs-card--mine { background: #fff9fb; }
.obs-card__tags { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 8px; }
.obs-tag { display: inline-block; padding: 2px 8px; border-radius: 999px; font-size: 10px; font-weight: 700; text-transform: uppercase; }
.obs-tag--carpeta { background: #eef2ff; color: #334155; }
.obs-tag--dup { background: #fff3cd; color: #856404; }
.obs-tag--prio-baja { background: #e9ecef; color: #495057; }
.obs-tag--prio-media { background: #fff3cd; color: #856404; }
.obs-tag--prio-alta { background: #f8d7da; color: #842029; }
.obs-card__title { margin: 0 0 6px; font-size: 13px; font-weight: 700; color: #20272f; line-height: 1.35; }
.obs-card__meta { margin: 0 0 8px; font-size: 11px; color: #6b7280; }
.obs-card__desc { margin: 0 0 10px; font-size: 12px; color: #4b5563; line-height: 1.45; }
.obs-card__footer { display: flex; flex-wrap: wrap; gap: 8px; font-size: 11px; color: #6b7280; }
.obs-assignee { font-weight: 600; }
.obs-assignee--empty { color: #adb5bd; font-style: italic; font-weight: 400; }
.obs-comments-count { color: #91001E; font-weight: 700; }
.obs-due--late { color: #dc3545; font-weight: 700; }
.obs-comments { background: #f8f9fa; border-radius: 10px; padding: 16px; height: 100%; }
.obs-comments h5 { margin: 0 0 12px; font-size: 15px; font-weight: 700; }
.obs-comments__list { max-height: 360px; overflow-y: auto; margin-bottom: 12px; }
.obs-comments__empty { font-size: 13px; color: #6c757d; margin-bottom: 12px; }
.obs-comment { background: #fff; border-radius: 8px; padding: 10px 12px; margin-bottom: 8px; border: 1px solid #e9ecef; }
.obs-comment__head { display: flex; align-items: center; gap: 8px; margin-bottom: 6px; font-size: 11px; color: #6c757d; }
.obs-comment__head strong { color: #20272f; font-size: 12px; }
.obs-comment p { margin: 0; font-size: 13px; line-height: 1.45; white-space: pre-wrap; }
</style>
