<?php

namespace Modules\Sale\Models;

use App\Models\Tenant\Item;
use App\Models\Tenant\ModelTenant;

class Hilo extends ModelTenant
{   
    protected $table = 'hilo';

    protected $fillable = [ 
        'name',
    ];
 
    public function items()
    {
        return $this->hasMany(Item::class);
    }
 

}