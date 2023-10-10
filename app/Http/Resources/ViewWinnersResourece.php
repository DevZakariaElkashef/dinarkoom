<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ViewWinnersResourece extends JsonResource
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
            'name' => $this->user->name ?? '',
            'month' => Carbon::createFromFormat('m', $this->month)->locale(app()->getLocale())->format('F') ?? '',
            'active' => $this->status ?? 0,
            'value' => (int) $this->value ?? 0
        ];
    }
}
