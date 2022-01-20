<?php

namespace Modules\Sale\Http\Controllers;

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
use Modules\Sale\Models\SaleOpportunityItem;
use Modules\Sale\Http\Resources\SaleOpportunityCollection;
use Modules\Sale\Http\Resources\ProcesoProdCollection;
use Modules\Sale\Http\Resources\SaleOpportunityResource;
use Modules\Sale\Http\Resources\SaleOpportunityResource2;
use Modules\Sale\Http\Requests\SaleOpportunityRequest;
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
    public function create($id = null)
    {
        return view('tenant.proceso_prod.form', compact('id'));
    }
    public function import($id = null)
    {
        return view('tenant.proceso_prod.import', compact('id'));
    }
    public function tej($id = null)
    {
        return view('tenant.proceso_prod.tej', compact('id'));
    }
    public function tin($id = null)
    {
        return view('tenant.proceso_prod.tin', compact('id'));
    }
    public function alm($id = null)
    {
        return view('tenant.proceso_prod.alm', compact('id'));
    }
    public function det($id = null)
    {
        return view('tenant.proceso_prod.det', compact('id'));
    }
    public function columns()
    {
        return [
            'date_of_issue' => 'Fecha de emisión',
            'user_name' => 'Vendedor',
            'customer_name' => 'Cliente'
        ];
    }
    public function records(Request $request)
    {
        $records = $this->getRecords($request);

        return new ProcesoProdCollection($records->paginate(config('tenant.items_per_page')));
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

        return $records;
    }

}
