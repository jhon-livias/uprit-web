<template>
    <div class="row clearfix">
        <div class="col-lg-12"><div class="card"><div class="body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div><span style="font-weight:bold;color:#20272f;font-size:24px;">Flyers de inicio</span><p class="mb-0 text-muted">Se muestran en el carrusel del inicio. Cada flyer puede llevar a una página del sitio o a una URL externa.</p></div>
                <button type="button" class="btn btn-success" @click="openNew"><i class="icon-plus"></i> Nuevo flyer</button>
            </div>
            <p class="text-muted mb-2"><i class="fa fa-arrows" aria-hidden="true"></i> Arrastra una fila para cambiar su posición. El orden se guarda al soltarla.</p>
            <div class="table-responsive"><table class="table table-hover table-striped"><thead style="color:#fff;background-color:#545b62;"><tr><th>Orden</th><th>Vista previa</th><th>Título</th><th>Destino</th><th>Estado</th><th class="text-center">Acciones</th></tr></thead>
                <tbody><tr v-if="!flyers.length"><td colspan="6" class="text-center text-muted">Aún no hay flyers.</td></tr><tr v-for="(flyer, index) in flyers" :key="flyer.id" :draggable="!savingOrder" @dragstart="startDrag(index)" @dragover.prevent @drop="dropFlyer(index)" @dragend="dragIndex = null" :class="{ 'home-flyer-row--dragging': dragIndex === index }"><td><span class="home-flyer-drag" title="Arrastrar para reordenar"><i class="fa fa-arrows"></i></span> {{ index + 1 }}</td><td><img :src="asset(flyer.imagen)" :alt="flyer.titulo || 'Flyer'" width="100" style="max-height:80px;object-fit:contain;border:1px solid #ddd;border-radius:4px;"></td><td>{{ flyer.titulo || 'Sin título' }}</td><td><span class="badge badge-info">{{ flyer.tipo_enlace === 'interno' ? 'Interno' : 'Externo' }}</span><span class="d-block text-truncate" style="max-width:260px;">{{ flyer.enlace || 'Sin enlace' }}</span></td><td><span :class="flyer.activo ? 'badge badge-success' : 'badge badge-secondary'">{{ flyer.activo ? 'Publicado' : 'Oculto' }}</span></td><td class="text-center text-nowrap"><button class="btn btn-info mr-1" @click="openEdit(flyer)" title="Editar"><i class="fa fa-edit"></i></button><button class="btn btn-danger" @click="remove(flyer)" title="Eliminar"><i class="fa fa-trash-o"></i></button></td></tr></tbody>
            </table></div>
        </div></div></div>
        <div class="modal fade" id="homeFlyerModal" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-lg" role="document"><div class="modal-content"><form @submit.prevent="save">
            <div class="modal-header"><h4 class="modal-title">{{ form.id ? 'Editar flyer' : 'Nuevo flyer' }}</h4><button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"></button></div>
            <div class="modal-body"><div class="row">
                <div class="col-md-8"><div class="form-group"><label>Título (opcional)</label><input v-model.trim="form.titulo" class="form-control" maxlength="255"></div></div>
                <div class="col-md-4"><div class="form-group"><label>Orden</label><input v-model.number="form.orden" type="number" min="0" required class="form-control"></div></div>
                <div class="col-md-6"><div class="form-group"><label>Tipo de destino</label><select v-model="form.tipo_enlace" class="form-control"><option value="interno">Página interna</option><option value="externo">URL externa</option></select></div></div>
                <div class="col-md-6"><div class="form-group"><label>{{ form.tipo_enlace === 'interno' ? 'Ruta interna' : 'URL externa' }} (opcional)</label><input v-model.trim="form.enlace" class="form-control" :placeholder="form.tipo_enlace === 'interno' ? '/servicios-de-salud' : 'https://ejemplo.com'" maxlength="500"></div></div>
                <div class="col-12"><small class="text-muted">Para una página interna usa una ruta que comience con “/”; por ejemplo, <code>/servicio-psicopedagogico</code>.</small></div>
                <div class="col-md-6 mt-3"><div class="form-group"><label>Imagen {{ form.id ? '(dejar vacío para mantener)' : '' }}</label><input type="file" @change="setImage" accept=".jpg,.jpeg,.png,.webp" :required="!form.id" class="form-control-file"></div></div>
                <div class="col-md-6 mt-3 d-flex align-items-center"><div><div class="custom-control custom-checkbox mb-2"><input id="flyerActive" v-model="form.activo" type="checkbox" class="custom-control-input"><label for="flyerActive" class="custom-control-label">Publicado en el inicio</label></div><div class="custom-control custom-checkbox"><input id="flyerTarget" v-model="form.nueva_pestana" type="checkbox" class="custom-control-input"><label for="flyerTarget" class="custom-control-label">Abrir enlace en una nueva pestaña</label></div></div></div>
                <div v-if="error" class="col-12"><div class="alert alert-danger mt-3 mb-0">{{ error }}</div></div>
            </div></div>
            <div class="modal-footer"><button :disabled="saving" type="submit" class="btn btn-primary">{{ saving ? 'Guardando...' : 'Guardar' }}</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button></div>
        </form></div></div></div>
    </div>
</template>

<script>
import axios from 'axios'
const emptyForm = () => ({ id: null, titulo: '', imagen: null, tipo_enlace: 'interno', enlace: '', nueva_pestana: false, activo: true, orden: 1 })
export default {
    data() { return { flyers: [], form: emptyForm(), error: '', saving: false, savingOrder: false, dragIndex: null } },
    mounted() { this.load() },
    methods: {
        load() { axios.get('/admin/get_flyers_inicio').then(({ data }) => { this.flyers = data }).catch(() => toastr.error('No se pudieron cargar los flyers.')) },
        nextOrder() { return this.flyers.length ? Math.max(...this.flyers.map(f => Number(f.orden) || 0)) + 1 : 1 },
        openNew() { this.form = emptyForm(); this.form.orden = this.nextOrder(); this.error = ''; $('#homeFlyerModal').modal('show') },
        openEdit(flyer) { this.form = { ...flyer, imagen: null }; this.error = ''; $('#homeFlyerModal').modal('show') },
        setImage(event) { this.form.imagen = event.target.files[0] || null },
        startDrag(index) { this.dragIndex = index },
        dropFlyer(toIndex) {
            if (this.dragIndex === null || this.dragIndex === toIndex || this.savingOrder) return
            const reordered = [...this.flyers]
            const [moved] = reordered.splice(this.dragIndex, 1)
            reordered.splice(toIndex, 0, moved)
            this.flyers = reordered.map((flyer, index) => ({ ...flyer, orden: index + 1 }))
            this.dragIndex = null
            this.savingOrder = true
            axios.post('/admin/flyers-inicio/reorder', { flyers: this.flyers.map(flyer => ({ id: flyer.id })) })
                .then(() => toastr.success('Orden actualizado.'))
                .catch(() => { toastr.error('No se pudo guardar el nuevo orden.'); this.load() })
                .finally(() => { this.savingOrder = false })
        },
        save() {
            this.error = ''
            if (this.form.enlace && this.form.tipo_enlace === 'interno' && !this.form.enlace.startsWith('/')) { this.error = 'La ruta interna debe comenzar con /.'; return }
            if (this.form.enlace && this.form.tipo_enlace === 'externo' && !/^https?:\/\//i.test(this.form.enlace)) { this.error = 'La URL externa debe comenzar con http:// o https://.'; return }
            this.saving = true
            const data = new FormData()
            ;['titulo', 'tipo_enlace', 'enlace', 'orden'].forEach(key => data.append(key, this.form[key] ?? ''))
            data.append('activo', this.form.activo ? '1' : '0'); data.append('nueva_pestana', this.form.nueva_pestana ? '1' : '0')
            if (this.form.imagen) data.append('imagen', this.form.imagen)
            if (this.form.id) data.append('id', this.form.id)
            axios.post(this.form.id ? '/admin/flyers-inicio/edit' : '/admin/flyers-inicio/store', data).then(() => { toastr.success('Flyer guardado.'); $('#homeFlyerModal').modal('hide'); this.load() }).catch(error => { this.error = error.response?.data?.message || 'No se pudo guardar el flyer.' }).finally(() => { this.saving = false })
        },
        remove(flyer) { Swal.fire({ title: '¿Eliminar este flyer?', text: 'Esta acción no se puede revertir.', icon: 'warning', showCancelButton: true, confirmButtonText: 'Sí, eliminar', cancelButtonText: 'Cancelar' }).then(result => { if (!result.value) return; axios.post('/admin/flyers-inicio/delete/' + flyer.id).then(() => { toastr.success('Flyer eliminado.'); this.load() }).catch(() => toastr.error('No se pudo eliminar el flyer.')) }) },
    },
}
</script>

<style scoped>
.home-flyer-drag { color: #91001e; cursor: grab; }
.home-flyer-row--dragging { opacity: .45; }
tbody tr[draggable="true"] { cursor: grab; }
</style>
