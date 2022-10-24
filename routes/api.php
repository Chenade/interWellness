<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Flyer;
use App\Http\Controllers\MealsController;
// use App\Http\Controllers\FlyerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 
Route::resource('meals', MealsController::class);
// Route::get('/flyer/', 'FlyerController@index');

//----- Flyer Test ----//
Route::prefix('flyer')->group(function () {
    Route::get('/scan/{ver}', function($ver){
        
        try {
            $token = FLYER::store($ver);
        } catch (\Throwable $th) {
            //throw $th;
            return response() -> json(['success' => $token, 'message' => $ver], 200);
        }
        return redirect('https://lin.ee/6sCf4OU');
    });

    Route::get('/list', function(){
        $list = FLYER::getList();
        return response() -> json(['success' => True, 'data' => $list], 200);
    });
});
