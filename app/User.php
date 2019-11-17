<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'facebook',
        'twitter',
        'github',
        'site',
        'biography',
        'image'
    ];

    /** REGRAS DE VÁLIDAÇÃO */
    public function rules($id = '')
    {

        $data =  [
            'name'      => 'required|min:3|max:100',
            'email'     => "required|min:3|max:100|email|unique:users,email,{$id},id",
            'facebook'  => 'max:100',
            'twitter'   => 'max:100',
            'github'    => 'max:100',
            'site'      => 'max:200',
            'biography' => 'max:1000',
            'image'     => 'image',
        ];

        if (empty($id)) {
            $data = array_merge($data, ['password'  => 'required|min:3|max:200|confirmed']);
        }

        return $data;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
