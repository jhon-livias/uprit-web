<?php
$dash = 'Carreras';
$subt = 'Carreras';
?>
@extends('admin.layouts._principal')

@section('content')
<carrera-component></carrera-component>

@endsection
@section('scripts')

<script>
    const carreras = document.getElementById('carreras');
    if (carreras) {
        carreras.classList.toggle('active');
    }
</script>
@endsection