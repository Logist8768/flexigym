<?php

namespace Modules\Cart\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return $data = [
            'id' => $this->id,
            'client' => $this->client,
            'subtotal' => $this->subtotal,
            'discount' => $this->discount,
            'total' => $this->total,
            'coupon_code' => $this->coupon_code,
            'products' => $this->products,
        ];
    }
}
