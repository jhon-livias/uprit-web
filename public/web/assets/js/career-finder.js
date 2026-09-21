(function () {
    'use strict';

    var NIVEL_ORDER = ['pregrado', 'puede', 'posgrado', 'segunda'];
    var DURACION_ORDER = ['1 año o menos', '2 años', '3 años', '4 a 5 años', 'Más de 5 años'];
    var STOP = {
        de: 1, la: 1, el: 1, los: 1, las: 1, un: 1, una: 1, y: 1, o: 1, en: 1,
        para: 1, que: 1, con: 1, del: 1, al: 1, por: 1, mi: 1, me: 1, quiero: 1,
        estudiar: 1, carrera: 1, algo: 1, sobre: 1, busco: 1, buscar: 1
    };

    // Grupos de sinónimos — "leyes" matchea con "derecho" y viceversa → resultado DIRECTO
    var GROUPS = [
        ['derecho', 'leyes', 'abogado', 'abogada', 'juridico', 'legal', 'ley'],
        ['enfermeria', 'enfermera', 'enfermero'],
        ['medicina', 'medico', 'medica', 'doctor', 'doctora'],
        ['psicologia', 'psicologo', 'psicologa'],
        ['nutricion', 'nutricionista', 'alimentacion', 'dieta'],
        ['obstetricia', 'obstetra'],
        ['administracion', 'negocios', 'empresa', 'gerencia', 'empresarial', 'gestion'],
        ['contabilidad', 'contador', 'contadora', 'finanzas'],
        ['economia', 'economista'],
        ['sistemas', 'software', 'computacion', 'informatica', 'programacion', 'tecnologia'],
        ['educacion', 'docente', 'profesor', 'profesora', 'pedagogia', 'ensenanza', 'maestro', 'maestra'],
        ['marketing', 'publicidad', 'ventas', 'comercial', 'mercadeo'],
        ['arquitectura', 'arquitecto', 'arquitecta', 'diseno'],
        ['civil', 'construccion', 'obras'],
        ['industrial', 'procesos', 'produccion'],
        ['turismo', 'hoteleria', 'gastronomia'],
        ['farmacia', 'farmaceutico', 'quimica'],
        ['biologia', 'biologo', 'biologa'],
        ['idiomas', 'lenguas', 'ingles', 'traduccion'],
        ['comunicacion', 'periodismo', 'periodista'],
        ['arte', 'artes', 'musica', 'teatro']
    ];

    var catalogPromise = null;
    var aiModelPromise = null;
    var aiExtractor = null;
    var aiEmbeddings = [];
    var aiReady = false;

    function initAI(carrerasList, statusNode) {
        if (!aiModelPromise) {
            aiModelPromise = (async function () {
                try {
                    statusNode.textContent = 'IA: Descargando modelo…';
                    const transformers = await import('https://cdn.jsdelivr.net/npm/@xenova/transformers@2.17.2');
                    const pipeline = transformers.pipeline;
                    transformers.env.allowLocalModels = false;

                    aiExtractor = await pipeline('feature-extraction', 'Xenova/all-MiniLM-L6-v2', {
                        progress_callback: function (info) {
                            if (info.status === 'progress' && info.progress) {
                                statusNode.textContent = 'IA: ' + Math.round(info.progress) + '%';
                            }
                        }
                    });

                    statusNode.textContent = 'IA: Analizando…';
                    aiEmbeddings = [];
                    for (var i = 0; i < carrerasList.length; i++) {
                        var text = carrerasList[i].nombre + ' ' + (carrerasList[i].facultad || '');
                        var output = await aiExtractor(text, { pooling: 'mean', normalize: true });
                        aiEmbeddings[i] = output.data;
                    }

                    aiReady = true;
                    statusNode.textContent = '';
                } catch (e) {
                    console.warn('Error cargando modelo IA', e);
                    statusNode.textContent = '';
                }
            })();
        }
        return aiModelPromise;
    }

    function cosineSimilarity(vecA, vecB) {
        var dot = 0.0, normA = 0.0, normB = 0.0;
        for (var i = 0; i < vecA.length; i++) {
            dot += vecA[i] * vecB[i];
            normA += vecA[i] * vecA[i];
            normB += vecB[i] * vecB[i];
        }
        if (normA === 0 || normB === 0) return 0;
        return dot / (Math.sqrt(normA) * Math.sqrt(normB));
    }

    function fold(value) {
        return String(value || '')
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s]/g, ' ')
            .replace(/\s+/g, ' ')
            .trim();
    }

    function loadCatalog(url) {
        if (!catalogPromise) {
            catalogPromise = fetch(url, { headers: { Accept: 'application/json' } })
                .then(function (response) {
                    if (!response.ok) throw new Error('catalog');
                    return response.json();
                })
                .then(function (payload) {
                    return Array.isArray(payload.carreras) ? payload.carreras : [];
                });
        }
        return catalogPromise;
    }

    function uniqueSorted(values) {
        return Array.from(new Set(values.filter(Boolean))).sort(function (a, b) {
            return a.localeCompare(b, 'es');
        });
    }

    function fillSelect(select, values, order) {
        var current = select.value;
        var list = values.slice();
        if (order) {
            list.sort(function (a, b) {
                var ia = order.indexOf(a);
                var ib = order.indexOf(b);
                if (ia === -1 && ib === -1) return a.localeCompare(b, 'es');
                if (ia === -1) return 1;
                if (ib === -1) return -1;
                return ia - ib;
            });
        }
        select.replaceChildren();
        var all = document.createElement('option');
        all.value = '';
        all.textContent = 'Todas';
        select.appendChild(all);
        list.forEach(function (value) {
            var option = document.createElement('option');
            option.value = value;
            option.textContent = value;
            select.appendChild(option);
        });
        select.value = list.indexOf(current) === -1 ? '' : current;
    }

    /**
     * Devuelve todos los sinónimos del grupo que contiene el token dado.
     */
    function getSynonyms(token) {
        var synonyms = [];
        if (token.length < 3) return synonyms;
        for (var g = 0; g < GROUPS.length; g++) {
            var group = GROUPS[g];
            var hit = group.some(function (word) {
                return word === token ||
                    (token.length >= 4 && word.indexOf(token) === 0) ||
                    (word.length >= 4 && token.indexOf(word) === 0);
            });
            if (hit) {
                group.forEach(function (word) {
                    if (synonyms.indexOf(word) === -1) synonyms.push(word);
                });
            }
        }
        return synonyms;
    }

    function levenshtein(a, b) {
        if (Math.abs(a.length - b.length) > 2) return 3;
        var prev = [], curr = [], i, j;
        for (j = 0; j <= b.length; j++) prev[j] = j;
        for (i = 1; i <= a.length; i++) {
            curr[0] = i;
            for (j = 1; j <= b.length; j++) {
                var cost = a.charAt(i - 1) === b.charAt(j - 1) ? 0 : 1;
                curr[j] = Math.min(curr[j - 1] + 1, prev[j] + 1, prev[j - 1] + cost);
            }
            prev = curr;
            curr = [];
        }
        return prev[b.length];
    }

    /**
     * Calcula score + tipo de match.
     * FIX CLAVE: sinónimos → resultado DIRECTO (isSynonym=true pero score>0)
     * Así el contador y el renderizador SIEMPRE están sincronizados.
     */
    function scoreCareer(carrera, query, tokens) {
        var name = fold(carrera.nombre);
        var faculty = fold(carrera.facultad);
        var nameWords = name.split(' ').filter(Boolean);
        var score = 0;
        var isSynonym = false;

        // Frase completa → máxima prioridad
        if (query && name.indexOf(query) !== -1) {
            score += 100;
        }

        tokens.forEach(function (token) {
            // Match directo en nombre
            if (name.indexOf(token) !== -1) {
                score += 40;
                return;
            }
            // Match en facultad
            if (faculty.indexOf(token) !== -1) {
                score += 20;
                return;
            }
            // Sinónimo → SIGUE SIENDO DIRECTO
            var synonyms = getSynonyms(token);
            if (synonyms.length > 0) {
                var synonymHit = synonyms.some(function (syn) {
                    return nameWords.some(function (part) {
                        return part === syn ||
                            (part.length >= 4 && part.indexOf(syn) === 0) ||
                            (syn.length >= 4 && syn.indexOf(part) === 0);
                    });
                });
                if (synonymHit) {
                    score += 35;
                    isSynonym = true;
                    return;
                }
            }
            // Typo leve
            if (token.length >= 5) {
                var close = nameWords.some(function (part) {
                    return part.length >= 5 && levenshtein(token, part) <= 1;
                });
                if (close) {
                    score += 18;
                    isSynonym = true;
                }
            }
        });

        return { score: score, isSynonym: isSynonym };
    }

    function intentHint(query, apply) {
        var text = fold(query);
        if (/\b(maestr|master|doctorad|posgrado)\b/.test(text)) {
            return { text: 'Eso suele estar en Posgrado.', nivel: 'posgrado', apply: apply };
        }
        if (/\b(trabaj|puede|adultos)\b/.test(text)) {
            return { text: 'Puede está pensado para quien ya trabaja.', nivel: 'puede', apply: apply };
        }
        if (/\b(virtual|distancia|online|linea)\b/.test(text)) {
            return { text: 'Hay programas en modalidad A Distancia.', modalidad: 'A Distancia', apply: apply };
        }
        return null;
    }

    var NIVEL_ICONS = { pregrado: 'mdi:school', puede: 'mdi:briefcase-clock', posgrado: 'mdi:certificate', segunda: 'mdi:star-circle' };

    function createResult(carrera, tag) {
        var link = document.createElement('a');
        link.className = 'career-finder__item';
        link.href = carrera.url;

        // Ícono de nivel
        var iconEl = document.createElement('iconify-icon');
        iconEl.setAttribute('icon', NIVEL_ICONS[carrera.nivel] || 'mdi:school');
        iconEl.setAttribute('aria-hidden', 'true');
        iconEl.className = 'career-finder__item-icon';
        link.appendChild(iconEl);

        // Cuerpo
        var body = document.createElement('div');
        body.className = 'career-finder__item-body';

        var name = document.createElement('strong');
        name.textContent = carrera.nombre;
        body.appendChild(name);

        var meta = document.createElement('span');
        meta.className = 'career-finder__meta';
        var bits = [carrera.nivelLabel, carrera.facultad];
        if (carrera.modalidades && carrera.modalidades.length) bits.push(carrera.modalidades.join(' · '));
        if (carrera.duracion) bits.push(carrera.duracion);
        meta.textContent = bits.filter(Boolean).join(' · ');
        body.appendChild(meta);
        link.appendChild(body);

        // Badge opcional
        if (tag) {
            var badge = document.createElement('em');
            badge.className = 'career-finder__badge career-finder__badge--' + tag;
            badge.textContent = tag === 'synonym' ? 'Relacionada' : 'IA';
            link.appendChild(badge);
        }

        // Flecha
        var arrow = document.createElement('iconify-icon');
        arrow.setAttribute('icon', 'mdi:chevron-right');
        arrow.setAttribute('aria-hidden', 'true');
        arrow.className = 'career-finder__item-arrow';
        link.appendChild(arrow);

        return link;
    }

    function createSectionLabel(text, icon) {
        var p = document.createElement('p');
        p.className = 'career-finder__suggest-label';
        if (icon) {
            var ic = document.createElement('iconify-icon');
            ic.setAttribute('icon', icon);
            ic.setAttribute('aria-hidden', 'true');
            p.appendChild(ic);
            p.appendChild(document.createTextNode(' ' + text));
        } else {
            p.textContent = text;
        }
        return p;
    }

    function mount(root) {
        var input = root.querySelector('.career-finder__input');
        var clearBtn = root.querySelector('.career-finder__clear');
        var chips = root.querySelector('.career-finder__chips');
        var hint = root.querySelector('.career-finder__hint');
        var count = root.querySelector('.career-finder__count');
        var resetFiltersBtn = root.querySelector('.career-finder__reset-filters');
        var results = root.querySelector('.career-finder__results');
        var selects = {
            facultad: root.querySelector('[data-filter="facultad"]'),
            modalidad: root.querySelector('[data-filter="modalidad"]'),
            duracion: root.querySelector('[data-filter="duracion"]')
        };
        var state = { nivel: '', facultad: '', modalidad: '', duracion: '', query: '' };
        var carreras = [];
        var idleLimit = root.getAttribute('data-context') === 'home' ? 6 : 12;

        function subsetFor(fieldToIgnore) {
            return carreras.filter(function (c) {
                if (state.nivel && c.nivel !== state.nivel) return false;
                if (fieldToIgnore !== 'facultad' && state.facultad && c.facultad !== state.facultad) return false;
                if (fieldToIgnore !== 'modalidad' && state.modalidad && (c.modalidades || []).indexOf(state.modalidad) === -1) return false;
                if (fieldToIgnore !== 'duracion' && state.duracion && c.duracionKey !== state.duracion) return false;
                return true;
            });
        }

        function refreshOptions() {
            var subFacultad = subsetFor('facultad');
            var subModalidad = subsetFor('modalidad');
            var subDuracion = subsetFor('duracion');

            var facultadLabel = selects.facultad.parentElement.querySelector('span');
            if (facultadLabel) {
                facultadLabel.textContent = (state.nivel === 'posgrado' || state.nivel === 'segunda') ? 'Área' : 'Facultad';
            }
            fillSelect(selects.facultad, uniqueSorted(subFacultad.map(function (c) { return c.facultad; })));
            fillSelect(selects.modalidad, uniqueSorted(subModalidad.reduce(function (all, c) { return all.concat(c.modalidades || []); }, [])));
            fillSelect(selects.duracion, uniqueSorted(subDuracion.map(function (c) { return c.duracionKey; })), DURACION_ORDER);
            
            state.facultad = selects.facultad.value;
            state.modalidad = selects.modalidad.value;
            state.duracion = selects.duracion.value;
        }

        function renderChips() {
            var present = {};
            carreras.forEach(function (c) { present[c.nivel] = c.nivelLabel; });
            chips.replaceChildren();
            var all = document.createElement('button');
            all.type = 'button';
            all.className = 'career-finder__chip' + (state.nivel === '' ? ' is-active' : '');
            all.textContent = 'Todas';
            all.addEventListener('click', function () { state.nivel = ''; refreshOptions(); render(); });
            chips.appendChild(all);
            NIVEL_ORDER.forEach(function (id) {
                if (!present[id]) return;
                var btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'career-finder__chip' + (state.nivel === id ? ' is-active' : '');
                btn.textContent = present[id];
                if (id === 'puede') btn.title = 'Pregrado para personas que trabajan';
                btn.addEventListener('click', function () {
                    state.nivel = state.nivel === id ? '' : id;
                    refreshOptions();
                    render();
                });
                chips.appendChild(btn);
            });
        }

        function matchesFilters(carrera) {
            if (state.nivel && carrera.nivel !== state.nivel) return false;
            if (state.facultad && carrera.facultad !== state.facultad) return false;
            if (state.modalidad && (carrera.modalidades || []).indexOf(state.modalidad) === -1) return false;
            if (state.duracion && carrera.duracionKey !== state.duracion) return false;
            return true;
        }

        var currentSearchId = 0;

        function render() {
            var searchId = ++currentSearchId;
            var query = fold(state.query);
            var tokens = query.split(' ').filter(function (t) { return t.length > 1 && !STOP[t]; });
            var pool = carreras.filter(matchesFilters);
            var browsing = !tokens.length && !state.nivel && !state.facultad && !state.modalidad && !state.duracion;

            // Clasificar resultados
            var hits = [];
            if (!tokens.length) {
                hits = pool.map(function (c) { return { carrera: c, score: 0, isSynonym: false }; })
                    .sort(function (a, b) { return a.carrera.nombre.localeCompare(b.carrera.nombre, 'es'); });
            } else {
                pool.forEach(function (carrera) {
                    var r = scoreCareer(carrera, query, tokens);
                    if (r.score > 0) hits.push({ carrera: carrera, score: r.score, isSynonym: r.isSynonym });
                });
                hits.sort(function (a, b) { return b.score - a.score || a.carrera.nombre.localeCompare(b.carrera.nombre, 'es'); });
            }

            var visibleHits = browsing ? hits.slice(0, idleLimit) : hits;

            // Render sincrónico
            results.replaceChildren();

            if (!visibleHits.length) {
                var empty = document.createElement('p');
                empty.className = 'career-finder__empty';
                empty.textContent = tokens.length
                    ? 'No encontramos carreras con ese término. Prueba otro o quita algún filtro.'
                    : 'No hay carreras con esos filtros.';
                results.appendChild(empty);
            } else {
                var exactItems = visibleHits.filter(function (r) { return !r.isSynonym; });
                var synonymItems = visibleHits.filter(function (r) { return r.isSynonym; });

                exactItems.forEach(function (r) { results.appendChild(createResult(r.carrera, null)); });

                if (synonymItems.length) {
                    results.appendChild(
                        exactItems.length
                            ? createSectionLabel('También puede interesarte', 'mdi:lightbulb-on-outline')
                            : createSectionLabel('Carreras relacionadas con tu búsqueda', 'mdi:link-variant')
                    );
                    synonymItems.forEach(function (r) { results.appendChild(createResult(r.carrera, 'synonym')); });
                }

                if (browsing && hits.length > idleLimit) {
                    var more = document.createElement('button');
                    more.type = 'button';
                    more.className = 'career-finder__more';
                    more.textContent = 'Ver las ' + hits.length + ' carreras';
                    more.addEventListener('click', function () { idleLimit = hits.length; render(); });
                    results.appendChild(more);
                }
            }

            // Contador sincronizado
            var shownCount = visibleHits.length;
            count.textContent = browsing
                ? 'Mostrando ' + Math.min(shownCount, idleLimit) + ' de ' + hits.length
                : shownCount + (shownCount === 1 ? ' resultado' : ' resultados');

            if (resetFiltersBtn) {
                resetFiltersBtn.hidden = !(state.facultad || state.modalidad || state.duracion || state.nivel);
            }

            // Hint de intención
            var idea = tokens.length ? intentHint(state.query, function (patch) {
                if (patch.nivel) state.nivel = patch.nivel;
                if (patch.modalidad) { refreshOptions(); selects.modalidad.value = patch.modalidad; state.modalidad = selects.modalidad.value; }
                refreshOptions();
                renderChips();
                render();
            }) : null;

            if (idea && ((idea.nivel && state.nivel !== idea.nivel) || (idea.modalidad && state.modalidad !== idea.modalidad))) {
                hint.hidden = false;
                hint.replaceChildren();
                hint.append(document.createTextNode(idea.text + ' '));
                var action = document.createElement('button');
                action.type = 'button';
                action.textContent = idea.nivel ? 'Filtrar ese nivel' : 'Filtrar esa modalidad';
                action.addEventListener('click', function () { idea.apply({ nivel: idea.nivel, modalidad: idea.modalidad }); });
                hint.appendChild(action);
            } else {
                hint.hidden = true;
                hint.replaceChildren();
            }

            clearBtn.hidden = state.query === '';
            renderChips();

            // IA: extras semánticos (asíncrono, NO toca el counter ya mostrado)
            if (tokens.length > 0 && query.length > 2 && aiReady && aiEmbeddings.length === carreras.length) {
                var directCarreras = hits.map(function (r) { return r.carrera; });
                aiExtractor(state.query, { pooling: 'mean', normalize: true }).then(function (output) {
                    if (searchId !== currentSearchId) return;
                    var queryEmb = output.data;
                    var aiExtras = [];

                    pool.forEach(function (carrera) {
                        if (directCarreras.indexOf(carrera) !== -1) return;
                        var idx = carreras.indexOf(carrera);
                        if (idx !== -1 && aiEmbeddings[idx]) {
                            var sim = cosineSimilarity(queryEmb, aiEmbeddings[idx]);
                            if (sim > 0.4) aiExtras.push({ carrera: carrera, score: sim });
                        }
                    });

                    aiExtras.sort(function (a, b) { return b.score - a.score; });
                    aiExtras = aiExtras.slice(0, 4);

                    if (aiExtras.length) {
                        results.appendChild(createSectionLabel('Recomendaciones IA', 'mdi:robot-outline'));
                        aiExtras.forEach(function (row) {
                            results.appendChild(createResult(row.carrera, 'ai'));
                        });
                    }
                });
            }
        }

        input.addEventListener('input', function () { state.query = input.value; render(); });
        clearBtn.addEventListener('click', function () { input.value = ''; state.query = ''; input.focus(); render(); });
        if (resetFiltersBtn) {
            resetFiltersBtn.addEventListener('click', function () {
                state.facultad = '';
                state.modalidad = '';
                state.duracion = '';
                state.nivel = '';
                selects.facultad.value = '';
                selects.modalidad.value = '';
                selects.duracion.value = '';
                refreshOptions();
                render();
            });
        }
        Object.keys(selects).forEach(function (key) {
            selects[key].addEventListener('change', function () { 
                state[key] = selects[key].value; 
                refreshOptions(); 
                render(); 
            });
        });

        count.textContent = 'Cargando carreras…';
        loadCatalog(root.getAttribute('data-career-catalog')).then(function (list) {
            carreras = list;
            refreshOptions();
            render();

            var aiStatusNode = document.createElement('span');
            aiStatusNode.className = 'career-finder__ai-status';
            count.parentNode.insertBefore(aiStatusNode, count.nextSibling);
            initAI(carreras, aiStatusNode).then(function () {
                if (aiReady && state.query.trim().length > 0) render();
            });
        }).catch(function () {
            count.textContent = '';
            var error = document.createElement('p');
            error.className = 'career-finder__empty';
            error.textContent = 'No se pudo cargar el buscador. Recarga la página.';
            results.appendChild(error);
        });
    }

    function closeMobileMenu() {
        var menu = document.querySelector('.popup-mobile-menu');
        var openBtn = document.querySelector('.hamberger-button');
        if (!menu) return;
        menu.classList.remove('active');
        document.body.classList.remove('mobile-menu-open');
        menu.setAttribute('aria-hidden', 'true');
        if (openBtn) openBtn.setAttribute('aria-expanded', 'false');
    }

    function initDialog() {
        var dialog = document.getElementById('career-finder-dialog');
        if (!dialog) return;
        var lastOpener = null;

        function openDialog(opener) {
            lastOpener = opener || null;
            closeMobileMenu();
            if (typeof dialog.showModal === 'function' && !dialog.open) dialog.showModal();
            var inp = dialog.querySelector('.career-finder__input');
            if (inp) inp.focus();
        }

        function closeDialog() {
            if (dialog.open) dialog.close();
            if (lastOpener) lastOpener.focus();
        }

        document.querySelectorAll('[data-career-finder-open]').forEach(function (button) {
            button.addEventListener('click', function () { openDialog(button); });
        });
        dialog.querySelectorAll('[data-career-finder-close]').forEach(function (button) {
            button.addEventListener('click', closeDialog);
        });
        dialog.addEventListener('click', function (event) {
            if (event.target === dialog) closeDialog();
        });
    }

    document.querySelectorAll('[data-career-finder]').forEach(mount);
    initDialog();
})();

