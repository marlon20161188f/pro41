<template>
    <div class="card mb-0 pt-2 pt-md-0">
        <div class="card-header bg-info">
            <h3 class="my-0">Nueva producción</h3>
        </div>
        <div class="tab-content">
            <form autocomplete="off"
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
                                                class="pb-2 text-center" >OP
                                            </th>
                                            <th
                                                class="pb-2">Producto final
                                                <!-- <el-tooltip class="item"
                                                            content="Aperture caja o cuentas bancarias"
                                                            effect="dark"
                                                            placement="top-start">
                                                    <i class="fa fa-info-circle"></i>
                                                </el-tooltip> -->
                                            </th>
                                            <th 
                                                class="pb-2">Peso importado (Kg)
                                            </th>
                                            <th class="pb-2" 
                                                >Fec. Inicio
                                            </th>
                                            <th
                                                class="pb-2">Tipo de hilo
                                            </th>
                                            <th
                                                class="pb-2">Tejeduría (%)
                                            </th>
                                            <th
                                                class="pb-2">Tintorería (%)
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-select v-model="form.purchase_orders_id">
                                                            <!-- @change="changePurchaseOrderType" -->
                                                            
                                                        <el-option v-for="option in purchase_orders"
                                                                :key="option.id"
                                                                :label="option.number"
                                                                :value="option.id"></el-option>
                                                                <small v-if="errors.currency_type_id"
                                       class="form-control-feedback"
                                       v-text="errors.currency_type_id[0]"></small>
                    
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-select  v-model="form.producto" placeholder="Rib">
                                                        <el-option key="Rib" value="Rib" label="Rib"></el-option>
                                                        <el-option key="Rollo" value="Rollo" label="Rollo"></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-input v-model="form.peso" type="number" ></el-input>
                                                </div>
                                            </td>
                                             <td>
                                                 <div class="form-group mb-2 mr-2">
                                                 <el-date-picker
                                                    v-model="form.init"
                                                    :clearable="false"
                                                    format="dd/MM/yyyy"
                                                    type="month"
                                                    value-format="yyyy-MM-dd">
                                                    </el-date-picker>
                                                 </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-select v-model="form.hilo">
                                                        <el-option key="Hilo X" value="Hilo X" label="Hilo X"></el-option>
                                                        <el-option key="Hilo Y" value="Hilo Y" label="Hilo Y"></el-option>
                                                        <el-option key="Hilo Z" value="Hilo Z" label="Hilo Z"></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-input v-model="form.tejed" type="number"></el-input>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-input v-model="form.tinto" type="number"></el-input>
                                                </div>
                                            </td>
                                            <br>
                                        </tr>
                                        </tbody>
                                    </table>
                                </template>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="form-actions text-center mt-4">
                    <el-button
                               native-type="submit"
                               type="primary">Pasar a importación
                    </el-button>
                    <el-button @click.prevent="close()">Cancelar</el-button>
                     <el-button
                        native-type="submit"
                        type="danger">
                        Cancelar proceso
                        </el-button>
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

export default {
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
                this.form.purchase_orders_id = (this.purchase_orders.length > 0) ? this.purchase_orders[0].number : null

            })},
            data() {
        return {
            input_person: {},
            resource: 'proceso_prod',
            showDialogAddItem: false,
            readonly_date_of_due: false,
            localHasGlobalIgv: false,
            showDialogNewPerson: false,
            showDialogOptions: false,
            loading_submit: false,
            hide_button: false,
            is_perception_agent: false,
            errors: {},
            form: {
                items:[]
            },
            producto: null,
            aux_supplier_id: null,
            total_amount: 0,
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
        }
    }, async created() {
            await this.initForm()
            await this.$http.get(`/${this.resource}/tables`)
                .then(response => { 
                    this.currency_types = response.data.currency_types
                    this.establishments = response.data.establishments 
                    this.all_customers = response.data.customers
                    this.company = response.data.company 
                    this.form.currency_type_id = (this.currency_types.length > 0)?this.currency_types[0].id:null
                    this.form.establishment_id = (this.establishments.length > 0)?this.establishments[0].id:null 
                    this.form.purchase_orders_id = (this.purchase_orders.length > 0)?this.purchase_orders[0].id:null
    

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
                this.form = {
                    prefix:'CASO',
                    observation: null,
                    detail: null,
                    establishment_id: null, 
                    date_of_issue: moment().format('YYYY-MM-DD'),
                    time_of_issue: moment().format('HH:mm:ss'),
                    customer_id: null,
                    currency_type_id: null,
                    purchase_orders_id: null,
                    exchange_rate_sale: 0, 
                    total_exportation: 0,
                    total_free: 0,
                    total_taxed: 0,
                    total_unaffected: 0,
                    total_exonerated: 0,
                    total_igv: 0, 
                    total_taxes: 0,
                    total_value: 0,
                    total: 0,
                    items: [],
                    files: [],
                    actions: {
                        format_pdf:'a4',
                    }
                }
            },
            resetForm() {
                this.activePanel = 0
                this.initForm()
                this.form.currency_type_id = (this.currency_types.length > 0)?this.currency_types[0].id:null
                this.form.purchase_orders_id = (this.purchase_orders.length > 0)?this.purchase_orders[0].id:null

                this.form.establishment_id = (this.establishments.length > 0)?this.establishments[0].id:null 
                this.changeEstablishment() 
                this.changeDateOfIssue()
                this.changeCurrencyType()
                this.allCustomers()
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

                this.loading_submit = true

                await this.$http.post(`/${this.resource}`, this.form).then(response => {
                    if (response.data.success) {
                        this.resetForm();
                        this.saleOpportunityNewId = response.data.data.id;
                        this.showDialogOptions = true;
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
            close() {
                location.href = `/${this.resource}`
            },
            reloadDataCustomers(customer_id) { 
                this.$http.get(`/${this.resource}/search/customer/${customer_id}`).then((response) => {
                    this.customers = response.data.customers
                    this.form.customer_id = customer_id
                })                  
            },
        }
    }
</script>