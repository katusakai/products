<template>
    <div class="container-fluid">
        <div class="table-responsive d-flex justify-content-center">
            <pagination :data="products" :show-disabled="true" @pagination-change-page="getResults"></pagination>
        </div>

        <div class="row">
            <div class="col p-1" v-for="product in products.data">
                <product-card-for-clients
                    :product="product"
                ></product-card-for-clients>
            </div>
        </div>

        <div class="table-responsive d-flex justify-content-center">
            <pagination :data="products" :show-disabled="true" @pagination-change-page="getResults"></pagination>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'routeIndex',
        ],

        data: function () {
            return {
                products: {}
            }
        },

        mounted() {
            this.getResults()
        },

        methods: {
            getResults(page = this.page) {
                axios
                    .get(this.routeIndex + '?page=' + page)
                    .then(response => {
                        this.products = response.data;
                    })
            },
        }
    }
</script>