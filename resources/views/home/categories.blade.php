<section class="min-h-[40vh] bg-[#EEE9E5] shadow-md">
    <section class="px-6 wrapper">


        <section class="flex p-8">

            <h2 class="flex-1 text-center text-3xl font-semibold">التصنيفات الشائعة</h2>

            <div class="flex-0 flex gap-6">

                <span id="left"
                    class='cursor-pointer
                    bg-blue-300 p-2 text-center rounded-full block
                    '>

                    <svg fill="#ffffff" height="35px" width="35px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 330 330" xml:space="preserve">
                        <path id="XMLID_92_"
                            d="M111.213,165.004L250.607,25.607c5.858-5.858,5.858-15.355,0-21.213c-5.858-5.858-15.355-5.858-21.213,0.001
                   l-150,150.004C76.58,157.211,75,161.026,75,165.004c0,3.979,1.581,7.794,4.394,10.607l150,149.996
                   C232.322,328.536,236.161,330,240,330s7.678-1.464,10.607-4.394c5.858-5.858,5.858-15.355,0-21.213L111.213,165.004z" />
                    </svg>
                </span>

                <span id="right"
                    class='cursor-pointer
                bg-blue-300 p-2 text-center rounded-full block
                '>
                    <svg fill="#ffffff" height="35px" width="35px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 330 330" xml:space="preserve">
                        <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                C255,161.018,253.42,157.202,250.606,154.389z" />
                    </svg>
                </span>

            </div>

        </section>

        <div class="carousel flex gap-6 overflow-hidden">


            @foreach ($categories as $category)
                <a
                href="/categories/{{ $category->slug }}"
                class="carousel-item select-none cursor-pointer active bg-cover bg-center rounded-lg h-[400px] min-w-[320px] flex items-end transition-all duration-400 shadow-lg"
                    style="background-image: url({{asset($category->image_path)}});">
                    <div
                        class="bg-gradient-to-t from-black via-transparent to-transparent w-full text-white p-4 h-full transform translate-y-[calc(100%-54px)] transition-all duration-400">
                        <h3 class="text-lg font-semibold select-none">
                            {{ $category->title }}    
                        </h3>
                    </div>
                </a>
            @endforeach



        </div>
    </section>
</section>


<script>
    const carousel = document.querySelector(".carousel"),
        arrowIcons = document.querySelectorAll(".wrapper span");

    let isDragStart = false,
        isDragging = false,
        prevPageX, prevScrollLeft, positionDiff;

    const showHideIcons = () => {
        // showing and hiding prev/next icon according to carousel scroll left value
        let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // getting max scrollable width
        arrowIcons[0].style.opacity = carousel.scrollLeft === scrollWidth ? "0.5" : "1";
        arrowIcons[1].style.opacity = carousel.scrollLeft === 0 ? "0.5" : "1";
    }

    arrowIcons.forEach(icon => {
        icon.addEventListener("click", () => {
            let firstImgWidth =
                350 //firstImg.clientWidth + 14; // getting first img width & adding 14 margin value
            // if clicked icon is left, reduce width value from the carousel scroll left else add to it
            carousel.scrollLeft += icon.id === "right" ? -firstImgWidth : firstImgWidth;
            setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
        });
    });

    const autoSlide = () => {
        // if there is no image left to scroll then return from here
        if (carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) > -1 || carousel.scrollLeft <= 0)
            return;

        positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
        let firstImgWidth = 450; //firstImg.clientWidth + 14;
        // getting difference value that needs to add or reduce from carousel left to take middle img center
        let valDifference = firstImgWidth - positionDiff;

        if (carousel.scrollLeft > prevScrollLeft) { // if user is scrolling to the right
            return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
        }
        // if user is scrolling to the left
        carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
    }

    const dragStart = (e) => {
        // updatating global variables value on mouse down event
        isDragStart = true;
        prevPageX = e.pageX || e.touches[0].pageX;
        prevScrollLeft = carousel.scrollLeft;
    }

    const dragging = (e) => {
        // scrolling images/carousel to left according to mouse pointer
        if (!isDragStart) return;
        e.preventDefault();
        isDragging = true;
        carousel.classList.add("dragging");
        positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
        carousel.scrollLeft = prevScrollLeft - positionDiff;
        showHideIcons();
    }

    const dragStop = () => {
        isDragStart = false;
        carousel.classList.remove("dragging");

        if (!isDragging) return;
        isDragging = false;
        autoSlide();
    }

    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("touchstart", dragStart);

    document.addEventListener("mousemove", dragging);
    carousel.addEventListener("touchmove", dragging);

    document.addEventListener("mouseup", dragStop);
    carousel.addEventListener("touchend", dragStop);
</script>
