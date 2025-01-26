<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>معلومات البائع والعلامة التجارية</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-8">
        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">معلومات البائع والعلامة التجارية</h1>
            <p class="text-gray-600">يرجى تعبئة جميع المعلومات المطلوبة</p>
        </header>

        <main class="bg-white shadow-md rounded-lg p-6">
            <form class="space-y-8">
                <section>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">معلومات البائع</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="seller-name" class="block text-gray-700 text-sm font-bold mb-2">الاسم الكامل</label>
                            <input type="text" id="seller-name" name="seller-name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div>
                            <label for="seller-email" class="block text-gray-700 text-sm font-bold mb-2">البريد الإلكتروني</label>
                            <input type="email" id="seller-email" name="seller-email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div>
                            <label for="seller-phone" class="block text-gray-700 text-sm font-bold mb-2">رقم الهاتف</label>
                            <input type="tel" id="seller-phone" name="seller-phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div>
                            <label for="seller-whatsapp" class="block text-gray-700 text-sm font-bold mb-2">رقم الواتساب</label>
                            <input type="tel" id="seller-whatsapp" name="seller-whatsapp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="seller-birthday" class="block text-gray-700 text-sm font-bold mb-2">تاريخ الميلاد</label>
                            <input type="date" id="seller-birthday" name="seller-birthday" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div>
                            <label for="seller-gender" class="block text-gray-700 text-sm font-bold mb-2">الجنس</label>
                            <select id="seller-gender" name="seller-gender" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">اختر الجنس</option>
                                <option value="male">ذكر</option>
                                <option value="female">أنثى</option>
                                <option value="other">آخر</option>
                            </select>
                        </div>
                        <div>
                            <label for="seller-password" class="block text-gray-700 text-sm font-bold mb-2">كلمة المرور</label>
                            <input type="password" id="seller-password" name="seller-password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div>
                            <label for="seller-confirm-password" class="block text-gray-700 text-sm font-bold mb-2">تأكيد كلمة المرور</label>
                            <input type="password" id="seller-confirm-password" name="seller-confirm-password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="seller-address" class="block text-gray-700 text-sm font-bold mb-2">العنوان</label>
                        <textarea id="seller-address" name="seller-address" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>
                </section>

                <section>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">معلومات العلامة التجارية</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="brand-name" class="block text-gray-700 text-sm font-bold mb-2">اسم العلامة التجارية</label>
                            <input type="text" id="brand-name" name="brand-name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div>
                            <label for="brand-website" class="block text-gray-700 text-sm font-bold mb-2">الموقع الإلكتروني</label>
                            <input type="url" id="brand-website" name="brand-website" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="brand-logo" class="block text-gray-700 text-sm font-bold mb-2">شعار العلامة التجارية</label>
                            <input type="file" id="brand-logo" name="brand-logo" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="brand-category" class="block text-gray-700 text-sm font-bold mb-2">فئة العلامة التجارية</label>
                            <select id="brand-category" name="brand-category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">اختر الفئة</option>
                                <option value="fashion">أزياء</option>
                                <option value="electronics">إلكترونيات</option>
                                <option value="home">منزل وحديقة</option>
                                <option value="beauty">جمال وعناية شخصية</option>
                                <option value="sports">رياضة</option>
                                <option value="other">أخرى</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="brand-description" class="block text-gray-700 text-sm font-bold mb-2">وصف العلامة التجارية</label>
                        <textarea id="brand-description" name="brand-description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                    </div>
                </section>

                <div class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                    <label for="terms" class="mr-2 block text-sm text-gray-900">
                        أوافق على الشروط والأحكام
                    </label>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                        تسجيل المعلومات
                    </button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>