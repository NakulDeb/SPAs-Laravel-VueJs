import Vue from 'vue';
import router from './router';
import store from './store';

require('./bootstrap');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('App', require('./components/App.vue').default);
Vue.component('nav-bar', require('./components/pages/nav-bar.vue').default);
Vue.component('page-footer', require('./components/pages/page-footer.vue').default);


Vue.component('passport-clients', require('./components/passport/Clients.vue').default);

Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue').default);

Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue').default);


Vue.config.productionTip = false

const app = new Vue({
    el: '#app',
    router,
    store,
});
