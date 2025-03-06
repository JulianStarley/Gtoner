<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('products.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded">Criar Novo
                        Produto</a>
                    <table id="products-table" class="display">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Quantidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td class="space-x-2">
                                    <a href="{{ route('products.show', $product->id) }}" class="px-2 py-1 text-white bg-blue-500 rounded">Ver</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="px-2 py-1 text-white bg-green-500 rounded">Editar</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2 py-1 text-white bg-red-500 rounded">Excluir</button>
                                    </form>
                                    <form action="{{ route('products.entrada', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        <input type="number" name="quantity" min="1" required class="w-16 px-2 py-1 border rounded">
                                        <button type="submit" class="px-2 py-1 text-white bg-green-500 rounded">Entrada</button>
                                    </form>
                                    <form action="{{ route('products.saida', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        <input type="number" name="quantity" min="1" required class="w-16 px-2 py-1 border rounded">
                                        <button type="submit" class="px-2 py-1 text-white bg-red-500 rounded">Saída</button>
                                    </form>
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                                </div>
                                </div>
                                </div>
                                </div>
<script>
    $(document).ready(function() {
        $('#products-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Portuguese-Brasil.json" // Tradução para português
            },
            "columnDefs": [
                { "orderable": false, "targets": 3 } // Desabilitar ordenação na coluna de ações
            ]
        });
    });
</script>
</x-app-layout>
