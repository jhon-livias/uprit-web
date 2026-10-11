<?php
$dash = 'Flyers de inicio';
$subt = 'Flyers de inicio';
?>

@extends('admin.layouts._principal')

@section('content')
<home-flyer-component></home-flyer-component>
@endsection

@section('scripts')
<script>
    const homeFlyers = document.getElementById('home-flyers');
    if (homeFlyers) homeFlyers.classList.toggle('active');
</script>
@endsection
