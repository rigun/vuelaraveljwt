
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import Buefy from 'buefy';
import router from './routes.js';
import Editor from '@tinymce/tinymce-vue';
import bootstrap from 'bootstrap';
import jQuery from 'jquery';
import JssorSlider from 'jssor-slider';

window.Slug = require('slug');
Slug.defaults.mode = 'rfc3986';
window.VueRouter = require('vue-router').default;


Vue.use(Buefy, VueRouter, axios, jQuery, JssorSlider, bootstrap);


const AppLayout = Vue.component('app-layout', require('./components/appLayout.vue'))
const editor = Vue.component('editor', Editor)
const slugWidget = Vue.component('slug-widget', require('./components/slugWidget.vue'));

new Vue(
    Vue.util.extend(
        {router},
        AppLayout,
        editor,
        slugWidget,
    )
).$mount('#mainLayout');
