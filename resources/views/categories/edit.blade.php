@extends('layouts.app')

@section('title', 'Edit Categorie')

@section('contents')
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Edit Categorie</h1>
    <hr class="border-b border-gray-300 mb-8">

    <div class="max-w-lg mx-auto">
        <form action="{{ route('categories/update', $categorie->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="libelle" class="block text-sm font-medium leading-6 text-gray-700">Libellé</label>
                <input type="text" name="libelle" id="libelle" value="{{ $categorie->libelle }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="categorie_code" class="block text-sm font-medium leading-6 text-gray-700">Categorie Code</label>
                <input id="categorie_code" name="categorie_code" type="text" value="{{ $categorie->categorie_code }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium leading-6 text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $categorie->description }}</textarea>
            </div>

            <div>
                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
