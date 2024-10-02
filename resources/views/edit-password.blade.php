@extends('layouts.app')

@section('title', 'Change Password')

@section('contents')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* Apply a global box-sizing rule */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        /* Style the form container */
        form {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Style the input and label elements */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        /* Style the submit button */
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover,
        button[type="submit"]:focus {
            background-color: #0056b3;
        }

        /* Improve accessibility: focus styles */
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            form {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
@if(Session::has('message2'))
    <div style="position: fixed; top: 100px; right: 19px; z-index: 9999;">
        <span class="p-4 mb-4 text-sm text-green-1800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">{{ Session::get('message2') }}</span>
    </div>
@endif

    <form method="POST" action="{{  route('password.update')  }}" class="space-y-4">
        @csrf
        @if(auth()->user()->type == 'superadmin' || auth()->user()->type == 'admin')
        <img src="/images/super.jpg" alt="Profile" style="max-width: 10%; height: auto;" class="block text-sm font-medium text-gray-700">
        @endif
        @if(auth()->user()->type == 'user')
        <img src="/images/user.png" alt="Profile" style="max-width: 10%; height: auto;" class="block text-sm font-medium text-gray-700">
        @endif
        <div>
        <label class="label">
            <span class="block text-sm font-medium text-gray-700">Name:</span>
        </label>
        <input name="name" type="text" value="{{ auth()->user()->name }}" class="w-full input input-bordered" />
        </div>
        <div>
        <label class="label">
               <span class="block text-sm font-medium text-gray-700">Email:</span>
        </label>
        <input name="email" type="text" value="{{ auth()->user()->email }}" class="w-full input input-bordered" />
        </div>
        <h1><b>Update Password</b></h1><br>
        <div>
            <label for="old_password" class="block text-sm font-medium text-gray-700">Current Password:</label>
            <input type="password" id="current_password" name="current_password" class="text-base label-text">
            @if(Session::has('message1'))
                <span  class="text-red-500">{{ Session::get('message1') }}</span>
            @endif
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">New Password:</label>
            <input type="password" id="new_password" name="new_password" class="text-base label-text">
        </div>
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="text-base label-text">
        </div>
        <div class="flex items-center justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update Password
            </button>
            <button type="reset" class="inline-flex items-center ml-4 px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Reset
            </button>
        </div>
    </form>
</body>

@endsection
