<x-app-layout>
    <div class="flex flex-row space-x-8 h-full">
        <!-- Col 1 -->
        <div class="w-1/4 flex flex-col space-y-4 h-full divide-y divide-sky-300">
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
        <div class="w-2/4 flex flex-col space-y-4 h-full overflow-y-auto px-4">
            <livewire:feed />
        </div>
        <!-- Col 3 -->
        <div class="w-1/4 flex flex-col space-y-4 h-full divide-y divide-sky-300">
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
