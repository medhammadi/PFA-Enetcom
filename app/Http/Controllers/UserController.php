<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $user = User::orderBy('name')->paginate(10); 
      
        return view('users.index',compact('user'));

    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
        ]);
 
        return redirect()->route('users')->with('success', 'User added successfully');
    }
    // public function store(Request $request)
    // {
    //     Product::create($request->all());
 
    //     return redirect()->route('admin/users')->with('success', 'User added successfully');
    // }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
 
        return view('users.show', compact('user'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
 
        return view('users.edit', compact('user'));
    }
 
    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, string $id)
     {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
        ]);
 
         return redirect()->route('users')->with('success', 'User updated successfully');
     }
 
    /**
       * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
 
        $user->delete();
 
        return redirect()->route('users')->with('success', 'User deleted successfully');
    }


    public function userprofile()
    {
        return view('userprofile');
    }
 
    public function about()
    {
        return view('about');
    }
    

    /** Profile de user */

    public function editPassword()
    {
        $id=auth::user()->id;
        $profiledata=User::find($id);
        return view('edit-password',compact('profiledata'));

    }

  



 
    public function updatePassword(Request $request)
    {
        // $request->validate([
        //     'current_password' => 'required',
        //     'new_password' => 'required|min:8|different:current_password|confirmed',
        //     'password_confirmation' => 'required|same:new_password',
        // ]);

// dd($request);
       $user = auth()->user();
      
        // Vérifie si le mot de passe actuel est correct
        if (!Hash::check($request->current_password, auth::user()->password)) {
            return redirect()->route('profile.edit')->with('message1', 'Password current does not Match! ');
            // return back()->with('$notif');
        }
    
        // Met à jour le mot de passe de l'utilisateur
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->route('profile.edit')->with('message2', 'Password updated successfully');
        
    
    }
    
    
}


