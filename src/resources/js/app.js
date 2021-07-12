require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
// window.vue2vis = require('vue2vis');
// window.moment = require('moment');

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


// Source https://dev.to/4unkur/how-to-use-laravel-translations-in-js-vue-files-ia
// docker-compose exec php php artisan cache:clear to refresh translation
Vue.mixin(require('./trans'))

const app = new Vue({
    el: '#app'
});