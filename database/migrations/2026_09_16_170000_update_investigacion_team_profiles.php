<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('docentes', function (Blueprint $table) {
            if (! Schema::hasColumn('docentes', 'orcid')) {
                $table->string('orcid', 40)->nullable()->after('linkedin');
            }
        });

        $now = now();

        foreach ($this->team() as $member) {
            $docente = $this->findInvestigador($member['nombres']);

            if (! $docente) {
                continue;
            }

            $payload = [
                'nombre' => $member['nombre'],
                'titulo_academico' => $member['titulo_academico'],
                'rol_investigacion' => $member['rol_investigacion'],
                'genero' => $member['genero'],
                'orden_investigacion' => $member['orden_investigacion'],
                'resumen_investigacion' => $member['resumen_investigacion'],
                'updated_at' => $now,
            ];

            if (! empty($member['correo'])) {
                $payload['correo'] = $member['correo'];
            }

            if (! empty($member['orcid'])) {
                $payload['orcid'] = $member['orcid'];
            }

            if (! empty($member['departamento']) && empty($docente->departamento)) {
                $payload['departamento'] = $member['departamento'];
            }

            DB::table('docentes')->where('id', $docente->id)->update($payload);
        }
    }

    public function down(): void
    {
        Schema::table('docentes', function (Blueprint $table) {
            if (Schema::hasColumn('docentes', 'orcid')) {
                $table->dropColumn('orcid');
            }
        });
    }

    private function team(): array
    {
        return [
            [
                'nombres' => ['Marco Antonio Sevilla Gamarra'],
                'nombre' => 'Marco Antonio Sevilla Gamarra',
                'titulo_academico' => 'Dr.',
                'rol_investigacion' => 'director',
                'genero' => 'M',
                'orden_investigacion' => 1,
                'correo' => 'marco.sevilla@uprit.edu.pe',
                'orcid' => '0000-0002-7350-3982',
                'departamento' => 'Administración',
                'resumen_investigacion' => 'Post Doctor Universidad del Oriente-Cancún-México, en Educación e Investigación, Doctor en Administración, Universidad Nacional de Trujillo-Perú, Maestría en Finanzas Universidad Nacional de Trujillo-Perú, Contador Público Colegiado Mat.2077, Director de Investigación Universidad Privada de Trujillo, Investigador Renacyt Nivel VI, Ex Vice Rector de Investigación Universidad Privada de Trujillo, Ex Director de Contabilidad UPRIT, 25 años en Gestión Pública, Ex funcionario Público de Gobiernos Regionales y Locales, con 15 años de Docente Universitario, UCV y UPRIT Trujillo-Perú, Publicaciones de Artículos Científicos en revistas indexadas, libros y patentes.',
            ],
            [
                'nombres' => ['Olenka Ana Catherine Espinoza Rodriguez', 'Olenka Ana Catherine Espinoza Rodríguez'],
                'nombre' => 'Olenka Ana Catherine Espinoza Rodriguez',
                'titulo_academico' => 'Dra.',
                'rol_investigacion' => 'coordinadora',
                'genero' => 'F',
                'orden_investigacion' => 2,
                'departamento' => 'Administración',
                'resumen_investigacion' => 'Economista, Doctora en Educación y Docente investigadora Renacyt. Con 11 años de experiencia en la administración pública. Ha sido Directora de una Institución Educativa. Consultora en administración y gestión del talento humano en Incentiva Perú SAC. Directora ejecutiva en IO Centro de Liderazgo Creativo. Con más de 13 años de experiencia en docencia universitaria, especializada en el campo de la investigación, desempeñándose como asesora y jurado de tesis, revisora y árbitro de la revista científica Cuadernos de Administración, par evaluador para la revista científica Uniaugustiniana, ambas de Colombia. Ha enseñado en diversas experiencias curriculares de investigación científica. Ha sido docente de posgrado UCT. Coordinadora de investigación en la Facultad de Ciencias Empresariales UCV. Docente de investigación PIT en UTP. Actualmente es docente de investigación y Coordinadora del Control de Proyecto, en la Dirección de Investigación de la UPRIT.',
            ],
            [
                'nombres' => ['Luigi Italo Villena Zapata', 'Luigi Ítalo Villena Zapata'],
                'nombre' => 'Luigi Italo Villena Zapata',
                'titulo_academico' => 'Dr.',
                'rol_investigacion' => 'docente',
                'genero' => 'M',
                'orden_investigacion' => 3,
                'correo' => 'lvillena@uprit.edu.pe',
                'departamento' => 'Ingeniería',
                'resumen_investigacion' => 'Doctor en Estadística Matemática por la Universidad Nacional del Santa (primer puesto de su promoción), Ingeniero Estadístico e Investigador RENACYT Nivel III reconocido por CONCYTEC. Cuenta con más de 12 años de experiencia docente en instituciones como la Universidad Privada de Trujillo, Universidad Privada del Norte, Universidad César Vallejo y Universidad Tecnológica del Perú, especializándose en estadística aplicada, metodología de la investigación y herramientas como SPSS, Python y RStudio. Ha publicado más de 30 artículos científicos en revistas indexadas en Scopus y Web of Science (Q2 y Q3) en áreas de biotecnología, ingeniería civil, ciencias ambientales y educación, incluyendo publicaciones en revistas como Springer y Molecules. Ha sido reconocido con múltiples distinciones por excelencia académica y ha participado como ponente en congresos nacionales e internacionales.',
            ],
            [
                'nombres' => ['Mirtha Zulema Armas Chang'],
                'nombre' => 'Mirtha Zulema Armas Chang',
                'titulo_academico' => 'Dra.',
                'rol_investigacion' => 'docente',
                'genero' => 'F',
                'orden_investigacion' => 4,
                'correo' => 'mirtha.armas@uprit.edu.pe',
                'departamento' => 'Administración',
                'resumen_investigacion' => 'Doctora en Administración, con Maestría en Administración de Negocios y Maestría en Investigación y Docencia Universitaria. Licenciada en Administración por la Universidad Nacional de Trujillo. Docente investigadora con reconocimiento RENACYT y experiencia en gestión editorial, coordinación de publicaciones científicas y dirección de revistas científicas y académicas. Cuenta con más de doce años de experiencia en docencia universitaria, así como en asesoría y participación como jurado de tesis de pregrado y posgrado.',
            ],
            [
                'nombres' => ['Renzo Jesus Maldonado Gomez', 'Renzo Jesús Maldonado Gomez'],
                'nombre' => 'Renzo Jesus Maldonado Gomez',
                'titulo_academico' => 'Dr.',
                'rol_investigacion' => 'docente',
                'genero' => 'M',
                'orden_investigacion' => 5,
                'correo' => 'renzo.maldonado@uprit.edu.pe',
                'departamento' => 'Derecho',
                'resumen_investigacion' => 'Doctor en Educación por la Universidad César Vallejo, Grado de Maestro: Derecho Civil Empresarial, Administración de Negocios (MBA), investigación y docencia universitaria, de profesión abogado, Licenciado en administración y Licenciado en educación secundaria en la especialidad ciencias sociales e Investigador RENACYT Nivel VI reconocido por CONCYTEC. Docente de pregrado y posgrado. Cuenta más de 12 años de experiencia docente en instituciones como la Universidad Señor de Sipán, Universidad de Lambayeque, Universidad Particular de Chiclayo, Universidad Católica los Ángeles de Chimbote, Universidad César Vallejo, Universidad Privada del Norte, Universidad Tecnológica del Perú, Universidad Católica de Trujillo, Universidad Privada Antenor Orrego, Universidad Privada de Trujillo, Universidad Metropolitana de Educación, Ciencia y Tecnología (Panamá) y Escuela Posgrado Universidad Privada de Trujillo. Asimismo, se ha desempeñado de asesor y jurado de tesis en Universidad Señor de Sipán, Universidad Católica de Trujillo, Universidad Privada Antenor Orrego, Universidad Tecnológica del Perú, Universidad Privada de Trujillo y en el programa de Doctorado en educación de Universidad Metropolitana de Educación, Ciencia y Tecnología (Panamá), especializándose en metodología de la investigación. Se ha desempeñado realizando gestión en universidades: Universidad Particular de Chiclayo en su condición de Director de Escuela de Derecho, Universidad Tecnológica de Perú en su condición de Coordinador Académico de Derecho y Universidad San Martín de Porres ejerciendo de Monitor Académico de la Unidad de Monitoreo. Ha publicado más de 20 artículos científicos en revistas indexadas en Scopus, Scielo; capítulos de libros y libros de investigación en áreas de derecho, educación y administración. Ha sido reconocido con múltiples distinciones por desempeño docente y asesor de tesis en universidades.',
            ],
            [
                'nombres' => ['Jacqueline Roxana Romero Reyna'],
                'nombre' => 'Jacqueline Roxana Romero Reyna',
                'titulo_academico' => 'Dra.',
                'rol_investigacion' => 'docente',
                'genero' => 'F',
                'orden_investigacion' => 6,
                'correo' => 'jromero@uprit.edu.pe',
                'departamento' => 'Psicología',
                'resumen_investigacion' => 'Doctora en Psicología por la Universidad César Vallejo. Investigadora RENACYT Nivel VI, reconocida por CONCYTEC. Cuenta con más de 12 años de experiencia docente en programas de pregrado y posgrado en instituciones como la Universidad ULADECH, Universidad César Vallejo, Universidad Católica de Trujillo, Universidad Nacional de Trujillo y Universidad Nacional de Huancavelica. Asimismo, posee publicaciones en revistas indexadas, reconocimiento en evaluación docente y participación en congresos internacionales.',
            ],
            [
                'nombres' => ['Carlos Jesús Alza Collantes', 'Carlos Alza Collantes'],
                'nombre' => 'Carlos Jesús Alza Collantes',
                'titulo_academico' => 'Dr.',
                'rol_investigacion' => 'docente',
                'genero' => 'M',
                'orden_investigacion' => 7,
                'correo' => 'calza@uprit.edu.pe',
                'departamento' => 'Educación',
                'resumen_investigacion' => 'Doctor en Educación. Maestro en Mediación y Arbitraje en la Práctica Comercial por la Universidad de Salamanca- España, Magíster en Gestión Pública y egresado de la Maestría en Derecho Civil Empresarial de la Universidad Privada Antenor Orrego. Abogado por la Universidad Privada Antenor Orrego y Licenciado en Administración y Negocios Internacionales por la Universidad Privada del Norte. Docente Renacyt de Pre y Posgrado. Gerente General del Estudio Jurídico Alza & Abogados Asociados S.A.C. (Julio 2013 Actualidad). Árbitro de la Junta Piloto de Arbitraje de Consumo del INDECOPI (2020 a la actualidad). Árbitro especializado en Contrataciones del Estado y Conciliador Extrajudicial especializado en Familia. Vice Presidente de la Asociación de Protección y Defensa de los Consumidores y Usuarios Peruanos - APDECO. Ex Secretario General del Centro de Arbitraje del Colegio de Ingeniero del Perú Consejo Departamental Amazonas (2014-2024). Adjudicador y Secretario de Juntas de Resolución de Disputas. Consultor Legal Externo en temas de Arbitraje en diversas entidades del Estado. Ex Miembro del Consejo Superior de Arbitraje del Centro de Arbitraje y Conciliación del Colegio de Abogados de La Libertad. Docente con amplia experiencia en la Universidad Privada de Trujillo y otras Universidades. Ex Director de la carrera profesional de derecho de la Universidad Privada de Trujillo.',
            ],
            [
                'nombres' => ['Charlen Máximo Calero Huamán', 'Charlen Calero Huamán', 'Charlen Maximo Calero Huaman'],
                'nombre' => 'Charlen Máximo Calero Huamán',
                'titulo_academico' => 'Mg.',
                'rol_investigacion' => 'docente',
                'genero' => 'M',
                'orden_investigacion' => 8,
                'correo' => 'charlen.calero@uprit.edu.pe',
                'departamento' => 'Ingeniería',
                'resumen_investigacion' => 'Docente universitario e investigador con sólida trayectoria en Ingeniería Industrial y Maestría en Ingeniería de Sistemas, con especialización en Tecnologías de la Información, Inteligencia Artificial e Innovación Digital. Es investigador RENACYT nivel VI y miembro activo del IEEE, participando en capítulos internacionales vinculados a la gestión tecnológica, la robótica y la automatización. Actualmente desarrolla labores académicas en la Universidad Norbert Wiener, Universidad Privada de Trujillo y SENATI, en programas de Ingeniería de Sistemas e Ingeniería de Software con Inteligencia Artificial, donde lidera proyectos de investigación aplicada y formación académica de alto impacto. Su experiencia integra el desarrollo de software, aplicaciones web y móviles, soluciones IoT y visión artificial, con la asesoría a equipos estudiantiles que han obtenido reconocimientos en concursos nacionales e internacionales de innovación, robótica y educación digital. Ha sido ponente internacional en Perú, Colombia y México, difundiendo investigaciones y aplicaciones de la inteligencia artificial en la educación, la industria y la transformación digital. Su labor docente se caracteriza por promover la innovación educativa, el aprendizaje activo y el uso de metodologías ágiles orientadas a la investigación.',
            ],
        ];
    }

    private function findInvestigador(array $nombres): ?object
    {
        $docentes = DB::table('docentes')->where('es_investigador', true)->get();

        foreach ($nombres as $nombre) {
            $needle = $this->normalizeNombre($nombre);

            $found = $docentes->first(function ($docente) use ($needle) {
                $haystack = $this->normalizeNombre((string) $docente->nombre);

                return $haystack === $needle
                    || str_contains($haystack, $needle)
                    || str_contains($needle, $haystack)
                    || $this->apellidos($haystack) === $this->apellidos($needle);
            });

            if ($found) {
                return $found;
            }
        }

        return null;
    }

    private function normalizeNombre(string $nombre): string
    {
        $nombre = trim(mb_strtolower($nombre));
        $nombre = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $nombre) ?: $nombre;
        $nombre = preg_replace('/[^a-z\s]/', '', $nombre) ?? $nombre;

        return trim(preg_replace('/\s+/', ' ', $nombre) ?? $nombre);
    }

    private function apellidos(string $normalized): string
    {
        $parts = array_values(array_filter(explode(' ', $normalized)));

        if (count($parts) < 2) {
            return $normalized;
        }

        return implode(' ', array_slice($parts, -2));
    }
};
