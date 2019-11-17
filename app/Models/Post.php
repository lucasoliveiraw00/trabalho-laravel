<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'date',
        'hour',
        'featured',
        'image',
        'status',
    ];

    /** REGRAS DE VÁLIDAÇÃO */
    public function rules()
    {
        return [
            'title' => 'required|min:1|max:100',
            'description' => 'required|min:1|max:100',
        ];
    }
}
