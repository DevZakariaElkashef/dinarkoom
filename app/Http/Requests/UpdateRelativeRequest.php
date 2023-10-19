<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRelativeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules($userId): array
    {
        $uniqueRule = Rule::unique('relatives')->ignore($userId);
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'civil_id' => ['required', 'digits:12', 'regex:/^[123]/', $uniqueRule],
        ];

        return $rules;
    }
}
