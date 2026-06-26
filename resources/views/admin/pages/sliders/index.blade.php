<?php
$dash = 'Sliders';
$subt = 'Sliders';
?>

@extends('admin.layouts._principal')

@section('content')

<slider-component></slider-component>

@endsection
@section('scripts')

<script>
    const sliders = document.getElementById('sliders');
    if (sliders) {
        sliders.classList.toggle('active');
    }
</script>
@endsection