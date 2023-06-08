import './bootstrap';


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./device_sp');
require('./fade');
// require('./wave');

import Vue from 'vue';
// import vueCookies from 'vue-cookies';
// import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
// import 'vue-ctk-date-time-picker

// 以下の記述ですべてのコンポーネントにおいて「this.$axios」でaxiosが利用できる
import axios from 'axios'; 
Vue.prototype.$axios = axios;

// コンポーネントを読み込む
Vue.component('like', require('./components/like.vue')).default;

// 全部のbladeでvueを使えるようにする
const app = new Vue({
    el: 'app',
});
// new Vue({
//     el: '#app',
// });