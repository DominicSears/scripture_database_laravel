<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME', 'Laravel') }}</title>

        <!-- Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak] {
                display: none;
            }
        </style>
    </head>
    <body class="w-full h-screen">
        <div class="flex flex-row w-full h-full">
            <!-- Left -->
            <div class="flex flex-col justify-between items-center w-3/12 bg-sky-100 p-8 ">
                <!-- App Name -->
                <div class="flex flex-row justify-center items-center space-x-4 w-full">
                    <p class="text-2xl font-bold">{{ env('APP_NAME') }}</p>
                    <div class="w-10 h-10 rounded-full bg-gray-500"></div>
                </div>
                <!-- Scripture & Slogan -->
                <div class="w-full flex flex-col space-y-10 items-center justify-center">
                    <!-- Scripture -->
                    <div class="flex flex-row flex-wrap w-full justify-center">
                        <h1 class="text-4xl italic font-thin text-center">
                            "...be prepared in season and out of season"
                        </h1>
                        <h1 class="text-2xl font-bold">
                            - 2 Timothy 4:2
                        </h1>
                    </div>
                    <!-- Slogan -->
                    <p class="font-semibold italic text-4xl text-center text-slate-800">
                        <span>Study in season and be ready out of season</span>
                    </p>
                </div>
                <!-- Social & Links -->
                <div class="flex flex-col space-y-4 w-full">
                    <!-- Social -->
                    <div class="flex flex-row space-x-4 w-full justify-center items-center">
                        <!-- Twitter -->
                        <a href="https://twitter.com/dominicsears">
                            <svg version="1.1" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 248 204" style="enable-background:new 0 0 248 204;" xml:space="preserve">
                                <path d="M221.95,51.29c0.15,2.17,0.15,4.34,0.15,6.53c0,66.73-50.8,143.69-143.69,143.69v-0.04   C50.97,201.51,24.1,193.65,1,178.83c3.99,0.48,8,0.72,12.02,0.73c22.74,0.02,44.83-7.61,62.72-21.66   c-21.61-0.41-40.56-14.5-47.18-35.07c7.57,1.46,15.37,1.16,22.8-0.87C27.8,117.2,10.85,96.5,10.85,72.46c0-0.22,0-0.43,0-0.64   c7.02,3.91,14.88,6.08,22.92,6.32C11.58,63.31,4.74,33.79,18.14,10.71c25.64,31.55,63.47,50.73,104.08,52.76   c-4.07-17.54,1.49-35.92,14.61-48.25c20.34-19.12,52.33-18.14,71.45,2.19c11.31-2.23,22.15-6.38,32.07-12.26   c-3.77,11.69-11.66,21.62-22.2,27.93c10.01-1.18,19.79-3.86,29-7.95C240.37,35.29,231.83,44.14,221.95,51.29z"/>
                            </svg>
                        </a>
                        <!-- YouTube -->
                        <a href="https://www.youtube.com/channel/UCWv_Ig9CRrwrjEtr2P0TM3Q">
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 200 100">
                                <path d="m154 17.5c-1.82-6.73-7.07-12-13.8-13.8-9.04-3.49-96.6-5.2-122 0.1-6.73 1.82-12 7.07-13.8 13.8-4.08 17.9-4.39 56.6 0.1 74.9 1.82 6.73 7.07 12 13.8 13.8 17.9 4.12 103 4.7 122 0 6.73-1.82 12-7.07 13.8-13.8 4.35-19.5 4.66-55.8-0.1-75z" fill="currentColor"/>
                                <path d="m105 55-40.8-23.4v46.8z" fill="#fff"/>
                            </svg>
                        </a>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/dominicsears/">
                            <svg version="1.1" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path class="st0" d="M498.5,147c-1.2-26.6-5.5-44.8-11.6-60.7c-6.4-16.4-14.9-30.4-28.8-44.2s-27.8-22.5-44.2-28.8
                                            c-15.9-6.2-34.1-10.4-60.7-11.6c-26.7-1.2-35.2-1.5-103-1.5c-67.9,0-76.4,0.3-103,1.5s-44.8,5.5-60.7,11.6
                                            C70,19.7,56,28.2,42.2,42.1S19.7,69.9,13.4,86.3C7.3,102.2,3,120.4,1.8,147c-1.2,26.7-1.5,35.2-1.5,103c0,67.9,0.3,76.4,1.5,103
                                            c1.2,26.6,5.5,44.8,11.6,60.7c6.4,16.4,14.9,30.4,28.8,44.2C56,471.8,70,480.4,86.4,486.7c15.9,6.2,34.1,10.4,60.7,11.6
                                            c26.7,1.2,35.2,1.5,103,1.5c67.9,0,76.4-0.3,103-1.5c26.6-1.2,44.8-5.5,60.7-11.6c16.4-6.4,30.4-14.9,44.2-28.8
                                            s22.5-27.8,28.8-44.2c6.2-15.9,10.4-34.1,11.6-60.7c1.2-26.7,1.5-35.2,1.5-103S499.7,173.6,498.5,147z M453.6,351
                                            c-1.1,24.4-5.2,37.7-8.6,46.4c-4.5,11.6-10,20-18.8,28.8s-17.1,14.1-28.8,18.8c-8.8,3.4-22.1,7.5-46.4,8.6
                                            c-26.3,1.2-34.2,1.5-101,1.5s-74.7-0.3-101-1.5c-24.4-1.1-37.7-5.2-46.4-8.6c-11.6-4.5-20-10-28.8-18.8
                                            c-8.8-8.8-14.1-17.1-18.8-28.8c-3.4-8.8-7.5-22.1-8.6-46.4c-1.2-26.3-1.5-34.2-1.5-101s0.3-74.7,1.5-101
                                            c1.1-24.4,5.2-37.7,8.6-46.4c4.5-11.6,10-20,18.8-28.8c8.8-8.8,17.1-14.1,28.8-18.8c8.8-3.4,22.1-7.5,46.4-8.6
                                            c26.3-1.2,34.2-1.5,101-1.5s74.7,0.3,101,1.5c24.4,1.1,37.7,5.2,46.4,8.6c11.6,4.5,20,10,28.8,18.8s14.1,17.1,18.8,28.8
                                            c3.4,8.8,7.5,22.1,8.6,46.4c1.2,26.3,1.5,34.2,1.5,101S454.7,324.7,453.6,351z"/>
                                        <path class="st1" d="M250,121.6c-71,0-128.4,57.5-128.4,128.4c0,71,57.5,128.4,128.4,128.4S378.4,320.8,378.4,250
                                            C378.4,179,321,121.6,250,121.6z M250,333.3c-46,0-83.3-37.3-83.3-83.3s37.3-83.3,83.3-83.3s83.3,37.3,83.3,83.3
                                            S296,333.3,250,333.3z"/>
                                        <circle class="st2" cx="383.4" cy="116.6" r="30"/>
                                    </g>
                                    <path class="st3" d="M0,250c0,67.9,0.3,76.4,1.5,103c1.2,26.6,5.5,44.8,11.6,60.7c6.4,16.4,14.9,30.4,28.8,44.2
                                        c13.8,13.8,27.8,22.5,44.2,28.8c15.9,6.2,34.1,10.4,60.7,11.6c26.7,1.2,35.2,1.5,103,1.5c67.9,0,76.4-0.3,103-1.5
                                        c26.6-1.2,44.8-5.5,60.7-11.6c16.4-6.4,30.4-14.9,44.2-28.8c13.8-13.8,22.5-27.8,28.8-44.2c6.2-15.9,10.4-34.1,11.6-60.7
                                        c1.2-26.7,1.5-35.2,1.5-103c0-67.9-0.3-76.4-1.5-103s-5.5-44.8-11.6-60.7c-6.4-16.4-14.9-30.4-28.8-44.2
                                        C444,28.2,430,19.6,413.6,13.3c-15.9-6.2-34.1-10.4-60.7-11.6c-26.7-1.2-35.2-1.5-103-1.5c-67.9,0-76.4,0.3-103,1.5
                                        s-44.8,5.5-60.7,11.6c-16.4,6.4-30.4,14.9-44.2,28.8S19.5,69.9,13.2,86.3C7,102.2,2.7,120.4,1.5,147C0.3,173.6,0,182.1,0,250z
                                        M45.1,250c0-66.7,0.3-74.7,1.5-101c1.1-24.4,5.2-37.7,8.6-46.4c4.5-11.6,10-20,18.8-28.8s17.1-14.1,28.8-18.8
                                        c8.8-3.4,22.1-7.5,46.4-8.6c26.3-1.2,34.2-1.5,101-1.5s74.7,0.3,101,1.5c24.4,1.1,37.7,5.2,46.4,8.6c11.6,4.5,20,10,28.8,18.8
                                        c8.8,8.8,14.1,17.1,18.8,28.8c3.4,8.8,7.5,22.1,8.6,46.4c1.2,26.3,1.5,34.2,1.5,101s-0.3,74.7-1.5,101c-1.1,24.4-5.2,37.7-8.6,46.4
                                        c-4.5,11.6-10,20-18.8,28.8c-8.8,8.8-17.1,14.1-28.8,18.8c-8.8,3.4-22.1,7.5-46.4,8.6c-26.3,1.2-34.2,1.5-101,1.5
                                        s-74.7-0.3-101-1.5c-24.4-1.1-37.7-5.2-46.4-8.6c-11.6-4.5-20-10-28.8-18.8c-8.8-8.8-14.1-17.1-18.8-28.8
                                        c-3.4-8.8-7.5-22.1-8.6-46.4C45.3,324.7,45.1,316.7,45.1,250z"/>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <!-- Links -->
                    <div class="flex flex-row space-x-4 flex-wrap w-full justify-center">
                        <a class="text-slate-500 hover:text-slate-600 hover:underline" href="https://github.com/DominicSears/scripture_database_laravel">GitHub Project</a>
                        <!--<span> | </span>-->
                    </div>
                </div>
            </div>
            <!-- Right -->
            <div class="flex flex-col w-9/12 h-screen overflow-y-auto">
                <div class="flex flex-col w-full h-full">
                    <!-- Sign up -->
                    <div class="flex flex-col w-full items-center h-full justify-center">
                        <p class="text-lg text-slate-600 font-semibold mb-4">Sign Up for {{ config('app.name') }}</p>
                        <a href="{{ route('register') }}" class="px-4 py-2 ring-1 ring-slate-300 hover:bg-slate-100 text-slate-500 hover:text-slate-600 rounded-lg w-1/4 text-center">
                            <span>Sign Up</span>
                        </a>
                    </div>
                    <!-- Or login divider -->
                    <div class="flex flex-row w-full h-1/16 justify-between">
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
                    <form method="POST" action="{{ route('login') }}" class="w-full h-full flex flex-col space-y-4 items-center justify-center">
                        @csrf

                        @if ($errors->any())
                            <div class="flex flex-col space-y-2 w-1/4 text-center">
                                <p class="text-md text-red-500">Username or password is incorrect</p>
                            </div>
                        @endif

                        <!-- Username -->
                        <div @class([
                            'flex flex-row w-1/4 py-2 px-4 space-x-4 rounded-xl ring-1 items-center text-slate-400',
                            'ring-red-500 placeholder-red-500' => $errors->any(),
                            'ring-slate-300 text-slate-400 placeholder-slate-400' => ! $errors->any()
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            <input id="username" name="username" type="text" value="{{ old('username') }}" required placeholder="username"
                                class="w-full px-2 focus:placeholder-transparent focus:border-transparent focus:ring-0 outline-0 border-0" />
                        </div>
                        <!-- Password -->
                        <div @class([
                            'flex flex-row w-1/4 py-2 px-4 space-x-4 rounded-xl ring-1 items-center text-slate-400',
                            'ring-red-500 placeholder-red-500' => $errors->any(),
                            'ring-slate-300 text-slate-400 placeholder-slate-400' => ! $errors->any()
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                            </svg>
                            <input id="password" name="password" type="password" value="{{ old('password') }}" required placeholder="password"
                                class="w-full px-2 focus:placeholder-transparent focus:border-transparent focus:ring-0 outline-0 border-0" />
                        </div>
                        <!-- Forgot Password & Sign-in button -->
                        <div class="flex flex-row items-center justify-between w-1/4 space-x-2">
                            <a class="text-sm text-slate-400 hover:text-slate-500 underline" href="{{ route('password.request') }}">Forgot password?</a>
                            <button type="submit" class="text-white font-semibold px-4 py-2 bg-sky-400 rounded-lg">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
