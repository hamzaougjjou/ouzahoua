<aside class="lg:w-64 bg-white p-1 lg:p-4 rounded-lg h-fit rtl sm:w-full md:w-full">
    <form action="" method='GET' class="flex lg:block flex-wrap">
        <!-- Search -->
        <div class="mb-6 w-full">
            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">بحث عن منتجات</label>
            <div class="relative">
                <input type="text" id="q" name="q" value="{{ request()->q ?? '' }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="ما الذي تبحث عنه ...">
                <button type="submit"
                    class="text-white bottom-2.5 bg-green-700 hover:bg-green-800 
                        focus:ring-4 focus:outline-none font-medium rounded-lg 
                        px-4 w-fit outline-none border-none absolute
                        top-[5px] left-2 h-8 md:hidden inline-block
                        ">
                    بحث
                </button>
            </div>

        </div>

        <!-- Rating -->
        <div class="mb-6 w-full hidden lg:block">
            <h3 class="text-sm font-medium text-gray-700 mb-2">التقييمات</h3>
            <div id="rating-filter" class="space-y-2 grid md:block grid-cols-2">

                @for ($i = 5; $i >= 1; $i--)
                    <label class="flex items-center gap-2">
                        <input type="radio" name="rating"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                            value="{{ $i }}">
                        <span class="ml-2 text-sm text-gray-600">
                            @for ($j = 1; $j <= 5; $j++)
                                @if ($j <= $i)
                                    <i class="fas fa-star text-yellow-400"></i> <!-- Filled star -->
                                @else
                                    <i class="far fa-star text-yellow-400"></i> <!-- Empty star -->
                                @endif
                            @endfor
                        </span>
                    </label>
                @endfor

            </div>
        </div>

        <!-- Categories -->
        <div class="w-full hidden lg:block">
            <h3 class="text-sm font-medium text-gray-700 mb-2">التصنيفات</h3>
            <ul class="mt-2 max-h-[300px] custom-scroll flex md:block overflow-y-auto" id="category-filter">
                @foreach ($global_categories as $category)
                    <li class="w-fit">
                        <label class="flex items-center my-2 gap-2 w-fit">
                            <input type="checkbox"
                                class="h-4 w-4 outline-none border-gray-400 ring-none rounded 
                        checked:border-none checked:outline-none checked:ring-none 
                        focus:border-none focus:outline-none focus:ring-none"
                                value={{ $category->title }}>
                            <span class="ml-2 text-sm text-gray-600">
                                {{ $category->title }}
                            </span>
                        </label>
                    </li>
                @endforeach
                <!-- Add more categories as needed -->
            </ul>

        </div>

        <div class="block md:block sm:hidden mt-2">
            <button type="submit"
                class="text-white bottom-2.5 bg-blue-700 hover:bg-blue-800 
                        focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg 
                        text-sm px-4 py-2 w-fit outline-none border-none
                        ">
                بحث
            </button>
        </div>
    </form>
</aside>
