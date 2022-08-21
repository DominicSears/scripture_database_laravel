<x-app-layout>
    <div class="flex flex-row space-x-8 h-full">
        <!-- Col 1 -->
        <div class="w-1/5 flex flex-col space-y-4 h-full px-4">
            <!-- Following -->
            <div class="flex flex-col space-y-4 h-full bg-white rounded-2xl p-6 justify-between">
                <!-- Header -->
                <div class="flex flex-col">
                    <p class="font-bold text-2xl text-sky-900">Following</p>
                </div>
                <div class="flex flex-col space-y-4 w-full h-full">
                    <!-- Items -->
                    @forelse ($following as $item)
                        <div class="flex flex-row space-x-2 justify-between items-center w-full">
                            <a class="text-md font-semibold text-slate-500"
                               href="{{ route($item->getShowRouteAttributes()) }}">
                                <span>{{ $item->title }}</span>
                            </a>
                        </div>
                    @empty
                        <div class="flex justify-center items-center w-full h-full">
                            <p class="text-lg font-semibold text-slate-500">
                                <span>Find some items to follow</span>
                            </p>
                        </div>
                    @endforelse
                </div>
                <a href="#" class="text-sky-500 text-md text-center hover:underline">See More</a>
            </div>
            <hr class="border border-sky-200">
            <!-- Activity -->
            <div class="flex flex-col space-y-4 h-full bg-white rounded-2xl p-6 justify-between">
                <!-- Header -->
                <div class="flex flex-col">
                    <p class="font-bold text-2xl text-sky-900">Activity</p>
                </div>
                <div class="flex flex-col space-y-4">
                    <!-- Items -->
                </div>
                <a href="#" class="text-sky-500 text-md text-center hover:underline">See More</a>
            </div>
        </div>
        <!-- Col 2 -->
        <div class="w-3/5 flex flex-col space-y-4 h-full overflow-y-auto px-4">
            <livewire:feed />
        </div>
        <!-- Col 3 -->
        <div class="w-1/5 flex flex-col space-y-4 h-full px-4">
            <!-- Following -->
            <div class="flex flex-col space-y-4 h-full bg-white rounded-2xl p-6 justify-between">
                <!-- Header -->
                <div class="flex flex-col">
                    <p class="font-bold text-2xl text-sky-900">Following</p>
                </div>
                <div class="flex flex-col space-y-4">
                    <!-- Items -->
                </div>
                <a href="#" class="text-sky-500 text-md text-center hover:underline">See More</a>
            </div>
            <hr class="border border-sky-200">
            <!-- Activity -->
            <div class="flex flex-col space-y-4 h-full bg-white rounded-2xl p-6 justify-between">
                <!-- Header -->
                <div class="flex flex-col">
                    <p class="font-bold text-2xl text-sky-900">Activity</p>
                </div>
                <div class="flex flex-col space-y-4">
                    <!-- Items -->
                </div>
                <a href="#" class="text-sky-500 text-md text-center hover:underline">See More</a>
            </div>
        </div>
    </div>
</x-app-layout>
