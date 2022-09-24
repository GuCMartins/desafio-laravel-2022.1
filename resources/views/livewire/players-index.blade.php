@extends('layouts.app')

@section('title', 'Jogadores')

@section('content')
    <div class="p-6">
        <div class="flex items-centre justify-end p4 py-3 sm:py-6 text-right">
            <button wire:click="createPlayerModal">
                {{ __('Create') }}
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
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $player->wins }}/{{ $player->defeats }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $teams[$player->team_id - 1]->name }}
                                        </td>
                                        <td class="px-6 py-4 text-right text-sm">
                                            <div class="flex space-x-2 px-2">
                                                <button wire:click='$emit("openModal", "edit-player", {{ json_encode(["player" => $player->id]) }})'>Editar</button>
                                                <button wire:click='$emit("openModal", "delete-player", {{ json_encode(["player" => $player->id]) }})'>Deletar</button>
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
        <dialog-modal wire:model="modalFormVisible">
            <slot name="title">
                {{ __('Save player') }} {{ $modelId }}
            </slot>

            <slot name="content">
                <div class="mt-4">
                    <label for="title" value="{{ __('Title') }}">
                    <input id="title" class="block mt-1 w-full" type="text" name="title"
                        wire:model.debounce.500ms="title" />
                    @error('title')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="title" value="{{ __('Content') }}" />
                    <div class="rounded-md shadow-sm">
                        <div class="mt-1 bg-white">
                            <div class="body-content" wire:ignore>
                                <trieditor class="tricontent" ref="trix" wire:model.debounce.500ms="content"
                                    wire:key="tricontent-unique-key"></trieditor>
                            </div>
                        </div>
                    </div>
                    @error('content')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </slot>

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
@endsection
