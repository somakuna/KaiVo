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

// const app = createApp({}).use(ZiggyVue);

const app = createApp({});
app.use(ZiggyVue);

app.component('VueDatePicker', VueDatePicker);

import TourCreateComponent from './components/TourCreateComponent.vue';
app.component('tourcreate-component', TourCreateComponent);

import TourEditComponent from './components/TourEditComponent.vue';
app.component('touredit-component', TourEditComponent);

import BikeCreateComponent from './components/BikeCreateComponent.vue';
app.component('bikecreate-component', BikeCreateComponent);

import BikeEditComponent from './components/BikeEditComponent.vue';
app.component('bikeedit-component', BikeEditComponent);

import BreakfastCreateComponent from './components/BreakfastCreateComponent.vue';
app.component('breakfastcreate-component', BreakfastCreateComponent);

import BreakfastEditComponent from './components/BreakfastEditComponent.vue';
app.component('breakfastedit-component', BreakfastEditComponent);

app.mount('#app');
