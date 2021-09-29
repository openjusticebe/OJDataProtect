require('./bootstrap');
require('alpinejs');

window.vue2vis = require('vue2vis');

import Vue from 'vue';

import VueI18n from 'vue-i18n';
Vue.use(VueI18n)

import VueFormulate from '@braid/vue-formulate';
Vue.use(VueFormulate)

// window.moment = require('moment');
const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('network', vue2vis.Network);

const defaultLocale = document.documentElement.lang.substr(0, 2);
// or however you determine your current app locale

const messages = require(`./locales/${defaultLocale}.json`);
  
const i18n = new VueI18n({
    locale: defaultLocale,
    fallbackLocale: 'en',
    messages
});

const app = new Vue({
    el: '#app',
    i18n: i18n
});