<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Restful;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
// Route::resource('/agent/fr/upload', 'FRUploader', ['only' => ['store']]);  # fr restful agent
// Route::resource('/agent/lpr/upload', 'LPRUploader', ['only' => ['store']]);  # lpr restful agent
// Route::resource('/agent', 'Resources', ['only' => ['update', 'show']]);  # restful agent
// Route::resource('/portal', 'Information', ['only' => ['show']]);  # for app information


Route::get('/language/{locale}', function ($lang) {

    $lang = htmlspecialchars($lang);

    if (key_exists($lang, Config::get('app.locales'))) {
        session(['setLocale' => $lang]);
        App::setLocale(session('setLocale'));
    }

    return redirect()->back();
});

Route::get('/login', function () {
    // if (session('user') && session('verify'))
    //     return redirect('/');
    // else {
    //     $re = request()->r;
    //     $target = request()->target;
    //     $key = htmlspecialchars(request()->key);

    //     if (strlen($re) && $re == 'relogin')
    //         return view('pages.login', ['error' => trans('api.Re_Login')]);

    //     else if (strlen($target) && $target == 'npa') {
    //         $agentType = request()->header('User-Agent');
    //         $sourceIp = request()->ip();
    //         $response = Restful::worker('POST', '/api/3p/login', env('API_PORT', '443'), ['key' => $key, 'deviceName' => $agentType, 'deviceId' => 'npa'], 15, ['agentType' => $agentType, 'source' => $sourceIp]);

    //         $payload = json_decode($response->getContent(), true);

    //         if (!array_key_exists('error', $payload)) {
    //             // default language zh
    //             session(['management' => 0, 'setLocale' => 'zh']);

    //             $permissions = ['account', 'device', 'import', 'license', 'remote', 'server', 'tool', 'video', 'analyze', 'self', 'fr', 'streaming', 'groupTask'];
    //             foreach ($permissions as $field)
    //                 array_key_exists($field, $payload['user']['permission']) ? ($payload['user']['permission'][$field] && session(['management' => 1])) : ($payload['user']['permission'][$field] = 0);

    //             foreach ($payload as $field => $value) session([$field => $value]);

    //             $response = response()->json([], 200);

    //         }

    //         return $payload;

    //     } else
            return view('pages.login');

    // }
});

// Route::get('/logout', function () {
//     if (session('user')) Session::flush();
//     $request = request()->r;
//     return strlen($request) ? redirect('/login' . '?r=' . $request) : redirect('/login');
// });

Route::get('/info', function () {
    return view('pages.index');
});

Route::any('{query}',function() {
    return redirect('/info');
})->where('query', '.*');

Route::get('/', function () {
    return redirect('/info');
    // if (session('user') && session('verify')) {
    //     return view('pages.live');
    // } else {
    //     return redirect('/login');
    // }
});

// Route::get('/playback', function () {
//     if (session('user') && session('verify')) {
//         return view('pages.playback');
//     } else {
//         return redirect('/login');
//     }
// });

// Route::get('/playback_new', function () {
//     if (session('user') && session('verify')) {
//         return view('pages.playback_new');
//     } else {
//         return redirect('/login');
//     }
// });

// Route::get('/vms', function () {
//     if (session('user') && session('verify')) {
//         return view('pages.vms');
//     } else {
//         return redirect('/login');
//     }
// });

// Route::get('/logs', function () {
//     if (session('user') && session('verify')) {
//         return view('pages.management.logs');
//     } else {
//         return redirect('/login');
//     }
// });

// # administrator permission
// Route::get('/dashboard', function () {
//     if (session('user') && session('verify')) {
//         if (session('user')['permission']['server'] || session('user')['permission']['streaming'])
//             return view('pages.management.dashboard');
//         else
//             return redirect()->back();
//     } else {
//         return redirect('/login');
//     }
// });

// # administrator permission
// Route::get('/user', function () {
//     if (session('user') && session('verify')) {
//         if (session('user')['permission']['account'])
//             return view('pages.management.account');
//         else
//             return redirect()->back();
//     } else {
//         return redirect('/login');
//     }
// });

// # administrator permission
// Route::get('/ptz', function () {
//     if (session('user') && session('verify')) {
//         if (session('user')['permission']['remote'])
//             return view('pages.management.ptz');
//         else
//             return redirect()->back();
//     } else {
//         return redirect('/login');
//     }
// });

// # administrator permission
// Route::get('/va', function () {
//     if (session('user') && session('verify')) {
//         if (session('user')['permission']['analyze'])
//             return view('pages.management.va');
//         else
//             return redirect()->back();
//     } else {
//         return redirect('/login');
//     }
// });

// # administrator permission
// Route::get('/sharing', function () {
//     if (session('user') && session('verify')) {
//         if (session('user')['permission']['groupTask'])
//             return view('pages.management.sharing');
//         else
//             return redirect()->back();
//     } else {
//         return redirect('/login');
//     }
// });

// # administrator permission
// Route::get('/fr', function () {
//     if (session('user') && session('verify')) {
//         if (session('user')['permission']['fr'])
//             return view('pages.management.fr');
//         else
//             return redirect()->back();
//     } else {
//         return redirect('/login');
//     }
// });

// # administrator permission
// Route::get('/lpr', function () {
//     if (session('user') && session('verify')) {
//         if (session('user')['permission']['lpr'])
//             return view('pages.management.lpr');
//         else
//             return redirect()->back();
//     } else {
//         return redirect('/login');
//     }
// });

// # administrator permission
// Route::get('/or', function () {
//     if (session('user') && session('verify')) {
//         if (session('user')['permission']['or'])
//             return view('pages.management.or');
//         else
//             return redirect()->back();
//     } else {
//         return redirect('/login');
//     }
// });

// # administrator permission
// Route::get('/mmr', function () {
//     if (session('user') && session('verify')) {
//         if (session('user')['permission']['lpr'])
//             return view('pages.management.mmr');
//         else
//             return redirect()->back();
//     } else {
//         return redirect('/login');
//     }
// });

// Route::get('/device', function () {
//     if (session('user') && session('verify')) {
//         if (session('user')['permission']['device'])
//             return view('pages.management.device');
//         else
//             return redirect()->back();
//     } else {
//         return redirect('/login');
//     }
// });

// Route::get('/deviceConfig', function () {
//     if (session('user')) {
//         if (session('user')['permission']['device'])
//             return view('pages.management.deviceConfig');
//         else
//             return redirect()->back();
//     } else {
//         return redirect('/login');
//     }
// });


// Route::get('/tools', function () {
//     return view('pages.tools');
// });

// Route::get('/contact', function () {
//     return view('pages.contact');
// });

// Route::get('/terms', function () {
//     return view('includes.terms');
// });
// Route::get('/privacy', function () {
//     return view('includes.privacy');
// });