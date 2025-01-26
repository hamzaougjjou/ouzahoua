<!-- Login Popup -->

<div class="relative mx-auto p-5 border w-96 shadow-lg rounded-md bg-white -top-10">
    <div class="mt-3 text-center">
        <h3 class="text-lg leading-6 font-medium text-gray-900">تسجيل الدخول</h3>
        <div class="mt-2 px-7 py-3">


            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input
                    class="mt-1 rtl block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                      focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    type="text" name="login" :value="old('login')" required autofocus autocomplete="username"
                    placeholder="البريد الالكتروني او رقم الهاتف" />

                <input type="password" name="password" placeholder="كلمة المرور"
                    class="mt-4 block rtl w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                      focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    type="password" name="password" required autocomplete="current-password" />

                <button type="submit"
                    class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    تسجيل الدخول
                </button>
            </form>
        </div>


        <div class="mt-4 text-sm">
            <span class="text-gray-600">ليس لديك حساب؟</span>
            <a
            href="/register"
            id="btnShowRegister"
                class="text-blue-500 hover:text-blue-700 ml-1
            cursor-pointer mx-2
            ">سجل
                هنا</a>
        </div>

        <div class="items-center px-4 py-3">
            <button id="closeLogin"
                class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300">
                اغلاق
            </button>
        </div>
    </div>
</div>



<script>
    loginPopup = document.getElementById('loginPopup');
    closeLoginBtn = document.getElementById('closeLogin');
    closeLoginBtn.addEventListener('click', () => {
        loginPopup.classList.add('hidden');
        document.body.style.overflow = "auto";
    });

</script>
