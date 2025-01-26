<div class="flex items-center justify-center overflow-hidden flex-1">

    <main class="relative z-10 w-full max-w-4xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-2">
            @foreach ($products as $product)
                <div
                    class="bg-white rounded-lg overflow-hidden shadow-lg max-w-sm
                flex flex-col 
                ">
                    <a href="/products/{{ $product->slug }}" class="block relative">
                        <img class="w-full object-cover h-[200px] bg-gray-200" src="{{ $product->thumbnail }}"
                            alt="{{ $product->name }}" />
                        {{-- src="{{ $product->thumbnail }}" alt="{{ $product->name }}" /> --}}
                        {{-- <div
                            class="absolute top-0 right-0 bg-red-500 text-white px-2 py-1 m-2 rounded-md text-sm font-medium">
                            SALE
                        </div> --}}
                    </a>
                    <a href="/products/{{ $product->slug }}" class="block p-2 flex-1">
                        <h3 class="text-lg font-medium mb-2" dir="{{ ho_get_text_direction($product->name) }}"
                            title="{{ $product->name }}">
                            {{ ho_truncate_text($product->name, 60) }}
                        </h3>
                        <p class="text-gray-600 text-sm" dir="{{ ho_get_text_direction($product->description) }}"
                            title="{{ $product->description }}">
                            {{ ho_truncate_text($product->description, 100) }}
                        </p>
                    </a>
                    <p class="font-bold text-lg rtl p-2">
                        {{ $product->discount_price ?? $product->price }}
                        {{ $store->abr_currency }}
                    </p>
                    <div class="pb-4 px-2 rtl">
                        <button data-product="{{ $product }}"
                            class="flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 
                        focus:outline-none transition-colors duration-200 rtl add-to-cart">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            اضافة الى السلة
                        </button>
                    </div>
                </div>
            @endforeach

        </div>
    </main>
</div>
