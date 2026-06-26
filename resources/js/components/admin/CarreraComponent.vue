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
                                                        <img v-if="item.imagen"
                                                            :src="asset('brochures_imagenes/' + item.imagen)"
                                                            alt="Imagen" width="80"
                                                            style="border-radius: 8px; object-fit: cover; border: 1px solid #ddd;">

                                                        <span v-else class="text-muted">
                                                            No disponible
                                                        </span>
                                                    </td>

                                                    <td style="text-align: center">
                                                        <a v-if="item.brochure"
                                                            :href="asset('brochures_carreras/' + item.brochure)"
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
                                                            class="btn btn-info esp-dere" title="Editar">
                                                            <i class="fa fa-edit"></i>
                                                        </a>


                                                        <a href="javascript:;" @click="showDet(item)"
                                                            class="btn btn-warning esp-dere" title="Detalle">
                                                            <i class="fa fa-eye"></i>
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
                                                            <div class="col-12"><label>Imagen</label>
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
                                                                    data-allowed-file-extensions="pdf" name="brochure">
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
                            <div class="modal fade" id="modEditarCarrera" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <form v-on:submit.prevent="updateCarrera()" enctype="multipart/form-data">

                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar Carrera</h4>
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
                                                            <div class="col-12"><label>Imagen</label>
                                                                <input type="file" class="dropify dropify-edit-imagen"
                                                                    @change="imagen_edit" accept=".jpg,.jpeg,.png"
                                                                    data-allowed-file-extensions="jpg jpeg png"
                                                                    name="imagen">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group row">
                                                            <div class="col-12"><label>Brochure (PDF)</label>
                                                                <input type="file" class="dropify dropify-edit-brochure"
                                                                    accept=".pdf" @change="brochure_edit"
                                                                    data-allowed-file-extensions="pdf" name="brochure">
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

                            <div class="modal fade" id="modDetalleCarrera" tabindex="-1">

                                <div class="modal-dialog modal-dialog-centered modal-lg">

                                    <div class="modal-content">

                                        <form @submit.prevent="guardarDetalle">

                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                    Descripción
                                                </h4>

                                                <button type="button" class="close" data-dismiss="modal">
                                                </button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="row">

                                                    <div class="col-md-10 mx-auto">

                                                        <label>
                                                            Descripción
                                                        </label>

                                                        <textarea v-model="detalle.descripcion" class="form-control"
                                                            rows="4">
                                                        </textarea>

                                                    </div>

                                                </div>

                                                <hr>

                                                <div class="row">

                                                    <div class="col-md-10 mx-auto">

                                                        <label>
                                                            Oportunidades
                                                        </label>

                                                        <div class="input-group">

                                                            <input type="text" class="form-control"
                                                                v-model="nuevaOportunidad"
                                                                @keyup.enter.prevent="agregarOportunidad">

                                                            <div class="input-group-append">

                                                                <button type="button" class="btn btn-success"
                                                                    @click="agregarOportunidad">

                                                                    Agregar
                                                                </button>

                                                            </div>

                                                        </div>

                                                        <div class="mt-3">

                                                            <span v-for="(item, index) in detalle.oportunidades"
                                                                :key="index" class="badge badge-primary mr-2">

                                                                {{ item }}

                                                                <i class="fa fa-times ml-1" style="cursor:pointer"
                                                                    @click="eliminarOportunidad(index)">
                                                                </i>

                                                            </span>

                                                        </div>

                                                    </div>

                                                </div>

                                                <hr>

                                                <div class="row">

                                                    <div class="col-md-10 mx-auto">

                                                        <div v-for="(faq, index) in detalle.preguntas" :key="index"
                                                            class="faq-item border rounded p-3 mb-3">

                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-3">

                                                                <strong>
                                                                    Pregunta / Respuesta
                                                                </strong>

                                                                <div>

                                                                    <button type="button"
                                                                        class="btn btn-info btn-sm esp-dere"
                                                                        @click="faq.collapsed = !faq.collapsed">

                                                                        <i class="fa" :class="faq.collapsed
                                                                            ? 'fa-plus'
                                                                            : 'fa-minus'"></i>

                                                                    </button>

                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        @click="eliminarFaq(index)">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>

                                                                </div>

                                                            </div>

                                                            <div v-show="!faq.collapsed">

                                                                <div class="form-group">

                                                                    <input v-model="faq.pregunta" class="form-control"
                                                                        placeholder="Pregunta">

                                                                </div>

                                                                <div class="form-group">

                                                                    <textarea v-model="faq.respuesta"
                                                                        class="form-control" rows="3"
                                                                        placeholder="Respuesta"></textarea>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <button type="button" class="btn btn-success"
                                                            @click="agregarFaq">

                                                            <i class="fa fa-plus"></i>
                                                            Agregar Pregunta

                                                        </button>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>
                                                <a href="javascript:;" @click="abrirMalla"
                                                    class="btn btn-secondary btn-next-modal">
                                                    Siguiente
                                                </a>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>
                            <div class="modal fade" id="modMallaCarrera" tabindex="-1">

                                <div class="modal-dialog modal-dialog-centered modal-lg">

                                    <div class="modal-content">

                                        <form @submit.prevent="guardarMalla">

                                            <div class="modal-header">

                                                <h4 class="modal-title">
                                                    Malla Curricular
                                                </h4>

                                                <button type="button" class="close" data-dismiss="modal"></button>

                                            </div>

                                            <div class="modal-body">

                                                <div class="row">

                                                    <div class="col-md-10 mx-auto">

                                                        <div v-for="(item, index) in malla" :key="index"
                                                            class="border rounded p-3 mb-3">

                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-3">

                                                                <strong>
                                                                    Ciclo
                                                                </strong>

                                                                <div>

                                                                    <button type="button"
                                                                        class="btn btn-info btn-sm esp-dere" @click="
                                                                            item.collapsed =
                                                                            !item.collapsed
                                                                            ">

                                                                        <i class="fa" :class="item.collapsed
                                                                            ? 'fa-plus'
                                                                            : 'fa-minus'
                                                                            "></i>

                                                                    </button>

                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        @click="
                                                                            eliminarMalla(index)
                                                                            ">

                                                                        <i class="fa fa-trash"></i>

                                                                    </button>

                                                                </div>

                                                            </div>

                                                            <div v-show="!item.collapsed">

                                                                <div class="form-group">

                                                                    <input v-model="item.ciclo" type="text"
                                                                        class="form-control" placeholder="Ciclo">

                                                                </div>

                                                                <div class="form-group">

                                                                    <textarea v-model="item.descripcion" rows="3"
                                                                        class="form-control"
                                                                        placeholder="Descripción"></textarea>

                                                                </div>

                                                                <!-- CURSOS -->

                                                                <div class="form-group">

                                                                    <label>
                                                                        Cursos
                                                                    </label>



                                                                    <div class="input-group">

                                                                        <input type="text" class="form-control"
                                                                            placeholder="Agregar curso"
                                                                            @keyup.enter.prevent="
                                                                                agregarCurso(
                                                                                    item,
                                                                                    $event
                                                                                )
                                                                                ">

                                                                        <div class="input-group-append">

                                                                            <button type="button"
                                                                                class="btn btn-success" @click="
                                                                                    agregarCurso(
                                                                                        item,
                                                                                        $event
                                                                                    )
                                                                                    ">

                                                                                Agregar

                                                                            </button>

                                                                        </div>

                                                                    </div>
                                                                    <div class="mt-3">

                                                                        <span v-for="(curso, cursoIndex) in item.cursos"
                                                                            :key="cursoIndex"
                                                                            class="badge badge-primary mr-2">

                                                                            {{ curso }}

                                                                            <i class="fa fa-times ml-1"
                                                                                style="cursor:pointer"
                                                                                @click="item.cursos.splice(cursoIndex, 1)"></i>

                                                                        </span>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <button type="button" class="btn btn-success"
                                                            @click="agregarMalla">

                                                            <i class="fa fa-plus"></i>

                                                            Agregar

                                                        </button>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>

                                                <button type="button" class="btn btn-secondary" @click="abrirPerfil">
                                                    Siguiente
                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>
                            <div class="modal fade" id="modPerfilCarrera" tabindex="-1">

                                <div class="modal-dialog modal-dialog-centered modal-lg">

                                    <div class="modal-content">

                                        <form @submit.prevent="guardarPerfil">

                                            <div class="modal-header">

                                                <h4 class="modal-title">
                                                    Perfil de Egresado
                                                </h4>

                                                <button type="button" class="close" data-dismiss="modal"></button>

                                            </div>

                                            <div class="modal-body">

                                                <div class="row">

                                                    <div class="col-md-10 mx-auto">

                                                        <label>
                                                            Descripción
                                                        </label>

                                                        <textarea v-model="perfil.descripcion" class="form-control"
                                                            rows="10" required></textarea>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>

                                                <button type="button" class="btn btn-secondary" @click="abrirDocentes">
                                                    Siguiente
                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>
                            <div class="modal fade" id="modDocentesCarrera" tabindex="-1">

                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">

                                    <div class="modal-content">

                                        <form @submit.prevent="guardarDocentes">

                                            <div class="modal-header">

                                                <h4 class="modal-title">
                                                    Nuestros Docentes
                                                </h4>

                                            </div>

                                            <div class="modal-body">

                                                <div v-for="(docente, index) in docentes"
                                                    :key="docente.id || `docente-${index}`"
                                                    class="border rounded p-3 mb-3">

                                                    <div class="d-flex justify-content-between mb-3">

                                                        <strong>
                                                            Docente
                                                        </strong>

                                                        <div>

                                                            <button type="button" class="btn btn-info btn-sm esp-dere"
                                                                @click="
                                                                    docente.collapsed =
                                                                    !docente.collapsed
                                                                    ">

                                                                <i class="fa" :class="docente.collapsed
                                                                    ? 'fa-plus'
                                                                    : 'fa-minus'
                                                                    "></i>

                                                            </button>

                                                            <button type="button" class="btn btn-danger btn-sm" @click="
                                                                eliminarDocente(index)
                                                                ">

                                                                <i class="fa fa-trash"></i>

                                                            </button>

                                                        </div>

                                                    </div>

                                                    <div v-show="!docente.collapsed">

                                                        <input v-model="docente.nombre" class="form-control mb-2"
                                                            placeholder="Nombre">

                                                        <input v-model="docente.correo" class="form-control mb-2"
                                                            placeholder="Correo">

                                                        <input v-model="docente.departamento" class="form-control mb-2"
                                                            placeholder="Departamento">

                                                        <textarea v-model="docente.descripcion"
                                                            class="form-control mb-2" rows="3"
                                                            placeholder="Descripción"></textarea>

                                                        <input v-model="docente.linkedin" class="form-control mb-2"
                                                            placeholder="LinkedIn">

                                                        <!-- TAGS -->

                                                        <label>
                                                            Etiquetas
                                                        </label>



                                                        <div class="input-group mb-3">

                                                            <input type="text" class="form-control"
                                                                placeholder="Etiqueta" @keyup.enter.prevent="
                                                                    agregarTag(
                                                                        docente,
                                                                        $event
                                                                    )
                                                                    ">

                                                            <div class="input-group-append">

                                                                <button type="button" class="btn btn-success" @click="
                                                                    agregarTag(
                                                                        docente,
                                                                        $event
                                                                    )
                                                                    ">
                                                                    Agregar
                                                                </button>

                                                            </div>

                                                        </div>
                                                        <div class="mt-3 mb-3">

                                                            <span v-for="(tag, tagIndex) in docente.tags"
                                                                :key="tagIndex" class="badge badge-primary mr-2">

                                                                {{ tag }}

                                                                <i class="fa fa-times ml-1" style="cursor:pointer"
                                                                    @click="
                                                                        docente.tags.splice(
                                                                            tagIndex,
                                                                            1
                                                                        )
                                                                        "></i>

                                                            </span>

                                                        </div>

                                                        <!-- IMAGEN -->

                                                        <div v-if="
                                                            docente.imagen_actual
                                                        " class="mb-2">

                                                            <img :src="asset(
                                                                docente.imagen_actual
                                                            )
                                                                " width="120" class="rounded">

                                                        </div>

                                                        <input type="file" class="form-control" accept=".jpg,.jpeg,.png"
                                                            @change="
                                                                cambiarImagen(
                                                                    $event,
                                                                    docente
                                                                )
                                                                ">

                                                    </div>

                                                </div>

                                                <button type="button" class="btn btn-success" @click="agregarDocente">

                                                    <i class="fa fa-plus"></i>

                                                    Agregar

                                                </button>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
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
            docentes: []

        }
    },
    mounted() {
        this.getCarreras();
        this.getCategorias();
        this._editorCreate = null;
        this._editorEdit = null;
    },
    methods: {
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

        showDet(item) {

            this.carrera = { ...item };

            this.detalle = {
                descripcion:
                    item.detalle_descripcion?.descripcion ?? '',

                oportunidades:
                    item.detalle_descripcion?.oportunidades ?? [],

                preguntas:
                    item.preguntas?.map(p => ({
                        pregunta: p.pregunta ?? '',
                        respuesta: p.respuesta ?? '',
                        collapsed: true
                    })) ?? []
            };

            $("#modDetalleCarrera").modal('show');
        },

        abrirMalla() {
            this.malla =
                this.carrera.malla?.length

                    ? this.carrera.malla.map(item => ({
                        ciclo: item.ciclo ?? '',
                        descripcion:
                            item.descripcion === 'null'
                                ? ''
                                : item.descripcion ?? '',
                        cursos: item.cursos ?? [],
                        collapsed: true
                    }))

                    : [{
                        ciclo: '',
                        descripcion: '',
                        cursos: [],
                        collapsed: false
                    }];

            $('#modDetalleCarrera')
                .one('hidden.bs.modal', () => {

                    $('#modMallaCarrera').modal('show');

                })
                .modal('hide');


        },

        abrirPerfil() {

            this.perfil = {
                descripcion:
                    this.carrera.perfil_egresado?.descripcion ?? ''
            };

            $('#modMallaCarrera')
                .one('hidden.bs.modal', () => {

                    $('#modPerfilCarrera').modal('show');

                })
                .modal('hide');

        },

        abrirDocentes() {

            this.docentes =
                this.carrera.docentes?.length
                    ? this.carrera.docentes.map(d => ({
                        id: d.id,
                        nombre: d.nombre ?? '',
                        tags: [...(d.tags ?? [])],
                        correo: d.correo ?? '',
                        departamento: d.departamento ?? '',
                        descripcion: d.descripcion ?? '',
                        linkedin: d.linkedin ?? '',
                        imagen: null,
                        imagen_actual: d.imagen ?? null,
                        collapsed: true
                    }))

                    : [{
                        nombre: '',
                        tags: [],
                        correo: '',
                        departamento: '',
                        descripcion: '',
                        linkedin: '',
                        imagen: null,
                        imagen_actual: null,
                        collapsed: false
                    }];

            $('#modPerfilCarrera')
                .one('hidden.bs.modal', () => {

                    $('#modDocentesCarrera').modal('show');

                })
                .modal('hide');


        },

        storeCarrera() {

            let formData = new FormData();
            formData.append('categoria_id', this.carrera.categoria_id);
            formData.append('nombre', this.carrera.nombre);
            formData.append('descripcion', this.carrera.descripcion);
            formData.append('admision', this.carrera.admision);
            formData.append('duracion', this.carrera.duracion);
            formData.append('grado_obtenido', this.carrera.grado_obtenido);
            formData.append('titulacion', this.carrera.titulacion);
            formData.append('modalidades', this.carrera.modalidades);
            formData.append('brochure', this.carrera.brochure);
            formData.append('imagen', this.carrera.imagen);
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

        showEdit(item) {
            this.carrera = { ...item };
            this.$nextTick(() => {

                let drImagen = $('.dropify-edit-imagen').dropify({
                    defaultFile: item.imagen
                        ? this.asset('brochures_imagenes/' + item.imagen)
                        : ''
                });

                drImagen = drImagen.data('dropify');

                drImagen.resetPreview();
                drImagen.clearElement();

                drImagen.settings.defaultFile =
                    item.imagen
                        ? this.asset('brochures_imagenes/' + item.imagen)
                        : '';

                drImagen.destroy();
                drImagen.init();


                let drBrochure = $('.dropify-edit-brochure').dropify({
                    defaultFile: item.brochure
                        ? this.asset('brochures_carreras/' + item.brochure)
                        : ''
                });

                drBrochure = drBrochure.data('dropify');

                drBrochure.resetPreview();
                drBrochure.clearElement();

                drBrochure.settings.defaultFile =
                    item.brochure
                        ? this.asset('brochures_carreras/' + item.brochure)
                        : '';

                drBrochure.destroy();
                drBrochure.init();

            });
            $("#modEditarCarrera").modal('show');

        },

        updateCarrera() {


            let formData = new FormData();
            formData.append('id', this.carrera.id);
            formData.append('categoria_id', this.carrera.categoria_id);
            formData.append('nombre', this.carrera.nombre);
            formData.append('descripcion', this.carrera.descripcion);
            formData.append('admision', this.carrera.admision);
            formData.append('duracion', this.carrera.duracion);
            formData.append('grado_obtenido', this.carrera.grado_obtenido);
            formData.append('titulacion', this.carrera.titulacion);
            formData.append('modalidades', this.carrera.modalidades);
            formData.append('brochure', this.carrera.brochure);
            formData.append('imagen', this.carrera.imagen);
            axios.post(route('carreras.edit'), formData).then((response) => {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'CARRERA EDITADA',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.destroyDatatable();
                    this.getCarreras();
                    this.initDatatable();
                    $("#modEditarCarrera").modal('hide');
                    this.resetForm();
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

        imagen(event) {
            var drEvent = $('.dropify').dropify(
            );
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.settings.defaultFile = "";
            drEvent.destroy();
            drEvent.init();
            this.carrera.imagen = event.target.files[0];
        },

        imagen_edit(event) {
            var drEvent = $('.dropify').dropify(
            );
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.settings.defaultFile = "";
            drEvent.destroy();
            drEvent.init();
            this.carrera.imagen = event.target.files[0];
        },
        brochure(event) {
            var drEvent = $('.dropify').dropify(
            );
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.settings.defaultFile = "";
            drEvent.destroy();
            drEvent.init();
            this.carrera.brochure = event.target.files[0];
        },

        brochure_edit(event) {
            var drEvent = $('.dropify').dropify(
            );
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.settings.defaultFile = "";
            drEvent.destroy();
            drEvent.init();
            this.carrera.brochure = event.target.files[0];
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
        agregarDocente() {

            this.docentes.push({

                nombre: '',
                tags: [],
                correo: '',
                departamento: '',
                descripcion: '',
                linkedin: '',
                imagen: null,
                imagen_actual: null,
                collapsed: false

            });

        },
        eliminarDocente(index) {

            this.docentes.splice(index, 1);

        },
        agregarTag(docente, event) {

            const input =
                event.target
                    .closest('.input-group')
                    .querySelector('input');

            const valor =
                input.value.trim();

            if (!valor) return;

            docente.tags.push(valor);

            input.value = '';

        },
        cambiarImagen(event, docente) {

            docente.imagen =
                event.target.files[0];

        },
        guardarDocentes() {

            let formData = new FormData();

            formData.append(
                'carrera_id',
                this.carrera.id
            );

            this.docentes.forEach((docente, index) => {

                formData.append(
                    'nombre[]',
                    docente.nombre
                );

                formData.append(
                    'correo[]',
                    docente.correo
                );

                formData.append(
                    'departamento[]',
                    docente.departamento
                );

                formData.append(
                    'descripcion[]',
                    docente.descripcion
                );

                formData.append(
                    'linkedin[]',
                    docente.linkedin
                );

                formData.append(
                    'etiquetas_tags[]',
                    JSON.stringify(
                        docente.tags.map(tag => ({
                            value: tag
                        }))
                    )
                );

                formData.append(
                    'imagen_actual[]',
                    docente.imagen_actual ?? ''
                );

                if (docente.imagen) {

                    formData.append(
                        `imagen_${index}`,
                        docente.imagen
                    );

                }

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

                    $('#modDocentesCarrera').modal('hide');

                });

        }
    }
}
</script>