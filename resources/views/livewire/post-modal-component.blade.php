<!-- resources/views/livewire/post-modal-component.blade.php -->

<div x-data="{ showModal: false }">
    <button @click="showModal = true" class="btn btn-primary">Ver detalles</button>

    <div x-show="showModal" style="display: none;" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="modal-overlay absolute inset-0 bg-gray-500 opacity-75"></div>

        <div class="modal-container bg-white w-1/2 p-4 rounded shadow-lg z-50">
            <div class="modal-header">
                <h2 class="font-bold text-xl">{{ $post->title }}</h2>
                <button @click="showModal = false" class="modal-close cursor-pointer">×</button>
            </div>
            <div class="modal-body">
                {{-- <p>{{ $post->content }}</p>
                <p>Autor: {{ $post->author }}</p> --}}
            </div>
        </div>
    </div>
</div>
