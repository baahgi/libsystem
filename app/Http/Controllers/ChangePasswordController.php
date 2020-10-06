<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function create()
    {
        return view('changepassword.create');
    }


    public function store(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|string|min:8|confirmed|different:password'
        ]);

        if(Hash::check($request->password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()
                             ->with('success', 'Password changed successfully');
        }else{
            return back()->with('danger', 'Password does not match');
        }
    }
}
