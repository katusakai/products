<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <admin-products-table
                        @productSelected="productSelected($event)"
                        :page="page"
                        :route-index="routeIndex"
                ></admin-products-table>
            </div>
            <div class="col-md-4">
                <admin-product-card
                        :selected-product="selectedProduct"
                ></admin-product-card>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'page',
            'routeIndex'
        ],
        data() {
            return {
                selectedProduct: ''
            }
        },
        methods: {
            productSelected(product) {
                this.selectedProduct = product;
            }
        }
    }
</script>