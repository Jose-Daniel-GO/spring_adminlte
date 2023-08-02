@extends('adminlte::page')

@section('title', 'Crud con laravel 8')

@section('content_header')
    <h1>Trainer</h1>
@stop

@section('content')
    <div class="row">
        {{-- anteriormente vista show --}}
        @foreach ($posts as $post)
            <div class="col-sm">
                <div class="card text-center" style="width: 18rem; margin-top: 50px">
                    <ul class="list-group list-group-flush">
                        <li class="list-group">
                            <img style="height: 7rem;" src={{ asset($post->image->url) }} class="card-img-top" alt="...">
                        </li>
                        <li class="list-group-item">
                            <h6 class="card-title">{{ $post->title }}</h6>
                        </li>
                        <li class="list-group-item">
                            {{-- <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $post->id }}">Ver Noticia</button> --}}
                            <livewire:post-modal-component :postId="$post->id" :wire:key="$post->id" />
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Modal BUSCAR -->
            {{-- @include('posts.modal.show') --}}
            <!-- Modal -->
            {{-- <div class="modal fade" id="modal-{{ $post->id }}" tabindex="-1"
                aria-labelledby="postModalLabel_{{ $post->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="postModalLabel_{{ $post->id }}">{{ $post->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                            </p>
                            <p>Autor: 
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div> --}}
        @endforeach
        {{-- ======================== --}}
    </div>
@stop

@section('css')
    {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@stop



{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
