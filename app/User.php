<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends BaseModel
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name', 'email','password','age','mobile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //=====slack Notification===============

    public function routeNotificationForSlack()
    {
        return env('SLACK_WEBHOOK_URL');
    }


    public function getValidationRules(){
        $validations = [
            'name' => 'required | min:2 | max:60',
            'email' => 'required | email | max:191| unique:users,email',
            'age' => 'required | min:2 | max:60',
            'password' =>'required |min:8 | max:60',
            'phone' =>'required | min:8 | max:13'
        ];

        return $validations;
    }

    public function saving_event()
    {
        print_r("aa".$this->get_skip_validation()."bb");
        if (!$this->get_skip_validation())
        {
            return $this->validateObject();
        }

        return true;
    }


}
