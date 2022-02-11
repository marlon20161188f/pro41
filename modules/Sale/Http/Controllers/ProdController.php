<?php

namespace Modules\Sale\Http\Controllers;

use Modules\Purchase\Models\PurchaseOrder;

use App\Http\Controllers\SearchItemController;
use App\Http\Controllers\Tenant\EmailController;
use App\Models\Tenant\Configuration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Person;
use App\Models\Tenant\Catalogs\CurrencyType;
use App\Models\Tenant\Catalogs\ChargeDiscountType;
use App\Models\Tenant\Establishment;
use App\CoreFacturalo\Requests\Inputs\Common\LegendInput;
use App\Models\Tenant\Item;
use App\Models\Tenant\Series;
use App\Models\Tenant\Catalogs\AffectationIgvType;
use App\Models\Tenant\Catalogs\DocumentType;
use Illuminate\Support\Facades\DB;
use App\Models\Tenant\Catalogs\PriceType;
use App\Models\Tenant\Catalogs\SystemIscType;
use App\Models\Tenant\Catalogs\AttributeType;
use App\Models\Tenant\Company;
use App\Models\Tenant\Warehouse;
use Illuminate\Support\Str;
use App\CoreFacturalo\Requests\Inputs\Common\PersonInput;
use App\CoreFacturalo\Requests\Inputs\Common\EstablishmentInput;
use App\CoreFacturalo\Helpers\Storage\StorageDocument;
use App\CoreFacturalo\Template;
use Mpdf\Mpdf;
use Mpdf\HTMLParserMode;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Models\Tenant\PaymentMethodType;
use Modules\Sale\Models\SaleOpportunity;
use Modules\Sale\Models\ProcesoProd;
use Modules\Sale\Models\ProcesoProduc;
use Modules\Sale\Models\SaleOpportunityItem;
use Modules\Sale\Http\Resources\SaleOpportunityCollection;
use Modules\Sale\Http\Resources\ProcesoProdCollection;
use Modules\Sale\Http\Resources\ProcesoProducCollection;
use Modules\Sale\Http\Resources\SaleOpportunityResource;
use Modules\Sale\Http\Resources\SaleOpportunityResource2;
use Modules\Sale\Http\Requests\SaleOpportunityRequest;
use Modules\Sale\Http\Requests\ProcesoProducCreateRequest;
use Modules\Sale\Http\Requests\ProcesoProducImportRequest;
use Modules\Sale\Http\Requests\ProcesoProducTejRequest;
use Modules\Sale\Http\Requests\ProcesoProducTinRequest;
use Modules\Sale\Http\Requests\ProcesoProducAlmRequest;
use App\Http\Requests\Tenant\ItemRequest;

use Modules\Sale\Mail\SaleOpportunityEmail;

/**
 * Class SaleOpportunityController
 *
 * @package Modules\Sale\Http\Controllers
 * @mixin Controller
 */
class ProdController extends Controller
{
    public function index(){

        return view('tenant.proceso_prod.index');
    }
    public function create($id=null)
    {
        return view('tenant.proceso_prod.form', compact('id'));
    }
    public function import($id)
    {
        //dd($id);
        return view('tenant.proceso_prod.import', compact('id'));
    }
    public function tej($id)
    {
        return view('tenant.proceso_prod.tej', compact('id'));
    }
    public function tin($id )
    {
        return view('tenant.proceso_prod.tin', compact('id'));
    }
    public function alm($id)
    {
        return view('tenant.proceso_prod.alm', compact('id'));
    }
    public function det($id)
    {
        return view('tenant.proceso_prod.det', compact('id'));
    }
    public function record($id)
    {
        $record =  ProcesoProduc::find($id);

        return $record;
    }
    public function columns()
    {
        return [
            'fecha_inicio' => 'Fecha de inicio',
            'op' => 'Proveedor'
        ];
    }
    public function records(Request $request)
    {
        // $records =DB::table('proceso_producs')->get();
        $records = ProcesoProduc::where('id', '>',0);
         return new ProcesoProducCollection($records->paginate(config('tenant.items_per_page')));
        // $records = $this->getRecords($request);

        // return new ProcesoProdCollection($records->paginate(config('tenant.items_per_page')));
    }
    

    private function getRecords($request){

        if($request->column == 'user_name'){

            $records = ProcesoProd::whereHas('user', function($query) use($request){
                            $query->where('name', 'like', "%{$request->value}%");
                        })
                        ->whereTypeUser()
                        ->latest();

        }elseif($request->column == 'customer_name'){

            $records =ProcesoProd::whereHas('person', function($query) use($request){
                            $query->where('name', 'like', "%{$request->value}%");
                        })
                        ->whereTypeUser()
                        ->latest();

        }else{

            $records = ProcesoProd::where($request->column, 'like', "%{$request->value}%")
                                ->whereTypeUser()
                                ->latest();

        }
        $records = ProcesoProduc::get();

        return $records;
    } 
     public function item_tables() {

        $items = $this->table('items');
       // $items = SearchItemController::getNotServiceItemToModal();

       $affectation_igv_types = AffectationIgvType::whereActive()->get();
       $price_types = PriceType::whereActive()->get();

       return compact('items', 'affectation_igv_types', 'price_types');
   }

   public function tables() {

    $warehouses = Warehouse::query()->select('establishment_id', 'description')->get()->transform(function($row) {
        return [
            'id' => $row->establishment_id,
            'description' => $row->description
        ];
    });
    $customers = $this->table('customers');
    $suppliers = $this->table('suppliers');
    $purchase_orders = PurchaseOrder::query()->select('id', 'prefix')->get()->transform(function($row) {
        return [
            'id' => $row->id,
            'number' => $row->prefix.' - '.$row->id
        ];
    });
    $establishments = Establishment::where('id', auth()->user()->establishment_id)->get();
    $currency_types = CurrencyType::query()->select('id', 'description', 'symbol')->whereActive()->get()->transform(function($row) {
        return [
            'id' => $row->id,
            'name' => $row->description.' '.$row->symbol
        ];
    });
    $company = Company::active();

    return compact('warehouses', 'purchase_orders', 'suppliers', 'customers', 'establishments','currency_types','company');
    }

    public function table($table)
    {
        switch ($table) {
            case 'suppliers':

                $customers = Person::whereType('suppliers')->orderBy('name')->take(20)->get()->transform(function($row) {
                    return [
                        'id' => $row->id,
                        'description' => $row->number.' - '.$row->name,
                        'name' => $row->name,
                        'number' => $row->number,
                        'identity_document_type_id' => $row->identity_document_type_id,
                        'identity_document_type_code' => $row->identity_document_type->code
                    ];
                });
                return $customers;

                break;
            case 'customers':

                $customers = Person::whereType('customers')->orderBy('name')->take(20)->get()->transform(function($row) {
                    return [
                        'id' => $row->id,
                        'description' => $row->number.' - '.$row->name,
                        'name' => $row->name,
                        'number' => $row->number,
                        'identity_document_type_id' => $row->identity_document_type_id,
                        'identity_document_type_code' => $row->identity_document_type->code
                    ];
                });
                return $customers;

                break;

            case 'items':

                $warehouse = Warehouse::where('establishment_id', auth()->user()->establishment_id)->first();

                $items = Item::orderBy('description')->whereIsActive()->whereNotIsSet()
                    // ->with(['warehouses' => function($query) use($warehouse){
                    //     return $query->where('warehouse_id', $warehouse->id);
                    // }])
                    ->get()->transform(function($row) {
                    $full_description = $this->getFullDescription($row);
                    // $full_description = ($row->internal_id)?$row->internal_id.' - '.$row->description:$row->description;
                    return [
                        'id' => $row->id,
                        'full_description' => $full_description,
                        'description' => $row->description,
                        'currency_type_id' => $row->currency_type_id,
                        'currency_type_symbol' => $row->currency_type->symbol,
                        'sale_unit_price' => $row->sale_unit_price,
                        'purchase_unit_price' => $row->purchase_unit_price,
                        'unit_type_id' => $row->unit_type_id,
                        'sale_affectation_igv_type_id' => $row->sale_affectation_igv_type_id,
                        'purchase_affectation_igv_type_id' => $row->purchase_affectation_igv_type_id,
                        'is_set' => (bool) $row->is_set,
                        'has_igv' => (bool) $row->has_igv,
                        'calculate_quantity' => (bool) $row->calculate_quantity,
                        'item_unit_types' => collect($row->item_unit_types)->transform(function($row) {
                            return [
                                'id' => $row->id,
                                'description' => "{$row->description}",
                                'item_id' => $row->item_id,
                                'unit_type_id' => $row->unit_type_id,
                                'quantity_unit' => $row->quantity_unit,
                                'price1' => $row->price1,
                                'price2' => $row->price2,
                                'price3' => $row->price3,
                                'price_default' => $row->price_default,
                            ];
                        }),
                        'warehouses' => collect($row->warehouses)->transform(function($row) {
                            return [
                                'warehouse_id' => $row->warehouse->id,
                                'warehouse_description' => $row->warehouse->description,
                                'stock' => $row->stock,
                            ];
                        })
                    ];
                });
                return $items;

                break;
            default:
                return [];

                break;
        }
    }
    public function getFullDescription($row){

        $desc = ($row->internal_id)?$row->internal_id.' - '.$row->description : $row->description;
        $category = ($row->category) ? " - {$row->category->name}" : "";
        $brand = ($row->brand) ? " - {$row->brand->name}" : "";

        $desc = "{$desc} {$category} {$brand}";

        return $desc;
    }
    public function storecreate(ProcesoProducCreateRequest $request)
    {
        $id = $request->input('id');
        $proceso = ProcesoProduc::firstOrNew(['id' => $id]);
        $proceso->fill($request->all());
        $proceso->save();

        return [
            'success' => true,
            'message' => ($id)?'Proceso editado con éxito':'Proceso registrado con éxito'
        ];
    }
    public function storeimport(ProcesoProducImportRequest $request)
    {
        $id = $request->input('id');
        $proceso = ProcesoProduc::firstOrNew(['id' => $id]);
        $proceso->fill($request->all());
        $proceso->estado="Tejeduría";
        $proceso->update();

        return [
            'success' => true,
            'message' => ($id)?'Proceso editado con éxito':'Proceso registrado con éxito'
        ];
    }
    public function storetej(ProcesoProducTejRequest $request)
    {
        $id = $request->input('id');
        $proceso = ProcesoProduc::firstOrNew(['id' => $id]);
        $proceso->fill($request->all());
        $proceso->estado="Tintorería";
        $proceso->update();

        return [
            'success' => true,
            'message' => ($id)?'Proceso editado con éxito':'Proceso registrado con éxito'
        ];
    }
    public function storetin(ProcesoProducTinRequest $request)
    {
        $id = $request->input('id');
        $proceso = ProcesoProduc::firstOrNew(['id' => $id]);
        $proceso->fill($request->all());
        $proceso->estado="Almacén";
        $proceso->update();

        return [
            'success' => true,
            'message' => ($id)?'Proceso editado con éxito':'Proceso registrado con éxito'
        ];
    }
    public function storealm(ProcesoProducaLMRequest $request)
    {
        $id = $request->input('id');
        $proceso = ProcesoProduc::firstOrNew(['id' => $id]);
        $proceso->fill($request->all());
        $proceso->estado="Inventario";
        $proceso->update();
        $item = Item::firstOrNew(['id' => $proceso->produc_artic]);
        //$item->fill($request->all());
            // $item->lots()->delete();
            $establishment = Establishment::where('id', auth()->user()->establishment_id)->first();
            $warehouse = Warehouse::where('establishment_id',$establishment->id)->first();

            //$warehouse = WarehouseModule::find(auth()->user()->establishment_id);

            $v_lots = isset($request->lots) ? $request->lots:[];

            foreach ($v_lots as $lot) {

                // $item->lots()->create($lot);
                $item->lots()->create([
                    'date' => $lot['date'],
                    'series' => $lot['series'],
                    'peso' => $lot['peso'],
                    'item_id' => $item->id,
                    'warehouse_id' => $warehouse ? $warehouse->id:null,
                    'has_sale' => false,
                    'state' => $lot['state'],
                ]);
            }
        $item->update();
        return [
            'success' => true,
            'message' => ($id)?'Proceso editado con éxito':'Proceso registrado con éxito'
        ];
    }
    public function storedet(Request $request)
    {
        $id = $request->input('id');
        $proceso = ProcesoProduc::firstOrNew(['id' => $id]);
       // $proceso->fill($request->all());
        $proceso->estado="Cancelado";
        $proceso->update();

        return [
            'success' => true,
            'message' => ($id)?'Proceso editado con éxito':'Proceso registrado con éxito'
        ];
    }
    public function storeSeries(ItemRequest $request) {

        $id = $request->input('id');
        $item = Item::firstOrNew(['id' => $id]);
        $item->fill($request->all());
        if ($id) {

            // $item->lots()->delete();
            $establishment = Establishment::where('id', auth()->user()->establishment_id)->first();
            $warehouse = Warehouse::where('establishment_id',$establishment->id)->first();

            //$warehouse = WarehouseModule::find(auth()->user()->establishment_id);

            $v_lots = isset($request->lots) ? $request->lots:[];

            foreach ($v_lots as $lot) {

                // $item->lots()->create($lot);
                $item->lots()->create([
                    'date' => $lot['date'],
                    'series' => $lot['series'],
                    'item_id' => $item->id,
                    'warehouse_id' => $warehouse ? $warehouse->id:null,
                    'has_sale' => false,
                    'state' => $lot['state'],
                ]);
            }
        } 

        $item->update();
        
        return [
            'success' => true,
            'message' => ($id)?'Producto editado con éxito':'Producto registrado con éxito',
            'id' => $item->id
        ];
    }

    

}
