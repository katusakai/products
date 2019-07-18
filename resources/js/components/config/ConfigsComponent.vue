<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">

                <form :action="action" :method="method">
                    <input type="hidden" name="_token" :value="csrf">


                    <div class="form-group row">
                        <label for="form-price" class="col-sm-5 col-form-label text-nowrap">Tax rate, %</label>
                        <div class="col-sm-7">
                            <input name="tax_rate" class="form-control" id="form-price" type="number" step="0.01" min="0" required
                                   :value="taxRate ? taxRate : null"
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="form-flag" class="col-sm-5 col-form-label text-nowrap">Tax inclusion flag</label>
                        <div class="col-sm-7">
                            <div class="custom-control custom-switch pt-1">
                                <input name="tax_inclusion_flag" type="checkbox" class="custom-control-input" id="form-flag"
                                       :checked="taxInclusionFlag == '1' ? true : false"
                                >
                                <label class="custom-control-label" for="form-flag">Disabled/Enabled</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="form-global-discount" class="col-sm-5 col-form-label text-nowrap">Global discount, %</label>
                        <div class="col-sm-7">
                            <input name="global_discount" class="form-control" id="form-global-discount" type="number" step="0.01" min="0" max="100" required
                                   :value="globalDiscount ? globalDiscount : null"
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: [
            'routeIndexJson',
            'routeConfigsUpdate'
        ],

        data: function () {
            return {
                taxRate: '',
                taxInclusionFlag: '',
                globalDiscount: '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                action: '',
                method: ''
            }
        },

        mounted() {
            this.getData();
            this.setFormData();
        },

        methods: {
            getData(){
                axios
                    .get(this.routeIndexJson)
                    .then(response => {
                        this.taxRate = response.data[0].value;
                        this.taxInclusionFlag = response.data[1].value;
                        this.globalDiscount = response.data[2].value;
                    })
            },

            setFormData() {
                this.action = this.routeConfigsUpdate;
                this.method = 'post'

            },
        }
    }
</script>