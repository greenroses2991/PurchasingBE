<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productprof;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;



class prodprofController extends Controller
{

    public function storPro(Request $request)
    {

        // return $request;
        // if(productprof::where('productname','=',$request->productname)->where('desc','=',$request->desc)->where('unitid','=',$request->unitid)->where('brandid','=',$request->brandid)->exists())
        if(productprof::where('productname','=',$request->productname)->exists())
        {
    return response()->json([
        'message'=>"Already Exist!",
        'code'=>222
    ]);
}


        $vali = $request->validate([
            'productname' =>['required','min:2','max:150'],
            'desc' =>['required','min:2','max:300'],
            'unitid' =>['required'],
            'brandid' =>['required'],
            'imagepathid' =>['required'],
        ],
        [
            'productname.required' => 'The Product name is required.',
            'productname.max' => 'Maximum Char is 150',
            'productname.min' => 'Minimum Char is 2',
    
            'desc.required' => 'The Description is required.',
            'desc.max' => 'Maximum Char is 300',
            'desc.min' => 'Minimum Char is 2',
    
            'unitid.required' => 'The Unit is required.',
    
            'brandid.required' => 'The Brand is required.',
            'imagepathid.required' => 'The Images is required.',
            
            // 'contactnum.regex' => 'From 0-9,-,|,+ is allowed',
           
            ]);
            $productprof = new productprof([
                'productname' => $request->productname,
                'desc' => $request->desc,
                'unitid' => $request->unitid,
                'brandid' => $request->brandid,
                'imagepathid' => $request->imagepathid,
          
            ]);
            $productprof->save();
        
        // return response()->json(productprof::latest()->get());
        return response()->json('ok');



        // return response()->json(Students::latest()->get());


        // $employees = new Employee([
        //     'name' => $request->input('name'),
        //     'address' => $request->input('address'),
        //     'mobile' => $request->input('mobile'),

        // ]);
        // $employees->save();
        // return response()->json('Employee created!');
    }







    public function getProducts()
        {
    //  $productprof= productprof::all();
    // return response()->json($productprof);

    $productprof = DB::table('productprof')
        ->join('unit', 'productprof.unitid', '=', 'unit.id')
        ->join('brand', 'productprof.brandid', '=', 'brand.id')
        ->join('imagepath', 'productprof.imagepathid', '=', 'imagepath.id')
        ->select('productprof.id','productprof.productname', 'productprof.desc','unit.produnit as unit_name', 'brand.prodbrand as brand_name','imagepath.img_path as images_path')
        ->orderBy('productprof.id','desc')
        ->get();
        return response()->json($productprof);
        }
    



public function storeProdprof(Request $request)

    {
// return ['msg'=>"GDfgd"];
        if(productprof::where('productname','=',$request->productname)->where('desc','=',$request->desc)->where('unitid','=',$request->unitid)->where('brandid','=',$request->brandid)->exists())
        // if(productprof::where('productname','=',$request->productname)->exists())
        {
            return response()->json([
                'message'=>"Data is already exist",
                'code'=>222
            ]);
        }
        // $vali = $request->validate([
            $vali=Validator::make($request->all(), [
                // $vali = $request->validate([
            'productname' =>['required','min:2','max:150'],
            'desc' =>['required','min:2','max:300'],
            'unitid' =>['required'],
            'brandid' =>['required'],
            'imagepathid' =>['required'],
            // 'contactnum' =>['required','min:6','max:255','regex:/^([0-9\s\-\|\+\(\)]*)$/'],
        ],
        [
        'productname.required' => 'The Product name is required.',
        'productname.max' => 'Maximum Char is 150',
        'productname.min' => 'Minimum Char is 2',

        'desc.required' => 'The Description is required.',
        'desc.max' => 'Maximum Char is 300',
        'desc.min' => 'Minimum Char is 2',

        'unitid.required' => 'The Unit is required.',

        'brandid.required' => 'The Brand is required.',
        
        'imagepathid.required' => 'The Images is required.',
        
        // 'contactnum.regex' => 'From 0-9,-,|,+ is allowed',
       
        ]);
        if ($vali->fails()) {
            return response()->json(['errors' => $vali->errors()], 422);
        }

        $productprof = new productprof([
            'productname' => $request->productname,
            'desc' => $request->desc,
            'unitid' => $request->unitid,
            'brandid' => $request->brandid,
            'imagepathid' => $request->imagepathid
      
        ]);
        $productprof->save();
        
        // return response()->json(productprof::latest()->get());
        return response()->json(['status'=>'success','message'=>'Succesfully Added!','code'=>'200',productprof::latest()->get()]);
    }
}
