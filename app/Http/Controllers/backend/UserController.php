<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::all();
        if($request->has('search')){

            $users=User::where('user_name','like',"%{$request->search}%")
                        ->orWhere('first_name','like',"%{$request->search}%")
                        ->orWhere('last_name','like',"%{$request->search}%")
                        ->orWhere('email','like',"%{$request->search}%")->get();
        }
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        User::create([
            'user_name' => $request->user_name,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users.index')->with('success','User Registered Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request,User $user)
    {
        $user->update([
            'user_name' => $request->user_name,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
        ]);
        return redirect()->route('users.index')->with('success','User Updated Succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Auth::user()->id == $user->id){
            return redirect()->route('users.index')->with('error','User Deleted Unsuccesfully.Cannot Delete yourself');

        }else{
            $user->delete();
            return redirect()->route('users.index')->with('success','User Deleted Succesfully');
        }


    }
}
