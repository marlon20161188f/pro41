<?php

namespace Modules\Sale\Models;

use App\Models\Tenant\Catalogs\CurrencyType;
use App\Models\Tenant\User;
use App\Models\Tenant\SoapType;
use App\Models\Tenant\StateType;
use App\Models\Tenant\Person;
use App\Models\Tenant\Establishment;
use App\Models\Tenant\Quotation;
use App\Models\Tenant\PaymentMethodType;
use App\Models\Tenant\ModelTenant;
use Modules\Inventory\Models\InventoryKardex;
use Modules\Purchase\Models\PurchaseOrder;

class ProcesoProduc extends ModelTenant
{
    protected $table = 'proceso_producs';
        
        protected $fillable = [
            'id',
            'op',
            'producto_final',
            'init',
            'llegada',
            'hilo',
            'partida',
            'produc_artic',
            'color',
            'warehouses_id',
            'cantidad',
            'peso',
            'tejed',
            'tinto',
            'estado'
        ];
        protected $casts = [
            'init' => 'date', 
            'llegada' => 'date'
        ];
     
}
