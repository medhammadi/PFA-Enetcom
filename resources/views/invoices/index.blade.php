@extends('layouts.app')
 
@section('title', 'Liste des Factures')
 
@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Liste des Factures</h1>
    <a href="{{ route('invoices/create') }}" class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Facture</a>
    <hr />
    @if(Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
 
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">ID de la facture</th>
                <th scope="col" class="px-6 py-3">Customer Name </th>
                <th scope="col" class="px-6 py-3">Total</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Etat</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($invoices as $in)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td scope="col" class="px-6 py-3">{{ 1000 + $in->id }}</td>
                
                @php
                $customer = $customers->where('id', $in->customer_id)->first();
                @endphp
                <td scope="col" class="px-6 py-3">{{ $customer ? $customer->name : 'None' }}</td>
                
                <td scope="col" class="px-6 py-3">{{ $in->total }}</td>
                <td center>{{ $in->created_at->format('Y-m-d') }}</td>
                <td>Reçu</td>
                
                <td class="w-36">
                    <div class="flex space-x-2">
                        <a href="{{ route('invoices/show', $in->id) }}" class="text-blue-800">Détail</a>
                        <a href="{{ route('invoices/edit', $in->id) }}" class="text-green-800">Modifier</a>
                        <form action="{{ route('invoices/destroy', $in->id) }}" method="POST" onsubmit="return confirm('Supprimer?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-800">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        
 
        </tbody>
    </table>
</div>
@endsection
<style>
    td{
        text-align: center;
    }
</style>