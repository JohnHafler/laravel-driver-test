<?php
namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use App\Orders;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

/**
 * Class RestApi
 */
class RestApi extends Controller
{
    use AuthenticatesUsers;

    public function registration(Request $request)
    {
        if ($request->get('key') == Config::get('settings.auth-key')) {
            $validator = Validator::make($request->all(), User::rules());

            if (!$validator->fails()) {
                $input = User::getRegUserFields();
                $record = new User();
                $record->name = $input['name'];
                $record->tel = $input['tel'];
                $record->password = $input['password'];
                $record->remember_token = str_random();
                $record->save();

                $redis = Redis::connection();
                $redis->hset('AccessToken', $record->id, $record->remember_token);
            }
            return redirect('home');
        }
        return view('register');
    }

    public function auth(Request $request)
    {
        if ($request->get('key') == Config::get('settings.auth-key')) {
            $this->login($request);
            return redirect('home');
        }

        return view('login');
    }

    public function addOrder(Request $request)
    {
        if ($request->isMethod('post')) {
            $validation = \Illuminate\Support\Facades\Validator::make(
                $request->all(),
                Orders::rules(),
                Orders::messages($request->key)
            );
            if($validation->fails()){
                return $validation->messages();
            }
            $order = new Orders(Input::all());
            $order->oredr_status_id = 0;
            $order->user_location = json_encode(Input::get('user_location'));
            $order->route_points = json_encode(Input::get('route_points'));
            $order->save();
        }

        return view('add-order', [
            'order' => isset($order) ? $order : null,
        ]);
    }

    public function getMapInfo(Request $request)
    {
        $validation = \Illuminate\Support\Facades\Validator::make(
            $request->all(),
            [
                'key' => 'required|regex:/^E@3dkCRjzjN9pskGA2~Ya4\?mmPgwvI{K82yz$/',
                'country_id' => 'required|max:255',
                'region_id' => 'required|max:255',
                'id_driver' => 'required|max:255',
            ],
            [
                'regex' => 'Invalide access token: ' . $request->get('key'),
                'required' => 'Method\' is not defined',
            ]
        );
        if($validation->fails()){
            return $validation->messages();
        }
        if ($request->get('key') == Config::get('settings.auth-key')) {
            $exampleCar = [
                'cars' => [
                    "id" => "2",
                    "status" => "1",
                    "color" => "red",
                    "direction" => "300",
                    "reg_number" => "AA 2345",
                    "yer" => "2014",
                    "brand" => "Audi",
                    "model" => "A4",
                    "currency" => "frn",
                    "planting_costs" => "32",
                    "driver_phone" => "380976357289",
                    "costs_per_1" => "2",
                    "car_photo" => "http://7likes.com/data/cars/mercedes-ml.png",
                    "location" => [
                        "lat" => "23.333",
                        "lan" => "45.3434"
                    ]
                ]
            ];
            return $exampleCar;
        }

        return view('get-map-info');
    }

    public function listOrder()
    {
        return view('list-order', [
            'order' => Orders::all(),
        ]);
    }

    public function username()
    {
        return 'tel';
    }
}
