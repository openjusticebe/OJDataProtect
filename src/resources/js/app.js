require('./bootstrap');
require('alpinejs');

window.vue2vis = require('vue2vis');

import Vue from 'vue';
import VueFormulate from '@braid/vue-formulate'

// window.moment = require('moment');

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('network', vue2vis.Network);

// Source https://dev.to/4unkur/how-to-use-laravel-translations-in-js-vue-files-ia
// docker-compose exec php php artisan cache:clear to refresh translation
Vue.mixin(require('./trans'))

Vue.use(VueFormulate)

const app = new Vue({
    el: '#app'
});