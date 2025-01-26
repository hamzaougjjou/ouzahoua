@extends('layouts.app')

@section('title', auth()->user()->name . ' | ' . 'profile')

@section('content')


    <div class="container mx-auto px-4 py-8 rtl">
        <h1 class="text-3xl font-bold mb-8">
            الملف الشخصي
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 ">
            <!-- Personal Information -->
            <div class="md:col-span-1">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-4">
                        المعلوماتك الشصخصية :
                    </h2>
                    <div class="mb-4">
                        <img src="{{ auth()->user()->profile_image }}" alt="User Avatar"
                            class="w-20 h-2w-20 p-1 rounded-full mx-auto mb-4 object-cover bg-gray-300"
                            srcset="{{ asset('assets/avatar-user.svg') }}">
                    </div>
                    <div>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">الاسم :</label>
                            <p
                                class="mt-1 block w-full rounded-md border-gray-300 border-1 shadow-sm  
                                py-2 font-bold text-xl text-green-700">
                                {{ auth()->user()->name }}
                            </p>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">البريد الالكتروني
                                :</label>
                            <p
                                class="mt-1 block w-full rounded-md border-gray-300 border-1 shadow-sm  
                            py-2 font-bold text-xl text-green-700">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">رقم الهاتف : </label>
                            <p
                                class="mt-1 block w-full rounded-md border-gray-300 border-1 shadow-sm  
                            py-2 font-bold text-xl text-green-700">
                                {{ auth()->user()->phone }}
                            </p>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">العنوان : </label>

                            <p class="text-sm text-red-600 italic">
                                العنوان غير متوفر
                            </p>
                            <p
                                class="mt-1 block w-full rounded-md border-gray-300 border-1 shadow-sm  
                            py-2 font-bold text-xl text-green-700">
                                {{ auth()->user()->address }}
                            </p>
                        </div>
                        <button type="submit"
                        id="btn-show-update-profile-container"
                            class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition duration-300">
                            تحديث الملف الشخصي
                        </button>
                    </div>
                </div>
            </div>

            <!-- Order History -->
            <div class="md:col-span-2">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-4">
                        تتبع الطلبيات
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Order ID</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 text-center text-sm font-medium text-gray-900">#12345</td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-500">2023-05-15</td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-500">$129.99</td>
                                    <td class="px-6 py-4 text-center">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                    </td>
                                    <td class="px-6 py-4 text-center text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-center text-sm font-medium text-gray-900">#12344</td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-500">2023-05-10</td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-500">$69.99</td>
                                    <td class="px-6 py-4 text-center">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Processing</span>
                                    </td>
                                    <td class="px-6 py-4 text-center text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-center text-sm font-medium text-gray-900">#12343</td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-500">2023-05-05</td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-500">$39.99</td>
                                    <td class="px-6 py-4 text-center">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                    </td>
                                    <td class="px-6 py-4 text-center text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div
    class="py-12 w-screen h-screen bg-black/50 fixed top-0 left-0 z-50 hidden justify-center items-center transition-all duration-300 transform scale-90 opacity-0"
    id="update-profile-container">

    <div class="rounded-md relative bg-white overflow-y-auto custom-scroll w-fit max-h-[1000px] transition-all duration-300 transform scale-95">
        <span id="btn-close-update-profile-container">
            <img class="w-12 h-12 cursor-pointer rounded-full absolute top-1 right-1 p-1"
                src="{{ asset('assets/close-circle.svg') }}" alt="close">
        </span>

        <div class="max-w-xl w-full mx-auto space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
