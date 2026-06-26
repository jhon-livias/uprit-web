<?php
$dash = 'Sliders Carrera';
$subt = 'Sliders Carrera';
?>

@extends('admin.layouts._principal')

@section('content')

<slider-carrera-component></slider-carrera-component>

@endsection
@section('scripts')

<script>
    const sliderscarrera = document.getElementById('sliderscarrera');
    if (sliderscarrera) {
        sliderscarrera.classList.toggle('active');
    }
</script>
@endsection