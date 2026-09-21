(function () {
    'use strict';

    var cfg = window.UPRIT_ANGELA_WIDGET;
    if (!cfg || !cfg.catalog) return;

    var STORAGE_KEY = 'uprit-angela-widget';
    var CONSULTAS = [
        { id: 'fecha de examen', label: 'Fecha de examen' },
        { id: 'inversión y costos', label: 'Inversión y costos' },
        { id: 'cómo postular', label: 'Cómo postular' }
    ];

    var fab = document.getElementById('angelaFab');
    var panel = document.getElementById('angelaPanel');
    var body = document.getElementById('angelaPanelBody');
    var closeBtn = document.getElementById('angelaPanelClose');
    if (!fab || !panel || !body || !closeBtn) return;

    var state = {
        step: 'nivel',
        nivel: null,
        carrera: null,
        modalidad: null,
        consulta: CONSULTAS[0].id,
        fuente: 'home'
    };

    function niveles() {
        return (cfg.catalog && cfg.catalog.niveles) || [];
    }

    function findNivel(nombre) {
        var needle = (nombre || '').toLowerCase();
        return niveles().find(function (n) {
            return n.nombre.toLowerCase() === needle || n.id === needle;
        }) || null;
    }

    function parseModalidades(raw) {
        if (Array.isArray(raw)) {
            return raw.map(function (item) { return String(item).trim(); }).filter(Boolean);
        }
        if (!raw) return [];
        try {
            var parsed = JSON.parse(raw);
            if (Array.isArray(parsed)) return parseModalidades(parsed);
        } catch (e) { /* ignore */ }
        return String(raw).split(',').map(function (item) { return item.trim(); }).filter(Boolean);
    }

    function buildMessage() {
        var carrera = state.carrera || {};
        var lines = [
            'Hola Angela, vengo de la web UPRIT.',
            cfg.marker || 'WEB_UPRIT',
            'Programa: ' + (carrera.nombre || ''),
            'Nivel: ' + (state.nivel ? state.nivel.nombre : ''),
            'Modalidad: ' + (state.modalidad || ''),
            'Consulta: ' + (state.consulta || 'fecha de examen'),
            'Fuente: ' + (state.fuente || 'home')
        ];
        if (carrera.admision) {
            lines.push('Fecha de examen (web): ' + carrera.admision);
        }
        return lines.join('\n');
    }

    function whatsappUrl() {
        var phone = String(cfg.phone || '51933248429').replace(/\D+/g, '');
        return 'https://wa.me/' + phone + '?text=' + encodeURIComponent(buildMessage());
    }

    function persist() {
        try {
            sessionStorage.setItem(STORAGE_KEY, JSON.stringify({
                step: state.step,
                nivelId: state.nivel && state.nivel.id,
                carreraId: state.carrera && state.carrera.id,
                modalidad: state.modalidad,
                consulta: state.consulta,
                fuente: state.fuente
            }));
        } catch (e) { /* ignore */ }
    }

    function restore() {
        try {
            var raw = sessionStorage.getItem(STORAGE_KEY);
            if (!raw) return;
            var saved = JSON.parse(raw);
            var nivel = niveles().find(function (n) { return n.id === saved.nivelId; });
            var carrera = nivel && (nivel.carreras || []).find(function (c) { return String(c.id) === String(saved.carreraId); });
            if (nivel) state.nivel = nivel;
            if (carrera) state.carrera = carrera;
            if (saved.modalidad) state.modalidad = saved.modalidad;
            if (saved.consulta) state.consulta = saved.consulta;
            if (saved.fuente) state.fuente = saved.fuente;
            if (saved.step) state.step = saved.step;
        } catch (e) { /* ignore */ }
    }

    function openPanel() {
        panel.hidden = false;
        fab.setAttribute('aria-expanded', 'true');
        fab.classList.add('is-open');
        render();
        body.scrollTop = body.scrollHeight;
    }

    function closePanel() {
        panel.hidden = true;
        fab.setAttribute('aria-expanded', 'false');
        fab.classList.remove('is-open');
    }

    function togglePanel() {
        if (panel.hidden) openPanel();
        else closePanel();
    }

    function el(tag, className, text) {
        var node = document.createElement(tag);
        if (className) node.className = className;
        if (text) node.textContent = text;
        return node;
    }

    function bubble(text, extraClass) {
        var node = el('div', 'angela-bubble' + (extraClass ? ' ' + extraClass : ''));
        node.textContent = text;
        return node;
    }

    function chips(items, onPick) {
        var wrap = el('div', 'angela-chips');
        items.forEach(function (item) {
            var btn = el('button', 'angela-chip', item.label);
            btn.type = 'button';
            if (item.active) btn.classList.add('is-active');
            btn.addEventListener('click', function () { onPick(item); });
            wrap.appendChild(btn);
        });
        return wrap;
    }

    function backRow() {
        var row = el('div', 'angela-toolbar');
        var back = el('button', 'angela-back', 'Volver');
        back.type = 'button';
        back.addEventListener('click', goBack);
        row.appendChild(back);
        var reset = el('button', 'angela-reset', 'Empezar de nuevo');
        reset.type = 'button';
        reset.addEventListener('click', resetFlow);
        row.appendChild(reset);
        return row;
    }

    function goBack() {
        if (state.step === 'preview') {
            var mods = (state.carrera && state.carrera.modalidades) || [];
            state.step = mods.length > 1 ? 'modalidad' : 'carrera';
            if (state.step === 'carrera') state.carrera = null;
        } else if (state.step === 'consulta') {
            var modsConsulta = (state.carrera && state.carrera.modalidades) || [];
            state.step = modsConsulta.length > 1 ? 'modalidad' : 'carrera';
            if (state.step === 'carrera') state.carrera = null;
        } else if (state.step === 'modalidad') {
            state.modalidad = null;
            state.step = 'carrera';
        } else if (state.step === 'carrera') {
            state.carrera = null;
            state.nivel = null;
            state.step = 'nivel';
        }
        persist();
        render();
    }

    function resetFlow() {
        state = {
            step: 'nivel',
            nivel: null,
            carrera: null,
            modalidad: null,
            consulta: CONSULTAS[0].id,
            fuente: state.fuente === 'ficha-carrera' ? 'ficha-carrera' : 'home'
        };
        persist();
        render();
    }

    function renderSearch(carreras) {
        var wrap = el('div', 'angela-search');
        var input = el('input', 'angela-search__input');
        input.type = 'search';
        input.placeholder = 'Buscar programa…';
        input.setAttribute('aria-label', 'Buscar programa');
        var list = el('div', 'angela-chips angela-chips--stack');
        wrap.appendChild(input);
        wrap.appendChild(list);

        function paint(term) {
            list.innerHTML = '';
            var q = (term || '').toLowerCase().trim();
            var filtered = carreras.filter(function (c) {
                return !q || (c.nombre || '').toLowerCase().indexOf(q) !== -1;
            });
            if (!filtered.length) {
                list.appendChild(el('p', 'angela-empty', 'No encontramos ese programa.'));
                return;
            }
            filtered.slice(0, 40).forEach(function (carrera) {
                var btn = el('button', 'angela-chip', carrera.nombre);
                btn.type = 'button';
                btn.addEventListener('click', function () { pickCarrera(carrera); });
                list.appendChild(btn);
            });
        }

        input.addEventListener('input', function () { paint(input.value); });
        paint('');
        return wrap;
    }

    function pickNivel(nivel) {
        state.nivel = nivel;
        state.carrera = null;
        state.modalidad = null;
        state.step = 'carrera';
        persist();
        render();
    }

    function pickCarrera(carrera) {
        state.carrera = carrera;
        var mods = carrera.modalidades || [];
        if (mods.length === 1) {
            state.modalidad = mods[0];
            state.step = 'preview';
        } else if (mods.length > 1) {
            state.step = 'modalidad';
        } else {
            state.modalidad = '';
            state.step = 'preview';
        }
        persist();
        render();
    }

    function pickModalidad(mod) {
        state.modalidad = mod;
        state.step = 'preview';
        persist();
        render();
    }

    function pickConsulta(consulta) {
        state.consulta = consulta;
        state.step = 'preview';
        persist();
        render();
    }

    function render() {
        body.innerHTML = '';
        body.appendChild(bubble('Hola, soy Angela, asesora de admisión de UPRIT. En 2 o 3 toques te paso a WhatsApp con tu consulta lista.'));

        if (state.nivel) {
            body.appendChild(bubble(state.nivel.nombre, 'is-user'));
        }

        if (state.step === 'nivel') {
            body.appendChild(bubble('¿Qué quieres estudiar?'));
            body.appendChild(chips(niveles().map(function (n) {
                return { id: n.id, label: n.nombre, nivel: n };
            }), function (item) { pickNivel(item.nivel); }));
            return;
        }

        if (state.carrera) {
            body.appendChild(bubble(state.carrera.nombre, 'is-user'));
        }

        if (state.step === 'carrera') {
            body.appendChild(bubble('Elige el programa. Puedes escribir para filtrar.'));
            body.appendChild(renderSearch(state.nivel.carreras || []));
            body.appendChild(backRow());
            return;
        }

        if (state.modalidad) {
            body.appendChild(bubble(state.modalidad, 'is-user'));
        }

        if (state.step === 'modalidad') {
            body.appendChild(bubble('¿Qué modalidad te interesa?'));
            body.appendChild(chips((state.carrera.modalidades || []).map(function (mod) {
                return { id: mod, label: mod };
            }), function (item) { pickModalidad(item.id); }));
            body.appendChild(backRow());
            return;
        }

        if (state.step === 'consulta' || state.step === 'preview') {
            body.appendChild(bubble('¿Qué quieres consultar?'));
            body.appendChild(chips(CONSULTAS.map(function (item) {
                return { id: item.id, label: item.label, active: item.id === state.consulta };
            }), function (item) { pickConsulta(item.id); }));
        }

        if (state.step === 'preview') {
            body.appendChild(bubble(state.consulta, 'is-user'));
            var preview = el('div', 'angela-preview');
            preview.appendChild(el('p', 'angela-preview__label', 'Angela recibirá este mensaje:'));
            preview.appendChild(el('pre', 'angela-preview__text', buildMessage()));
            var cta = el('a', 'angela-cta');
            cta.href = whatsappUrl();
            cta.target = '_blank';
            cta.rel = 'noopener noreferrer';
            cta.textContent = 'Continuar con Angela en WhatsApp';
            preview.appendChild(cta);
            body.appendChild(preview);
        }

        body.appendChild(backRow());
        persist();
        body.scrollTop = body.scrollHeight;
    }

    function applyPrefill(detail) {
        if (!detail) return;
        state.fuente = detail.fuente || 'ficha-carrera';
        var nivel = findNivel(detail.nivel) || state.nivel;
        if (nivel) state.nivel = nivel;

        var nombre = (detail.programa || '').trim();
        var carrera = null;
        if (nivel && nombre) {
            carrera = (nivel.carreras || []).find(function (c) {
                return c.nombre.toLowerCase() === nombre.toLowerCase();
            });
        }
        if (!carrera && nombre) {
            niveles().some(function (n) {
                carrera = (n.carreras || []).find(function (c) {
                    return c.nombre.toLowerCase() === nombre.toLowerCase();
                });
                if (carrera) {
                    state.nivel = n;
                    return true;
                }
                return false;
            });
        }
        if (!carrera && nombre) {
            carrera = {
                id: detail.id || nombre,
                nombre: nombre,
                modalidades: parseModalidades(detail.modalidades),
                admision: detail.admision || null
            };
        }
        if (carrera && detail.admision && !carrera.admision) {
            carrera.admision = detail.admision;
        }
        if (carrera && detail.modalidades) {
            var fromPage = parseModalidades(detail.modalidades);
            if (fromPage.length) carrera.modalidades = fromPage;
        }

        state.carrera = carrera;
        var mods = (carrera && carrera.modalidades) || [];
        if (mods.length === 1) {
            state.modalidad = mods[0];
            state.step = 'preview';
        } else if (mods.length > 1) {
            state.modalidad = null;
            state.step = 'modalidad';
        } else {
            state.step = carrera ? 'preview' : 'nivel';
        }
        persist();
    }

    fab.addEventListener('click', togglePanel);
    closeBtn.addEventListener('click', closePanel);

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && !panel.hidden) closePanel();
    });

    document.addEventListener('click', function (event) {
        var trigger = event.target.closest('[data-angela-open]');
        if (!trigger) return;
        event.preventDefault();
        applyPrefill({
            id: trigger.getAttribute('data-angela-id'),
            programa: trigger.getAttribute('data-angela-programa'),
            nivel: trigger.getAttribute('data-angela-nivel'),
            modalidades: trigger.getAttribute('data-angela-modalidades'),
            admision: trigger.getAttribute('data-angela-admision'),
            fuente: trigger.getAttribute('data-angela-fuente') || 'ficha-carrera'
        });
        openPanel();
    });

    window.addEventListener('angela:open', function (event) {
        applyPrefill(event.detail || {});
        openPanel();
    });

    restore();
})();
