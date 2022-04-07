<?php

namespace Modules\Sale\Models;

use App\Models\Tenant\Item;
use App\Models\Tenant\ModelTenant;

class OP extends ModelTenant
{   
    protected $table = 'op';

    protected $fillable = [ 
        'name',
    ];
 
    public function items()
    {
        return $this->hasMany(Item::class);
    }
 

}