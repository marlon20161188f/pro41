<template>
    <el-dialog :title="titleDialog"
               width="40%"
               :visible="showDialog"
               @open="create"
               :close-on-click-modal="false"
               :close-on-press-escape="false"
               append-to-body
               :show-close="false">

        <div class="form-body" v-if="lots">
            <div class="row" >
                <div class="col-lg-12 col-md-12">
                    <table width="100%">
                        <thead>
                            <tr width="100%">
                                <th v-if="lots.length>0">Serie</th>
                                <th v-if="lots.length>0">Peso</th>
                                <!-- <th v-if="lots.length>0" type="hidden">Estado</th> -->
                                <th v-if="lots.length>0">Fecha</th>
                                <template v-if="val===1">
                                <th width="15%"></th>
                                </template>
                                <template v-else-if="val===0">
                                <th width="15%"><a href="#" @click.prevent="clickAddLot" class="text-center font-weight-bold text-info">[+ Agregar]</a></th>
                                </template>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in lots" :key="index" width="100%" >
                                <td>
                                    <div class="form-group mb-2 mr-2"  >
                                        <el-input @blur="duplicateSerie(row.series, index)" v-model="row.series" :readonly="val===1"></el-input>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-2 mr-2"  >
                                        <el-input v-model="row.peso" type="number" :readonly="val===1"></el-input>
                                    </div>
                                </td>
                                 <!-- <td>
                                    <div class="form-group mb-2 mr-2"  >
                                        <el-select  v-model="row.state" type="hidden">
                                            <el-option
                                                v-for="(option, index) in states"
                                                :key="index"
                                                :value="option"
                                                :label="option"
                                            ></el-option>
                                        </el-select>
                                    </div>
                                </td> -->
                                <td>
                                    <div class="form-group mb-2 mr-2" >
                                        <el-date-picker v-model="row.date" type="date" value-format="yyyy-MM-dd" :clearable="false" :readonly="val===1"></el-date-picker>
                                    </div>
                                </td>
                                <td class="series-table-actions text-center">
                                    <template v-if="val===1">
                                    </template>
                                    <template v-else-if="val===0">
                                    <button  type="button" class="btn waves-effect waves-light btn-xs btn-danger" @click.prevent="clickCancel(index)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </template>
                                </td>
                                <br>
                            </tr>
                        </tbody>
                    </table>


                </div>

            </div>
        </div>

        <div class="form-actions text-right pt-2">
            <el-button @click.prevent="clickCancelSubmit()">Cancelar</el-button>
            <template v-if="val===1">
             </template>
             <template v-else-if="val===0">
            <el-button type="primary" @click="submit" >Guardar</el-button>
             </template>
        </div>
    </el-dialog>
</template>

<script>
    export default {
        props: ['val','showDialog', 'lots', 'stock','recordId'],
        data() {
            return {
                titleDialog: 'Series',
                loading: false,
                errors: {},
                form: {},
                states: ['Activo', 'Inactivo', 'Desactivado', 'Voz', 'M2m']

            }
        },
        async created() {

            // await this.$http.get(`/pos/payment_tables`)
            //     .then(response => {
            //         this.payment_method_types = response.data.payment_method_types
            //         this.cards_brand = response.data.cards_brand
            //         this.clickAddLot()
            //     })
        },
        methods: {
            async duplicateSerie(data, index)
            {

                let duplicates = await _.filter(this.lots, {'series':data})
                if(duplicates.length > 1)
                {
                    this.lots[index].series = ''
                }
            },
            create(){

                if(!this.recordId){

                    if(this.lots.length == 0){

                        this.addMoreLots(this.stock)

                    }else{

                        let quantity = this.stock - this.lots.length
                        if(quantity > 0){
                            this.addMoreLots(quantity)
                        }
                        // else{
                        //     this.deleteMoreLots(quantity)
                        // }
                    }

                }
            },
            addMoreLots(number){

                for (let i = 0; i < number; i++) {
                    this.clickAddLot()
                }

            },
            deleteMoreLots(number){

                for (let i = 0; i < number; i++) {
                    this.lots.pop();
                    this.$emit('addRowLot', this.lots);
                }

            },
            async validateLots(){

                let error = 0

                await this.lots.forEach(element => {
                    if(element.series == null){
                        error++
                    }
                });

                if(error>0)
                    return {success:false, message:'El campo serie es obligatorio'}


                return {success:true}

            },
            async submit(){

                let val_lots = await this.validateLots()
                if(!val_lots.success)
                    return this.$message.error(val_lots.message);

                await this.$emit('addRowLot', this.lots);
                await this.$emit('update:showDialog', false)

            },
            clickAddLot() {

                if(!this.recordId){
                    if(this.lots.length >= this.stock)
                        return this.$message.error('La cantidad de registros es superior al número registrado');
                }


                this.lots.push({
                    id: null,
                    item_id: null,
                    series: null,
                    peso: 0,
                    date:  moment().format('YYYY-MM-DD'),
                    state: 'Activo'

                });

                this.$emit('addRowLot', this.lots);
            },

            close() {
                this.$emit('update:showDialog', false)
                this.$emit('addRowLot', this.lots);
                this.$emit('update:stock', null);
            },
            clickCancel(index) {
                this.lots.splice(index, 1);
               // item.deleted = true
                this.$emit('addRowLot', this.lots);
            },

            async clickCancelSubmit() {
                this.$emit('addRowLot', []);
                await this.$emit('update:showDialog', false)
            },
            close() {
                this.$emit('update:showDialog', false)
                
            },
        }
    }
</script>
