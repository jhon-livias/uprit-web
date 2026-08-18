@php
    $columnLabels = [
        'titulo' => 'Título del proyecto',
        'investigador_principal' => 'Investigador principal',
        'coautores' => 'Coautores',
        'linea' => 'Línea de investigación',
        'aliado' => 'Aliado / Beneficiario',
        'producto' => 'Producto',
    ];
@endphp

<div class="table-responsive direccion-investigacion-table-wrap">
    <table class="direccion-investigacion-table">
        <thead>
            <tr>
                <th scope="col">N°</th>
                @foreach ($columns as $column)
                    <th scope="col">{{ $columnLabels[$column] ?? $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($proyectos as $index => $proyecto)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    @foreach ($columns as $column)
                        <td>{{ $proyecto[$column] ?? '—' }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
