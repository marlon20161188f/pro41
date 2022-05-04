<?php

namespace Modules\Sale\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProcesoProducTinRequest extends FormRequest
{
     
    public function authorize()
    {
        return true; 
    }
 
    public function rules()
    { 
        
        return [
            
            'producto_final' => [
                'required',
            ],
           
            'init' => [
                'required',
            ],
           
            'tejed' => [
                'required',
                'numeric',
                'min:0.01'
            ],
            'tinto' => [
                'required',
                'numeric',
                'min:0.01'
            ], 
            'partida' => [
                'required',
                'min:0'
            ],  
            'color' => [
                'required',
            ],
            'peso_tin' => [
                'required',
                'numeric',
                'min:0'
            ], 
            'ingreso' =>[
            ],
            'num_rollos' => [
            ],
            'insumo' =>[
            ],
            'roll_rest' =>[
            ],

        ];
    }
}
