<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Apologenetics</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <style>
            [x-cloak] {
                display: none;
            }
        </style>
    </head>
    <body class="w-full h-screen">
        <div class="flex flex-row w-full h-full">
            <!-- Left -->
            <div class="flex flex-col justify-center items-center w-3/12 bg-sky-100"></div>
            <!-- Right -->
            <div class="flex flex-col justify-center items-center space-y-40 py-12 px-8 w-9/12 h-full">
                <!-- Sign up -->
                <div class="flex flex-col w-full items-center">
                    <p class="text-lg text-slate-600 font-semibold mb-4">Sign Up for {{ config('app.name') }}</p>
                    <a href="{{ route('register') }}" class="px-4 py-2 ring-1 ring-slate-300 hover:bg-slate-100 text-slate-400 hover:text-slate-600 rounded-lg w-1/4 text-center">
                        <span>Sign Up</span>
                    </a>
                </div>
                <!-- Or login divider -->
                <div class="flex flex-row w-full h-8 justify-between">
                    <!-- Line left -->
                    <div class="flex flex-col w-full h-full">
                        <div class="h-full w-full border-b border-slate-200"></div>
                        <div class="h-full w-full"></div>
                    </div>
                    <p class="text-xl text-slate-400 font-semibold w-full text-center">Or Login</p>
                    <!-- Line right -->
                    <div class="flex flex-col w-full h-full">
                        <div class="h-full w-full border-b border-slate-200"></div>
                        <div class="h-full w-full"></div>
                    </div>
                </div>
                <!-- Login form -->
                <form method="POST" action="{{ route('login') }}" class="w-full h-fit flex flex-col space-y-4 items-center">
                    @csrf
                    <!-- Username -->
                    <div class="flex flex-row w-1/4 py-2 px-4 space-x-4 rounded-xl ring-1 ring-slate-300 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        <input id="username" name="username" type="text" value="{{ old('username') }}" required placeholder="username"
                            class="w-full px-2 placeholder-slate-300 focus:placeholder-transparent text-slate-300 focus:border-transparent focus:ring-0 outline-0 border-0" />
                    </div>
                    <!-- Password -->
                    <div class="flex flex-row w-1/4 py-2 px-4 space-x-4 rounded-xl ring-1 ring-slate-300 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                        </svg>
                        <input id="password" name="password" type="password" value="{{ old('password') }}" required placeholder="password"
                            class="w-full px-2 placeholder-slate-300 focus:placeholder-transparent text-slate-300 focus:border-transparent focus:ring-0 outline-0 border-0" />
                    </div>
                    <!-- Forgot Password & Sign-in button -->
                    <div class="flex flex-row items-center justify-between w-1/4 space-x-2">
                        <a class="text-sm text-slate-400 hover:text-slate-500 underline" href="{{ route('password.request') }}">Forgot password?</a>
                        <button type="submit" class="text-white font-semibold px-4 py-2 bg-sky-400 rounded-lg">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
