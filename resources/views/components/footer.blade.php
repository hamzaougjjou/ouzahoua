<footer class="bg-[#E5C3BB] px-6 py-12">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- معلومات الشركة -->
            <div class="space-y-4 rtl">
                <h2 class="text-2xl font-bold">
                    {{ $store->name }}</h2>
                <p class="text-gray-700">

                </p>
                <div class="flex gap-8">
                    <!-- Email Icon -->
                    <a href="mailto:{{ $store->email }}"
                        class="hover:opacity-80 border border-1 p-2 rounded-full border-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect width="20" height="16" x="2" y="4" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>
                    </a>
                    <!-- Facebook Icon -->
                    <a href="{{ $store->facebook }}"
                        class="hover:opacity-80 border border-1 p-2 rounded-full border-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                        </svg>
                    </a>
                    <!-- Instagram Icon -->
                    <a href="{{ $store->instagram }}"
                        class="hover:opacity-80 border border-1 p-2 rounded-full border-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- عمود الروابط 1 -->
            <div class="space-y-4 rtl">
                <a href="#" class="block hover:underline">الأسئلة الشائعة</a>
                <a href="#" class="block hover:underline">الأخبار</a>
                <a href="#" class="block hover:underline">التغطية الصحفية</a>
                <a href="#" class="block hover:underline">خدمات التصنيع</a>
            </div>

            <!-- عمود الروابط 2 -->
            <div class="space-y-4 rtl">
                <a href="#" class="block hover:underline">سياسة الخصوصية</a>
                <a href="#" class="block hover:underline">سياسة الإرجاع</a>
                <a href="#" class="block hover:underline">التوصيل</a>
                <a href="#" class="block hover:underline">أماكن بيع منتجاتنا</a>
                <a href="#" class="block hover:underline">انضم إلينا</a>
            </div>

            <!-- الاشتراك في النشرة الإخبارية -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold rtl">
                    النشرة الإخبارية ل
                    {{ $store->name }}
                </h3>
                @if (session('newsletter_success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <span class="block sm:inline">{{ session('newsletter_success') }}</span>
                        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                            onclick="this.parentElement.remove();">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M14.348 14.849a1 1 0 001.415-1.415l-4.243-4.243 4.243-4.243a1 1 0 00-1.415-1.415l-4.243 4.243-4.243-4.243a1 1 0 00-1.415 1.415l4.243 4.243-4.243 4.243a1 1 0 001.415 1.415l4.243-4.243z" />
                            </svg>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                            onclick="this.parentElement.remove();">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M14.348 14.849a1 1 0 001.415-1.415l-4.243-4.243 4.243-4.243a1 1 0 00-1.415-1.415l-4.243 4.243-4.243-4.243a1 1 0 00-1.415 1.415l4.243 4.243-4.243 4.243a1 1 0 001.415 1.415l4.243-4.243z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <form id="news-letter-container" action="{{ route('newsletter.store') }}" method="post" class="flex">
                    @csrf
                    <input type="email" name="email" placeholder="أدخل بريدك الإلكتروني"
                        class="flex-1 px-4 py-2 rounded-l-full border-0 focus:ring-2 focus:ring-gray-200">
                    <button type="submit" class="bg-white px-4 rounded-r-full hover:bg-gray-50">
                        <svg class="w-6 h-6 transform rotate-45" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- طرق الدفع -->
        <div class="mt-8 pt-8 border-t border-gray-700/20">
            <div class="flex flex-wrap justify-between items-center">
                <p class="text-sm rtl">
                    جميع الحقوق محفوظة © 2025
                    <a href="#" class="underline hover:no-underline">
                        {{ $store->name }}</a>.
                </p>
                <div class="flex items-center space-x-4">
                    <a target="_blank" href="https://ougjjou.com"
                        class="flex gap-1 items-center cursor-pointer">powered
                        by
                        <span class="text-blue-500 font-bold">ougjjou</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
