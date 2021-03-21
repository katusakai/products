<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <strong>Product name: </strong> {{product.name}}
                </div>
                <div>
                    <strong>Product sku: </strong> {{product.sku}}
                </div>
                <div class="d-flex">
                    <strong class="pr-1">Product price: </strong>
                    <price-field-component
                            :price="product.price"
                            :discounted-price="product.discounted_price"
                            :taxesText="product.taxes_text"
                    ></price-field-component>
                </div>
                <div class="d-block">
                    <div><strong>Description: </strong></div>
                    <div>{{product.description}}</div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col" v-for="image in product.images">
                        <image-thumbnail :src="image.image"></image-thumbnail>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PriceFieldComponent from "./PriceFieldComponent";
    export default {
        components: {PriceFieldComponent},
        props: [
          'routeProduct'
        ],
        data: function () {
            return {
                product: {}
            }
        },

        mounted() {
            this.getResults()
        },

        methods: {
            getResults() {
                axios
                    .get(this.routeProduct)
                    .then(response => {
                        this.product = response.data;
                    })
            },
        }
    }
</script>