<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <select name="" id="" class="form-control"></select>
            </div>
            <div class="col-md-4">
                <button class="btn-sm btn-success">Apply action</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>Name</th>
                            <th>Sku</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in products">
                            <td><input type="checkbox"></td>
                            <td>{{product.name}}</td>
                            <td>{{product.sku}}</td>
                            <td>{{product.price}} €</td>
                            <td class="d-flex">
                                <a class="text-primary" href="#">View</a>
                                <a class="text-success pl-1" href="#">Edit</a>
                                <a class="text-danger pl-1" href="#">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['routeIndex'],

        data: function () {
            return {
                products: null,
                url: '',
                pagination: []
            }
        },

        mounted() {
            this.getResults()
        },

        methods: {
            getResults() {
                axios
                    .get(this.routeIndex)
                    .then(response => this.products = response.data)
            }
        }
    }
</script>
