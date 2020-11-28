<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show() {
        $users = User::all();
        return view('users', compact('users'));
    }
    
    public function delete(Request $request, $id)
    {
        $request = User::find($id);
        $request->delete($id);
        return redirect('/admin/users');
    }

    public function updateUserInfo(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'group' => ['required'],
            'email' => ['required', 'email','unique:users,email']
        ]);
        
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->save($validatedData);

        return redirect('/admin/users');
    }

    // public function register(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         // 'group' => ['required', 'string'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);

    //     User::create($request->all());

    //     // return redirect('admin/users');
    //     return redirect()->back()->with('success', 'your message here');
    // }
}
