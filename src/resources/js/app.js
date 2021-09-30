require('./bootstrap');
require('alpinejs');

window.vue2vis = require('vue2vis');

import Vue from 'vue';

import VueI18n from 'vue-i18n';
Vue.use(VueI18n)

import VueFormulate from '@braid/vue-formulate';
// Vue.use(VueFormulate)

Vue.use(VueFormulate, {
    classes: {
      outer: 'mb-4',
      input (context) {
        switch (context.classification) {
          case 'button':
            return 'px-4 py-2 rounded bg-green-500 text-white hover:bg-green-600'
          default:
            return 'border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1'
        }
      },
      label: 'font-bold text-sm',
      help: 'text-xs mb-1 italic text-grey-600',
      error: 'text-red-700 text-xs mb-1'
    }
  })

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
    i18n
});