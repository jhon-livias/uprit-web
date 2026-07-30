<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $profiles = [
            'Luigi Italo Villena Zapata' => [
                'correo' => 'lvillena@uprit.edu.pe',
                'departamento' => 'Ingeniería',
                'descripcion' => 'Doctor en Estadística Matemática por la Universidad Nacional del Santa, Ingeniero Estadístico. Investigador RENACYT Nivel III reconocido por CONCYTEC. Cuenta con más de 12 años de experiencia docente en universidades como UPT, UPN, UCV y UTP, especializado en estadística aplicada, metodología de la investigación y el uso de herramientas como SPSS, Python y RStudio. Ha publicado más de 30 artículos científicos indexados en Scopus y Web of Science (Q2/Q3), además de libros con editoriales como Springer y Molecules. Su labor investigativa abarca biotecnología, ingeniería civil, ciencias ambientales y educación.',
            ],
            'Carlos Alza Collantes' => [
                'correo' => 'calza@uprit.edu.pe',
                'departamento' => 'Educación',
                'descripcion' => 'Doctor en Educación. Maestro en Mediación y Arbitraje en la Práctica Comercial por la Universidad de Salamanca, España. Docente e investigador con experiencia en formación académica, resolución de conflictos y práctica comercial, vinculado a la Dirección de Investigación de la UPRIT.',
            ],
            'Renzo Jesus Maldonado Gomez' => [
                'correo' => 'renzo.maldonado@uprit.edu.pe',
                'departamento' => 'Derecho',
                'descripcion' => 'Doctor en Educación por la Universidad César Vallejo, con grado de Maestro en Derecho Civil Empresarial. Docente e investigador con trayectoria en el ámbito jurídico y académico, integrando la docencia universitaria con la producción de conocimiento en derecho y educación superior.',
            ],
            'Mirtha Zulema Armas Chang' => [
                'correo' => 'mirtha.armas@uprit.edu.pe',
                'departamento' => 'Administración',
                'descripcion' => 'Licenciada en Administración, egresada de la Universidad Nacional de Trujillo. Docente e investigadora con experiencia en gestión administrativa y formación académica en el ámbito de las ciencias empresariales.',
            ],
            'Jacqueline Roxana Romero Reyna' => [
                'correo' => 'jromero@uprit.edu.pe',
                'departamento' => 'Psicología',
                'descripcion' => 'Doctora en Psicología por la Universidad César Vallejo. Investigadora RENACYT Nivel VI, reconocida por CONCYTEC. Docente e investigadora con amplia trayectoria en psicología, metodología de la investigación y producción científica en el ámbito de las ciencias humanas.',
            ],
        ];

        foreach ($profiles as $nombre => $data) {
            $docente = DB::table('docentes')
                ->where('nombre', $nombre)
                ->where('es_investigador', true)
                ->first();

            if (!$docente) {
                continue;
            }

            $updates = [];

            foreach ($data as $field => $value) {
                if (empty($docente->{$field})) {
                    $updates[$field] = $value;
                }
            }

            if ($updates !== []) {
                $updates['updated_at'] = now();
                DB::table('docentes')->where('id', $docente->id)->update($updates);
            }
        }
    }

    public function down(): void
    {
        // Datos de perfil; no se revierten para no perder ediciones manuales.
    }
};
