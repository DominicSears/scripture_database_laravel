<div @class([
        'flex flex-row space-x-2 justify-between',
        $padding ?? 'py-4',
    ])>
    <!-- Title & Description -->
    <div class="w-3/5 flex flex-col space-y-4">
        <div class="flex flex-col space-y-2">
            <h3 class="text-2xl font-bold text-slate-700">{{ $item->title }}</h3>
            <p class="text-sm text-gray-500">{{ $item->description }}</p>
        </div>
        @if ($hasControls)
            <div class="flex flex-row space-x-8 items-center">
                <!-- Votes -->
                <livewire:item-votes :votable="$item" :type="$item::class" :modelId="$item->getKey()" />
                <!-- Comments -->
                <livewire:item-comments :commentable="$item" :type="$item::class" :modelId="$item->getKey()" />
                <!-- Supports -->
                <livewire:item-nuggetable :item="$item" :nuggetableTypeId="\App\Models\Nugget::NUGGET_TYPE_SUPPORT" />
                <!-- Refutes -->
                <livewire:item-nuggetable :item="$item" :nuggetableTypeId="\App\Models\Nugget::NUGGET_TYPE_REFUTE" />
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
               class="text-2xl font-bold text-sky-800 hover:underline">
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
