export const deletable = {
    methods: {
        destroy(url) {
            return new Promise((resolve) => {
                this.$confirm('¿Desea eliminar el registro?', 'Eliminar', {
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    type: 'warning'
                }).then(() => {
                    this.$http.delete(url)
                        .then(res => {
                            if(res.data.success) {
                                this.$message.success(res.data.message)
                                resolve()
                            }else{
                                this.$message.error(res.data.message)
                                resolve()
                            }
                        })
                        .catch(error => {
                            if (error.response.status === 500) {
                                this.$message.error('Error al intentar eliminar');
                            } else {
                                console.log(error.response.data.message)
                            }
                        })
                }).catch(error => {
                    console.log(error)
                });
            })
        },
        anular(url) {
            return new Promise((resolve) => {
                this.$confirm('¿Desea anular el registro?', 'Anular', {
                    confirmButtonText: 'Anular',
                    cancelButtonText: 'Cancelar',
                    type: 'warning'
                }).then(() => {
                    this.$http.get(url)
                        .then(res => {
                            if (res.data.success) {
                                this.$message.success('Se anuló correctamente el registro')
                                resolve()
                            }
                            else{
                                const {message = 'Error al intentar anular'} = res.data
                                this.$message.error(message)
                            }
                        })
                        .catch(error => {
                            if (error.response.status === 500) {
                                this.$message.error('Error al intentar anular');
                            } else {
                                console.log(error.response.data.message)
                            }
                        })
                }).catch(error => {
                    console.log(error)
                });
            })
        },
        delete(url) {
            return new Promise((resolve) => {
                this.$confirm('¿Desea eliminar permanentemente el registro?', 'Anular', {
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    type: 'warning'
                }).then(() => {
                    this.$http.get(url)
                        .then(res => {
                            if (res.data.success) {
                                this.$message.success('Se anuló correctamente el registro')
                                resolve()
                            }
                        })
                        .catch(error => {
                            if (error.response.status === 500) {
                                this.$message.error('Error al intentar anular');
                            } else {
                                console.log(error.response.data.message)
                            }
                        })
                }).catch(error => {
                    console.log(error)
                });
            })
        },
        disable(url) {
            return new Promise((resolve) => {
                this.$confirm('¿Desea inhabilitar el registro?', 'Inhabilitar', {
                    confirmButtonText: 'Inhabilitar',
                    cancelButtonText: 'Cancelar',
                    type: 'warning'
                }).then(() => {
                    this.$http.get(url)
                        .then(res => {
                            if(res.data.success) {
                                this.$message.success(res.data.message)
                                resolve()
                            }else{
                                this.$message.error(res.data.message)
                                resolve()
                            }
                        })
                        .catch(error => {
                            if (error.response.status === 500) {
                                this.$message.error('Error al intentar inhabilitar');
                            } else {
                                console.log(error.response.data.message)
                            }
                        })
                }).catch(error => {
                    console.log(error)
                });
            })
        },
        enable(url) {
            return new Promise((resolve) => {
                this.$confirm('¿Desea habilitar el registro?', 'Habilitar', {
                    confirmButtonText: 'Habilitar',
                    cancelButtonText: 'Cancelar',
                    type: 'warning'
                }).then(() => {
                    this.$http.get(url)
                        .then(res => {
                            if(res.data.success) {
                                this.$message.success(res.data.message)
                                resolve()
                            }else{
                                this.$message.error(res.data.message)
                                resolve()
                            }
                        })
                        .catch(error => {
                            if (error.response.status === 500) {
                                this.$message.error('Error al intentar habilitar');
                            } else {
                                console.log(error.response.data.message)
                            }
                        })
                }).catch(error => {
                    console.log(error)
                });
            })
        },
        voided(url) {
            return new Promise((resolve) => {
                this.$confirm('¿Desea anular el registro?', 'Anular', {
                    confirmButtonText: 'Anular',
                    cancelButtonText: 'Cancelar',
                    type: 'warning'
                }).then(() => {
                    this.$http.get(url)
                        .then(res => {
                            if (res.data.success) {
                                this.$message.success(res.data.message)
                                resolve()
                            }
                        })
                        .catch(error => {
                            if (error.response.status === 500) {
                                this.$message.error('Error al intentar anular');
                            } else {
                                console.log(error.response.data.message)
                            }
                        })
                }).catch(error => {
                    console.log(error)
                });
            })
        },
        updateStateType(url) {
            return new Promise((resolve) => {
                this.$confirm('¿Desea modificar el estado del registro?', 'Modificar', {
                    confirmButtonText: 'Modificar',
                    cancelButtonText: 'Cancelar',
                    type: 'warning'
                }).then(() => {
                    this.$http.get(url)
                        .then(res => {
                            if (res.data.success) {
                                this.$message.success(res.data.message)
                                resolve()
                            }
                        })
                        .catch(error => {
                            if (error.response.status === 500) {
                                this.$message.error('Error al intentar modificar');
                            } else {
                                console.log(error.response.data.message)
                            }
                        })
                }).catch(error => {
                    console.log(error)
                    this.$eventHub.$emit('reloadData')
                });
            })
        },
        processcancel(url, form) {
            return new Promise((resolve) => {
                this.$confirm('¿Desea cancelar el proceso productivo?', 'Cancelar', {
                    confirmButtonText: 'Cancelar',
                    cancelButtonText: 'Regresar',
                    type: 'warning'
                }).then(() => {
                    this.$http.post(url,form)
                        .then(res => {
                            if (res.data.success) {
                                this.$message.success(res.data.message)
                                resolve()
                                location.href = '/proceso_prod'
                            }
                        })
                        .catch(error => {
                            if (error.response.status === 500) {
                                this.$message.error('Error al cancelar el proceso productivo');
                            } else {
                                console.log(error.response.data.message)
                            }
                        })
                }).catch(error => {
                    console.log(error)
                    this.$eventHub.$emit('reloadData')
                });
            })
        },

    }
}
