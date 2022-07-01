<div class="w-full p-8 flex flex-col justify-between space-y-2">
    <div class="w-full flex flex-col space-y-2">
        <p class="text-2xl font-semibold text-sky-400">{{ $model['title'] }}</p>
        <p class="text-md text-sky-400">{{ $model['content'] }}</p>
        <p class="text-sm text-sky-400">
            <span>Created by: </span>
            <a href="{{ route('users.show', ['user' => $model['user_id']]) }}" class="hover:text-sky-700">
                <span>{{ $model['created_by'] }}</span>
            </a>
            <span> - {{ $model['created_at'] }}</span>
        </p>
    </div>
    <p>{{ $model['content'] }}</p>
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
</div>
