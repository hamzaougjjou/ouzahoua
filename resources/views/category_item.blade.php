@extends('layouts.app')

@section('title', 'Magic Store | Home')

@section('content')

    <!-- Offered Products -->
    <section class="pb-16 pt-4 dark:bg-black">
        <div class="container mx-auto px-4">

            <section
                class="header sticky top-[85px] bg-white p-6 mb-10
            flex justify-between flex-wrap items-center z-30 gap-4 rtl
            ">

                <div class="rtl sm:w-auto w-full flex gap-2">
                    <a href="{{ route('home') }}" class="text-sm">الرئيسية</a>

                    @if ($parent_category)
                        <a class="text-sm">🡠</a>
                        <a href="{{ route('categories.show', $parent_category->slug) }}" class="text-sm">
                            {{ $parent_category->title }}
                        </a>
                    @endif

                    <a class="text-sm">🡠</a>
                    <a href="" class="text-sm text-blue-600">
                        {{ $category->title }}
                    </a>
                </div>



            </section>
            @if (count($products) == 0)
                <div class="flex items-center justify-center">
                    <div class="p-8 rounded-lg text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-400 mb-4 mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">عذراً، لم يتم العثور على منتجات</h1>
                        <p class="text-gray-600 mb-6">لم نتمكن من العثور على أي منتجات في هذه الفئة. يرجى المحاولة مرة أخرى
                            لاحقاً أو تصفح الفئات الأخرى.</p>
                        <a href="{{ route('products') }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                            العودة إلى المنتجات
                        </a>
                    </div>
                </div>
            @endif

            <section class="children_categories flex gap-6 mb-8 rtl">

                @if (count($children_categories) > 0)
                    @foreach ($children_categories as $category)
                        <a href="{{ route('categories.show', $category->slug) }}" class="px-6 py-2 rounded bg-[# F7F9F9]">
                            {{ $category->title }}
                        </a>
                    @endforeach
                @endif


            </section>


            <div class="tab-content" id="pills-tabContent">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 p-2">
                    @foreach ($products as $product)
                        <div
                            class="bg-white rounded-lg overflow-hidden shadow-lg max-w-sm
                    flex flex-col 
                    ">
                            <a href="/products/{{ $product->slug }}" class="block relative">
                                <img class="w-full object-cover h-[200px] bg-gray-200"
                                    src="https://images.unsplash.com/photo-1471943311424-646960669fbc?q=80&w=1287&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
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
                                د.م
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
            </div>
        </div>


        <div class="mt-[50px] mx-auto rtl">
            {{-- {{ $products->links('pagination::simple-tailwind') }} --}}
        </div>

    </section>


@endsection
