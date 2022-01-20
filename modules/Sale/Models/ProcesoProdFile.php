<?php

namespace Modules\Sale\Models;

use App\Models\Tenant\ModelTenant;

class ProcesoProdFile extends ModelTenant
{
    public $timestamps = false;

    protected $fillable = [
        'sale_opportunity_id',
        'filename',
    ];
 
    public function sale_opportunity()
    {
        return $this->belongsTo(ProcesoProd::class, 'sale_opportunity_id');
    }

}