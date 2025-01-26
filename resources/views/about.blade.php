@extends('layouts.app')

@section('title', 'About us')

@section('content')


    <section class="container mx-auto">


        <div class="px-6 py-8 border rounded-lg shadow md:mx-[20px] mt-[50px] bg-white border-main-200">
            <h1 class="text-4xl font-bold text-main-200" dir="rtl">
                من نحن
            </h1>
        </div>


        <p class="text-xl mb-4 leading-loose italic p-4" dir="rtl">
            مرحبًا بك في

            <a
            href="{{route('home')}}"
            class="text-main-100">
                <b class="text-main-200">ما</b>جيك
                <b class="text-main-200">س</b>تور
            </a>

            نحن متجر إلكتروني متخصص في تقديم أفضل المنتجات الرقمية التي تلبي احتياجاتك وتساعدك
            على تحقيق أهدافك. سواء كنت تبحث عن برامج، قوالب تصميم، أدوات تطوير، أو أي منتجات رقمية أخرى،تراخيص ويندوز أوفيس
            اشتراكات منصات رياضية والكثير'فإننا نسعى لتوفير تشكيلة واسعة تناسب جميع المستخدمين من الهواة إلى المحترفين.

        </p>
        <div class="wi-fit mx-auto max-w-full">
            <img
            class="max-w-[300px] w-full mx-auto"
            src="{{asset('assets/logo.png')}}" alt="">
        </div>
        <p class="text-xl mb-4 leading-loose italic p-4 text-" dir="rtl">
            في
            <a
            href="{{route('home')}}"
            class="text-main-100">
                <b class="text-main-200">ما</b>جيك
                <b class="text-main-200">س</b>تور
            </a>
            ، نؤمن بأهمية الابتكار والجودة. لذلك، نقوم باختيار منتجاتنا بعناية فائقة لضمان توفير أفضل الأدوات
            التي تساعدك في إتمام مهامك بكفاءة وسهولة. فريقنا يعمل بجد ليكون متجرنا وجهتك الأولى للمنتجات الرقمية الموثوقة
            والحديثة.

        </p>
        <p class="text-xl mb-4 leading-loose italic p-4 text-" dir="rtl">

            هدفنا هو أن نكون المكان الذي تجد فيه كل ما تحتاجه لتطوير مهاراتك، تعزيز إنتاجيتك، والتمتع بأحدث التقنيات الرقمية
            المتاحة.
            متجر 
            <a
            href="{{route('home')}}"
            class="text-main-100">
                <b class="text-main-200">ما</b>جيك
                <b class="text-main-200">س</b>تور
            </a>
            مملوك لشركة ريادة الابتكار لتقنية المعلومات
        </p>
    </section>

@endsection
