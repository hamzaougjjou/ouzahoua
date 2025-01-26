<section id="offers" class="container mx-auto px-4 py-8 max-w-7xl">
    <!-- Header Section -->
    <div class="text-center mb-8">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">
            العروض والخصومات الحصرية
        </h1>
        <p class="text-lg text-gray-600">
            لا تفوت فرصة الحصول على أفضل الصفقات! تصفح قسم العروض والخصومات واستفد من تخفيضات كبيرة على مجموعة واسعة من
            المنتجات. سواء كنت تبحث عن تخفيضات على الأزياء، الإلكترونيات، أو الأدوات المنزلية، ستجد هنا
        </p>
    </div>

    <!-- Product Section -->
    <div class="grid md:grid-cols-2">

        <!-- Hero Image -->
        @if (count($offers) > 0)
            <div class="">
                <img src={{ $offers[0]['thumbnail'] }} alt="{{ $offers[0]['name'] }}"
                    class="w-full block max-h-[500px] object-cover rounded-l-lg h-screen border border-1 border-black/50">
            </div>
        @endif

        <!-- Product Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 h-full items-center {{  count($offers)>1 ? 'bg-[#E1E1E1]' : 'bg-white'}} px-3 rounded-r-lg py-2">
            @if (count($offers) > 1)
                <div class="bg-white rounded-lg shadow-md flex flex-col md:h-[90%] h-fit">
                    <img src={{ $offers[1]['thumbnail'] }} alt={{ $offers[1]['name'] }}
                        class="w-full h-52 object-cover rounded-md mb-4 bg-gray-100">
                    <div class="p-2 flex flex-col flex-1">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-lg">
                                {{ $offers[1]['name'] }}
                            </h3>
                            <p class="text-lg font-bold rtl">
                                {{ $offers[1]['discount_price'] ?? $offers[1]['price'] }}
                                {{ $store->abr_currency }}
                            </p>
                        </div>
                        <div class="flex-1 text-yellow-400 mb-4"
                            dir="{{ ho_get_text_direction(ho_truncate_text($offers[1]['description'], 120)) }}">
                            {{ ho_truncate_text($offers[1]['description'], 120) }}
                        </div>

                        <div class='flex justify-between items-center'>
                            <a href="{{ route('checkout', ['product' => $offers[1]['slug']]) }}"
                                class="mx-auto mt-auto bg-white border-2 border-rose-200 text-rose-500 hover:bg-black transition-colors
                                        duration-200 py-2 px-4 rounded-full inline-block text-center">
                                شراء الان
                            </a>
                            <button data-product="{{ $offers[1] }}"
                                class=" add-to-cart flex items-center justify-center mx-auto mt-auto bg-white border-2 border-rose-200 text-rose-500 hover:bg-black transition-colors
                                        duration-200 py-2 px-4 rounded-full text-center">
                                اضافة الى السلة
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if (count($offers) > 2)
                <div class="bg-white rounded-lg shadow-md flex flex-col md:h-[90%] h-fit">
                    <img src={{ $offers[2]['thumbnail'] }} alt={{ $offers[2]['name'] }}
                        class="w-full h-52 object-cover rounded-md mb-4 bg-gray-100">
                    <div class="p-2 flex flex-col flex-1">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-lg">
                                {{ $offers[2]['name'] }}
                            </h3>
                            <p class="text-lg font-bold rtl">
                                {{ $offers[2]['discount_price'] ?? $offers[2]['price'] }}
                                {{ $store->abr_currency }}
                            </p>
                        </div>
                        <div class="flex-1 text-yellow-400 mb-4"
                            dir="{{ ho_get_text_direction(ho_truncate_text($offers[2]['description'], 120)) }}">
                            {{ ho_truncate_text($offers[2]['description'], 120) }}
                        </div>

                        <div class='flex justify-between items-center'>
                            <a href="{{ route('checkout', ['product' => $offers[2]['slug']]) }}"
                                class="mx-auto mt-auto bg-white border-2 border-rose-200 text-rose-500 hover:bg-black transition-colors
                                        duration-200 py-2 px-4 rounded-full inline-block text-center">
                                شراء الان
                            </a>
                            <button data-product="{{ $offers[2] }}"
                                class=" add-to-cart flex items-center justify-center mx-auto mt-auto bg-white border-2 border-rose-200 text-rose-500 hover:bg-black transition-colors
                                        duration-200 py-2 px-4 rounded-full text-center">
                                اضافة الى السلة
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

</section>
