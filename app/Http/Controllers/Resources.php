<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class Resources extends Controller
{
    public function show(Request $client_engine, $key) //GET	/agent	index
    {
        try {
            $url = base64_decode($key);
            if (session('user') && substr($url, 0, 4) === "http") {
                $context = stream_context_create(array(
                    'http' => array('header' => 'Authorization: Bearer ' . session('user')['accessToken'])
                ));
                return file_get_contents($url, false, $context);
            } else
                return json_decode('{"time": "' . date("Y-m-dTH:i:sZ") . '"}', true);
        } catch (\Exception $e) {
            return '/img/bovia.png';
        }
    }

    public function update(Request $request, $id) //PUT/PATCH	/agent/{agent}	update
    {
        $options = ['agentType' => $request->header('User-Agent'), 'source' => $request->ip()];
        if (session('user') || $id == 'login' || $id == 'loginSave' || $id == 'recaptcha' || $id = 'apps') {
            $data = $request->input();
            array_key_exists('port', $data) && $data['port'] ? $port = $data['port'] : $port = env('API_PORT', '443');
            $response = response()->json(['error' => trans('api.Bad_Request')], 400);
            if (array_key_exists('payload', $data)) switch ($id) {
                case 'login':
                    $response = Restful::worker('POST', '/api/login', $port, $data['payload'], $data['timeout'], $options);
                    $payload = json_decode($response->getContent(), true);
                    //error_log(json_encode($payload));
                    if (!array_key_exists('error', $payload)) {
                        session(['management' => 0, 'setLocale' => $data['payload']['language']]);
                        $permissions = ['account', 'device', 'import', 'license', 'remote', 'server', 'video', 'analyze', 'self', 'fr', 'streaming', 'groupTask'];
                        //error_log(json_encode($payload['user']['permission']));
                        foreach ($permissions as $key)
                            array_key_exists($key, $payload['user']['permission']) ? ($payload['user']['permission'][$key] && session(['management' => 1])) : ($payload['user']['permission'][$key] = 0);
                        foreach ($payload as $key => $value) session([$key => $value]);
                        $response = response()->json(['id' => $payload['user']['id'], '2fa' => $payload['2fa'], 'Authorization' => $payload['accessToken']], 200);
                    }
                    break;
                case "recaptcha":
                    $response = Restful::worker('POST', '/api/recaptcha', $port, $data['payload'], $data['timeout'], $options);
                    break;
                case 'loginSave':
                    session(['verify' => true]);
                    $response = response()->json([], 200);
                    break;
                case 'api':
                    $response = Restful::worker($data['method'], $data['url'], $port, $data['payload'], $data['timeout'], $options);
                    break;
                case 'cross-site':
                    if (array_key_exists('id', $data['payload'])) {
                        session(['site' => $data['payload']['id']]);
                        $response = response()->json([], 200);
                    }
                    break;
                case 'mq':
                    if (array_key_exists('key', $data['payload'])) {
                        $data['payload']['commander'] = session('user')['id'];
                        $data['payload']['time'] = time();
                        if ($data['url'] == 'ptz')
                            $response = rpc::commander(['ptz' => $data['payload']], $data['payload']['key'], array_key_exists('write', $data['payload']) ? 10 : 2);
                        else if ($data['url'] == 'status')
                            array_key_exists('module', $data['payload']) && ($response = rpc::commander(['status' => $data['payload']], $data['payload']['key'], 2));
                        else if ($data['url'] == 'list')
                            $response = rpc::commander($data['payload'], 'bovia.device.management', 10);
                        else if ($data['url'] == 'api')
                            $response = rpc::commander(['api' => $data['payload']], $data['payload']['key'], 300);
                    }
                    break;
                case 'videos':
                    $data['payload']['index'] = (int)$data['start'];
                    $data['payload']['count'] = (int)$data['length'];
                    // For older FIS version, because FIS not implement user permission
                    if (array_key_exists('self', $data['payload'])) {
                        unset($data['payload']['self']);
                        $data['payload']['post'] = [session('user')['id']];
                    }
                    $response = Restful::worker($data['method'], $data['url'], $port, $data['payload'], $data['timeout'], $options);
                    $data['argv'] || ($data['argv'] = 'playback');
                    $content = json_decode($response->getContent(), true);
                    if (!array_key_exists('error', $content)) {
                        ($response = searchVideos::dataTable($content['videoList'], $data['argv']));
                        //$response['draw'] = $data['draw'];
                        $response['recordsTotal'] = $content['total'];
                        $response['recordsFiltered'] = $content['total'];
                        $response['total'] = $content['total'];
                    }
                    break;
                case 'va_events':
                    $data['payload']['index'] = (int)$data['start'];
                    $data['payload']['count'] = (int)$data['length'];
                    if (array_key_exists('keep', $data['payload'])) $data['payload']['keep'] = (int)$data['payload']['keep'];
                    if (array_key_exists('misjudged', $data['payload'])) $data['payload']['misjudged'] = (int)$data['payload']['misjudged'];
                    $response = Restful::worker($data['method'], $data['url'], $port, $data['payload'], $data['timeout'], $options);
                    $content = json_decode($response->getContent(), true);
                    if (!array_key_exists('error', $content)) {
                        $response = searchVideos::vaEvents($content['eventList']);
                        $response['recordsTotal'] = $content['total'];
                        $response['recordsFiltered'] = $content['total'];
                        $response['total'] = $content['total'];
                    }
                    break;
                case 'fr_events':
                    $data['payload']['index'] = (int)$data['start'];
                    $data['payload']['count'] = (int)$data['length'];
                    if (array_key_exists('keep', $data['payload'])) $data['payload']['keep'] = (int)htmlspecialchars($data['payload']['keep']);
                    if (array_key_exists('misjudged', $data['payload'])) $data['payload']['misjudged'] = (int)htmlspecialchars($data['payload']['misjudged']);
                    $response = Restful::worker($data['method'], $data['url'], $port, $data['payload'], $data['timeout'], $options);
                    $content = json_decode($response->getContent(), true);

                    if (!array_key_exists('error', $content)) {
                        $response = searchVideos::frEvents($content['eventList']);
                        $response['recordsTotal'] = $content['total'];
                        $response['recordsFiltered'] = $content['total'];
                        $response['total'] = $content['total'];
                    }
                    break;
                case 'fr_human':
                    $data['payload']['index'] = (int)$data['start'];
                    $data['payload']['count'] = (int)$data['length'];
                    $response = Restful::worker($data['method'], $data['url'], $port, $data['payload'], $data['timeout'], $options);
                    $content = json_decode($response->getContent(), true);

                    if (!array_key_exists('error', $content)) {
                        try {
                            $response = searchVideos::humanList($content['humanList']);
                            $response['recordsTotal'] = $content['total'];
                            $response['recordsFiltered'] = $content['total'];
                            $response['total'] = $content['total'];
                        } catch (\Exception $e) {
                            $response = searchVideos::humanList([]);
                            $response['recordsTotal'] = 0;
                            $response['recordsFiltered'] = 0;
                            $response['total'] = 0;
                        }
                    }
                    break;
                case 'fr-human-row':
                    $response = ['row' => searchVideos::human($data['payload'])];
                    break;
                case 'lpr_events':

                    $data['payload']['index'] = (int)$data['start'];
                    $data['payload']['count'] = (int)$data['length'];
                    if (array_key_exists('matched', $data['payload'])) $data['payload']['matched'] = (int)$data['payload']['matched'];
                    if (array_key_exists('keep', $data['payload'])) $data['payload']['keep'] = (int)htmlspecialchars($data['payload']['keep']);
                    if (array_key_exists('misjudged', $data['payload'])) $data['payload']['misjudged'] = (int)htmlspecialchars($data['payload']['misjudged']);
                    $code_response = Restful::worker('GET', '/api/va/bovia/lpr/codebooks', $port, [], $data['timeout'], $options);
                    $code_content = json_decode($code_response->getContent(), true);
                    $tag_response = Restful::worker('GET', '/api/va/bovia/lpr/tag/list', $port, [], $data['timeout'], $options);
                    $tag_content = json_decode($tag_response->getContent(), true);
                    $response = Restful::worker($data['method'], $data['url'], $port, $data['payload'], $data['timeout'], $options);
                    $content = json_decode($response->getContent(), true);

                    if (!array_key_exists('error', $content)) {
                        $response = searchVideos::lprEvents($content['eventList'],$tag_content['tagList'],$code_content);
                        $response['recordsTotal'] = $content['total'];
                        $response['recordsFiltered'] = $content['total'];
                        $response['total'] = $content['total'];
                    }
                    break;
                case 'lpr_vehicle':

                    $data['payload']['index'] = (int)$data['start'];
                    $data['payload']['count'] = (int)$data['length'];
                    $code_response = Restful::worker('GET', '/api/va/bovia/lpr/codebooks', $port, [], $data['timeout'], $options);
                    $tag_response = Restful::worker('GET', '/api/va/bovia/lpr/tag/list', $port, [], $data['timeout'], $options);
                    $tag_content = json_decode($tag_response->getContent(), true);
                    $response = Restful::worker($data['method'], $data['url'], $port, $data['payload'], $data['timeout'], $options);
                    $content = json_decode($response->getContent(), true);

                    if (!array_key_exists('error', $content)) {
                        try {
                            $response = searchVideos::vehicleList($content['vehicleList'],$tag_content['tagList'], $code_response->getContent());
                            $response['recordsTotal'] = $content['total'];
                            $response['recordsFiltered'] = $content['total'];
                            $response['total'] = $content['total'];
                        } catch (\Exception $e) {
                            $response = searchVideos::vehicleList([]);
                            $response['recordsTotal'] = 0;
                            $response['recordsFiltered'] = 0;
                            $response['total'] = 0;
                        }
                    }
                    break;
                case 'lpr_report':

                    $data['payload']['index'] = (int)$data['start'];
                    $data['payload']['count'] = (int)$data['length'];
                    $response = Restful::worker($data['method'], $data['url'], $port, $data['payload'], $data['timeout'], $options);
                    $content = json_decode($response->getContent(), true);

                    if (!array_key_exists('error', $content)) {
                        try {
                            $response = searchVideos::lprReports($content);
                        } catch (\Exception $e) {
                            $response = searchVideos::lprReports([]);
                        }
                    }
                    break;
                case 'lpr-vehicle-row':
                    $response = ['row' => searchVideos::vehicle($data['payload'])];
                    break;
                case 'or_snapshot':
                    $data['payload']['index'] = (int)$data['start'];
                    $data['payload']['count'] = (int)$data['length'];
                    if (array_key_exists('keep', $data['payload'])) $data['payload']['keep'] = (int)htmlspecialchars($data['payload']['keep']);
                    if (array_key_exists('misjudged', $data['payload'])) $data['payload']['misjudged'] = (int)htmlspecialchars($data['payload']['misjudged']);
                    $response = Restful::worker($data['method'], $data['url'], $port, $data['payload'], $data['timeout'], $options);
                    $content = json_decode($response->getContent(), true);

                    if (!array_key_exists('error', $content)) {
                        try {
                            $response = searchVideos::orSnapshot($content['snapshotList']);
                            $response['recordsTotal'] = $content['total'];
                            $response['recordsFiltered'] = $content['total'];
                            $response['total'] = $content['total'];
                        } catch (\Exception $e) {
                            $response = searchVideos::orSnapshot([]);
                            $response['recordsTotal'] = 0;
                            $response['recordsFiltered'] = 0;
                            $response['total'] = 0;
                        }
                    }
                    break;
                case 'logs':
                    $response = Restful::worker($data['method'], $data['url'], $port, $data['payload'], $data['timeout'], $options);
                    $rows = [];
                    $content = json_decode($response->getContent(), true);
                    if (!array_key_exists('error', $content)) {
                        switch ($data['url']) {
                            case '/api/group/log/search/access':
                                foreach ($content as $log) array_push($rows, array(
                                    trans('logs.levelBook_' . $log['level']),
                                    $log['userId'],
                                    $log['deviceId'],
                                    $log['targetId'],
                                    $log['timestamp'],
                                    trans('logs.actionBook_' . $log['action']),
                                    $log['ip'],
                                    $log['content'],
                                ));
                                break;
                            case '/api/group/log/search/resource':
                                foreach ($content as $log) array_push($rows, array(
                                    trans('logs.levelBook_' . $log['level']),
                                    $log['userId'],
                                    $log['deviceId'],
                                    $log['targetId'],
                                    $log['startTime'],
                                    $log['stopTime'],
                                    trans('logs.actionBook_' . $log['action']),
                                    $log['ip'],
                                    $log['content'],
                                ));
                                break;
                        }
                        $response = $rows;
                    }
                    break;
                case 'apps':
                    $response = Restful::none_auth('GET', '/api/app/list', $port, $data['payload'], $data['timeout'], $options);
                    break;
                default:
                    $response = response()->json(['error' => trans('api.Not_Support')], 400);
                    break;
            }
        } else
            $response = response()->json(['error' => trans('api.Not_Authorized')], 401);
        return $response;
    }
}