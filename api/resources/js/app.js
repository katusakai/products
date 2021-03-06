/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('admin-products-parent', require('./components/admin/ParentProductsComponent').default);
Vue.component('admin-products-table', require('./components/admin/ProductsTableComponent.vue').default);
Vue.component('admin-product-card', require('./components/admin/ProductCardComponent').default);
Vue.component('admin-product-form', require('./components/admin/ProductFormComponent').default);
Vue.component('admin-modal', require('./components/admin/ModalComponent').default);

Vue.component('admin-product-page', require('./components/admin/ProductPageComponent').default);

Vue.component('admin-image-upload-form', require('./components/admin/ImageUploadFormComponent').default);


Vue.component('price-field', require('./components/PriceFieldComponent').default);
Vue.component('image-thumbnail', require('./components/ImageThumbnailComponent').default);

Vue.component('configs', require('./components/config/ConfigsComponent').default);

Vue.component('products-for-clients', require('./components/ProductsForClientsComponent').default);
Vue.component('product-card-for-clients', require('./components/ProductCardForClientsComponent').default);
Vue.component('product-page-for-clients', require('./components/IndividualProductPageForClientsComponent').default);

Vue.component('pagination', require('laravel-vue-pagination'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
