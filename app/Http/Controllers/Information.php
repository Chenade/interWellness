<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class Information extends Controller
{
    public function show($target) //GET	/agent	index
    {
        if ($target == 'info') {
            if (file_exists('config.json'))
                $fc = json_decode(file_get_contents("config.json"), true);
            else if (file_exists("../config.json"))
                $fc = json_decode(file_get_contents("../config.json"), true);
            else
                $fc = abort(404);
            return $fc;
        } else
            return abort(404);
    }
}