<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function rules()
    {
        return [
            'country' => 'required|max:255',
            'password' => 'required|max:255',
            'tel' => 'required|max:255|unique:users',
        ];
    }
    
    public static function getRegUserFields()
    {
        return [
            'key'    => Input::get('key'),
            'name'   => Input::get('country'). '_' . md5(Input::get('password')),
            'password' => bcrypt(Input::get('password')),
            'tel'   => Input::get('tel'),
        ];
    }
}
