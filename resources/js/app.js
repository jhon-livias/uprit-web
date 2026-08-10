import { createApp } from "vue";
import { Ziggy } from "./ziggy";
import { route } from "ziggy-js";
import CarreraComponent from "./components/admin/CarreraComponent.vue";
import CategoriaComponent from "./components/admin/CategoriaComponent.vue";
import LibroReclamacionesComponent from "./components/admin/LibroReclamacionesComponent.vue";
import NivelAcademicoComponent from "./components/admin/NivelAcademicoComponent.vue";
import DocenteComponent from "./components/admin/DocenteComponent.vue";
import SliderComponent from "./components/admin/SliderComponent.vue";
import SliderCarreraComponent from "./components/admin/SliderCarreraComponent.vue";
import TestimonioComponent from "./components/admin/TestimonioComponent.vue";
import NoticiaComponent from "./components/admin/NoticiaComponent.vue";
import TransparenciaComponent from "./components/admin/TransparenciaComponent.vue";
import MenuComponent from "./components/admin/MenuComponent.vue";
import PostulaModalComponent from "./components/web/PostulaModalComponent.vue";

window.route = (name, params, absolute = false) =>
    route(name, params, absolute, Ziggy);
const app = createApp({});

app.config.globalProperties.route = window.route;
app.config.globalProperties.asset = (path) => {
    const normalized = String(path).replace(/^\/+/, "");
    return `${window.location.origin}/${normalized}`;
};

app.component("categoria-component", CategoriaComponent);
app.component("carrera-component", CarreraComponent);
app.component("reclamos-component", LibroReclamacionesComponent);
app.component("nivel-academico-component", NivelAcademicoComponent);
app.component("docente-component", DocenteComponent);
app.component("slider-component", SliderComponent);
app.component("slider-carrera-component",SliderCarreraComponent);
app.component("testimonio-component", TestimonioComponent);
app.component("noticia-component", NoticiaComponent);
app.component("transparencia-component", TransparenciaComponent);
app.component("menu-component", MenuComponent);
app.component("postula-modal-component", PostulaModalComponent);

app.mixin({
    methods: {
        initDatatable() {
            this.$nextTick(() => {
                $(".js-basic-example").DataTable({
                    destroy: true,
                });
            });
        },

        destroyDatatable() {
            if ($.fn.DataTable.isDataTable(".js-basic-example")) {
                $(".js-basic-example").DataTable().destroy();
            }
        },
    },
});
app.mount("#app");
