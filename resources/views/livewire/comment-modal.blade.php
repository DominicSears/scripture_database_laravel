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
        @include('partials.comments', ['comments' => $comments ?? []])
    </div>
    <!-- Add comment -->
    <div @class([
        'w-full',
        'flex flex-col space-y-4' => isset($state['parent_id'])
    ])>
        @if (isset($state['parent_id']))
            <div class="w-full flex flex-row space-x-2 py-2 bg-slate-200 p-4 rounded-lg items-center">
                <div class="flex flex-col space-y-2 w-full">
                    @php
                        $comment = $this->getComment($state['parent_id']);
                    @endphp
                    <p class="text-md font-bold text-slate-600">Reply to: {{ $comment['created_by'] }}</p>
                    <p class="text-md font-semibold text-slate-400">{{ $comment['content'] }}</p>
                </div>
                <button wire:click="cancelReply" class="w-3 h-3 rounded-full p-1 flex justify-center items-center bg-white">
                    <span class="font-semibold">X</span>
                </button>
            </div>
        @endif
        <div class="flex flex-row w-full">
            <input type="text" wire:model.defer="state.comment" placeholder="Add comment..."
                    class="rounded-tl-lg rounded-bl-lg text-gray-600 placeholder-gray-400 bg-slate-100 border-none flex-shrink-1 w-full focus:border-transparent focus:ring-0 focus:placeholder-transparent">
            <button wire:click="post" class="px-2 py-4 h-full bg-sky-500 text-white rounded-tr-lg rounded-br-lg">
                <span class="text-sm p-2">Comment</span>
            </button>
        </div>
    </div>
</div>
