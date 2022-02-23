<?php

namespace Modules\Sale\Models;

use App\Models\Tenant\Item;
use App\Models\Tenant\ModelTenant;

class Color extends ModelTenant
{   
    protected $table = 'color';

    protected $fillable = [ 
        'name',
    ];
 
    public function items()
    {
        return $this->hasMany(Item::class);
    }
 

}