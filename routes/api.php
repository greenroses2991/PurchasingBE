<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\prodprofController;
use App\Http\Controllers\unitController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\imagesController;
use App\Http\Controllers\SupplierProfController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::fallback(function(){
//     return response()->json(['error' => 'Resource not found.'], 404);
// })->name('api.fallback.404');






// for units
Route::prefix('units')->group(function (){
Route::get('/units',[unitController::class, 'getUnits']);
Route::get('/getUnitById/{id}',[unitController::class, 'getUnitId']);
Route::post('/saveUnit',[unitController::class, 'storeUnit']);
Route::put('/updUnit/{id}',[unitController::class, 'updateUnit']);
Route::delete('/delU/{id}',[unitController::class, 'delUnit']);

});
//for brands
Route::prefix('brands')->group(function (){
Route::get('/brands',[brandController::class, 'getbrands']);
Route::get('/ShowbrandById/{id}',[brandController::class, 'getbrandById']);
Route::post('/save',[brandController::class, 'store']);
Route::put('/update/{id}',[brandController::class, 'update']);
Route::delete('/delete/{id}',[brandController::class, 'destroy']);
});


//for images
Route::prefix('images')->group(function (){
Route::get('/images',[imagesController::class, 'getImages']);
Route::post('/imagUpd',[imagesController::class, 'uploadImage']);
});


//for product profile

Route::prefix('productprof')->group(function (){
    Route::get('/prodprof',[prodprofController::class, 'getProducts']);
    Route::post('/saveprod',[prodprofController::class, 'storeProdprof']);
    Route::post('/storedProd',[prodprofController::class, 'storPro']);
    });
//for Suppliur
Route::prefix('supplier')->group(function (){
Route::get('/suppliers',[SupplierProfController::class, 'getSupplierProf']);
Route::get('/getSuppId',[SupplierProfController::class, 'getByIdSupp']);
Route::post('/savesupplier',[SupplierProfController::class, 'store']);
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('{any}', function () {
    abort(404, ' Resource not found please contact LARRY LAGUE Jr.');
    abort(400, ' Resource not found please contact LARRY LAGUE Jr 400.');
})->where('any', '.*');