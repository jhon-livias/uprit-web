<?php
$dash = 'Categorías';
$subt = 'Categorías';
?>

@extends('admin.layouts._principal')

@section('content')
<categoria-component></categoria-component>


@endsection
@section('scripts')

<script>
    const categorias = document.getElementById('categorias');
    if (categorias) {
        categorias.classList.toggle('active');
    }
</script>
@endsection