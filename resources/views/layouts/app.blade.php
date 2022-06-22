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
                display: none !important;
            }
        </style>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased w-full h-screen">
        <!-- Header Bar -->
        <div class="flex flex-row justify-between items-center px-8 py-4 w-full border-b border-slate-200" style="height: 10%;">
            <div class="flex flex-row space-x-4 items-center w-max">
                <div class="rounded-full w-12 h-12 bg-gray-500"></div>
                <p class="font-thin text-gray-700 text-xl">Scripture Resource</p>
            </div>
            @livewire('search')
            @livewire('navigation-menu')
        </div>
        <!-- Sidebar and Content -->
        <div class="flex flex-row space-x-4" style="height: 90%;">
            <!-- Sidebar -->
            <div class="h-full flex flex-col border-r border-slate-200 px-2 w-fit overflow-y-auto" id="sidebar" x-data="{
                open: false,
                opendSubMenu: false,
                subMenuOpen: {
                    users: false,
                    groups: false,
                    doctrines: false,
                    nuggets: false
                },
                openMenu() {
                    for (let text of document.getElementsByClassName('icon-name')) {
                        text.style.display = this.open ? 'none' : 'block';
                    }

                    for (let chev of document.getElementsByClassName('menu-extend')) {
                        chev.style.display = this.open ? 'none' : 'block';
                    }
                    
                    this.open ? $el.removeAttribute('style') : $el.setAttribute('style', 'width: 16rem !important');

                    if (this.openedSubMenu) {
                        this.actionSubMenu(false);
                    }

                    this.open = !this.open;
                },
                actionSubMenu(open) {
                    for (let menu in this.subMenuOpen) {
                        this.subMenuOpen[menu] = open;
                    }
                },
                openSubMenu(name) {
                    if (!this.open) {
                        this.openMenu();
                    }

                    this.subMenuOpen[name] = !this.subMenuOpen[name];
                    this.openedSubMenu = this.checkOpened();
                },
                checkOpened() {
                    for (let menu in this.subMenuOpen) {
                        if (this.subMenuOpen[menu]) {
                            return true;
                        }
                    }

                    return false;
                }
            }" x-transition>
                <!-- Hamburget Menu -->
                <div class="w-full pt-8 pl-2" x-on:click="openMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-500 hover:cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
                <div class="w-full flex flex-col space-y-6 pt-8">
                    <!-- Home -->
                    <a href="{{ route('dashboard') }}">
                        <x-menu-icon :isSelected="request()->is('dashboard')" :singleItem="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <p class="font-semibold icon-name" style="display: none;">Home</p>
                        </x-menu-icon>
                    </a>
                    <!-- Users -->
                    <x-menu-icon :isSelected="request()->is('users*')" x-on:click="openSubMenu('users')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <p class="font-semibold icon-name" style="display: none;">Users</p>
                        <x-slot:children x-show="subMenuOpen.users">
                            <x-submenu-link :active="request()->is(route('users.edit'))" url="{{ route('users.edit') }}">Edit User</x-submenu-link>
                        </x-slot:children>
                    </x-menu-icon>
                    <!-- Religions/Denominations -->
                    <x-menu-icon :isSelected="request()->is('religions*') || request()->is('denominations*')" x-on:click="openSubMenu('groups')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h- 6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="font-semibold icon-name" style="display: none;">Religions</p>
                        <x-slot:children x-show="subMenuOpen.groups">
                            <x-submenu-link :active="request()->routeIs('religions.list')" url="{{ route('religions.list') }}">Show Religions</x-submenu-link>
                            <x-submenu-link :active="request()->routeIs('religions.create')" url="{{ route('religions.create') }}">Create Religion</x-submenu-link>
                            <x-submenu-link :active="request()->routeIs('denominations.create')" url="{{ route('denominations.create') }}">Create Denomination</x-submenu-link>
                        </x-slot:children>
                    </x-menu-icon>
                    <!-- Doctrines -->
                    <x-menu-icon :isSelected="request()->is('doctrines*')" x-on:click="openSubMenu('doctrines')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <p class="font-semibold icon-name" style="display: none;">Doctrines</p>
                        <x-slot:children x-show="subMenuOpen.doctrines">
                            <x-submenu-link :active="request()->is(route('doctrines.list'))" url="{{ route('doctrines.list') }}">Show Doctrines</x-submenu-link>
                            <x-submenu-link :active="request()->is(route('doctrines.create'))" url="{{ route('doctrines.create') }}">Create Doctrine</x-submenu-link>
                        </x-slot:children>
                    </x-menu-icon>
                    <!-- Nuggets -->
                    <x-menu-icon :isSelected="request()->is('nuggets*')" x-on:click="openSubMenu('nuggets')">
                        <div class="w-6 h-6 bg-gray-300 rounded-full"></div>
                        <p class="font-semibold icon-name" style="display: none;">Nuggets</p>
                        <x-slot:children x-show="subMenuOpen.nuggets">
                            <x-submenu-link :active="request()->is(route('nuggets.list'))" url="{{ route('nuggets.list') }}">Show Nuggets</x-submenu-link>
                        </x-slot:children>
                    </x-menu-icon>
                </div>
            </div>
            <!-- Content -->
            <div class="w-full h-full p-8 overflow-y-auto">
                {{ $slot }}
            </div>
        </div>

        @stack('modals')

        @livewireScripts
        @livewire('livewire-ui-modal')
    </body>
</html>
