<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">#</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Nome
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Jogo
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Inicio/Final</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($championships as $championship)
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $championship->id }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $championship->name }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $championship->game }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $championship->begin }}/{{ $championship->end }}</td>
                                    <td><button
                                            wire:click="viewChampionship({{ $championship->id }})">Visualizar</button>
                                    </td>
                                    <td><button wire:click="editChampionship({{ $championship->id }})">Editar</button>
                                    </td>
                                    <td><button wire:click="deleteChampionship({{ $championship->id }})">Apagar</button>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
