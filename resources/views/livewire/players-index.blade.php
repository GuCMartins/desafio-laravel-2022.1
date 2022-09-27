@extends('layouts.app')

@section('title', 'Jogadores')

@section('content')
    <div>
        <div x-data="{ open: false }">
            <div class="p-6">
                <button wire:click="$emit('openModal', 'edit-user')">Edit User</button>

                {{-- The data table --}}

                <div class="m-2 p-2">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                                Name</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                                Idade</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                                País de Origem</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                                Vitórias/Derrotas</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                                Time</th>
                                            <th scope="col" class="relative px-6 py-3">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr></tr>
                                        @foreach ($players as $player)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $player->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $player->age }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $player->nationality }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $player->wins }}/{{ $player->defeats }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $teams[$player->team_id - 1]->name }}
                                                </td>
                                                <td class="px-6 py-4 text-right text-sm">
                                                    <div class="flex space-x-2 px-2">
                                                        <button wire:click="$emit('openModal', 'edit-player')">Editar </button>
                                                        <button
                                                            wire:click='$emit("openModal", "delete-player", {{ json_encode(["player" => $player->id]) }})'>Deletar</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="m-2 p-2">Pagination</div>
                            </div>
                        </div>
                    </div>

                </div>

                <br />

            </div>
        </div>
    </div>
@endsection
