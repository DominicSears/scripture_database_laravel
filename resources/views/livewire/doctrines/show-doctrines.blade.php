@if ($entity->doctrines->isNotEmpty() || $childrenHaveDoctrine)
    <div class="flex flex-col space-y-2">
        @if ($showTitle)
            <p class="text-4xl font-bold text-sky-900">{{ $entity->name }}</p>
        @endif
        @if ($entity->doctrines->isNotEmpty())
            <div class="w-full flex flex-col overflow-x-auto h-auto divide-y divide-sky-400">
                @foreach ($entity->doctrines as $doctrine)
                    <livewire:item :item="$doctrine->withoutRelations()" :user="$doctrine->createdBy" />
                @endforeach
            </div>
        @endif
        @if ($entity instanceof \App\Models\Religion && $childrenHaveDoctrine && $showChildren)
            @foreach ($entity->denominations as $denomination)
                @if ($denomination->doctrines->isNotEmpty())
                    <p class="text-2xl font-semibold">{{ $denomination->name }}</p>
                    <div class="w-full flex flex-col overflow-x-auto h-auto divide-y divide-sky-400">
                        @foreach ($denomination->doctrines as $doctrine)
                            <livewire:item :item="$doctrine->withoutRelations()" :user="$doctrine->createdBy" />
                        @endforeach
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@else
    <div class="flex w-full justify-center">
        <h3 class="text-2xl font-semibold text-center">No doctrines available</h3>
    </div>
@endif
