<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Imports\CitiesImport;
use Session;
use Maatwebsite\Excel\Facades\Excel;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('backend.city.index')
        ->withCities($cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'state'=>'required|string',
            'postal_code'=>'required|string',
            'iso2'=>'nullable|string',
            'country'=>'nullable|string',
            'iso3'=>'nullable|string',
            'population'=>'nullable|string',
        ]);
        $city = City::create([
            'name'=>$request->name,
            'state'=>$request->state,
            'iso2'=>'PK',
            'iso3'=>'PAK',
            'country'=>'Pakistan',
            'postal_code'=>$request->postal_code,
            'population'=>$request->population,

        ]);
        alert()->success('success','New City Added');
        return redirect()->route('cities.edit',$city->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('cities.edit',$id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        return view('backend.city.edit')
        ->withCity($city);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string',
            'state'=>'required|string',
            'postal_code'=>'required|string',
            'population'=>'nullable|string',
        ]);

        $city = City::find($id);
        $city->name = $request->name;
        $city->state = $request->state;
        $city->postal_code = $request->postal_code;
        $city->population = $request->population;
        $city->save();
        alert()->success('success','City Data Updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addCities(){

        return view('backend.city.import');
    }


       /**
    * @return \Illuminate\Support\Collection
    */

    public function importCities() 
    {
        Excel::import(new CitiesImport,request()->file('file'));
             
        return back();
    }

             /*
    AJAX request
    */
    public function getCities(Request $request)
    {
        $search = $request->search;
        //$companyid= $request->Companyid;

        if ($search == '') {
            $cities = City::where('state','Punjab')->orderby('name', 'asc')->select('id', 'name', 'state')->limit(5)->get();
        } else {
            $cities = City::orderby('name', 'asc')->select('id', 'name', 'state')

                ->where(function ($q) use ($search) {
                    $q->orWhere('name', 'like', '%' . $search . '%')
                        ->orWhere('state', 'like', '%' . $search . '%');
                })
                ->get();
        }

        
        $response = array();
        foreach ($cities as $city) {
            $response[] = array(
                "id" => $city->id,
                "text" => $city->name . ' | ' . $city->state,

            );
        }

        return response()->json($response);
    }

}