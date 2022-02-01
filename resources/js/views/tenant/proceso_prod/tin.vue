<template>
    <div class="card mb-0 pt-2 pt-md-0">
        <div class="card-header bg-info">
            <h3 class="my-0">Tintorería</h3>
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
                                                class="pb-2">Tinteduría (%)
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-select  v-model="form.purchase_orders" placeholder="OC-1" :disabled="true">
                                                        <el-option></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                     <el-select  v-model="form.producto">
                                                        <el-option key="Rib" value="Rib" label="Rib"></el-option>
                                                        <el-option key="Rollo" value="Rollo" label="Rollo"></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.peso" type="number" placeholder="35" :disabled="true"></el-input>
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
                                                    <el-input v-model="form.tejed" type="number" :disabled="true" placeholder="5.6"></el-input>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.tinto" type="number" :disabled="true" placeholder="4.8"></el-input>
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
                                                class="pb-2">Nº de partida
                                            </th>
                                            <th
                                                class="pb-2" >Color
                                            </th>
                                            <th
                                                class="pb-2" >Peso resultante Tintorería (kg)
                                            </th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td >
                                                <div class="form-group mb-2 mr-2">
                                                   <el-input v-model="form.partida" type="number"></el-input>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group mb-2 mr-2">
                                                    <el-select v-model="form.color" placeholder="Amaríllo">
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
                                                   <el-input v-model="form.peso_tin" type="number"></el-input>
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
                               native-type="submit"
                               type="primary">Pasar al almacén
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

export default {
    setup() {
        
    },data() {
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
    methods:{
        close() {
            location.href = '/proceso_prod'
        }
    }

}
</script>
