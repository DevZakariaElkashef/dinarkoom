<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id')->where("role", '!=', 2);
    }


    public static function rules()
    {
        $rules = [
            'thumbnail' => ['nullable', 'image'],
            'price' => ['required', 'integer'],
            'offer' => ['nullable', 'integer'],
            'month' => ['nullable', 'integer'],
            'qty' => ['required', 'integer'],
            'active' => ['nullable', 'integer'],
        ];

        return $rules;
    }
}
