<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ asset('/assets/logo.png') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@200;500;600;900&display=swap" rel="stylesheet">
    <title>@yield('title', 'Magic Store | Home')</title>

    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- <link rel="stylesheet" href="{{ asset('build/assets/app-CM21fLVZ.css') }}"> -->

    <!-- Include any CSS files here -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/validate_email.js') }}"></script>



    <style>
        * {
            font-family: "Alexandria", sans-serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
            padding: 0;
            margin: 0;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        body {
            background-color: #F2F7F2;
        }

        .rtl {
            direction: rtl;
        }
    </style>

</head>

<body>


    <div id="cart-pop-up"></div>


    <div id="loginPopup"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto
        h-full w-full flex items-center justify-center hidden z-50"
        style="z-index: 9999;">
        <!-- Include login content -->
        @include('login')
    </div>

    @if (session('register_success'))
        <div class="fixed bg-[#00A5E0] overflow-y-auto px-3 py-2
        min-h-[150px] w-[300px] shadow-2xl
        bottom-[50px] left-10 rounded"
            style="z-index: 999999;" id="email_validation_pop_up">


            <p class="text-white rtl">
                ثم انشاء حسابك بنجاح
            </p>
            <p class="text-white text-sm font-thin rtl">
                تم ارسال رمز تأكيد الحساب الى البريد الالكتروني


            </p>

            <div class="flex item-center justify-center my-4">
                <input type="number"
                    class="border-none rounded text-center
                text-lg  w-[220px]
                "
                    max="999999" min="0" id="register_verify_code_input" placeholder="ادخل الرمز هنا"
                    name="verification_code">

                @auth
                    <input id="register_verification_email" type="hidden" value="{{ auth()->user()->email }}"
                        name="email" />
                @endauth
            </div>
            <div class="flex justify-between">
                <button type="submit"
                    class="inline-flex justify-center rounded bg-green-500 px-3 py-2.5
                text-sm font-medium text-white shadow-sm shadow-indigo-950/10 hover:bg-green-600 focus:outline-none
                outline-none focus-visible:ring
                transition-colors duration-150"
                    id="reg_btn_virify_email">
                    تأكيد الحساب
                </button>
                <button onclick="document.getElementById('email_validation_pop_up').style.display='none';"
                    type="submit"
                    class="inline-flex justify-center rounded bg-red-500 px-3 py-2.5
                text-sm font-medium text-white shadow-sm shadow-indigo-950/10 hover:bg-red-600 focus:outline-none
                outline-none focus-visible:ring
                transition-colors duration-150">
                    اغلاق
                </button>
            </div>

        </div>

        <script>
            register_verify_code_input = document.getElementById('register_verify_code_input');
            register_verify_code_input.oninput = function() {
                if (this.value.length > 6) {
                    this.value = this.value.slice(0, 6);
                }
            }
            register_verify_code_input.onfocus = function() {
                register_verify_code_input.classList.add("tracking-[1.1em]");
                register_verify_code_input.placeholder = ""
            }
            register_verify_code_input.onblur = function() {
                if (this.value.length === 0)
                    register_verify_code_input.classList.remove("tracking-[1.1em]");
                register_verify_code_input.placeholder = "ادخل الرمز هنا";
            }


            const reg_btn_virify_email = document.getElementById("reg_btn_virify_email");


            reg_btn_virify_email.addEventListener("click", () => {

                const register_verify_code_input = document.getElementById("register_verify_code_input");
                const register_verification_email = document.getElementById("register_verification_email");
                const old_text = reg_btn_virify_email.innerText;
                reg_btn_virify_email.innerHTML = "Loading ";

                console.log(register_verification_email);

                // Call the verifyEmail function
                verifyEmail(
                    register_verification_email.value.trim(), register_verify_code_input.value.trim(), old_text
                );
            });
        </script>
    @endif

    <!-- Navigation Bar -->
    <header
        class="flex md:px-6 px-2 py-4 sm:justify-none justify-between bg-[#ffffff] sticky top-0 z-40
            shadow-md max-h-[100px]
            ">

        <a href="{{ route('home') }}" class="flex sm:flex-1 md:flex-initial gap-4 items-center min-w-[150px] ">
            <img class="w-[55px] h-[55px]" src="{{ asset('./assets/logo_no_text.png') }}" alt="logo" />
            <p title="blog name" class="font-extrabold text-xl text-main-100">
                <span class="font-extrabold text-main-200">M</span>agic
                <span class="font-extrabold text-main-200">S</span>tore
            </p>
        </a>

        <nav class="md:flex hidden items-center justify-center static">
            <!-- Common navigation links -->
            <ul class="flex gap-[20px] items-center justify-between">
                <li>
                    <a href="/">
                        الرئيسية
                    </a>
                </li>
                <li>
                    <a href="/shop">
                        منتجات
                    </a>
                </li>
                <li>
                    <a href="/offers">
                        العروض
                    </a>
                </li>
                <li>
                    <a href="/about">
                        من نحن
                    </a>
                </li>
                <li>
                    <a href="/contact">
                        اتصل بنا
                    </a>
                </li>
            </ul>
        </nav>

        <div class="text-center md:hidden block w-full">
            <span class="text-6xl cursor-pointer" onclick="openNav()">&#9776;</span>
        </div>

        @include('components.sm-menu')

        <!-- Common navigation links -->
        <nav class="flex gap-6 item-center">



            @if (Route::has('login'))
                @auth

                    <div
                        class="relative group min-h-[150px]
                            min-w-[150px] z-50
                            ">
                        <!-- Profile Icon (Avatar) -->
                        <p class="block  border-r-2 min-w-[50px]
                                    border rounded-full p-2 -mt-1
                                    absolute right-0
                                    cursor-pointer  
                                        "
                            href="./profile">

                            <svg height="30px" width="30px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 333.815 333.815" xml:space="preserve">
                                <g id="XMLID_1400_">
                                    <g id="XMLID_1401_">
                                        <g id="XMLID_1402_">
                                            <path id="XMLID_1403_" style="fill:#F3D8B6;"
                                                d="M250.097,238.262c-18.667-6.681-51.458-11.736-51.458-81.376h-29.23h-5.002
                                                                                                                                                                                                                h-29.23c0,69.64-32.791,74.695-51.458,81.376c0,47.368,68.832,48.824,80.688,53.239v1.537c0,0,0.922-0.188,2.501-0.68
                                                                                                                                                                                                                c1.579,0.492,2.501,0.68,2.501,0.68v-1.537C181.265,287.086,250.097,285.63,250.097,238.262z" />
                                        </g>
                                        <path id="XMLID_1404_" style="fill:#EEC8A2;"
                                            d="M198.639,156.886h-29.23h-2.834v135.573c0.11-0.033,0.216-0.064,0.333-0.101
                                                                                                                                                                                                            c1.579,0.492,2.501,0.68,2.501,0.68V291.5c11.856-4.414,80.688-5.871,80.688-53.238
                                                                                                                                                                                                            C231.43,231.581,198.639,226.526,198.639,156.886z" />
                                    </g>
                                    <g id="XMLID_1405_">

                                        <ellipse id="XMLID_65_"
                                            transform="matrix(0.3543 -0.9351 0.9351 0.3543 41.877 286.6909)"
                                            style="fill:#EDCEAE;" cx="228.54" cy="113.021" rx="17.187"
                                            ry="10.048" />

                                        <ellipse id="XMLID_64_"
                                            transform="matrix(0.3543 0.9351 -0.9351 0.3543 172.9698 -24.4475)"
                                            style="fill:#F3DBC4;" cx="104.188" cy="113.029" rx="17.187"
                                            ry="10.048" />
                                    </g>
                                    <g id="XMLID_1406_">
                                        <g id="XMLID_1407_">
                                            <path id="XMLID_1408_" style="fill:#F3DBC4;"
                                                d="M166.91,180.733c-27.454,0-48.409-23.119-57.799-40.456
                                                                                                                                                                                                                s-15.888-79.445,4.34-106.897c19.808-26.883,53.459-13.838,53.459-13.838s33.649-13.045,53.458,13.838
                                                                                                                                                                                                                c20.226,27.452,13.726,89.56,4.335,106.897C215.311,157.614,194.359,180.733,166.91,180.733z" />
                                        </g>
                                        <path id="XMLID_1409_" style="fill:#EDCEAE;"
                                            d="M220.368,33.381c-19.81-26.884-53.458-13.838-53.458-13.838
                                                                                                                                                                                                            s-0.118-0.045-0.335-0.123v161.305c0.112,0.001,0.222,0.009,0.335,0.009c27.449,0,48.401-23.119,57.794-40.456
                                                                                                                                                                                                            C234.094,122.941,240.595,60.833,220.368,33.381z" />
                                    </g>
                                    <g id="XMLID_1410_">
                                        <g id="XMLID_1411_">
                                            <path id="XMLID_1414_" style="fill:#545465;"
                                                d="M286.89,293.134v40.681H46.926v-40.681c0-30.431,17.377-56.963,40.605-70.913
                                                                                                                                                                                                                c6.043-3.641,19.69-7.43,26.844-9.196c5.953-1.488,53.438,22.729,53.438,22.729s48.674-23.218,54.627-21.729
                                                                                                                                                                                                                c7.154,1.766,17.802,4.554,23.844,8.196C269.513,236.171,286.89,262.702,286.89,293.134z" />
                                        </g>
                                        <path id="XMLID_1417_" style="fill:#494857;"
                                            d="M246.285,222.22c-6.043-3.641-16.69-6.429-23.844-8.196
                                                                                                                                                                                                            c-5.953-1.488-54.627,21.729-54.627,21.729s-0.442-0.225-1.239-0.627v98.688H286.89v-40.681
                                                                                                                                                                                                            C286.89,262.703,269.513,236.171,246.285,222.22z" />
                                    </g>
                                    <g id="XMLID_1418_">
                                        <polygon id="XMLID_1419_" style="fill:#D7734A;"
                                            points="188.575,240.372 166.908,233.538 145.241,240.372 159.555,251.364 
                                            150.575,333.814 183.241,333.814 174.261,251.364 		" />
                                        <polygon id="XMLID_1420_" style="fill:#D35D3B;"
                                            points="188.575,240.372 166.908,233.538 166.575,233.643 166.575,333.814 
                                            183.241,333.814 174.261,251.364 		" />
                                    </g>
                                    <g id="XMLID_1421_">
                                        <path id="XMLID_1422_" style="fill:#FFFFFF;"
                                            d="M215.075,209.247l-48.167,23.441l-48.167-23.441
                                                                                                                                                                                                            c-11.5,5.5,10.396,38.436,14.833,36.833c10.963-3.96,33.334-10.329,33.334-10.329s22.371,6.369,33.334,10.329
                                                                                                                                                                                                            C204.679,247.683,226.575,214.747,215.075,209.247z" />
                                        <path id="XMLID_1423_" style="fill:#DEDDE0;"
                                            d="M215.075,209.247l-48.167,23.441l-0.333-0.162v3.321
                                                                                                                                                                                                            c0.211-0.061,0.333-0.095,0.333-0.095s22.371,6.369,33.334,10.329C204.679,247.683,226.575,214.747,215.075,209.247z" />
                                    </g>
                                    <g id="XMLID_1424_">
                                        <path id="XMLID_1427_" style="fill:#E1A98C;"
                                            d="M183.075,160.793l-16.452-3.907l-15.881,3.907l2.282,20.541
                                                                                                                                                                                                            c4.299,1.752,8.946,2.791,13.886,2.791c4.938,0,9.585-1.039,13.883-2.791L183.075,160.793z" />
                                        <path id="XMLID_1428_" style="fill:#D2987B;"
                                            d="M166.623,156.886l-0.048,0.012v27.219c0.112,0.001,0.222,0.009,0.334,0.009
                                                                                                                                                                                                            c4.938,0,9.585-1.039,13.883-2.791l2.282-20.542L166.623,156.886z" />
                                    </g>
                                    <g id="XMLID_1429_">
                                        <g id="XMLID_1430_">
                                            <path id="XMLID_1433_" style="fill:#E1A98C;"
                                                d="M223.571,25.321c-2.159,0.08-12.282-31.303-39.282-24.303
                                                                                                                                                                                                                    c-18.537,4.806-20.877,7.419-28.12,9.463c-29.41-9.014-57.539,14.472-56.495,36.488c1.759,37.07-4.778,36.505-0.295,49.454
                                                                                                                                                                                                                    s8.466,23.407,8.466,23.407s0.996,3.565,2.988-16.854s-4.705-31.379,11.137-31.379c52.452,0-19.698,20.372,13.952,20.372
                                                                                                                                                                                                                    c33.391,0,59.203-27.381,74.92-29.372c15.716-1.992,9.145,19.96,11.137,40.379s2.988,16.854,2.988,16.854
                                                                                                                                                                                                                    s8.92-9.712,8.466-23.407C232.923,80.969,239.803,24.719,223.571,25.321z" />
                                        </g>
                                        <path id="XMLID_1434_" style="fill:#D2987B;"
                                            d="M223.571,25.322c-2.159,0.08-12.282-31.303-39.282-24.303
                                                                                                                                                                                                                c-8.808,2.284-13.956,4.071-17.714,5.539V84.84c18.759-8.259,33.769-20.913,44.268-22.243c15.716-1.992,9.145,19.96,11.137,40.379
                                                                                                                                                                                                                c1.992,20.419,2.988,16.854,2.988,16.854s8.92-9.712,8.466-23.407C232.923,80.969,239.803,24.719,223.571,25.322z" />
                                    </g>
                                    <g id="XMLID_1435_">

                                        <ellipse id="XMLID_33_"
                                            transform="matrix(0.3543 -0.9351 0.9351 0.3543 41.877 286.6909)"
                                            style="fill:#EDCEAE;" cx="228.54" cy="113.021" rx="17.187"
                                            ry="10.048" />

                                        <ellipse id="XMLID_32_"
                                            transform="matrix(0.3543 0.9351 -0.9351 0.3543 172.9698 -24.4475)"
                                            style="fill:#F3DBC4;" cx="104.188" cy="113.029" rx="17.187"
                                            ry="10.048" />
                                    </g>
                                </g>
                            </svg>

                        </p>


                        <!-- Dropdown Menu -->
                        <div
                            class="absolute top-[50px] right-0 mt-2 w-48 bg-white border border-gray-200
                                 rounded-lg shadow-lg opacity-0 invisible group-hover:visible 
                                 group-hover:opacity-100 transition-opacity 
                                 duration-300">
                            <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf


                                <a href="#" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    {{ __('Log Out') }}
                                </a>
                            </form>

                        </div>
                    </div>
                @else
                    <a
                    href="{{ route('login')}}"
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
                    </a>
                @endauth
            @endif



            <a class="flex rounded-full
                    items-center justify-center
                    bg-white w-[36px] h-[36px] relative"
                href="/notifications">

                @auth
                    @php
                        $unreadNoticsCount = auth()->user()->unreadNotifications->count();
                    @endphp

                    @if ($unreadNoticsCount > 0)
                        <b
                            class="rounded-full absolute -top-2 -left-2
                            text-white bg-red-600 w-[32px] h-[32px] text-nm pt-1
                            text-center
                            ">
                            {{ $unreadNoticsCount > 9 ? '+9' : '0' . $unreadNoticsCount }}
                        </b>
                    @endif

                @endauth

                <svg class="w-[40px] bg-white h-[40px] rounded-full" width="30px" height="30px"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15 19.25C15 20.0456 14.6839 20.8087 14.1213 21.3713C13.5587 21.9339 12.7956 22.25 12 22.25C11.2044 22.25 10.4413 21.9339 9.87869 21.3713C9.31608 20.8087 9 20.0456 9 19.25"
                        stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M5.58096 18.25C5.09151 18.1461 4.65878 17.8626 4.36813 17.4553C4.07748 17.048 3.95005 16.5466 4.01098 16.05L5.01098 7.93998C5.2663 6.27263 6.11508 4.75352 7.40121 3.66215C8.68734 2.57077 10.3243 1.98054 12.011 1.99998V1.99998C13.6977 1.98054 15.3346 2.57077 16.6207 3.66215C17.9069 4.75352 18.7557 6.27263 19.011 7.93998L20.011 16.05C20.0723 16.5452 19.9462 17.0454 19.6576 17.4525C19.369 17.8595 18.9386 18.144 18.451 18.25C14.2186 19.2445 9.81332 19.2445 5.58096 18.25V18.25Z"
                        stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            @include('components.cart')
        </nav>

    </header>




    <!-- Main Content -->
    <div class="max-wju-[1500px] mx-auto min-h-[100vh]">
        @yield('content')
    </div>


    <div class="fixed bottom-5 right-5 z-50">
        <div
            class="bg-blue-500 text-white w-14 h-14 rounded-full
             flex items-center justify-center cursor-pointer shadow-lg">

            <svg onclick="openChat()" class="fas fa-comments text-2xl" fill="#ffffff" width="35px" height="35px"
                viewBox="0 -1 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <title>messages</title>
                <path
                    d="M25.132 13.165c0-5.165-5.627-9.352-12.566-9.352s-12.566 4.187-12.566 9.352c0 3.104 2.032 5.854 5.16 7.555-0.009 0.027-2.492 4.545-2.492 4.545s7.582-2.892 7.603-2.904c0.744 0.103 1.511 0.155 2.295 0.155 6.939 0 12.566-4.187 12.566-9.351zM34.385 16.087c0-5.164-5.297-9.314-11.031-9.351 8.22 8.188-1.461 16.912-9.351 16.912 0 0 0.877 1.79 7.816 1.79 0.783 0 1.551-0.054 2.295-0.156 0.021 0.014 7.604 2.904 7.604 2.904s-2.484-4.517-2.492-4.544c3.127-1.701 5.159-4.452 5.159-7.555z">
                </path>
            </svg>
        </div>
        <div id="chat-content"
            class="absolute bottom-20 right-0 w-80 bg-white rounded-lg shadow-xl overflow-hidden hidden">
            <div class="bg-green-500 text-white p-4 font-bold
            flex justify-between
            ">
                <span>Support Chat</span>
                <svg width="25px" height="25px" onclick="closeChat()" class="cursor-pointer" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z"
                        fill="#ff000f" />
                </svg>
            </div>
            <div class="h-80 overflow-y-auto p-4 space-y-4">
                <div class="bg-gray-100 p-3 rounded-lg max-w-[80%]">
                    Hello! How can I help you today?
                </div>
                <div class="bg-blue-100 p-3 rounded-lg max-w-[80%] ml-auto">
                    Hi! I have a question about my order.
                </div>
                <div class="bg-gray-100 p-3 rounded-lg max-w-[80%]">
                    Sure, I'd be happy to help. Can you please provide your order number?
                </div>
            </div>
            <div class="border-t border-gray-200 p-4 flex flex-row-reverse">
                <input type="text" placeholder="اكتب رسالتك ..."
                    class="flex-grow px-3 py-2 border border-gray-300 rounded-r-md focus:outline-none">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-l-md hover:bg-blue-600 focus:outline-none">
                    ارسال
                </button>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <footer
        class="main-footer flex flex-wrap items-center
            justify-between mx-auto gap-6
            bg-right-top h-full
            "
        style="background-image: url({{ asset('assets/footer_lg_bg.png') }});" dir="rtl">

        <section class="top-0 left-0 w-full bg-[#00000099] py-12 px-6">


            {{-- ========================================================== --}}
            <div class="mx-auto px-4 text-white w-full z-50">
                <div class="flex flex-wrap justify-between">
                    <!-- About Section -->
                    <div class="w-full md:w-1/3 mb-6 md:mb-0">
                        <h4 class="text-lg font-semibold mb-4">من نحن</h4>
                        <p class="text-sm">Magic Store هو طريقك للحصول على أحدث البطاقات الرقمية والخدمات في العالم</p>
                    </div>

                    <!-- Customer Service -->
                    <div class="w-full md:w-1/3 mb-6 md:mb-0">
                        <h4 class="text-lg font-semibold mb-4">خدمة العملاء</h4>
                        <ul class="space-y-2 text-sm">
                            <li>
                                <a href="/privacy-policy">
                                    السياسات
                                </a>
                            </li>
                            <li>
                                <a href="/contact">
                                    التواصل
                                </a>
                            </li>
                            <li>
                                <a href="/shipping-returns">
                                    الشحن والاسترجاع
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Social and Payment Methods -->
                    <div class="w-full md:w-1/3 mb-6 md:mb-0">
                        <h4 class="text-lg font-semibold mb-4">طرق الدفع المتاحة</h4>
                        <div class="flex space-x-4 mb-4 gap-2">

                            <img src="{{ asset('assets/payments/paypal.svg') }}" alt="PayPal" class="h-8" />

                            <img src="{{ asset('assets/payments/visa.svg') }}" alt="Visa" class="h-10" />

                            <img src="{{ asset('assets/payments/mastercard.svg') }}" alt="mastercard"
                                class="h-10" />

                            <img src="{{ asset('assets/payments/google_pay.svg') }}" alt="google pay"
                                class="h-10" />

                            <img src="{{ asset('assets/payments/stc.svg') }}" alt="stc pay" class="h-10" />


                        </div>
                        <p class="text-sm rtl">
                            جميع الحقوق محفوظة
                            © {{ now()->year }} Magic Store
                        </p>
                    </div>
                </div>
            </div>

            {{-- ========================================================== --}}
            {{-- </section> --}}
    </footer>

    <script>
        const left_menu = document.getElementById("left_menu")
        const closeMenu = () => {
            left_menu.style.display = "none";
        }
        const openMenu = () => {
            left_menu.style.display = "block";
        };
    </script>


    <script src="{{ asset('js/chat.js') }}"></script>


    @auth
        <div>
            <script>
                var openLoginBtn = document.getElementById('openLogin');
                var loginPopup = document.getElementById('loginPopup');

                openLoginBtn?.addEventListener('click', () => {
                    loginPopup.classList.remove('hidden');
                    document.body.style.overflow = "hidden";
                });


                loginPopup?.addEventListener('click', (e) => {
                    if (e.target === loginPopup) {
                        loginPopup.classList.add('hidden');
                        document.body.style.overflow = "auto";
                    }
                });
            </script>
        </div>
    @endauth


    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/nav_bar.js') }}"></script>

</body>

</html>
