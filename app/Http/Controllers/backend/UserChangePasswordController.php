<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordChangeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserChangePasswordController extends Controller
{
    public function change_password(UserPasswordChangeRequest $request ,User $user){
        $request->validate([
            'password'=>['required'],
            'password_confirmation'=>['required','same:password'],
        ]);

        $user->update([
            'password'=> Hash::make($request->password),
        ]);
        return redirect()->route('users.index')->with('success','User Password Changed Succesfully');

    }
}
