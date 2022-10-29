<x-app-layout>
    <div class="flex flex-col justify-center items-center space-y-2 w-full h-full px-6 pb-12 pt-8">
        <p class="text-lg font-semibold text-slate-400">{{ $query }}</p>
        <p class="text-lg font-semibold text-slate-400">{{ $type ?? 'No type' }}</p>
    </div>
</x-app-layout>
