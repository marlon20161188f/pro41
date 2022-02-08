<?php

namespace Modules\Sale\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProcesoProducAlmRequest extends FormRequest
{
     
    public function authorize()
    {
        return true; 
    }
 
    public function rules()
    { 
        
        return [
            'op' => [
                'required',
            ],
            'producto_final' => [
                'required',
            ],
            'peso_tin' => [
                'required',
                'numeric',
                'min:0'
            ],
            'init' => [
                'required',
            ],
            'hilo' => [
                'required',
            ],
            'partida' => [
                'required',
                'numeric',
                'min:0'
            ],  
            'produc_artic' => [
                'required',
            ],
            'llegada' => [
                'required',
            ],
            'warehouses_id' => [
                'required',
            ],
            'cantidad' => [
                'required',
                'numeric',
                'min:0'
            ], 
            
             
        ];
    }
}
