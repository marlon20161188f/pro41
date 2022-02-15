<?php

namespace Modules\Account\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyAccountRequest extends FormRequest
{
    public function authorize() {
        return true;
    }
    
    public function rules() {
        $id = $this->input('id');
        
        return [   
            'Subtotal_pen'=> ['required'],
            'total_pen'=> ['required'], 
            'igv_pen'=> ['required'], 
            'Subtotal_usd'=> ['required'], 
            'total_usd'=> ['required'], 
            'igv_usd'=> ['required'], 
        ];
    }
}