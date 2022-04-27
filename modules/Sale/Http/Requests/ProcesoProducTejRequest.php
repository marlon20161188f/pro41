<?php

namespace Modules\Sale\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProcesoProducTejRequest extends FormRequest
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
            'peso_tej' => [
                'required',
                'numeric',
                'min:0'
            ],
            'partida' => [
                'required',
            ],
            'color' => [
                'required',
            ],
            'prov_tejed' => [
                'required',
            ],
            'num_rollos' => [
                'required',
            ],
            'guia_tinto' => [
            ],
            'insumo' =>[
                'required',
            ],
        ];
    }
}
