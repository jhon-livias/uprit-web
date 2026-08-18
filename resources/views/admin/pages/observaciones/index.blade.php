<?php
$dash = 'Observaciones';
$subt = 'Tablero Kanban';
?>

@extends('admin.layouts._principal')

@section('content')
<observacion-component
    :current-user-id="{{ (int) ($currentUserId ?? 0) }}"
    current-user-name="{{ $currentUserName ?? '' }}"
></observacion-component>
@endsection

@section('scripts')
<script>
    const observaciones = document.getElementById('observaciones');
    if (observaciones) {
        observaciones.classList.toggle('active');
    }
</script>
@endsection
