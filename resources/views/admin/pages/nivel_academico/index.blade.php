<?php
$dash = 'Niveles Académicos';
$subt = 'Niveles Académicos';
?>

@extends('admin.layouts._principal')

@section('content')
<nivel-academico-component></nivel-academico-component>

@endsection
@section('scripts')

<script>
    const niveles = document.getElementById('niveles');
    if (niveles) {
        niveles.classList.toggle('active');
    }
</script>
@endsection