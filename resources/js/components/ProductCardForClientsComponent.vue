<template>
    <div class="border product-thumbnail">
        <div class="text-center">
            <strong>Product name:</strong>
            {{product.name}}
        </div>
        <div class="text-center">
            <strong>Product sku:</strong>
            {{product.sku}}
        </div>
        <div class="text-center">
            <price-field-component
                :price="product.price"
                :discounted-price="product.discounted_price"
                :taxesText="product.taxes_text"
            ></price-field-component>
        </div>
        <div>
            <a :href="this.urlToProduct">
                <image-thumbnail-component
                        :src="product.images[0].image"
                ></image-thumbnail-component>
            </a>
        </div>
    </div>
</template>

<script>
    import PriceFieldComponent from "./PriceFieldComponent";
    import ImageThumbnailComponent from "./ImageThumbnailComponent";
    export default {
        components: {ImageThumbnailComponent, PriceFieldComponent},
        props: [
            'product',
        ],

        data: function () {
            return {
                urlToProduct: 'products/' + this.product.id
            }
        }
    }
</script>