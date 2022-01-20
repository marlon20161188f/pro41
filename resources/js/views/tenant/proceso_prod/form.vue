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
                                                class="pb-2">Orden de compra
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
                                                    <el-select
                                                            >
                                                        <el-option ></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-select >
                                                        <el-option ></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-input ></el-input>
                                                </div>
                                            </td>
                                             <td>
                                                 <div class="form-group mb-2 mr-2">
                                                <el-date-picker
                                                   
                                                    format="dd/MM/yyyy"
                                                    type="date"
                                                   
                                                    value-format="yyyy-MM-dd"></el-date-picker>
                                                 </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-select >
                                                        <el-option ></el-option>
                                                    </el-select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-input ></el-input>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-2 mr-2">
                                                    <el-input ></el-input>
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

        <purchase-form-item ></purchase-form-item>

        <person-form 
                     type="suppliers"></person-form>

        <purchase-options ></purchase-options>

        <series-form
           >
        </series-form>

    </div>
</template>

<script>

export default {
    setup() {
        
    },
    methods:{
        close() {
            location.href = '/proceso_prod'
        }
    }

}
</script>