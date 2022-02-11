<template>
    <div class="card mb-0 pt-2 pt-md-0">
        <div class="card-header bg-info">
            <h3 class="my-0">Almacén</h3>
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
                                                class="pb-2 text-center" >OP
                                            </th>
                                            <th
                                                class="pb-2">Producto final
                                                <el-tooltip class="item"
                                                            content="Aperture caja o cuentas bancarias"
                                                            effect="dark"
                                                            placement="top-start">
                                                    <i class="fa fa-info-circle"></i>
                                                </el-tooltip>
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
                                                 class="pb-2">Nº de partida
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                     <el-select  v-model="form.op" name="op" :disabled="true">
                                                        <el-option></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
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
                                                    <el-input v-model="form.peso_tin" type="number" name="peso_tin" :disabled="true"></el-input>
                                                </div>
                                            </td>
                                             <td>
                                                 <div class="form-group mb-2 mr-2">
                                               <el-date-picker
                                                    v-model="form.init"
                                                    :clearable="false"
                                                    format="dd/MM/yyyy"
                                                    type="month"
                                                    value-format="yyyy-MM-dd" :disabled="true"
                                                    name="init"
                                                    >
                                                    </el-date-picker>
                                                 </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-select v-model="form.hilo" name="hilo">
                                                        <el-option key="Hilo X" value="Hilo X" label="Hilo X"></el-option>
                                                        <el-option key="Hilo Y" value="Hilo Y" label="Hilo Y"></el-option>
                                                        <el-option key="Hilo Z" value="Hilo Z" label="Hilo Z"></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-input v-model="form.partida" type="number" name="partida"></el-input>
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
                                                class="pb-2">Producto o artículo
                                            </th>
                                            <th
                                                class="pb-2" >Fec. llegada a almacén
                                            </th>
                                            <th
                                                class="pb-2" >Almacén
                                            </th>
                                            <th
                                                class="pb-2" >Cantidad
                                            </th>
                                            <th
                                                class="pb-2" >
                                            </th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td >
                                                <div class="form-group mb-2 mr-2">
                                                    <el-select v-model="form.produc_artic" name="produc_artic">
                                                       <el-option v-for="options in items"
                                                                :key="options.id"
                                                                :label="options.description"
                                                                :value="options.id"></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group mb-2 mr-2">
                                                     <el-date-picker
                                                    v-model="form.llegada"
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
                                                        <el-select v-model="form.warehouses_id" name="warehouses_id">
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
                                                    <el-input v-model="form.cantidad" name="cantidad" type="number"></el-input>
                                                </div>
                                            </td>
                                             <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-button icon="el-icon-edit-outline"
                                                               size="small"
                                                               type="primary"
                                                               @click.prevent="clickLotcode">Ingrese series
                                                    </el-button>
                                                </div>
                                            </td>
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
                               native-type="submit" :loading="loading_submit"
                               type="primary">Cargar inventario
                    </el-button>
                    <el-button @click.prevent="close()">Cancelar</el-button>
                     <el-button
                        @click.prevent="cancelar()" type="danger">
                        Cancelar proceso
                        </el-button>
                    
                </div>
            </form>
             <lots-form
            :lots="lots"
            :recordId="recordId"
            :showDialog.sync="showDialogLots"
            :stock="form.cantidad"
            @addRowLot="addRowLot"
            >
        </lots-form>
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
export default {
    props:['id', 'showDialog'],
    components: {
        LotsForm
    },
    setup() {
        
    },
    async mounted() {
       await this.initForm()
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
                this.form.prov_tejed = (this.suppliers.length > 0) ? this.suppliers[0].name : null
                this.form.warehouses_id = (this.warehouses.length > 0) ? this.warehouses[0].description : null
                this.form.produc_artic = (this.items.length > 0) ? this.items[0].description : null

            })
    },
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
    data() {
        return {
            lots:[],
            recordId: null,
            id: null,
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
            warehouses:[],
            items:[],
            suppliers:[],
            customers: [],
            company: null,
            operation_types: [],
            all_series: [],
            //series: [],
            payment_destinations: [],
            payment_conditions: [],
            currency_type: {},
            loading_search: false,
            purchaseNewId: null,
            showDialogLots: false,
        }},
    methods:{
        ...mapActions([
            'loadConfiguration',
        ]),
        close() {
            location.href = '/proceso_prod'
        },
          initForm() {
            this.$http.get(`/${this.resource}/record/${this.id}`)
               .then(response => {
                this.form = response.data
                })
                this.form = {
                    op:'OC-1',
                    producto: null,
                    init: null,
                    hilo: null,
                    tejed:null,
                    tinto:null,
                    produc_artic: null,
                    lots: [],
                    }
               this.errors = {}
            }, 
            resetForm() {
                this.errors = {}
                this.form = {
                    op:'OC-1',
                    producto: null,
                    init: null,
                    produc_artic: null,
                    hilo: null,
                    tejed:null,
                    tinto:null,
                    }
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
             async submit() {

                this.loading_submit = true
                this.form.lots=this.lots
                await this.$http.post(`/${this.resource}/alm`, this.form).then(response => {
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
            clickLotcode() {
            this.showDialogLots = true
        },
        addRowLot(lots) {
            this.lots = lots
        },
        
    }

}
</script>
