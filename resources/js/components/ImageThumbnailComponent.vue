<template>
        <img class="img-thumbnail" :src="src" alt="">
</template>

<script>
    export default {
        props: [
            'src'
        ]
    }
</script>