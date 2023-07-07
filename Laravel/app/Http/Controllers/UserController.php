<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function reg()
    {
        $user = User::all();
        return view('admin/users', compact('user'));
    }

    public function registerOrUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required', 
            'is_admin' => 'required',
        ]);

        $nombres = $validatedData['name'];
        $existingUser = User::where('name', $nombres)->first();

        if ($existingUser) {
            $existingUser->update($validatedData);

        } else {
            User::create($validatedData);
        }
        return redirect()->route('user.register');
    }
    
    public function delete($nombres)
    {
        $decode = urldecode($nombres);
        $user= User::where('name', $decode)->firstOrFail();
        $user->delete();
        return redirect()->route('user.register');
    }
}
