
@extends('layouts.app')

@section('title', 'Customer | ')
@section('contents')

    <main class="app-content">


        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

            <div class="clearix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title"><b>AddCustomer</b></h3><hr><br>
                    <div class="tile-body">
                        <form method="POST" action="{{route('customer.store')}}">
                            @csrf
                            <style>
                            /* Ajoutez vos styles CSS ici */
                            .form-group {
                                margin-bottom: 20px;
                            }
                            .form-group label {
                                font-weight: bold;
                            }
                            .form-control {
                                width: 100%;
                                padding: 8px;
                                border-radius: 4px;
                                border: 1px solid #ccc;
                            }
                            .btn-success {
                                padding: 10px 20px;
                                background-color: #28a745;
                                color: #fff;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;
                            }
                            .btn-success:hover {
                                background-color: #218838;
                            }
                        </style>
                            <div class="form-group col-md-12">
                                <label class="control-label">Customer Name</label>
                                <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter Customer's Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Contact</label>
                                <input name="mobile" class="form-control @error('mobile') is-invalid @enderror" type="text" placeholder="Enter Contact Number">
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Address</label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror"></textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Details</label>
                                <textarea name="details" class="form-control @error('details') is-invalid @enderror"></textarea>
                                @error('details')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label">Age</label>
                                <input name="previous_balance" class="form-control @error('previous_balance') is-invalid @enderror" type="text" >
                                @error('previous_balance')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group col-md-4 align-self-end">
                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Add Customer Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection



