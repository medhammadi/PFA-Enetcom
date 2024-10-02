@extends('layouts.app')

@section('title', 'Create User')

@section('contents')
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Add User</h1>
    <hr class="border-b border-gray-300 mb-8">

    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
        <form action="{{ route('users/store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-700">Email</label>
                <input id="email" name="email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium leading-6 text-gray-700">Password</label>
                <input id="password" name="password" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
    <div class="flex">
    <label for="type" class="block text-sm font-medium leading-6 text-gray-700">Type</label>
    <div class="ml-2 flex">
        <input id="type_0" name="type" type="radio" value="0" class="mt-1 block rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <label for="type_0" class="ml-1">0</label>
    </div>
    <div class="ml-2 flex">
        <input id="type_1" name="type" type="radio" value="1" class="mt-1 block rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <label for="type_1" class="ml-1">1</label>
    </div>
    <div class="ml-2 flex">
        <input id="type_2" name="type" type="radio" value="2" class="mt-1 block rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <label for="type_2" class="ml-1">2</label>
    </div>
</div>


</div>




            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2">
                <button type="submit" class="flex w-full justify-center mt-10 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
