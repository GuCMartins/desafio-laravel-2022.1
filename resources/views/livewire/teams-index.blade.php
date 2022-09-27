@extends('layouts.app')
@section('title', 'Times')

@section('content')
    <div>
        <div class="max-w-6xl mx-auto">
            <div class="flex justify-end m-2 p-2">
                <button wire:click="showTeamModal">Criar</button>
            </div>
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
                                            Páis de Origem</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                            Pontos</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                            Vitórias/Derrotas</th>
                                        <th scope="col" class="relative px-6 py-3">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr></tr>
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $team->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $team->motherland }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $team->points }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap flex justify-center">
                                                {{ $team->wins }}/{{ $team->defeats }}</td>
                                            <td class="px-6 py-4 text-right text-sm">
                                                <div class="flex space-x-2">
                                                    <button class=" px-6"
                                                        wire:click="showEditTeamModal({{ $team->id }})">Edit
                                                    </button>
                                                    <button class="bg-red-400 hover:bg-red-600"
                                                        wire:click="deleteTeam({{ $team->id }})">Delete
                                                    </button>
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
            <div>
                <dialog-modal wire:model="showPlayerModal">
                    @if ($isEditMode)
                        <x-slot name="title">Atualizar Jogador</x-slot>
                    @else
                        <x-slot name="title">Criar Jogador</x-slot>
                    @endif
                    <x-slot name="content">
                        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                            <form enctype="multipart/form-data">
                                <div class="sm:col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700"> Nome </label>
                                    <div class="mt-1">
                                        <input type="text" id="name" wire:model.lazy="name" name="name"
                                            class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('name')
                                        <span class="text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6 pt-5">
                                    <label for="age" class="block text-sm font-medium text-gray-700">Idade</label>
                                    <div class="mt-1">
                                        <textarea id="age" rows="3" wire:model.lazy="age"
                                            class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                    @error('age')
                                        <span class="text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>

                    </x-slot>
                    <x-slot name="footer">
                        @if ($isEditMode)
                            <button wire:click="updatePost">Atualizar</button>
                        @else
                            <button wire:click="storePost">Criar</button>
                        @endif
                    </x-slot>
                </dialog-modal>
            </div>
        </div>
    </div>
@endsection
