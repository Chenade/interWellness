<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Ramsey\Uuid\Uuid;

class Meals extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'meals';
    
    public $timestamps = true;

    protected $guarded = [];

    // protected $casts = [
    //     'content' => 'array'
    // ];
    
    public static function getList()
    {
        return DB::table('meals')
                -> where('del', 0)
                -> orderBy('ord', 'DESC') 
                -> get();
    }

    public static function store($request)
    {
        $content = new Meals;
        $content->rid = $request['rid'];
        $content->name = $request['name'];
        $content->price = $request['price'];
        $input = request()->all();
        if (array_key_exists('protien', $input))        $content->protien = $request['protien'];
        if (array_key_exists('sugar', $input))          $content->sugar = $request['sugar'];
        if (array_key_exists('fat', $input))            $content->fat = $request['fat'];
        if (array_key_exists('carbs', $input))          $content->carbs = $request['carbs'];
        if (array_key_exists('saturated_fat', $input))  $content->saturated_fat = $request['saturated_fat'];
        if (array_key_exists('na', $input))             $content->na = $request['na'];
        if (array_key_exists('P', $input))              $content->P = $request['P'];
        if (array_key_exists('K', $input))              $content->K = $request['K'];
        if (array_key_exists('status', $input))         $content->status = $request['status'];
        $content->tag_style = $request['tag_style'];
        $content->tag_health = $request['tag_health'];
        $content->ingredient = $request['ingredient'];
        if (array_key_exists('auth', $input))           $content->auth = $request['auth'];
        $content->save();
    }

    public static function getByCategoryId($id)
    {
        if ($id > 2)
            return NULL;
        return  DB::table('meals') -> where('category', $id) -> where('del', 0) -> orderBy('ord', 'DESC') -> get();
    }

    public static function getElementById($id)
    {
        return DB::table('meals') 
                -> where('id', $id) 
                -> where('del', 0) 
                -> orderBy('ord', 'DESC') 
                -> first();
    }

    public static function deleteById($id)
    {
        $row = DB::table('meals') -> where('id',$id) -> first();
        if (!$row)
            return NULL;
        $input = [];
        $input['del'] = 1;
        DB::table('meals')-> where('id', $id)-> update($input);

        return true;
    }

    public static function updateById($request, $id)
    {
        $content = meals::find($id);
        if (!$content)
            return NULL;
        $input = $request->all();
        $content->timestamps = true;
        if (array_key_exists('rid', $input)) $content->rid = $input['rid'];
        if (array_key_exists('name', $input)) $content->name = $input['name'];
        if (array_key_exists('price', $input)) $content->price = $input['price'];
        if (array_key_exists('protien', $input)) $content->protien = $input['protien'];
        if (array_key_exists('sugar', $input)) $content->sugar = $input['sugar'];
        if (array_key_exists('calories', $input)) $content->calories = $input['calories'];
        if (array_key_exists('fat', $input)) $content->fat = $input['fat'];
        if (array_key_exists('carbs', $input)) $content->carbs = $input['carbs'];
        if (array_key_exists('saturated_fat', $input)) $content->saturated_fat = $input['saturated_fat'];
        if (array_key_exists('na', $input)) $content->na = $input['na'];
        if (array_key_exists('P', $input)) $content->P = $input['P'];
        if (array_key_exists('K', $input)) $content->K = $input['K'];
        if (array_key_exists('status', $input)) $content->status = $input['status'];
        if (array_key_exists('tag_style', $input)) $content->tag_style = $input['tag_style'];
        if (array_key_exists('tag_health', $input)) $content->tag_health = $input['tag_health'];
        if (array_key_exists('ingredient', $input)) $content->ingredient = $input['ingredient'];
        if (array_key_exists('ord', $input)) $content->ord = $input['ord'];
        $content->save();
        return $content;
    }

    public static function uploadThumbnail($request, $id){
        
        $row = DB::table('meals') -> where('id', $id) -> first();
        if (!$row)
            return NULL;
        
        $filename = NULL;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= Uuid::uuid4().'.'.$file->extension();
            $file-> move(public_path('upload/Image'), $filename);
        }
        
        if ($filename){
            if ($row->image != '')
                unlink($_SERVER['DOCUMENT_ROOT']."\upload\Image\\".$row->image);
            DB::table('meals')-> where('id', $id)-> update(['image' => $filename]);
        }

        return $filename;
    }
}
