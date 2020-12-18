


require('./bootstrap');
import '@mdi/font/css/materialdesignicons.css'
import Vue from 'vue'
import PrettyCheckbox from 'pretty-checkbox-vue';
import MenuIcon from 'vue-material-design-icons/Menu.vue';
import Vuetify from 'vuetify/lib'

Vue.use(Vuetify)

export default new Vuetify({
    icons: {
        iconfont: 'mdi', // default - only for display purposes
    },
})
window.Vue = require('vue');
Vue.use(PrettyCheckbox);
Vue.use(MenuIcon);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('multi-step', require('./components/ProjectComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

