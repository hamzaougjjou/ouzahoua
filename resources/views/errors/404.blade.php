@extends('layouts.app')

@section('title', '404 - الصفحة غير موجودة')

@section('content')

    <!-- Offered Products -->
    <section class="flex items-center justify-center p-2">
        <div class="max-w-2xl w-full text-right">
            <div class="relative overflow-hidden bg-white rounded-md p-8">
                <div
                    class="absolute -top-20 -left-20 w-40 h-40 bg-gradient-to-br from-indigo-300 to-purple-300 rounded-full opacity-50">
                </div>
                <div
                    class="absolute -bottom-20 -right-20 w-40 h-40 bg-gradient-to-tl from-indigo-300 to-purple-300 rounded-full opacity-50">
                </div>

                <div class="relative z-10">
                    <h1
                        class="text-9xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-4">
                        404</h1>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">نأسف، الصفحة غير موجودة</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        الرابط المطلوب غير موجود.<br>
                        من فضلك حاول مرة أخرى أو تواصل مع الدعم الفني.
                    </p>
                    <a href="/"
                        class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-3 px-6 rounded-lg 
                                transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                        الذهاب للصفحة الرئيسية
                    </a>
                </div>
            </div>
        </div>
    </section>


@endsection
