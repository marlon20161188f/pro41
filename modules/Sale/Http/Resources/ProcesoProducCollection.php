<?php

namespace Modules\Sale\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProcesoProducCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function($row, $key) {
            return [
                'id' => $row->id,
                'op'=> $row->op,
                'producto_final' => $row->producto_final,
                'fecha_inicio'=> $row->init->format('Y-m-d'),
                'fecha_final'=> $row->llegada?$row->llegada->format('Y-m-d'):'---/---/---',
                'hilo'=> $row->hilo,
                'partida'=> $row->partida,
                'produc_artic'=> $row->produc_artic,
                'color'=> $row->color,
                'prov_tejed'=> $row->prov_tejed,
                'warehouses_id' => $row->warehouses_id,
                'cantidad'=> $row->cantidad,
                'peso'=> $row->peso,
                'peso_tej'=> $row->peso_tej,
                'peso_tin'=> $row->peso_tin,
                'tejed'=> $row->tejed,
                'tinto'=> $row->tinto,
                'estado' => $row->estado,
                'prov_tejed' => $row->prov_tejed,
                'prov_tin' => $row->prov_tin
                ];
        });
    }
    
}
