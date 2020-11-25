
/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');

window.Vue = require('vue');
window.vue2vis = require('vue2vis');

/**
* The following block of code may be used to automatically register your
* Vue components. It will recursively scan this directory for the Vue
* components and automatically register them with their "basename".
*
* Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
*/

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('timeline', vue2vis.Timeline);
Vue.component('network', vue2vis.Network);

import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales.generated';

Vue.use(VueInternationalization);

const lang = document.documentElement.lang.substr(0, 2);
// or however you determine your current app locale

const i18n = new VueInternationalization({
  locale: lang,
  messages: Locale
});

/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/

const app = new Vue({
  el: '#app',
  i18n,
  data: {
    nodes: [],
    edges: [],
    options: {
      height: '100%',
      width: '100%',
      nodes: {
        margin: 10,
        widthConstraint: {
          maximum: 200
        },
        size: 40,
        font: {
          multi: 'html',
          size: 16,
          color: '#344c77'
        },
        borderWidth: 2,
        // shadow:true
      },
      edges: {
        width: 2
      },
    },
  },
  methods: {

  },
  mounted () {
    axios
    .get('/api/org-mesylab-sprl/process/102')
    .then(response => (
      this.edges = response.data.edges,
      this.nodes = response.data.nodes
    ))
    .catch(error => console.log(error))
  }
});
