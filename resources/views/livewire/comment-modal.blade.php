<div class="w-full p-8 flex flex-col justify-between space-y-2">
    <div class="w-full flex flex-col space-y-2">
        <div class="flex flex-col w-full">
            <p class="text-2xl font-semibold text-sky-400">{{ $model['title'] }}</p>
            <p class="text-sm text-sky-400">
                <span>Created by: </span>
                <a href="{{ route('users.show', ['user' => $model['user_id']]) }}" class="hover:text-sky-700">
                    <span>{{ $model['created_by'] }}</span>
                </a>
                <span> - {{ $model['created_at'] }}</span>
            </p>
        </div>
        <p class="text-md text-slate-400">{{ $model['content'] }}</p>
    </div>
    <!-- Comments -->
    <div class="w-full flex flex-col space-y-4 overflow-y-auto">
        @forelse ($comments ?? [] as $comment)
            <div class="bg-slate-200 w-full p-2 flex flex-col space-y-2">
                <p>{{ $comment['created_by'] }}</p>
                <p>{{ $comment['content'] }}</p>
            </div>
        @empty
            <p class="text-xl font-semibold text-slate-500">No comments</p>
        @endforelse
    </div>
    <!-- Add comment -->
    <div class="flex flex-row w-full">
        <input type="text" wire:model.defer="state.comment"
                placeholder="Add comment..."
                class="rounded-tl-lg rounded-bl-lg text-gray-600 placeholder-gray-400 bg-slate-100 border-none flex-shrink-1 w-full focus:border-transparent focus:ring-0 focus:placeholder-transparent">
        <button wire:click="post" class="px-2 py-4 h-full bg-sky-500 text-white rounded-tr-lg rounded-br-lg">
            <span class="text-sm p-2">Comment</span>
        </button>
    </div>
</div>
