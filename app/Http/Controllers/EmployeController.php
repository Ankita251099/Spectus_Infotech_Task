<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::all();
        $companys = Company::all();
        return view('employe.view',compact('employes','companys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companys = Company::all();
        return view('employe.add',compact('companys'));
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
            'first_name'=> 'required' ,
            'last_name'=> 'required' ,
            'email'=>'required',
            'company_id'=>'required',
            'mobile_number'=>'required|max:10'


        ]);
        $add = new Employe;
        $add->first_name = $request->first_name;
        $add->last_name = $request->last_name;
        $add->email = $request->email;
        $add->company_id = $request->company_id;
        $add->mobile_number = $request->mobile_number;
        $add->save();
        return redirect()->route('employe')->with('success','Employe Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe ,$id)
    {
        $companys = Company::all();
        $employes = Employe::find($id);
        return view('employe.edit',compact('companys','employes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe, $id)
    {
       $request->validate([
        'first_name'=> 'required' ,
        'last_name'=> 'required' ,
        'email'=>'required',
        'company_id'=>'required',
        'mobile_number'=>'required|max:10'


    ]);
       $add = Employe::find($id);
       $add->first_name = $request->first_name;
       $add->last_name = $request->last_name;
       $add->email = $request->email;
       $add->company_id = $request->company_id;
       $add->mobile_number = $request->mobile_number;
       $add->save();
       return redirect()->route('employe')->with('success','Employe updated successfully');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe ,$id)
    {
        $employes = Employe::find($id);
        $employes->delete();
        return redirect()->route('employe')->with('success','Employe deleted successfully');
    }

    public function searchcompany(request $request)
    {
       $employes= Employe::where('company_id',$request->data)->first();
       if($employes != null)
       {
           $employes= Employe::all();
       }
       else
       {
        $employes= Employe::where('company_id',$request->data)->get();
        
    }

    $allData = view('employe.employetable', compact('employes'))->render();
    $data=['data' => $allData];
    return Response()->json($data);

}
}
