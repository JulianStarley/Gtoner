<!-- Exemplo para create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Criar Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <label for="name">Nome:</label>
                        <input type="text" name="name" id="name" required class="px-2 py-1 border rounded">
                        <br>
                        <label for="description">Descrição:</label>
                        <textarea name="description" id="description" class="px-2 py-1 border rounded"></textarea>
                        <br>
                        <label for="quantity">Quantidade:</label>
                        <input type="number" name="quantity" id="quantity" required class="px-2 py-1 border rounded">
                        <br>
                        <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>