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
            'op' => [
                'required',
            ],
            'producto_final' => [
                'required',
            ],
            'peso' => [
                'required',
                'numeric',
                'min:0.01'
            ],
            'init' => [
                'required',
            ],
            'hilo' => [
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
        ];
    }
}
