<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;
use phpDocumentor\Reflection\Types\Null_;
use Ramsey\Uuid\Uuid;

class PostImage extends Model
{
    use HasFactory;

    protected $table = 'post_images';
    
    public $timestamps = true;

    protected $guarded = [];
    
    public static function store(Request $request, $type){
        $data= new PostImage();
        $filename = NULL;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= Uuid::uuid4().'.'.$file->extension();
            $file-> move(public_path('public/Image'), $filename);
            $data['filename']= $file->getClientOriginalName();
            $data['uuid_name']= $filename;
            $data['type'] = $type;
        }
        $data->save();
        return $filename;
    }

}
