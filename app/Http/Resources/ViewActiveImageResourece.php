<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ViewActiveImageResourece extends JsonResource
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
            'id' => $this->id ?? 0,
            'path' => Storage::url($this->thumbnail) ?? '',
            'price' => (float) $this->price ?? 0,
            'offer' => (float) $this->offer ?? 0,
            'month' => Carbon::createFromFormat('m', $this->month)->locale(app()->getLocale())->format('F') ?? '',
        ];
    }
}
