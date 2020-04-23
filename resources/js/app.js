/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'Vuex';

Vue.use(Vuex);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('modal-component', require('./components/ModalComponent.vue').default);
Vue.component('modal-component', require('./components/ModalComponent2.vue').default);

//Vue.component('table-component', require('./components/TableComponent.vue').default);
Vue.component('table-component', require('./components/TableComponent2.vue').default);

Vue.component('modal-delete-component', require('./components/ModalDeleteComponent.vue').default);
Vue.component('card-busca', require('./components/CardBuscaComponent').default);

Vue.component('table-busca', require('./components/TableBuscaComponent').default);

Vue.component('card-busca-livro', require('./components/CardBuscaLivroComponent').default);
Vue.component('card-form', require('./components/CardFormComponent').default);

Vue.component('card-book', require('./components/CardPageBookComponent').default);

Vue.component('page-books', require('./components/PageBooksComponent').default);

Vue.component('page-books-emprestados', require('./components/PageBooksEmprestimosComponent').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const store = new Vuex.Store({
    state:{
        itemModal: {},
        valueBuscaMatricula : '',
        valueBuscaLivro : ''
    },
    mutations:{
        setItemModal(state,obj){
            state.itemModal = obj;
        },
        setValueBuscaMatricula(state,value){
            state.valueBuscaMatricula = value;
        },
        setValueBuscaLivro(state,value){
            state.valueBuscaLivro = value;
        },
    }
});

const app = new Vue({
    el: '#app',
    store,
    mounted(){
        $("#app").css("display","block");
    }
});
