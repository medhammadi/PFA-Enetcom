@extends('layouts.app')

@section('title', 'Edit Product')

@section('contents')
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Edit Product</h1>
    <hr class="border-b border-gray-300 mb-8">

    <div class="max-w-lg mx-auto">
        <form action="{{ route('products/update', $product->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <label class="control-label">Category</label>
            <select name="category_id" class="form-control">
                                        <option value="{{$product->category->id}}">{{$product->category->libelle}}</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
            </select>
            <br>
            <label class="control-label">Tax </label>
                                    <select name="tax_id" class="form-control">
                                        <option value="{{$additional->product->tax->id}}">{{$additional->product->tax->name}} %</option>
                                        @foreach($taxes as $tax)
                                            <option value="{{$tax->id}}">{{$tax->name}} %</option>
                                        @endforeach
                                    </select>
            <div>
                <label for="title" class="block text-sm font-medium leading-6 text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $product->title }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="price" class="block text-sm font-medium leading-6 text-gray-700">Price</label>
                <input id="price" name="price" type="text" value="{{ $product->price }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="product_code" class="block text-sm font-medium leading-6 text-gray-700">Product Code</label>
                <input id="product_code" name="product_code" value="{{ $product->product_code }}" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium leading-6 text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $product->description }}</textarea>
            </div>

            <div>
                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
