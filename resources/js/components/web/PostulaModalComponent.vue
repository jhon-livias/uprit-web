<template>
    <!-- Modal renderizado directamente en <body> para evitar conflictos de z-index -->
    <Teleport to="body">
        <Transition name="postula-fade">
            <div
                v-if="isOpen"
                class="postula-overlay"
                @click.self="close"
                role="presentation"
            >
                <Transition name="postula-sheet" appear>
                    <div
                        v-if="isOpen"
                        class="postula-sheet"
                        role="dialog"
                        aria-modal="true"
                        aria-label="Formulario de postulación UPRIT"
                    >
                        <!-- Handle bar (indicador de arrastre estilo mobile sheet) -->
                        <div class="postula-handle" aria-hidden="true"></div>

                        <!-- Encabezado del modal -->
                        <div class="postula-header">
                            <span class="postula-title">Formulario de Admisión</span>
                            <button
                                class="postula-close"
                                @click="close"
                                aria-label="Cerrar formulario"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"/>
                                    <line x1="6" y1="6" x2="18" y2="18"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Cuerpo con iframe -->
                        <div class="postula-body">
                            <iframe
                                v-if="isOpen"
                                src="https://uprit.jedu.pe/registro-admision"
                                title="Formulario de admisión UPRIT"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media"
                                allowfullscreen
                                loading="lazy"
                            ></iframe>
                        </div>
                    </div>
                </Transition>
            </div>
        </Transition>
    </Teleport>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const isOpen = ref(false);

const open = () => {
    isOpen.value = true;
    document.body.style.overflow = 'hidden';
};

const close = () => {
    isOpen.value = false;
    document.body.style.overflow = '';
};

const onKeydown = (e) => {
    if (e.key === 'Escape' && isOpen.value) close();
};

let triggerElements = [];

const bindTriggers = () => {
    triggerElements = Array.from(document.querySelectorAll('[data-postula-trigger]'));
    triggerElements.forEach((el) => el.addEventListener('click', open));
};

const unbindTriggers = () => {
    triggerElements.forEach((el) => el.removeEventListener('click', open));
    triggerElements = [];
};

onMounted(() => {
    window.addEventListener('keydown', onKeydown);
    bindTriggers();
});

onUnmounted(() => {
    window.removeEventListener('keydown', onKeydown);
    unbindTriggers();
    document.body.style.overflow = '';
});
</script>

<style scoped>
/* =============================================
   OVERLAY
   ============================================= */
.postula-overlay {
    position: fixed;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 99999;
    display: flex;
    align-items: flex-end;      /* bottom sheet por defecto (mobile) */
    justify-content: center;
}

/* =============================================
   SHEET — Mobile First (Bottom Sheet)
   ============================================= */
.postula-sheet {
    position: relative;
    background: #ffffff;
    width: 100%;
    height: 85vh;
    border-radius: 20px 20px 0 0;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-shadow: 0 -8px 40px rgba(0, 0, 0, 0.25);
}

/* =============================================
   HANDLE BAR (barra indicadora estilo Instagram)
   ============================================= */
.postula-handle {
    width: 40px;
    height: 4px;
    background-color: #d1d5db;
    border-radius: 2px;
    margin: 10px auto 0;
    flex-shrink: 0;
}

/* =============================================
   HEADER DEL MODAL
   ============================================= */
.postula-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 20px 10px;
    border-bottom: 1px solid #f0f0f0;
    flex-shrink: 0;
}

.postula-title {
    font-size: 16px;
    font-weight: 600;
    color: #1a1a2e;
    letter-spacing: 0.01em;
}

/* =============================================
   BOTÓN CERRAR (X)
   ============================================= */
.postula-close {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border: none;
    background: #f3f4f6;
    border-radius: 50%;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.2s ease;
    padding: 0;
    color: #6b7280;
    flex-shrink: 0;
}

.postula-close:hover {
    background: #e5e7eb;
    transform: scale(1.1);
    color: #111827;
}

.postula-close svg {
    width: 16px;
    height: 16px;
}

/* =============================================
   BODY + IFRAME
   ============================================= */
.postula-body {
    flex: 1;
    overflow: hidden;
    position: relative;
}

.postula-body iframe {
    width: 100%;
    height: 100%;
    border: none;
    display: block;
}

/* =============================================
   TABLET / DESKTOP  (≥ 768px)
   Bottom Sheet → Modal Centrado
   ============================================= */
@media (min-width: 768px) {
    .postula-overlay {
        align-items: center;        /* centrado vertical */
        padding: 24px;
    }

    .postula-sheet {
        width: 100%;
        max-width: 800px;
        height: 90vh;
        max-height: 820px;
        border-radius: 16px;       /* 4 esquinas redondeadas */
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    /* La barra de arrastre no tiene sentido en desktop */
    .postula-handle {
        display: none;
    }

    .postula-header {
        padding: 16px 24px 14px;
    }

    .postula-title {
        font-size: 18px;
    }
}

/* =============================================
   TRANSICIONES — Overlay (fade)
   ============================================= */
.postula-fade-enter-active,
.postula-fade-leave-active {
    transition: opacity 0.28s ease;
}

.postula-fade-enter-from,
.postula-fade-leave-to {
    opacity: 0;
}

/* =============================================
   TRANSICIONES — Sheet
   Mobile: desliza desde abajo
   Desktop: escala + fade
   ============================================= */
.postula-sheet-enter-active,
.postula-sheet-leave-active {
    transition: transform 0.35s cubic-bezier(0.32, 0.72, 0, 1),
                opacity 0.35s ease;
}

/* Mobile: entra desde abajo */
.postula-sheet-enter-from,
.postula-sheet-leave-to {
    transform: translateY(100%);
    opacity: 0;
}

@media (min-width: 768px) {
    .postula-sheet-enter-from,
    .postula-sheet-leave-to {
        transform: scale(0.93) translateY(12px);
        opacity: 0;
    }
}
</style>
