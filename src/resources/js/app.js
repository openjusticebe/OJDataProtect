require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
// window.vue2vis = require('vue2vis');
// window.moment = require('moment');

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const app = new Vue({
    el: '#app'
});