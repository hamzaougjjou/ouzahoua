@extends('layouts.app')

@section('title', $product->name)

@section('content')

    <div class="flex flex-col md:flex-row p-2 rtl">
        <div class="md:flex-1 px-2">
            <div class="h-[460px] rounded-lg bg-gray-300 mb-4">
                <img class="w-full h-full object-cover bg-gray-200" src="{{ $product->thumbnail }}"
                    alt={{ $product->name }} id="mainImage">
            </div>
            <div class="flex -mx-2 mb-4 overflow-x-auto">

                <div class="w-1/4 px-2">
                    <img class="w-full h-24 object-cover bg-gray-200 rounded-lg cursor-pointer"
                        src="{{ $product->thumbnail }}" alt={{ $product->name }} onclick="changeMainImage(this.src)" />
                </div>

                @foreach ($product->subImages as $item)
                    <div class="w-1/4 px-2">
                        <img class="w-full h-24 object-cover bg-gray-200 rounded-lg cursor-pointer"
                            src="{{ $item->image_path }}" alt="" onclick="changeMainImage(this.src)">
                    </div>
                @endforeach


            </div>
            <div class="flex -mx-2 mb-4">
                <div class="w-1/2 px-2">
                    <button data-product="{{ $product }}"
                        class="w-full bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 add-to-cart">
                        اضافة الى السلة
                    </button>
                </div>
                <div class="w-1/2 px-2">
                    <a href="{{ route('checkout', ['product' => $product->slug]) }}"
                        class="w-full bg-green-200 text-center inline-block text-gray-800 py-2 px-4 rounded-full font-bold hover:bg-green-300">
                        اشتري الان
                    </a>
                </div>
            </div>
        </div>
        <div class="md:flex-1 px-2">
            <h2 class="text-2xl font-bold mb-2">
                {{ $product->name }}
            </h2>
            <p class="text-gray-600 text-sm mb-4">
                {{ $product->description }}
            </p>
            <div class="flex mb-4">
                <div class="mr-4">
                    <span class="font-bold text-gray-700">السعر</span>
                    <span class="text-gray-600 flex gap-8 mb-4">
                        @if ($product->discount_price)
                            <p class="text-sm text-red-400  line-through">
                                {{ $product->price }}
                                {{ $store->currency }}
                            </p>
                            <p class="text-sm text-black text-xl">
                                {{ $product->discount_price }}
                                {{ $store->currency }}
                            </p>
                        @else
                            {{ $product->price }}
                            {{ $store->currency }}
                        @endif
                    </span>
                </div>
            </div>
            <div class="mb-4 hidden">
                <span class="font-bold text-gray-700">Select Color:</span>
                <div class="flex items-center mt-2">
                    <button class="w-6 h-6 rounded-full bg-gray-800 mr-2"></button>
                    <button class="w-6 h-6 rounded-full bg-red-500 mr-2"></button>
                    <button class="w-6 h-6 rounded-full bg-blue-500 mr-2"></button>
                    <button class="w-6 h-6 rounded-full bg-yellow-500 mr-2"></button>
                </div>
            </div>
            <div class="mb-4 hidden">
                <span class="font-bold text-gray-700">Select Size:</span>
                <div class="flex items-center mt-2">
                    <button
                        class="bg-gray-300 text-gray-700 py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400">S</button>
                    <button
                        class="bg-gray-300 text-gray-700 py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400">M</button>
                    <button
                        class="bg-gray-300 text-gray-700 py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400">L</button>
                    <button
                        class="bg-gray-300 text-gray-700 py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400">XL</button>
                    <button
                        class="bg-gray-300 text-gray-700 py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400">XXL</button>
                </div>
            </div>

            <div>
                @if ($product->body)
                    <span class="font-bold text-gray-700">وصف المنتج</span>
                    <p class="text-gray-600 text-sm mt-2">
                        {!! $product->body !!}
                    </p>
                @endif
            </div>
        </div>
    </div>

    <div
        class="mx-auto nnnnnnnnnnnnn                                                                                                                                                                                              ">

        <!-- Reviews -->
        <div class="bg-white p-2 rounded-lg shadow mt-8">
            <h2 class="text-2xl font-bold mb-4 rtl">تقييم العملاء</h2>

            @if (count($product->reviews) === 0)
                @include('product-item.no-reviews')
            @endif

            <div class="flex flex-wrap gap-5 justify-evenly">

                @foreach ($product->reviews as $review)
                    <div class="border-b pb-3 mb-6 p-3 max-w-md bg-slate-50 w-full">
                        <section class="flex gap-4">
                            <!-- User Avatar and Rating -->
                            <div class="w-fit">
                                <!-- User Avatar (Placeholder) -->
                                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mb-2">
                                    <span
                                        class="text-xl font-semibold text-gray-700">{{ substr($review->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <!-- Review Content -->
                            <div class="flex-1">
                                <!-- User Name -->
                                <span class="text-sm font-bold text-gray-700 text-center">{{ $review->name }}</span>
                                <!-- Rating Stars -->
                                <div class="flex items-center mb-2">
                                    <span class="text-yellow-500 flex gap-1">
                                        @php
                                            // Round rating to nearest 0.5
                                            $rating = $review->rating;
                                            $fullStars = floor($rating); // Full stars count
                                            $emptyStars = 5 - $fullStars; // Remaining empty stars
                                        @endphp

                                        <!-- Full Stars -->
                                        @for ($i = 0; $i < $fullStars; $i++)
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M21.12 9.88005C21.0781 9.74719 20.9996 9.62884 20.8935 9.53862C20.7873 9.4484 20.6579 9.38997 20.52 9.37005L15.1 8.58005L12.67 3.67005C12.6008 3.55403 12.5027 3.45795 12.3853 3.39123C12.2678 3.32451 12.1351 3.28943 12 3.28943C11.8649 3.28943 11.7322 3.32451 11.6147 3.39123C11.4973 3.45795 11.3991 3.55403 11.33 3.67005L8.89999 8.58005L3.47999 9.37005C3.34211 9.38997 3.21266 9.4484 3.10652 9.53862C3.00038 9.62884 2.92186 9.74719 2.87999 9.88005C2.83529 10.0124 2.82846 10.1547 2.86027 10.2907C2.89207 10.4268 2.96124 10.5512 3.05999 10.6501L6.99999 14.4701L6.06999 19.8701C6.04642 20.0091 6.06199 20.1519 6.11497 20.2826C6.16796 20.4133 6.25625 20.5267 6.36999 20.6101C6.48391 20.6912 6.61825 20.7389 6.75785 20.7478C6.89746 20.7566 7.03675 20.7262 7.15999 20.6601L12 18.1101L16.85 20.6601C16.9573 20.7189 17.0776 20.7499 17.2 20.7501C17.3573 20.7482 17.5105 20.6995 17.64 20.6101C17.7537 20.5267 17.842 20.4133 17.895 20.2826C17.948 20.1519 17.9636 20.0091 17.94 19.8701L17 14.4701L20.93 10.6501C21.0305 10.5523 21.1015 10.4283 21.1351 10.2922C21.1687 10.1561 21.1634 10.0133 21.12 9.88005Z"
                                                    fill="#F7C52A" />
                                            </svg>
                                        @endfor

                                        <!-- Empty Stars -->
                                        @for ($i = 0; $i < $emptyStars; $i++)
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M21.12 9.88005C21.0781 9.74719 20.9996 9.62884 20.8935 9.53862C20.7873 9.4484 20.6579 9.38997 20.52 9.37005L15.1 8.58005L12.67 3.67005C12.6008 3.55403 12.5027 3.45795 12.3853 3.39123C12.2678 3.32451 12.1351 3.28943 12 3.28943C11.8649 3.28943 11.7322 3.32451 11.6147 3.39123C11.4973 3.45795 11.3991 3.55403 11.33 3.67005L8.89999 8.58005L3.47999 9.37005C3.34211 9.38997 3.21266 9.4484 3.10652 9.53862C3.00038 9.62884 2.92186 9.74719 2.87999 9.88005C2.83529 10.0124 2.82846 10.1547 2.86027 10.2907C2.89207 10.4268 2.96124 10.5512 3.05999 10.6501L6.99999 14.4701L6.06999 19.8701C6.04642 20.0091 6.06199 20.1519 6.11497 20.2826C6.16796 20.4133 6.25625 20.5267 6.36999 20.6101C6.48391 20.6912 6.61825 20.7389 6.75785 20.7478C6.89746 20.7566 7.03675 20.7262 7.15999 20.6601L12 18.1101L16.85 20.6601C16.9573 20.7189 17.0776 20.7499 17.2 20.7501C17.3573 20.7482 17.5105 20.6995 17.64 20.6101C17.7537 20.5267 17.842 20.4133 17.895 20.2826C17.948 20.1519 17.9636 20.0091 17.94 19.8701L17 14.4701L20.93 10.6501C21.0305 10.5523 21.1015 10.4283 21.1351 10.2922C21.1687 10.1561 21.1634 10.0133 21.12 9.88005Z"
                                                    fill="#E4E4E4" />
                                            </svg>
                                        @endfor
                                    </span>
                                </div>
                            </div>
                        </section>
                        <!-- Review Comment -->
                        <section class="flex gap-4">
                            <div class="w-16 h-16">
                            </div>
                            <p class="text-gray-600 col-span-12">
                                {{ $review->comment }}
                            </p>
                        </section>
                    </div>
                @endforeach
            </div>
        </div>

        <section class="rtl">
            <!-- Add Review -->
            <div class="bg-white p-6 rounded-lg mt-8 rtl max-w-3xl" id="add-review">

                @if (session('add_review_success'))
                    <p class="text-white py-4 text-center bg-green-300 font-bold">{{ session('add_review_success') }}</p>
                @endif

                <h2 class="text-2xl font-bold mb-4">
                    أظف تقيمك للمنتج
                </h2>
                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="mb-4">
                        <label for="name">
                            الاسم
                            <span class="text-red-600 text-3xl pt-2">*</span>
                            :
                        </label>
                        @if ($errors->has('name'))
                            <span class="text-red-500 text-sm mt-1">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                        <input placeholder="ادخل ااسم ..." name="name" type="text" rows="4"
                            class="w-full p-2 border rounded" value="{{ old('name') }}" />
                    </div>
                    <div class="mb-4">
                        <label for="email">
                            البريد الالكتروني
                            <span class="text-red-600 text-3xl pt-2">*</span>
                            :
                        </label>
                        @if ($errors->has('email'))
                            <span class="text-red-500 text-sm mt-1">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                        <input name="email" type="email" rows="4" placeholder="exempla@mail.com"
                            class="w-full p-2 border rounded" value="{{ old('email') }}" />
                    </div>
                    <div class="mb-4">
                        <label for="rating" class="mb-4 flex items-center">
                            <span>
                                التقييم
                            </span>
                            <span class="text-red-600 text-3xl pt-2">*</span>
                        </label>
                        <select name="rating" class="w-full p-2 border rounded">
                            <option value="5" selected>5 نجوم</option>
                            <option value="4">4 نجوم</option>
                            <option value="3">3 نجوم</option>
                            <option value="2">2 نجوم</option>
                            <option value="1">1 نجمة</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="comment" class="block mb-2">اترك رسالتك</label>
                        @if ($errors->has('comment'))
                            <span class="text-red-500 text-sm mt-1">
                                {{ $errors->first('comment') }}
                            </span>
                        @endif
                        <textarea name="comment" rows="4" class="w-full p-2 border rounded">{{ old('comment') }}</textarea>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">
                        ارسال
                    </button>

                </form>
            </div>
        </section>

        <!-- Related Products -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4 text-center text-green-500">منتجات دات صلة</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach ($related_products as $product_item)
                    <div class="bg-white p-4 rounded-lg shadow">
                        <a href="{{ route('products.show', $product_item->slug) }}">
                            <img src="{{ $product_item->thumbnail }}" alt=" {{ $product_item->name }}"
                                class="w-full h-40 object-cover bg-gray-200 rounded-lg mb-4">
                            <h3 class="font-semibold mb-2">
                                {{ $product_item->name }}
                            </h3>

                            @if ($product_item->discount_price)
                                <div class="flex gap-1">

                                    <p class="text-sm text-black text-red-400 mb-4 line-through">
                                        {{ $product_item->price }}
                                    </p>
                                    <p class="text-xl font-semibold text-blue-600 mb-4">
                                        {{ $product_item->discount_price }}
                                    </p>
                                </div>
                            @else
                                <p class="text-2xl font-semibold text-blue-600 mb-4">
                                    {{ $product_item->price }}
                                </p>
                            @endif

                        </a>
                        <a href="{{ route('checkout', ['product' => $product_item->slug]) }}"
                            class="w-full inline-block text-center bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition duration-300">
                            شراء الآن
                        </a>
                        <button data-product="{{ $product_item }}"
                            class="w-full my-2 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition
                                duration-300 add-to-cart">
                            Add to Cart
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function changeMainImage(src) {
            document.getElementById('mainImage').src = src;
        }
    </script>


@endsection
