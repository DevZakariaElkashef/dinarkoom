<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthenticatedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ?? 0,
            'name' => $this->name ?? '',
            'email' => $this->email ?? '',
            'phone' => $this->phone ?? '',
            'addition_phone' => $this->addition_phone ?? '',
            'civil_id' => $this->civil_id ?? '',
            'token' => 'Bearer ' . $this->createToken('MyApp')->plainTextToken ?: ''
        ];
    }
}
