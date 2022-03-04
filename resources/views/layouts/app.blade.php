<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <style>
            [x-cloak] {
                display: none;
            }
        </style>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased w-full h-full">

        <div class="min-h-screen h-screen bg-gray-200 w-full flex flex-row">
            <!-- Sidebar -->
            <div class="flex flex-col space-y-4 w-1/6 py-8 pl-8">
                <div class="flex flex-col space-y-4 bg-white rounded-2xl shadow-2xl h-full py-8">
                    <div class="flex justify-center items-center px-8">
                        <a href="{{ route('dashboard') }}">
                            <div class="rounded-full h-32 w-32 bg-gray-400"></div>
                        </a>
                    </div>
                    <div class="flex flex-col space-y-4 py-2 overflox-y-auto">
                        <ul class="w-full space-y-4"
                        x-data="{
                            showUsers: false,
                            showReligions: false    
                        }">
                            <!-- User -->
                            <li class="w-full hover:cursor-pointer">
                                <div class="flex flex-row space-x-6 items-center pl-8 hover:bg-gray-100 py-4" @click="showUsers = !showUsers">
                                    <div class="bg-gray-400 w-8 h-8 rounded-full"></div>
                                    <span class="font-semibold text-2xl">Users</span>
                                </div>
                                <ul x-show="showUsers" x-cloak x-transition class="flex flex-col my-4 space-y-4 pl-8 hover:bg-gray-100 py-2">
                                    <a class="font-semibold text-lg" href="{{ route('users.edit') }}"><li>Edit</li></a>
                                </ul>
                            </li>

                            <!-- Religions -->
                            <li class="w-full hover:cursor-pointer">
                                <div class="flex flex-row space-x-6 items-center pl-8 hover:bg-gray-100 py-4" @click="showReligions = !showReligions">
                                    <div class="bg-gray-400 w-8 h-8 rounded-full"></div>
                                    <span class="font-semibold text-2xl">Religions</span>
                                </div>
                                <ul x-show="showReligions" x-cloak x-transition class="flex flex-col my-4 space-y-4 ml-8 py-2">
                                    <a class="font-semibold text-lg hover:bg-gray-100" href="{{ route('religions.list') }}">
                                        <li>List</li>
                                    </a>
                                    <a class="font-semibold text-lg hover:bg-gray-100" href="{{ route('denominations.create') }}">
                                        <li>Create Denomination</li>
                                    </a>
                                    <a class="font-semibold text-lg hover:bg-gray-100" href="{{ route('religions.create') }}">
                                        <li>Create Religion</li>
                                    </a>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Content and Copyright -->
            <div class="flex flex-col space-y-2 w-full overflow-y-auto justify-between">
                <div>
                    <div class="flex flex-row justify-between items-center px-8">
                        @if (isset($header))
                            {{ $header }}
                        @else
                            <p class="font-bold text-2xl">Scripture Laravel Resource</p>
                        @endif
                        @livewire('navigation-menu')
                    </div>
                    <div class="pb-12">
                        <!-- Page Content -->
                        <main class="w-full h-full">
                            <div class="px-8">
                                {{ $slot }}
                            </div>
                        </main>
                    </div>
                </div>
                {{-- <p class="text-center font-bold text-sm"></p> --}}
            </div>
        </div>

        @stack('modals')

        @livewireScripts
        @livewire('livewire-ui-modal')
    </body>
</html>
