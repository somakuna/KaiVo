/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m.js';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'


window._ = _;

const app = createApp({}).use(ZiggyVue);

app.component('VueDatePicker', VueDatePicker);

import TourCreateComponent from './components/TourCreateComponent.vue';
app.component('tourcreate-component', TourCreateComponent);

import TourEditComponent from './components/TourEditComponent.vue';
app.component('touredit-component', TourEditComponent);

// import ItemComponent from './components/ItemComponent.vue';
// app.component('item-component', ItemComponent);

// import ItemEditComponent from './components/ItemEditComponent.vue';
// app.component('item-edit-component', ItemEditComponent);



app.mount('#app');
