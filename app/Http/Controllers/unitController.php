<?php

namespace App\Http\Controllers;
//use App\Http\Requests\FormDataRequest;
use Illuminate\Http\Request;
use App\Models\units;
use Illuminate\Support\Facades\Validator;
// use App\Exceptions\ApiNotFoundException;
// use Illuminate\Database\Eloquent\ModelNotFoundException;

class unitController extends Controller
{
    public function getUnits()
    {
        $unit=units::orderBy('produnit','asc')->get();
        // $unit=units::orderBy('produnit','asc')->get();
        return response()->json($unit);
    }
    public function getUnitId($id)
    {
        // if(units::where('id','!=',$request->id)->get())
        // {
        //     return response()->json([
        //         'message'=>"no data",
        //         'code'=>222
        //     ]);
        // }
        $unit=units::whereId($id)->first();
        return response()->json($unit);

        // $unit = unit::find($id);
        // return response()->json($unit);
    }

    public function storeUnit(Request $request)
    {
        if(units::where('produnit','=',$request->produnit)->exists())
        {
            return response()->json([
                'message'=>"Data is Exist",
                'code'=>222
            ]);
        }

        $vali = $request->validate([
            // $vali=Validator::make($request->all(), [
            'produnit' =>['required','min:2','max:8'],
        ],
        [
        'produnit.max' => 'Maximum Char is 8',
        'produnit.min' => 'Minimum Char is 2',
        'produnit.required' => 'Unit is Required!'
        ]);
        // if ($vali->fails()) {
        //     return response()->json(['errors' => $vali->errors()], 422);
        // }
        // $validator = Validator::make($request->all(), [
        //     'produnit' => ['required','max:5'],
    
        //     ],[
        //         'produnit.required' => 'The attribute field is required.',
        //         'produnit.max' => 'Maximum Char is 5 .',
        //     ]);
        // $validator = Validator::make($request->all(), [
        //     'produnit' => ['required','max:5'],
    
        //     ],[
        //         'produnit.required' => 'The attribute field is required.',
        //         'produnit.max' => 'Max Char must .','max:5'
        //     ]);
 
        // if ($validator->fails()) {
        //     return ["error"=>$validator->customMessages];
        // }


            // $validated = validate($request,[
            //     'produnit' => ['required','max:5','min:2']
            // ],
            // [
            //     'produnit.required'=>'Minimum character is 2.'
            // ]);


        //   return  $validated = $request->validated();
            $units = new units([
                'produnit' => $request->input('produnit'),
            ]);
            $units->save();
            // return response()->json(units::latest()->get());
            return response()->json(['status'=>'success','message'=>'Succesfully Added!','code'=>'200',units::latest()->get()]);
            
    }
    public function updateUnit(Request $request, $id)
    {

        try {
            // Your logic to find the data
            if(units::where('produnit','=',$request->produnit)->exists())
                {
                    return response()->json([
                        'message'=>"Data is Exist",
                        'code'=>222
                    ]);
                }
        
        
                $vali = $request->validate([
                    'produnit' =>['required','min:2','max:10'],
                ],[
                'produnit.max' => 'Maximum Character is 10.',
                'produnit.min' => 'Minimum Character is 2.',
                'produnit.required' => 'Unit is Required !'
                ]);
        
        
              
               $units = units::find($id);
               $units->update($request->all());
               return response()->json('Unit is updated');

        } catch (ModelNotFoundException $exception) {
            // Handle the exception and return a custom error response
            return response()->json(['error' => 'Resource not found.'], 404);
        }
    
        
    

    //     if(units::where('produnit','=',$request->produnit)->exists())
    //     {
    //         return response()->json([
    //             'message'=>"Data is Exist",
    //             'code'=>222
    //         ]);
    //     }


    //     $vali = $request->validate([
    //         'produnit' =>['required','min:2','max:10'],
    //     ],[
    //     'produnit.max' => 'Maximum Character is 10.',
    //     'produnit.min' => 'Minimum Character is 2.',
    //     'produnit.required' => 'Unit is Required !'
    //     ]);


      
    //    $units = units::find($id);
    //    $units->update($request->all());
    //    return response()->json('Unit is updated');
    }
    public function delUnit($id){
        // Pwde pd ni // $unit=units::find($id)->delete();
       
        $unit=units::find($id);
        $unit->delete();
        return response()->json(' deleted!');
    }

// public function handleInvalidApiRequest(Request $request)

// {


//     // Check if the request is an API request (you can customize this check based on your API routes)
//     if ($request->expectsJson()) {
//         // return response()->json([
//         //     'error' => "Not Found1",
//         //     'code'=>"404"]);
//         return response()->json(['error' => "Not Found0"],404);

//     } else {
//         // return response()->json([
//         //     'error' => "Not Found1",
//         //      'code'=>"404"]);

//              return response()->json(['error' => "Not Found1"],404);
//        // abort(404); // If it's not an API request, abort with a 404 response
//     }
// }


// public function someApiEndpoint()
// {
//     // Check if the resource exists
//     if (! $resourceExists) {
//         // If the resource does not exist, throw the ApiNotFoundException
//         throw new ApiNotFoundException();
//     }

//     // Continue processing if the resource exists
// }



}
