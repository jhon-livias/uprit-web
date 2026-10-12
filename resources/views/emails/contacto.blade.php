<h2>Nueva consulta desde uprit.edu.pe</h2>

<p><strong>Nombre:</strong> {{ $datos['nombre_completo'] }}</p>
<p><strong>Correo:</strong> {{ $datos['correo'] }}</p>
<p><strong>Teléfono:</strong> {{ $datos['telefono'] ?: 'No indicado' }}</p>
<p><strong>Asunto:</strong> {{ $datos['asunto'] }}</p>

<p><strong>Mensaje:</strong></p>
<p>{!! nl2br(e($datos['mensaje'])) !!}</p>
