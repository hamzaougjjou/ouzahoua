<!-- Login Popup -->

<div class="relative mx-auto p-5 border w-full 
    max-w-[600px]
    shadow-lg rounded-md bg-white -top-10">
        <div class="mt-3 text-center">

        <h3 class="text-lg leading-6 font-medium text-gray-900">انشاء حساب جديد</h3>

        <div class="mt-2 px-7 py-3">

            <form method="POST" action="{{ route('register') }}" id="register_form">
                @csrf


                <section id="section-1" class="h-[200px] block">

                    {{-- <div class="flex gap-[20px] mb-8"> --}}
                    <input
                        class="mt-1 rtl block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                    tfocus:outline-none mb-8"
                        type="text" name="first_name" required autofocus placeholder="الاسم الشخصي" />
                    <input
                        class="mt-1 rtl block w-full px-3 py-2 bg-white border border-gray-300 
                            rounded-md text-sm shadow-sm placeholder-gray-400
                    outline-none"
                        type="text" name="last_name" required autofocus placeholder="الاسم العائلي" />

                    {{-- </div> --}}



                    <input
                        class="my-8 rtl
                    block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        type="email" name="email" required autofocus autocomplete="username"
                        placeholder="البريد الالكتروني" />

                </section>

                <div class="hidden h-[200px]" id="section-2">

                    <input
                        class="mt-1 rtl block w-full px-3 py-2 bg-white border 
                        border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                                focus:outline-none"
                        type="text" name="phone" required autofocus placeholder="رقم الهاتف" />




                    <input
                        class="my-8 rtl
                    block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        type="password" name="password" required placeholder="كلمة المرور" />
                    <input
                        class="my-8 rtl
                    block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        type="password" name="confirm_password" required placeholder="تأكيد كلمة المرور" />

                </div>


                <div class="hidden h-[200px]" id="section-3">

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


                <div class="flex justify-end mt-6">
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
            <span id="btnShowLogin"
                class="text-blue-500 hover:text-blue-700 ml-1
            cursor-pointer
            ">تسجيل
                الدخول</span>
        </div>

        <div class="items-center px-4 py-3">
            <button id="btnColseRegister"
                class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full 
                shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300">
                اغلاق
            </button>
        </div>

    </div>
</div>





<script>
    loginPopup = document.getElementById('loginPopup');
    btnColseRegister = document.getElementById('btnColseRegister');
    btnColseRegister.addEventListener('click', () => {
        registerPopup.classList.add('hidden');
        document.body.style.overflow = "auto";
    });

    const btnShowLogin = document.getElementById('btnShowLogin');

    btnShowLogin.addEventListener('click', () => {
        loginPopup.classList.add('flex');
        loginPopup.classList.remove('hidden');
        registerPopup.classList.add('hidden');
        registerPopup.classList.remove('flex');

    });
</script>


<script src="{{ asset('js/register.js') }}"></script>
