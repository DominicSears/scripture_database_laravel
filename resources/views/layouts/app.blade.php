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

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased w-full h-full">
        <div class="min-h-screen h-screen bg-gray-200 w-full">
            <div class="flex flex-row space-x-4 h-full p-8">
                <div class="flex flex-col space-y-4 bg-white rounded-2xl shadow-2xl w-1/6 h-full p-8">
                    <div class="flex justify-center items-center">
                        <div class="rounded-full h-32 w-32 bg-gray-400"></div>
                        <div class="flex flex-col space-x-4">
                            
                        </div>
                    </div>
                </div>
                <div class="flex flex-col space-y-2 w-full">
                    <div class="flex flex-row justify-between items-center">
                        @if (isset($header))
                            {{ $header }}
                        @else
                            <p class="font-bold text-2xl">Scripture Laravel Resource</p>
                        @endif
                        @livewire('navigation-menu')
                    </div>
                    <!-- Page Content -->
                    <main class="w-full h-full overflow-y-auto">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
        @livewire('livewire-ui-modal')
    </body>
</html>
