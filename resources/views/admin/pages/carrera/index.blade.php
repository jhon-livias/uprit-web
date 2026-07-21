<?php
$dash = 'Carreras';
$subt = 'Carreras';
?>
@extends('admin.layouts._principal')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
<style>
/* Select2 inside Bootstrap modal */
.select2-container--default .select2-selection--multiple {
    min-height: 44px;
    border: 1px solid #ced4da;
    border-radius: 6px;
    padding: 4px 6px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
    border-color: #A3002B;
    box-shadow: 0 0 0 3px rgba(163,0,43,.12);
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #A3002B;
    border: none;
    color: #fff;
    border-radius: 20px;
    padding: 2px 10px;
    font-size: 12px;
    margin: 3px 4px 3px 0;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: rgba(255,255,255,.75);
    margin-right: 6px;
    font-size: 14px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
    color: #fff;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #A3002B;
}
.select2-dropdown {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    box-shadow: 0 8px 24px rgba(0,0,0,.12);
    z-index: 10060 !important;
}
.select2-search--dropdown .select2-search__field {
    border-radius: 6px;
    border: 1px solid #ced4da;
    padding: 6px 10px;
    font-size: 13px;
}
.select2-results__option {
    font-size: 13px;
    padding: 8px 12px;
}
.select2-container { z-index: 10060 !important; }
</style>
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