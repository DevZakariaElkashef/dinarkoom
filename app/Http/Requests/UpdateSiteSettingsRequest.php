<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteSettingsRequest extends FormRequest
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
            "logo" => 'nullable|',
            "name_en" => 'required|string|max:255',
            "name_ar" => 'required|string|max:255',
            "name_ur" => 'required|string|max:255',
            "name_fil" => 'required|string|max:255',
            "description_en" => 'required|string|max:1000',
            "description_ar" => 'required|string|max:1000',
            "description_ur" => 'required|string|max:1000',
            "description_fil" => 'required|string|max:1000',
            "facebook" => 'nullable|string',
            "whatsapp" => 'nullable|string',
            "youtube" => 'nullable|string',
            "linkedin" => 'nullable|string',
            "twitter" => 'nullable|string',
            "pinterest" => 'nullable|string',
            "instagram" => 'nullable|string',
            "snapchat" => 'nullable|string',
            "tiktok" => 'nullable|string',
            "phone" => 'nullable|string',
            "email" => 'nullable|string',
            "address" => 'nullable|string',
        ];
    }
}
