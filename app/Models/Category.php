<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 
        'url', 
        'image',
        'description',
    ];

    /** REGRAS DE VÁLIDAÇÃO */
    public function rules($id = '')
    {
        return [
            'name'          => 'required|min:3|max:100',
            'url'           => 'required|min:3|max:100',
            'image'         => 'image|max:2048',
            'description'   => 'required|min:3|max:100',
            
        ];
    }
}
