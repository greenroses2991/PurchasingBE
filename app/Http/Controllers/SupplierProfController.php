<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\supplierprof;
use App\Rules\UniqueSupplier;

class SupplierProfController extends Controller
{

    public function getSupplierProf()
    {
        // $Brand=brands::get();
        // $Brand=\DB::connection('mysql')->select('');
        $Supplierprof=\DB::select('select * from supplierprof order by suppliername asc');


        return response()->json($Supplierprof);
    }
    
    public function store(Request $request)
    {
        if(supplierprof::where('suppliername','=',$request->suppliername)->where('address','=',$request->address)->where('contactperson','=',$request->contactperson)->where('contactnum','=',$request->contactnum)->orWhere('suppliername','=',$request->suppliername)->Where('address','=',$request->address)->orWhere('contactnum','=',$request->contactnum)->exists())
{
    return response()->json([
        'message'=>"Already Exist the ff: Supplier Name + Address + Contact Person OR Contact number!",
        'code'=>222
    ]);
}

        // $request->validate([
        //     'suppliername' => ['required', 'string', new UniqueSupplier],
        //     // Add other validation rules for other fields as needed
        // ]);
 
        // $validated = $request->validated();
        // $Supplierprof = new supplierprof([
        // 'suppliername' => $request->input('suppliername'),
        // 'address' => $request->input('address'),
        // 'contactperson' => $request->input('contactperson'),
        // 'contactnum' => $request->input('contactnum'),
        $vali = $request->validate([
            'suppliername' =>['required','min:2','max:255'],
            'address' =>['required','min:5','max:255'],
            'contactperson' =>['required','min:2','max:255'],
            'contactnum' =>['required','min:6','max:255','regex:/^([0-9\s\-\|\+\(\)]*)$/'],
        ],
        [
        'suppliername.required' => 'The Supplier Name is required.',
        'suppliername.max' => 'Maximum Char is 255',
        'suppliername.min' => 'Minimum Char is 2',

        'address.required' => 'The Address is required.',
        'address.max' => 'Maximum Char is 255',
        'address.min' => 'Minimum Char is 5',

        'contactperson.required' => 'The Contact Person is required.',
        'contactperson.max' => 'Maximum Char is 255',
        'contactperson.min' => 'Minimum Char is 2',

        'contactnum.required' => 'The Contact Number is required.',
        'contactnum.max' => 'Maximum Char is 255',
        'contactnum.min' => 'Minimum Char is 6',
        'contactnum.regex' => 'From 0-9,-,|,+ is allowed',
       
        ]);
        $Supplierprof = new supplierprof([
            'suppliername' => $request->suppliername,
            'address' => $request->address,
            'contactperson' => $request->contactperson,
            'contactnum' => $request->contactnum
      
        ]);
        $Supplierprof->save();
        
        return response()->json(supplierprof::latest()->get());
        // return response()->json(Students::latest()->get());


        // $employees = new Employee([
        //     'name' => $request->input('name'),
        //     'address' => $request->input('address'),
        //     'mobile' => $request->input('mobile'),

        // ]);
        // $employees->save();
        // return response()->json('Employee created!');
    }
    public function getByIdSupp($id)
    {
        // $Supplierprof=Supplierprof::find(id)->first();
        // return response()->json(Supplierprof);
            return response()->json(Supplierprof::whereId($id)->first());
           
           
    }
}
