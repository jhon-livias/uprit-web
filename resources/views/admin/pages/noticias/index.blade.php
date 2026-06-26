<?php
$dash = 'Noticias';
$subt = 'Noticias';
?>


@extends('admin.layouts._principal')

@section('content')

<noticia-component></noticia-component>


@endsection
@section('scripts')


<script>
    const noticias = document.getElementById('noticias');
    if (noticias) {
        noticias.classList.toggle('active');
    }
</script>
@endsection