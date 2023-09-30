<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'civil_id',
        'phone',
        'addition_phone',
        'is_online',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function relatives()
    {
        return $this->hasMany(Relative::class);
    }


    public static function rules($userId = null)
    {
        $uniqueRule = Rule::unique('users')->ignore($userId);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', $uniqueRule],
            'civil_id' => ['required', $uniqueRule],
            'phone' => ['required', 'string', 'max:255', $uniqueRule],
            'addition_phone' => ['required', 'string', 'max:255', $uniqueRule],
            'password' => ['nullable', 'min:8']
        ];

        return $rules;
    }
}
