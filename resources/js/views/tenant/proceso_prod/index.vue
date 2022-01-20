<template>
    <div>
        <div class="page-header pr-0">
            <h2><a href="/dashboard"><i class="fas fa-tachometer-alt"></i></a></h2>
            <ol class="breadcrumbs">
                <li class="active"><span>Proceso productivo</span></li>
            </ol>
            <div class="right-wrapper pull-right">
                <!-- <a :href="`/${resource}/create`" class="btn btn-custom btn-sm  mt-2 mr-2"><i class="fa fa-plus-circle"></i> Nuevo</a> -->
                <a :href="`/proceso_prod/create`" class="btn btn-custom btn-sm  mt-2 mr-2"><i class="fa fa-plus-circle"></i> Nuevo</a>

            </div>
        </div>
        <div class="card mb-0">
            <!-- <div class="data-table-visible-columns">
                <el-dropdown :hide-on-click="false">
                    <el-button type="primary">
                        Mostrar/Ocultar columnas<i class="el-icon-arrow-down el-icon--right"></i>
                    </el-button>
                    <el-dropdown-menu slot="dropdown">
                        <el-dropdown-item v-for="(column, index) in columns" :key="index">
                            <el-checkbox v-model="column.visible">{{ column.title }}</el-checkbox>
                        </el-dropdown-item>
                    </el-dropdown-menu>
                </el-dropdown>
            </div> -->
            <div class="card-body">
                <data-table :resource="resource">
                    <tr slot="heading">
                        <th>#</th>
                        <th class="text-center">Orden de compra</th>
                        <th  class="text-center">Partida</th>
                        <th class="text-center">Producto final</th>
                        <th class="text-center">Fecha de Inicio</th>
                        <th class="text-center">Fecha de Fin</th>
                        <th class="text-center" >Proveedor</th>
                        <th class="text-center" >Estado</th>
                        <th class="text-center"> </th>
                        <!-- <th class="text-center">{{ row.user_name }}</th> -->
                        <!-- <th class="text-center">Acción</th>
                        <th class="text-center">Archivos</th>
                        <th class="text-right" v-if="columns.total_exportation.visible">T.Exportación</th>
                        <th class="text-right" v-if="columns.total_unaffected.visible">T.Inafecta</th>
                        <th class="text-right" v-if="columns.total_exonerated.visible">T.Exonerado</th>
                        <th class="text-right" v-if="columns.total_taxed.visible">T.Gravado</th>
                        <th class="text-right" v-if="columns.total_igv.visible">T.Igv</th>
                        <th class="text-right">Total</th>
                        <th class="text-center">Descarga</th>
                        <th class="text-right">Acciones</th> -->
                    </tr>

                    <!-- <tr slot-scope="{ index, row }" :class="{ anulate_color : row.state_type_id == '11' }"> -->


                        <!-- <td>{{ index }}</td>
                        <td class="text-center">{{ row.date_of_issue }}</td>
                        <td >{{ row.user_email }}</td>
                        <td>{{ row.customer_name }}<br/><small v-text="row.customer_number"></small></td>
                        <td>{{row.state_type_description}}</td>
                        <td>{{ row.number_full }}</td>
                        <td v-if="columns.quotation.visible">{{ row.quotation_number_full }}</td>
                        <td >{{ row.purchase_order_number_full }}</td>
                        <td >{{ row.purchase_order_number_full }}</td> -->
                        

                        <!-- <td>
                            {{ row.number }}
                            <br />
                            <small v-text="row.document_type_description"></small>
                            <br />
                        </td>
                        <td v-if="columns.sale.visible">{{ row.user_name }}</td>
                        <td>{{ row.customer_name }}<br/><small v-text="row.customer_number"></small></td>
                        <td class="text-center">{{ row.date_of_issue }}</td>
                        <td class="text-center">{{ row.date_of_due }}</td>
                        <td>
                        {{ row.supplier_name }}
                        <br />
                        <small v-text="row.supplier_number"></small>
                        </td>
                         <td class="text-right">
                            <a v-if="row.btn_generate_oc && canGenerarte"   :href="`/purchase-orders/sale-opportunity/${row.id}`" type="button" class="btn waves-effect waves-light btn-xs btn-warning">
                                Generar O. Compra
                            </a>
                            <a v-if="row.btn_generate && canGenerarte"   :href="`/quotations/create/${row.id}`" type="button" class="btn waves-effect waves-light btn-xs btn-primary">
                                Generar cotizacion
                            </a>

                            <a v-if="row.state_type_id != '11' && (row.btn_generate && row.btn_generate_oc)" :href="`/${resource}/create/${row.id}`" type="button" class="btn waves-effect waves-light btn-xs btn-info">Editar</a>

                            <button type="button" class="btn waves-effect waves-light btn-xs btn-info m-1__2"
                                                    @click.prevent="clickOptions(row.id)">Opciones</button>
                        </td> -->
                        <!-- <td >{{ row.purchase_order_number_full }}</td> -->
                        <!-- <td class="text-center">{{ row.currency_type_id }}</td>
                        <td class="text-center">


                            <el-popover
                                placement="right"
                                width="400"
                                trigger="click">

                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Descarga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(row, index) in row.files" :key="index">
                                                    <td>{{index+1}}</td>
                                                    <td>{{row.filename}}</td>
                                                    <td class="text-center">
                                                        <button  type="button" class="btn waves-effect waves-light btn-xs btn-primary" @click.prevent="clickDownloadFile(row.filename)">
                                                            <i class="fas fa-file-download"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <el-button slot="reference"> <i class="fa fa-eye"></i></el-button>
                            </el-popover>

                        </td>
                        <td class="text-right"  v-if="columns.total_exportation.visible" >{{ row.total_exportation }}</td>
                        <td class="text-right" v-if="columns.total_unaffected.visible">{{ row.total_unaffected }}</td>
                        <td class="text-right" v-if="columns.total_exonerated.visible">{{ row.total_exonerated }}</td>
                        <td class="text-right" v-if="columns.total_taxed.visible">{{ row.total_taxed }}</td>
                        <td class="text-right" v-if="columns.total_igv.visible">{{ row.total_igv }}</td>
                        <td class="text-right">{{ row.total }}</td>
                        <td class="text-right">

                            <button type="button" class="btn waves-effect waves-light btn-xs btn-info"
                                    @click.prevent="clickDownload(row.external_id)">PDF</button>
                        </td>

                        <td class="text-right">
                            <a v-if="row.btn_generate_oc && canGenerarte"   :href="`/purchase-orders/sale-opportunity/${row.id}`" type="button" class="btn waves-effect waves-light btn-xs btn-warning">
                                Generar O. Compra
                            </a>
                            <a v-if="row.btn_generate && canGenerarte"   :href="`/quotations/create/${row.id}`" type="button" class="btn waves-effect waves-light btn-xs btn-primary">
                                Generar cotizacion
                            </a>

                            <a v-if="row.state_type_id != '11' && (row.btn_generate && row.btn_generate_oc)" :href="`/${resource}/create/${row.id}`" type="button" class="btn waves-effect waves-light btn-xs btn-info">Editar</a>

                            <button type="button" class="btn waves-effect waves-light btn-xs btn-info m-1__2"
                                                    @click.prevent="clickOptions(row.id)">Opciones</button>
                        </td> -->

                    <!-- </tr> -->
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">66444</td>
                        <td class="text-center">83533</td>
                        <td class="text-center">Rollo teñido</td>
                        <td class="text-center">2021-12-14</td>
                        <td class="text-center">2021-12-14</td>
                        <td class="text-center">Proveedor uno S.A.C</td>
                         <td class="text-center"><span class="badge bg-secondary text-white bg-info">
                            Importación
                        </span></td>
                        <td class="text-center">
                            <a :href="`/proceso_prod/import`" type="button" class="btn waves-effect waves-light btn-xs btn-info">Editar
                            </a></td> 
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">66412</td>
                        <td class="text-center">83533</td>
                        <td class="text-center">Rib</td>
                        <td class="text-center">2021-12-14</td>
                        <td class="text-center">2021-12-14</td>
                        <td class="text-center">Proveedor uno S.A.C</td>
                         <td class="text-center"><span style="background-color:#CA33FF;" class="badge text-white">Tejeduría
                        </span></td>
                        <td class="text-center">
                            <a :href="`/proceso_prod/tejeduria`" type="button" class="btn waves-effect waves-light btn-xs btn-info">Editar
                            </a>
                        </td> 
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-center">66454</td>
                        <td class="text-center">89652</td>
                        <td class="text-center">Rollo teñido</td>
                        <td class="text-center">2021-12-15</td>
                        <td class="text-center">2021-12-16</td>
                        <td class="text-center">Proveedor uno S.A.C</td>
                        <td class="text-center"><span style="background-color:#FF9C33;" class="badge text-white">
                            Tintorería
                        </span></td>
                        <td class="text-center">
                            <a :href="`/proceso_prod/tintoreria`" type="button" class="btn waves-effect waves-light btn-xs btn-info">Editar
                                
                            </a></td> 
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-center">66445</td>
                        <td class="text-center">83566</td>
                        <td class="text-center">Rib</td>
                        <td class="text-center">2021-12-16</td>
                        <td class="text-center">2021-12-16</td>
                        <td class="text-center">Proveedor uno S.A.C</td>
                        <td class="text-center"><span style="background-color:#64D23B;" class="badge text-white">
                            Almacén
                        </span></td>
                        <td class="text-center">
                            <a :href="`/proceso_prod/almacen`" type="button" class="btn waves-effect waves-light btn-xs btn-info">
                                Editar
                            </a></td> 
                    </tr>
                    <tr>
                        <td class="text-center">5</td>
                        <td class="text-center">67856</td>
                        <td class="text-center">83543</td>
                        <td class="text-center">Rollo teñido</td>
                        <td class="text-center">2021-12-17</td>
                        <td class="text-center">2021-12-17</td>
                        <td class="text-center">Proveedor uno S.A.C</td>
                        <td class="text-center"><span class="badge text-white bg-danger">
                            Cancelado
                        </span></td>
                        <td class="text-center"> 
                            <a :href="`/proceso_prod/detalle`" type="button" class="btn waves-effect waves-light btn-xs btn-info">
                            <i class="fa fa-search"></i>
                            </a></td> 
                    </tr>
                    <tr>
                        <td class="text-center">6</td>
                        <td class="text-center">66452</td>
                        <td class="text-center">15258</td>
                        <td class="text-center">Rib</td>
                        <td class="text-center">2021-12-18</td>
                        <td class="text-center">2021-12-18</td>
                        <td class="text-center">Proveedor uno S.A.C</td>
                        <td class="text-center"><span style="background-color:#fff; border-color: black;border-width: 1px;
                             border-style: solid;" class="badge text-black">
                            Inventario
                        </span></td>
                        <td class="text-center"> 
                            <a :href="`/proceso_prod/detalle`" type="button" class="btn waves-effect waves-light btn-xs btn-info">
                            <i class="fa fa-search"></i>
                            </a></td> 
                    </tr>
                </data-table>
            </div>


            <sale-opportunities-options :showDialog.sync="showDialogOptions"
                              :recordId="recordId"
                              :showGenerate="true"
                              :showClose="true"></sale-opportunities-options>

        </div>
    </div>
</template>
<style scoped>
    .anulate_color{
        color:red;
    }
</style>
<script>

    import SaleOpportunitiesOptions from './partials/options.vue'
    import DataTable from '@components/DataTable.vue'
    import {deletable} from '@mixins/deletable'

    export default {
        props:['typeUser','canGenerate'],
        mixins: [deletable],
        components: {DataTable,SaleOpportunitiesOptions},
        computed:{
          canGenerarte: function(){
               if(this.typeUser == 'admin' || this.canGenerate == true){
                   return true;
               }
               return false;
          }
        },
        data() {
            return {
                resource: 'proceso_prod',
                recordId: null,
                showDialogOptions: false,
                columns: {
                    total_exportation: {
                        title: 'T.Exportación',
                        visible: false
                    },
                    total_unaffected: {
                        title: 'T.Inafecto',
                        visible: false
                    },
                    total_exonerated: {
                        title: 'T.Exonerado',
                        visible: false
                    },
                    total_taxed: {
                        title: 'T.Gravado',
                        visible: false
                    },
                    total_igv: {
                        title: 'T.IGV',
                        visible: false
                    },
                    quotation: {
                        title: 'Cotización',
                        visible: true
                    },
                    sale: {
                        title: 'Vendedor',
                        visible: false
                    },
                }
            }
        },
        created() {
        },
        methods: {
            clickDownloadFile(filename) {
                window.open(
                    `/${this.resource}/download-file/${filename}`,
                    "_blank"
                );
            },
            clickDownload(external_id) {
                window.open(`/${this.resource}/download/${external_id}`, '_blank');
            },
            clickEdit(id)
            {
                this.recordId = id
                this.showDialogFormEdit = true
            },
            clickOptions(recordId = null) {
                this.recordId = recordId
                this.showDialogOptions = true
            },
            clickOptionsPdf(recordId = null) {
                this.recordId = recordId
                this.showDialogOptionsPdf = true
            },
        }
    }
</script>
