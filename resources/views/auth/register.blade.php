@extends('layouts.app')

@section('title', 'Magic Store | create account')

@section('content')




    <div class="mx-auto p-5 border w-full max-w-[600px]
            shadow-sm rounded-md bg-white mt-6">
        <div class="mt-3 text-center">

            <h3 class="text-lg leading-6 font-medium text-gray-900">انشاء حساب جديد</h3>

            <div class="mt-2 px-7 py-3">

                <form method="POST" action="{{ route('register') }}" id="register_form">
                    @csrf

                    <section id="section-1" class="min-h-[200px] block">


                        <div class="my-8">
                            <input
                                class="rtl block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                tfocus:outline-none"
                                type="text" name="first_name" required autofocus placeholder="الاسم الشخصي" />

                            @foreach ((array) $errors->get('first_name') as $message)
                                <p class="p-2 rtl text-red-600 text-sm w-full text-start">{{ $message }}</p>
                            @endforeach
                        </div>

                        <div class="my-8">
                            <input
                                class="rtl block w-full px-3 py-2 bg-white border border-gray-300 
                                        rounded-md text-sm shadow-sm placeholder-gray-400
                                outline-none"
                                type="text" name="last_name" required autofocus placeholder="الاسم العائلي" />
                            @foreach ((array) $errors->get('last_name') as $message)
                                <p class="p-2 rtl text-red-600 text-sm w-full text-start">{{ $message }}</p>
                            @endforeach
                        </div>


                        <div class="my-8">
                            <input
                                class="rtl
                block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                type="email" name="email" required autofocus autocomplete="username"
                                placeholder="البريد الالكتروني" />


                            @foreach ((array) $errors->get('email') as $message)
                                <p class="p-2 rtl text-red-600 text-sm w-full text-start">{{ $message }}</p>
                            @endforeach
                        </div>


                    </section>

                    <div class="hidden min-h-[200px]" id="section-2">

                        <input
                            class="mt-1 rtl block w-full px-3 py-2 bg-white border 
                    border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                            focus:outline-none"
                            type="text" name="phone" required autofocus placeholder="رقم الهاتف" />



                        <div class="my-8">
                            <input
                                class="my-8 rtl
                block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                type="password" name="password" required placeholder="كلمة المرور" />

                            @foreach ((array) $errors->get('password') as $message)
                                <p class="p-2 rtl text-red-600 text-sm w-full text-start">{{ $message }}</p>
                            @endforeach
                        </div>

                        <div class="my-8">
                            <input
                                class="my-8 rtl
                        block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                        focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                        type="password" name="confirm_password" required placeholder="تأكيد كلمة المرور" />
                                    @foreach ((array) $errors->get('confirm_password') as $message)
                                <p class="p-2 rtl text-red-600 text-sm w-full text-start">{{ $message }}</p>
                            @endforeach
                        </div>
                    </div>


                    <div class="hidden min-h-[200px]" id="section-3">

                        <input
                            class="mt-1 rtl block w-full px-3 py-2 bg-white border 
                    border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                            focus:outline-none"
                            type="date" name="birth_day" autofocus placeholder="تاريخ الميلاد" />


                        <select id="gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                    dark:focus:border-blue-500 mt-8"
                            name="gender">
                            <option value="" selected>اختر جنسك</option>
                            <option value="male">دكر</option>
                            <option value="female">أنثى</option>
                        </select>

                    </div>


                    <div class="flex justify-end mt-8">
                        <button id="btn_prev" type="button"
                            class="mt-4 w-fit bg-gray-500 hover:bg-gray-700 
                    text-white font-bold py-3 px-6 rounded hidden">
                            عودة
                        </button>
                        <span class="flex-1"></span>
                        <button id="btn_next" type="button"
                            class="mt-4 w-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded">
                            التالي
                        </button>
                        <button id="btn_submit_register" type="submit"
                            class="mt-4 hidden w-fit bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded">
                            انضمام الان
                        </button>
                    </div>

                </form>

            </div>

            <div class="mt-4 text-sm">
                <span class="text-gray-600"> لدي حساب</span>
                <span id="btnShowLogin" class="text-blue-500 hover:text-blue-700 ml-1
        cursor-pointer
        ">تسجيل
                    الدخول</span>
            </div>

        </div>
    </div>




    <script>
        let current_page = 1;
        let total_pages = 1;
        const btn_next = document.getElementById("btn_next");
        const btn_prev = document.getElementById("btn_prev");

        const section_1 = document.getElementById("section-1");
        const section_2 = document.getElementById("section-2");
        const section_3 = document.getElementById("section-3");
        const btn_submit_register = document.getElementById("btn_submit_register");
        const register_form = document.getElementById("register_form");

        btn_submit_register.addEventListener("click", () => {
            // alert(77777)
            register_form.submit();
        })



        btn_next.addEventListener("click", () => {

            switch (current_page) {
                case 1:
                    section_1.classList.remove("block");
                    section_1.classList.add("hidden");

                    section_2.classList.remove("hidden");
                    section_2.classList.add("block");

                    btn_prev.classList.remove("hidden");
                    btn_prev.classList.add("block");
                    break;
                case 2:
                    section_1.classList.remove("block");
                    section_1.classList.add("hidden");

                    section_2.classList.remove("block");
                    section_2.classList.add("hidden");

                    section_3.classList.remove("hidden");
                    section_3.classList.add("block");

                    btn_prev.classList.remove("hidden");
                    btn_prev.classList.add("block");


                    btn_next.classList.remove("block");
                    btn_next.classList.add("hidden");

                    btn_submit_register.classList.add("block");
                    btn_submit_register.classList.remove("hidden");
                    break;
                default:
                    break;
            }
            current_page++;
        })


        btn_prev.addEventListener("click", () => {

            switch (current_page) {
                case 2:
                    section_2.classList.remove("block");
                    section_2.classList.add("hidden");

                    section_1.classList.remove("hidden");
                    section_1.classList.add("block");

                    btn_prev.classList.remove("block");
                    btn_prev.classList.add("hidden");

                    break;
                case 3:
                    section_3.classList.remove("block");
                    section_3.classList.add("hidden");

                    section_2.classList.remove("hidden");
                    section_2.classList.add("block");

                    // btn_prev.classList.remove("block");
                    // btn_prev.classList.add("hidden");

                    btn_next.classList.add("block");
                    btn_next.classList.remove("hidden");

                    btn_submit_register.classList.add("hidden");
                    btn_submit_register.classList.remove("block");

                    break;
                default:
                    break;
            }
            current_page--;
        })
    </script>





@endsection
