<?php
$dash = 'Transparencia';
$subt = 'Portal de Transparencia';
?>
@extends('admin.layouts._principal')

@section('content')

<transparencia-component></transparencia-component>

@endsection
@section('scripts')

<script>
    const transparencia = document.getElementById('transparencia');
    if (transparencia) {
        transparencia.classList.toggle('active');
    }
</script>
@endsection
