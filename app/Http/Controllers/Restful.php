<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class Restful extends Controller
{
    public static function none_auth($method = 'GET', $api = null, $service_port = 5554, $data = [], $timeout = 10, $options = [])
    {
        if ($api) {

            $ch = curl_init(env('API_URL', 'https://127.0.0.1') . ':' . (string)env('API_PORT', '4443') . $api);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // For HTTPS
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // For HTTPS

            curl_setopt($ch, CURLOPT_REFERER, $options['source']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

            $lang = session('setLocale') ? session('setLocale') : app()->getLocale();

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json' => 'Accept-Language: ' . $lang,
                'User-Agent: ' => $options['agentType'],
                'X-Real-IP: ' => $options['source'],
                'X-Forwarded-For: ' => $options['source'],
            ));
            count($data) && curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            $response = curl_exec($ch);
            $info = curl_getinfo($ch);
            curl_close($ch);
            strlen($response) || ($response = '{}');

            return Restful::response_translate(json_decode($response, false), $info);

        } else
            return Restful::response_translate(null, null);
    }

    public static function worker($method = 'GET', $api = null, $service_port = 5554, $data = [], $timeout = 10, $options = [])
    {

        if ($api) {

            if (starts_with($api, '/webrtc-mgr')) 
                $url = env('API_URL', 'https://127.0.0.1') . ':' . $api;
            else if($api == '/api/recaptcha')
                $url = env('API_URL', 'https://127.0.0.1') . ':' . (string)$service_port . $api;
            else
                $url = env('API_URL', 'https://127.0.0.1') . ':' . (string)$service_port . str_replace('/api/', '/api/web/', $api);

            if (session('user') || $api == '/api/login' || $api == '/api/3p/login' || $api == '/api/recaptcha') {
                $ch = curl_init($url);

                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // For HTTPS
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // For HTTPS

                curl_setopt($ch, CURLOPT_REFERER, $options['source']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
                curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

                $lang = session('setLocale') ? session('setLocale') : app()->getLocale();

                $header = array('Content-Type: application/json', 'Accept-Language: ' . $lang);
                if ($api != '/api/login') {
                    array_push($header, 'Authorization: Bearer ' . session('accessToken'));

                    if (session('user')['permission']['site']) if (array_key_exists(session('site'), session('siteList'))) {
                        array_push($header, 'Site-USID: ' . session('siteList')[session('site')]['usid']);
                    }
                }
                array_push($header, 'User-Agent: ' . $options['agentType']);
                array_push($header, 'X-Real-IP: ' . $options['source']);
                array_push($header, 'X-Forwarded-For: ' . $options['source']);

                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                count($data) && curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                $response = curl_exec($ch);
                $info = curl_getinfo($ch);
                curl_close($ch);
                strlen($response) || ($response = '{}');
                

                if ($info['http_code'] == 401) {
                    //check if need refresh token
                }

                return Restful::response_translate(json_decode($response, false), $info);
            } else
                return response()->json(['error' => trans('api.Not_Authorized')], 401);
        } else {
            return Restful::response_translate(null, null);
        }
    }

    public static function response_translate($data = null, $info = null)
    {
        if ($info['http_code']) {
            $code = $info['http_code'];
            if (($code < 200 || $code >= 400)) {

                if (is_object($data) && property_exists($data, 'message'))
                    $data = ["error" => $data->message];
                else
                    $data = ["error" => 'Agent can\'t parse the api response, maybe format not regular?'];

            } else if ($code == 204) {      // No Content
                $code = 200;
                $data = [];
            }
        } else {
            $data = ["error" => trans('api.Service_not_found')];
            $code = 404;
        }
        return response()->json($data, $code);
    }

    public static function refresh_jwt()
    {

    }
}
