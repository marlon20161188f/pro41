<template>
    <div class="card mb-0 pt-2 pt-md-0">
        <div class="card-header bg-info">
            <h3 class="my-0">Tintorería</h3>
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
                                                class="pb-2">Producto final <span class="text-danger">*</span>
                                                <!-- <el-tooltip class="item"
                                                            content="Aperture caja o cuentas bancarias"
                                                            effect="dark"
                                                            placement="top-start">
                                                    <i class="fa fa-info-circle"></i>
                                                </el-tooltip> -->
                                            </th>
                                            <th 
                                                class="pb-2">peso total (Kg) 
                                            </th>
                                            <th class="pb-2" 
                                                >Fec. Inicio <span class="text-danger">*</span>
                                            </th>
                                            <th
                                                class="pb-2">Tipo de hilo <span class="text-danger">*</span>
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
                                                   <el-input v-model="form.peso" type="number" name="peso" :disabled="true"></el-input>
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
                                                    >
                                                    </el-date-picker>
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
                                                    v-model="form.hilo" placeholder="Seleccionar" name="hilo">
                                                        <el-option v-for="option in hilo"
                                                       :key="option.id"
                                                       :label="option.name"
                                                       :value="option.name"></el-option>  
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-input v-model="form.tejed" type="number" :disabled="true" name="tejed" step=".01" ></el-input>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.tinto" type="number" :disabled="true" name="tinto" step=".01" ></el-input>
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
                                                class="pb-2" >N° de rollos resultante <span class="text-danger">*</span>
                                            </th>
                                            <th
                                                class="pb-2" >Guía de tintorería
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td >
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.partida" type="number" name="partida"></el-input>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group mb-2 mr-2">
                                                    <el-select v-model="form.color" name="color">
                                                            <!-- @change="changePurchaseOrderType" -->
                                                        <el-option key="Lila" value="Lila" label="Lila"></el-option>
                                                        <el-option key="Gris" value="Gris" label="Gris"></el-option>
                                                        <el-option key="Blanco" value="Blanco" label="Blanco"></el-option>
                                                         <el-option key="Rojo" value="Rojo" label="Rojo"></el-option>  
                                                         <el-option key="Negro" value="Negro" label="Negro"></el-option>  
                                                    </el-select>
                                                </div>
                                            </td>
                                             <td >
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.peso_tin" type="number" name="peso_tin" min="0" v-bind:max="form.peso_tej" step=".0001" ></el-input>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.num_rollos" type="number" name="num_rollos" min="0" v-bind:max="form.peso_tej" step=".0001" ></el-input>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.guia_tinto" type="text" name="guia_tinto" ></el-input>
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
                               native-type="submit"  :loading="loading_submit"
                               type="primary">Pasar al almacén
                    </el-button>
                    <el-button @click.prevent="close()">Cancelar</el-button>
                    <el-button @click.prevent="clickprocessreturn()" type="warning">Regresar a tejeduría</el-button>

                     <el-button
                        @click.prevent="clickprocesscancel()" type="danger">
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
import {deletable} from "../../../mixins/deletable";

export default {
     props:['id'],
     mixins: [deletable],
    setup() {
        
    }, mounted() {
        this.initForm()
        this.$http.get(`/${this.resource}/tables`)
            .then(response => {
                let data = response.data
                this.document_types = data.document_types_invoice
                this.currency_types = data.currency_types
                this.purchase_orders = data.purchase_orders
                this.payment_conditions = data.payment_conditions
                this.suppliers = data.suppliers
                // this.establishment = data.establishment

                this.hilo = data.hilo
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
            input_person: {},
            form_hilo: {add: false, name: null, id: null},
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
            hilo: [],
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
            showDialogLots: false,
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
        close() {
            location.href = '/proceso_prod'
        },
        initForm() {
            this.$http.get(`/${this.resource}/record/${this.id}`)
               .then(response => {
                this.form = response.data
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
                }
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
                    this.hilo = response.data.hilo
                    this.brands = response.data.brands

                    this.form.sale_affectation_igv_type_id = (this.affectation_igv_types.length > 0) ? this.affectation_igv_types[0].id : null
                    this.form.purchase_affectation_igv_type_id = (this.affectation_igv_types.length > 0) ? this.affectation_igv_types[0].id : null
                })
        }, 
         async submit() {
                if (!this.form.producto_final)
                    return this.$message.error('Producto final es requerido');
                if (!this.form.init)
                    return this.$message.error('Fecha de inicio es requerido');
                 if (!this.form.hilo)
                    return this.$message.error('Tipo de hilo es requerido');
                if (!this.form.num_rollos)
                    return this.$message.error('Número de rollos resultante es requerido');
                if (!this.form.peso_tin)
                    return this.$message.error('Peso resultante de tintorería es requerido');
                if (!this.form.partida)
                    return this.$message.error('Número de partida es requerido');
                if (!this.form.color)
                    return this.$message.error('El color es requerido');
       
                this.loading_submit = true

                await this.$http.post(`/${this.resource}/tin`, this.form).then(response => {
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
    }

}
</script>
