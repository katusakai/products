<template>
    <div class="container">
        <div class="row">
            <div v-if="selectedProduct" class="d-block">
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
                    <strong>{{selectedProduct.status}}</strong>
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
</template>

<script>
    export default {
        props: ['selectedProduct']
    }
</script>