<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Ramsey\Uuid\Uuid;

class Flyer extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'flyer';
    
    public $timestamps = true;

    protected $guarded = [];
    
    public static function getList()
    {
        $data_list = DB::table('flyer')
                        ->select('fid', DB::raw('count(*) as total'))
                        ->groupBy('fid')
                        ->get();
        $return = array();
        foreach ($data_list as &$value) {
            $return[$value->fid] = $value->total;
        }
        return $return;
    }

    public static function store($ver)
    {
        $content = new Flyer;
        $content->fid = $ver;
        $content->save();
        return (true);
    }

}
