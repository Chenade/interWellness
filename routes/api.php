<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Board_Leader;
use App\Models\News;
use App\Models\Activity;
use App\Models\PostImage;

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

Route::get('/banner/latest', function () {
    $result = [];
    $result['news'] = DB::table('news') 
            -> where('del', 0) 
            -> orderBy('ord', 'DESC') 
            -> first();
    $result['activity'] = DB::table('activity') 
            -> where('del', 0) 
            -> orderBy('ord', 'DESC') 
            -> first();
    
    return $response = response() -> json(['success' => True, 'message' => '','data' => $result], 200);
});

//---- Board Leader Control ----//
Route::get('/board/leader',function (){
    $row = DB::table('board_leader') -> first();
    return $response = response() -> json(['success' => True, 'message' => '','data' => $row], 200);
});

Route::put('/board/leader',function (){
    $input = request() -> all();
    $content = BOARD_LEADER::find(1);
    $content->timestamps = true;
    if (array_key_exists('content', $input)) $content->content = $input['content'];
    $content->save();
    return $response = response() -> json(['success' => True, 'message' => ''], 200);
});

//----- News Control ----//
Route::get('/news/list/cat/{id}',function ($id){
    $row = NEWS::getByCategoryId($id);
    if (!$row)
        return response() -> json(['success' => False, 'message' => 'News Category not found.'], 404);
    foreach ($row as &$value) {
        $value->content = explode("}, {", json_decode($value->content, true));
        foreach ($value->content as &$_this) {
            $_this = trim($_this, "[{, ");
            $_this = json_decode(str_replace("'", "\"", "{".$_this."}"));
        }
        $tmp = [];
        foreach ($value->content as &$_this) {
            if ($_this != null)
                array_push($tmp, $_this);
        }
        $value->content = $tmp;
        unset($value->category);
    }
    return response() -> json(['success' => True, 'message' => '','data' => $row], 200);
});

Route::post('/news/create',function (){
    $input = request() -> all();
    $required = array('category', 'title', 'content');
    if (count(array_intersect_key(array_flip($required), $input)) != count($required))
        return response() -> json(['success' => False, 'message' => 'Missing required column.'], 400);    
    $row = NEWS::store($input);
    return response() -> json(['success' => True, 'message' => ''], 200);
});

Route::put('/news/{id}',function ($id){
    $input = request() -> all();
    $content = NEWS::find($id);
    if (!$content)
        return response() -> json(['success' => False, 'message' => 'News not found.'], 404);
    $content->timestamps = true;
    if (array_key_exists('category', $input)) $content->category = $input['category'];
    if (array_key_exists('title', $input)) $content->title = $input['title'];
    if (array_key_exists('content', $input)) $content->content = $input['content'];
    if (array_key_exists('link', $input)) $content->link = $input['link'];
    if (array_key_exists('link_alt', $input)) $content->link_alt = $input['link_alt'];
    if (array_key_exists('ord', $input)) $content->ord = $input['ord'];
    $content->save();
    return response() -> json(['success' => True, 'message' => ''], 200);
});

Route::delete('/news/{id}',function ($id){
    $row = NEWS::deleteById($id);
    if (!$row)
        return response() -> json(['success' => False, 'message' => 'News not found.'], 200);
    return response() -> json(['success' => True, 'message' => ''], 200);
});

//----- activity Control ----//
Route::get('/activity/list/cat/{id}',function ($id){
    $row = ACTIVITY::getByCategoryId($id);
    if (!$row)
        return response() -> json(['success' => False, 'message' => 'Activity Category not found.'], 404);
    foreach ($row as &$value) {
        $value->content = explode("}, {", json_decode($value->content, true));
        foreach ($value->content as &$_this) {
            $_this = trim($_this, "[{, ");
            $_this = json_decode(str_replace("'", "\"", "{".$_this."}"));
        }
        $tmp = [];
        foreach ($value->content as &$_this) {
            if ($_this != null)
                array_push($tmp, $_this);
        }
        $value->content = $tmp;
        unset($value->category);
    }
    return response() -> json(['success' => True, 'message' => '','data' => $row], 200);
});

Route::post('/activity/create',function (){
    $input = request() -> all();
    $required = array('category', 'title', 'content');
    if (count(array_intersect_key(array_flip($required), $input)) != count($required))
        return response() -> json(['success' => False, 'message' => 'Missing required column.'], 400);    
    $row = ACTIVITY::store($input);
    return response() -> json(['success' => True, 'message' => ''], 200);
});

Route::put('/activity/{id}',function ($id){
    $input = request() -> all();
    $content = ACTIVITY::find($id);
    if (!$content)
        return response() -> json(['success' => False, 'message' => 'Activity not found.'], 404);
    $content->timestamps = true;
    if (array_key_exists('category', $input)) $content->category = $input['category'];
    if (array_key_exists('title', $input)) $content->title = $input['title'];
    if (array_key_exists('content', $input)) $content->content = $input['content'];
    if (array_key_exists('ord', $input)) $content->ord = $input['ord'];
    $content->save();
    return response() -> json(['success' => True, 'message' => ''], 200);
});

Route::delete('/activity/{id}',function ($id){
    $row = ACTIVITY::deleteById($id);
    if (!$row)
        return response() -> json(['success' => False, 'message' => 'Activity not found.'], 200);
    return response() -> json(['success' => True, 'message' => ''], 200);
});

Route::post('/board/{id}/store-image', function(Request $request, $id){
    $content = BOARD_LEADER::find(1);
    $content->timestamps = true;
    $filename = PostImage::store($request, 3);
    if (!$filename)
        return response() -> json(['success' => False, 'message' => 'Image upload failed'], 400);
    $content->timestamps = true;
    $content->image = $filename;
    $content->save();
    return $response = response() -> json(['success' => True, 'message' => ''], 200);
});

Route::post('/activity/{id}/store-image', function(Request $request, $id){
    $content = ACTIVITY::find($id);
    if (!$content)
        return response() -> json(['success' => False, 'message' => 'Activity not found.'], 404);
    $filename = PostImage::store($request, 2);
    if (!$filename)
        return response() -> json(['success' => False, 'message' => 'Image upload failed'], 400);
    $content->timestamps = true;
    $content->image = $content->image.$filename.';';
    $content->save();
    return response() -> json(['success' => True, 'message' => ''], 200);
});

Route::post('/news/{id}/store-image', function(Request $request, $id){
    $content = NEWS::find($id);
    if (!$content)
        return response() -> json(['success' => False, 'message' => 'News not found.'], 404);
    $filename = PostImage::store($request, 1);
    if (!$filename)
        return response() -> json(['success' => False, 'message' => 'Image upload failed'], 400);
    $content->timestamps = true;
    $content->image = $filename.';';
    $content->save();
    return response() -> json(['success' => True, 'message' => ''], 200);
});