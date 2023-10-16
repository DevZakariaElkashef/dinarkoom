<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ViewOrdersResourece extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id ?? 0,
            'user_name' => $this->user->name ?? '',
            'relative_name' => $this->relative->name ?? '',
            'code' => $this->code ?? '',
            'image' => Storage::url($this->image->thumbnail) ?? '',
            'price' => (int) $this->image->price ?? 0,
            'date' => $this->created_at->format('y-m-d')
        ];
    }
}
