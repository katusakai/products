<template>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <pagination :data="products" :show-disabled="true" @pagination-change-page="getResults"></pagination>
            </div>
            <div class="d-sm-flex">
                <div class="pr-2 pb-2">
                    <select class="form-control"
                            v-model="selected"
                    >
                        <option value="choose">Choose Action</option>
                        <option value="delete">Delete</option>
                        <option value="enable">Enable</option>
                        <option value="disable">Disable</option>
                    </select>
                </div>
                <div class="pr-2 pb-2">
                    <button class="btn btn-success" @click="selectedAction">Apply action</button>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
                        Create
                    </button>
                </div>

            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="toggleCheckboxes"
                                       @click="toggleCheckboxes()"></th>
                            <th>Name</th>
                            <th>Sku</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product, index) in products.data">
                            <td><input class="checkbox" type="checkbox"
                                       :data-product-id="product.id"
                                       :data-product-index="index"
                            ></td>
                            <td>{{product.name}}</td>
                            <td>{{product.sku}}</td>
                            <td>
                                <price-field
                                    :price="product.price"
                                    :discounted-price="product.discounted_price"
                                    :taxes-text="product.taxes_text"
                                ></price-field>
                            </td>
                            <td>{{(product.status == 1 ? 'Enabled' : 'Disabled')}}</td>
                            <td>
                                <a class="text-primary" href="javascript:void(0)"
                                @click="selectProduct(index)"
                                >View</a>
                                <a class="text-success pl-1" href="javascript:void(0)">Edit</a>
                                <a class="text-danger pl-1" href="javascript:void(0)"
                                @click="destroySingle(product.id, index)">Delete</a>

                                <a class="pl-1" href="javascript:void(0)"
                                    @click="changeStatus(product.id, 0)"
                                    v-if="product.status == 1"
                                >Disable</a>

                                <a class="pl-1" href="javascript:void(0)"
                                    @click="changeStatus(product.id, 1)"
                                    v-else
                                >Enable</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <pagination :data="products" :show-disabled="true" @pagination-change-page="getResults"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'routeIndex',
            'page'
        ],

        data: function () {
            return {
                url: '',
                products: {},
                pagination: [],
                checkboxes: document.getElementsByClassName('checkbox'),
                toggleCheckboxe: document.getElementById('toggleCheckboxes'),
                selected: 'choose'
            }
        },

        mounted() {
            this.getResults()
        },

        methods: {
            getResults(page = this.page) {
                axios
                    .get(this.routeIndex + '?page=' + page)
                    .then(response => {
                        this.products = response.data;
                        this.round();
                        this.url = response.config.url;
                        this.unCheckAll()
                    })
            },

            keepResults() {
                axios
                    .get(this.url)
                    .then(response => {
                        this.products = response.data;
                        this.round();
                    })
            },

            selectedAction() {
                switch(this.selected) {
                    case 'delete':
                        this.destroyMany();
                        break;
                    case 'enable':
                        this.changeStatusMany(1);
                        break;
                    case 'disable':
                        this.changeStatusMany(0);
                        break;
                }
            },

            selectProduct(index) {
                this.$emit('productSelected', this.products.data[index])
            },

            destroy(id, index) {
                axios
                    .delete('admin/product/' + id)
                    .then(Vue.delete(this.products.data, index))
            },

            destroySingle(id, index){
                if (confirm('Do you really want to delete?')) {
                    this.destroy(id, index)
                }
            },

            destroyMany() {
                let data = this.selectedCheckboxes();
                for (let i = 0; i < data.length; i++ ) {
                    this.destroy(data[i].id, data[i].index)
                }
                this.unCheckAll()
            },

            changeStatus(id, value) {
                axios
                    .put('admin/product/' + id + '/' + value)
                this.keepResults()
            },

            changeStatusMany(value) {
                let data = this.selectedCheckboxes();
                for (let i = 0; i < data.length; i++ ) {
                    this.changeStatus(data[i].id, value)
                }
                this.unCheckAll()
            },

            toggleCheckboxes() {
                if (toggleCheckboxes.checked)  {
                    this.checkAll()
                } else {
                    this.unCheckAll()
                }
            },
            checkAll() {
                for (let i = 0; i < this.checkboxes.length; i++) {
                    this.checkboxes[i].checked = true;
                }
            },
            unCheckAll() {
                for (let i = 0; i < this.checkboxes.length; i++) {
                    this.checkboxes[i].checked = false;
                }
            },

            selectedCheckboxes() {
                let allCheckboxes = document.getElementsByClassName('checkbox');
                let selectedCheckboxes = [];
                for (let i = 0; i < allCheckboxes.length; i++) {
                    if (allCheckboxes[i].checked) {
                        let data = {
                            id: allCheckboxes[i].getAttribute('data-product-id'),
                            index: allCheckboxes[i].getAttribute('data-product-index')
                        };
                        selectedCheckboxes.push(data)
                    }
                }
                return selectedCheckboxes
            },

            round(){
                for(let i = 0; i < this.products.data.length; i++) {
                    this.products.data[i].price = this.products.data[i].price.toFixed(2)
                    this.products.data[i].discounted_price = this.products.data[i].discounted_price.toFixed(2)
                }
            }
        }
    }
</script>
