@extends('layouts.home')

@section('title', 'Home')

@section('contents')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Home
        </h1>
    </div>
</header>
<hr />
<main>
    <div class="max-w-7xl mx-auto py-0 sm:px-15 lg:px-1">
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-dashed border-gray-200 rounded-lg h-95">
                <img src="{{ asset('images/2.jpg') }}" alt="Image" class="object-cover w-full h-full">
            </div>
        </div>
    </div>
</main>
@endsection
