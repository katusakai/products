<template>
    <div v-if="price === discountedPrice">
        {{price}} €
        <small v-if="taxesText">{{taxesText}}</small>
    </div>
    <div v-else>
        {{discountedPrice}}
        <del>€{{price}} €</del>
        <small v-if="taxesText">{{taxesText}}</small>
    </div>
</template>

<script>
    export default {
        props: [
            'price',
            'discountedPrice',
            'taxesText'
        ]
    }
</script>