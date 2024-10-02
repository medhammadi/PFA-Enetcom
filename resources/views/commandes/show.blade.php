@extends('layouts.master')

@section('title', 'Invoice | ')
@section('contents')
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .app-content {
            padding: 30px;
        }

        .app-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice {
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .invoice-info address {
            font-style: normal;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #f9f9f9;
        }

        .total {
            font-weight: bold;
        }

        .print-button {
            background-color: #008000;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .print-button:hover {
            background-color: #006400;
        }
    </style>
    <main class="app-content">
        <div class="app-title">
           
            
               
                <b>Invoice</b>
          
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <section class="invoice">
                        <div class="row mb-4">
                            <div class="col-6">
                                <h5 class="text-right">Date: {{$invoice->created_at->format('Y-m-d')}}</h5>
                            </div>
                        </div>
@php
  // Assuming you have a collection of customers named $customers
  $customer = $customers->where('id', $invoice->customer_id)->first();
@endphp

<div class="row invoice-info">
  <div class="col-4">
    <address>
      <strong>CodeAstro</strong><br>
      Demo,<br>
      Address<br>
      codeastro.com
    </address>
  </div>
  <div class="col-4">
    <address>
      <strong>{{ $customer->name }}</strong><br>
      {{ $customer->address }}<br>
      Phone: {{ $customer->mobile }}<br>
      Email: {{ $customer->email }}
    </address>
  </div>
  <div class="col-4">
    <b>Invoice #{{ 1000 + $invoice->id }}</b><br><br>
    <b>Order ID:</b> 4F3S8J<br>
    <b>Payment Due:</b> {{ $invoice->created_at->format('Y-m-d') }}<br>
    <b>Account:</b> 000-12345
  </div>
</div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Amount</th>
                                     </tr>
                                    </thead>
                                    <tbody>
                                    <div style="display: none">
                                        {{$total=0}}
                                    </div>
                                    @foreach($sales as $sale)
                                    <tr>
                                        <td>{{$sale->product->title}}</td>
                                        <td>{{$sale->qty}}</td>
                                        <td>{{$sale->price}}</td>
                                        <td>{{$sale->dis}}%</td>
                                        <td>{{$sale->amount}}</td>
                                        <div style="display: none">
                                            {{$total +=$sale->amount}}
                                        </div>
                                     </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total</b></td>
                                        <td><b class="total">{{$total}}</b></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div><br><br>
                        <div class="row d-print-none mt-12 justify-content-end">
                           <a class="btn print-button" href="javascript:void(0);" onclick="printInvoice();"><i class="fa fa-print"></i> Print</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>


  
    <script>
        function printInvoice() {
            document.querySelector('.print-button').style.display = 'none'; // Hide the print button
            window.print();
            document.querySelector('.print-button').style.display = 'inline-block'; // Show the print button after printing
        }
    </script>
    

@endsection
@push('js')
@endpush





