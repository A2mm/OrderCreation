<?php

namespace App\Http\Resources\Api\V1\Commissions;

use Illuminate\Http\Resources\Json\JsonResource;

class CommissionApiResource extends JsonResource
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
            'id'             => $this->id,
            'value'          => $this->value. ' %',
        ];
    }
}
