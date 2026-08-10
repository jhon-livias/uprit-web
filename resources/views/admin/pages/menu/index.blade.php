<?php
$dash = 'Menú Web';
$subt = 'Menú Web';
?>

@extends('admin.layouts._principal')

@section('content')
<menu-component></menu-component>
@endsection

@section('scripts')
<script>
    const menus = document.getElementById('menus');
    if (menus) {
        menus.classList.toggle('active');
    }
</script>
@endsection
