<template>
    <div class="card mb-0 pt-2 pt-md-0">
        <div class="card-header bg-info">
            <template v-if="form.estado==='Cancelado'">
            <h3 class="my-0">Cancelado</h3>
            </template>
            <template v-else-if="form.estado==='Inventario'">
            <h3 class="my-0" >Inventario</h3>
            </template>
        </div>
        <div class="tab-content">
            <form autocomplete="off" @submit.prevent="submit"
                 >
                <div class="form-body">
                    <div class="row">
                        <template>

                            <div class="col-md-12 col-lg-12 mt-2">
                                <!-- Contado -->
                                <template >
                                    <table>
                                        <thead>
                                        <tr width="100%">
                                            <th
                                                class="pb-2">Producto final <span class="text-danger">*</span>
                                                <!-- <el-tooltip class="item"
                                                            content="Aperture caja o cuentas bancarias"
                                                            effect="dark"
                                                            placement="top-start">
                                                    <i class="fa fa-info-circle"></i>
                                                </el-tooltip> -->
                                            </th>
                                            <th class="pb-2" 
                                                >Fec. Inicio <span class="text-danger">*</span>
                                            </th>
                                            <th 
                                                class="pb-2">Peso total (Kg) 
                                            </th>
                                            <th 
                                                class="pb-2">Peso resultante Tejeduría (Kg) 
                                            </th>
                                            <th
                                                class="pb-2">Tejeduría (%) 
                                            </th>
                                            <th
                                                class="pb-2">Tinteduría (%) 
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                     <el-select  v-model="form.producto_final" name="producto_final">
                                                        <el-option key="Rib" value="Rib" label="Rib"></el-option>
                                                        <el-option key="Rollo" value="Rollo" label="Rollo"></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
                                             <td>
                                                 <div class="form-group mb-2 mr-2">
                                                <el-date-picker
                                                    v-model="form.init"
                                                    :clearable="false"
                                                    format="dd/MM/yyyy"
                                                    type="date"
                                                    value-format="yyyy-MM-dd"
                                                    name="init"
                                                    :readonly="true"
                                                    >
                                                    </el-date-picker>
                                                 </div>
                                            </td>
                                             <td>
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.peso" type="number" name="peso" :disabled="true"></el-input>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.peso_tej" type="number" name="peso_tin" min="0" step=".0001" :disabled="true"></el-input>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-input v-model="form.tejed" type="number" :disabled="true" name="tejed" step=".01" ></el-input>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.tinto" type="number" :readonly="true" name="tinto" step=".01" ></el-input>
                                                </div>
                                            </td>
                                            <br>
                                        </tr>
                                        </tbody>
                                    </table>
                                </template>
                                <template >
                                    <table style="width:-webkit-fill-available;">
                                        <thead>
                                        <tr width="100%" >
                                            <th
                                                class="pb-2">Nº de partida <span class="text-danger">*</span>
                                            </th>
                                            <th
                                                class="pb-2" >Color <span class="text-danger">*</span>
                                            </th>
                                            <th
                                                class="pb-2" >Peso resultante Tintorería (kg) <span class="text-danger">*</span>
                                            </th>
                                             <th
                                                class="pb-2 text-center" style="color:#777777; font-weight: bold;">N° de rollos resultante 
                                            </th>
                                           <!-- <th
                                                class="pb-2" >Guía de tintorería
                                            </th> -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td >
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.partida" type="text" name="partida" :readonly="true"></el-input>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group mb-2 mr-2" align="right" style="margin-top: -1.4rem;">
                                                    <a v-if="form_color.add == false"
                                                    class="control-label font-weight-bold text-info"
                                                    href="#"
                                                    @click="form_color.add = true"> [ + Nuevo]</a>
                                                    <a v-if="form_color.add == true"
                                                    class="control-label font-weight-bold text-info"
                                                    href="#"
                                                    @click="saveColor()"> [ + Guardar]</a>
                                                    <a v-if="form_color.add == true"
                                                    class="control-label font-weight-bold text-danger"
                                                    href="#"
                                                    @click="form_color.add = false"> [ Cancelar]</a>
                                                    <el-input v-if="form_color.add == true"
                                                  v-model="form_color.name"
                                                  dusk="item_code"
                                                  style="margin-bottom:1.5%;"></el-input>
                                                   <el-select v-if="form_color.add == false"
                                                   v-model="form.color" placeholder="Seleccionar" name="color">
                                                            <!-- @change="changePurchaseOrderType" -->
                                                       <el-option v-for="option in color"
                                                       :key="option.id"
                                                       :label="option.name"
                                                       :value="option.name"></el-option>  
                                                    </el-select>
                                                </div>
                                            </td>
                                             <td >
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.peso_tin" type="number" name="peso_tin" min="0" v-bind:max="form.peso_tej" step=".0001" :readonly="true"></el-input>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2 text-center" style="color:#777777; font-weight: bold;">
                                                    {{form.num_rollos}}
                                                </div>
                                            </td>
                                            <!-- <td >
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.num_rollos" type="number" name="num_rollos" min="0" v-bind:max="form.peso_tej" step=".0001" ></el-input>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.guia_tinto" type="text" name="guia_tinto" ></el-input>
                                                </div>
                                            </td> -->
                                        </tr>
                                        </tbody>
                                    </table>
                                </template>
                                <template>
                                    <table >
                                        <tr>
                                            <table v-for="(forms,index) in form.insumo" :key="index">
                                        <tr style="color:#777777; font-weight: bold;">
                                            insumo {{index+1}}
                                        </tr>
                                        <tr>
                                            <th
                                                class="pb-2 text-center" >OP
                                            </th>
                                            <th
                                                class="pb-2">Tipo de hilo <span class="text-danger">*</span>
                                            </th>
                                            <th
                                                class="pb-2 text-center" >Peso
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-select  v-model="forms.op" name="op" :disabled="true">
                                                        <el-option ></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
                                             <td>
                                                <div class="form-group mb-2 mr-2" align="right" style="margin-top: -1.4rem;">
                                                     <a v-if="form_hilo.add == false"
                                                    class="control-label font-weight-bold text-info"
                                                    href="#"
                                                    @click="form_hilo.add = true"> [ + Nuevo]</a>
                                                    <a v-if="form_hilo.add == true"
                                                    class="control-label font-weight-bold text-info"
                                                    href="#"
                                                    @click="saveHilo()"> [ + Guardar]</a>
                                                    <a v-if="form_hilo.add == true"
                                                    class="control-label font-weight-bold text-danger"
                                                    href="#"
                                                    @click="form_hilo.add = false"> [ Cancelar]</a>
                                                    <el-input v-if="form_hilo.add == true"
                                                  v-model="form_hilo.name"
                                                  dusk="item_code"
                                                  style="margin-bottom:1.5%;"></el-input>
                                                    <el-select v-if="form_hilo.add == false" 
                                                    v-model="forms.hilo" placeholder="Seleccionar" name="hilo" :disabled="true">
                                                        <el-option v-for="option in hilo"
                                                       :key="option.id"
                                                       :label="option.name"
                                                       :value="option.name"></el-option>  
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="forms.peso" type="number" name="peso" step=".0001" :disabled="true"></el-input>
                                                </div>
                                            </td>
                                            <td v-show="forms.lote">
                                                <tr>
                                                    <td>
                                                        <div class="form-group mb-2 mr-2">
                                                        Lote:
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-2 mr-2">
                                                        <el-input v-model="forms.lote" type="text" :readonly="true"></el-input>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </td>
                                        </tr>
                                    </table>
                                        </tr>
                                          <tr >
                                            <th >
                                                <td style="font-size: 16px; color:#777777; font-weight: bold;">
                                                    Datos Ingresados :
                                                </td>
                                                <td style="padding-left: 12rem;"> 
                                                    <table style="width:-available; ">
                                                        <thead>
                                                            <tr width="100%" >
                                                                <th
                                                                    class="pb-2">Producto o artículo <span class="text-danger">*</span>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td >
                                                                    <div class="form-group mb-2 mr-2">
                                                                        <el-select v-model="form.produc_artic" name="produc_artic" :disabled="true">
                                                                        <el-option v-for="options in items"
                                                                                    :key="options.id"
                                                                                    :label="options.description"
                                                                                    :value="options.id"></el-option>
                                                                        </el-select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </th>
                                           
                                            <!-- <th 
                                            width="7%"><a href="#" @click.prevent="clickAddInsumo" 
                                            class="text-center font-weight-bold text-info">[+ Agregar]</a>
                                            </th> -->
                                        </tr>
                                        <tr 
                                         v-for="(forms, index) in ingreso" :key="index" width="100%" 
                                         style="webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);">
                                           <td style="padding-top: 0.8rem;">
                                               <tr>
                                                    <th style="color:#777777; font-weight: bold;">
                                                        Ingreso {{index+1}}
                                                    </th>
                                                </tr>
                                                
                                                     <table>
                                        <thead>
                                            <tr>
                                                <th
                                                class="pb-2" >Fec. llegada a almacén <span class="text-danger">*</span>
                                                </th>
                                                <th
                                                class="pb-2" >Almacén <span class="text-danger">*</span>
                                                </th>
                                                <th
                                                class="pb-2" >Cantidad <span class="text-danger">*</span>
                                                </th>
                                                <th
                                                class="pb-2" >Guía de tintorería <span class="text-danger">*</span>
                                                </th>
                                                <th
                                                class="pb-1" >
                                                </th>
                                                <th
                                                class="pb-1" >
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                               <td >
                                                <div class="form-group mb-2 mr-2">
                                                     <el-date-picker
                                                        :readonly="forms.val===1"
                                                        v-model="forms.llegada"
                                                        :clearable="false"
                                                        format="dd/MM/yyyy"
                                                        type="date"
                                                        value-format="yyyy-MM-dd"
                                                        name="llegada"
                                                        >
                                                        </el-date-picker>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mb-2 mr-2">
                                                            <el-select  v-model="forms.warehouses_id" name="warehouses_id" :disabled="forms.val===1">
                                                                <!-- @change="changePurchaseOrderType" -->
                                                                
                                                            <el-option v-for="options in warehouses" 
                                                                    :key="options.id"
                                                                    :label="options.description"
                                                                    :value="options.description"></el-option>
                                                        </el-select>
                                                    </div>
                                                </td>
                                                <td >
                                                    <div class="form-group mb-2 mr-2">
                                                        <el-input v-model="forms.cantidad" name="cantidad" type="number" min="0" 
                                                        v-bind:max="totalSum()" :disabled="forms.val===1"></el-input>
                                                    </div>
                                                </td>
                                                <td >
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="forms.guia_tinto" type="text" name="guia_tinto" :readonly="forms.val===1"></el-input>
                                                </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mb-1 mr-1">
                                                         <template v-if="forms.val===1">
                                                                <el-button icon="fa fa-search"
                                                                class="btn btn-info"
                                                                size="short"
                                                                type="primary"
                                                                @click.prevent="clickLotcode(index)">
                                                             </el-button>
                                                        </template>
                                                        <template v-else-if="forms.val===0">
                                                        <el-button icon="el-icon-edit-outline"
                                                                size="small"
                                                                type="primary"
                                                                @click.prevent="clickLotcode(index)">Ingrese series
                                                        </el-button>
                                                        </template>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mb-1 mr-1">
                                                        <template v-if="forms.val===1">
                                                        </template>
                                                        <template v-else-if="forms.val===0">
                                                       <el-button
                                                               @click.prevent="submits(index)"  :loading="loading_submits"
                                                                type="primary">Cargar Inventario
                                                        </el-button>
                                                        </template>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                                
                                            </td>
                                            
                                            <td class="series-table-actions text-center">
                                                <tr><td></td></tr>
                                                <tr><td></td></tr>
                                                <tr>
                                                    <td>
                                                        <template v-if="forms.val===1">
                                                        </template>
                                                         <template v-else-if="forms.val===0">
                                                        <button style="margin-top:2.7rem;" type="button" class="btn waves-effect waves-light btn-xs btn-danger" @click.prevent="clickCancel(index)">
                                                        <i class="fa fa-trash"></i>
                                                        </button>
                                                        </template>
                                                    </td>
                                                </tr>
                                            </td> 
                                        <lots-form
                                            :val="forms.val"
                                            :lots="forms.lots"
                                            :recordId="recordId"
                                            :showDialog.sync="forms.showDialogLots"
                                            :stock="forms.cantidad"
                                            @addRowLot="addRowLot,index"
                                            >
                                        </lots-form>
                                        </tr>
                                    </table >
                                </template>
                                 <div class="text-center">
                                    <data-table>
                                    <tr>
                                        <th
                                           class="pb-2" style="font-size: 14px">N° de rollos restantes      
                                        </th>
                                    </tr>
                                    <tr class="text-center">
                                        {{ form.roll_rest }}
                                    </tr>
                                    </data-table>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="form-actions text-center mt-4">
                    <!-- <el-button
                               native-type="submit"  :loading="loading_submit"
                               type="primary">Pasar al Inventario
                    </el-button> -->
                    <el-button @click.prevent="close()">Regresar</el-button>
                    <!-- <el-button @click.prevent="clickprocessreturn()" type="warning">Regresar a tejeduría</el-button> -->

                     <!-- <el-button
                        @click.prevent="clickprocesscancel()" type="danger">
                        Cancelar proceso
                        </el-button> -->
                    
                </div>
            </form>
             
        </div>

        <!-- <purchase-form-item ></purchase-form-item>

        <person-form 
                     type="suppliers"></person-form>

        <purchase-options ></purchase-options>

        <series-form
           >
        </series-form> -->

    </div>
</template>

<script>
import LotsForm from './partials/lots.vue';
import {mapActions} from "vuex";
import {deletable} from "../../../mixins/deletable";
import indexVue from '../../../../../modules/Inventory/Resources/assets/js/extra_info/item_units_per_package/index.vue';

export default {
     props:['id', 'showDialog'],
     mixins: [deletable],
     components: {
        LotsForm
    },
    setup() {
        
    }, mounted() {
        this.initForm()
        this.$http.get(`/${this.resource}/item/tables`)
        .then(response => {
            let data = response.data
            this.items = data.items
             this.form.produc_artic = (this.items.length > 0) ? this.items[0].description : null
        }),
        this.$http.get(`/${this.resource}/tables`)
            .then(response => {
                let data = response.data
                this.document_types = data.document_types_invoice
                this.currency_types = data.currency_types
                this.purchase_orders = data.purchase_orders
                this.payment_conditions = data.payment_conditions
                this.suppliers = data.suppliers
                this.warehouses = data.warehouses
                // this.establishment = data.establishment

                this.hilo = data.hilo
                this.color = data.color
                this.all_suppliers = data.suppliers
                this.discount_types = data.discount_types
                this.payment_method_types = data.payment_method_types
                this.payment_destinations = data.payment_destinations
                this.all_customers = data.customers

                this.charges_types = data.charges_types
                this.$store.commit('setConfiguration', data.configuration);
                this.$store.commit('setEstablishment', data.establishment);
                //this.form.currency_type_id = (this.currency_types.length > 0) ? this.currency_types[0].id : null
                // this.form.establishment_id = (this.establishment.id) ? this.establishment.id : null
                //this.form.document_type_id = (this.document_types.length > 0) ? this.document_types[0].id : null
                this.form.op = (this.purchase_orders.length > 0) ? this.purchase_orders[0].number : null
                this.form.warehouses_id = (this.warehouses.length > 0) ? this.warehouses[0].description : null
                this.form.init =  moment().format('YYYY-MM-DD')
                //this.form.prov_tejed = (this.suppliers.length > 0) ? this.suppliers[0].name : null
            })
            // this.$http.get(`/${this.resource}/record/${this.id}`)
            //    .then(response => {
            //     this.form = response.data
            //     })
            },
    data() {
        return {
            lots:[],
            recordId: null,
            input_person: {},
            form_color: {add: false, name: null, id: null},
            form_hilo: {add: false, name: null, id: null},
            resource: 'proceso_prod',
            showDialogAddItem: false,
            readonly_date_of_due: false,
            localHasGlobalIgv: false,
            showDialogNewPerson: false,
            showDialogOptions: false,
            loading_submit: false,
            loading_submits: false,
            hide_button: false,
            is_perception_agent: false,
            errors: {},
            forms:[],
            form: {
                items:[],
                ingreso:[]
            },
            ingresos:[],
            warehouses:[],
            color: [],
            hilo: [],
            producto: null,
            aux_supplier_id: null,
            total_amount: 0,
            val: 0,
            document_types: [],
            purchase_orders: [],
            currency_types: [],
            discount_types: [],
            charges_types: [],
            payment_method_types: [],
            all_suppliers: [],
            suppliers: [],
            all_customers: [],
            suppliers:[],
            customers: [],
            company: null,
            operation_types: [],
            all_series: [],
            series: [],
            payment_destinations: [],
            payment_conditions: [],
            currency_type: {},
            loading_search: false,
            purchaseNewId: null,
            //showDialogLots:[],
            //showDialogLots: false,
            ingreso:[],
        }},
        async created() {
            await this.initForm()
            // await  this.$http.get(`/${this.resource}/record/${id}`)
            //    .then(response => {
            //     this.form = response.data
            //     })
            this.loading_form = true
            this.$eventHub.$on('reloadDataPersons', (customer_id) => {
                this.reloadDataCustomers(customer_id)
            })

            await this.isUpdate()

        },
    methods:{
        ...mapActions([
            'loadConfiguration',
        ]),
        totalSum(){
        let sum = 0;
            for(let i = 0; i < this.ingreso.length-1; i++){
            sum += (parseInt(this.ingreso[i].cantidad));
                }
             return this.form.num_rollos-sum;
        },
        close() {
            location.href = '/proceso_prod'
        },
        initForm() {
            this.$http.get(`/${this.resource}/record/${this.id}`)
               .then(response => {
                this.form = response.data
                this.ingreso=response.data.ingreso
                console.log(this.form)
                this.form.init =  moment().format('YYYY-MM-DD')
                })
               this.errors = {}
                this.form = {
                    op:'OC-1',
                    producto: null,
                    peso: 0,
                    init: null,
                    hilo: null,
                    tejed:null,
                    tinto:null,
                    produc_artic: null,
                    ingreso:[],
                }
                this.ingreso=[{
                    llegada: moment().format('YYYY-MM-DD'),
                    warehouses_id: null,
                    cantidad: 0,
                    guia_tinto: null,
                    lots:[],
                    showDialogLots: false,
                    val: 1,
                }];
            }, 
            resetForm() {
                this.errors = {}
                this.form = {
                    op:'OC-1',
                    producto: null,
                    peso: 0,
                    init: null,
                    hilo: null,
                    tejed:null,
                    tinto:null,
                    produc_artic: null,
                    ingreso: [],
                    }
                this.ingreso=[{
                    llegada: moment().format('YYYY-MM-DD'),
                    warehouses_id: null,
                    cantidad: 0,
                    guia_tinto: null,
                    lots:[],
                    showDialogLots: false,
                    val: 1,
                }];
                // this.activePanel = 0
                // this.initForm()
                // this.form.currency_type_id = (this.currency_types.length > 0)?this.currency_types[0].id:null
                // this.form.purchase_orders_id = (this.purchase_orders.length > 0)?this.purchase_orders[0].id:null

                // this.form.establishment_id = (this.establishments.length > 0)?this.establishments[0].id:null 
                // this.changeEstablishment() 
                // this.changeDateOfIssue()
                // this.changeCurrencyType()
                // this.allCustomers()
            },
        async reloadTables() {
            await this.$http.get(`/${this.resource}/tables`)
                .then(response => {
                    this.unit_types = response.data.unit_types
                    this.accounts = response.data.accounts
                    this.currency_types = response.data.currency_types
                    this.system_isc_types = response.data.system_isc_types
                    this.affectation_igv_types = response.data.affectation_igv_types
                    this.warehouses = response.data.warehouses
                    this.tela = response.data.tela
                    this.color = response.data.color
                    this.hilo = response.data.hilo
                    this.brands = response.data.brands

                    this.form.sale_affectation_igv_type_id = (this.affectation_igv_types.length > 0) ? this.affectation_igv_types[0].id : null
                    this.form.purchase_affectation_igv_type_id = (this.affectation_igv_types.length > 0) ? this.affectation_igv_types[0].id : null
                })
        }, 
         async submit() {
            //    if (!this.ingreso[0].guia_tinto)
            //         return this.$message.error('Guía de tintorería es requerido');
            //     if (!this.ingreso[0].llegada)
            //         return this.$message.error('Fecha de llegada es requerido');
            //      if (!this.ingreso[0].warehouses_id)
            //         return this.$message.error('Almacén es requerido');
            //      if (!this.ingreso[0].cantidad)
            //         return this.$message.error('La cantidad es requerido');
                if (!this.form.producto_final)
                    return this.$message.error('Producto final es requerido');
                if (!this.form.init)
                    return this.$message.error('Fecha de inicio es requerido');
                 if (!this.form.hilo)
                    return this.$message.error('Tipo de hilo es requerido');
                if (!this.form.peso_tin)
                    return this.$message.error('Peso resultante de tintorería es requerido');
                if (!this.form.partida)
                    return this.$message.error('Número de partida es requerido');
                if (!this.form.color)
                    return this.$message.error('El color es requerido');
                    this.loading_submit = true
           // this.ingreso[index].lots=this.lots[index]
            //this.form.ingreso[index].val=1
            // this.ingresos.push(this.ingreso[index]);
            // this.ingresos.push(this.ingreso[index]);
            // this.form.ingreso=this.form.ingreso.concat(this.ingresos)
            console.log(this.form.ingreso)
            this.$http.post(`/${this.resource}/tin`, this.form).then(response => {
                    if (response.data.success) {
                        this.resetForm();
                        // this.saleOpportunityNewId = response.data.data.id;
                        // this.showDialogOptions = true;
                        this.$message.success(response.data.message)
                        this.$eventHub.$emit('reloadData')
                        this.close()
                        this.isUpdate()
                    }
                    else {
                        this.$message.error(response.data.message);
                    }
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data;
                    }
                    else {
                        this.$message.error(error.response.data.message);
                    }
                }).then(() => {
                    this.loading_submit = false;
                });
            },
            saveColor() {
            this.form_color.add = false

            this.$http.post(`/color`, this.form_color)
                .then(response => {
                    if (response.data.success) {
                        this.$message.success(response.data.message)
                        this.color.push(response.data.data)
                        this.form_color.name = null
                    } else {
                        this.$message.error('No se guardaron los cambios')
                    }
                })
                .catch(error => {

                })
            },
            saveHilo() {
            this.form_hilo.add = false

            this.$http.post(`/hilo`, this.form_hilo)
                .then(response => {
                    if (response.data.success) {
                        this.$message.success(response.data.message)
                        this.hilo.push(response.data.data)
                        this.form_hilo.name = null
                    } else {
                        this.$message.error('No se guardaron los cambios')
                    }
                })
                .catch(error => {

                })
            },
            cancelar() {
                    this.$http.post(`/${this.resource}/det`, this.form).then(response => {
                    if (response.data.success) {
                        this.resetForm();
                        // this.saleOpportunityNewId = response.data.data.id;
                        // this.showDialogOptions = true;
                        this.$message.success(response.data.message)
                        this.$eventHub.$emit('reloadData')
                        this.close()
                        this.isUpdate()
                    }
                    else {
                        this.$message.error(response.data.message);
                    }
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data;
                    }
                    else {
                        this.$message.error(error.response.data.message);
                    }
                }).then(() => {
                    this.loading_submit = false;
                });

            },
            clickprocesscancel() {
            this.processcancel(`/${this.resource}/det`,this.form).then(() =>
                this.$eventHub.$emit("reloadData")
            );
            },
             clickprocessreturn() {
            this.processreturn(`/${this.resource}/returntej`,this.form).then(() =>
                this.$eventHub.$emit("reloadData")
            );
            },
            async clickAddInsumo() {
            // this.insumo=this.insumo+1
        if(!Array.isArray(this.ingreso)){
            this.ingreso=[this.ingreso]
        }
            await this.ingreso.push({
                    // id: null,
                    // item_id: null,
                    // series: null,
                    // peso: 0,
                    // date:  moment().format('YYYY-MM-DD'),
                    // state: 'Activo'
                    llegada: moment().format('YYYY-MM-DD'),
                    warehouses_id: null,
                    cantidad: 0,
                    lots:[],
                    guia_tinto: null,
                    showDialogLots: false,
                    val: 0,
                });
        
             
         },
         async clickCancel(index) {
            await this.ingreso.splice(index, 1);
               // item.deleted = true
            },
        clickLotcode(index) {
            this.ingreso[index].showDialogLots = true;
        },
         addRowLot(lots,index) {
            this.ingreso[index].lots = lots;
        },
        submits(index){
            if (!this.ingreso[index].guia_tinto)
                    return this.$message.error('Guía de tintorería es requerido');
                if (!this.ingreso[index].llegada)
                    return this.$message.error('Fecha de llegada es requerido');
                 if (!this.ingreso[index].warehouses_id)
                    return this.$message.error('Almacén es requerido');
                 if (!this.ingreso[index].cantidad)
                    return this.$message.error('La cantidad es requerido');
                if (!this.form.producto_final)
                    return this.$message.error('Producto final es requerido');
                if (!this.form.init)
                    return this.$message.error('Fecha de inicio es requerido');
                 if (!this.form.hilo)
                    return this.$message.error('Tipo de hilo es requerido');
                if (!this.form.peso_tin)
                    return this.$message.error('Peso resultante de tintorería es requerido');
                if (!this.form.partida)
                    return this.$message.error('Número de partida es requerido');
                if (!this.form.color)
                    return this.$message.error('El color es requerido');
                    this.loading_submit = true
           // this.ingreso[index].lots=this.lots[index]
            this.form.ingreso[index].val=1
            // this.ingresos.push(this.ingreso[index]);
            // this.ingresos.push(this.ingreso[index]);
            // this.form.ingreso=this.form.ingreso.concat(this.ingresos)
            console.log(this.form.ingreso)
            this.$http.post(`/${this.resource}/ingreso`, this.form).then(response => {
                    if (response.data.success) {
                        //this.resetForm();
                        // this.saleOpportunityNewId = response.data.data.id;
                        // this.showDialogOptions = true;
                        this.$message.success(response.data.message)
                        this.$eventHub.$emit('reloadData')
                        //this.close()
                        this.isUpdate()
                    }
                    else {
                        this.$message.error(response.data.message);
                    }
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data;
                    }
                    else {
                        this.$message.error(error.response.data.message);
                    }
                }).then(() => {
                    this.loading_submit = false;
                });

        }
    }

}
</script>
