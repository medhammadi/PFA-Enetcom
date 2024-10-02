@extends('layouts.app')
 
@section('title', 'Show Client')
 
@section('contents')
<h1 class="font-bold text-2xl ml-3">Detail Client</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Nom_C</label>
            <div class="mt-2">
                {{ $client->nom_c }}
            </div>
        </div>
 
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Prénom_C</label>
            <div class="mt-2">
                {{ $client->prenom_c }}
            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Email_C</label>
            <div class="mt-2">
                {{ $client->email_c }}
            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Client_Code</label>
            <div class="mt-2">
                {{ $client->client_code }}
            </div>
        </div>
        </form>
    </div>
</div>
@endsection


