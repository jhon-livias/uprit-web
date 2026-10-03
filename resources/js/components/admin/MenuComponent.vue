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

                    <ul class="nav nav-tabs mb-4">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-0">Megamenú</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-1">Topbar</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-2">CTA / Botones</a></li>
                    </ul>

                    <div class="tab-content">
                        <div v-for="(tabGroups, idx) in [megamenuGroups, topbarGroups, ctaGroups]" 
                             :key="idx" 
                             class="tab-pane fade" 
                             :class="{ 'show active': idx === 0 }" 
                             :id="'tab-' + idx">

                            <div v-if="tabGroups.length === 0" class="alert alert-light text-center border">
                                No hay grupos en esta categoría.
                            </div>

                            <div v-for="group in tabGroups" :key="group.id" class="card shadow-sm border-0 mb-4">
                                <div class="card-header bg-light d-flex justify-content-between align-items-start flex-wrap border-bottom-0 pb-0">
                                    <div class="mb-2 mb-md-0">
                                        <span style="font-size: 18px; font-weight: 700; color: #333;">{{ group.label }}</span>
                                        <small class="text-muted d-block mt-1">
                                            <code>{{ group.key }}</code> · {{ tipoLabel(group.tipo) }}
                                            <span v-if="group.is_academic"> · {{ group.academic_nivel }}</span>
                                        </small>
                                    </div>
                                    <div class="text-nowrap mt-2 mt-md-0">
                                        <button type="button" class="btn btn-sm btn-outline-info mr-2" @click="showEditGroup(group)">
                                            <i class="fa fa-edit"></i> Editar Configuración
                                        </button>
                                        <button v-if="group.editable_links" type="button" class="btn btn-sm btn-primary" @click="showNewLink(group)">
                                            <i class="fa fa-plus"></i> Nuevo Enlace Padre
                                        </button>
                                    </div>
                                </div>

                                <div v-if="group.is_academic" class="card-body py-3 bg-white">
                                    <div class="alert alert-secondary mb-0">Contenido dinámico autogenerado desde categorías/carreras del nivel académico.</div>
                                </div>

                                <div v-else-if="group.editable_links" class="card-body p-0 bg-white">
                                    <table class="table table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="width: 50px">#</th>
                                                <th>Etiqueta</th>
                                                <th>Ruta / URL</th>
                                                <th>Visibilidad</th>
                                                <th style="width: 140px" class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="!group.links || group.links.length === 0">
                                                <td colspan="5" class="text-center text-muted py-4">Sin enlaces configurados</td>
                                            </tr>
                                            <template v-for="(link, index) in group.links" :key="link.id">
                                                <tr style="background-color: #f8f9fa; border-top: 2px solid #e9ecef;">
                                                    <td style="font-weight: bold;">{{ index + 1 }}</td>
                                                    <td style="font-weight: bold; color: #2c3e50;">{{ link.label }}</td>
                                                    <td>
                                                        <span v-if="link.route_name" class="badge badge-info">{{ link.route_name }}</span>
                                                        <a v-else-if="link.url" :href="link.url" target="_blank" class="text-primary">{{ link.url }}</a>
                                                        <span v-else class="text-muted">—</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-secondary" v-if="!link.visible">Oculto</span>
                                                        <span class="badge badge-warning" v-if="!link.visible_desktop">Sin desktop</span>
                                                        <span class="badge badge-warning" v-if="!link.visible_mobile">Sin mobile</span>
                                                        <span v-if="link.visible && link.visible_desktop && link.visible_mobile" class="badge badge-success">Visible</span>
                                                    </td>
                                                    <td class="text-nowrap text-center">
                                                        <button type="button" class="btn btn-sm btn-outline-primary" title="Añadir Sub-enlace" @click="showNewLink(group, link.id)">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-outline-info mx-1" title="Editar" @click="showEditLink(group, link)">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" title="Eliminar" @click="deleteLink(link.id)">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <template v-for="(child, childIndex) in link.children" :key="child.id">
                                                    <tr>
                                                        <td class="text-muted">{{ index + 1 }}.{{ childIndex + 1 }}</td>
                                                        <td style="padding-left: 40px; color: #555;">
                                                            <i class="fa fa-level-up fa-rotate-90 text-muted mr-2"></i> {{ child.label }}
                                                        </td>
                                                        <td>
                                                            <span v-if="child.route_name" class="badge badge-info">{{ child.route_name }}</span>
                                                            <a v-else-if="child.url" :href="child.url" target="_blank" class="text-primary">{{ child.url }}</a>
                                                            <span v-else class="text-muted">—</span>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-secondary" v-if="!child.visible">Oculto</span>
                                                            <span class="badge badge-warning" v-if="!child.visible_desktop">Sin desktop</span>
                                                            <span class="badge badge-warning" v-if="!child.visible_mobile">Sin mobile</span>
                                                            <span v-if="child.visible && child.visible_desktop && child.visible_mobile" class="badge badge-success">Visible</span>
                                                        </td>
                                                        <td class="text-nowrap text-center">
                                                            <button type="button" class="btn btn-sm btn-outline-primary" title="Añadir Sub-enlace" @click="showNewLink(group, child.id)">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-outline-info mx-1" title="Editar" @click="showEditLink(group, child)">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-outline-danger" title="Eliminar" @click="deleteLink(child.id)">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr v-for="(grandchild, gcIndex) in child.children" :key="'gc-'+grandchild.id">
                                                        <td class="text-muted">{{ index + 1 }}.{{ childIndex + 1 }}.{{ gcIndex + 1 }}</td>
                                                        <td style="padding-left: 70px; color: #777;">
                                                            <i class="fa fa-angle-right text-muted mr-2"></i> {{ grandchild.label }}
                                                        </td>
                                                        <td>
                                                            <span v-if="grandchild.route_name" class="badge badge-info">{{ grandchild.route_name }}</span>
                                                            <a v-else-if="grandchild.url" :href="grandchild.url" target="_blank" class="text-primary">{{ grandchild.url }}</a>
                                                            <span v-else class="text-muted">—</span>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-secondary" v-if="!grandchild.visible">Oculto</span>
                                                            <span class="badge badge-warning" v-if="!grandchild.visible_desktop">Sin desktop</span>
                                                            <span class="badge badge-warning" v-if="!grandchild.visible_mobile">Sin mobile</span>
                                                            <span v-if="grandchild.visible && grandchild.visible_desktop && grandchild.visible_mobile" class="badge badge-success">Visible</span>
                                                        </td>
                                                        <td class="text-nowrap text-center">
                                                            <button type="button" class="btn btn-sm btn-outline-info mx-1" title="Editar" @click="showEditLink(group, grandchild)">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-outline-danger" title="Eliminar" @click="deleteLink(grandchild.id)">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
        megamenuGroups() {
            return this.groups.filter(g => g.show_in_main_nav && g.tipo !== 'button');
        },
        topbarGroups() {
            return this.groups.filter(g => g.show_in_topbar);
        },
        ctaGroups() {
            return this.groups.filter(g => g.tipo === 'button');
        }
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
            axios.get('/admin/get_menu').then((response) => {
                this.groups = response.data;
            }).catch(() => {
                toastr.error('No se pudo cargar el menú');
            });
        },
        loadRouteNames() {
            axios.get('/admin/get_menu_routes').then((response) => {
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

            axios.post('/admin/menu/group/edit', payload).then((response) => {
                if (response.data) {
                    Swal.fire({ icon: 'success', title: 'Grupo actualizado', showConfirmButton: false, timer: 1500 });
                    this.loadGroups();
                    $('#mdlGroup').modal('hide');
                }
            }).catch(() => {
                toastr.error('No se pudo guardar el grupo');
            });
        },
        resetLinkForm(groupId = null, parentId = null) {
            this.linkForm = {
                id: null,
                group_id: groupId,
                parent_id: parentId,
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
        showNewLink(group, parentId = null) {
            this.resetLinkForm(group.id, parentId);
            if (parentId) {
                let parentLink = group.links.find(l => l.id === parentId);
                this.linkForm.orden = parentLink && parentLink.children ? parentLink.children.length : 0;
            } else {
                this.linkForm.orden = group.links ? group.links.length : 0;
            }
            $('#mdlLink').modal('show');
        },
        showEditLink(group, link) {
            this.linkForm = {
                ...link,
                group_id: group.id,
                parent_id: link.parent_id || null,
                route_name: link.route_name || '',
                url: link.url || '',
            };
            $('#mdlLink').modal('show');
        },
        saveLink() {
            const payload = { ...this.linkForm };
            const request = payload.id
                ? axios.post('/admin/menu/link/edit', payload)
                : axios.post('/admin/menu/link/store', payload);

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
                    axios.post('/admin/menu/link/delete/' + id).then((response) => {
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
