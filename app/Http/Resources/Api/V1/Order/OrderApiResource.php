<?php

namespace App\Http\Resources\Api\V1\Order;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\V1\User\UserApiResource;
use App\Http\Resources\Api\V1\Commissions\CommissionApiResource;

class OrderApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'                => $this->id,
            'user_id'           => $this->user_id,
            'user_info'         => new UserApiResource($this->user),
            'commission_info'   => CommissionApiResource::collection($this->commissions),
            'amount'            => $this->amount . ' ' . $this->currency(),
            'created_at'        => $this->created_at,
        ];
    }
}
