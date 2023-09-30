<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRelative extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function  rules($userId = null): array
    {
        $uniqueRule = Rule::unique('users')->ignore($userId);

        $rules = [
            'user_id' => ['required'],
            'relative_type_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', $uniqueRule],
            'civil_id' => ['required', $uniqueRule],
            'phone' => ['required', 'string', 'max:255', $uniqueRule],
            'addition_phone' => ['required', 'string', 'max:255', $uniqueRule],
        ];

        return $rules;
    }
}
