<x-app-layout>
    <div class="flex flex-row space-x-8 h-full">
        <!-- Col 1 -->
        <div class="w-1/4 flex flex-col space-y-4 h-full">
            <!-- Latest Groups -->
            <div class="flex flex-col space-y-4 h-full border-b border-sky-300">
                <!-- Header -->
                <div class="flex flex-row justify-between items-center">
                    <p class="font-bold text-lg">Latest Groups</p>
                    <div class="font-semibold text-sm space-x-2 flex flex-row text-sky-300 items-center">
                        <p>See More</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Latest Doctrines -->
            <div class="flex flex-col space-y-4 h-full">
                <!-- Header -->
                <div class="flex flex-row justify-between items-center">
                    <p class="font-bold text-lg">Latest Doctrines</p>
                    <div class="font-semibold text-sm space-x-2 flex flex-row text-sky-300 items-center">
                        <p>See More</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- Col 2 -->
        <div class="w-2/4 flex flex-col space-y-4 h-full">
            <livewire:feed />
        </div>
        <!-- Col 3 -->
        <div class="w-1/4 flex flex-col space-y-4 h-full">
            <!-- Latest Groups -->
            <div class="flex flex-col space-y-4 h-full border-b border-sky-300">
                <!-- Header -->
                <div class="flex flex-row justify-between items-center">
                    <p class="font-bold text-lg">Latest Groups</p>
                    <div class="font-semibold text-sm space-x-2 flex flex-row text-sky-300 items-center">
                        <p>See More</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Latest Doctrines -->
            <div class="flex flex-col space-y-4 h-full">
                <!-- Header -->
                <div class="flex flex-row justify-between items-center">
                    <p class="font-bold text-lg">Latest Doctrines</p>
                    <div class="font-semibold text-sm space-x-2 flex flex-row text-sky-300 items-center">
                        <p>See More</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
