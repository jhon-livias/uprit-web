<?php
$dash = 'Autoridades';
$subt = 'Autoridades';
?>

@extends('admin.layouts._principal')

@section('content')
<autoridad-component></autoridad-component>
@endsection

@section('scripts')
<script>
    const navItem = document.getElementById('autoridades');
    if (navItem) {
        navItem.classList.toggle('active');
    }
</script>
@endsection
