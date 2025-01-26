@extends('layouts.app')

@section('title', 'إنهاء الطلب | Magic Store')

@section('content')

    <div class="min-h-screen bg-gray-100 p-1 md:p-4  text-right" dir="rtl">
        <div class="mx-auto max-w-2xl bg-white rounded-lg shadow my-2 p-2 md:p-6">
            <div class="flex justify-between items-center mb-6">
                @if (Session::get('order_completed'))
                    <div class="p-1 md:p-4  mb-4 text-sm text-green-800 
                                    rounded-lg bg-green-50 w-full text-center"
                        role="alert">
                        <span class="font-blod block">لقد تم تأكيد طلبكم</span>
                    </div>
                    @if (Session::get('source') == 'cart')
                        <script>
                            JSON.parse(localStorage.removeItem('cart'));
                        </script>
                    @endif

                @endif

                @if ($message = Session::get('order_error'))
                    <div class="p-1 md:p-4  
                                    w-full text-center shadow-lg
                                    mb-4 text-sm text-red-800 rounded-lg bg-red-50"
                        role="alert">
                        <span class="font-blod block py-2">
                            فشل اتمام الطلب
                            (حاول مرة أخرى)
                        </span>
                    </div>
                @endif
            </div>

            <div class="bg-blue-50 rounded-lg p-1 md:p-4 mb-6 flex items-center justify-between">
                <h3 class="font-bold">مرحبا بك،
                    تأكيد الطلب
                </h3>

                <span class="text-blue-600 font-bold">
                    {{ $store->name }}
                </span>
            </div>

            @if (isset($product))
                <p class="text-sm text-gray-600">
                    <a href="/products/{{$product->slug}}">
                        {{ $product->name }}
                    </a>
                </p>
            @else
                <p class="text-sm text-gray-600">
                    <a href="{{ route('cart') }}">
                        سلة التسوق بك
                    </a>
                    / تأكيد الطلب
                </p>
            @endif

            <div class="mb-6 flex justify-between items-start">
                <h4 class="font-semibold">إجمالي الطلب</h4>
                <p class="text-2xl font-bold">
                    @if (isset($product))
                        <span>
                            {{ $product->discount_price ? $product->discount_price + $shipping->price : $product->price + $shipping->price }}
                            درهم
                        </span>
                    @else
                        <span>
                            <span id="payment_total">00</span>
                            درهم
                            <span class="text-[10px] text-red-600">شامل التوصيل</span>
                        </span>
                    @endif
                </p>
            </div>

            {{-- ................................................................................................. --}}
            <form class="block" action="{{ route('checkout.store') }}" method="post">
                @csrf
                <div class="mx-auto p-1 md:p-4  py-2">
                    <!-- Delivery Address -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">عنوان التوصيل</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-700 px-3 font-semibold italic">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <section>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mt-4 col-span-2 sm:col-span-2 md:col-span-1">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                        الاسم
                                        <span class="text-[10px] text-red-600">(*)</span>
                                    </label>
                                    <input type="text" id="name" 
                                    value="{{ request()->old('name', '') }}"
                                    name="name"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none">
                                </div>
                                <div class="mt-4 col-span-2 sm:col-span-2 md:col-span-1">
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                        رقم الهاتف

                                        <span class="text-[10px] text-red-600">(*)</span></label>
                                    <input type="text" id="phone" 
                                    value="{{ request()->old('phone', '') }}"
                                    name="phone"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none">
                                </div>
                                <div class="mt-4 col-span-2">
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">العنوان
                                        <span class="text-[10px] text-red-600">(*)</span>
                                    </label>
                                    <input type="text" id="address" 
                                    value="{{ request()->old('address', '') }}"
                                    name="address"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none">
                                </div>
                                <div class="mt-4 col-span-2">
                                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">المدينة
                                        <span class="text-[10px] text-red-600">(*)</span>
                                    </label>
                                    <input type="text" id="city" 
                                    value="{{ request()->old('city', '') }}"
                                    name="city"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none">
                                </div>
                                <div class="mt-4 col-span-2">
                                    <label for="remarks" class="block text-sm font-medium text-gray-700 mb-1">
                                        ملاحظات
                                    </label>
                                    <textarea type="text" id="remarks" 
                                    value="{{ request()->old('remarks', '') }}"
                                    name="remarks"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none"></textarea>
                                </div>
                                <input id="cart_field" type="hidden" name="cart" value="">
                                <input id="product" type="hidden" name="product" value="{{ request()->product }}">
                            </div>
                        </section>
                    </div>


                    <button type="submit"
                        class="w-full inline-block bg-blue-600 text-center text-white py-3 rounded font-semibold mb-4">
                        تأكيد الطلب
                    </button>
                </div>

            </form>
            {{-- ................................................................................................. --}}





            <div class="items-center justify-between text-sm text-gray-600">


                <!-- Payment Method -->
                <div>
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 ml-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="font-semibold">الدفع عند الاستلام</span>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 ml-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="text-sm">دفع آمن</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 ml-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <span class="text-sm">إرجاع سهل</span>
                    </div>
                </div>
                {{-- <span>تسوق إلكتروني آمن %100</span> --}}
            </div>
        </div>
    </div>
    <script src="{{ asset('js/payment.js') }}"></script>
    <script>
        calcTotal({{ $shipping->price }});
    </script>
@endsection
