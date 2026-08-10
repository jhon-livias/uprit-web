<template>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <span style="font-weight:bold; color: #20272f; font-size: 24px;">Menú de navegación web</span>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="alert alert-info mb-0">
                                Las carreras de Pregrado, Pregrado Puede y Posgrado se gestionan en
                                <strong>Categorías</strong> y <strong>Carreras</strong>.
                                Aquí puedes editar etiquetas, visibilidad, orden y enlaces de las demás secciones.
                            </div>
                        </div>
                    </div>

                    <div v-if="groups.length === 0" class="alert alert-warning">
                        No hay datos de menú. Ejecuta en el servidor:
                        <code>php artisan migrate</code> y luego
                        <code>php artisan nav:import-legacy</code>
                    </div>

                    <div v-for="group in groups" :key="group.id" class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-start flex-wrap">
                            <div class="mb-2 mb-md-0">
                                <strong>{{ group.label }}</strong>
                                <small class="text-muted d-block">
                                    {{ group.key }} · {{ tipoLabel(group.tipo) }}
                                    <span v-if="group.is_academic"> · {{ group.academic_nivel }}</span>
                                </small>
                            </div>
                            <div class="text-nowrap">
                                <button type="button" class="btn btn-sm btn-info" @click="showEditGroup(group)">
                                    <i class="fa fa-edit"></i> Editar grupo
                                </button>
                                <button v-if="group.editable_links" type="button" class="btn btn-sm btn-primary" @click="showNewLink(group)">
                                    <i class="fa fa-plus"></i> Enlace
                                </button>
                            </div>
                        </div>

                        <div v-if="group.is_academic" class="card-body py-2">
                            <small class="text-muted">Contenido dinámico desde categorías/carreras del nivel académico.</small>
                        </div>

                        <div v-else-if="group.editable_links" class="card-body p-0">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Etiqueta</th>
                                        <th>Ruta / URL</th>
                                        <th>Visibilidad</th>
                                        <th style="width: 120px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="!group.links || group.links.length === 0">
                                        <td colspan="5" class="text-center text-muted">Sin enlaces</td>
                                    </tr>
                                    <tr v-for="(link, index) in group.links" :key="link.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ link.label }}</td>
                                        <td>
                                            <span v-if="link.route_name">{{ link.route_name }}</span>
                                            <a v-else-if="link.url" :href="link.url" target="_blank">{{ link.url }}</a>
                                            <span v-else class="text-muted">—</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-secondary" v-if="!link.visible">Oculto</span>
                                            <span class="badge badge-light" v-if="!link.visible_desktop">Sin desktop</span>
                                            <span class="badge badge-light" v-if="!link.visible_mobile">Sin mobile</span>
                                            <span v-if="link.visible && link.visible_desktop && link.visible_mobile" class="text-success">Visible</span>
                                        </td>
                                        <td class="text-nowrap">
                                            <button type="button" class="btn btn-sm btn-info" @click="showEditLink(group, link)">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" @click="deleteLink(link.id)">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal grupo -->
                    <div class="modal fade" id="mdlGroup" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form @submit.prevent="saveGroup">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Editar grupo: {{ groupForm.label }}</h4>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Etiqueta <span style="color:red">*</span></label>
                                            <input type="text" v-model="groupForm.label" required class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Orden</label>
                                                    <input type="number" v-model.number="groupForm.orden" min="0" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-8" v-if="groupForm.is_academic && groupForm.key === 'pregrado'">
                                                <p class="text-muted mb-0 mt-2">
                                                    Pregrado Regular y Pregrado Puede se muestran como pestañas dentro del mismo menú.
                                                    Las carreras se gestionan por nivel académico en Categorías/Carreras.
                                                </p>
                                            </div>
                                            <div class="col-md-8" v-else-if="groupForm.is_academic && groupForm.key === 'pregrado_puede'">
                                                <p class="text-muted mb-0 mt-2">
                                                    Este grupo ya no aparece en el menú principal; sus carreras se listan dentro de Pregrado → Pregrado Puede.
                                                </p>
                                            </div>
                                            <div class="col-md-8" v-else-if="groupForm.is_academic">
                                                <div class="form-group">
                                                    <label>Sección «Infórmate Más»</label>
                                                    <select v-model="groupForm.informes_key" class="form-control">
                                                        <option :value="null">Ninguna (usar enlace a Contáctanos en Pregrado)</option>
                                                        <option v-for="g in informesOptions" :key="g.key" :value="g.key">{{ g.label }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><input type="checkbox" v-model="groupForm.visible"> Visible</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label><input type="checkbox" v-model="groupForm.visible_desktop"> Desktop</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label><input type="checkbox" v-model="groupForm.visible_mobile"> Mobile</label>
                                            </div>
                                        </div>
                                        <div v-if="groupForm.editable_links && groupForm.tipo === 'section'" class="form-group mt-3">
                                            <label>
                                                <input type="checkbox" v-model="groupForm.meta.routes_only">
                                                Solo mostrar enlaces con ruta interna (ocultar URLs manuales)
                                            </label>
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

                    <!-- Modal enlace -->
                    <div class="modal fade" id="mdlLink" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form @submit.prevent="saveLink">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ linkForm.id ? 'Editar enlace' : 'Nuevo enlace' }}</h4>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Etiqueta <span style="color:red">*</span></label>
                                            <input type="text" v-model="linkForm.label" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Ruta Laravel (opcional)</label>
                                            <select v-model="linkForm.route_name" class="form-control">
                                                <option value="">— URL manual —</option>
                                                <option v-for="r in routeNames" :key="r.name" :value="r.name">
                                                    {{ r.name }} ({{ r.uri }})
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group" v-if="!linkForm.route_name">
                                            <label>URL</label>
                                            <input type="text" v-model="linkForm.url" class="form-control" placeholder="https://... o /ruta-interna">
                                        </div>
                                        <div class="form-group">
                                            <label><input type="checkbox" v-model="linkForm.external"> Enlace externo (nueva pestaña)</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><input type="checkbox" v-model="linkForm.visible"> Visible</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label><input type="checkbox" v-model="linkForm.visible_desktop"> Desktop</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label><input type="checkbox" v-model="linkForm.visible_mobile"> Mobile</label>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>Orden</label>
                                            <input type="number" v-model.number="linkForm.orden" min="0" class="form-control">
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
            groups: [],
            routeNames: [],
            groupForm: {},
            linkForm: {},
        };
    },
    computed: {
        informesOptions() {
            return this.groups.filter(g => g.tipo === 'section' && ['contactanos', 'posgrado'].includes(g.key));
        },
    },
    mounted() {
        this.loadGroups();
        this.loadRouteNames();
    },
    methods: {
        tipoLabel(tipo) {
            const map = {
                academic: 'Académico (dinámico)',
                section: 'Sección con enlaces',
                button: 'Botón',
                topbar: 'Barra superior',
                platform: 'Plataforma',
            };
            return map[tipo] || tipo;
        },
        loadGroups() {
            axios.get(route('menu.get')).then((response) => {
                this.groups = response.data;
            }).catch(() => {
                toastr.error('No se pudo cargar el menú');
            });
        },
        loadRouteNames() {
            axios.get(route('menu.routes')).then((response) => {
                this.routeNames = response.data;
            });
        },
        showEditGroup(group) {
            this.groupForm = {
                ...group,
                meta: { routes_only: true, ...(group.meta || {}) },
            };
            $('#mdlGroup').modal('show');
        },
        saveGroup() {
            const payload = {
                id: this.groupForm.id,
                label: this.groupForm.label,
                visible: this.groupForm.visible,
                visible_desktop: this.groupForm.visible_desktop,
                visible_mobile: this.groupForm.visible_mobile,
                orden: this.groupForm.orden,
                informes_key: this.groupForm.informes_key,
                meta: this.groupForm.meta,
            };

            axios.post(route('menu.group.edit'), payload).then((response) => {
                if (response.data) {
                    Swal.fire({ icon: 'success', title: 'Grupo actualizado', showConfirmButton: false, timer: 1500 });
                    this.loadGroups();
                    $('#mdlGroup').modal('hide');
                }
            }).catch(() => {
                toastr.error('No se pudo guardar el grupo');
            });
        },
        resetLinkForm(groupId = null) {
            this.linkForm = {
                id: null,
                group_id: groupId,
                label: '',
                route_name: '',
                url: '',
                external: false,
                visible: true,
                visible_desktop: true,
                visible_mobile: true,
                orden: 0,
            };
        },
        showNewLink(group) {
            this.resetLinkForm(group.id);
            this.linkForm.orden = group.links ? group.links.length : 0;
            $('#mdlLink').modal('show');
        },
        showEditLink(group, link) {
            this.linkForm = {
                ...link,
                group_id: group.id,
                route_name: link.route_name || '',
                url: link.url || '',
            };
            $('#mdlLink').modal('show');
        },
        saveLink() {
            const payload = { ...this.linkForm };
            const request = payload.id
                ? axios.post(route('menu.link.edit'), payload)
                : axios.post(route('menu.link.store'), payload);

            request.then((response) => {
                if (response.data) {
                    Swal.fire({ icon: 'success', title: 'Enlace guardado', showConfirmButton: false, timer: 1500 });
                    this.loadGroups();
                    $('#mdlLink').modal('hide');
                }
            }).catch(() => {
                toastr.error('No se pudo guardar el enlace');
            });
        },
        deleteLink(id) {
            Swal.fire({
                title: '¿Eliminar enlace?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
            }).then((result) => {
                if (result.value) {
                    axios.post(route('menu.link.delete', id)).then((response) => {
                        if (response.data) {
                            this.loadGroups();
                            Swal.fire({ icon: 'success', title: 'Enlace eliminado', showConfirmButton: false, timer: 1500 });
                        }
                    });
                }
            });
        },
    },
};
</script>
