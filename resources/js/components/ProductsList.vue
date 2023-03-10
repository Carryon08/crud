<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: yellow">Lista de productos
                        <a class="btn btn-elevate btn-primary float-right btn-circle"
                           @click="modalType=true, showModal()">Nuevo producto</a></div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="product in products" :key="product.id" >
                            <td scope="row">{{product.id}}</td>
                            <td>{{product.name}}</td>
                            <td>{{product.price}}</td>
                            <td>
                                <a class="btn btn-primary btn-elevate btn-circle btn-icon" title="Editar"
                                   @click="modalType=false, showModal(product)">editar
                                </a>
                                &nbsp;
                                <a class="btn btn-danger btn-elevate btn-circle btn-icon"
                                   @click="deleteProduct(product.id)" title="Borrar">borrar
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal" tabindex="-1" role="dialog" :class="{show:modal} ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{this.modalTitle}}</h5>
                            <button @click="closeModal()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " v-model="product.name"
                                           name="name" value="" required autocomplete="name" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" class="form-control" v-model="product.price"
                                           name="price" value="" required>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click="closeModal()" type="button" class="btn btn-secondary" data-dismiss="modal">
                                Cerrar</button>
                            <button @click="saveProduct()" type="button" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                modal:0,
                modalType:'',
                modalTitle:'',
                id:0,
                products:[
                    this.name='',
                    this.price=''
                ],
                product: {
                    name:'',
                    price:''
                },
            }
        },
        methods:{
            async getProducts(){
                const response=await axios.get('product');
                this.products = response.data;
            },
            async deleteProduct(id){
                const response=await axios.delete('/product/'+id);
                this.getProducts();
            },
            showModal(data={}){
                this.modal =1 ;
                if(this.modalType){
                    this.modalTitle="Crear producto";
                    this.product.name = '';
                    this.product.price = '';
                }
                else {
                    this.modalTitle="Editar producto";
                    this.id = data.id;
                    this.product.name = data.name;
                    this.product.price = data.price;
                }
            },
            async closeModal(){
                this.modal =0 ;
            },
            async saveProduct(id){
                if(this.modalType) {
                    axios.post('/product',this.product);
                }
                else {
                    axios.put('/product/'+this.id,this.product);
                }
                this.closeModal();
            },
        },
        created(){
            this.getProducts();
        },

    }
</script>
<style>
    .show{
        display: list-item;
        opacity: 1;

    }
</style>

