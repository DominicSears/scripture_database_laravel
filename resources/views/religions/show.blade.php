<x-app-layout>
    <div class="flex flex-row space-x-4 w-full h-full">
        <!-- Column 1 -->
        <div class="flex flex-col space-y-4 w-3/4 h-full">
            <!-- Avatar, Name, and Description -->
            <div class="w-full h-fit rounded-2xl shadow-xl bg-white flex flex-row items-center p-8 space-x-12">
                <div class="h-full flex justify-center items-center">
                    <div class="w-32 h-32 rounded-full bg-gray-600"></div>
                </div>
                <div class="w-full h-full flex flex-col space-y-4">
                    <h1 class="text-4xl font-bold text-sky-900">{{ $religion->title }}</h1>
                    <p class="text-sm text-slate-400">
                        <span>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
                            Facilisis gravida neque convallis a cras semper auctor. Consequat id porta nibh venenatis cras sed. Ut porttitor leo a diam sollicitudin tempor id eu. Ultrices neque ornare aenean euismod elementum. Dapibus ultrices in iaculis nunc
                        </span>
                    </p>
                </div>
            </div>
            <!-- Doctrines -->
            <div class="w-full h-fit rounded-2xl shadow-xl bg-white flex flex-col space-y-2 p-8">
                <h2 class="text-3xl font-bold text-sky-900">Doctrines</h2>
                <div class="flex flex-col items-start w-full">
                    @forelse ($religion->doctrines as $doctrine)
                        <div @class([
                            'flex flex-row items-center w-full py-12',
                            'border-t border-sky-300' => $loop->even || ($loop->last && $loop->count != '1')
                        ])>
                            <!-- Title & Description -->
                            <div class="w-3/5 flex flex-col space-y-2">
                                <h3 class="text-xl font-semibold text-slate-600">{{ $doctrine->title }}</h3>
                                <p class="text-sm text-gray-400">{{ $doctrine->description }}</p>
                            </div>
                            <!-- Author Information -->
                            <div class="w-2/5 flex flex-row space-x-6 items-center justify-center">
                                <!-- Avatar -->
                                @if (isset($doctrine->createdBy->profile_photo_path))
                                    <img src="{{ $doctrine->createdBy->profile_photo_url }}"
                                        class="w-16 h-16 rounded-full shadow-xl"
                                         alt="{{ $doctrine->createdBy->username }}">
                                @else
                                    <div class="w-16 h-16 rounded-full bg-gray-500"></div>
                                @endif
                                <!-- Post Author Information -->
                                <div class="flex flex-col">
                                    <p class="text-lg font-semibold text-sky-800">
                                        <span>{{ $doctrine->createdBy->username }}</span>
                                    </p>
                                    <p class="text-md text-slate-500">
                                        <span>{{ $doctrine->createdBy->faith->religion->name }}</span>
                                        @if (isset($doctrine->createdBy->faith->denomination))
                                            <span>({{ $doctrine->createdBy->faith->denomination->name }})</span>
                                        @endif
                                    </p>
                                    <p class="text-sm font-semibold text-gray-700">
                                        <span>Type: Doctrine - {{ $doctrine->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-full h-full flex items-center justify-center">
                            <p class="text-2xl font-semibold">No doctrines available</p>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- Nuggets -->
            <div class="w-full h-fit rounded-2xl shadow-xl bg-white flex flex-col space-y-2 p-8">
                <h2 class="text-3xl font-bold text-sky-900">Nuggets</h2>
                <div class="flex flex-col space-y-6 items-start w-full">
                    @forelse ([] as $doctrine)
                        <div class="flex flex-row items-center w-full">
                            <!-- Title & Description -->
                            <div class="w-3/5 flex flex-col space-y-2">
                                <h3 class="text-xl font-semibold text-slate-600">{{ $doctrine->title }}</h3>
                                <p class="text-sm text-gray-400">{{ $doctrine->description }}</p>
                            </div>
                            <!-- Author Information -->
                            <div class="w-2/5 flex flex-row space-x-6 items-center justify-center">
                                <!-- Avatar -->
                                <div class="w-16 h-16 rounded-full bg-gray-500"></div>
                                <!-- Post Author Information -->
                                <div class="flex flex-col">
                                    <p class="text-lg font-semibold text-sky-800">
                                        <span>{{ $doctrine->createdBy->username }}</span>
                                    </p>
                                    <p class="text-md text-slate-500">
                                        <span>{{ $doctrine->createdBy->faith->religion->name }}</span>
                                        @if (isset($doctrine->createdBy->faith->denomination))
                                            <span>({{ $doctrine->createdBy->faith->denomination->name }})</span>
                                        @endif
                                    </p>
                                    <p class="text-sm font-semibold text-gray-700">
                                        <span>Type: Doctrine - {{ $doctrine->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-full h-full flex items-center justify-center">
                            <p class="text-2xl font-semibold">No nuggets available</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- Column 2 -->
        <div class="flex flex-col space-y-4 w-1/4 h-full">
            <div class="w-full h-fit rounded-2xl shadow-xl bg-white flex flex-row p-8 justify-between">
                <!-- Column 1 -->
                <div class="flex flex-col justify-between space-y-8">
                    <!-- Row 1 -->
                    <div class="flex flex-col space-y-2 items-center">
                        <svg class="text-sky-900" width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 4.84969V16.7397C22 17.7097 21.21 18.5997 20.24 18.7197L19.93 18.7597C18.29 18.9797 15.98 19.6597 14.12 20.4397C13.47 20.7097 12.75 20.2197 12.75 19.5097V5.59969C12.75 5.22969 12.96 4.88969 13.29 4.70969C15.12 3.71969 17.89 2.83969 19.77 2.67969H19.83C21.03 2.67969 22 3.64969 22 4.84969Z" fill="currentColor"/>
                            <path d="M10.7083 4.70969C8.87828 3.71969 6.10828 2.83969 4.22828 2.67969H4.15828C2.95828 2.67969 1.98828 3.64969 1.98828 4.84969V16.7397C1.98828 17.7097 2.77828 18.5997 3.74828 18.7197L4.05828 18.7597C5.69828 18.9797 8.00828 19.6597 9.86828 20.4397C10.5183 20.7097 11.2383 20.2197 11.2383 19.5097V5.59969C11.2383 5.21969 11.0383 4.88969 10.7083 4.70969ZM4.99828 7.73969H7.24828C7.65828 7.73969 7.99828 8.07969 7.99828 8.48969C7.99828 8.90969 7.65828 9.23969 7.24828 9.23969H4.99828C4.58828 9.23969 4.24828 8.90969 4.24828 8.48969C4.24828 8.07969 4.58828 7.73969 4.99828 7.73969ZM7.99828 12.2397H4.99828C4.58828 12.2397 4.24828 11.9097 4.24828 11.4897C4.24828 11.0797 4.58828 10.7397 4.99828 10.7397H7.99828C8.40828 10.7397 8.74828 11.0797 8.74828 11.4897C8.74828 11.9097 8.40828 12.2397 7.99828 12.2397Z" fill="currentColor"/>
                        </svg>
                        <h2 class="text-xl font-bold text-sky-900">100 Nuggets</h2>
                    </div>
                    <!-- Row 2 -->
                    <div class="flex flex-col space-y-2 items-center">
                        <svg class="text-sky-900" width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM15.53 12.03C15.38 12.18 15.19 12.25 15 12.25C14.81 12.25 14.62 12.18 14.47 12.03L12.75 10.31V15.5C12.75 15.91 12.41 16.25 12 16.25C11.59 16.25 11.25 15.91 11.25 15.5V10.31L9.53 12.03C9.24 12.32 8.76 12.32 8.47 12.03C8.18 11.74 8.18 11.26 8.47 10.97L11.47 7.97C11.76 7.68 12.24 7.68 12.53 7.97L15.53 10.97C15.82 11.26 15.82 11.74 15.53 12.03Z" fill="currentColor"/>
                        </svg>
                        <h2 class="text-xl font-bold text-sky-900">501k Upvotes</h2>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="flex flex-col justify-between">
                    <!-- Row 1 -->
                    <div class="flex flex-col space-y-2 items-center">
                        <svg class="text-sky-900" width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 22H3C2.59 22 2.25 21.66 2.25 21.25C2.25 20.84 2.59 20.5 3 20.5H21C21.41 20.5 21.75 20.84 21.75 21.25C21.75 21.66 21.41 22 21 22Z" fill="currentColor"/>
                            <path d="M19.0206 3.48162C17.0806 1.54162 15.1806 1.49162 13.1906 3.48162L11.9806 4.69162C11.8806 4.79162 11.8406 4.95162 11.8806 5.09162C12.6406 7.74162 14.7606 9.86162 17.4106 10.6216C17.4506 10.6316 17.4906 10.6416 17.5306 10.6416C17.6406 10.6416 17.7406 10.6016 17.8206 10.5216L19.0206 9.31162C20.0106 8.33162 20.4906 7.38162 20.4906 6.42162C20.5006 5.43162 20.0206 4.47162 19.0206 3.48162Z" fill="currentColor"/>
                            <path d="M15.6103 11.5308C15.3203 11.3908 15.0403 11.2508 14.7703 11.0908C14.5503 10.9608 14.3403 10.8208 14.1303 10.6708C13.9603 10.5608 13.7603 10.4008 13.5703 10.2408C13.5503 10.2308 13.4803 10.1708 13.4003 10.0908C13.0703 9.81078 12.7003 9.45078 12.3703 9.05078C12.3403 9.03078 12.2903 8.96078 12.2203 8.87078C12.1203 8.75078 11.9503 8.55078 11.8003 8.32078C11.6803 8.17078 11.5403 7.95078 11.4103 7.73078C11.2503 7.46078 11.1103 7.19078 10.9703 6.91078C10.9491 6.86539 10.9286 6.82022 10.9088 6.77532C10.7612 6.442 10.3265 6.34455 10.0688 6.60231L4.34032 12.3308C4.21032 12.4608 4.09032 12.7108 4.06032 12.8808L3.52032 16.7108C3.42032 17.3908 3.61032 18.0308 4.03032 18.4608C4.39032 18.8108 4.89032 19.0008 5.43032 19.0008C5.55032 19.0008 5.67032 18.9908 5.79032 18.9708L9.63032 18.4308C9.81032 18.4008 10.0603 18.2808 10.1803 18.1508L15.9016 12.4295C16.1612 12.1699 16.0633 11.7245 15.7257 11.5804C15.6877 11.5642 15.6492 11.5476 15.6103 11.5308Z" fill="currentColor"/>
                        </svg>
                        <h2 class="text-xl font-bold text-sky-900">230 Posts</h2>
                    </div>

                    <!-- Row 2 -->
                    <div class="flex flex-col space-y-2 items-center">
                        <svg class="text-sky-900" width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5291 7.77C17.4591 7.76 17.3891 7.76 17.3191 7.77C15.7691 7.72 14.5391 6.45 14.5391 4.89C14.5391 3.3 15.8291 2 17.4291 2C19.0191 2 20.3191 3.29 20.3191 4.89C20.3091 6.45 19.0791 7.72 17.5291 7.77Z" fill="currentColor"/>
                            <path d="M20.7916 14.7004C19.6716 15.4504 18.1016 15.7304 16.6516 15.5404C17.0316 14.7204 17.2316 13.8104 17.2416 12.8504C17.2416 11.8504 17.0216 10.9004 16.6016 10.0704C18.0816 9.8704 19.6516 10.1504 20.7816 10.9004C22.3616 11.9404 22.3616 13.6504 20.7916 14.7004Z" fill="currentColor"/>
                            <path d="M6.44016 7.77C6.51016 7.76 6.58016 7.76 6.65016 7.77C8.20016 7.72 9.43016 6.45 9.43016 4.89C9.43016 3.29 8.14016 2 6.54016 2C4.95016 2 3.66016 3.29 3.66016 4.89C3.66016 6.45 4.89016 7.72 6.44016 7.77Z" fill="currentColor"/>
                            <path d="M6.55109 12.8506C6.55109 13.8206 6.76109 14.7406 7.14109 15.5706C5.73109 15.7206 4.26109 15.4206 3.18109 14.7106C1.60109 13.6606 1.60109 11.9506 3.18109 10.9006C4.25109 10.1806 5.76109 9.89059 7.18109 10.0506C6.77109 10.8906 6.55109 11.8406 6.55109 12.8506Z" fill="currentColor"/>
                            <path d="M12.1208 15.87C12.0408 15.86 11.9508 15.86 11.8608 15.87C10.0208 15.81 8.55078 14.3 8.55078 12.44C8.56078 10.54 10.0908 9 12.0008 9C13.9008 9 15.4408 10.54 15.4408 12.44C15.4308 14.3 13.9708 15.81 12.1208 15.87Z" fill="currentColor"/>
                            <path d="M8.87078 17.9406C7.36078 18.9506 7.36078 20.6106 8.87078 21.6106C10.5908 22.7606 13.4108 22.7606 15.1308 21.6106C16.6408 20.6006 16.6408 18.9406 15.1308 17.9406C13.4208 16.7906 10.6008 16.7906 8.87078 17.9406Z" fill="currentColor"/>
                        </svg>
                        <h2 class="text-xl font-bold text-sky-900">250k Followers</h2>
                    </div>
                </div>
            </div>
            <div class="w-full h-fit rounded-2xl shadow-xl bg-white flex flex-col p-8">
                <livewire:list-items :classType="\App\Models\Denomination::class"
                    :items="$religion->allDenominations->take(10)" />
            </div>
            <div class="w-full h-fit rounded-2xl shadow-xl bg-white flex flex-col p-8">
                <livewire:list-items :classType="\App\Models\Post::class"
                    :items="$religion->posts->take(10)"/>
            </div>
        </div>
    </div>
</x-app-layout>
