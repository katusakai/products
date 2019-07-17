<template>
    <div>
        {{product}}
    </div>
</template>

<script>
    export default {
        props: [
            'routeProductShow'
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
                    .get(this.routeProductShow)
                    .then(response => {
                        this.product = response.data;
                    })
            },
        }
    }
</script>