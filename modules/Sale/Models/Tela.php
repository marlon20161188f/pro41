<?php

namespace Modules\Sale\Models;

use App\Models\Tenant\Item;
use App\Models\Tenant\ModelTenant;

class Tela extends ModelTenant
{   
    protected $table = 'tela';

    protected $fillable = [ 
        'name',
    ];
 
    public function items()
    {
        return $this->hasMany(Item::class);
    }
 

}