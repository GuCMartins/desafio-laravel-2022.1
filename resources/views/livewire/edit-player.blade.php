<div>
    <div class="p-8">
        <form wire:submit.prevent="update">
            <div>
                <x-label for="name":value="__('Name')">

                    <x-input id="name" class="block mt-1 w-full" type="text" wire:model.defer="player.name" />
                    @error('player.name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
            </div>

            <div>
                <x-label for="age":value="__('Age')">

                    <x-input id="age" class="block mt-1 w-full" type="integer" wire:model.defer="player.age" />
                    @error('player.age')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
            </div>

            <div>
                <x-label for="nationality":value="__('Nationality')">

                    <x-input id="nationality" class="block mt-1 w-full" type="text"
                        wire:model.defer="player.nationality" />
                    @error('player.nationality')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
            </div>

            <div>
                <x-label for="wins":value="__('Wins')">

                <x-input id="wins" class="block mt-1 w-full" type="text" wire:model.defer="player.wins"/>    
                @error('player.wins')
                    <span class="text-sm text-red-500">{{$message}}</span>
                @enderror    
            </div>

            <div>
                <x-label for="defeats":value="__('Defeats')">

                <x-input id="defeats" class="block mt-1 w-full" type="text" wire:model.defer="player.defeats"/>    
                @error('player.defeats')
                    <span class="text-sm text-red-500">{{$message}}</span>
                @enderror    
            </div>
        </form>
    </div>
