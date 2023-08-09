@extends('adminlte::page')
<link href="css/stars.css" rel="stylesheet">

@section('title', 'Dashboard')

@section('content_header')
    <h1>Noticias</h1>
@stop

@section('content')
    <div class="row">
        @foreach ($posts as $post)

            <div class="col-sm">
                <div class="card text-center" style="width: 18rem; margin-top: 50px">
                    <ul class="list-group list-group-flush">
                        <li class="list-group"></li>
                            <img style="height: 7rem;" src={{ asset($post->image->url) }} class="card-img-top" alt="...">
                        </li>
                        <li class="list-group-item">
                            <h6 class="card-title">{{ $post->title }}</h6>
                        </li>
                        
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{ $post->id }}">
                                    Ver Noticia
                                </button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Modal -->
            @include('posts.modal.show')
          
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
