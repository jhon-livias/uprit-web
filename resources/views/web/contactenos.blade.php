@extends('web.layouts.principal')

@section('styles')
    <style>
        .contact-request {
            background: #fff;
            border: 1px solid #e9e7e5;
            border-radius: 20px;
            box-shadow: 0 18px 45px rgba(29, 19, 14, .09);
            padding: clamp(24px, 4vw, 42px);
        }

        .contact-request .section-title {
            margin-bottom: 26px;
        }

        .contact-request .section-title .title {
            color: #1f1b1a;
            font-size: clamp(26px, 3vw, 34px);
            line-height: 1.15;
            margin-bottom: 8px;
        }

        .contact-request .section-title p {
            color: #716c69;
            font-size: 15px;
            margin: 0;
        }

        .contact-request__grid {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .contact-request__field--full {
            grid-column: 1 / -1;
        }

        .contact-request label:not(.contact-request__option):not(.contact-request__consent) {
            color: #2c2826;
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .contact-request input[type="text"],
        .contact-request input[type="email"],
        .contact-request input[type="tel"],
        .contact-request select {
            background: #fff;
            border: 1px solid #d9d5d2;
            border-radius: 8px;
            color: #272321;
            font-size: 15px;
            height: 48px;
            padding: 0 14px;
            transition: border-color .2s ease, box-shadow .2s ease;
            width: 100%;
        }

        .contact-request select {
            appearance: auto;
        }

        .contact-request input:focus,
        .contact-request select:focus {
            border-color: #91001e;
            box-shadow: 0 0 0 3px rgba(145, 0, 30, .12);
            outline: 0;
        }

        .contact-request__modalidades {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .contact-request__option {
            align-items: center;
            border: 1px solid #d9d5d2;
            border-radius: 999px;
            color: #514b48;
            cursor: pointer;
            display: inline-flex;
            font-size: 14px;
            font-weight: 600;
            gap: 7px;
            margin: 0;
            padding: 9px 13px;
            transition: background .2s ease, border-color .2s ease, color .2s ease;
        }

        .contact-request__option:has(input:checked) {
            background: #91001e;
            border-color: #91001e;
            color: #fff;
        }

        .contact-request__option input {
            accent-color: currentColor;
            height: 15px;
            margin: 0;
            width: 15px;
        }

        .contact-request__consent {
            align-items: flex-start;
            color: #625d5a;
            display: flex;
            font-size: 13px;
            gap: 9px;
            line-height: 1.45;
            margin: 4px 0 0;
        }

        .contact-request__consent input {
            accent-color: #91001e;
            flex: 0 0 auto;
            height: 16px;
            margin-top: 2px;
            width: 16px;
        }

        .contact-request__consent a {
            color: #91001e;
            font-weight: 700;
        }

        .contact-request__submit {
            background: #91001e;
            border: 1px solid #91001e;
            border-radius: 8px;
            box-shadow: none;
            margin-top: 4px;
            min-width: 175px;
            padding: 14px 20px;
        }

        .contact-request__submit:hover,
        .contact-request__submit:focus {
            background: #710018;
            border-color: #710018;
        }

        .contact-request__captcha-note {
            color: #88817e;
            font-size: 12px;
            line-height: 1.45;
            margin: 16px 0 0;
        }

        @media (max-width: 575.98px) {
            .contact-request__grid {
                grid-template-columns: 1fr;
            }

            .contact-request__field--full {
                grid-column: auto;
            }

            .contact-request__submit {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    @include('web.partials.breadcrumb')

    @php($contacto = config('contacto'))

    <section class="contact-us-area" id="ubicacion">
        <div class="container">
            <div class="row g-5 mb-5 justify-content-center text-center">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card p-4 rounded shadow-sm bg-white h-100">
                        <div class="icon mb-3"><i class="icon-map-pin" style="font-size: 32px; color: var(--color-primary);"></i></div>
                        <h5 class="title">Nuestro campus</h5>
                        <p>{{ $contacto['direccion'] }}</p>
                        <a href="{{ $contacto['mapa_url'] }}" target="_blank" rel="noopener noreferrer" class="fw-bold">Ver en Google Maps</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card p-4 rounded shadow-sm bg-white h-100">
                        <div class="icon mb-3"><i class="icon-phone" style="font-size: 32px; color: var(--color-primary);"></i></div>
                        <h5 class="title">Escríbenos</h5>
                        <p>{{ $contacto['horario'] }}<br>
                            <a href="tel:{{ $contacto['telefono'] }}" class="fw-bold fs-5">{{ $contacto['telefono_display'] }}</a><br>
                            <a href="{{ $contacto['whatsapp_url'] }}" target="_blank" rel="noopener noreferrer" class="text-success fw-bold"><i class="icon-whatsapp"></i> Escríbenos por WhatsApp</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card p-4 rounded shadow-sm bg-white h-100">
                        <div class="icon mb-3"><i class="icon-mail" style="font-size: 32px; color: var(--color-primary);"></i></div>
                        <h5 class="title">Correo electrónico</h5>
                        <p>Responderemos tu consulta a la brevedad.<br>
                            <a href="mailto:{{ $contacto['email'] }}" class="fw-bold">{{ $contacto['email'] }}</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row g-5 align-items-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="contact-us-info">
                        <h3 class="heading-title">Estamos para ayudarte</h3>
                        <p>Síguenos en nuestras redes sociales para conocer nuestras novedades.</p>
                        <ul class="social-share">
                            <li><a href="{{ $contacto['redes']['instagram'] }}" target="_blank" rel="noopener noreferrer" aria-label="Síguenos en Instagram"><i class="icon-instagram"></i></a></li>
                            <li><a href="{{ $contacto['redes']['facebook'] }}" target="_blank" rel="noopener noreferrer" aria-label="Síguenos en Facebook"><i class="icon-facebook"></i></a></li>
                            <li><a href="{{ $contacto['redes']['x'] }}" target="_blank" rel="noopener noreferrer" aria-label="Síguenos en X"><i class="icon-twitter"></i></a></li>
                            <li><a href="{{ $contacto['redes']['linkedin'] }}" target="_blank" rel="noopener noreferrer" aria-label="Síguenos en LinkedIn"><i class="icon-linkedin2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="offset-xl-2 col-lg-6">
                    <div class="contact-request">
                        <div class="section-title">
                            <h4 class="title">Solicita Información</h4>
                            <p>Tú eliges cómo estudiar.</p>
                        </div>
                        @if (session('contacto_enviado') === 'ok')
                            <div class="alert alert-success" role="alert">
                                ¡Gracias! Recibimos tu consulta y te responderemos pronto.
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="contactenos-form" method="POST" action="{{ route('contactenos.enviar') }}">
                            @csrf
                            <input type="hidden" name="g-recaptcha-response" id="contactenos-recaptcha-response">
                            <input type="hidden" name="form_started_at" value="{{ now()->timestamp }}">
                            <div class="visually-hidden" aria-hidden="true">
                                <label for="contactenos-website">No completar este campo</label>
                                <input id="contactenos-website" type="text" name="website" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="contact-request__grid">
                                <div class="contact-request__field--full">
                                    <label>Modalidad *</label>
                                    <div class="contact-request__modalidades">
                                        @foreach ($modalidades as $modalidad)
                                            <label class="contact-request__option" for="contactenos-modalidad-{{ $loop->index }}">
                                                <input id="contactenos-modalidad-{{ $loop->index }}" type="radio" name="modalidad" value="{{ $modalidad }}" @checked(old('modalidad') === $modalidad) required>
                                                <span>{{ $modalidad }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="contact-request__field--full">
                                    <label for="contactenos-tipo-programa">Tipo de programa *</label>
                                    <select id="contactenos-tipo-programa" name="tipo_programa" required>
                                        <option value="" disabled @selected(!old('tipo_programa'))>Tipo de programa</option>
                                        @foreach ($tiposPrograma as $tipo)
                                            <option value="{{ $tipo['id'] }}" @selected(old('tipo_programa') === $tipo['id'])>{{ $tipo['label'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="contact-request__field--full">
                                    <label for="contactenos-programa">Programa de interés *</label>
                                    <select id="contactenos-programa" name="programa_interes" required>
                                        <option value="" disabled @selected(!old('programa_interes'))>Programa de interés</option>
                                        @foreach ($programas as $programa)
                                            <option value="{{ $programa['id'] }}" data-tipo="{{ $programa['nivel'] }}" data-modalidades="{{ implode('|', $programa['modalidades']) }}" @selected((string) old('programa_interes') === (string) $programa['id'])>
                                                {{ $programa['nombre'] }} ({{ $programa['nivelLabel'] }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="contactenos-nombres">Nombres *</label>
                                    <input id="contactenos-nombres" type="text" name="nombres" value="{{ old('nombres') }}" required maxlength="120" autocomplete="name">
                                </div>
                                <div>
                                    <label for="contactenos-apellidos">Apellidos *</label>
                                    <input id="contactenos-apellidos" type="text" name="apellidos" value="{{ old('apellidos') }}" required maxlength="120" autocomplete="family-name">
                                </div>
                                <div>
                                    <label for="contactenos-dni">DNI</label>
                                    <input id="contactenos-dni" type="text" name="dni" value="{{ old('dni') }}" maxlength="20" inputmode="numeric">
                                </div>
                                <div>
                                    <label for="contactenos-documento">Documento</label>
                                    <input id="contactenos-documento" type="text" name="documento" value="{{ old('documento') }}" maxlength="50">
                                </div>
                                <div>
                                    <label for="contactenos-correo">Correo electrónico *</label>
                                    <input id="contactenos-correo" type="email" name="correo" value="{{ old('correo') }}" required maxlength="150" autocomplete="email">
                                </div>
                                <div>
                                    <label for="contactenos-whatsapp">WhatsApp</label>
                                    <input id="contactenos-whatsapp" type="tel" name="whatsapp" value="{{ old('whatsapp') }}" maxlength="30" autocomplete="tel">
                                </div>
                                <div class="contact-request__field--full">
                                    <label class="contact-request__consent" for="contactenos-politica">
                                        <input id="contactenos-politica" type="checkbox" name="acepta_politica" value="1" @checked(old('acepta_politica')) required>
                                        <span>Autorizo el tratamiento de mis datos para atender mi consulta, conforme a las <a href="{{ route('privacy-policy') }}" target="_blank" rel="noopener">políticas de privacidad</a>.</span>
                                    </label>
                                </div>
                                <div class="contact-request__field--full">
                                    <button class="edu-btn btn-medium contact-request__submit" type="submit" id="contactenos-submit">Enviar consulta <i class="icon-4"></i></button>
                                </div>
                            </div>
                        </form>
                        <p class="contact-request__captcha-note">Este sitio está protegido por reCAPTCHA; se aplican la Política de Privacidad y los Términos de Servicio de Google.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.layouts.marquesina')
@endsection

@section('scripts')
    <script>
            const programaSelect = document.getElementById('contactenos-programa');
            const tipoProgramaSelect = document.getElementById('contactenos-tipo-programa');
            const modalidadInputs = document.querySelectorAll('input[name="modalidad"]');

            function filtrarProgramas() {
                const tipo = tipoProgramaSelect.value;
                const modalidad = document.querySelector('input[name="modalidad"]:checked')?.value;

                Array.from(programaSelect.options).slice(1).forEach(function (option) {
                    const modalidades = option.dataset.modalidades.split('|');
                    const visible = (!tipo || option.dataset.tipo === tipo)
                        && (!modalidad || modalidades.includes(modalidad));

                    option.hidden = !visible;
                    option.disabled = !visible;
                });

                if (programaSelect.selectedOptions[0]?.disabled) {
                    programaSelect.value = '';
                }
            }

            tipoProgramaSelect.addEventListener('change', filtrarProgramas);
            modalidadInputs.forEach(function (input) {
                input.addEventListener('change', filtrarProgramas);
            });
            filtrarProgramas();
    </script>

    @if (config('services.recaptcha.key'))
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.key') }}"></script>
        <script>
            document.getElementById('contactenos-form').addEventListener('submit', function (event) {
                if (this.dataset.recaptchaReady === 'true') {
                    return;
                }

                event.preventDefault();
                const form = this;
                const submitButton = document.getElementById('contactenos-submit');
                submitButton.disabled = true;

                grecaptcha.ready(function () {
                    grecaptcha.execute('{{ config('services.recaptcha.key') }}', {
                        action: '{{ config('contacto.recaptcha_action') }}'
                    }).then(function (token) {
                        document.getElementById('contactenos-recaptcha-response').value = token;
                        form.dataset.recaptchaReady = 'true';
                        form.submit();
                    }).catch(function () {
                        submitButton.disabled = false;
                        alert('No se pudo validar la seguridad del formulario. Inténtalo nuevamente.');
                    });
                });
            });
        </script>
    @endif
@endsection
