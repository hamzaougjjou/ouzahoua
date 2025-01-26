<div class="container container-two" id="product-by-category">
    <div class="section-heading">
        <h3 class="section-heading__title">المنتجات الجديده
        </h3>
    </div>

    <ul class="nav common-tab justify-content-center nav-pills mb-48">

        <li class="nav-item">
            <a class="nav-link" href="/#product-by-category">
                كل المنتجات
            </a>
        </li>
        @foreach ($global_categories as $category)
            <li class="nav-item">
                <a class="nav-link" href="?category={{$category->slug}}#product-by-category">
                    {{$category->title }}
                </a>
            </li>
        @endforeach

    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"
            tabindex="0">
            <div class="row gy-4">

                @foreach ($latest_products as $product)
                            <!-- ===========product item ======= -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 relative">
                                <div class="product-item">
                                    <div class="product-item__thumb d-flex">
                                        <a href="/shop/{{$product->slug}}" class="link w-100">
                                            <img src="{{$product->thumbnail}}" alt="{{$product->name}}"
                                                class="cover-img placeholder-img !min-h-[250px]" />
                                        </a>
                                        <!-- <button type="button" class="product-item__wishlist">
                                            <i class="fas fa-heart"></i>
                                        </button> -->

                                        <button type="button" 
                                        data-product="{{ $product }}"
                                        class="add-to-cart hover:bg-sky-700 z-50"
                                        style="
                                        position:absolute;
                                        top: 6px;
                                        left: 6px !important;
                                        background-color: #6E5DA1;
                                        padding:5px;
                                        border-radius:50%;
                                        display:flex;
                                        align-items:center;
                                        justify-center;
                                        "

                                        >
                                            <svg height="30px" width="30px" version="1.1" id="Capa_1"
                                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                viewBox="0 0 294.873 294.873" xml:space="preserve">
                                                <g>
                                                    <path style="fill:#ffffff;" d="M287.373,37.98h-46.046c-8.789,0-17.546,6.626-19.936,15.085l-12.438,44.023
                                                                            c-1.423-0.396-2.92-0.625-4.478-0.625H99.761c-5.056-22.543-25.217-39.442-49.263-39.442C22.653,57.021,0,79.675,0,107.518
                                                                            c0,25.479,18.974,46.601,43.532,50.006c-0.011,0.329-0.009,0.661,0.024,0.998l2.61,26.457c0.925,9.373,9.027,16.715,18.446,16.715
                                                                            h115.462c8.827,0,17.546-6.675,19.85-15.195l14.439-53.397c0.001-0.001,0.001-0.003,0.001-0.003l21.46-75.955
                                                                            c0.583-2.061,3.359-4.163,5.502-4.163h46.046c4.142,0,7.5-3.357,7.5-7.5S291.515,37.98,287.373,37.98z M15,107.518
                                                                            c0-19.573,15.924-35.497,35.498-35.497s35.497,15.924,35.497,35.497c0,19.573-15.924,35.497-35.497,35.497S15,127.092,15,107.518z
                                                                            M185.445,182.583c-0.551,2.036-3.262,4.111-5.371,4.111H64.612c-1.646,0-3.356-1.549-3.518-3.188l-2.578-26.135
                                                                            c22.774-3.65,40.497-22.58,42.31-45.908h103.648c0.072,0,0.137,0.003,0.193,0.007c-0.011,0.056-0.025,0.119-0.044,0.188
                                                                            L185.445,182.583z" />
                                                    <path style="fill:#ffffff;" d="M86.504,210.236c-12.863,0-23.328,10.465-23.328,23.328c0,12.863,10.465,23.328,23.328,23.328
                                                                            c12.863,0,23.329-10.465,23.329-23.328C109.833,220.701,99.367,210.236,86.504,210.236z M86.504,241.892
                                                                            c-4.592,0-8.328-3.736-8.328-8.328c0-4.592,3.736-8.328,8.328-8.328c4.592,0,8.329,3.736,8.329,8.328
                                                                            C94.833,238.156,91.096,241.892,86.504,241.892z" />
                                                    <path style="fill:#ffffff;" d="M160.472,210.236c-12.863,0-23.328,10.465-23.328,23.328c0,12.863,10.465,23.328,23.328,23.328
                                                                            c12.863,0,23.328-10.465,23.328-23.328C183.8,220.701,173.335,210.236,160.472,210.236z M160.472,241.892
                                                                            c-4.592,0-8.328-3.736-8.328-8.328c0-4.592,3.736-8.328,8.328-8.328c4.592,0,8.328,3.736,8.328,8.328
                                                                            C168.8,238.156,165.064,241.892,160.472,241.892z" />
                                                    <path style="fill:#ffffff;"
                                                        d="M57.996,126.094v-11.075h11.078c4.142,0,7.5-3.357,7.5-7.5s-3.358-7.5-7.5-7.5H57.996V88.94
                                                                            c0-4.143-3.358-7.5-7.5-7.5s-7.5,3.357-7.5,7.5v11.078H31.921c-4.142,0-7.5,3.357-7.5,7.5s3.358,7.5,7.5,7.5h11.075v11.075
                                                                            c0,4.143,3.358,7.5,7.5,7.5S57.996,130.236,57.996,126.094z" />
                                                </g>
                                            </svg>
                                        </button>

                                    </div>
                                    <div class="product-item__content">
                                        <h6 class="product-item__title">
                                            <a href="/shop/{{$product->slug}}" class="link">
                                                {{ $product->name }}
                                            </a>
                                        </h6>
                                        <div class="product-item__info flx-between gap-2">

                                            <div class="flx-align gap-2">
                                                @if ($product->discount_price)
                                                    <h6 class="product-item__price mb-0">-
                                                        {{ $product->discount_price  }}
                                                        ريال سعودي
                                                    </h6>
                                                    <span class="product-item__prevPrice text-decoration-line-through">
                                                        -
                                                        {{ $product->price  }}
                                                        ريال سعودي
                                                    </span>
                                                @else
                                                    <h6 class="product-item__price mb-0">
                                                        -
                                                        {{ $product->price  }}
                                                        ريال سعودي
                                                    </h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-item__bottom flx-between gap-2">
                                            <div>

                                                <div class="d-flex align-items-center gap-1">
                                                    <ul class="star-rating">
                                                        @if (count($product->reviews) == 0)
                                                            @for ($i = 0; $i < 5; $i++)
                                                                <li class="star-rating__item font-11">
                                                                    <i class="fas fa-star"></i>
                                                                </li>
                                                            @endfor
                                                        @else
                                                                                                @php
                                                                                                    $averageRating = $product->reviews ?
                                                                                                        collect($product->reviews)->avg('rating') : 0;
                                                                                                    $roundedRating = ceil($averageRating);
                                                                                                @endphp

                                                                                                @for ($i = 0; $i < $roundedRating; $i++)
                                                                                                    <li class="star-rating__item font-11">
                                                                                                        <i class="fas fa-star"></i>
                                                                                                    </li>
                                                                                                @endfor
                                                                                                @for ($i = 0; $i < 5 - $roundedRating; $i++)
                                                                                                    <li class="star-rating__item font-11">
                                                                                                        <i class="fas fa-star !text-gray-300"></i>
                                                                                                    </li>
                                                                                                @endfor
                                                        @endif

                                                    </ul>
                                                    <span class="star-rating__text text-heading fw-500 font-14">
                                                        (
                                                        {{ count($product->reviews) }})
                                                    </span>
                                                </div>
                                            </div>
                                            <a href="/shop/{{$product->slug}}" class="btn btn-outline-light btn-sm pill">عرض
                                                المزيد</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ===========product item ======= -->
                @endforeach

            </div>
        </div>
    </div>

    <div class="text-center mt-64">
        <a href="{{route('products')}}" class="btn btn-main btn-lg pill fw-300">
            أظهر جميع النتجات
        </a>
    </div>
</div>