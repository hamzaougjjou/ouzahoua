@extends('layouts.app')

@section('title', 'إنهاء الطلب | Magic Store')

@section('content')

<div class="min-h-screen bg-gray-100 p-4 text-right" dir="rtl">
    <div class="mx-auto max-w-2xl bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            @if (Session::get('success') || Session::get('order_completed'))
                <div class="p-4 mb-4 text-sm text-green-800 
                                    rounded-lg bg-green-50 w-full text-center" role="alert">
                    <span class="font-blod block">لقد تم تأكيد طلبكم</span>
                    <p>
                        ستتوصل بجميع الطبيا عبر البريد الالكتروني و ستجدها ايضا في حسابك الشخصي
                    </p>
                </div>

                <script>
                    JSON.parse(localStorage.removeItem('cart'));
                </script>
            @endif

            @if ($message = Session::get('error'))
                <div class="p-4 
                                    w-full text-center shadow-lg
                                    mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <span class="font-blod block py-2">
                        فشل اتمام الطلب
                        (حاول مرة أخرى)
                    </span>
                    <p>
                        فشل طلبكم تأكد من توفر الرصيد الكافي في حسابك او جرب طريقة دفع اخرى
                    </p>
                </div>
            @endif
        </div>

        <div class="bg-blue-50 rounded-lg p-4 mb-6 flex items-center justify-between">
            <div>
                <h3 class="font-bold">مرحبا بك،

                    <span>
                        @auth
                            {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}
                        @else
                            قبل اتمام الطلب يجب
                            <a 
                            class="text-blue-500 font-bold px-1 !underline"
                            href="{{ route('login', ['next' => "payment"]) }}">
                                تسجيل الدخول
                            </a>
                        @endauth
                    </span>
                </h3>
                <p class="text-sm text-gray-600">
                    <a href="{{ route('cart') }}">
                        سلة التسوق بك
                    </a>
                    / إنهاء الطلب
                </p>
            </div>
            <div class="bg-white p-2 rounded">
                <span class="text-blue-600 font-bold">Magic Store</span>
            </div>
        </div>

        <div class="mb-6">
            <h4 class="font-semibold mb-2">إجمالي الطلب</h4>
            <p class="text-2xl font-bold py-3">
                @if(isset($product))
                    <span>
                        {{$product->discount_price ? $product->discount_price : $product->price}}
                    </span>
                @else
                    <span id="payment_total">00</span>
                @endif
                ريال
            </p>
            <p class="text-sm text-red-600">شامل الضريبة</p>
        </div>

        {{-- <div class="mb-6">
            <div class="flex items-center border rounded">
                <input type="text" placeholder="أدخل رمز الكوبون" class="flex-grow p-2 outline-none" />
                <button class="bg-blue-600 text-white px-4 py-2 rounded-r">تطبيق</button>
            </div>
        </div> --}}

        <div class="mb-6">
            {{-- <button class="flex items-center justify-between w-full bg-gray-100 p-2 rounded">
                <span>تفاصيل الفاتورة</span>
                <span class="h-5 w-5"></span>
            </button> --}}
        </div>

        <div class="mb-6">
            <h4 class="font-semibold mb-2 flex items-center">
                طريقة الدفع
                <span class="bg-blue-600 text-white rounded-full
                        w-6 h-6 flex items-center justify-center text-xs mr-2">3</span>
            </h4>

            <div class="flex space-x-2 space-x-reverse">
                <button class="border rounded p-2 flex-1">
                    <img src="{{ asset('assets/payments/paypal.svg') }}" alt="PayPal" class="h-8 mx-auto" />
                </button>
                <button class="border rounded p-2 flex-1 flex gap-1">
                    <img src="{{ asset('assets/payments/visa.svg') }}" alt="Visa" class="h-10 mx-auto" />

                    <img src="{{ asset('assets/payments/mastercard.svg') }}" alt="mastercard" class="h-10 mx-auto" />

                </button>
                <button class="border
                    rounded p-2 flex-1">
                    <img src="{{ asset('assets/payments/google_pay.svg') }}" alt="google pay" class="h-10 mx-auto" />
                </button>

                <button class="border 
                    border-blue-600
                    rounded p-2 flex-1">
                    <img src="{{ asset('assets/payments/stc.svg') }}" alt="google pay" class="h-10 mx-auto" />
                </button>

            </div>
        </div>

        <div class="mb-6">
            {{-- <div class="flex items-center border rounded">
                <span class="bg-gray-100 p-2 border-l">
                    <img src="https://g-zuubtilvyck.vusercontent.net/placeholder.svg" alt="SA Flag" class="h-6 w-8" />
                </span>
                <input type="tel" placeholder="051 234 5678" class="flex-grow p-2 outline-none" />
            </div> --}}
        </div>

        <form class="block" action="{{ route('paypal') }}" method="post">
            @csrf
            <input id="cart_field" type="hidden" name="cart" value="">
            <button type="submit"
                class="w-full inline-block bg-blue-600 text-center text-white py-3 rounded font-semibold mb-4">
                إكمال الدفع باستخدام PayPal
            </button>
        </form>


        {{-- ==========================start STRIPE PAYMENT ========================= --}}
        <div class='col-md-12 hidden'>
            @include('components.stripe')
        </div>

        {{-- ==========================start STRIPE PAYMENT ========================= --}}

        {{-- ==========================start GOOGLE PAY PAYMENT ========================= --}}
        <div class='col-md-12 hidden'>
            @include('components.google-pay')
        </div>

        {{-- ==========================start GOOGLE PAY PAYMENT ========================= --}}

        {{-- ==========================start GOOGLE PAY PAYMENT ========================= --}}
        <div class='col-md-12 hidden'>
            @include('components.stc-pay')
        </div>

        {{-- ==========================start GOOGLE PAY PAYMENT ========================= --}}


        <div class="flex items-center justify-between text-sm text-gray-600">
            <span>تسوق إلكتروني آمن %100</span>
            <div class="flex items-center space-x-2 space-x-reverse">
                <img src="https://g-zuubtilvyck.vusercontent.net/placeholder.svg" alt="Icon 1" class="h-6 w-6" />
                <img src="https://g-zuubtilvyck.vusercontent.net/placeholder.svg" alt="Icon 2" class="h-6 w-6" />
                <img src="https://g-zuubtilvyck.vusercontent.net/placeholder.svg" alt="Icon 3" class="h-6 w-6" />
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/payment.js') }}"></script>
@endsection