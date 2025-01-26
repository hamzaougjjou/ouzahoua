<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الانضمام للبيع معنا</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .faq-item.active .faq-answer {
            max-height: 500px;
            transition: max-height 0.5s ease-in;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-b from-blue-100 to-white font-sans leading-relaxed">
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-800">اسم المتجر</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="text-gray-600 hover:text-blue-800">الرئيسية</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-800">المنتجات</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-800">تواصل معنا</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-3xl mx-auto bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="text-center p-6 bg-blue-50">
                <h2 class="text-3xl font-bold text-blue-800 mb-2">شروط الانضمام للبيع معنا</h2>
                <p class="text-lg text-gray-600">نرحب بانضمامك كبائع في متجرنا. يرجى قراءة الشروط بعناية قبل التسجيل.</p>
            </div>
            <div class="p-6 space-y-6">
                <div class="space-y-4">
                    <h3 class="text-2xl font-semibold text-blue-700">شروط الانضمام</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 ml-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-gray-700">
                                للانضمام كبائع، يجب أن توافق على جميع الشروط والأحكام المتعلقة بالبيع لدينا.
                            </p>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 ml-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-gray-700">
                                سيحصل متجرنا على نسبة 15% من الأرباح لكل عملية بيع تتم عن طريق المنصة.
                            </p>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 ml-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-gray-700">
                                يجب تقديم معلومات صحيحة وكاملة عند التسجيل.
                            </p>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 ml-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-gray-700">
                                يجب الالتزام بمعايير الجودة والخدمة لتوفير تجربة مميزة للمشترين.
                            </p>
                        </li>
                    </ul>
                </div>
                <p class="text-gray-700 text-center font-semibold">
                    إذا كنت مستعداً للانضمام إلينا وبدء البيع، يمكنك الضغط على زر التسجيل أدناه.
                </p>
            </div>
            <div class="flex justify-between p-6 bg-gray-50">
                <a href="/" class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                    العودة
                </a>
                <a href="{{route('seller.create')}}" 
                class="bg-blue-500 hover:bg-blue-600 text-white rtl font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 flex items-center">
                    التسجيل كبائع
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="max-w-3xl mx-auto mt-12 bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <h3 class="text-2xl font-semibold text-blue-700 mb-4">الأسئلة الشائعة</h3>
                <div class="space-y-4" id="faq-container">
                    <div class="faq-item border-b border-gray-200 pb-4">
                        <button class="faq-question w-full text-right flex justify-between items-center focus:outline-none">
                            <span class="text-lg font-medium text-gray-800">كيف يمكنني البدء في البيع على المنصة؟</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="faq-answer mt-2 text-gray-600">
                            <p>للبدء في البيع على منصتنا، اتبع الخطوات التالية:</p>
                            <ol class="list-decimal list-inside mt-2">
                                <li>قم بالتسجيل كبائع عبر الضغط على زر "التسجيل كبائع" أعلاه.</li>
                                <li>أكمل ملف التعريف الخاص بك وقدم المعلومات المطلوبة.</li>
                                <li>انتظر موافقة فريقنا على طلبك.</li>
                                <li>بمجرد الموافقة، يمكنك البدء في إضافة منتجاتك وإدارة متجرك.</li>
                            </ol>
                        </div>
                    </div>
                    <div class="faq-item border-b border-gray-200 pb-4">
                        <button class="faq-question w-full text-right flex justify-between items-center focus:outline-none">
                            <span class="text-lg font-medium text-gray-800">ما هي الرسوم المرتبطة بالبيع على المنصة؟</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="faq-answer mt-2 text-gray-600">
                            <p>تأخذ منصتنا نسبة 15% من كل عملية بيع تتم. لا توجد رسوم ثابتة أو رسوم اشتراك شهرية. تغطي هذه النسبة تكاليف معالجة الدفع، خدمة العملاء، والتسويق للمنصة.</p>
                        </div>
                    </div>
                    <div class="faq-item pb-4">
                        <button class="faq-question w-full text-right flex justify-between items-center focus:outline-none">
                            <span class="text-lg font-medium text-gray-800">كيف يتم الدفع للبائعين؟</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="faq-answer mt-2 text-gray-600">
                            <p>يتم الدفع للبائعين بشكل أسبوعي. نقوم بتحويل الأموال مباشرة إلى الحساب البنكي الذي تقدمه عند التسجيل. يرجى التأكد من تقديم معلومات الحساب الصحيحة لتجنب أي تأخير في الدفع.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- @include('components.footer') -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                question.addEventListener('click', () => {
                    item.classList.toggle('active');
                    const icon = question.querySelector('svg');
                    icon.classList.toggle('rotate-180');
                });
            });
        });
    </script>
</body>
</html>