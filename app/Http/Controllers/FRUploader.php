<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class FRUploader extends Controller
{
    public function store(Request $request) //GET	/agent	index
    {
        $options = ['agentType' => $request->header('User-Agent'), 'source' => $request->ip()];

        if (session('user')) {
            $response = response()->json(['error' => trans('api.Bad_Request')], 400);

            $data = $request->input();
            array_key_exists('port', $data) && $data['port'] ? $port = $data['port'] : $port = env('API_PORT', '443');

            if ($request->hasFile('uploadSnapshot')) {   // upload
                //todo: using laravel function get file
                $total = count($_FILES['uploadSnapshot']['name']);
                for ($i = 0; $i < $total; $i++) {
                    $tmpFilePath = $_FILES['uploadSnapshot']['tmp_name'][$i]; // the temp file path
                    //$fileName = $_FILES['uploadSnapshot']['name'][$i]; // the file name
                    $fileSize = $_FILES['uploadSnapshot']['size'][$i]; // the file size
                    if ($tmpFilePath != '') {
                        //$base64 = 'data:image/' . pathinfo($tmpFilePath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($tmpFilePath));
                        $base64 = base64_encode(file_get_contents($tmpFilePath));
                        if (array_key_exists('id', $data) and strlen($data['id'])) {
                            $response = Restful::worker('POST', '/api/va/bovia/fr/human/feature/task', $port, ['humanId' => $data['id'], 'photo' => $base64, 'size' => $fileSize], 15, $options);
                            sleep(1);
                        } else $response = response()->json(['error' => trans('api.No_suspect')], 400);
                        //error_log(json_encode($response));
                    }
                }
            } else if (array_key_exists('key', $data)) {  // delete
                //error_log($data['key']);
                $key = explode(",", $data['key']);
                switch ($key[0]) {
                    case 'task':
                        $url = '/api/va/bovia/fr/human/feature/task';
                        break;
                    case 'feature':
                        $url = '/api/va/bovia/fr/human/feature';
                        break;
                    default:
                        $url = false;
                        break;
                }
                if ($url) {
                    $key = $key[1];
                    $response = Restful::worker('DELETE', $url, $port, ['id' => $key], 15, $options);
                }
                //error_log(json_encode($response));
            } else
                $response = response()->json(['error' => trans('api.Not_Support')], 400);
        } else
            $response = response()->json(['error' => trans('api.Not_Authorized')], 401);

        return $response;
    }
}