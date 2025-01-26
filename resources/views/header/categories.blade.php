@php
    $has_categoies = $global_categories && count($global_categories) > 0;
@endphp

<li class="relatived group">
    <span
        class="flex items-center gap-1 {{ $has_categoies ? 'cursor-pointer' : 'cursor-not-allowed' }} hover:text-gray-600">
        التصنيفات

        @if ($has_categoies)
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m6 9 6 6 6-6" />
            </svg>
        @endif
    </span>
    <!-- Dropdown Menu -->
    @if ($has_categoies)
        <div
            class="absolute z-50 right-1/2 transform translate-x-1/2 top-32 hidden bg-gray-50 gap-3 overflow-x-auto
         rounded-md shadow-md group-hover:flex w-[calc(100vw-100px)] p-4 flex-wrap custom-scroll max-h-[50vh]">
            @foreach ($global_categories as $item)
                <a href="/categories/{{ $item->slug }}"
                    class="p-2 flex gap-2 rounded-md my-2 bg-white hover:bg-gray-150">
                    <img class="w-12 h-12 rounded-md bg-gray-200 object-cover" src="{{ $item->image_path }}"
                        alt="" srcset="">
                    <span class="block px-4 py-2 text-black hover:text-slate-900 font-bold">
                        {{ $item->title }}
                    </span>
                </a>
            @endforeach
        </div>
    @endif
</li>
