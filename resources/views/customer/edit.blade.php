@extends('layouts.app')

@section('title', 'Customer | ')
@section('contents')
<style>
    .app-content {
        font-family: Arial, sans-serif;
    }

    .app-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .tile-title {
        font-size: 18px;
        font-weight: bold;
        color: #666;
    }

    .form-control {
        border-radius: 4px;
        padding: 8px;
        margin-bottom: 16px;
        width: 100%;
    }

    .btn-success {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-success:hover {
        background-color: #45a049;
    }
</style>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Edit Customer</h1>
            </div>

        </div>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="row">
            <div class="clearix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Edit Customer Form</h3>
                    <div class="tile-body">
                        <form class="row" method="POST" action="{{route('customer.update', $customer->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group col-md-12">
                                <label class="control-label">Customer Name</label>
                                <input value="{{ $customer->name }}" name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter Unit Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Contact</label>
                                <input value="{{ $customer->mobile }}" name="mobile" class="form-control @error('mobile') is-invalid @enderror" type="text" placeholder="Enter Unit Name">
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Address</label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ $customer->address }}</textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Details</label>
                                <textarea  name="details" class="form-control @error('details') is-invalid @enderror">{{ $customer->details }}</textarea>
                                @error('details')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label">Age</label>
                                <input value="{{ $customer->previous_balance }}" name="previous_balance" class="form-control @error('previous_balance') is-invalid @enderror" type="text" placeholder="Enter Unit Name">
                                @error('previous_balance')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 align-self-end">
                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection



