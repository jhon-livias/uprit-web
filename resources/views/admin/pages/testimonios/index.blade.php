<?php
$dash = 'Testimonios';
$subt = 'Testimonios';
?>
@extends('admin.layouts._principal')

@section('content')

<testimonio-component></testimonio-component>


@endsection
@section('scripts')

<script>
    const testimonios = document.getElementById('testimonios');
    if (testimonios) {
        testimonios.classList.toggle('active');
    }
</script>
@endsection