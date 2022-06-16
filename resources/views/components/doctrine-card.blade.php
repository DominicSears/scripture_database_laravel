@php
use \App\Models\Nugget;
@endphp

<div class="bg-gray-200 rounded-2xl shadow-xl p-8 w-60 h-50 text-wrap flex flex-shrink-0">
    <div class="flex flex-col space-y-2 justify-center content-center text-center">
        <p class="text-lg font-semibold">{{ $doctrine->title }}</p>
        <div class="overflow-y-auto">
            <p class="text-md">{{ $doctrine->description }}</p>
        </div>
        @if ($doctrine->nuggets->isNotEmpty())
            @foreach (Nugget::NUGGET_TYPES as $type)
                <p>{{ ucfirst($type) }}: {{ $doctrine->nuggets
                    ->where('nugget_type_id', Nugget::getNuggetTypeIdByString($type))
                    ->count() }}</p>
            @endforeach
        @endif
    </div>
</div>
