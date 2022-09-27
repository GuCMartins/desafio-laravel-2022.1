@extends('layouts.app')

@section('title', 'Jogadores')

@section('content')
    <div>
        <div x-data="{ open: false }">
            <div class="p-6">
                <div class="flex items-centre justify-end p4 py-3 sm:py-6 text-right">
                    <button @click="open = true"
                        class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>

                        <span>Criar</span>
                    </button>
                </div>

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
                                                        <button
                                                            wire:click='$emit("openModal", "edit-player", {{ json_encode(['player' => $player->id]) }})'>Editar</button>
                                                        <button
                                                            wire:click='$emit("openModal", "delete-player", {{ json_encode(['player' => $player->id]) }})'>Deletar</button>
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

                {{-- Modal Form --}}
                <div x-show="open" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                    aria-modal="true">
                    <div
                        class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                        <div x-cloak @click="open = false" x-show="open"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

                        <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                            <div class="flex items-center justify-between space-x-4">
                                <h1 class="text-xl font-medium text-gray-800 ">Invite team memebr</h1>

                                <button @click="open = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </div>

                            <p class="mt-2 text-sm text-gray-500 ">
                                Add your teammate to your team and start work to get things done
                            </p>

                            <form class="mt-5">
                                <div>
                                    <label for="user name"
                                        class="block text-sm text-gray-700 capitalize dark:text-gray-200">Teammate
                                        name</label>
                                    <input placeholder="Arthur Melo" type="text"
                                        class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                </div>

                                <div class="mt-4">
                                    <label for="email"
                                        class="block text-sm text-gray-700 capitalize dark:text-gray-200">Teammate
                                        email</label>
                                    <input placeholder="arthurmelo@example.app" type="email"
                                        class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                </div>

                                <div class="mt-4">
                                    <h1 class="text-xs font-medium text-gray-400 uppercase">Permissions</h1>

                                    <div class="mt-4 space-y-5">
                                        <div class="flex items-center space-x-3 cursor-pointer" x-data="{ show: true }"
                                            @click="show =!show">
                                            <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                                :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                                <label for="show" @click="show =!show"
                                                    class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                                    :class="[show ? 'translate-x-full border-indigo-500' :
                                                        'translate-x-0 border-gray-300'
                                                    ]"></label>
                                                <input type="checkbox" name="show"
                                                    class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none" />
                                            </div>

                                            <p class="text-gray-500">Can make task</p>
                                        </div>

                                        <div class="flex items-center space-x-3 cursor-pointer" x-data="{ show: false }"
                                            @click="show =!show">
                                            <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                                :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                                <label for="show" @click="show =!show"
                                                    class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                                    :class="[show ? 'translate-x-full border-indigo-500' :
                                                        'translate-x-0 border-gray-300'
                                                    ]"></label>
                                                <input type="checkbox" name="show"
                                                    class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none" />
                                            </div>

                                            <p class="text-gray-500">Can delete task</p>
                                        </div>

                                        <div class="flex items-center space-x-3 cursor-pointer" x-data="{ show: true }"
                                            @click="show =!show">
                                            <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                                :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                                <label for="show" @click="show =!show"
                                                    class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                                    :class="[show ? 'translate-x-full border-indigo-500' :
                                                        'translate-x-0 border-gray-300'
                                                    ]"></label>
                                                <input type="checkbox" name="show"
                                                    class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none" />
                                            </div>

                                            <p class="text-gray-500">Can edit task</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-end mt-6">
                                    <button type="button"
                                        class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                        Invite Member
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <slot name="footer">
                    <secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </secondary-button>

                    @if ($modelId)
                        <danger-button class="ml-3" wire:click="update" wire:loading.attr="disabled">
                            {{ __('Update') }}
                        </danger-button>
                    @else
                        <danger-button class="ml-3" wire:click="create" wire:loading.attr="disabled">
                            {{ __('Create') }}
                        </danger-button>
                    @endif
                </slot>
                </dialog-modal>

                {{-- Delete Modal --}}
                <dialog-modal wire:model="modalConfirmDelete">
                    <slot name="title">
                        {{ __('Delete player') }}
                    </slot>

                    <slot name="content">
                        {{ __('Are you sure you want to delete this player? Once the player is deleted, all of its resources and data will be permanently deleted.') }}
                    </slot>

                    <slot name="footer">
                        <secondary-button wire:click="$toggle('modalConfirmDelete')" wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </secondary-button>

                        <danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                            {{ __('Delete player') }}
                        </danger-button>
                    </slot>
                </dialog-modal>
            </div>
        </div>
    </div>
@endsection
