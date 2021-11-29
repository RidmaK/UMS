<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use SebastianBergmann\LinesOfCode\Counter;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::all();
        if($request->has('search')){

            $countries=Country::where('name','like',"%{$request->search}%")
                        ->orWhere('country_code','like',"%{$request->search}%")->get();
        }
        return view('country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStoreRequest $request,Country $country)
    {
        dd($request);
        Country::create([
            'country_code' => $request->country_code,
            'name' => $request->name,
        ]);
        return redirect()->route('countries.index')->with('success','Country Added Successfully');
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
    public function edit(Country $country)
    {
        return view('country.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryStoreRequest $request,Country $country)
    {
        $country->update([
            'country_code' => $request->country_code,
            'name' => $request->name,
        ]);
        return redirect()->route('countries.index')->with('success',$request->name.' Country Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')->with('success',$country->name.' Deleted Successfully');
    }
}
