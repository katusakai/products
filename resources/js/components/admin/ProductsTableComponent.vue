<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <select class="form-control"
                    v-model="selected"
                >
                    <option value="choose">Choose Action</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="col-md-4">
                <button class="btn-sm btn-success" @click="selectedAction">Apply action</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="toggleCheckboxes"
                                       @click="toggleCheckboxes()"></th>
                            <th>Name</th>
                            <th>Sku</th>
                            <th>Price</th>
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
                            <td>{{product.price}} €</td>
                            <td class="d-flex">
                                <a class="text-primary" href="javascript:void(0)">View</a>
                                <a class="text-success pl-1" href="javascript:void(0)">Edit</a>
                                <a class="text-danger pl-1" href="javascript:void(0)"
                                @click="destroySingle(product.id, index)">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <pagination :data="products" @pagination-change-page="getResults"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'routeIndex',
        ],

        data: function () {
            return {
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
            getResults(page = 1) {
                axios
                    .get(this.routeIndex + '?page=' + page)
                    .then(response => this.products = response.data)
            },

            selectedAction() {
                if (this.selected === 'delete') {
                    this.destroyMany()
                }
            },

            destroy(id, index) {
                axios
                    .delete('admin/' + id)
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
            }
        }
    }
</script>
