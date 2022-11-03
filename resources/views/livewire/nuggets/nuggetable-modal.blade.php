@php use App\Models\Nugget @endphp

<div class="flex flex-col p-4 space-y-4">
    <h2 class="font-bold text-sky-900 text-2xl">{{ \Illuminate\Support\Str::plural(ucwords(Nugget::NUGGET_TYPES[$nuggetTypeId])) }}</h2>
    <!-- Header -->
    <div class="w-2/5 flex flex-row space-x-6 items-center">
        <!-- Avatar -->
        @if (! empty($item['created_by_avatar']))
            <img src="{{ $item['created_by_avatar'] }}"
                 class="w-16 h-16 rounded-full shadow-xl"
                 alt="{{ $item['created_by'] }}">
        @else
            <div class="w-16 h-16 rounded-full bg-gray-500"></div>
        @endif
        <!-- Post Author Information -->
        <div class="flex flex-col">
            <a href="{{ $item['profile_url'] }}"
               class="text-lg font-semibold text-sky-800 hover:underline hover:text-sky-600">
                <span>{{ $item['created_by'] }}</span>
            </a>
            <p class="text-md text-slate-500">
                <span>{{ $item['faith_title'] }}</span>
            </p>
            <p class="text-sm font-semibold text-gray-700">
                <span>Type: {{ $item['type'] }} - {{ $item['created_at'] }}</span>
            </p>
        </div>
    </div>
</div>
