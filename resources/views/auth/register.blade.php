<x-guest-layout>
    <div class="flex flex-col w-full h-full justify-center items-center bg-slate-200">
        <form method="post" action="{{ route('register') }}"
            class="flex flex-col rounded-2xl w-1/2 h-full bg-white shadow-xl space-y-4 p-8 justify-between my-20">
            @csrf
            <!-- Header -->
            <div class="flex flex-row w-full">
                <p class="text-3xl text-slate-800 font-bold">Sign Up for {{ env('APP_NAME') }}</p>
            </div>
            @if ($errors->isNotEmpty())
                <div class="flex flex-row space-x-4 w-full bg-red-700 rounded-lg border border-red-400 p-2">
                    <p class="text-red-300 font-semibold">Error:</p>
                    {{ dump($errors) }}
                </div>
            @endif
            <!-- Body -->
            <div class="flex flex-col space-y-2 w-full">
                <!-- First Name, Last Name, and Username -->
                <div class="flex flex-row space-x-4">
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="first_name" class="text-md font-semibold">First Name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter your first name..."
                               class="w-full p-2 bg-slate-200 text-slate-700 rounded-md border-0 focus:placeholder-transparent" />
                    </div>
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="last_name" class="text-md font-semibold">Last Name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter your last name..."
                               class="w-full p-2 bg-slate-200 text-slate-700 rounded-md border-0 focus:placeholder-transparent" />
                    </div>
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="username" class="text-md font-semibold">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username..."
                               class="w-full p-2 bg-slate-200 text-slate-700 rounded-md border-0 focus:placeholder-transparent" />
                    </div>
                </div>
                <!-- Email, Gender, and Password -->
                <div class="flex flex-row space-x-4">
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="email" class="text-md font-semibold">Email</label>
                        <input type="text" id="email" name="email" placeholder="Enter your email..."
                               class="w-full p-2 bg-slate-200 text-slate-700 rounded-md border-0 focus:placeholder-transparent" />
                    </div>
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="gender" class="text-md font-semibold">Gender</label>
                        <select name="gender" class="w-full p-2 bg-slate-200 text-slate-700 rounded-md border-0">
                            <option disabled>Select one...</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="password" class="text-md font-semibold">Password</label>
                        <input type="password" id="first_name" name="password" placeholder="Enter your password..."
                               class="w-full py-2 px-2 bg-slate-200 text-slate-700 rounded-md border-0 focus:placeholder-transparent" />
                    </div>
                </div>
                <!-- Religion and Denomination -->
                <div class="flex flex-row space-x-4">
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="religion_id" class="text-md font-semibold">Religion</label>
                        <select name="religion_id" class="w-full p-2 bg-slate-200 text-slate-700 rounded-md border-0">
                            @forelse (App\Models\Religion::all() as $religion)
                                <option value="{{ $religion->getKey() }}">{{ $religion->name }}</option>
                            @empty
                                <option value="1">Christianity</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="denomination_id" class="text-md font-semibold">Denomination</label>
                        <select name="denomination_id" class="w-full p-2 bg-slate-200 text-slate-700 rounded-md border-0">
                            @forelse (App\Models\Denomination::all() as $denomination)
                                <option value="{{ $denomination->getKey() }}">{{ $denomination->name }}</option>
                            @empty
                                <option value="1">Non-Denominational</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="start_of_faith" class="text-md font-semibold">Start of Faith</label>
                        <input type="text" id="start_of_faith" name="start_of_faith" placeholder="Enter your the start of your faith..."
                               class="w-full py-2 px-2 bg-slate-200 text-slate-700 rounded-md border-0 focus:placeholder-transparent" />
                    </div>
                </div>
                <div class="flex flex-row space-x-4">
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="password_confirmation" class="text-md font-semibold">Password Confirmation</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter your password again..."
                               class="w-full py-2 px-2 bg-slate-200 text-slate-700 rounded-md border-0 focus:placeholder-transparent" />
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <div class="flex flex-row space-x-4 w-full">
                <button type="submit" class="rounded-md text-white font-semibold px-6 py-2 bg-sky-400 hover:bg-sky-500 transition">
                    <span>Create Account</span>
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
