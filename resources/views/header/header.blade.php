<header class="w-full rtl bg-white sticky top-0 z-50">
    <!-- Top bar -->
    <div class="bg-black text-white px-4 py-2 flex justify-between items-center text-sm">
        <div class="flex gap-4">
            <!-- Email Icon -->
            <a href="mailto:{{ $store->email }}" class="hover:opacity-80">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="16" x="2" y="4" rx="2" />
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                </svg>
            </a>
            <!-- Facebook Icon -->
            <a href="{{ $store->facebook }}" class="hover:opacity-80">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                </svg>
            </a>
            <!-- Instagram Icon -->
            <a href="{{ $store->instagram }}" class="hover:opacity-80">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                </svg>
            </a>
        </div>
        <div class="hidden md:block">
            توصيل سريع إلى جميع أنحاء المغرب
        </div>
    </div>

    <!-- Main header -->
    <div class="mx-auto px-4 py-4">

        <div class="flex items-center justify-between gap-4">

            @include('header.sm-menu')

            <a href="{{ route('home') }}" class="flex-shrink-0">
                <img src="{{ $store->logo }}" alt="" class="w-12 max-h-12" />
            </a>

            <form method="get" action="/products" class="hidden md:flex flex-grow max-w-xl relative">
                <input name="q" value="{{ request()->q }}" type="search" placeholder="بحث عن  منتج ..."
                    class="w-full px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-gray-200">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </form>

            <div class="flex items-center gap-4">
                <a href="/profile" class="hidden md:flex items-center gap-2 border-black rounded-3xl py-2 px-4 border">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    <span>حسابي</span>
                </a>

                @include('header.cart')
            </div>

        </div>
    </div>

    <!-- Navigation -->
    <nav class="border-y hidden md:block">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <ul class="flex items-center gap-8 py-4">
                    <li>
                        <a href="/" class="hover:text-gray-600">
                            <span class="hidden lg:inline">الصفحة</span>
                            الرئيسة
                        </a>
                    </li>
                    <li>
                        <a href="/products" class="hover:text-gray-600">
                            منتجاتنا
                        </a>
                    </li>

                    @include('header.categories')

                </ul>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    {{-- <div class="container mx-auto px-4 py-4">
        <div class="flex items-center gap-2 text-sm text-gray-500">
            <a href="/" class="hover:text-gray-700">
                الرئيسية
            </a>
        </div>
    </div> --}}
</header>
