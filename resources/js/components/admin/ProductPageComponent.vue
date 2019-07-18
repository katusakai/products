<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <admin-product-card
                    :selected-product="product"
                ></admin-product-card>
                <div class="pt-2">
                    <admin-image-upload-form
                        :route-image-upload="routeImageUpload"
                    ></admin-image-upload-form>
                </div>

                <div class="row pt-5">
                    <div class="col-4 pb-4" v-for="image in product.images">
                        <image-thumbnail :src="image.image"></image-thumbnail>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <admin-product-form
                    class="border p-2"
                    :used-for="usedFor"
                    :default-value="product"
                    :route-product-to-update="routeProductUpdate"
                    :route-product-destroy="routeProductDestroy"
                    :route-redirect="routeRedirect"
                ></admin-product-form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'routeProductShow',
            'routeProductUpdate',
            'routeProductDestroy',
            'routeRedirect',
            'routeImageUpload'
        ],
        data: function () {
            return {
                product: {},
                usedFor: 'update'
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