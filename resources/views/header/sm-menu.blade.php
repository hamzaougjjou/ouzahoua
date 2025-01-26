<!-- Menu Toggle Button (visible only on medium and small screens) -->
<button id="menuBtn" class="z-30 block md:hidden">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>

<!-- Overlay -->
<div id="menuOverlay"
    class="fixed inset-0 bg-black bg-opacity-50 z-40 transform scale-0 transition-transform duration-300 ease-in-out lg:hidden">
    <!-- Menu -->
    <div class="absolute right-0 top-0 h-screen w-full max-w-96 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out"
        id="menuPanel">
        <!-- Menu Header -->
        <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-xl font-bold">القائمة</h2>
            <button id="closeMenu" class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- Menu Content -->
        <nav class="p-4">

            <!-- Shipping Info -->
            <div class="mb-6 border-b pb-4">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.14 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" />
                    </svg>
                    <div class="text-sm">
                        <div>
                            توصيل مجاني في جميع المدن
                        </div>
                        <div>
                            عند الشراء بمبلغ اكثر من 500 درهم
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="space-y-4 border-b pb-4 mb-6">
                <ul class="gap-8 py-4">
                    <li class="font-semibold py-2 text-blue-500">
                        <a href="/" class="hover:text-gray-600">
                            <span class="hidden lg:inline">الصفحة</span>
                            الرئيسة
                        </a>
                    </li>
                    <li class="font-semibold py-2 text-blue-500">
                        <a href="/products" class="hover:text-gray-600">
                            منتجاتنا
                        </a>
                    </li>

                    <li class="font-semibold py-2 text-blue-500">
                        <span class="flex items-center gap-1 cursor-pointer hover:text-gray-600">
                            التصنيفات
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </span>
                        <!-- Dropdown Menu -->
                        <ul class="mt-2 max-h-[300px] custom-scroll overflow-y-auto bg-white px-4">
                            @foreach ($global_categories as $category)
                                <li>
                                    <a href="/categories/{{ $category->slug }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100 hover:text-gray-600">
                                        {{ $category->title }}
                                    </a>
                                </li>
                            @endforeach
                            <!-- Add more categories as needed -->
                        </ul>
                    </li>

                    <li class="font-semibold py-2 text-blue-500">
                        <a href="/contact" class="hover:text-gray-600">
                            تواصل معنا
                        </a>
                    </li>

                </ul>
            </div>

            <!-- User Account -->
            <div class="border-b pb-4 mb-6">
                @auth
                    <a href="/profile" class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>
                            حسابي الشخصي
                        </span>
                    </a>
                @else
                    <a href="/login" class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>
                            تسجيل الدخول
                        </span>
                    </a>
                @endauth

            </div>

        </nav>

    </div>
</div>

<script>
    const menuBtn = document.getElementById('menuBtn');
    const closeMenu = document.getElementById('closeMenu');
    const menuOverlay = document.getElementById('menuOverlay');
    const menuPanel = document.getElementById('menuPanel');

    function openMenu() {
        menuOverlay.classList.remove('scale-0');
        menuPanel.classList.remove('translate-x-full');
    }

    function closeMenuFunc() {
        menuOverlay.classList.add('scale-0');
        menuPanel.classList.add('translate-x-full');
    }

    menuBtn.addEventListener('click', openMenu);
    closeMenu.addEventListener('click', closeMenuFunc);
    menuOverlay.addEventListener('click', (e) => {
        if (e.target === menuOverlay) {
            closeMenuFunc();
        }
    });
</script>
