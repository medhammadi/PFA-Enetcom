<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
 
class AuthController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
 
    
 
   
 
    public function login()
    {
        return view('auth/login');
    }
 
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
 
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
 
        $request->session()->regenerate();
        $role=auth()->user()->type;
       // dd(auth()->user());
        switch ($role) {
            case "superadmin":
                return redirect()->route('home');
            case "admin":
                return redirect()->route('home');
            case "user":
                return redirect()->route('home');
        }
        return redirect()->route('login');
    }
 
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
 
        $request->session()->invalidate();
 
        return redirect('/');
    }
 
    public function profile()
    {
        return view('userprofile');
    }
    
    
   
   // public function updateProfile(Request $request)
   // {
   //     $user = Auth::user();
   //     $user->update($request->only(['name', 'email']));
   //     return redirect()->route('userprofile')->with('success', 'Profile updated successfully');
   // }
   
   // public function editPassword()
   //     {
   //         return view('user.edit-password');
   //     }
   
  

}