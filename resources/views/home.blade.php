@extends('layouts.app')

@section('title', 'Magic Store | Home')

@section('content')

{{-- @include("home.hero") --}}

@include("home.slider")

@include("home.featured-products")

@include("home.offers")

@include("home.best-selling")

@endsection