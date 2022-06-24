<div class="w-full flex flex-row items-center max-w-3xl" x-data="{
    
}">
    <!-- Search Icon and Text Field -->
    <div class="flex flex-row space-x-2 items-center bg-slate-100 rounded-tl-lg rounded-bl-lg w-11/12 py-2 pl-4">
        <!-- Search Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <!-- Search Field -->
        <input type="text" wire:model="searchField" placeholder="Search for tags, doctrines, religions, denominations, etc..."
            class="text-gray-600 placeholder-gray-400 bg-slate-100 border-none flex-shrink-1 w-full focus:border-transparent focus:ring-0 focus:placeholder-transparent">
    </div>
    <button wire:click="submit" class="px-2 py-4 h-full bg-sky-500 text-white rounded-tr-lg rounded-br-lg">
        <span class="text-sm p-2">Search</span>
    </button>
</div>
