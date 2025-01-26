<section class="py-16 px-4">
    <div class="container mx-auto max-w-7xl">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-xl md:text-2xl font-serif mb-4">
                المنتجات الأكثر مبيعاً
            </h2>
            <p class="text-gray-600">
                اكتشف أفضل المنتجات التي اختارها عملاؤنا بعناية! تسوق الآن من مجموعة الأكثر مبيعاً واستمتع بجودة لا
                تُضاهى وتصاميم تناسب كل الأذواق.
            </p>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            @foreach ($best_selling_products as $item)
                <div class="bg-pink-50 rounded-lg overflow-hidden flex flex-col">
                    <a href="{{ route('products.show', $item->slug) }}" class="block p-1">
                        <img src="{{ $item->thumbnail }}" alt="{{ $item->name }}"
                            class="w-full h-64 bg-gray-50 object-cover">
                    </a>
                    <div class="p-6 flex flex-col flex-1">
                        <a href="{{ route('products.show', $item->slug) }}" class="flex-1">
                            <h3 class="text-2xl font-serif mb-4">{{ $item->name }}</h3>
                            <p class="text-gray-600 text-sm mb-2"
                                dir="{{ ho_get_text_direction(ho_truncate_text($item->description, 120)) }}">
                                {{ ho_truncate_text($item->description, 100) }}
                            </p>
                        </a>
                        <a href="{{ route('checkout', ['product' => $item->slug]) }}"
                            class="w-full inline-block border border-gray-900 text-gray-900 py-3 px-6 rounded-full hover:bg-gray-900
                             hover:text-white transition-colors duration-300 text-center">
                            شراء الان
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
