<template>
    <div class="border">
        <form action="admin/product" method="POST">
            <input type="hidden" name="_token" :value="csrf">
            <div class="form-group row">
                <label for="form-name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input name="name" class="form-control" id="form-name" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label for="form-sku" class="col-sm-2 col-form-label">SKU</label>
                <div class="col-sm-10">
                    <input name="sku" class="form-control" id="form-sku" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label for="form-price" class="col-sm-2 col-form-label">Base Price</label>
                <div class="col-sm-10">
                    <input name="price" class="form-control" id="form-price" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label for="form-discount" class="col-sm-2 col-form-label">Discount</label>
                <div class="col-sm-10">
                    <input name="discount" class="form-control" id="form-discount" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label for="form-description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input name="description" class="form-control" id="form-description" type="text">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }),
    }
</script>