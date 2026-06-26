<template>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-12">
                            <span style="font-weight:bold; color: #20272f; font-size: 24px;">Lista de Reclamos</span>


                        </div>

                        <div class="col-12 tab-content padding-0">

                            <div class="tab-pane active" id="español">
                                <div class="body">
                                    <div class="table-responsive" style="padding-top: 20px;">

                                        <table class="table table-hover js-basic-example table-striped">
                                            <thead style="color: #fff; background-color: #545b62;">
                                                <tr>
                                                    <th style="text-align: center">#</th>
                                                    <th style="text-align: center">Fecha</th>
                                                    <th style="text-align: center">Nombre</th>
                                                    <th style="text-align: center">DNI/CNE</th>
                                                    <th style="text-align: center">Tipo</th>
                                                    <th style="text-align: center">Descripción</th>
                                                    <th style="text-align: center">Tipo de Reclamo</th>
                                                    <th style="text-align: center">Detalle</th>
                                                    <th style="text-align: center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in reclamos" :key="item.id">
                                                    <td style="text-align: center">{{ index + 1 }}</td>
                                                    <td style="text-align: center">{{ formatFecha(item.fecha) }}</td>
                                                    <td style="text-align: center">{{ item.nombres }}
                                                        {{ item.apellidos }}</td>
                                                    <td style="text-align: center">{{ item.dni }}</td>
                                                    <td style="text-align: center">{{ item.tipo }}</td>
                                                    <td style="text-align: center">{{ item.descripcion }}</td>
                                                    <td style="text-align: center">{{ item.tipo_reclamo }}</td>
                                                    <td style="text-align: center">{{ item.detalle }}</td>
                                                    <td style="text-align: center" class="text-nowrap">
                                                        <a class="btn btn-warning esp-dere"
                                                            href="javascript:;" @click="showDetalle(item)"
                                                            style="color: white;">
                                                            <i class="icon-eye"></i>
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
                            <div class="modal fade" id="mdlDetalleReclamo" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hoja de Reclamo</h4> <button type="button"
                                                data-dismiss="modal" aria-label="Close" class="close"></button>
                                        </div>
                                        <div class="modal-body" style="padding:30px">

                                            <div class="mb-4">
                                                <h4>1. Información de la Empresa</h4>

                                                <div class="row">
                                                    <div class="col-md-9 mb-3">
                                                        <strong>Razón Social:</strong><br>
                                                        {{ reclamo.razon_social }}
                                                    </div>

                                                    <div class="col-md-3 mb-3">
                                                        <strong>RUC:</strong><br>
                                                        {{ reclamo.ruc }}
                                                    </div>

                                                    <div class="col-md-9 mb-3">
                                                        <strong>Domicilio Fiscal:</strong><br>
                                                        {{ reclamo.domicilio_fiscal }}
                                                    </div>

                                                    <div class="col-md-3 mb-3">
                                                        <strong>Fecha:</strong><br>
                                                        {{ formatFecha(reclamo.fecha) }}
                                                        
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <strong>Sede:</strong><br>
                                                        {{ reclamo.sede }}
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <strong>Unidad:</strong><br>
                                                        {{ reclamo.unidad }}
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="mb-4">
                                                <h4>2. Identificación del Consumidor Reclamante</h4>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <strong>Nombres:</strong><br>
                                                        {{ reclamo.nombres }}
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <strong>Apellidos:</strong><br>
                                                        {{ reclamo.apellidos }}
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <strong>Domicilio:</strong><br>
                                                        {{ reclamo.domicilio }}
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <strong>DNI / CE:</strong><br>
                                                        {{ reclamo.dni }}
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <strong>Teléfono:</strong><br>
                                                        {{ reclamo.telefono }}
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <strong>Correo:</strong><br>
                                                        {{ reclamo.correo }}
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <strong>Apoderado:</strong><br>
                                                        {{ reclamo.apoderado }}
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="mb-4">
                                                <h4>3. Identificación del Bien Contratado</h4>

                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <strong>Tipo:</strong><br>
                                                        {{ reclamo.tipo }}
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <strong>Descripción del Reclamo:</strong><br>
                                                        {{ reclamo.descripcion }}
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <strong>Monto Reclamado:</strong><br>
                                                        S/ {{ reclamo.monto }}
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="mb-4">
                                                <h4>4. Detalle de la Reclamación</h4>

                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <strong>Tipo de Reclamo:</strong><br>
                                                        {{ reclamo.tipo_reclamo }}
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <strong>Detalle:</strong><br>
                                                        {{ reclamo.detalle }}
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <strong>Evidencia Adjunta:</strong><br>
                                                        <a :src="asset('reclamos_evidencia/'+reclamo.evidencia)"
                                                            target="_blank">Ver Evidencia</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="mt-4">
                                                <p>
                                                    La respuesta a la presente será atendida mediante correo electrónico
                                                    a la dirección consignada por el reclamante.
                                                </p>

                                                <p>
                                                    La formulación del reclamo no impide acudir a otras vías de solución
                                                    de controversias ni es requisito previo para interponer una denuncia
                                                    ante INDECOPI.
                                                </p>

                                                <p>
                                                    El proveedor debe dar respuesta al reclamo o queja en un plazo no
                                                    mayor a quince (15) días hábiles.
                                                </p>
                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
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
            reclamos: [],
            reclamo: {}
        }
    },
    mounted() {
        this.getReclamos();
    },
    methods: {
        formatFecha(fecha) {
            if (!fecha) return '-';

            return new Date(fecha).toLocaleDateString('es-PE', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
        },
        getReclamos() {
            axios.get(route('reclamos.get')).then((response) => {
                this.destroyDatatable();
                this.reclamos = response.data;
                this.initDatatable();
            }).catch(error => {
                console.log('Error en el Servidor');
            })
        },
        showDetalle(item) {
            this.reclamo = item;
            $("#mdlDetalleReclamo").modal('show');
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
                    axios.post(route('reclamos.delete', id))
                        .then((response) => {
                            if (response.data) {
                                this.getNiveles();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'RECLAMO ELIMINADO',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                toastr.warning("No se pudo eliminar el Reclamo");
                            }
                        }).catch(error => {
                            toastr.error("Error al eliminar el Reclamo");
                            console.log(error);
                        });
                }
            });
        },
    }
}
</script>