<?php
$dash = 'Docentes';
$subt = 'Docentes';
?>

@extends('admin.layouts._principal')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
@endsection

@section('content')
<docente-component></docente-component>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    const docentes = document.getElementById('docentes');
    if (docentes) {
        docentes.classList.toggle('active');
    }
</script>
@endsection
