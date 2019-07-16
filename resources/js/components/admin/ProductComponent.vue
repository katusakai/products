<template>
    <div class="container">
        <div class="row">
            <div class="d-block product-card">
                <div class="border card-toggler" v-if="selectedProduct" @click="toggle">{{isActive ? 'Show Product' : 'Hide Product'}}</div>
                <div class="d-block border p-2" v-if="selectedProduct && isActive">
                    <div>
                        <strong>Product name:</strong>
                        {{selectedProduct.name}}
                    </div>
                    <div>
                        <strong>Product sku:</strong>
                        {{selectedProduct.sku}}
                    </div>
                    <div>
                        <strong>Status:</strong>
                        {{(selectedProduct.status == 1 ? 'Enabled' : 'Disabled')}}
                    </div>
                    <div v-if="selectedProduct.taxes_text">
                        <strong>Price:</strong>
                        {{selectedProduct.price}} € <small>{{selectedProduct.taxes_text}}</small>
                    </div>
                    <div>
                        <img :src="selectedProduct.images[0].image" alt="">
                    </div>
                    <div>
                        <div><strong>Description</strong></div>
                        <div>{{selectedProduct.description}}</div>
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