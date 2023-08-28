<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <input type="text" wire:model.debounce.500ms="search" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" placeholder="Pesquisar...">
                        </div>
                        <div>
                            <a href="{{ route('products.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Criar Produto</a>
                        </div>
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Nome</th>
                                <th class="px-4 py-2">Preço</th>
                                <th class="px-4 py-2">Prazo</th>
                                <th class="px-4 py-2">Quantidade</th>
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="border px-4 py-2">{{ $product->id }}</td>
                                    <td class="border px-4 py-2">{{ $product->nome }}</td>
                                    <td class="border px-4 py-2">{{ $product->preco }}</td>
                                    <td class="border px-4 py-2">{{ $product->prazo }}</td>
                                    <td class="border px-4 py-2">{{ $product->quantidade }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Adicione os botões de editar e excluir aqui -->
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                            {{ $products->links('livewire-pagination') }}
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@livewireScripts
