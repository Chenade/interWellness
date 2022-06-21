<?php

namespace App\Http\Controllers;


use ErrorException;
use Illuminate\Support\Facades\Lang;

class rpc extends Controller
{
    public static function commander($payload, $key, $timeout)
    {
        Lang::setLocale(session('setLocale'));
        try {
            $payload ['time'] = time();
            $fibonacci_rpc = new FibonacciRpcClient();
            $response = $fibonacci_rpc->call(json_encode($payload), $key, $timeout);
            $response = json_decode($response, true);
            (array_key_exists('error', $response)) ? $code = 500 : $code = 200;
            return response()->json($response, $code);
        } catch (ErrorException $e) {
            $msg = $e->getMessage();
            if (strpos($msg, 'Operation timed out') !== false) { // connection MQ Server failed
                $msg = trans('api.Service_not_found');
            } else if (strpos($msg, 'Connection refused') !== false) { // connection MQ Server reject
                $msg = trans('api.Connection_refused');
            }
            return response()->json(['error' => $msg], 500);
        }
    }
}
