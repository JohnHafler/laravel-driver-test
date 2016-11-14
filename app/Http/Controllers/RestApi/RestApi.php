<?php
namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

/**
 * Class RestApi
 */
class RestApi extends Controller
{
    public function registration(Request $request)
    {
        if ($request->get('key') == Config::get('settings.auth-key')) {
            $validator = Validator::make($request->all(), User::rules());

            if (!$validator->fails()) {
                $input = User::getRegUserFields();
                $record = new User();
                $record->name = $input['name'];
                $record->tel = $input['tel'];
                $record->remember_token = str_random();
                $record->save();

                $redis = Redis::connection();
                $redis->hset('AccessToken', $record->id, $record->remember_token);
            }
        }
        return view('register', [
            'user_id' => isset($record->id) ? $record->id : null,
            'access_token' => isset($record->remember_token) ? $record->remember_token : null,
        ]);
    }

    public function auth(Request $request)
    {
        if ($request->get('key') == Config::get('settings.auth-key')) {
            $user = User::getUserByTel(Input::get('tel'));
            $check = User::checkPassword($user, Input::get('password'));
        }
        
        
        return view('login', [
//            'user_id' => isset($record->id) ? $record->id : null,
//            'access_token' => isset($record->remember_token) ? $record->remember_token : null,
        ]);
    }
}
