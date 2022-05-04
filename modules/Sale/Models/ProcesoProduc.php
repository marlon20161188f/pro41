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
            'peso_tej',
            'peso_tin',
            'roll_rest',
            'tejed',
            'tinto',
            'estado',
            'prov_tejed',
            'prov_tin',
            'updated_at',
            'created_at',
            'ingreso',
            'insumo',
            'guia_Teje',
            'guia_tinto',
            'num_rollos'
        ];
        protected $casts = [
            'init' => 'date', 
            'llegada' => 'date'
        ];
        public function lots()
        {
            return $this->morphMany(ItemLot::class, 'item_loteable');
        }
        public function getIngresoAttribute($value)
    {
        return (is_null($value))?null:json_decode($value);
    }
        public function setIngresoAttribute($value)
    {
        $this->attributes['ingreso'] = (is_null($value))?null:json_encode($value);
    }
        public function getInsumoAttribute($value)
    {
        return (is_null($value))?null:json_decode($value);
    }
        public function setInsumoAttribute($value)
    {
        $this->attributes['insumo'] = (is_null($value))?null:json_encode($value);
    }
}
