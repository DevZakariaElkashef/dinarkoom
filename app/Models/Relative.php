<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(RelativeType::class, 'relative_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
