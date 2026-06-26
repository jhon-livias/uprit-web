<?php
$dash = 'Libro de Reclamaciones';
$subt = 'Libro de Reclamaciones';
?>


@extends('admin.layouts._principal')

@section('content')
<reclamos-component></reclamos-component>

@endsection
@section('scripts')
<script>
    const reclamos = document.getElementById('reclamos');
    if (reclamos) {
        reclamos.classList.toggle('active');
    }
</script>
@endsection