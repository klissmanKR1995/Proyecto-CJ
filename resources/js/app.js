
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


Vue.component('distritos-component', require('./components/distritosNComponent.vue').default);
Vue.component('juzgados-component', require('./components/juzgadosNComponent.vue').default);
Vue.component('variables-component', require('./components/variablesNComponent.vue').default);
Vue.component('materias-component', require('./components/materiasNComponent.vue').default);
Vue.component('juicios-component', require('./components/juiciosNComponent.vue').default);
Vue.component('valoresvariables-component', require('./components/valoresvariablesNComponent.vue').default);

Vue.component('expedientes-component', require('./components/expedientesComponent.vue').default);
Vue.component('modulouno-component', require('./components/modulounoComponent.vue').default);
Vue.component('modulounoactualizar-component', require('./components/modulounoactualizarComponent.vue').default);



Vue.component('pagination', require('laravel-vue-pagination'));



const app = new Vue({
    el: '#app'
});
