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
// Tours
import TourCreateComponent from './components/TourCreateComponent.vue';
app.component('tourcreate-component', TourCreateComponent);

import TourEditComponent from './components/TourEditComponent.vue';
app.component('touredit-component', TourEditComponent);
// Bikes
import BikeCreateComponent from './components/BikeCreateComponent.vue';
app.component('bikecreate-component', BikeCreateComponent);

import BikeEditComponent from './components/BikeEditComponent.vue';
app.component('bikeedit-component', BikeEditComponent);
// Breakfasts
import BreakfastCreateComponent from './components/BreakfastCreateComponent.vue';
app.component('breakfastcreate-component', BreakfastCreateComponent);

import BreakfastEditComponent from './components/BreakfastEditComponent.vue';
app.component('breakfastedit-component', BreakfastEditComponent);
// Reports
import TourReportComponent from './components/TourReportComponent.vue';
app.component('tourreport-component', TourReportComponent);

import BreakfastreportComponent from './components/BreakfastreportComponent.vue';
app.component('breakfastreport-component', BreakfastreportComponent);

import BikeReportComponent from './components/BikeReportComponent.vue';
app.component('bikereport-component', BikeReportComponent);

import ChartPricesComponent from './components/ChartPricesComponent.vue';
app.component('chartprices-component', ChartPricesComponent);

import ChartCountComponent from './components/ChartCountComponent.vue';
app.component('chartcount-component', ChartCountComponent);


app.mount('#app');
