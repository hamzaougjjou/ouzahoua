<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@200;500;600;900&display=swap" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script> --}}

    <style>
        * {
            font-family: "Alexandria", sans-serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
            padding: 0;
            margin: 0;
        }

        body {
            background-color: #F2F7F2;
        }
    </style>

    <style>
        .neon-btn {
            display: inline-block;
            text-decoration: none;
            padding: 0.25em 1em;
            position: relative;
        }

        .neon-btn::before {
            pointer-events: none;
            content: "";
            position: absolute;
            top: 120%;
            left: 0;
            width: 100%;
            height: 100%;
            transform: perspective(1em) rotateX(40deg) scale(1, 0.35);
            filter: blur(1.2em) opacity(0.7);
        }

        .neon-btn::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            box-shadow: 0 0 2em 0.5em rgb(36, 138, 255);
            ;
            opacity: 0;
            z-index: -1;
            transition: opacity 100ms linear;
        }

        .neon-btn::before,
        .neon-btn:focus::before {
            opacity: 1;
        }

        .neon-btn::after,
        .neon-btn:focus::after {
            opacity: 1;
        }

        /* CLICK ON THE BUTTON TO SEE THE EFFECT */
        /* Inspired by KEVIN POWELL  */
    </style>

    <style>
        .clear {
            clear: both;
        }


        h2 {
            margin-bottom: 48px;
            padding-bottom: 16px;
            font-size: 20px;
            line-height: 28px;
            font-weight: 700;
            position: relative;
            text-transform: capitalize;
        }

        h3 {
            margin: 0 0 10px;
            font-size: 28px;
            line-height: 36px;
        }

        button {
            outline: none !important;
        }

        /******* Common Element CSS End *********/

        /* -------- title style ------- */
        .line-title {
            position: relative;
            width: 400px;
        }

        .line-title::before,
        .line-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            border-radius: 2px;
        }

        .line-title::before {
            width: 100%;
            background: #f2f2f2;
        }

        .line-title::after {
            width: 32px;
            background: #e73700;
        }

        /******* Middle section CSS Start ******/
        /* -------- Landing page ------- */
        .game-section {
            padding: 60px 50px;
        }

        .game-section .owl-stage {
            margin: 15px 0;
            display: flex;
            display: -webkit-flex;
        }

        .game-section .item {
            margin: 0 15px 60px;
            width: 320px;
            height: 400px;
            display: flex;
            display: -webkit-flex;
            align-items: flex-end;
            -webkit-align-items: flex-end;
            background: #343434 no-repeat center center / cover;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            transition: all 0.4s ease-in-out;
            -webkit-transition: all 0.4s ease-in-out;
            cursor: pointer;
        }

        .game-section .item.active {
            width: 500px;
            box-shadow: 12px 40px 40px rgba(0, 0, 0, 0.25);
            -webkit-box-shadow: 12px 40px 40px rgba(0, 0, 0, 0.25);
        }

        .game-section .item:after {
            content: "";
            display: block;
            position: absolute;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 1));
        }

        .game-section .item-desc {
            padding: 0 24px 12px;
            color: #fff;
            position: relative;
            z-index: 1;
            overflow: hidden;
            transform: translateY(calc(100% - 54px));
            -webkit-transform: translateY(calc(100% - 54px));
            transition: all 0.4s ease-in-out;
            -webkit-transition: all 0.4s ease-in-out;
        }

        .game-section .item.active .item-desc {
            transform: none;
            -webkit-transform: none;
        }

        .game-section .item-desc p {
            opacity: 0;
            -webkit-transform: translateY(32px);
            transform: translateY(32px);
            transition: all 0.4s ease-in-out 0.2s;
            -webkit-transition: all 0.4s ease-in-out 0.2s;
        }

        .game-section .item.active .item-desc p {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        .game-section .owl-theme.custom-carousel .owl-dots {
            margin-top: -20px;
            position: relative;
            z-index: 5;
        }

        /******** Middle section CSS End *******/

        /***** responsive css Start ******/

        @media (min-width: 992px) and (max-width: 1199px) {
            h2 {
                margin-bottom: 32px;
            }

            h3 {
                margin: 0 0 8px;
                font-size: 24px;
                line-height: 32px;
            }

            /* -------- Landing page ------- */
            .game-section {
                padding: 50px 30px;
            }

            .game-section .item {
                margin: 0 12px 60px;
                width: 260px;
                height: 360px;
            }

            .game-section .item.active {
                width: 400px;
            }

            .game-section .item-desc {
                transform: translateY(calc(100% - 46px));
                -webkit-transform: translateY(calc(100% - 46px));
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            h2 {
                margin-bottom: 32px;
            }

            h3 {
                margin: 0 0 8px;
                font-size: 24px;
                line-height: 32px;
            }

            .line-title {
                width: 330px;
            }

            /* -------- Landing page ------- */
            .game-section {
                padding: 50px 30px 40px;
            }

            .game-section .item {
                margin: 0 12px 60px;
                width: 240px;
                height: 330px;
            }

            .game-section .item.active {
                width: 360px;
            }

            .game-section .item-desc {
                transform: translateY(calc(100% - 42px));
                -webkit-transform: translateY(calc(100% - 42px));
            }
        }

        @media (max-width: 767px) {
            body {
                font-size: 14px;
            }

            h2 {
                margin-bottom: 20px;
            }

            h3 {
                margin: 0 0 8px;
                font-size: 19px;
                line-height: 24px;
            }

            .line-title {
                width: 250px;
            }

            /* -------- Landing page ------- */
            .game-section {
                padding: 30px 15px 20px;
            }

            .game-section .item {
                margin: 0 10px 40px;
                width: 200px;
                height: 280px;
            }

            .game-section .item.active {
                width: 270px;
                box-shadow: 6px 10px 10px rgba(0, 0, 0, 0.25);
                -webkit-box-shadow: 6px 10px 10px rgba(0, 0, 0, 0.25);
            }

            .game-section .item-desc {
                padding: 0 14px 5px;
                transform: translateY(calc(100% - 42px));
                -webkit-transform: translateY(calc(100% - 42px));
            }
        }
    </style>
</head>

<body class="bg-[#ffffff] min-h-[300vh]">

    <div
        class="hero-container  h-[60vh] bg-gradient-to-r from-[#91AEC0] to-[#E7C9CB] relative
            overflow-hidden top-0
            ">
        <header
            class="flex md:px-6 px-2 py-4 sm:justify-none justify-between top-0 z-50
            fixed top-0 left-0 w-full bg-gradient-to-b  from-[#7DA6DB] to-[#248aff] 
            bg-opacity-25
            ">


            <a href="{{ route('home') }}" class="flex sm:flex-1 md:flex-initial gap-4 items-center min-w-[150px] ">
                <img class="w-[55px] h-[55px]" src="{{ asset('./assets/logo_no_text.png') }}" alt="logo" />
                <p title="blog name" class="font-extrabold text-xl text-white">
                    <span class="font-extrabold text-main-200">M</span>agic
                    <span class="font-extrabold text-main-200">S</span>tore
                </p>
            </a>

            <nav class="md:flex hidden items-center justify-center static">
                <!-- Common navigation links -->
                <ul class="flex gap-[20px] items-center justify-between">
                    <li>
                        <a class="text-white" href="/">
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="/shop">
                            منتجات
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="/offers">
                            العروض
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="/about">
                            من نحن
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="/contact">
                            اتصل بنا
                        </a>
                    </li>
                </ul>
            </nav>

            <nav>
                <!-- Common navigation links -->
                <div class="flex gap-4 item-center">



                    @if (Route::has('login'))
                        @auth
                            <a class="block  border-r-2 min-w-[50px]" href="./profile">
                                <img class="w-[40px] bg-white h-[40px] rounded-full"
                                    src="{{ asset('./assets/person.png') }}" alt="avatar" />
                            </a>
                        @else
                            <button
                                class="flex rounded md:px-4 px-2
                    items-center justify-center
                    bg-white text-black gap-2
                    "
                                id="openLogin">

                                <svg fill="#000000" height="20px" width="20px" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 499.1 499.1" xml:space="preserve">
                                    <g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M0,249.6c0,9.5,7.7,17.2,17.2,17.2h327.6l-63.9,63.8c-6.7,6.7-6.7,17.6,0,24.3c3.3,3.3,7.7,5,12.1,5s8.8-1.7,12.1-5
                                                                                                                                                        l93.1-93.1c6.7-6.7,6.7-17.6,0-24.3l-93.1-93.1c-6.7-6.7-17.6-6.7-24.3,0c-6.7,6.7-6.7,17.6,0,24.3l63.8,63.8H17.2
                                                                                                                                                        C7.7,232.5,0,240.1,0,249.6z" />
                                                <path
                                                    d="M396.4,494.2c56.7,0,102.7-46.1,102.7-102.8V107.7C499.1,51,453,4.9,396.4,4.9H112.7C56,4.9,10,51,10,107.7V166
                                                                                                                                                        c0,9.5,7.7,17.1,17.1,17.1c9.5,0,17.2-7.7,17.2-17.1v-58.3c0-37.7,30.7-68.5,68.4-68.5h283.7c37.7,0,68.4,30.7,68.4,68.5v283.7
                                                                                                                                                        c0,37.7-30.7,68.5-68.4,68.5H112.7c-37.7,0-68.4-30.7-68.4-68.5v-57.6c0-9.5-7.7-17.2-17.2-17.2S10,324.3,10,333.8v57.6
                                                                                                                                                        c0,56.7,46.1,102.8,102.7,102.8H396.4L396.4,494.2z" />
                                            </g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                    </g>
                                </svg>

                                <span class="text-black md:block hidden">
                                    دخول
                                </span>
                            </button>
                        @endauth
                    @endif



                    <a class="flex rounded-full
                  items-center justify-center
                  bg-white w-[36px] h-[36px]"
                        href="./nofications">
                        <svg class="w-[30px] bg-white h-[30px] rounded-full" width="30px" height="30px"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 19.25C15 20.0456 14.6839 20.8087 14.1213 21.3713C13.5587 21.9339 12.7956 22.25 12 22.25C11.2044 22.25 10.4413 21.9339 9.87869 21.3713C9.31608 20.8087 9 20.0456 9 19.25"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M5.58096 18.25C5.09151 18.1461 4.65878 17.8626 4.36813 17.4553C4.07748 17.048 3.95005 16.5466 4.01098 16.05L5.01098 7.93998C5.2663 6.27263 6.11508 4.75352 7.40121 3.66215C8.68734 2.57077 10.3243 1.98054 12.011 1.99998V1.99998C13.6977 1.98054 15.3346 2.57077 16.6207 3.66215C17.9069 4.75352 18.7557 6.27263 19.011 7.93998L20.011 16.05C20.0723 16.5452 19.9462 17.0454 19.6576 17.4525C19.369 17.8595 18.9386 18.144 18.451 18.25C14.2186 19.2445 9.81332 19.2445 5.58096 18.25V18.25Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>


                </div>
            </nav>

        </header>


        <p direction="right"
            class="neon-btn
        absolue z-40
        w-full text-center
        text-9xl font-extrabold
        text-main-100 text-white
        absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
        ">
            Magic Store</p>


        <img src="{{ asset('assets/video_game_controller.png') }}"
            class="absolute bottom-[-120px] left-[-20px] rotate-[30deg]" alt="">

        <img src="{{ asset('assets/person_wearing_futuristic_virtual_reality_glasses.png') }}"
            class="absolute bottom-[-120px] right-[0px] z-50" alt="">


    </div>
    <section class="categories-container min-h-[40vh] bg-[#EEE9E5]"
        style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
        ">

        <section class="game-section">
            {{-- <h2 class="line-title">trending games</h2> --}}

            <div class="owl-carousel custom-carousel owl-theme flex overflow-hidden">
                <div class="item active"
                    style="background-image: url(https://www.yudiz.com/codepen/expandable-animated-card-slider/dota-2.jpg);">
                    <div class="item-desc">
                        <h3>Dota 2</h3>
                        <p>Dota 2 is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                            Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
                    </div>
                </div>
                <div class="item !min-w-[300px]"
                    style="background-image: url(https://www.yudiz.com/codepen/expandable-animated-card-slider/winter-3.jpg);">
                    <div class="item-desc">
                        <h3>The Witcher 3</h3>
                        <p>The Witcher 3 is a multiplayer online battle arena by Valve. The game is a sequel to Defense
                            of the Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft
                            III.</p>
                    </div>
                </div>
                <div class="item !min-w-[300px]"
                    style="background-image: url(https://www.yudiz.com/codepen/expandable-animated-card-slider/rdr-2.jpg);">
                    <div class="item-desc">
                        <h3>RDR 2</h3>
                        <p>RDR 2 is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                            Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
                    </div>
                </div>
                <div class="item !min-w-[300px]"
                    style="background-image: url(https://www.yudiz.com/codepen/expandable-animated-card-slider/pubg.jpg);">
                    <div class="item-desc">
                        <h3>PUBG Mobile</h3>
                        <p>PUBG 2 is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                            Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
                    </div>
                </div>
                <div class="item !min-w-[300px]"
                    style="background-image: url(https://www.yudiz.com/codepen/expandable-animated-card-slider/fortnite.jpg);">
                    <div class="item-desc">
                        <h3>Fortnite</h3>
                        <p>Battle royale where 100 players fight to be the last person standing. which was a
                            community-created mod
                            for Blizzard Entertainment's Warcraft III.</p>
                    </div>
                </div>
                <div class="item !min-w-[300px]"
                    style="background-image: url(https://www.yudiz.com/codepen/expandable-animated-card-slider/far-cry-5.jpg);">
                    <div class="item-desc">
                        <h3>Far Cry 5</h3>
                        <p>Far Cry 5 is a 2018 first-person shooter game developed by Ubisoft.
                            which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </section>





    <script>
        // Initialize the carousel
        const carousel = document.querySelector(".custom-carousel");
        const items = document.querySelectorAll(".custom-carousel .item");

        // Function to handle item click
        function handleItemClick(event) {
            items.forEach(item => {
                if (item !== event.currentTarget) {
                    item.classList.remove("active");
                }
            });
            event.currentTarget.classList.toggle("active");
        }

        // Event listener for when the DOM is fully loaded
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize the carousel (you may need to implement this manually or use a vanilla JS carousel library)
            // Example: new OwlCarousel(carousel, { autoWidth: true, loop: true });

            // Attach click event listener to each item
            items.forEach(item => {
                item.addEventListener("click", handleItemClick);
            });
        });
    </script>
</body>


</body>

</html>
