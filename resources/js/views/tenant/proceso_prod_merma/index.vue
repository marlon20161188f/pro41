<template>
    <div>
        <div class="page-header pr-0">
            <h2><a href="/dashboard"><i class="fas fa-tachometer-alt"></i></a></h2>
            <ol class="breadcrumbs">
                <li class="active"><span>Proceso productivo</span></li>
            </ol>
            
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
                <data-table :resource="resource" >
                    <tr slot="heading">
                        <th >#</th>
                        <th >OP</th>
                        <th >Partida</th>
                        <th >Producto final</th>
                        <th >Proveedor</th>
                        <th >Estado</th>
                        <th >Max. merma (kg) </th>
                        <th >Merma real (kg) </th>
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

                  
                    <!-- </tr> -->
                    <!-- tabla back /////////////////////////////////////////////////////////////////////////////////////////////-->
                    <!-- <tr slot-scope="{ index, row }">
                      
                    <template v-if="row.estado  === 'Cancelado' && row.peso_tej - row.peso_tin > row.peso_tej * row.tinto/100">
                 
                            <td class="text-center">{{ index }}</td>
                            <td class="text-center">{{ row.op }}</td>
                            <td class="text-center">{{ row.partida }}</td>
                            <td class="text-center">{{ row.producto_final }}</td>
                            <td class="text-center">{{ row.prov_tejed }}</td>
                            <td class="text-center"><span style="background-color:#F07B06;" class="badge text-white">Tintorería
                                </span></td>
                                <td class="text-center">{{row.peso * row.tinto/100}}</td>
                            <td class="text-center"> {{row.peso - row.peso_tin }}</td>
                            
                    </template>
                    </tr>
                    <tr slot-scope="{ index, row }">
                    <template v-if="row.estado  === 'Cancelado' && row.peso - row.peso_tej > row.peso * row.tejed /100">    
             
                            <td class="text-center">{{ index }}</td>
                            <td class="text-center">{{ row.op }}</td>
                            <td class="text-center">{{ row.partida }}</td>
                            <td class="text-center">{{ row.producto_final }}</td>
                            <td class="text-center">{{ row.prov_tejed }}</td>
                            <td class="text-center"><span style="background-color:#CA33FF;" class="badge text-white">Tejeduría
                                </span></td>
                            <td class="text-center">{{row.peso * row.tejed/100}}</td>
                            <td class="text-center"> {{row.peso - row.peso_tej }}</td>
                            
                    </template>
                    </tr>
                    <tr slot-scope="{ index, row }">      
                    <template v-if="row.estado  === 'Inventario' && row.peso_tej - row.peso_tin > row.peso_tej * row.tinto/100">
                        
                            <td class="text-center">{{ index }}</td>
                            <td class="text-center">{{ row.op }}</td>
                            <td class="text-center">{{ row.partida }}</td>
                            <td class="text-center">{{ row.producto_final }}</td>
                            <td class="text-center">{{ row.prov_tejed }}</td>
                            <td class="text-center"><span style="background-color:#F07B06;" class="badge text-white">Tintorería
                                </span></td>
                                <td class="text-center">{{row.peso * row.tinto/100}}</td>
                            <td class="text-center"> {{row.peso - row.peso_tin }}</td>
                            
                    </template>
                    </tr>
                    <tr slot-scope="{ index, row }">      
                    <template v-if="row.estado  === 'Inventario' && row.peso - row.peso_tej > row.peso * row.tejed /100">
                        
                            <td class="text-center">{{ index }}</td>
                            <td class="text-center">{{ row.op }}</td>
                            <td class="text-center">{{ row.partida }}</td>
                            <td class="text-center">{{ row.producto_final }}</td>
                            <td class="text-center">{{ row.prov_tejed }}</td>
                            <td class="text-center"><span style="background-color:#CA33FF;" class="badge text-white">Tejeduría
                                </span></td>
                            <td class="text-center">{{row.peso * row.tejed/100}}</td>
                            <td class="text-center"> {{row.peso - row.peso_tej }}</td>
                            
                    </template>
                    </tr>
                    <tr slot-scope="{ index, row }"> 
                    <template v-if="row.estado  === 'Almacén' && row.peso_tej - row.peso_tin > row.peso_tej * row.tinto/100">
                        
                            <td class="text-center">{{ index }}</td>
                            <td class="text-center">{{ row.op }}</td>
                            <td class="text-center">{{ row.partida }}</td>
                            <td class="text-center">{{ row.producto_final }}</td>
                            <td class="text-center">{{ row.prov_tejed }}</td>
                            <td class="text-center"><span style="background-color:#F07B06;" class="badge text-white">Tintorería
                                </span></td>
                                <td class="text-center">{{row.peso * row.tinto/100}}</td>
                            <td class="text-center"> {{row.peso - row.peso_tin }}</td>
                            
                    </template>
                    </tr>
                    <tr slot-scope="{ index, row }"> 
                    <template v-if="row.estado  === 'Almacén' && row.peso - row.peso_tej > row.peso * row.tejed /100">
                         
                            <td class="text-center">{{ index }}</td>
                            <td class="text-center">{{ row.op }}</td>
                            <td class="text-center">{{ row.partida }}</td>
                            <td class="text-center">{{ row.producto_final }}</td>
                            <td class="text-center">{{ row.prov_tejed }}</td>
                            <td class="text-center"><span style="background-color:#CA33FF;" class="badge text-white">Tejeduría
                                </span></td>
                            <td class="text-center">{{row.peso * row.tejed/100}}</td>
                            <td class="text-center"> {{row.peso - row.peso_tej }}</td>
                            
                    </template>
                    </tr> -->
                    <tr slot-scope="{ index, row }"> 
                    <template v-if="row.estado == 'Cancelado'|| row.estado == 'Inventario'|| row.estado == 'Tintorería'">
                        <template v-if="row.peso_tej - row.peso_tin > row.peso_tej * row.tinto/100 && row.peso - row.peso_tej > row.peso * row.tejed /100">
                        
                            <td class="text-center" align="center" style="text-align:center;">
                                
                                <tr class="text-center"> <td class="text-center">{{ index }}</td></tr></td>
                            <td class="text-center" align="center" style="text-align:center;">
                                <tr class="text-center"> <td class="text-center">{{ row.op }}</td></tr>
                                <tr class="text-center"> <td class="text-center">{{ row.op }}</td></tr></td>
                            <td class="text-center" align="center" style="text-align:center;">
                                <tr class="text-center"> <td class="text-center">{{ row.partida }}</td></tr>
                                <tr class="text-center"> <td class="text-center">{{ row.partida }}</td></tr></td>
                            <td class="text-center" align="center" style="text-align:center;">
                                <tr class="text-center"> <td class="text-center">{{ row.producto_final }}</td></tr>
                                <tr class="text-center"> <td class="text-center">{{ row.producto_final }}</td></tr></td>
                            <td class="text-center" align="center" style="text-align:center;">
                                <tr class="text-center"> <td class="text-center">{{ row.prov_tejed }}</td></tr>
                                <tr class="text-center"> <td class="text-center">{{ row.prov_tin }}</td></tr></td>
                            <td class="text-center" align="center" style="text-align:center;">
                                <tr class="text-center"> <td class="text-center"><span style="background-color:#CA33FF;" class="badge text-white">Tejeduría
                                </span></td></tr>
                                <tr class="text-center"> <td class="text-center"><span style="background-color:#F07B06;" class="badge text-white">Tintorería
                                </span></td></tr></td>
                            <td class="text-center" align="center" style="text-align:center;">
                                <tr class="text-center"> <td class="text-center">{{row.peso * row.tejed/100}}</td></tr>
                                <tr class="text-center"> <td class="text-center">{{row.peso_tej * row.tinto/100}}</td></tr></td>
                            <td class="text-center" align="center" style="text-align:center;">
                                <tr class="text-center"> <td class="text-center">{{row.peso - row.peso_tej }}</td></tr>
                                <tr class="text-center"> <td class="text-center">{{row.peso_tej - row.peso_tin }}</td></tr></td>
                            
                        </template>
                        <template v-else-if="row.peso - row.peso_tej > row.peso * row.tejed /100">
                          
                          <td ><tr><td>{{ index }}</td></tr></td>
                          <td ><tr><td>{{ row.op }}</td></tr></td>
                          <td ><tr><td>{{ row.partida }}</td></tr></td>
                          <td ><tr><td>{{ row.producto_final }}</td></tr></td>
                          <td ><tr><td>{{ row.prov_tejed }}</td></tr></td>
                          <td><tr><td><span style="background-color:#CA33FF;" class="badge text-white">Tejeduría
                            </span></td></tr></td>
                          <td ><tr><td>{{row.peso * row.tejed/100}}</td></tr></td>
                          <td > <tr><td>{{row.peso - row.peso_tej }}</td></tr></td>    
                        </template>  
                        <template v-else-if="row.peso_tej - row.peso_tin > row.peso_tej * row.tinto/100">
                        
                            <td ><tr><td>{{ index }}</td></tr></td>
                            <td ><tr><td>{{ row.op }}</td></tr></td>
                            <td ><tr><td>{{ row.partida }}</td></tr></td>
                            <td ><tr><td>{{ row.producto_final }}</td></tr></td>
                            <td ><tr><td>{{ row.prov_tin }}</td></tr></td>
                            <td ><tr><td><span style="background-color:#F07B06;" class="badge text-white">Tintorería
                                </span></td></tr></td>
                            <td ><tr><td>{{row.peso * row.tinto/100}}</td></tr></td>
                            <td > <tr><td>{{row.peso_tej - row.peso_tin }}</td></tr></td>
                            
                         </template>
                    </template>
                      </tr>
                    <!-- <tr>
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
                    </tr> -->
                </data-table>
            </div>

<!-- 
            <sale-opportunities-options :showDialog.sync="showDialogOptions"
                              :recordId="recordId"
                              :showGenerate="true"
                              :showClose="true"></sale-opportunities-options> -->

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
                resource: 'proceso_prod_merma',
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
