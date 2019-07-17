<template>
    <div>
        <form :action="action" :method="method">
            <input type="hidden" name="_token" :value="csrf">
            <div class="form-group row">
                <label for="form-name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input name="name" class="form-control" id="form-name" type="text" required
                        :value="defaultValue ? defaultValue.name : null"
                    >
                </div>
            </div>

            <div class="form-group row">
                <label for="form-sku" class="col-sm-3 col-form-label">SKU</label>
                <div class="col-sm-9">
                    <input name="sku" class="form-control" id="form-sku" type="text" required
                       :value="defaultValue ? defaultValue.sku : null"
                    >
                </div>
            </div>

            <div class="form-group row">
                <label for="form-price" class="col-sm-3 col-form-label text-nowrap">Base Price, €</label>
                <div class="col-sm-9">
                    <input name="price" class="form-control" id="form-price" type="number" step="0.01" min="0.01" required
                       :value="defaultValue ? defaultValue.base_price : null"
                    >
                </div>
            </div>

            <div class="form-group row">
                <label for="form-discount" class="col-sm-3 col-form-label text-nowrap">Discount, %</label>
                <div class="col-sm-9">
                    <input name="discount" class="form-control" id="form-discount" type="number" max="99" min="0" required
                       :value="defaultValue ? defaultValue.discount.discount : 0"
                    >
<!--                    todo fix this .discount.discount bug, because it is show undefined in console-->
                </div>
            </div>

            <div class="form-group row">
                <label for="form-description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea name="description"class="form-control" id="form-description" cols="30" rows="10">{{defaultValue ? defaultValue.description : null}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="form-status" class="col-sm-3 col-form-label text-nowrap">Status</label>
                <div class="col-sm-9">
                    <div class="custom-control custom-switch pt-1">
                        <input name="status" type="checkbox" class="custom-control-input" id="form-status" value="1"
                        :checked=" defaultValue && defaultValue.status == 1 ? true : false"
                        >
                        <label class="custom-control-label" for="form-status">Disabled/Enabled</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">
                        {{usedFor === 'create' ? 'Create' : 'Update'}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: [
            'usedFor',
            'defaultValue',
            'routeProductUpdate'
        ],

        data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            action: '',
            method: ''
        }),

        mounted() {
            this.setData()
        },

        methods: {
            setData() {
                switch (this.usedFor) {
                    case 'create':
                        this.action = 'admin/product';
                        this.method = 'POST';
                    break;
                    case 'update':
                        this.action = this.routeProductUpdate;
                        this.method = 'POST'; //todo should be 'PUT'
                }
            }
        }
    }
</script>