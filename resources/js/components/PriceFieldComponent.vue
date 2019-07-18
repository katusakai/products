<template>
    <div v-if="price === discountedPrice">
        {{price}} €
        <small v-if="taxesText">{{taxesText}}</small>
    </div>
    <div v-else>
        <span class="pr-1">{{discountedPrice}} €</span>
        <del>{{price}} €</del>
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