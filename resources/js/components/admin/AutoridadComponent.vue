<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div
                    class="card-header d-flex justify-content-between align-items-center"
                >
                    <h4 class="card-title">Autoridades Universitarias</h4>
                    <button
                        class="btn btn-primary"
                        type="button"
                        @click="showNuevo()"
                    >
                        Nuevo
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class="table table-bordered table-striped"
                            id="tbl-autoridades"
                        >
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Orden</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Tipo</th>
                                    <th>CV</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in autoridades" :key="item.id">
                                    <td>{{ item.orden }}</td>
                                    <td>
                                        <img
                                            :src="
                                                item.foto
                                                    ? asset(item.foto)
                                                    : asset(
                                                          'web/assets/images/svg-icons/instructor.svg',
                                                      )
                                            "
                                            style="
                                                width: 50px;
                                                height: 50px;
                                                object-fit: cover;
                                                border-radius: 50%;
                                            "
                                        />
                                    </td>
                                    <td>{{ item.nombre }}</td>
                                    <td>{{ item.cargo }}</td>
                                    <td>{{ item.tipo }}</td>
                                    <td>
                                        <a
                                            v-if="item.cv_path"
                                            :href="asset(item.cv_path)"
                                            target="_blank"
                                            class="btn btn-sm btn-info text-white"
                                            >Ver PDF</a
                                        >
                                        <span v-else>N/A</span>
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <button
                                            class="btn btn-info mr-2"
                                            type="button"
                                            @click="showEdit(item)"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button
                                            class="btn btn-danger"
                                            type="button"
                                            @click="eliminar(item.id)"
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Modal Nuevo -->
                        <div
                            class="modal fade"
                            id="mdlNuevoAutoridad"
                            tabindex="-1"
                            role="dialog"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            NUEVA AUTORIDAD
                                        </h5>
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="modal"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true"
                                                >&times;</span
                                            >
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="storeAutoridad">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            >Nombre
                                                            Completo</label
                                                        >
                                                        <input
                                                            type="text"
                                                            v-model="
                                                                autoridad.nombre
                                                            "
                                                            class="form-control"
                                                            required
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Cargo</label>
                                                        <input
                                                            type="text"
                                                            v-model="
                                                                autoridad.cargo
                                                            "
                                                            class="form-control"
                                                            required
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label
                                                            >Sección /
                                                            Tipo</label
                                                        >
                                                        <select
                                                            v-model="
                                                                autoridad.tipo
                                                            "
                                                            class="form-control"
                                                            required
                                                        >
                                                            <option
                                                                value="Consejo Directivo"
                                                            >
                                                                Consejo
                                                                Directivo
                                                            </option>
                                                            <option
                                                                value="Alta Dirección"
                                                            >
                                                                Alta Dirección
                                                                (Rector/Vicerrector)
                                                            </option>
                                                            <option
                                                                value="Gobierno Interno"
                                                            >
                                                                Gobierno Interno
                                                                (Decanos)
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label
                                                            >Orden
                                                            (Posición)</label
                                                        >
                                                        <input
                                                            type="number"
                                                            v-model="
                                                                autoridad.orden
                                                            "
                                                            class="form-control"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            >Foto
                                                            (Opcional)</label
                                                        >
                                                        <input
                                                            type="file"
                                                            class="dropify"
                                                            @change="imagen_new"
                                                            accept=".jpg,.jpeg,.png,.webp"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            >CV PDF
                                                            (Opcional)</label
                                                        >
                                                        <input
                                                            type="file"
                                                            class="dropify"
                                                            @change="pdf_new"
                                                            accept=".pdf"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer mt-4">
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary"
                                                >
                                                    Guardar
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-secondary"
                                                    data-dismiss="modal"
                                                >
                                                    Cerrar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Edit -->
                        <div
                            class="modal fade"
                            id="modEditarAutoridad"
                            tabindex="-1"
                            role="dialog"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            EDITAR AUTORIDAD
                                        </h5>
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="modal"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true"
                                                >&times;</span
                                            >
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="updateAutoridad">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            >Nombre
                                                            Completo</label
                                                        >
                                                        <input
                                                            type="text"
                                                            v-model="
                                                                autoridad.nombre
                                                            "
                                                            class="form-control"
                                                            required
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Cargo</label>
                                                        <input
                                                            type="text"
                                                            v-model="
                                                                autoridad.cargo
                                                            "
                                                            class="form-control"
                                                            required
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label
                                                            >Sección /
                                                            Tipo</label
                                                        >
                                                        <select
                                                            v-model="
                                                                autoridad.tipo
                                                            "
                                                            class="form-control"
                                                            required
                                                        >
                                                            <option
                                                                value="Consejo Directivo"
                                                            >
                                                                Consejo
                                                                Directivo
                                                            </option>
                                                            <option
                                                                value="Alta Dirección"
                                                            >
                                                                Alta Dirección
                                                                (Rector/Vicerrector)
                                                            </option>
                                                            <option
                                                                value="Gobierno Interno"
                                                            >
                                                                Gobierno Interno
                                                                (Decanos)
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label
                                                            >Orden
                                                            (Posición)</label
                                                        >
                                                        <input
                                                            type="number"
                                                            v-model="
                                                                autoridad.orden
                                                            "
                                                            class="form-control"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            >Foto
                                                            (Opcional)</label
                                                        >
                                                        <input
                                                            type="file"
                                                            class="dropify-edit-image"
                                                            @change="
                                                                imagen_edit
                                                            "
                                                            accept=".jpg,.jpeg,.png,.webp"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            >CV PDF
                                                            (Opcional)</label
                                                        >
                                                        <input
                                                            type="file"
                                                            class="dropify-edit-pdf"
                                                            @change="pdf_edit"
                                                            accept=".pdf"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer mt-4">
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary"
                                                >
                                                    Guardar Cambios
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-secondary"
                                                    data-dismiss="modal"
                                                >
                                                    Cerrar
                                                </button>
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
import axios from "axios";
export default {
    data() {
        return {
            autoridades: [],
            autoridad: {},
        };
    },
    mounted() {
        this.getAutoridades();
    },
    methods: {
        resetForm() {
            this.autoridad = {
                id: null,
                nombre: "",
                cargo: "",
                tipo: "Alta Dirección",
                orden: 0,
                foto: null,
                cv_path: null,
            };
        },
        getAutoridades() {
            axios
                .get("/admin/get_autoridades")
                .then((response) => {
                    this.destroyDatatable();
                    this.autoridades = response.data;
                    this.initDatatable();
                })
                .catch((error) => {
                    console.log("Error en el Servidor");
                });
        },
        showNuevo() {
            this.resetForm();
            $("#mdlNuevoAutoridad").modal("show");
            this.$nextTick(() => {
                $(".dropify").dropify();
            });
        },
        storeAutoridad() {
            let formData = new FormData();
            formData.append("nombre", this.autoridad.nombre);
            formData.append("cargo", this.autoridad.cargo);
            formData.append("tipo", this.autoridad.tipo);
            formData.append("orden", this.autoridad.orden);
            if (this.autoridad.foto)
                formData.append("foto", this.autoridad.foto);
            if (this.autoridad.cv_path)
                formData.append("cv_path", this.autoridad.cv_path);

            axios
                .post("/admin/autoridades/store", formData)
                .then((response) => {
                    if (response.data) {
                        Swal.fire({
                            icon: "success",
                            title: "AUTORIDAD REGISTRADA",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        this.getAutoridades();
                        $("#mdlNuevoAutoridad").modal("hide");
                        this.resetForm();
                    } else {
                        toastr.warning("No se pudo registrar la Autoridad");
                    }
                })
                .catch((error) => {
                    toastr.error("Problema de servidor");
                    console.log(error);
                });
        },
        showEdit(item) {
            this.autoridad = { ...item };
            this.autoridad.foto = null;
            this.autoridad.cv_path = null;
            this.$nextTick(() => {
                let drImage = $(".dropify-edit-image").dropify({
                    defaultFile: item.foto ? this.asset(item.foto) : "",
                });
                drImage = drImage.data("dropify");
                drImage.resetPreview();
                drImage.clearElement();
                drImage.settings.defaultFile = item.foto
                    ? this.asset(item.foto)
                    : "";
                drImage.destroy();
                drImage.init();

                let drPdf = $(".dropify-edit-pdf").dropify({
                    defaultFile: item.cv_path ? this.asset(item.cv_path) : "",
                });
                drPdf = drPdf.data("dropify");
                drPdf.resetPreview();
                drPdf.clearElement();
                drPdf.settings.defaultFile = item.cv_path
                    ? this.asset(item.cv_path)
                    : "";
                drPdf.destroy();
                drPdf.init();
            });
            $("#modEditarAutoridad").modal("show");
        },
        updateAutoridad() {
            let formData = new FormData();
            formData.append("id", this.autoridad.id);
            formData.append("nombre", this.autoridad.nombre);
            formData.append("cargo", this.autoridad.cargo);
            formData.append("tipo", this.autoridad.tipo);
            formData.append("orden", this.autoridad.orden);
            if (this.autoridad.foto)
                formData.append("foto", this.autoridad.foto);
            if (this.autoridad.cv_path)
                formData.append("cv_path", this.autoridad.cv_path);

            axios
                .post("/admin/autoridades/edit", formData)
                .then((response) => {
                    if (response.data) {
                        Swal.fire({
                            icon: "success",
                            title: "AUTORIDAD ACTUALIZADA",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        this.getAutoridades();
                        $("#modEditarAutoridad").modal("hide");
                        this.resetForm();
                    } else {
                        toastr.error("No se actualizo la Autoridad");
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        eliminar(id) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!",
            }).then((result) => {
                if (result.value) {
                    axios
                        .post("/admin/autoridades/delete/" + id)
                        .then((response) => {
                            if (response.data) {
                                this.getAutoridades();
                                Swal.fire({
                                    icon: "success",
                                    title: "ELIMINADO",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        })
                        .catch((error) => {
                            toastr.error("Error al eliminar");
                        });
                }
            });
        },
        imagen_new(event) {
            this.autoridad.foto = event.target.files[0];
        },
        pdf_new(event) {
            this.autoridad.cv_path = event.target.files[0];
        },
        imagen_edit(event) {
            this.autoridad.foto = event.target.files[0];
        },
        pdf_edit(event) {
            this.autoridad.cv_path = event.target.files[0];
        },
    },
};
</script>
