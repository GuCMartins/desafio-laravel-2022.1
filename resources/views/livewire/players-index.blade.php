@extends('layouts.app')
@section('title', 'Players')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-end m-2 p-2">
            <button wire:click="showPlayerModal">Criar</button>
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
                                        Idade</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                        País de Origem</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                        Vitórias</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                        Derrotas</th>
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
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $player->wins }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $player->defeats }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $teams[$player->team_id - 1]->name }}</td>
                                        <td class="px-6 py-4 text-right text-sm">
                                            <div class="flex space-x-2">
                                                <button class=" px-6"
                                                    wire:click="showEditPlayerModal({{ $player->id }})">Edit
                                                </button>
                                                <button class="bg-red-400 hover:bg-red-600"
                                                    wire:click="deletePlayer({{ $player->id }})">Delete
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
            <dialog-modal wire:model="showingPlayerModal">
                @if ($isEditMode)
                    <x-slot name="title">Atualizar Jogador</x-slot>
                @else
                    <x-slot name="title">Criar Jogador</x-slot>
                @endif
                <x-slot name="content">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <!--
          Background backdrop, show/hide based on modal state.
      
          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                        <div class="fixed inset-0 z-10 overflow-y-auto">
                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <!--
              Modal panel, show/hide based on modal state.
      
              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
                                <div
                                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div
                                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                <!-- Heroicon name: outline/exclamation-triangle -->
                                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                                                </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                                                    Deactivate account</h3>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">Are you sure you want to deactivate
                                                        your account? All of your data will be permanently removed. This
                                                        action cannot be undone.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                        <button type="button"
                                            class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Deactivate</button>
                                        <button type="button"
                                            class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
@endsection
