@extends('layouts.app')

@section('title', 'الاشعارات')

@section('content')

    <!-- Offered Products -->
    <section class="px-2 py-16 overflow-hidden rtl">
        <!-- component -->



        @auth

            @if (count($notifications) == 0)
                <div class="p-8 mb-4 text-sm text-yellow-800 rounded-lg  hadow-md
                bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 flex gap-7"
                    role="alert">
                    <p>عفوا لايوجد حاليا اي اشعارات</p>
                    <a href="/" class="text-blue-500">
                        عودة الى الصفحة الرئيسية
                    </a>
                </div>
            @endif

            @foreach ($notifications as $notification)
                @php
                    // Get the base class name without the namespace
                    $notificationType = class_basename($notification->type);
                @endphp

                @if ($notificationType == 'VerifyEmail' || $notificationType == 'CreateAccount')
                    <div
                        class="flex flex-col p-8 {{ $notification->read_at ? 'bg-white' : 'bg-green-50' }} shadow-md hover:shodow-lg rounded-2xl mb-2">
                        <div class="flex items-center justify-between gap-2">
                            <div class="flex items-center gap-2">

                                <svg class="w-16 h-16 rounded-full p-3 border border-blue-100 text-blue-400 bg-blue-50"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15 19.25C15 20.0456 14.6839 20.8087 14.1213 21.3713C13.5587 21.9339 12.7956 22.25 12 22.25C11.2044 22.25 10.4413 21.9339 9.87869 21.3713C9.31608 20.8087 9 20.0456 9 19.25"
                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M5.58096 18.25C5.09151 18.1461 4.65878 17.8626 4.36813 17.4553C4.07748 17.048 3.95005 16.5466 4.01098 16.05L5.01098 7.93998C5.2663 6.27263 6.11508 4.75352 7.40121 3.66215C8.68734 2.57077 10.3243 1.98054 12.011 1.99998V1.99998C13.6977 1.98054 15.3346 2.57077 16.6207 3.66215C17.9069 4.75352 18.7557 6.27263 19.011 7.93998L20.011 16.05C20.0723 16.5452 19.9462 17.0454 19.6576 17.4525C19.369 17.8595 18.9386 18.144 18.451 18.25C14.2186 19.2445 9.81332 19.2445 5.58096 18.25V18.25Z"
                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <div class="flex flex-col ml-3">
                                    <div class="font-medium leading-none">

                                        {{ $notification->data['title'] }}
                                    </div>
                                    <p class="text-sm text-gray-600 leading-none pt-2">
                                        {{ $notification->data['content'] }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                @elseif ($notificationType == 'OrderCompleted')
                    <a href="{{ route('profile.edit', ['order_id' => $notification->data['order_id']]) }}"
                        class="flex flex-col p-8 {{ $notification->read_at ? 'bg-white' : 'bg-green-50' }} shadow-md hover:shodow-lg rounded-2xl mb-2">
                        <div class="flex items-center justify-between gap-2">
                            <div class="flex items-center gap-2">

                                <svg class="w-16 h-16 rounded-full p-3 border border-blue-100 text-blue-400 bg-blue-50"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15 19.25C15 20.0456 14.6839 20.8087 14.1213 21.3713C13.5587 21.9339 12.7956 22.25 12 22.25C11.2044 22.25 10.4413 21.9339 9.87869 21.3713C9.31608 20.8087 9 20.0456 9 19.25"
                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M5.58096 18.25C5.09151 18.1461 4.65878 17.8626 4.36813 17.4553C4.07748 17.048 3.95005 16.5466 4.01098 16.05L5.01098 7.93998C5.2663 6.27263 6.11508 4.75352 7.40121 3.66215C8.68734 2.57077 10.3243 1.98054 12.011 1.99998V1.99998C13.6977 1.98054 15.3346 2.57077 16.6207 3.66215C17.9069 4.75352 18.7557 6.27263 19.011 7.93998L20.011 16.05C20.0723 16.5452 19.9462 17.0454 19.6576 17.4525C19.369 17.8595 18.9386 18.144 18.451 18.25C14.2186 19.2445 9.81332 19.2445 5.58096 18.25V18.25Z"
                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <div class="flex flex-col ml-3">
                                    <div class="font-medium leading-none">

                                        {{ $notification->data['title'] }}
                                    </div>
                                    <p class="text-sm text-gray-600 leading-none pt-2">
                                        {{ $notification->data['content'] }}
                                        <span class="px-2 text-blue-600 font-blod">

                                            معرف الطلب
                                            #{{ $notification->data['order_id'] }}
                                        </span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </a>
                @else
                    <span class="p-4">error to loas this notification</span>
                @endif
            @endforeach
        @else
            <div class="p-8 mb-4 text-sm text-yellow-800 rounded-lg  hadow-md
                bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 flex gap-7"
                role="alert">
                <p>
                    الا يمكن تلقي الاشعارات ان لم تكن مسجلا دخولك
                </p>
                <a href="{{ route('login', ['next' => 'notifications']) }}" class="text-blue-500">
                    تسجيل الدخول
                </a>
            </div>
        @endauth


    </section>


@endsection
