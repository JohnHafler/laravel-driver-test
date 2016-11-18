<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id',
        'country_id',
        'user_location',
        'route_points',
        'region_id',
        'id_driver',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'key',
        '_token',
    ];

    public static function rules()
    {
        return [
            'key' => 'required|regex:/^E@3dkCRjzjN9pskGA2~Ya4\?mmPgwvI{K82yz$/',
            'country_id' => 'required|max:255',
            'region_id' => 'required|max:255',
            'id_driver' => 'required|max:255',
        ];
    }

    public static function  messages($key)
    {
        return [
            'regex' => 'Invalide access token: ' . $key,
            'required' => 'Method\' is not defined',
        ];
    }

    public function getStatusOrder()
    {
        $status = [
            0 => 'Ожидает ответ водителя',
            1 => 'Водитель принял заказ',
        ];

        return $status[$this->oredr_status_id];
    }
}
