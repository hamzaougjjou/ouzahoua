<div class="flex justify-center items-center" id="news-letter-container">
    <div class="p-2 rtl">
        <div
            class="flex flex-wrap items-center w-full max-w-5xl p-5 mx-auto text-left rounded lg:flex-nowrap md:p-8 dark:border-gray-700">
            <div class="flex-1 w-full mb-5 md:mb-0 md:pr-5 lg:pr-10 md:w-1/2 text-right">
                <h3 class="mb-4 text-2xl font-bold text-blue-600">اشترك في النشرة الإخبارية</h3>
                <p class="text-gray-500 dark:text-gray-400">
                    قدم بريدك الإلكتروني للحصول على إشعارات عبر البريد الإلكتروني عندما نطلق منتجات جديدة أو ننشر عروض
                    جديدة.
                </p>
            </div>
            <div class="w-full px-1 flex-0 md:w-auto lg:w-1/2">

                @if (session('newsletter_error'))
                    <p class="text-center text-red-800 italic font-bold py-2"> {{ session('newsletter_error') }} </p>
                @endif

                <!-- Error message for email -->
                @error('email')
                    <p class="text-center text-red-800 italic font-bold py-2">{{ $message }}</p>
                @enderror


                @if (session('newsletter_success'))
                    <p class="text-center text-green-500 font-bold py-2">أنت الآن مشترك في نشرتنا الإخبارية</p>
                @endif

                <form action="{{ route('newsletter.subscribe') }}" method="POST">
                    @csrf
                    <div class="flex flex-col sm:flex-row">
                        <input type="email" id="email" name="email" placeholder="أدخل بريدك الإلكتروني"
                            class="flex-1 px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md sm:mr-5 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            value="{{ old('email') }}" required />
                        <button type="submit"
                            class="w-full px-6 py-4 mt-5 text-white text-lg
                            bg-gray-900 rounded-md sm:mt-0 sm:w-auto
                            whitespace-nowrap">
                            اشتراك
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
