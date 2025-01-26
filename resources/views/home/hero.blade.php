<div class="relative mt-1 overflow-hidden bg-main-200 mx-[0px] min-h-[500px]">

    <!-- Slider Track -->
    <div class="flex transition-transform duration-500 ease-in-out" id="sliderTrack">
        <!-- Slide 1 -->
        <div class="min-w-full min-h-[500px] top-0 left-0 bg-blue-500 p-8 flex flex-col" dir="rtl">
            <h2 class="text-2xl font-bold mb-4">استثمر في نجاحك مع منتجات رقمية ترفع من كفاءة عملك!</h2>

            <div class="flex relative w-full flex-1">
                <p
                    class="text-gray-700 absolute mb-6 z-40 sm:w-[60%]
                leading-10 text-white bg-main-100 bg-opacity-50	 md:w-[50%] p-4">
                    سواء كنت مطورًا تبحث عن حلول تقنية مبتكرة أو
                    مصممًا بحاجة إلى قوالب
                    جاهزة،
                    لدينا مجموعة متنوعة من المنتجات الرقمية التي تضمن لك السرعة والجودة في كل مشروع.</p>
                <img src="{{ asset('assets/slider_1.png') }}"
                    class="
                left-6 absolute md:max-w-[500px] lg:top-[-50%] top-[-50%-150px]
                sm:max-w-[500px] lg:max-w-[700px]"
                    alt="">
            </div>

            <a href="/shop" class="bg-blue-700
            w-fit text-white py-2 px-4 rounded hover:bg-blue-600">اكتشف
                المزيد
            </a>
        </div>

        <!-- Slide 2 -->
        <div class="min-w-full min-h-[500px] top-0 left-0 bg-blue-500 p-8 flex flex-col" dir="rtl">
            <h2 class="text-2xl font-bold mb-4">كل الأدوات التي تحتاجها لتنمية أعمالك الرقمية بين يديك!</h2>
            <div class="flex relative w-full flex-1">
                <p
                    class="text-gray-700 absolute mb-6 z-40 sm:w-[60%]
                    leading-10 text-white bg-main-100 bg-opacity-50	 md:w-[50%] p-4">
                    لا داعي للبحث مطولاً، نحن نوفر لك كل ما تحتاجه في مكان واحد. احصل على
                    برمجيات
                    احترافية، إضافات متطورة، وتصميمات جاهزة لتسريع نجاحك الرقمي.
                </p>
                <img src="{{ asset('assets/slider_1.png') }}"
                    class="
                    left-6 absolute md:max-w-[500px] lg:top-[-50%] top-[-50%-150px]
                    sm:max-w-[500px] lg:max-w-[700px]"
                    alt="">
            </div>
            <a href="/shop" class="bg-green-600 w-fit text-white py-2 px-4 rounded hover:bg-green-500">تصفح المنتجات
            </a>
        </div>

        <!-- Slide 3 -->
        <div class="min-w-full min-h-[500px] top-0 left-0 bg-blue-500 p-8 flex flex-col" dir="rtl">
            <h2 class="text-2xl font-bold mb-4">خصومات حصرية على منتجاتنا الرقمية لفترة محدودة!</h2>
            <div class="flex relative w-full flex-1">
                <p
                    class="text-gray-700 absolute mb-6 z-40 sm:w-[60%]
                leading-10 text-white bg-main-100 bg-opacity-50	 md:w-[50%] p-4">
                    اغتنم الفرصة واحصل على أفضل المنتجات الرقمية بأسعار تنافسية. سواء كنت
                    بحاجة
                    إلى قوالب جاهزة أو برمجيات مخصصة، لدينا كل ما تحتاجه لتطوير أعمالك الرقمية.
                </p>
                <img src="{{ asset('assets/slider_1.png') }}"
                    class="
                left-6 absolute md:max-w-[500px] lg:top-[-50%] top-[-50%-150px]
                sm:max-w-[500px] lg:max-w-[700px]"
                    alt="">
            </div>
            <a href="/offers" class="bg-red-600 w-fit text-white py-2 px-4 rounded hover:bg-red-500">احصل على الخصم</a>
        </div>

    </div>

    <!-- Slider Controls -->
    <button id="prev"
        class="absolute left-0 top-1/2 transform -translate-y-1/2 text-white
         p-3 rounded-full
         text-6xl
         ">‹</button>
    <button id="next"
        class="absolute right-0 top-1/2 transform -translate-y-1/2 text-white
         p-3 rounded-full
         text-6xl
         ">›</button>
</div>










<script>
    const sliderTrack = document.getElementById('sliderTrack');
    const slides = document.querySelectorAll('.min-w-full');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');
    let currentIndex = 0;

    // Function to update the slider position
    function updateSliderPosition() {
        sliderTrack.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    // Function to go to the next slide
    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSliderPosition();
    }

    // Function to go to the previous slide
    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateSliderPosition();
    }

    // Set up automatic slide change every 5 seconds
    setInterval(nextSlide, 5000);

    // Event listeners for manual controls
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);

    // Update the slider position on window resize
    window.addEventListener('resize', updateSliderPosition);
</script>

