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
    
    public static function getChart()
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

    public static function getList()
    {
        $data_list = DB::table('flyer')
                        ->get();
        foreach ($data_list as $value) {
            $_this = $value->fid;
            switch ($_this) {
                case '1':
                    $value->fid = '傳單 - 全資訊'; // flyer 1
                    break;
                case '2':
                    $value->fid = '傳單 - 營養資訊'; // flyer 2
                    break;
                case '3':
                    $value->fid = '傳單 - 優惠資訊'; // flyer 3
                    break;       
                case '4':
                    $value->fid = 'IG 貼文'; // ig psot
                    break;   
                case '5':
                    $value->fid = 'Facebook 按紐'; // facebook btn
                break;   
            }
        }
        return $data_list;
    }

    public static function store($ver)
    {
        if ($ver == '1' || $ver == '2' || $ver == '3' || $ver == '4' || $ver == '5')
        {
            $content = new Flyer;
            $content->fid = $ver;
            $content->save();
        }
        return (true);
    }

}
