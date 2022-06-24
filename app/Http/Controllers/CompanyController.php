<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = Company::paginate(10);
        return view('company.view',compact('companys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countrys = Country::all();
        // $states = State::all();
        return view('company.add',compact('countrys'));
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
            'name'=> 'required' ,
            'email'=>'required',
            'logo'=>'required',
            'website' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'address'=>'required',


        ]);

        $add = new Company;
        $add->name = $request->name;
        $add->email = $request->email;
          if($request->has('logo'))
        {
            $image = $request->file('logo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public/');
            $image->move($destinationPath, $name);
            $add->logo = $name;
         }
         $add->website = $request->website;
         $add->address = $request->address;
         $add->country_id =$request->country_id;
         $add->state_id = $request->state_id;
         $add->save();
            return redirect()->route('company')->with('success','Company Created successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company ,$id)
    {
        $companys = Company::find($id);
        $countrys = Country::all();
        $getSeletedState = State::find($companys->state_id);
        return view('company.edit',compact('companys','countrys','getSeletedState'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company ,$id)
    {
        $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'logo'=>'required|image|mimes:jpeg,png,jpg,svg|dimensions:min_width=100,min_height=100',
            'website' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'address'=>'required',
        ]);
        $add = Company::find($id);
        $add->name = $request->name;
        $add->email = $request->email;
         if($request->has('logo'))
        {
            $image = $request->file('logo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public/');
            $image->move($destinationPath, $name);
            $add->logo = $name;
         }
         $add->website = $request->website;
         $add->address = $request->address;
         $add->country_id =$request->country_id;
         $add->state_id = $request->state_id;
         $add->save();
            return redirect()->route('company')->with('success','Company Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company ,$id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('employe')->with('success','Company deleted successfully');
    }
     public function getstate(request $request )
    {
        $states = State::where("country_id",$request->countryID)->pluck("name", "id");
        return response()->json($states);
    }
}
