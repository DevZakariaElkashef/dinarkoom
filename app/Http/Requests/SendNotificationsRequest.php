<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendNotificationsRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'title_ur' => 'required|string|max:255',
            'title_fil' => 'required|string|max:255',
            'body_en' => 'required|string',
            'body_ar' => 'required|string',
            'body_ur' => 'required|string',
            'body_fil' => 'required|string',
            'users' => 'required'
        ];
    }
}
