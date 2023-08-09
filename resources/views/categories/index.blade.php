{{-- @extends('layouts.app')

<style>
    .color-container {
        width: 16px;
        height: 16px;
        display: inline-block;
        border-radius: 4px;
    }
</style>
@section('title', 'Category')

@section('content') --}}
@extends('adminlte::page')

{{-- @section('title', 'Crud con laravel 8') --}}
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>Listado de Articulos</h1>
@stop

@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-9">
                <form action="{{ route('categories.index') }}" method="POST">
                    @csrf
                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif
                    @error('name')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror

                    <div class="card shadow-lg mt-2">
                        <div class="card-header">
                            <label for="name" class="form-label">Nueva categoria </label>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 mt-2">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <button type="submit" class="btn btn-primary">Crear categoria</button>
                </form>
                @foreach ($categories as $category)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex align-items-center">
                            <a class="d-flex align-items-center gap-2" href="{{ route('categories.edit', $category->id) }}">
                                <span class="color-container" style="background-color: {{ $category->color }}"></span>
                            </a>

                            {{ $category->name }}
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <!-- Button trigger modal -->
                            {{-- <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modal-{{ $category->id }}">Delete</button>> --}}

                            <button type="button" class="btn btn-danger" data-toggle="modal" 
                            data-target="#modal-{{ $category->id }}">Delete</button>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{ $category->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Al eliminar la categoria <strong> {{ $category->name }}</strong> se eliminan todas las
                                    tareas
                                    asignadas a la misma.
                                    Está seguro que desea eliminar la categoria <strong>{{ $category->name }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endsection
