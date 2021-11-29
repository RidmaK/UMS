<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreController;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::all();
        if($request->has('search')){

            $cities=City::where('name','like',"%{$request->search}%")->get();
        }
        return view('city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('city.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreController $request, City $city )
    {
        City::create([
            'state_id' => $request->state_id,
            'name' => $request->name,
        ]);

        return redirect()->route('cities.index')->with('success',$request->name.' Created Successfully');
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
    public function edit(City $city)
    {
        $states = State::all();
        return view('city.edit',compact('city','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityStoreController $request,City $city)
    {
        $city->update([
            'state_id' => $request->state_id,
            'name' => $request->name,
        ]);

        return redirect()->route('cities.index')->with('success',$request->name.' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('success',$city->name.' Deleted Successfully');

    }
}
