<div class="relative mt-1 overflow-hidden mx-[0px] max-h-[700px]">

    <!-- Slider Track -->
    <div class="flex transition-transform duration-500 ease-in-out w-full bg-red-900" id="sliderTrack">
        @foreach ($sliders as $slider)
            {{-- slidder item --}}
            <div class="min-w-full hero-slider-item top-0 left-0 bg-blue-500 flex flex-col">

                <div class="max-h-[400px] md:max-h-[550px] relative
                    h-screen lg:max-h-[800px] bg-cover bg-center bg-no-repeat leading-5"
                    style="background-image: url('{{ $slider->background }}')">
                    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                    <div class="relative w-full z-10 mx-auto h-full flex items-center">
                        <div class="text-center px-4 sm:px-6 lg:px-8 w-full">
                            <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                                <span class="block text-yellow-400">
                                    {{ $slider->title }}
                                </span>
                            </h1>
                            <p
                                class="mt-3 max-w-md mx-auto text-base text-gray-300 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                                {{ $slider->subtitle }}
                            </p>
                            <div
                                class="mt-10 max-w-lg mx-auto gap-4 lg:gap-8 flex flex-wrap sm:gap-2 justify-center md:mt-8">
                                @if ($slider->button2_text)
                                    <div class="rounded-md shadow">
                                        <a href="{{ str_starts_with($slider->button2_link, 'http://') || str_starts_with($slider->button2_link, 'https://') ? $slider->button2_link : '/' . ltrim($slider->button2_link, '/') }}"
                                            class="flex items-center justify-center w-fit px-4 py-3 border border-transparent text-base 
                                            font-medium rounded-md text-black bg-slate-400 hover:bg-slate-500 md:py-4 md:text-lg">
                                            {{ $slider->button2_text }}
                                        </a>
                                    </div>
                                @endif


                                @if ($slider->button1_text)
                                    <div class="rounded-md shadow md:my-0">
                                        <a href="{{ str_starts_with($slider->button1_link, 'http://') || str_starts_with($slider->button1_link, 'https://') ? $slider->button1_link : '/' . ltrim($slider->button1_link, '/') }}"
                                            class="flex items-center justify-center w-fit px-4 py-3 border border-transparent
                                             text-base font-medium rounded-md text-black bg-yellow-400 hover:bg-yellow-500 md:py-4 md:text-lg">
                                            {{ $slider->button1_text }}
                                        </a>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    {{-- slidder item --}}
                </div>

            </div>
        @endforeach

    </div>


    @if (count($sliders) > 1)
        <!-- Slider Controls -->
        <button id="prev"
            class="absolute left-0  top-[40%] md:top-1/2 transform -translate-y-1/2 text-white
         p-3 rounded-full
         text-6xl
         ">‹</button>
        <button id="next"
            class="absolute right-0  top-[40%] md:top-1/2 transform -translate-y-1/2 text-white
         p-3 rounded-full
         text-6xl
         ">›</button>
    @endif

</div>








@if (count($sliders) > 1)
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
@endif
