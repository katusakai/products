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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <admin-product-create></admin-product-create>
                    </div>
                </div>
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