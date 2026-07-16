<template>
    <Teleport to="body">
        <Transition name="postula-fade">
            <div
                v-if="isOpen"
                class="postula-overlay"
                role="presentation"
            >
                <Transition name="postula-sheet" appear>
                    <div
                        v-if="isOpen"
                        class="postula-sheet"
                        role="dialog"
                        aria-modal="true"
                        aria-label="Formulario de postulación UPRIT"
                        @click.stop
                    >
                        <div class="postula-handle" aria-hidden="true"></div>

                        <div class="postula-header">
                            <div class="postula-header-info">
                                <span class="postula-title">Formulario de Admisión</span>
                                <span class="postula-subtitle">Completa tu inscripción en línea</span>
                            </div>
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

                        <div class="postula-body">
                            <div v-if="isLoading" class="postula-loader" aria-hidden="true">
                                <div class="postula-spinner"></div>
                                <span>Cargando formulario…</span>
                            </div>
                            <iframe
                                v-if="isOpen"
                                ref="iframeRef"
                                src="https://uprit.jedu.pe/registro-admision"
                                title="Formulario de admisión UPRIT"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media"
                                allowfullscreen
                                scrolling="yes"
                                @load="onIframeLoad"
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
const isLoading = ref(true);
const iframeRef = ref(null);

const open = () => {
    isOpen.value = true;
    isLoading.value = true;
    document.body.style.overflow = 'hidden';
};

const close = () => {
    isOpen.value = false;
    isLoading.value = true;
    document.body.style.overflow = '';
};

const onIframeLoad = () => {
    isLoading.value = false;
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
    bindTriggers();
});

onUnmounted(() => {
    unbindTriggers();
    document.body.style.overflow = '';
});
</script>

<style scoped>
.postula-overlay {
    position: fixed;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.72);
    z-index: 99999;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    pointer-events: auto;
}

.postula-sheet {
    position: relative;
    background: #ffffff;
    width: 100%;
    height: 94vh;
    border-radius: 20px 20px 0 0;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-shadow: 0 -12px 48px rgba(0, 0, 0, 0.35);
}

.postula-handle {
    width: 40px;
    height: 4px;
    background-color: #d1d5db;
    border-radius: 2px;
    margin: 8px auto 0;
    flex-shrink: 0;
}

.postula-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 10px 16px;
    border-bottom: 1px solid #e8e8e8;
    background: linear-gradient(180deg, #fafafa 0%, #ffffff 100%);
    flex-shrink: 0;
}

.postula-header-info {
    display: flex;
    flex-direction: column;
    gap: 1px;
    min-width: 0;
}

.postula-title {
    font-size: 15px;
    font-weight: 700;
    color: #1a1a2e;
    line-height: 1.2;
}

.postula-subtitle {
    font-size: 12px;
    color: #6b7280;
    line-height: 1.2;
}

.postula-close {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border: none;
    background: #f3f4f6;
    border-radius: 50%;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.2s ease, color 0.2s ease;
    padding: 0;
    color: #6b7280;
    flex-shrink: 0;
}

.postula-close:hover {
    background: #ef535e;
    color: #ffffff;
    transform: scale(1.05);
}

.postula-close svg {
    width: 18px;
    height: 18px;
}

.postula-body {
    flex: 1;
    min-height: 0;
    overflow: hidden;
    position: relative;
    background: #f5f5f5;
}

.postula-body iframe {
    width: 100%;
    height: 100%;
    border: none;
    display: block;
    background: #ffffff;
}

.postula-loader {
    position: absolute;
    inset: 0;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 14px;
    background: #ffffff;
    color: #6b7280;
    font-size: 14px;
}

.postula-spinner {
    width: 36px;
    height: 36px;
    border: 3px solid #e5e7eb;
    border-top-color: #ef535e;
    border-radius: 50%;
    animation: postula-spin 0.75s linear infinite;
}

@keyframes postula-spin {
    to { transform: rotate(360deg); }
}

@media (min-width: 768px) {
    .postula-overlay {
        align-items: center;
        padding: 16px;
    }

    .postula-sheet {
        width: 100%;
        max-width: 960px;
        height: calc(100vh - 32px);
        max-height: none;
        border-radius: 14px;
        box-shadow: 0 24px 80px rgba(0, 0, 0, 0.4);
    }

    .postula-handle {
        display: none;
    }

    .postula-header {
        padding: 12px 20px;
    }

    .postula-title {
        font-size: 17px;
    }

    .postula-subtitle {
        font-size: 13px;
    }
}

@media (min-width: 1200px) {
    .postula-sheet {
        max-width: 1040px;
    }
}

.postula-fade-enter-active,
.postula-fade-leave-active {
    transition: opacity 0.28s ease;
}

.postula-fade-enter-from,
.postula-fade-leave-to {
    opacity: 0;
}

.postula-sheet-enter-active,
.postula-sheet-leave-active {
    transition: transform 0.35s cubic-bezier(0.32, 0.72, 0, 1),
                opacity 0.35s ease;
}

.postula-sheet-enter-from,
.postula-sheet-leave-to {
    transform: translateY(100%);
    opacity: 0;
}

@media (min-width: 768px) {
    .postula-sheet-enter-from,
    .postula-sheet-leave-to {
        transform: scale(0.95) translateY(16px);
        opacity: 0;
    }
}
</style>
