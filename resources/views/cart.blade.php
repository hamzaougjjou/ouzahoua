@extends('layouts.app')

@section('title', 'Magic Store | Home')

@section('content')

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-8 text-right">سلة التسوق الخاصة بك</h1>

        <div class="flex flex-col md:flex-row-reverse gap-8 sm:gap-1 md:gap-1">
            <div class="md:w-3/4">
                <!-- عناصر السلة -->
                <div class="bg-white rounded-lg custom-scroll overflow-x-scroll p-6 mb-4 rtl">
                    <table class="w-full min-w-[400px]">
                        <thead>
                            <tr class="border-b">
                                <th class="text-right font-semibold">المنتج</th>
                                <th class="text-right font-semibold">الصورة</th>
                                <th class="text-right font-semibold">السعر</th>
                                <th class="text-right font-semibold">الكمية</th>
                                <th class="text-right font-semibold">المجموع</th>
                                <th class="text-right font-semibold">-</th>
                            </tr>
                        </thead>
                        <tbody id="cart-container">

                            <tr class="border-b hidden">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <span class="font-semibold ml-4">
                                            {{ ho_truncate_text('اسم المنتج 1', 10) }}
                                        </span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <img class="bg-gray-200 h-12 w-12 rounded-md" src="https://picsum.photos/536/354"
                                        alt="صورة المنتج" />
                                </td>
                                <td class="py-4">199.90 د.م.</td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                        </button>
                                        <span class="text-gray-700 mx-2">1</span>
                                        <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 12H4" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td class="py-4">199.90 د.م.</td>
                                <td class="py-4">
                                    <button
                                        class="flex items-center p-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors 
                                        duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50"
                                        onclick="removeFromCart(${product.id})" aria-label="Delete item">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ملخص الطلب -->
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-md px-6 pb-4 pt-2">
                    <h2 class="text-lg mb-4 text-right text-green-600 font-bold">ملخص الطلب</h2>
                    <div class="flex justify-between mb-2">
                        <span id="cart-sub-total">00</span>
                        <span>المجموع الفرعي</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>00 د.م.</span>
                        <span>الضرائب</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>{{ $shipping->price }} د.م.</span>
                        <span>الشحن</span>
                    </div>
                    <hr class="my-2" />
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">
                            <span id="cart-total"></span>
                            د.م
                        </span>
                        <span class="font-semibold">المجموع</span>
                    </div>
                    <a href="{{ route('checkout') }}"
                        class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        إتمام الشراء
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script>
        renderCart({{ $shipping->price }});
    </script>
@endsection
