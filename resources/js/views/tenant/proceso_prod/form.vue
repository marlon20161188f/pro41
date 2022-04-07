<template>
    <div class="card mb-0 pt-2 pt-md-0">
        <div class="card-header bg-info">
            <h3 class="my-0">Nueva producción</h3>
        </div>
        <div class="tab-content">
            <form autocomplete="off" @submit.prevent="submit"
                 >
                <div class="form-body">
                    <div class="row">
                        <template>

                            <div class="col-md-12 col-lg-12 mt-2">
                                <!-- Contado -->
                                <data-table >
                                    
                                        <tr >
                                            <th style="font-size: 16px">
                                               Insumos :
                                            </th>
                                            <th 
                                            width="7%"><a href="#" @click.prevent="clickAddInsumo" 
                                            class="text-center font-weight-bold text-info">[+ Agregar]</a>
                                            </th>
                                        </tr>
                                    
                                        <tr 
                                         v-for="(form, index) in insumo" :key="index" width="100%" 
                                         style="webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);">
                                           <td style="padding-top: 0.8rem;">
                                               <tr>
                                                    <th>
                                                        Insumo {{index+1}}
                                                    </th>
                                                </tr>
                                                <template>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th
                                                class="pb-2" >Compra <span class="text-danger">*</span>
                                                </th>
                                                <th
                                                class="pb-2" >Insumo <span class="text-danger">*</span>
                                                </th>
                                                <th
                                                class="pb-2" >Peso disponible (kg) <span class="text-danger">*</span>
                                                </th>
                                                <th
                                                class="pb-2" >Peso (kg) <span class="text-danger">*</span>
                                                </th>
                                                <th
                                                class="pb-2" >Tipo de Hilo <span class="text-danger">*</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group mb-2 mr-2">
                                                    <el-select v-model="form.compra"
                                                    filterable
                                                     @change="filtercompra">
                                                        <el-option v-for="option in purchases"
                                                                :key="option.id"
                                                                :label="'C-'+option.id"
                                                                :value="option.id"></el-option>
                                                    </el-select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mb-2 mr-2">
                                                    <el-select v-model="form.insumo"
                                                    filterable>
                                                        <el-option v-for="option in infopurchase[index]"
                                                                :key="option.id"
                                                                :label="option.item.description"
                                                                :value="option.item.description"></el-option>
                                                    </el-select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mb-2 mr-2">
                                                    <el-input v-model="form.peso_dis" type="number" min="0" step=".0001" ></el-input>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mb-2 mr-2">
                                                    <el-input v-model="form.peso" type="number" min="0" step=".0001" ></el-input>
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
                                                    @click="savehilo()"> [ + Guardar]</a>
                                                    <a v-if="form_hilo.add == true"
                                                    class="control-label font-weight-bold text-danger"
                                                    href="#"
                                                    @click="form_hilo.add = false"> [ Cancelar]</a>
                                                    <el-input v-if="form_hilo.add == true"
                                                  v-model="form_hilo.name"
                                                  dusk="item_code"
                                                  style="margin-bottom:1.5%;"></el-input>
                                                    <el-select v-if="form_hilo.add == false" 
                                                    v-model="form.hilo" placeholder="Seleccionar" name="op">
                                                        <el-option v-for="option in hilo"
                                                       :key="option.id"
                                                       :label="option.name"
                                                       :value="option.name"></el-option>  
                                                    </el-select>
                                                </div>
                                            </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                                </template>
                                                <template >
                                    <table>
                                        <thead>
                                        <tr width="100%">
                                            <th
                                                class="pb-2" >OP <span class="text-danger">*</span>
                                            </th>
                                            <th
                                                class="pb-2">Producto final <span class="text-danger">*</span>
                                                <!-- <el-tooltip class="item"
                                                            content="Aperture caja o cuentas bancarias"
                                                            effect="dark"
                                                            placement="top-start">
                                                    <i class="fa fa-info-circle"></i>
                                                </el-tooltip> -->
                                            </th>
                                            <th 
                                                class="pb-2">Peso importado (Kg) <span class="text-danger">*</span>
                                            </th>
                                            <th class="pb-2" 
                                                >Fec. Inicio <span class="text-danger">*</span>
                                            </th>
                                            <!-- <th
                                                class="pb-2">Tipo de hilo <span class="text-danger">*</span>
                                            </th> -->
                                            <th
                                                class="pb-2">Tejeduría (%) <span class="text-danger">*</span>
                                            </th>
                                            <th
                                                class="pb-2">Tintorería (%) <span class="text-danger">*</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                 <div class="form-group mb-2 mr-2" align="right" style="margin-top: -1.4rem;">
                                                     <a v-if="form_OP.add == false"
                                                    class="control-label font-weight-bold text-info"
                                                    href="#"
                                                    @click="form_OP.add = true"> [ + Nuevo]</a>
                                                    <a v-if="form_OP.add == true"
                                                    class="control-label font-weight-bold text-info"
                                                    href="#"
                                                    @click="saveOP()"> [ + Guardar]</a>
                                                    <a v-if="form_OP.add == true"
                                                    class="control-label font-weight-bold text-danger"
                                                    href="#"
                                                    @click="form_OP.add = false"> [ Cancelar]</a>
                                                    <el-input v-if="form_OP.add == true"
                                                  v-model="form_OP.name"
                                                  dusk="item_code"
                                                  style="margin-bottom:1.5%;"></el-input>
                                                    <el-select v-if="form_OP.add == false" 
                                                    v-model="form.op" placeholder="Seleccionar" name="op">
                                                        <el-option v-for="option in op"
                                                       :key="option.id"
                                                       :label="option.name"
                                                       :value="option.name"></el-option>  
                                                    </el-select>
                                                </div>
                                                    <!-- <el-select v-model="form.op">
                                                        <el-option v-for="option in purchase_orders"
                                                                :key="option.id"
                                                                :label="option.number"
                                                                :value="option.number"></el-option>
                                                    
                                                    </el-select> -->
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-select  v-model="form.producto_final" placeholder="Rib">
                                                        <el-option key="Rib" value="Rib" label="Rib"></el-option>
                                                        <el-option key="Rollo" value="Rollo" label="Rollo"></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-input v-model="form.peso_import" type="number" min="0" step=".0001" ></el-input>
                                                </div>
                                            </td>
                                             <td>
                                                 <div class="form-group mb-2 mr-2">
                                                 <el-date-picker
                                                    v-model="form.init"
                                                    :clearable="false"
                                                    type="date"
                                                    value-format="yyyy-MM-dd">
                                                    </el-date-picker>
                                                 </div>
                                            </td>
                                           <!-- <td>
                                                 <div class="form-group mb-2 mr-2">
                                                    <el-select v-model="form.hilo">
                                                        <el-option key="Hilo X" value="Hilo X" label="Hilo X"></el-option>
                                                        <el-option key="Hilo Y" value="Hilo Y" label="Hilo Y"></el-option>
                                                        <el-option key="Hilo Z" value="Hilo Z" label="Hilo Z"></el-option>
                                                    </el-select>
                                                </div> 
                                            </td> -->
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-input v-model="form.tejed" type="number" min="0" max="100"></el-input>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-input v-model="form.tinto" type="number" min="0" max="100"></el-input>
                                                </div>
                                            </td>
                                            <br>
                                        </tr>
                                        </tbody>
                                    </table>
                                                </template>
                                           </td>
                                            <td class="series-table-actions text-center">
                                                <button  type="button" class="btn waves-effect waves-light btn-xs btn-danger" @click.prevent="clickCancel(index)">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                </data-table>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="form-actions text-center mt-4">
                    <el-button 
                                native-type="submit" :loading="loading_submit"
                               type="primary">Pasar a importación
                    </el-button>
                    <el-button @click.prevent="close()">Cancelar</el-button>
                     <!-- <el-button
                        @click.prevent="close()">
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
//import PurchaseFormItem from './partials/item.vue'
//import PersonForm from '../persons/form.vue'
//import PurchaseOptions from './partials/options.vue'
//import {exchangeRate, functions, fnPaymentsFee} from '../../../mixins/functions'

//import {mapActions, mapState} from "vuex";
import {calculateRowItem} from '../../../helpers/functions'
import {serviceNumber} from '../../../mixins/functions'

export default {
     mixins: [serviceNumber],
    setup() {
        
    }, 
     mounted() {
        this.initForm()
        this.$http.get(`/${this.resource}/tables`)
            .then(response => {
                let data = response.data
                this.document_types = data.document_types_invoice
                this.currency_types = data.currency_types
                this.purchase_orders = data.purchase_orders
                this.payment_conditions = data.payment_conditions
                // this.establishment = data.establishment
                this.op = data.op
                this.purchases = data.purchases
                this.purchase_items = data.purchase_items
                this.all_suppliers = data.suppliers
                this.discount_types = data.discount_types
                this.payment_method_types = data.payment_method_types
                this.payment_destinations = data.payment_destinations
                this.all_customers = data.customers

                this.charges_types = data.charges_types
                this.$store.commit('setConfiguration', data.configuration);
                this.$store.commit('setEstablishment', data.establishment);
                this.form.currency_type_id = (this.currency_types.length > 0) ? this.currency_types[0].id : null
                // this.form.establishment_id = (this.establishment.id) ? this.establishment.id : null
                //this.form.document_type_id = (this.document_types.length > 0) ? this.document_types[0].id : null
                //this.form.op = (this.purchase_orders.length > 0) ? this.purchase_orders[0].number : null
                this.form.init =  moment().format('YYYY-MM-DD')
                this.form.op = null
                this.form.currency_type_id = (this.currency_types.length > 0) ? this.currency_types[0].id : null
                // this.form.establishment_id = (this.establishment.id) ? this.establishment.id : null
                //this.form.document_type_id = (this.document_types.length > 0) ? this.document_types[0].id : null
                //this.form.op = (this.purchase_orders.length > 0) ? this.purchase_orders[0].number : null
                this.form.init =  moment().format('YYYY-MM-DD')
                this.form.op = null
            })},
            data() {
        return {
            input_person: {},
            resource: 'proceso_prod',
            form_OP: {add: false, name: null, id: null},
            form_hilo: {add: false, name: null, id: null},
            showDialogAddItem: false,
            readonly_date_of_due: false,
            localHasGlobalIgv: false,
            showDialogNewPerson: false,
            showDialogOptions: false,
            loading_submit: false,
            hide_button: false,
            is_perception_agent: false,
            errors: {},
            // form: {
            //     items:[]
            // },
            form:[],
            index:0,
            producto_final: null,
            aux_supplier_id: null,
            total_amount: 0,
            purchases: [],
            infopurchase: [],
            purchase_items:[],
            document_types: [],
            purchase_orders: [],
            currency_types: [],
            discount_types: [],
            charges_types: [],
            payment_method_types: [],
            all_suppliers: [],
            suppliers: [],
            all_customers: [],
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
            showDialogLots: false,
            insumo:[],
            // insumo: [{
            //         id: null,
            //         item_id: null,
            //         series: null,
            //         peso: 0,
            //         date:  moment().format('YYYY-MM-DD'),
            //         state: 'Activo'
            //     }],
        }
    },
     async created() {
            await this.initForm()
            await this.$http.get(`/${this.resource}/tables`)
                .then(response => { 
                    this.currency_types = response.data.currency_types
                    this.establishments = response.data.establishments 
                    this.all_customers = response.data.customers
                    this.company = response.data.company 
                    this.form.currency_type_id = (this.currency_types.length > 0)?this.currency_types[0].id:null
                    this.form.establishment_id = (this.establishments.length > 0)?this.establishments[0].id:null 
                    this.form.currency_type_id = (this.currency_types.length > 0)?this.currency_types[0].id:null
                    this.form.establishment_id = (this.establishments.length > 0)?this.establishments[0].id:null 
                    // this.form.op = (this.purchase_orders.length > 0)?this.purchase_orders[0].id:null
                    this.form.init =  moment().format('YYYY-MM-DD')
                    this.form.init =  moment().format('YYYY-MM-DD')
                    this.purchases = response.data.purchases
                    this.purchase_items = response.data.purchase_items
                    this.op = response.data.op
                    this.hilo = response.data.hilo
                    this.form.op = null
                    this.form.op = null
                    this.changeEstablishment()
                    // this.changeDateOfIssue() 
                    this.changeCurrencyType()
                    this.allCustomers()
                    
                })
            this.loading_form = true
            this.$eventHub.$on('reloadDataPersons', (customer_id) => {
                this.reloadDataCustomers(customer_id)
            })

            await this.isUpdate()

        },
        methods: {
             
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
                    this.op = response.data.op
                    this.hilo = response.data.hilo
                    this.brands = response.data.brands
                    this.purchases = response.data.purchases
                    this.purchase_items = response.data.purchase_items

                    this.form.sale_affectation_igv_type_id = (this.affectation_igv_types.length > 0) ? this.affectation_igv_types[0].id : null
                    this.form.purchase_affectation_igv_type_id = (this.affectation_igv_types.length > 0) ? this.affectation_igv_types[0].id : null
                    this.form.sale_affectation_igv_type_id = (this.affectation_igv_types.length > 0) ? this.affectation_igv_types[0].id : null
                    this.form.purchase_affectation_igv_type_id = (this.affectation_igv_types.length > 0) ? this.affectation_igv_types[0].id : null
                
                })
        },
            handleRemove(file, fileList) {

                this.form.files = fileList
                 
            }, 
            onSuccess(response, file, fileList) {

                // console.log(file, fileList)

                if (response.success) {

                    this.form.files = fileList

                } else {

                    this.cleanFileList(fileList)
                    this.$message.error(response.message)

                }

            },  
            cleanFileList(fileList){
                _.remove(fileList, function(n) {
                    return !n.response.success
                })
            },
            async isUpdate(){

                // console.log(this.id);
                if(this.id) {
                    await this.$http.get(`/${this.resource}/record/${this.id}`)
                        .then(response => {
                            this.form = response.data.data.sale_opportunity;
                            this.setDataFiles()
                        })
                }

            },
            async setDataFiles(){
                
                await this.form.files.forEach(file => {
                    file.name = file.filename
                    file.url = file.filename
                    file.response = {success:true}
                });

            },
            getFormatUnitPriceRow(unit_price){
                return _.round(unit_price, 6)
                // return unit_price.toFixed(6)
            }, 
            searchRemoteCustomers(input) {  
                
                if (input.length > 0) { 
                    this.loading_search = true
                    let parameters = `input=${input}`

                    this.$http.get(`/${this.resource}/search/customers?${parameters}`)
                            .then(response => { 
                                this.customers = response.data.customers
                                this.loading_search = false
                                if(this.customers.length == 0){this.allCustomers()}
                            })  
                } else { 
                    this.allCustomers()
                }

            },
            initForm() {
                this.errors = {}
                //for(var i=0;i=0;i++){
                this.form = {
                    producto: null,
                    peso: 0,
                    init: null,
                    op: null,
                    hilo: null,
                    tejed:null,
                    tinto:null,
                    compra:null,
                    }
                this.insumo=[{
                    producto_final: null,
                    peso: 0,
                    init: null,
                    op: null,
                    hilo: null,
                    tejed:null,
                    tinto:null,
                    // id: null,
                    // item_id: null,
                    // series: null,
                    // peso: 0,
                    // date:  moment().format('YYYY-MM-DD'),
                    // state: 'Activo'
                }]
            },
            resetForm() {
                this.errors = {}
                this.form = {
                    //op:'OC-1',
                    // producto: null,
                    // peso: 0,
                    // init: null,
                    // hilo: null,
                    // tejed:null,
                    // tinto:null,
                    // op: null,
                    }
                this.insumo=[{
                    producto_final: null,
                    peso: 0,
                    init: null,
                    op: null,
                    hilo: null,
                    tejed:null,
                    tinto:null,
                    // id: null,
                    // item_id: null,
                    // series: null,
                    // peso: 0,
                    // date:  moment().format('YYYY-MM-DD'),
                    // state: 'Activo'
                }]
                
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
            changeEstablishment() {
                this.establishment = _.find(this.establishments, {'id': this.form.establishment_id})
                
            }, 
            cleanCustomer(){
                this.form.customer_id = null;
            },
            changeDateOfIssue() {
                this.searchExchangeRateByDate(this.form.date_of_issue).then(response => {
                    this.form.exchange_rate_sale = response
                })
            }, 
            allCustomers() {
                this.customers = this.all_customers
            }, 
            addRow(row) {
                this.form.items.push(JSON.parse(JSON.stringify(row)));
                
                this.calculateTotal();
            },
            clickRemoveItem(index) {
                this.form.items.splice(index, 1)
                this.calculateTotal()
            },
            changeCurrencyType() {
                this.currency_type = _.find(this.currency_types, {'id': this.form.currency_type_id})
                
                let items = []
                this.form.items.forEach((row) => {
                    items.push(calculateRowItem(row, this.form.currency_type_id, this.form.exchange_rate_sale))
                });
                this.form.items = items
                this.calculateTotal()
            },
            changePurchaseOrderType() {
                this.purchase_orders = _.find(this.purchase_orders, {'id': this.form.purchase_orders_id})
                
                let items = []
                this.form.items.forEach((row) => {
                    items.push(calculateRowItem(row, this.form.purchase_orders_id, this.form.exchange_rate_sale))
                });
                this.form.items = items
                this.calculateTotal()
            },
            calculateTotal() {
                let total_discount = 0
                let total_charge = 0
                let total_exportation = 0
                let total_taxed = 0
                let total_exonerated = 0
                let total_unaffected = 0
                let total_free = 0
                let total_igv = 0
                let total_value = 0
                let total = 0
                this.form.items.forEach((row) => {
                    total_discount += parseFloat(row.total_discount)
                    total_charge += parseFloat(row.total_charge)

                    if (row.affectation_igv_type_id === '10') {
                        total_taxed += parseFloat(row.total_value)
                    }
                    if (row.affectation_igv_type_id === '20') {
                        total_exonerated += parseFloat(row.total_value)
                    }
                    if (row.affectation_igv_type_id === '30') {
                        total_unaffected += parseFloat(row.total_value)
                    }
                    if (row.affectation_igv_type_id === '40') {
                        total_exportation += parseFloat(row.total_value)
                    }
                    if (['10', '20', '30', '40'].indexOf(row.affectation_igv_type_id) < 0) {
                        total_free += parseFloat(row.total_value)
                    }
                    if (['10', '20', '30', '40'].indexOf(row.affectation_igv_type_id) > -1) {
                        total_igv += parseFloat(row.total_igv)
                        total += parseFloat(row.total)
                    }
                    total_value += parseFloat(row.total_value)
                });

                this.form.total_exportation = _.round(total_exportation, 2)
                this.form.total_taxed = _.round(total_taxed, 2)
                this.form.total_exonerated = _.round(total_exonerated, 2)
                this.form.total_unaffected = _.round(total_unaffected, 2)
                this.form.total_free = _.round(total_free, 2)
                this.form.total_igv = _.round(total_igv, 2)
                this.form.total_value = _.round(total_value, 2)
                this.form.total_taxes = _.round(total_igv, 2)
                this.form.total = _.round(total, 2)
            },
            async submit() {
                console.log(this.insumo);
                this.insumo.forEach(form => {
                 if (!form.op)
                    return this.$message.error('Orden de producción es requerido');
                 if (!form.producto_final)
                    return this.$message.error('Producto final es requerido');
                 if (!form.peso)
                    return this.$message.error('El peso es requerido');
                 if (!form.init)
                    return this.$message.error('Fecha de inicio es requerido');
                 if (!form.hilo)
                    return this.$message.error('Tipo de hilo es requerido');
                 if (!form.tejed)
                    return this.$message.error('Porcentaje de teduría es requerido');
                 if (!form.tinto)
                    return this.$message.error('Porcentaje de tintorería es requerido');
                
                
                // if (!this.form.op)
                //     return this.$message.error('Orden de producción es requerido');
                //  if (!this.form.producto_final)
                //     return this.$message.error('Producto final es requerido');
                //  if (!this.form.peso)
                //     return this.$message.error('El peso es requerido');
                //  if (!this.form.init)
                //     return this.$message.error('Fecha de inicio es requerido');
                //  if (!this.form.hilo)
                //     return this.$message.error('Tipo de hilo es requerido');
                //  if (!this.form.tejed)
                //     return this.$message.error('Porcentaje de teduría es requerido');
                //  if (!this.form.tinto)
                //     return this.$message.error('Porcentaje de tintorería es requerido');
                });
               
                    this.insumo.forEach(form => {
                         this.loading_submit = true
                this.$http.post(`/${this.resource}`,form).then(response => {
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

                    });
               
                
                // await this.$http.post(`/${this.resource}`, this.insumo[0]).then(response => {
                //     if (response.data.success) {
                //         this.resetForm();
                //         // this.saleOpportunityNewId = response.data.data.id;
                //         // this.showDialogOptions = true;
                //         this.$message.success(response.data.message)
                //         this.$eventHub.$emit('reloadData')
                //         this.close()
                //         this.isUpdate()
                //     }
                //     else {
                //         this.$message.error(response.data.message);
                //     }
                // }).catch(error => {
                //     if (error.response.status === 422) {
                //         this.errors = error.response.data;
                //     }
                //     else {
                //         this.$message.error(error.response.data.message);
                //     }
                // }).then(() => {
                //     this.loading_submit = false;
                // });

            },
            close() {
                location.href = `/${this.resource}`
            },
            reloadDataCustomers(customer_id) { 
                this.$http.get(`/${this.resource}/search/customer/${customer_id}`).then((response) => {
                    this.customers = response.data.customers
                    this.form.customer_id = customer_id
                })                  
            },
            saveOP() {
            this.form_OP.add = false

            this.$http.post(`/OP`, this.form_OP)
                .then(response => {
                    if (response.data.success) {
                        this.$message.success(response.data.message)
                        this.op.push(response.data.data)
                        this.form_OP.name = null
                    } else {
                        this.$message.error('No se guardaron los cambios')
                    }
                })
                .catch(error => {

                })
        },
        filtercompra(){
                    this.infopurchase[0] = this.purchase_items.filter(items => {
                        return  items.purchase_id === this.insumo[0].compra
                    })
                    this.infopurchase[1] = this.purchase_items.filter(items => {
                        return  items.purchase_id === this.insumo[1].compra
                    })
                    this.infopurchase[2] = this.purchase_items.filter(items => {
                        return  items.purchase_id === this.insumo[2].compra
                    })
                    this.infopurchase[3] = this.purchase_items.filter(items => {
                        return  items.purchase_id === this.insumo[3].compra
                    })
                    
                },
         savehilo() {
            this.form_hilo.add = false

            this.$http.post(`/hilo`, this.form_hilo)
                .then(response => {
                    if (response.data.success) {
                        this.$message.success(response.data.message)
                        this.op.push(response.data.data)
                        this.form_hilo.name = null
                    } else {
                        this.$message.error('No se guardaron los cambios')
                    }
                })
                .catch(error => {

                })
        },
         async clickAddInsumo() {
            // this.insumo=this.insumo+1
            await this.insumo.push({
                    // id: null,
                    // item_id: null,
                    // series: null,
                    // peso: 0,
                    // date:  moment().format('YYYY-MM-DD'),
                    // state: 'Activo'
                    producto_final: null,
                    peso: 0,
                    init: null,
                    op: null,
                    hilo: null,
                    tejed:null,
                    tinto:null,

                });
             
         },
        async clickCancel(index) {
            await this.insumo.splice(index, 1);
               // item.deleted = true
            },
    }
}
</script>