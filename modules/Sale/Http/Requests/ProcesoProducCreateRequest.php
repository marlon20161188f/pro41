<?php

namespace Modules\Sale\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProcesoProducCreateRequest extends FormRequest
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
            'producto' => [
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
            // 'llegada' => [
            //     'required',
            // ], 
        ];
    }
}
