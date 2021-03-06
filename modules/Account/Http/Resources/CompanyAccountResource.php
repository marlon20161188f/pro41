<?php

namespace Modules\Account\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyAccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request) {
        return [
            'id' => $this->id, 
            'Subtotal_pen'=> $this->Subtotal_pen,
            'total_pen'=> $this->total_pen, 
            'igv_pen'=> $this->igv_pen, 
            'Subtotal_usd'=> $this->Subtotal_usd, 
            'total_usd'=> $this->total_usd, 
            'igv_usd'=> $this->igv_usd, 
        ];
    }
}