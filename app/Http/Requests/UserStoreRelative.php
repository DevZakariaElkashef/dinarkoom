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
            'user_id' => ['nullable'],
            'relative_type_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'civil_id' => ['required', 'digits:12', 'regex:/^[123]/', $uniqueRule],
        ];

        return $rules;
    }
}
