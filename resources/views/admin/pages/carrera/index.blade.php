<?php
$dash = 'Carreras';
$subt = 'Carreras';
?>
@extends('admin.layouts._principal')

@section('styles')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/select2/select2.css') }}">
@endsection

@section('content')
<carrera-component></carrera-component>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    const carreras = document.getElementById('carreras');
    if (carreras) {
        carreras.classList.toggle('active');
    }
</script>
@endsection