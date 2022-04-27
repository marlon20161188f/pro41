<?php

namespace Modules\Sale\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProcesoProducImportRequest extends FormRequest
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
           
            'tela' => [
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
            'prov_tejed' => [
                'required',
            ], 
            'guia_teje' => [
            ], 
            'insumo' =>[
                'required',
            ],
        ];
    }
}
