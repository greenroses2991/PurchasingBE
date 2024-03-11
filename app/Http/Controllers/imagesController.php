<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\images;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
class imagesController extends Controller
{
    public function getImages()

   {
    $images=images::all();
    return response()->json($images);
   }
    // From chat Gpt
    public function uploadImage(Request $request)
{

    // $vali = Validator::make($request->all(), [
    //     'image' => 'image',
    // ]);
    
    // if ($vali->fails()) {
    //     return response()->json(['errors' => $vali->errors()], 422);
    // }
    // $vali=$request->validate([
    $vali=Validator::make($request->all(), [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096|dimensions:max_width=5000,max_height=5000', // Add validation rules for image uploads.
    ],
    [
    'image.required' => 'Required',
    'image.image' => 'Must be a images file with Extension name of peg,png,jpg,gif!',
    'image.mimes' => 'Extension file allowed only jpeg,png,jpg,gif!',
    'image.max' => 'Max file 4mb',
    'image.dimensions' => 'Max Dimension is 5k x 5k',

    ]);

    if ($vali->fails()) {
        return response()->json(['errors' => $vali->errors()], 422);
    }


    $images = $request->file('image');
    $imageName = time().'.'.$images->extension(); // Generate a unique image name.
    $images->move(public_path('uploads'), $imageName); // Save the   to the public/uploads directory.

    $imageModel = new images();
    $imageModel->img_path = $imageName;
    $imageModel->save();
    $lastInsertedId = $imageModel->id;
    // return response()->json('Succesfully Added');
    return response()->json(['id' => $lastInsertedId,'status'=>'success','message'=>'Succesfully Uploaded!','code'=>'200','fileName'=>$imageName]);
    // return response()->json(Images::last()->get());

    //return redirect()->back()->with('success', 'Image uploaded successfully.');
}


}
