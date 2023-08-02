@extends('adminlte::page')

@section('title', 'Crud con laravel 8')

@section('content_header')
    <h1>Listado de Articulos</h1>
@stop

@section('content')
<div class="container-fluid">
    <h2>Crear resgistros</h2>
<form action="/articulos" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Codigo</label>
        <input type="text" id="codigo" name="codigo"  class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input type="text" id="descripcion" name="descripcion"  class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad"  class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input type="number" id="precio" name="precio" step="any" value="0.00" class="form-control">
    </div>
<a href="/articulos" class="btn btn-secondary" tabindex="5">CANCELAR</a>
<button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"> --}}

@stop

@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
    $('#articulos').DataTable({ "lengthMenu": [[5,10,50,1],[5,10,50,'ALL']] });
}); --}}
</script>
@stop
