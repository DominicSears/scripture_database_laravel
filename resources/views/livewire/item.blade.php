<div class="flex flex-row space-x-2 justify-between py-8">
    <!-- Title & Description -->
    <div class="w-3/5 flex flex-col space-y-4">
        <div class="flex flex-col space-y-2">
            <h3 class="text-xl font-semibold text-slate-600">{{ $item->title }}</h3>
            <p class="text-sm text-gray-400">{{ $item->description }}</p>
        </div>
        @if ($hasControls)
            <div class="flex flex-row space-x-4 items-center">
                <!-- Votes -->
                <livewire:item-votes :votable="$item" :type="$item::class" :modelId="$item->getKey()" />
                <!-- Comments -->
                <livewire:item-comments :commentable="$item" :type="$item::class" :modelId="$item->getKey()" />
            </div>
        @endif
    </div>
    <!-- Author Information -->
    <div class="w-2/5 flex flex-row space-x-6 items-center justify-center">
        <!-- Avatar -->
        @if (isset($user->profile_photo_path))
            <img src="{{ $user->profile_photo_url }}"
                 class="w-16 h-16 rounded-full shadow-xl"
                 alt="{{ $user->username }}">
        @else
            <div class="w-16 h-16 rounded-full bg-gray-500"></div>
        @endif
        <!-- Post Author Information -->
        <div class="flex flex-col">
            <a href="{{ $user->profile_url }}"
               class="text-lg font-semibold text-sky-800">
                <span>{{ $user->username }}</span>
            </a>
            <p class="text-md text-slate-500">
                <span>{{ $user->faith->religion->name }}</span>
                @if (isset($user->faith->denomination))
                    <span>({{ $user->faith->denomination->name }})</span>
                @endif
            </p>
            @if (isset($itemType))
                <p class="text-sm font-semibold text-gray-700">
                    <span>Type: {{ $itemType }} - {{ $item->created_at->diffForHumans() }}</span>
                </p>
            @endif
        </div>
    </div>
</div>
