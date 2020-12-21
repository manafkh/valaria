require('./bootstrap');
import '@mdi/font/css/materialdesignicons.css'
import Vue from 'vue'
// import PrettyCheckbox from 'pretty-checkbox-vue';
import MenuIcon from 'vue-material-design-icons/Menu.vue';
import Vuetify from 'vuetify/lib'
import 'v-title/lib/element-ui';
import VTitle from 'v-title';
import VTooltip from 'v-tooltip'
Vue.use(VTooltip);
Vue.use(VTitle);
Vue.use(Vuetify);

export default new Vuetify({
    icons: {
        iconfont: 'mdi', // default - only for display purposes
    },
})
window.Vue = require('vue');
// Vue.use(PrettyCheckbox);
Vue.use(MenuIcon);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('multi-step', require('./components/ProjectComponent.vue').default);

const app = new Vue({
    el: '#app',
});

