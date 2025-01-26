@extends('layouts.app')

@section('title', $store->name . '| جميع المنتجات ')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@section('content')



    <!-- Offered Products -->
    <section class="py-1">
        <div class="mx-auto">

            <h2
                class="rtl text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r
                 from-blue-500 to-green-600 py-3 px-2">
                جميع المنتجات
            </h2>
            <br />



            <section class="mx-auto p-4 md:flex flex-row-reverse justify-evenly flex-wrap sm:block">
                @include('products.aside')
                @include('products.all-products')
                @include('products.no-products')
            </section>

    </section>

    @include('products.pagination')


@endsection
