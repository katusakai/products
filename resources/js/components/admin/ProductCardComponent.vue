<template>
    <div class="row product-card">
        <div class="col-sm-12 border p-2" v-if="selectedProduct && isActive">
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
            <div class="d-flex">
                <strong class="pr-1">Price:</strong>
                <price-field
                        :price="selectedProduct.price"
                        :discounted-price="selectedProduct.discounted_price"
                        :taxes-text="selectedProduct.taxes_text"
                ></price-field>
            </div>
            <div>
                <div><strong>Description</strong></div>
                <div>{{selectedProduct.description}}</div>
            </div>
            <div>
<!--                <image-thumbnail-->
<!--                        v-if="imageShow && selectedProduct.images[0]"-->
<!--                        :src="selectedProduct.images[0].image"-->
<!--                ></image-thumbnail>-->
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'selectedProduct',
            'imageShow'
        ],
        data: function () {
            return {
                isActive: true
            }
        },
    }
</script>