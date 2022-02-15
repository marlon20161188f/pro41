<?php

namespace Modules\Account\Models;
 
use App\Models\Tenant\ModelTenant;

class CompanyAccount extends ModelTenant
{

    public $timestamps = false;
    
    protected $fillable = [
        'Subtotal_pen',
        'total_pen', 
        'igv_pen', 
        'Subtotal_usd', 
        'total_usd', 
        'igv_usd', 
    ];
  

}