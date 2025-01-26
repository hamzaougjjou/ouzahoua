<section class="py-16 bg-white">
    <div class="mx-auto px-4">
        <h1 class="text-2xl font-bold text-blue-800 text-center">
            المنتجات المميزة
        </h1>
        <p class="text-center max-w-5xl p-4 mb-3 mx-auto">
            اكتشف مجموعة منتجاتنا المميزة التي تم اختيارها بعناية لتلبي جميع احتياجاتك! سواء كنت تبحث عن الجودة العالية،
            التصميم العصري، أو الوظائف المتعددة، ستجد هنا كل ما تحتاجه. تصفح تشكيلتنا الحصرية واستمتع بتجربة تسوق لا
            تُنسى.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 mx-auto w-full md:container">
            @foreach ($featured_products as $product_item)
                <!-- Product Card -->
                <div
                    class="group bg-green-50 relative cursor-pointer
                rounded-2xl overflow-hidden shadow-sm h-full p-1
                ">
                    <!-- Card Container -->
                    <a href="{{ route('products.show', $product_item->slug) }}"
                        class="flex flex-col w-full h-full transform transition-transform duration-300 ">
                        <!-- Image Container -->
                        <div class="relative h-80 flex-0 overflow-hidden">
                            <img src="{{ $product_item->thumbnail }}" alt="{{ $product_item->name }}"
                                class="w-full h-full bg-gray-200 object-cover transform transition-transform duration-500 group-hover:scale-105">
                            <!-- Quick Actions -->
                            <div
                                class="absolute top-4 right-4 z-20 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="bg-white p-2 rounded-full shadow-lg hover:bg-gray-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            <!-- Badge -->
                            <div
                                class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                منتج مميز
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="flex-1 w-full flex flex-col">
                            <h3 class="text-xl font-bold mb-2">
                                {{ $product_item->name }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-2 flex-1">
                                {{ $product_item->description }}
                            </p>

                            <section class="flex justify-between items-start mb-4">
                                <div class="flex items-center gap-1">
                                    <span class="text-sm font-medium">
                                        @php
                                            $review_avg = $product_item->reviews->avg('rating');
                                        @endphp
                                        {{ $review_avg ? number_format($review_avg, 1) : '5.0' }}
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>

                                    <span class="text-gray-400 text-sm">
                                        ({{ $product_item->reviews_count > 10 ? $product_item->reviews_count : '0' . $product_item->reviews_count }})
                                    </span>
                                </div>
                                <div class="text-right">
                                    <p class="rtl text-2xl font-bold">
                                        {{ $product_item->discount_price ?? $product_item->price }}
                                        {{ $store->abr_currency }}
                                    </p>
                                    <p class="rtl text-[10px] text-red-400 line-through">
                                        {{ $product_item->discount_price ? $product_item->price . $store->abr_currency : '' }}
                                    </p>
                                </div>
                            </section>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</section>
