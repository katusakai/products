<template>
    <div class="container">
        <div class="row">
            <div class="d-block product-card">
                <div class="border card-toggler" v-if="selectedProduct" @click="toggle">{{isActive ? 'Show Product' : 'Hide Product'}}</div>
                <div class="d-block border p-2" v-if="selectedProduct && isActive">
                    <div>
                        Product name:
                        <strong>{{selectedProduct.name}}</strong>
                    </div>
                    <div>
                        Product sku:
                        <strong>{{selectedProduct.sku}}</strong>
                    </div>
                    <div>
                        Status:
                        <strong>{{(selectedProduct.status == 1 ? 'Enabled' : 'Disabled')}}</strong>
                    </div>
                    <div>
                        Price:
                        <strong>{{selectedProduct.price}} €</strong>
                    </div>
                    <div>
                        <img src="https://www.randomlists.com/img/things/hanger.jpg" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'selectedProduct'
        ],
        data: function () {
            return {
                isActive: true
            }
        },
        methods: {
            toggle() {
                this.isActive = !this.isActive
            }
        }
    }
</script>