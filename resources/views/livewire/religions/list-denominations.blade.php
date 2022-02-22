<div class="flex flex-col space-y-4 w-full p-8">
    <p class="text-3xl font-semibold">Denominations for {{ $religion->name }}</p>
    <!-- TODO: Finish building component -->
    <div class="flex flex-col space-y-2">
        @forelse ($religion->denominations as $denomination)
            <div class="flex flex-row justify-between items-center">
                <p class="font-semibold text-md">{{ $denomination->name }}</p>
                <div class="flex flex-row space-x-2">
                    @if (!$denomination->approved)
                        <button type="button" class="hover:cursor-pointer text-white font-semibold py-1 px-6 text-lg rounded-md bg-green-300 hover:bg-green-400" wire:click="approve({{ $denomination->getKey() }})">Approve</button>
                    @endif

                    <button type="button" class="hover:cursor-pointer text-white font-semibold py-1 px-6 text-lg rounded-md bg-yellow-300 hover:bg-yellow-400" wire:click="edit({{ $denomination->getKey() }})">Edit</button>
                    <button type="button" class="hover:cursor-pointer text-white font-semibold py-1 px-6 text-lg rounded-md bg-red-300 hover:bg-red-400" wire:click="delete({{ $denomination->getKey() }})">Delete</button>
                </div>
            </div>
        @empty
            <div class="flex justify-center items-center w-full">
                <p class="font-semibold text-md">No denominations</p>
            </div>
        @endforelse
    </div>
</div>
