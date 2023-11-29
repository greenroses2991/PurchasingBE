<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormDataRequest;
use Illuminate\Http\Request;
use App\models\brands;
// use App\Rules\UniqueBrand;
use Illuminate\Support\Facades\DB;


class brandController extends Controller
{
    public function getBrands()
    {
        // $Brand=brands::get();
        // $Brand=\DB::connection('mysql')->select('');
        $Brand=\DB::select('select * from brand order by prodbrand asc');
        return response()->json($Brand);
        //return response()->json(brands::latest()->get());
    }
    public function store(FormDataRequest $request)
    {
        if(brands::where('prodbrand','=',$request->prodbrand)->exists())
        {
            return response()->json([
                'message'=>"Data is Exist",
                'code'=>222
            ]);
        }
        
    $validated = $request->validated();
     $brands = new brands([
      'prodbrand' => $request->input('prodbrand'),
        ]);
        $brands->save();
      //  return response()->json(brands::latest()->get());
      return response()->json(['status'=>'success','message'=>'Succesfully Added!','code'=>'200',brands::latest()->get()]);


        //$brands = new brands([
       // 'prodbrand' => $request->validated()->input('prodbrand'),
       // ]);
       // $brands->save();
       // return response()->json('Brand is created!');

  

       
    }

    public function getbrandById($id)
    {
        $brands = brands::find($id);
        return response()->json($brands);
    }

    
    public function update(FormDataRequest $request, $id)
    {

        if(brands::where('prodbrand','=',$request->prodbrand)->exists())
        {
            return response()->json([
                'message'=>"Data is Exist",
                'code'=>222
            ]);
        }
        $validated = $request->validated();
       $brands = brands::find($id);
       $brands->update($request->all());
       return response()->json('Brand updated');
    }
    public function destroy($id)
    {
        $brand = brands::find($id);
        $brand->delete();
        return response()->json(' deleted!');
    }

    


}
