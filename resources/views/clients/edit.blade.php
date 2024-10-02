
@extends('layouts.app')
 
@section('title', 'Edit Client')
 
@section('contents')
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Edit Client</h1>
    <hr class="border-b border-gray-300 mb-8">
    
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
        <form action="{{ route('clients/update', $client->id) }}" method="POST" class="space-y-6">
            @csrf
            
            @method('PUT')

            <style>
                /* Improved form styling */
                label {
                    font-weight: bold;
                    margin-bottom: 0.4rem;
                }
                input {
                    padding: 0.5rem 1rem;
                    font-size: 1rem;
                    border-radius: 5px;
                }
                button {
                    background-color: #007bff; /* Primary blue color */
                    border-color: #007bff;
                }
            </style>
            <div>
                <label for="nom_c" class="block text-sm font-medium leading-6 text-gray-700">Nom_C</label>
                <input type="text" name="nom_c" id="nom_c" value="{{ $client->nom_c }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="prenom_c" class="block text-sm font-medium leading-6 text-gray-700">Prénom_C</label>
                <input type="text" name="prenom_c" id="prenom_c" value="{{ $client->prenom_c }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="client_code" class="block text-sm font-medium leading-6 text-gray-700">Client_Code</label>
                <input type="text" name="client_code" id="client_code" value="{{ $client->client_code }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="adr_c" class="block text-sm font-medium leading-6 text-gray-700">Adr_C</label>
                <input type="text" name="adr_c" id="adr_c" value="{{ $client->adr_c }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>


            <div>
                <label for="email_c" class="block text-sm font-medium leading-6 text-gray-700">Email_C</label>
                <input id="email_c" name="email_c" type="email" value="{{ $client->email_c }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="num_tel" class="block text-sm font-medium leading-6 text-gray-700">Num_Tel</label>
                <input id="num_tel" name="num_tel" type="text" value="{{ $client->num_tel }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2">
                <button type="submit" class="flex w-full justify-center mt-10 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
