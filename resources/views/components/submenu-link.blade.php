<a href="{{ $url }}" @class([
    'text-decoration-none transition rounded-md text-center py-2 hover:text-white',
    'hover:bg-sky-400' => !$active,
    'hover:bg-sky-500 bg-sky-400' => $active
])>{{ $slot }}</a>
