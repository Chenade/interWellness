<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parse extends Model
{
    use HasFactory;

    public static function input($allowed, $required, $request)
    {
        $input = $request->all();
        foreach(array_flip($input) as $key)
            if (!in_array($key, $allowed))
                return (406);

        if (count(array_intersect_key(array_flip($required), $input)) != count($required))
            return (400);
            
        return (200);
    }

    public static function chk_update($allowed, $request)
    {
        $input = $request->all();
        foreach(array_flip($input) as $key)
            if (!in_array($key, $allowed) && $key != '_method')
                return (406);
            
        return (200);
    }

    public static function Error_msg($code)
    {
        $msg = '';
        switch ($code) {
            
            case '400':
                $msg = 'Missing required Column';
                break;

            case '403':
                $msg = 'Unauthorized';
                break;

            case '406':
                $msg = 'Undefined Column given';
                break;
            
        }
        return ($msg);
    }
}
