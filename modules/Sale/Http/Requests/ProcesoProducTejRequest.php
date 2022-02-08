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
            'op' => [
                'required',
            ],
            'producto_final' => [
                'required',
            ],
            'peso' => [
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
        ];
    }
}
