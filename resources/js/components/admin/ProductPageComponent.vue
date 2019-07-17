<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <admin-product-card
                    :selected-product="product"
                ></admin-product-card>
                <div v-for="image in product.images">
                    <image-thumbnail :src="image.image"></image-thumbnail>
                    <image-thumbnail :src="image.image"></image-thumbnail>
                    <image-thumbnail :src="image.image"></image-thumbnail>
                </div>
            </div>
            <div class="col-md-6">
                <admin-product-form
                    :used-for="usedFor"
                ></admin-product-form>
                {{product}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'routeProductShow'
        ],
        data: function () {
            return {
                product: {},
                usedFor: 'edit'
            }
        },

        mounted() {
            this.getResults()
        },

        methods: {
            getResults() {
                axios
                    .get(this.routeProductShow)
                    .then(response => {
                        this.product = response.data;
                    })
            },
        }
    }
</script>