<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateStoreRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = State::all();
        if($request->has('search')){

            $states=State::where('name','like',"%{$request->search}%")->get();
        }
        return view('state.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('state.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateStoreRequest $request,State $state)
    {
        State::create([
            'country_id' => $request->country_id,
            'name' => $request->name,
        ]);
        return redirect()->route('states.index')->with('success' , 'State Added Successfully');
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
    public function edit(State $state)
    {
        $countries = Country::all();
        return view('state.edit',compact('state','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateStoreRequest $request, State $state)
    {
        $state->update([
            'country_id' => $request->country_id,
            'name' => $request->name,
        ]);
        return redirect()->route('states.index')->with('success',$request->name.' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('success',$state->name.' Deleted Successfully');
    }
}
