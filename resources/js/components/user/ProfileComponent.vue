<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 badge-light">
                <h1 class="">Perfil de {{user.name}}</h1>
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Direccion</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control " v-model="userInformation.address"
                               name="address" value="" required autocomplete="address" autofocus disabled>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="count" class="col-md-4 col-form-label text-md-right">Cuenta</label>

                    <div class="col-md-6">
                        <input id="count" type="number" class="form-control" v-model="userInformation.count"
                               name="count" value="" required autocomplete="email" disabled>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="bank" class="col-md-4 col-form-label text-md-right">Banco</label>

                    <div class="col-md-6">
                        <input id="bank" type="text" class="form-control" v-model="userInformation.bank"
                               name="bank" value="" required autocomplete="bank" disabled>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">Telefono</label>

                    <div class="col-md-6">
                        <input id="phone" type="text" class="form-control " v-model="userInformation.phone"
                               name="phone" required autocomplete="new-password" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="salary" class="col-md-4 col-form-label text-md-right">Salario bruto $</label>

                    <div class="col-md-6">
                        <input id="salary" type="number" class="form-control" v-model="userInformation.salary"
                               name="salary" value="" required autocomplete="salary" disabled>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="salary2" class="col-md-4 col-form-label text-md-right">Salario neto $</label>

                    <div class="col-md-6">
                        <input id="salary2" type="number" class="form-control" v-model="neto"
                               name="salary2" value="" required autocomplete="salary2" disabled>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['user'],
        data(){
            return{
                userInformation:{
                    address:'',
                    count:'',
                    bank:'',
                    phone:'',
                    salary:'',
                },
                id:'',
                neto:'',
            }
        },
        methods:{
            async getUserInformation(id){
                this.id = this.user.id;
                let response;
                axios.get('/information/'+this.id).then(response=>{
                    this.userInformation = response.data;
                    this.neto = this.userInformation.salary*.8;
                    this.neto = new Intl.NumberFormat("US").format(this.neto);
                    this.userInformation.salary =new Intl.NumberFormat("US").format(this.userInformation.salary);
                    let formatPhoneNumber = (str) => {
                        //Filter only numbers from the input
                        let cleaned = ('' + str).replace(/\D/g, '');

                        //Check if the input is of correct length
                        let match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/);

                        if (match) {
                            return '(' + match[1] + ') ' + match[2] + '-' + match[3]
                        };

                        return null
                    };
                    this.userInformation.phone=formatPhoneNumber(this.userInformation.phone);
                });
            }
        },
        created() {
            this.getUserInformation();
        }
    }
</script>

<style >

</style>
