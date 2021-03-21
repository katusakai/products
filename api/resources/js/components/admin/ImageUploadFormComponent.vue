<template>
    <div>
        <form :action="action" :method="method" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">
            <div class="row">
                <div class="col-sm-9">
                    <input name="image" type="file" class="form-control-file" id="form-image" required>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: [
            'routeImageUpload'
        ],
        data: () => ({
            csrf: '',
            action: '',
            method: '',
        }),

        mounted() {
            this.setData()
        },

        methods: {
            setData() {
                this.csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                this.action = this.routeImageUpload;
                this.method = 'POST';
            }
        },
    }
</script>