@extends('layouts.app')

@section('title', 'Tax | ')
@section('contents')

    <main class="app-content">
        <div class="app-title">

        </div>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="row mt-2">
            <div class="clearix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">New Tax Form</h3>
                    <div class="tile-body">
                        <form method="POST" action="{{route('taxs/store')}}">
                            @csrf
                            <div class="form-group col-md-12">
                                <label class="control-label">Tax Amount</label><br>
                                <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter Tax Amount">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4 align-self-end">
                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

<style>
    /* Add your custom styles here */
    /* Additional styles for form elements, buttons, and overall layout enhancement */
    .tile {
        background-color: #f9f9f9;
        border: 1px solid #e9e9e9;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .tile-title {
        font-size: 24px;
        margin-bottom: 15px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn {
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
        border: 1px solid #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 14px;
    }
</style>
