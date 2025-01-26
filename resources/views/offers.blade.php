@extends('layouts.app')

@section('title', 'Magic Store | Home')

@section('content')



    <!-- Offered Products -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">

            <section
                class="header sticky top-[85px] z-50 bg-white p-6 mb-10
            flex justify-between items-center
            ">



                <form class="max-w-md flex-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <button type="submit"
                            class="text-white absolute start-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 
                            focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg 
                            text-sm px-4 py-2
                            ">بحث</button>
                        <input type="search" name="q" value="{{ request('q') }}" id="default-search"
                            class="block w-full p-4 ps-10 rtl text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="ما الذي تبحث عنه ..." />
                    </div>
                </form>

                <h2 class="rtl text-3xl font-semibold">
                    العروض الحالية
                </h2>


            </section>

            <div class="min-h-[80vh]">
                <div class="grid grid-cols-1 rtl px-4 md:grid-cols-3 lg:grid-cols-4 gap-6">

                    @foreach ($products as $product)
                        <!-- Single Product -->

                        <div class="relative flex flex-col bg-white p-6 rounded-lg shadow-md text-center">
                            <a class="flex-1" href="/shop/{{ $product->slug }}">

                                @if ($product->discount_price)
                                    <svg class="absolute -top-2 left-1" width="40px" height="40px"
                                        viewBox="-33 0 255 255" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
                                        <defs>
                                            <style>
                                                .cls-3 {
                                                    fill: url(#linear-gradient-1);
                                                }

                                                .cls-4 {
                                                    fill: #fc9502;
                                                }

                                                .cls-5 {
                                                    fill: #fce202;
                                                }
                                            </style>

                                            <linearGradient id="linear-gradient-1" gradientUnits="userSpaceOnUse"
                                                x1="94.141" y1="255" x2="94.141" y2="0.188">
                                                <stop offset="0" stop-color="#ff4c0d" />
                                                <stop offset="1" stop-color="#fc9502" />
                                            </linearGradient>
                                        </defs>
                                        <g id="fire">
                                            <path
                                                d="M187.899,164.809 C185.803,214.868 144.574,254.812 94.000,254.812 C42.085,254.812 -0.000,211.312 -0.000,160.812 C-0.000,154.062 -0.121,140.572 10.000,117.812 C16.057,104.191 19.856,95.634 22.000,87.812 C23.178,83.513 25.469,76.683 32.000,87.812 C35.851,94.374 36.000,103.812 36.000,103.812 C36.000,103.812 50.328,92.817 60.000,71.812 C74.179,41.019 62.866,22.612 59.000,9.812 C57.662,5.384 56.822,-2.574 66.000,0.812 C75.352,4.263 100.076,21.570 113.000,39.812 C131.445,65.847 138.000,90.812 138.000,90.812 C138.000,90.812 143.906,83.482 146.000,75.812 C148.365,67.151 148.400,58.573 155.999,67.813 C163.226,76.600 173.959,93.113 180.000,108.812 C190.969,137.321 187.899,164.809 187.899,164.809 Z"
                                                id="path-1" class="cls-3" fill-rule="evenodd" />
                                            <path
                                                d="M94.000,254.812 C58.101,254.812 29.000,225.711 29.000,189.812 C29.000,168.151 37.729,155.000 55.896,137.166 C67.528,125.747 78.415,111.722 83.042,102.172 C83.953,100.292 86.026,90.495 94.019,101.966 C98.212,107.982 104.785,118.681 109.000,127.812 C116.266,143.555 118.000,158.812 118.000,158.812 C118.000,158.812 125.121,154.616 130.000,143.812 C131.573,140.330 134.753,127.148 143.643,140.328 C150.166,150.000 159.127,167.390 159.000,189.812 C159.000,225.711 129.898,254.812 94.000,254.812 Z"
                                                id="path-2" class="cls-4" fill-rule="evenodd" />
                                            <path
                                                d="M95.000,183.812 C104.250,183.812 104.250,200.941 116.000,223.812 C123.824,239.041 112.121,254.812 95.000,254.812 C77.879,254.812 69.000,240.933 69.000,223.812 C69.000,206.692 85.750,183.812 95.000,183.812 Z"
                                                id="path-3" class="cls-5" fill-rule="evenodd" />
                                        </g>
                                    </svg>
                                @endif



                                {{-- <svg class="absolute top-0 right-0 bg-main-100 cursor-pointer rounded-full p-1" width="45px"
                                height="45px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 5L19 12H7.37671M20 16H8L6 3H3M16 5.5H13.5M13.5 5.5H11M13.5 5.5V8M13.5 5.5V3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg> --}}

                                <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}"
                                    class="mb-4 mx-auto min-h-[250px] bg-gray-300">
                                <h3 class="text-lg font-semibold mb-2 flex-1">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-blue-600">
                                    {{ $product->price }} {{ $currency }}
                                </p>
                            </a>
                            <div>
                                <button class="bg-green-600 text-white px-4 py-2 w-full rounded-lg mt-4">شراء الآن</button>



                                {{-- <input type="hidden" name="product_id" value="{{ $product->id }}"> --}}
                                <button type="submit" data-product="{{ $product }}"
                                    class="add-to-cart bg-blue-600 text-white px-4 py-2 w-full rounded-lg mt-4">
                                    اضافة الى السلة
                                </button>

                            </div>
                        </div>

                        <!-- Single Product -->
                        {{-- <div class="relative flex flex-col bg-white p-6 rounded-lg shadow-md text-center">

                        <svg class="absolute -top-2 left-1" width="40px" height="40px" viewBox="-33 0 255 255"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            preserveAspectRatio="xMidYMid">
                            <defs>
                                <style>
                                    .cls-3 {
                                        fill: url(#linear-gradient-1);
                                    }

                                    .cls-4 {
                                        fill: #fc9502;
                                    }

                                    .cls-5 {
                                        fill: #fce202;
                                    }
                                </style>

                                <linearGradient id="linear-gradient-1" gradientUnits="userSpaceOnUse" x1="94.141"
                                    y1="255" x2="94.141" y2="0.188">
                                    <stop offset="0" stop-color="#ff4c0d" />
                                    <stop offset="1" stop-color="#fc9502" />
                                </linearGradient>
                            </defs>
                            <g id="fire">
                                <path
                                    d="M187.899,164.809 C185.803,214.868 144.574,254.812 94.000,254.812 C42.085,254.812 -0.000,211.312 -0.000,160.812 C-0.000,154.062 -0.121,140.572 10.000,117.812 C16.057,104.191 19.856,95.634 22.000,87.812 C23.178,83.513 25.469,76.683 32.000,87.812 C35.851,94.374 36.000,103.812 36.000,103.812 C36.000,103.812 50.328,92.817 60.000,71.812 C74.179,41.019 62.866,22.612 59.000,9.812 C57.662,5.384 56.822,-2.574 66.000,0.812 C75.352,4.263 100.076,21.570 113.000,39.812 C131.445,65.847 138.000,90.812 138.000,90.812 C138.000,90.812 143.906,83.482 146.000,75.812 C148.365,67.151 148.400,58.573 155.999,67.813 C163.226,76.600 173.959,93.113 180.000,108.812 C190.969,137.321 187.899,164.809 187.899,164.809 Z"
                                    id="path-1" class="cls-3" fill-rule="evenodd" />
                                <path
                                    d="M94.000,254.812 C58.101,254.812 29.000,225.711 29.000,189.812 C29.000,168.151 37.729,155.000 55.896,137.166 C67.528,125.747 78.415,111.722 83.042,102.172 C83.953,100.292 86.026,90.495 94.019,101.966 C98.212,107.982 104.785,118.681 109.000,127.812 C116.266,143.555 118.000,158.812 118.000,158.812 C118.000,158.812 125.121,154.616 130.000,143.812 C131.573,140.330 134.753,127.148 143.643,140.328 C150.166,150.000 159.127,167.390 159.000,189.812 C159.000,225.711 129.898,254.812 94.000,254.812 Z"
                                    id="path-2" class="cls-4" fill-rule="evenodd" />
                                <path
                                    d="M95.000,183.812 C104.250,183.812 104.250,200.941 116.000,223.812 C123.824,239.041 112.121,254.812 95.000,254.812 C77.879,254.812 69.000,240.933 69.000,223.812 C69.000,206.692 85.750,183.812 95.000,183.812 Z"
                                    id="path-3" class="cls-5" fill-rule="evenodd" />
                            </g>
                        </svg>

                        <svg class="absolute top-0 right-0 bg-main-100 cursor-pointer rounded-full p-1" width="45px"
                            height="45px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 5L19 12H7.37671M20 16H8L6 3H3M16 5.5H13.5M13.5 5.5H11M13.5 5.5V8M13.5 5.5V3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <img src="https://presellia.com/wp-content/uploads/2024/07/Adobe-Acrobat-Pro-DC-2023-Presellia-Africa-150x150.webp"
                            alt="Product Image" class="mb-4 mx-auto">
                        <h3 class="text-lg font-semibold mb-2 flex-1">
                            Adobe Acrobat Pro DC 2023 à vie (pré-activé)
                        </h3>
                        <p class="text-blue-600">199.99 ريال</p>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg mt-4">شراء الآن</button>
                    </div> --}}
                    @endforeach

                </div>

                @if (count($products) == 0 && request()->has('q'))
                    <h2 class="text-center text-red-200 py-16 text-3xl font-semibold">
                        لم يتم العثورعلى اي منتجات
                    </h2>
                @elseif (count($products) == 0)
                    <h2 class="text-center rtl text-red-200 py-16 text-3xl font-semibold">
                        Oooops
                        لا يوجد أي عروض حاليا
                    </h2>
                    <a href="{{ route('shop') }}"
                        class="bg-green-600 mx-auto
                    w-fit text-center
                    block  text-white px-4 py-2 rounded-lg mt-4">
                        عودة الى صفحة التسوق
                    </a>
                @endif
            </div>
        </div>

        @if (!request('q'))
            <div class="mt-[50px] mx-auto rtl">
                {{ $products->links('pagination::simple-tailwind') }}
            </div>
        @endif

    </section>


@endsection
