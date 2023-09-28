<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = [];


    public static function rules()
    {
        $rules = [
            'dir' => ['required'],
            'right_image' => ['nullable', 'image'],
            'left_image' => ['nullable', 'image']
        ];

        return $rules;
    }
}
