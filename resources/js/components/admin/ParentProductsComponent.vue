<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <admin-products-table
                        @productSelected="productSelected($event)"
                        :page="page"
                        :route-index="routeIndex"
                ></admin-products-table>
            </div>
            <div class="col-md-2">
                <admin-product-card
                        :selected-product="selectedProduct"
                        :image-show="true"
                ></admin-product-card>
            </div>
        </div>
        <admin-modal>

        </admin-modal>
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